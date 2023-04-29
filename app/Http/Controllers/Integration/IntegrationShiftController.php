<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationShiftAddRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderShift;
use Carbon\Carbon;
use Illuminate\Http\Request;


class IntegrationShiftController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Shift Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationShiftAdd(IntegrationShiftAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $From = $request->ShiftDateStart . ' ' . $request->ShiftTimeStart;
        $To   = $request->ShiftDateEnd . ' ' . $request->ShiftTimeEnd;

        $Shift = new RiderShift();
        $Shift->IDCompany           = $Company->IDCompany;
        $Shift->IDRider             = $Rider->IDRider;
        $Shift->ShiftCompanyCode    = $request->ShiftCompanyCode;
        $Shift->ShiftDateStart      = $request->ShiftDateStart;
        $Shift->ShiftDateEnd        = $request->ShiftDateEnd;
        $Shift->ShiftTimeStart      = $request->ShiftTimeStart;
        $Shift->ShiftTimeEnd        = $request->ShiftTimeEnd;
        $Shift->ShiftTotalHours     = IntegrationHelper::DifferenceTwoTime($From, $To);
        $Shift->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_SHIFT',
            'ActionBackLogDesc' => 'Integration Add Shift "' . $Shift->IDShift . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Shift Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
