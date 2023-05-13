<?php

namespace App\Http\Controllers\Integration;

use App\Exceptions\RiderNotWorkingException;
use App\Exceptions\RiderWorkingException;
use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationWorkingRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\WorkingBackLog;
use Carbon\Carbon;

class IntegrationWorkingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Working Start
    |--------------------------------------------------------------------------
    */
    public function IntegrationWorkingStart(IntegrationWorkingRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $this->RiderWorkingCheck($Rider);

        $Rider->RiderWorking        = 1;
        $Rider->RiderCompanyWorking = $Company->IDCompany;
        $Rider->save();

        WorkingBackLog::create([
            'IDCompany'             => $Company->IDCompany,
            'IDRider'               => $Rider->IDRider,
            'WorkingBackLogDate'    => Carbon::now()->format('Y-m-d'),
            'WorkingBackLogType'    => 'START'
        ]);

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_START_WORKING',
            'ActionBackLogDesc' => 'Integration Start Working Rider "' . $Rider->IDRider . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Rider Start Working',
            'Errors'    => [],
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Integration Working End
    |--------------------------------------------------------------------------
    */
    public function IntegrationWorkingEnd(IntegrationWorkingRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $this->RiderNotWorkingCheck($Rider, $Company);

        $Rider->RiderWorking        = 0;
        $Rider->RiderCompanyWorking = null;
        $Rider->save();

        WorkingBackLog::create([
            'IDCompany'             => $Company->IDCompany,
            'IDRider'               => $Rider->IDRider,
            'WorkingBackLogDate'    => Carbon::now()->format('Y-m-d'),
            'WorkingBackLogType'    => 'END'
        ]);

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_END_WORKING',
            'ActionBackLogDesc' => 'Integration End Working Rider "' . $Rider->IDRider . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Rider End Working',
            'Errors'    => [],
        ], 200);
    }

    /*
    |--------------------------------------------------------------------------
    | Integration Working Check
    |--------------------------------------------------------------------------
    */
    private function RiderWorkingCheck(Rider $Rider)
    {
        if ($Rider->RiderWorking) {
            // auth('company')->logout(true);
            throw  new RiderWorkingException();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Integration Not Working Check
    |--------------------------------------------------------------------------
    */
    private function RiderNotWorkingCheck(Rider $Rider, Company $Company)
    {
        if ($Rider->RiderWorking) {
            if ($Rider->RiderCompanyWorking != $Company->IDCompany) {
                // auth('company')->logout(true);
                throw  new RiderNotWorkingException();
            }
        } else {
            // auth('company')->logout(true);
            throw  new RiderNotWorkingException();
        }
    }
}
