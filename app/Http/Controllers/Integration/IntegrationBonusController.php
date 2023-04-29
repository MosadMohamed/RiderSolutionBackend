<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationBonusAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderBonus;


class IntegrationBonusController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Bonus Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationBonusAdd(IntegrationBonusAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Bonus = new RiderBonus();
        $Bonus->IDCompany           = $Company->IDCompany;
        $Bonus->IDRider             = $Rider->IDRider;
        $Bonus->BonusCompanyCode    = $request->BonusCompanyCode;
        $Bonus->BonusDate           = $request->BonusDate;
        $Bonus->BonusTime           = $request->BonusTime;
        $Bonus->BonusValue          = $request->BonusValue;
        $Bonus->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_BONUS',
            'ActionBackLogDesc' => 'Integration Add Bonus "' . $Bonus->IDBonus . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Bonus Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
