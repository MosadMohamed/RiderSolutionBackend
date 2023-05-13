<?php

namespace App\Http\Controllers\Integration;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IntegrationAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Login
    |--------------------------------------------------------------------------
    */
    public function IntegrationLogin(Request $request)
    {
        if (!$request->Email) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Email Required',
                'MessageAr' => 'البريد مطلوب',
                'Token'     => '',
            ], 200);
        }

        if (!$request->Code) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Code Required',
                'MessageAr' => 'الكود مطلوب',
                'Token'     => '',
            ], 200);
        }

        if (!$request->Password) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Password Required',
                'MessageAr' => 'الرقم السري مطلوب',
                'Token'     => '',
            ], 200);
        }

        $Company = Company::where('CompanyEmail', $request->Email)
            ->where('Is_Integration', 1)
            ->where('IntegrationCode', $request->Code)->first();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة غير موجودة',
                'Token'     => '',
            ], 200);
        }

        if (!Hash::check($request->Password, $Company->CompanyPassword)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Error In Password',
                'MessageAr' => 'خطأ في كلمة السر',
                'Token'     => '',
            ], 200);
        }

        if (!$Token = auth('company')->login($Company)) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Error In Login',
                'MessageAr' => 'خطأ في تسجيل الدخول',
                'Token'     => '',
            ], 200);
        }

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_LOGIN',
            'ActionBackLogDesc' => 'Integration',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Success Login',
            'MessageAr' => 'تم تسجيل الدخول بنجاح',
            'Token'     => $Token,
        ], 200);
    }
}
