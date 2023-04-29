<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationAbsenceAddRequest;
use App\Http\Requests\Integration\IntegrationAcceptAddRequest;
use App\Http\Requests\Integration\IntegrationAccidentAddRequest;
use App\Http\Requests\Integration\IntegrationBreakAddRequest;
use App\Http\Requests\Integration\IntegrationLateAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderAbsence;
use App\Models\RiderAcceptOrder;
use App\Models\RiderAccident;
use App\Models\RiderBreak;
use App\Models\Riderlate;

class IntegrationAccidentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Accident Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationAccidentAdd(IntegrationAccidentAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Accident = new RiderAccident();
        $Accident->IDCompany            = $Company->IDCompany;
        $Accident->IDRider              = $Rider->IDRider;
        $Accident->AccidentCompanyCode  = $request->AccidentCompanyCode;
        $Accident->AccidentDate         = $request->AccidentDate;
        $Accident->AccidentType      = $request->AccidentType;
        $Accident->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_ACCIDENT',
            'ActionBackLogDesc' => 'Integration Add Accident "' . $Accident->IDAccident . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Accident Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
