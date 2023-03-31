<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rider\CountryResource;
use App\Http\Resources\Rider\RiderResource;
use App\Models\ActionBackLog;
use App\Models\Country;
use App\Models\Rider;
use App\Models\RiderDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RiderAuthController extends Controller
{
    // Vicle Type
    // FireBaseToken
    // 
    public function RiderLogin(Request $request)
    {
        $Rider = auth('rider')->user();

        if ($Rider) {
            $Rider = Rider::find($Rider->IDRider);
            return response([
                'Success'   => true,
                'Message'   => 'Success Login',
                'Token'     => request()->bearerToken(),
                'Rider'     => RiderResource::make($Rider),
            ], 200);
        }

        if (!$request->RiderNaturalID) {
            return response([
                'Success'   => false,
                'Message'   => 'Natural ID Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPassword) {
            return response([
                'Success'   => false,
                'Message'   => 'Password Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $Rider = Rider::where('RiderNaturalID', $request->RiderNaturalID)->first();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'Message'   => 'Rider Not Found',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        // if (!$Rider->RiderActive) {
        //     return response([
        //         'Success'   => false,
        //         'Message'   => 'Rider Not Active',
        //         'Token'     => '',
        //         'Rider'     => [],
        //     ], 200);
        // }

        if (!Hash::check($request->RiderPassword, $Rider->RiderPassword)) {
            return response([
                'Success'   => false,
                'Message'   => 'Error In Password',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if ($request->FirebaseToken) {
            $Rider->FirebaseToken   = $request->FirebaseToken;
            $Rider->save();
        }

        if (!$Token = auth('rider')->login($Rider)) {
            return response([
                'Success'   => false,
                'Message'   => 'Error In Login',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_LOGIN',
            'ActionBackLogDesc' => 'Rider Login By Token "' . $Token . '"',
        ]);

        return response([
            'Success'   => true,
            'Message'   => 'Success Login',
            'Token'     => $Token,
            'Rider'     => RiderResource::make($Rider),
        ], 200);
    }

    public function RiderRegister(Request $request)
    {
        if (!$request->IDOffice) {
            return response([
                'Success'   => false,
                'Message'   => 'IDOffice Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->IDCountry) {
            return response([
                'Success'   => false,
                'Message'   => 'IDOffice Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderNaturalID) {
            return response([
                'Success'   => false,
                'Message'   => 'Natural ID Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderName) {
            return response([
                'Success'   => false,
                'Message'   => 'Name Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPhone) {
            return response([
                'Success'   => false,
                'Message'   => 'Phone Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderEmail) {
            return response([
                'Success'   => false,
                'Message'   => 'Email Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPassword) {
            return response([
                'Success'   => false,
                'Message'   => 'Password Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderBirthDate) {
            return response([
                'Success'   => false,
                'Message'   => 'BirthDate Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderGender) {
            return response([
                'Success'   => false,
                'Message'   => 'Gender Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $RiderCheck = Rider::where('RiderPhone', $request->RiderPhone)
            ->orWhere('RiderNaturalID', $request->RiderNaturalID)
            ->orWhere('RiderEmail', $request->RiderEmail)->first();

        if ($RiderCheck) {
            return response([
                'Success'   => false,
                'Message'   => 'Rider Already Exist',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $Rider = new Rider();
        $Rider->IDOffice        = $request->IDOffice;
        $Rider->IDCountry       = $request->IDCountry;
        $Rider->RiderNaturalID  = $request->RiderNaturalID;
        $Rider->RiderName       = $request->RiderName;
        $Rider->RiderPhone      = $request->RiderPhone;
        $Rider->RiderEmail      = $request->RiderEmail;
        $Rider->RiderPassword   = Hash::make($request->RiderPassword);
        $Rider->RiderBirthDate  = $request->RiderBirthDate;
        $Rider->RiderGender     = $request->RiderGender;
        $Rider->IsRider         = ($request->IsRider) ? 1 : 0;
        $Rider->IsPicker        = ($request->IsPicker) ? 1 : 0;
        $Rider->FirebaseToken   = ($request->FirebaseToken) ? $request->FirebaseToken : null;
        $Rider->save();

        if (!$Token = auth('rider')->login($Rider)) {
            return response([
                'Success'   => false,
                'Message'   => 'Error In Login',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        ActionBackLog::create([
            'UserType'          => 'RIDER',
            'IDUser'            => $Rider->IDRider,
            'ActionBackLog'     => 'RIDER_REGISTER',
            'ActionBackLogDesc' => 'Rider Register By Token "' . $Token . '"',
        ]);

        return response([
            'Success'   => true,
            'Message'   => 'Success Register',
            'Token'     => $Token,
            'Rider'     => RiderResource::make($Rider),
        ], 200);
    }

    public function RiderLogout(Request $request)
    {
        // 
    }

    public function RiderCountry()
    {
        $Countries = Country::where('CountryActive', 1)->get();

        return response([
            'Success'   => true,
            'Message'   => 'Countries List',
            'Country'   => CountryResource::collection($Countries),
        ], 200);
    }

    public function DocumentUpload(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'Message'   => 'Rider Not Found',
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);
        if (!$request->DocumentType) {
            return response([
                'Success'   => false,
                'Message'   => 'Document Type Required',
            ], 200);
        }

        if (!$request->DocumentImage) {
            return response([
                'Success'   => false,
                'Message'   => 'Document Image Required',
            ], 200);
        }

        $TypesArray = ['ID_FRONT', 'ID_BACK', 'VEHICLE_FRONT', 'VEHICLE_Back'];
        if (!in_array($request->DocumentType, $TypesArray)) {
            return response([
                'Success'   => false,
                'Message'   => 'Document Type Not Found',
            ], 200);
        }

        $Document = new RiderDocument();
        $Document->IDRider      = $Rider->IDRider;
        $Document->DocumentType = $request->DocumentType;
        $Document->save();

        $Image  = $request->DocumentImage;
        $Name   = $Document->IDDocument . '_' . rand(1, 99) . '.' . $Image->getClientOriginalExtension();
        $Path   = 'images/documents/';
        Storage::putFileAs($Path, $Image, $Name);
        $Document->DocumentImage = $Name;
        $Document->save();

        return response([
            'Success'   => true,
            'Message'   => 'Success Upload File',
        ], 200);
    }
}
