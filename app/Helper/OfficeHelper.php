<?php

namespace App\Helper;

use App\Models\RiderAbsence;
use App\Models\RiderAcceptOrder;
use App\Models\RiderAccident;
use App\Models\RiderAnnual;
use App\Models\RiderBonus;
use App\Models\RiderBreak;
use App\Models\RiderFeedback;
use App\Models\RiderLate;
use App\Models\RiderOrder;
use App\Models\RiderShift;

class OfficeHelper
{
    /*
    |--------------------------------------------------------------------------
    | Shift Hours
    |--------------------------------------------------------------------------
    */
    public static function GetRiderShiftsHours($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Shifts = RiderShift::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('ShiftActive', 1);
        if ($DateFrom && $DateTo) {
            $Shifts = $Shifts->whereBetween('ShiftDateStart', [$DateFrom, $DateTo]);
        }
        $Count = $Shifts->get()->count();
        $Seconds = $Shifts->get()->sum('ShiftTotalSeconds');

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
        return $Count . '/' . $H . ':' . $M . ':' . $S;
    }

    /*
    |--------------------------------------------------------------------------
    | Order Numbers
    |--------------------------------------------------------------------------
    */
    public static function GetRiderOrdersNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Orders = RiderOrder::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('OrderActive', 1);

        if ($DateFrom && $DateTo) {
            $Orders = $Orders->whereBetween('OrderDate', [$DateFrom, $DateTo]);
        }
        $Count  = $Orders->get()->count();
        $Sum    = $Orders->get()->sum('OrderValue');
        if (!$Count) {
            return '-';
        }

        return $Count . ' / ' . $Sum;
    }

    /*
    |--------------------------------------------------------------------------
    | Accident Numbers
    |--------------------------------------------------------------------------
    */
    public static function GetRiderAccidentsNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Accidents = RiderAccident::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('AccidentActive', 1);

        if ($DateFrom && $DateTo) {
            $Accidents = $Accidents->whereBetween('AccidentDate', [$DateFrom, $DateTo]);
        }
        $Count = $Accidents->get()->count();
        if (!$Count) {
            return '-';
        }

        return $Count;
    }

    /*
    |--------------------------------------------------------------------------
    | Annual Numbers
    |--------------------------------------------------------------------------
    */
    public static function GetRiderAnnualsNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Annuals = RiderAnnual::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('AnnualActive', 1);

        if ($DateFrom && $DateTo) {
            $Annuals = $Annuals->whereBetween('AnnualDate', [$DateFrom, $DateTo]);
        }
        $Count = $Annuals->get()->count();
        if (!$Count) {
            return '-';
        }

        return $Count;
    }

    /*
    |--------------------------------------------------------------------------
    | Accept Numbers
    |--------------------------------------------------------------------------
    */
    public static function GetRiderAcceptsNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Accepts = RiderAcceptOrder::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('AcceptActive', 1);

        if ($DateFrom && $DateTo) {
            $Accepts = $Accepts->whereBetween('AcceptDate', [$DateFrom, $DateTo]);
        }

        $All    = $Accepts->get()->count();
        $Count  = $Accepts->where('AcceptType', 'ACCEPT')->get()->count();
        if (!$Count) {
            return '-';
        }

        return $Count . '/' . $All . ' - ' . (int)($Count * 100 / $All) . '%';
    }

    /*
    |--------------------------------------------------------------------------
    | Absence Numbers
    |--------------------------------------------------------------------------
    */
    public static function GetRiderAbsencesNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Absences = RiderAbsence::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('AbsenceActive', 1);

        if ($DateFrom && $DateTo) {
            $Absences = $Absences->whereBetween('AbsenceDate', [$DateFrom, $DateTo]);
        }
        $Count = $Absences->get()->count();
        if (!$Count) {
            return '-';
        }

        return $Count;
    }

    /*
    |--------------------------------------------------------------------------
    | Late Hours
    |--------------------------------------------------------------------------
    */
    public static function GetRiderLatesNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Lates = RiderLate::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('LateActive', 1);
        if ($DateFrom && $DateTo) {
            $Lates = $Lates->whereBetween('LateDate', [$DateFrom, $DateTo]);
        }
        $Count = $Lates->get()->count();
        $Seconds = $Lates->get()->sum('LateTotalSeconds');

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
        return $Count . '/' . $H . ':' . $M . ':' . $S;
    }

    /*
    |--------------------------------------------------------------------------
    | Bonus Numbers
    |--------------------------------------------------------------------------
    */
    public static function GetRiderBonusNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Bonuss = RiderBonus::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('BonusActive', 1);

        if ($DateFrom && $DateTo) {
            $Bonuss = $Bonuss->whereBetween('BonusDate', [$DateFrom, $DateTo]);
        }
        $Count  = $Bonuss->get()->count();
        $Sum    = $Bonuss->get()->sum('BonusValue');
        if (!$Count) {
            return '-';
        }

        return $Count . ' / ' . $Sum;
    }

    /*
    |--------------------------------------------------------------------------
    | Break Hours
    |--------------------------------------------------------------------------
    */
    public static function GetRiderBreaksNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Breaks = RiderBreak::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('BreakActive', 1);
        if ($DateFrom && $DateTo) {
            $Breaks = $Breaks->whereBetween('BreakDate', [$DateFrom, $DateTo]);
        }
        $Count = $Breaks->get()->count();
        $Seconds = $Breaks->get()->sum('BreakTotalSeconds');

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
        return $Count . '/' . $H . ':' . $M . ':' . $S;
    }

    /*
    |--------------------------------------------------------------------------
    | Feedback Numbers
    |--------------------------------------------------------------------------
    */
    public static function GetRiderFeedbacksNumbers($IDRider, $IDCompany, $DateFrom = null, $DateTo = null)
    {
        $Feedbacks = RiderFeedback::where('IDCompany', $IDCompany)
            ->where('IDRider', $IDRider)->where('FeedbackActive', 1);

        if ($DateFrom && $DateTo) {
            $Feedbacks = $Feedbacks->whereBetween('FeedbackDate', [$DateFrom, $DateTo]);
        }
        $Count = $Feedbacks->get()->count();
        if (!$Count) {
            return '-';
        }

        return $Count;
    }

    /*
    |--------------------------------------------------------------------------
    | Shift Hours
    |--------------------------------------------------------------------------
    */
    public static function GetHoursBySeconds($Seconds)
    {
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

    /*
    |--------------------------------------------------------------------------
    | Number System
    |--------------------------------------------------------------------------
    */
    public static function NumberSystem($Num)
    {
        $K = 1000;
        $M = 1000000;
        $B = 1000000000;
        $T = 1000000000000;
        // "k" => 1000,"m" => 1000000,"b" => 1000000000,"t" => 1000000000000
        if ($Num < $K) {
            return $Num;
        } elseif ($Num >= $K && $Num < $M) {
            $Num = $Num / $K;
            return (int) $Num . 'K';
        } elseif ($Num >= $M && $Num < $B) {
            $Num = $Num / $M;
            return (int) $Num . 'M';
        } elseif ($Num >= $B && $Num < $T) {
            $Num = $Num / $B;
            return (int) $Num . 'B';
        } else {
            $Num = $Num / $T;
            return (int) $Num . 'T';
        }
    }
}
