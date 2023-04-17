<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyHiringApplyResource;
use App\Http\Resources\Company\CompanyHiringResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Hiring;
use App\Models\HiringApply;
use App\Models\RiderEmployed;
use Illuminate\Http\Request;

class CompanyHiringController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company Hiring Screen
    |--------------------------------------------------------------------------
    */
    public function CompanyHiring()
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
                'Hiring'    => [],
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);


        $Hirings = Hiring::where('IDCompany', $Company->IDCompany)->get();

        return response([
            'Success'   => true,
            'MessageEn' => 'Company Hiring Page',
            'MessageAr' => 'صفحة الوظائف للشركة',
            'Hiring'    => CompanyHiringResource::collection($Hirings),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Hiring Applies Screen
    |--------------------------------------------------------------------------
    */
    public function CompanyHiringApply(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'       => false,
                'MessageEn'     => 'Company Not Found',
                'MessageAr'     => 'الشركة مطلوبة',
                'HiringApply'   => [],
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDHiring) {
            return response([
                'Success'       => false,
                'MessageEn'     => 'Hiring Required',
                'MessageAr'     => 'الوظيفة مطلوبة',
                'HiringApply'   => [],
            ], 200);
        }

        $Hiring = Hiring::where('IDHiring', $request->IDHiring)->first();

        if (!$Hiring) {
            return response([
                'Success'       => false,
                'MessageEn'     => 'Hiring Required',
                'MessageAr'     => 'الوظيفة غير موجودة',
                'HiringApply'   => [],
            ], 200);
        }

        $HiringApplies = HiringApply::where('IDHiring', $Hiring->IDHiring)
            ->where('HiringApplyAccept', 0)
            ->where('HiringApplyActive', 1)->get();

        return response([
            'Success'       => true,
            'MessageEn'     => 'Company Hiring Apply Page',
            'MessageAr'     => 'صفحة طلبات الوظائف للشركة',
            'HiringApply'   => CompanyHiringApplyResource::collection($HiringApplies),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Accept Hiring
    |--------------------------------------------------------------------------
    */
    public function CompanyAcceptHiring(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDHiringApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Apply Required',
                'MessageAr' => 'طلب الوظيفة مطلوبة',
            ], 200);
        }

        $HiringApply = HiringApply::where('IDHiringApply', $request->IDHiringApply)
            ->where('HiringApplyAccept', 0)
            ->where('HiringApplyActive', 1)->first();

        if (!$HiringApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Apply Not Found',
                'MessageAr' => 'طلب الوظيفة غير موجود',
            ], 200);
        }

        $HiringApply->HiringApplyAccept = 1;
        $HiringApply->save();

        $RiderEmployed = new RiderEmployed();
        $RiderEmployed->IDRider     = $HiringApply->IDRider;
        $RiderEmployed->IDCompany   = $Company->IDCompany;
        $RiderEmployed->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_ACCEPT_HIRING',
            'ActionBackLogDesc' => 'Company Accept Hiring "' . $HiringApply->IDHiringApply . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Hiring Accepted Successfuly',
            'MessageAr' => 'تم الموافقة علي الوظيفة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Refuse Hiring
    |--------------------------------------------------------------------------
    */
    public function CompanyRefuseHiring(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDHiringApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Apply Required',
                'MessageAr' => 'طلب الوظيفة مطلوبة',
            ], 200);
        }

        $HiringApply = HiringApply::where('IDHiringApply', $request->IDHiringApply)
            ->where('HiringApplyAccept', 0)
            ->where('HiringApplyActive', 1)->first();

        if (!$HiringApply) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Apply Not Found',
                'MessageAr' => 'طلب الوظيفة غير موجود',
            ], 200);
        }

        $HiringApply->HiringApplyAccept = 0;
        $HiringApply->HiringApplyActive = 0;
        $HiringApply->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_REFUSE_HIRING',
            'ActionBackLogDesc' => 'Company Refuse Hiring "' . $HiringApply->IDHiringApply . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Hiring Refused Successfuly',
            'MessageAr' => 'تم رفض الوظيفة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Add Hiring
    |--------------------------------------------------------------------------
    */
    public function CompanyAddHiring(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->HiringType) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Type Required',
                'MessageAr' => 'نوع الوظيفة مطلوب',
            ], 200);
        }

        if (!$request->HiringNote) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Note Required',
                'MessageAr' => 'وصف الوظيفة مطلوب',
            ], 200);
        }

        $Hiring = new Hiring();
        $Hiring->IDCompany  = $Company->IDCompany;
        $Hiring->HiringType = $request->HiringType;
        $Hiring->HiringNote = $request->HiringNote;
        $Hiring->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_ADD_HIRING',
            'ActionBackLogDesc' => 'Company Add Hiring "' . $Hiring->IDHiring . '"',

        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Hiring Add Successfuly',
            'MessageAr' => 'تم اضافة الوظيفة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company End Hiring
    |--------------------------------------------------------------------------
    */
    public function CompanyEndHiring(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDHiring) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Required',
                'MessageAr' => 'الوظيفة مطلوبة',
            ], 200);
        }

        $Hiring = Hiring::where('IDHiring', $request->IDHiring)
            ->where('HiringApplied', 0)
            ->where('HiringActive', 1)->first();

        if (!$Hiring) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Not Found',
                'MessageAr' => 'الوظيفة غير موجودة',
            ], 200);
        }
        $Hiring->HiringApplied = 1;
        $Hiring->save();

        $HiringApplies = HiringApply::where('IDHiring', $Hiring->IDHiring)
            ->where('HiringApplyActive', 1)->get();

        foreach ($HiringApplies as $HiringApply) {
            $HiringApply->HiringApplyActive = 0;
            $HiringApply->save();
        }

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_END_HIRING',
            'ActionBackLogDesc' => 'Company End Hiring "' . $Hiring->IDHiring . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Hiring End Successfuly',
            'MessageAr' => 'تم انهاء الوظيفة بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Delete Hiring
    |--------------------------------------------------------------------------
    */
    public function CompanyDeleteHiring(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        if (!$request->IDHiring) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Required',
                'MessageAr' => 'الوظيفة مطلوبة',
            ], 200);
        }

        $Hiring = Hiring::where('IDHiring', $request->IDHiring)
            ->where('HiringActive', 1)->first();

        if (!$Hiring) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Hiring Not Found',
                'MessageAr' => 'الوظيفة غير موجودة',
            ], 200);
        }
        $Hiring->HiringActive = 0;
        $Hiring->save();

        $HiringApplies = HiringApply::where('IDHiring', $Hiring->IDHiring)
            ->where('HiringApplyActive', 1)->get();

        foreach ($HiringApplies as $HiringApply) {
            $HiringApply->HiringApplyActive = 0;
            $HiringApply->save();
        }

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_DELETE_HIRING',
            'ActionBackLogDesc' => 'Company Delete Hiring "' . $Hiring->IDHiring . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Hiring Delete Successfuly',
            'MessageAr' => 'تم حذف الوظيفة بنجاح',
        ], 200);
    }
}
