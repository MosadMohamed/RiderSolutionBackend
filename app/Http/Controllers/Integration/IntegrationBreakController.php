<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationAcceptAddRequest;
use App\Http\Requests\Integration\IntegrationBreakAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderAcceptOrder;
use App\Models\RiderBreak;

class IntegrationBreakController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Break Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationBreakAdd(IntegrationBreakAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $From = $request->BreakDate . ' ' . $request->BreakTimeStart;
        $To   = $request->BreakDate . ' ' . $request->BreakTimeEnd;

        $Break = new RiderBreak();
        $Break->IDCompany           = $Company->IDCompany;
        $Break->IDRider             = $Rider->IDRider;
        $Break->BreakCompanyCode    = $request->BreakCompanyCode;
        $Break->BreakDate           = $request->BreakDate;
        $Break->BreakTimeStart      = $request->BreakTimeStart;
        $Break->BreakTimeEnd        = $request->BreakTimeEnd;
        $Break->BreakTotalSeconds   = IntegrationHelper::DifferenceTwoTime($From, $To);
        $Break->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_BREAK',
            'ActionBackLogDesc' => 'Integration Add Break "' . $Break->IDBreak . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Break Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
