<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rider\CountryResource;
use App\Http\Resources\Rider\RiderResource;
use App\Models\ActionBackLog;
use App\Models\Country;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RiderAuthController extends Controller
{
    public function RiderLogin(Request $request)
    {
        $Rider = auth('rider')->user();

        if ($Rider) {
            $Rider = Rider::find($Rider->IDRider);
            return response([
                'Sussuss'   => true,
                'Message'   => 'Success Login',
                'Token'     => request()->bearerToken(),
                'Rider'     => RiderResource::make($Rider),
            ], 200);
        }

        if (!$request->RiderPhone) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Phone Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPassword) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Password Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $Rider = Rider::where('RiderPhone', $request->RiderPhone)
            ->where('RiderActive', 1)->first();

        if (!$Rider) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Rider Not Found',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!Hash::check($request->RiderPassword, $Rider->RiderPassword)) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Error In Password',
                'Token'     => '',
                'User'      => [],
            ], 200);
        }

        if (!$Token = auth('rider')->login($Rider)) {
            return response([
                'Sussuss'   => false,
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
            'Sussuss'   => true,
            'Message'   => 'Success Login',
            'Token'     => $Token,
            'User'      => RiderResource::make($Rider),
        ], 200);
    }

    public function RiderRegister(Request $request)
    {
        if (!$request->IDOffice) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'IDOffice Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->IDCountry) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'IDOffice Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderName) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Name Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPhone) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Phone Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderEmail) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Email Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPassword) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Password Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderBirthDate) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'BirthDate Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderGender) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Gender Required',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $RiderCheck = Rider::where('RiderPhone', $request->RiderPhone)
            ->orWhere('RiderEmail', $request->RiderEmail)->first();

        if ($RiderCheck) {
            return response([
                'Sussuss'   => false,
                'Message'   => 'Rider Already Exist',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $Rider = new Rider();
        $Rider->IDOffice        = $request->IDOffice;
        $Rider->IDCountry       = $request->IDCountry;
        $Rider->RiderName       = $request->RiderName;
        $Rider->RiderPhone      = $request->RiderPhone;
        $Rider->RiderEmail      = $request->RiderEmail;
        $Rider->RiderPassword   = Hash::make($request->RiderPassword);
        $Rider->RiderBirthDate  = $request->RiderBirthDate;
        $Rider->RiderGender     = $request->RiderGender;
        $Rider->save();

        if (!$Token = auth('rider')->login($Rider)) {
            return response([
                'Sussuss'   => false,
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
            'Sussuss'   => true,
            'Message'   => 'Success Register',
            'Token'     => $Token,
            'User'      => RiderResource::make($Rider),
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
            'Sussuss'   => true,
            'Message'   => 'Countries List',
            'User'      => CountryResource::collection($Countries),
        ], 200);
    }
}
