<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company\CompanyRequestResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\RiderEmployed;
use App\Models\RiderRequest;
use Illuminate\Http\Request;

class CompanyRequestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Company Rider Requests
    |--------------------------------------------------------------------------
    */
    public function CompanyRiderRequest()
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
                'Request'   => [],
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        $RiderRequests = RiderRequest::where('IDCompany', $Company->IDCompany)
            ->where('RiderRequestAccept', 0)
            ->where('RiderRequestActive', 1)->get();

        return response([
            'Success'   => true,
            'MessageEn' => 'Company Rider Requests Page',
            'MessageAr' => 'صفحة طلبات الشركة',
            'Request'   => CompanyRequestResource::collection($RiderRequests),
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Accept Request
    |--------------------------------------------------------------------------
    */
    public function CompanyAcceptRequest(Request $request)
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

        if (!$request->IDIDRiderRequest) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Request Required',
                'MessageAr' => 'الطلب مطلوبة',
            ], 200);
        }

        $RiderRequest = RiderRequest::where('IDIDRiderRequest', $request->IDIDRiderRequest)
            ->where('RiderRequestAccept', 0)
            ->where('RiderRequestActive', 1)
            ->first();

        if (!$RiderRequest) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Request Not Found',
                'MessageAr' => 'الطلب غير موجود',
            ], 200);
        }

        $RiderRequest->RiderRequestAccept = 1;
        $RiderRequest->save();

        $RiderEmployed = new RiderEmployed();
        $RiderEmployed->IDRider     = $RiderRequest->IDRider;
        $RiderEmployed->IDCompany   = $Company->IDCompany;
        $RiderEmployed->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_ACCEPT_REQUEST',
            'ActionBackLogDesc' => 'Company Accept Request "' . $RiderRequest->IDRiderRequest . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Request Accepted Successfuly',
            'MessageAr' => 'تم الموافقة علي الطلب بنجاح',
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Company Refuse Request
    |--------------------------------------------------------------------------
    */
    public function CompanyRefuseRequest(Request $request)
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

        if (!$request->IDIDRiderRequest) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Request Required',
                'MessageAr' => 'الطلب مطلوبة',
            ], 200);
        }

        $RiderRequest = RiderRequest::where('IDIDRiderRequest', $request->IDIDRiderRequest)
            ->where('RiderRequestAccept', 0)
            ->where('RiderRequestActive', 1)
            ->first();

        if (!$RiderRequest) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Request Not Found',
                'MessageAr' => 'الطلب غير موجود',
            ], 200);
        }

        $RiderRequest->RiderRequestActive = 0;
        $RiderRequest->save();

        ActionBackLog::create([
            'UserType'          => 'COMPANY',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'COMPANY_REFUSE_REQUEST',
            'ActionBackLogDesc' => 'Company Refuse Request "' . $RiderRequest->IDRiderRequest . '"',
        ]);

        return response([
            'Success'   => true,
            'MessageEn' => 'Request Refused Successfuly',
            'MessageAr' => 'تم رفض الطلب بنجاح',
        ], 200);
    }
}
