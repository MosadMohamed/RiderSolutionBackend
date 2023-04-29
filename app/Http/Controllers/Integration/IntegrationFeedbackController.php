<?php

namespace App\Http\Controllers\Integration;

use App\Helper\IntegrationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Integration\IntegrationFeedbackAddRequest;
use App\Models\ActionBackLog;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderFeedback;


class IntegrationFeedbackController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Integration Feedback Add
    |--------------------------------------------------------------------------
    */
    public function IntegrationFeedbackAdd(IntegrationFeedbackAddRequest $request)
    {
        $Company = auth('company')->user();
        $Company = Company::find($Company->IDCompany);

        $Rider = Rider::find($request->IDRider);

        IntegrationHelper::RiderInComapnyCheck($Rider->IDRider, $Company->IDCompany);

        $Feedback = new RiderFeedback();
        $Feedback->IDCompany            = $Company->IDCompany;
        $Feedback->IDRider              = $Rider->IDRider;
        $Feedback->FeedbackCompanyCode  = $request->FeedbackCompanyCode;
        $Feedback->FeedbackDate         = $request->FeedbackDate;
        $Feedback->FeedbackText         = $request->FeedbackText;
        $Feedback->FeedbackType         = $request->FeedbackType;
        $Feedback->save();

        ActionBackLog::create([
            'UserType'          => 'INTEGRATION',
            'IDUser'            => $Company->IDCompany,
            'ActionBackLog'     => 'INTEGRATION_ADD_FEEDBACK',
            'ActionBackLogDesc' => 'Integration Add Feedback "' . $Feedback->IDFeedback . '"',
        ]);

        // auth('company')->logout(true);

        return response([
            'Success'   => true,
            'Message'   => 'Feedback Add Successfuly',
            'Errors'    => [],
        ], 200);
    }
}
