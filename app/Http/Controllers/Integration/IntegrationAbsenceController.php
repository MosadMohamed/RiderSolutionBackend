<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationAbsenceAddRequest;
use App\Http\Requests\Integration\IntegrationAcceptAddRequest;
use App\Http\Requests\Integration\IntegrationBreakAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderAbsence;
use App\Models\RiderAcceptOrder;
use App\Models\RiderBreak;

class IntegrationAbsenceController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Absence Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationAbsenceAdd(IntegrationAbsenceAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Absence = new RiderAbsence();
        $Absence->IDCompany             = $Company->IDCompany;
        $Absence->IDRider               = $Rider->IDRider;
        $Absence->AbsenceCompanyCode    = $request->AbsenceCompanyCode;
        $Absence->AbsenceDate           = $request->AbsenceDate;
        $Absence->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_ABSENCE',
            'ActionBackLogDesc' => 'Integration Add Absence "' . $Absence->IDAbsence . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Absence Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
