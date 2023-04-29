<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationAcceptAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderAcceptOrder;


class IntegrationAcceptController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Accept Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationAcceptAdd(IntegrationAcceptAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Accept = new RiderAcceptOrder();
        $Accept->IDCompany          = $Company->IDCompany;
        $Accept->IDRider            = $Rider->IDRider;
        $Accept->AcceptCompanyCode  = $request->AcceptCompanyCode;
        $Accept->AcceptDate         = $request->AcceptDate;
        $Accept->AcceptTime         = $request->AcceptTime;
        $Accept->AcceptType         = $request->AcceptType;
        $Accept->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_ACCEPT',
            'ActionBackLogDesc' => 'Integration Add Accept "' . $Accept->IDAccept . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Accept Rate Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
