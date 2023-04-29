<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationAnnualAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderAnnual;

class IntegrationAnnualController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Annual Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationAnnualAdd(IntegrationAnnualAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Annual = new RiderAnnual();
        $Annual->IDCompany            = $Company->IDCompany;
        $Annual->IDRider              = $Rider->IDRider;
        $Annual->AnnualCompanyCode  = $request->AnnualCompanyCode;
        $Annual->AnnualDate         = $request->AnnualDate;
        $Annual->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_ANNUAL',
            'ActionBackLogDesc' => 'Integration Add Annual "' . $Annual->IDAnnual . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Annual Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
