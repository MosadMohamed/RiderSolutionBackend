<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rider\CountryResource;
use App\Http\Resources\Rider\RiderResource;
use App\Models\ActionBackLog;
use App\Models\Country;
use App\Models\Office;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RiderAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Rider Login
    |--------------------------------------------------------------------------
    */
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

        if (!$request->RiderNationalID) {
            return response([
                'Success'   => false,
                'MessageEn' => 'National ID Required',
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

        $Rider = Rider::where('RiderNationalID', $request->RiderNationalID)->first();

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

    /*
    |--------------------------------------------------------------------------
    | Rider Register
    |--------------------------------------------------------------------------
    */
    public function RiderRegister(Request $request)
    {
        Log::info($request);
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

        if (!$request->RiderNationalID) {
            return response([
                'Success'   => false,
                'MessageEn' => 'National ID Required',
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
            ->orWhere('RiderNationalID', $request->RiderNationalID)
            ->orWhere('RiderEmail', $request->RiderEmail)->first();

        if ($RiderCheck) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Already Exist',
                'MessageAr' => 'السائق موجود بالفعل',
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
        $Rider->RiderNationalID = $request->RiderNationalID;
        $Rider->RiderName       = $request->RiderName;
        $Rider->RiderPhone      = $request->RiderPhone;
        $Rider->RiderEmail      = $request->RiderEmail;
        $Rider->RiderPassword   = Hash::make($request->RiderPassword);
        $Rider->RiderBirthDate  = $request->RiderBirthDate;
        $Rider->RiderGender     = $request->RiderGender;
        $Rider->IsRider         = ($request->IsRider) ? 1 : 0;
        $Rider->IsPicker        = ($request->IsPicker) ? 1 : 0;
        $Rider->FirebaseToken   = ($request->FirebaseToken) ? $request->FirebaseToken : null;
        if ($request->IsRider) {
            if ($request->VehlcleType == 'CAR' || $request->VehlcleType == 'Car' || $request->VehlcleType == 'سيارة') {
                $Rider->VehlcleType = 'CAR';
            } elseif ($request->VehlcleType == 'BICYCLE' || $request->VehlcleType == 'Bicycle' || $request->VehlcleType == 'دراجة') {
                $Rider->VehlcleType = 'BICYCLE';
            } elseif ($request->VehlcleType == 'MOTOCYCLE' || $request->VehlcleType == 'Motocycle' || $request->VehlcleType == 'دراجة نارية') {
                $Rider->VehlcleType = 'MOTOCYCLE';
            } elseif ($request->VehlcleType == 'WALKER' || $request->VehlcleType == 'Walker' || $request->VehlcleType == 'ووكر') {
                $Rider->VehlcleType = 'WALKER';
            } else {
                $Rider->VehlcleType = null;
            }
        }
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

    /*
    |--------------------------------------------------------------------------
    | Rider Logout
    |--------------------------------------------------------------------------
    */
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

    /*
    |--------------------------------------------------------------------------
    | Countries List For Rider Register
    |--------------------------------------------------------------------------
    */
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

    /*
    |--------------------------------------------------------------------------
    | Edit Rider Profile
    |--------------------------------------------------------------------------
    */
    public function EditProfile(Request $request)
    {
        $Rider = auth('rider')->user();

        if (!$Rider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Not Found',
                'MessageAr' => 'السائق مطلوب',
                'Rider'     => [],
            ], 200);
        }

        $Rider = Rider::find($Rider->IDRider);

        if (!$request->RiderName) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Name Required',
                'MessageAr' => 'الاسم مطلوب',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderPhone) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Phone Required',
                'MessageAr' => 'الهاتف مطلوب',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderEmail) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Email Required',
                'MessageAr' => 'البريد الالكتروني مطلوب',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderBirthDate) {
            return response([
                'Success'   => false,
                'MessageEn' => 'BirthDate Required',
                'MessageAr' => 'تاريخ الميلاد مطلوب',
                'Rider'     => [],
            ], 200);
        }

        if (!$request->RiderGender) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Gender Required',
                'MessageAr' => 'النوع مطلوب',
                'Rider'     => [],
            ], 200);
        }

        $RiderPhoneCheck = $request->RiderPhone;
        $RiderEmailCheck = $request->RiderEmail;
        $RiderCheck = Rider::where('IDRider', '<>', $Rider->IDRider)
            ->where(function ($query) use ($RiderPhoneCheck, $RiderEmailCheck) {
                $query->where('RiderPhone', $RiderPhoneCheck)
                    ->orWhere('RiderEmail', $RiderEmailCheck)->first();
            })->first();

        if ($RiderCheck) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Phone or Email Already Exists',
                'MessageAr' => 'الهاتف او البريد موجودون من قبل',
                'Rider'     => [],
            ], 200);
        }

        $Rider->RiderName       = $request->RiderName;
        $Rider->RiderPhone      = $request->RiderPhone;
        $Rider->RiderEmail      = $request->RiderEmail;
        $Rider->RiderBirthDate  = $request->RiderBirthDate;
        $Rider->RiderGender     = $request->RiderGender;
        if ($request->RiderPassword) {
            $Rider->RiderPassword = Hash::make($request->RiderPassword);
        }
        $Rider->save();

        // Edit Documents
        // Edit Rider OR Picker

        return response([
            'Success'   => true,
            'MessageEn' => 'profile Updated Successfuly',
            'MessageAr' => 'تم تعديل الملف الشخصي بنجاح',
            'Rider'     => RiderResource::make($Rider),
        ], 200);
    }
}
