<?php

namespace App\Helper;

use App\Exceptions\RiderNotEmployedException;
use App\Models\Rider;
use App\Models\RiderEmployed;
use Carbon\Carbon;

class IntegrationHelper
{
    /*
    |--------------------------------------------------------------------------
    | Integration Get Rider
    |--------------------------------------------------------------------------
    */
    public static function GetRider($IDRider)
    {
        return Rider::where('IDRider', $IDRider)
            ->where('RiderActive', 1)
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | Integration Check Rider In Company
    |--------------------------------------------------------------------------
    */
    public static function RiderInComapnyCheck($IDRider, $IDCompany)
    {
        $EmployedCheck =  RiderEmployed::where('IDRider', $IDRider)
            ->where('IDCompany', $IDCompany)
            ->where('RiderEmployedActive', 1)
            ->first();

        if (!$EmployedCheck) {
            throw new RiderNotEmployedException();
            return response([
                'Success'   => false,
                'Message'   => 'Invalid Date',
                'Errors'    => ['Rider Not Employed'],
            ], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Integration Get Difference Between Two TimeDate
    |--------------------------------------------------------------------------
    */
    public static function DifferenceTwoTime($From, $To)
    {
        return Carbon::parse($From)->diffInSeconds($To);
    }
}
