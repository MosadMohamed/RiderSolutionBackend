<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationAbsenceAddRequest;
use App\Http\Requests\Integration\IntegrationAcceptAddRequest;
use App\Http\Requests\Integration\IntegrationBreakAddRequest;
use App\Http\Requests\Integration\IntegrationLateAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderAbsence;
use App\Models\RiderAcceptOrder;
use App\Models\RiderBreak;
use App\Models\RiderLate;

class IntegrationLateController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Late Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationLateAdd(IntegrationLateAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Late = new RiderLate();
        $Late->IDCompany        = $Company->IDCompany;
        $Late->IDRider          = $Rider->IDRider;
        $Late->LateCompanyCode  = $request->LateCompanyCode;
        $Late->LataDateStart    = $request->LataDateStart;
        $Late->LateDateEnd      = $request->LateDateEnd;
        $Late->LateTimeStart    = $request->LateTimeStart;
        $Late->LateTimeEnd      = $request->LateTimeEnd;
        $Late->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_LATE',
            'ActionBackLogDesc' => 'Integration Add Late "' . $Late->IDLate . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Late Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
