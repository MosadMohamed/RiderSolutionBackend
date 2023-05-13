<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company Login
    |--------------------------------------------------------------------------
    */
    public function CompanyLogin(Request $request)
    {
        $Company = auth('company')->user();

        if ($Company) {
            $Company = Company::find($Company->IDCompany);
            return response([
                'Success'   => true,
                'MessageEn' => 'Success Login',
                'MessageAr' => 'تم تسجيل الدخول بنجاح',
                'Token'     => request()->bearerToken(),
                'Company'   => CompanyResource::make($Company),
            ], 200);
        }

        if (!$request->CompanyEmail) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Email Required',
                'MessageAr' => 'البريد مطلوب',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        if (!$request->CompanyPassword) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Password Required',
                'MessageAr' => 'الرقم السري مطلوب',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        $Company = Company::where('CompanyEmail', $request->CompanyEmail)
            ->where('Is_Integration', 0)->first();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة غير موجودة',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        if (!Hash::check($request->CompanyPassword, $Company->CompanyPassword)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Error In Password',
                'MessageAr' => 'خطأ في كلمة السر',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        if ($request->FirebaseToken) {
            $Company->FirebaseToken   = $request->FirebaseToken;
            $Company->save();
        }

        if (!$Token = auth('company')->login($Company)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Error In Login',
                'MessageAr' => 'خطأ في تسجيل الدخول',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_LOGIN',
            'ActionBackLogDesc' => 'Company Login',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Success Login',
            'MessageAr' => 'تم تسجيل الدخول بنجاح',
            'Token'     => $Token,
            'Company'   => CompanyResource::make($Company),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Register
    |--------------------------------------------------------------------------
    */
    public function CompanyRegister(Request $request)
    {
        if (!$request->CompanyNameEn) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Name Required',
                'MessageAr' => 'الاسم مطلوب',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        if (!$request->CompanyEmail) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Email Required',
                'MessageAr' => 'البريد مطلوب',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        if (!$request->CompanyPhone) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Phone Required',
                'MessageAr' => 'الهاتف مطلوب',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        if (!$request->CompanyPassword) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Password Required',
                'MessageAr' => 'كلمة السر مطلوبة',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        $CompanyCheck = Company::where('CompanyPhone', $request->CompanyPhone)
            ->orWhere('CompanyEmail', $request->CompanyEmail)->first();

        if ($CompanyCheck) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Already Exist',
                'MessageAr' => 'الشركة موجودة بالفعل',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        $Company = new Company();
        $Company->IDCountry         = 1;
        $Company->CompanyNameEn     = $request->CompanyNameEn;
        $Company->CompanyNameAr     = $request->CompanyNameEn;
        $Company->CompanyEmail      = $request->CompanyEmail;
        $Company->CompanyPhone      = $request->CompanyPhone;
        $Company->CompanyPassword   = Hash::make($request->CompanyPassword);
        $Company->save();

        if (!$Token = auth('company')->login($Company)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Error In Login',
                'MessageAr' => 'خطأ في تسجيل الدخول',
                'Token'     => '',
                'Company'   => [],
            ], 200);
        }

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_REGISTER',
            'ActionBackLogDesc' => 'Company Register',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Success Register',
            'MessageAr' => 'تم التسجيل بنجاح',
            'Token'     => $Token,
            'Company'   => CompanyResource::make($Company),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Logout
    |--------------------------------------------------------------------------
    */
    public function CompanyLogout(Request $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);
        Auth::guard('company')->logout($Company);

        return response([
            'Success'   => true,
            'MessageEn' => 'Success Logout',
            'MessageAr' => 'تم تسجيل الخروج بنجاح',
            'Token'     => '',
            'Company'   => [],
        ], 200);
    }
}
