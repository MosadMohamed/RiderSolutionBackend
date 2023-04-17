<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Rider\RiderResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderEmployed;
use Illuminate\Http\Request;

class CompanyRiderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company Rider Screen
    |--------------------------------------------------------------------------
    */
    public function CompanyRider()
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
                'Rider'     => [],
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        $IDRiders = RiderEmployed::where('IDCompany', $Company->IDCompany)
            ->where('RiderEmployedActive', 1)->get()->pluck('IDRider')->toArray();

        $Riders = Rider::whereIn('IDRider', $IDRiders)->get();

        return response([
            'Success'   => true,
            'MessageEn' => 'Company Hiring Page',
            'MessageAr' => 'صفحة الوظائف للشركة',
            'Rider'     => RiderResource::collection($Riders),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Delete Rider
    |--------------------------------------------------------------------------
    */
    public function CompanyDeleteRider(Request $request)
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

        if (!$request->IDRider) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Rider Requirde',
                'MessageAr' => 'السائق مطلوب',
            ], 200);
        }

        $RiderEmployeds = RiderEmployed::where('IDCompany', $Company->IDCompany)
            ->where('IDRider', $request->IDRider)
            ->where('RiderEmployedActive', 1)->get();

        foreach ($RiderEmployeds as $RiderEmployed) {
            $RiderEmployed->RiderEmployedActive = 0;
            $RiderEmployed->save();
        }

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_DELETE_RIDER',
            'ActionBackLogDesc' => 'Company Delete Rider "' . $request->IDRider . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Rider Deleted Successfuly',
            'MessageAr' => 'تم حذف السائق بنجاح',
        ], 200);
    }
}
