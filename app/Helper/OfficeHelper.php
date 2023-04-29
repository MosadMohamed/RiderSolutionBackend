<?php

namespace App\Helper;

use App\Models\RiderShift;

class OfficeHelper
{
    /*
    |--------------------------------------------------------------------------
    | Shift Hours
    |--------------------------------------------------------------------------
    */
    public static function GetRiderShiftsHours($IDRider, $IDCompany)
    {
        $Seconds = RiderShift::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('ShiftActive', 1)
            ->get()->sum('ShiftTotalSeconds');
        if (!$Seconds) {
            return '-';
        }
        $H  = (int)($Seconds / 3600);
        $M  = (int)(($Seconds - $H * 3600) / 60);
        $S  = ($Seconds - ($H * 3600) - ($M * 60));
        if ($H < 10) {
            $H = '0' . $H;
        }
        if ($M < 10) {
            $M = '0' . $M;
        }
        if ($S < 10) {
            $S = '0' . $S;
        }
        return $H . ':' . $M . ':' . $S;
    }
}
