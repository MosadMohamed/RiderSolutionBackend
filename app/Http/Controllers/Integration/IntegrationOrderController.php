<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationOrderAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderOrder;


class IntegrationOrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Order Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationOrderAdd(IntegrationOrderAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Order = new RiderOrder();
        $Order->IDCompany           = $Company->IDCompany;
        $Order->IDRider             = $Rider->IDRider;
        $Order->OrderCompanyCode    = $request->OrderCompanyCode;
        $Order->OrderDate           = $request->OrderDate;
        $Order->OrderTime           = $request->OrderTime;
        $Order->OrderValue          = $request->OrderValue;
        $Order->OrderStatus         = $request->OrderStatus;
        $Order->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_ORDER',
            'ActionBackLogDesc' => 'Integration Add Order "' . $Order->IDOrder . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Order Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
