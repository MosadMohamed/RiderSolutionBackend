<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rider\CountryResource;
use App\Http\Resources\Rider\RiderResource;
use App\Models\ActionBackLog;
use App\Models\Country;
use App\Models\Office;
use App\Models\Rider;
use App\Models\RiderDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RiderAuthController extends Controller
{
    public function RiderLogin(Request $request)
    {
        $Rider = auth('rider')->user();

        if ($Rider) {
            $Rider = Rider::find($Rider->IDRider);
            return response([
                'Success'   => true,
                'MessageEn' => 'Success Login',
                'MessageAr' => 'تم تسجيل الدخول بنجاح',
                'Token'     => request()->bearerToken(),
                'Rider'     => RiderResource::make($Rider),
            ], 200);
        }

        if (!$request->RiderNaturalID) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Natural ID Required',
                'MessageAr' => 'الرقم القومي مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPassword) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Password Required',
                'MessageAr' => 'الرقم السري مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $Rider = Rider::where('RiderNaturalID', $request->RiderNaturalID)->first();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق غير موجود',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!Hash::check($request->RiderPassword, $Rider->RiderPassword)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Error In Password',
                'MessageAr' => 'خطأ في كلمة السر',
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
                'MessageEn' => 'Error In Login',
                'MessageAr' => 'خطأ في تسجيل الدخول',
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
            'MessageEn' => 'Success Login',
            'MessageAr' => 'تم تسجيل الدخول بنجاح',
            'Token'     => $Token,
            'Rider'     => RiderResource::make($Rider),
        ], 200);
    }

    public function RiderRegister(Request $request)
    {
        if (!$request->IDOffice) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Office Required',
                'MessageAr' => 'المكتب مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->IDCountry) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Country Required',
                'MessageAr' => 'الدولة مطلوبة',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderNaturalID) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Natural ID Required',
                'MessageAr' => 'الرقم القومي مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderName) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Name Required',
                'MessageAr' => 'الاسم مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPhone) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Phone Required',
                'MessageAr' => 'الهاتف مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderEmail) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Email Required',
                'MessageAr' => 'البريد الالكتروني مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPassword) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Password Required',
                'MessageAr' => 'كلمة السر مطلوبة',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderBirthDate) {
            return response([
                'Success'   => false,
                'MessageEn' => 'BirthDate Required',
                'MessageAr' => 'تاريخ الميلاد مطلوب',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderGender) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Gender Required',
                'MessageAr' => 'النوع مطلوب',
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
                'MessageEn' => 'Rider Already Exist',
                'MessageAr' => 'السائق مطلوب بالفعل',
                'Token'     => '',
                'Rider'     => [],
            ], 200);
        }

        $Office = Office::where('IDOffice', $request->IDOffice)->first();
        if ($Office) {
            $IDOffice = $Office->IDOffice;
        } else {
            $IDOffice = 1;
        }

        $Country = Country::where('IDCountry', $request->Country)->first();
        if ($Country) {
            $IDCountry = $Country->IDCountry;
        } else {
            $IDCountry = 1;
        }

        $Rider = new Rider();
        $Rider->IDOffice        = $IDOffice;
        $Rider->IDCountry       = $IDCountry;
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
                'MessageEn' => 'Error In Login',
                'MessageAr' => 'خطأ في تسجيل الدخول',
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
            'MessageEn' => 'Success Register',
            'MessageAr' => 'تم التسجيل بنجاح',
            'Token'     => $Token,
            'Rider'     => RiderResource::make($Rider),
        ], 200);
    }

    public function RiderLogout(Request $request)
    {
        $Rider = auth('rider')->user();
        $Rider = Rider::find($Rider->IDRider);
        Auth::guard('rider')->logout($Rider);

        return response([
            'Success'   => true,
            'MessageEn' => 'Success Logout',
            'MessageAr' => 'تم التسجيل الخروج بنجاح',
            'Token'     => '',
            'Rider'     => [],
        ], 200);
    }

    public function RiderCountry()
    {
        $Countries = Country::where('CountryActive', 1)->get();

        return response([
            'Success'   => true,
            'MessageEn' => 'Countries List',
            'MessageAr' => 'قائمة الدول',
            'Country'   => CountryResource::collection($Countries),
        ], 200);
    }
}
