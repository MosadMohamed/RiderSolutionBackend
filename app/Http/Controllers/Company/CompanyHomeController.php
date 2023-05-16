<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\RiderAbsence;
use App\Models\RiderAcceptOrder;
use App\Models\RiderAccident;
use App\Models\RiderAnnual;
use App\Models\RiderBonus;
use App\Models\RiderBreak;
use App\Models\RiderLate;
use App\Models\RiderOrder;
use Illuminate\Http\Request;

class CompanyHomeController extends Controller
{
    public function Home(Request $request)
    {
        $Company = auth('company')->user();

        if (!$Company) {
            return response([
                'Success'   => false,
                'MessageEn' => 'Company Not Found',
                'MessageAr' => 'الشركة مطلوبة',
            ], 200);
        }

        $Company = Company::find($Company->IDCompany);

        $DateFrom   = $request->DateFrom;
        $DateTo     = $request->DateTo;

        $OrderCount     = RiderOrder::where('IDCompany', $Company->IDCompany)->where('OrderActive', 1);
        $OrderTotal     = RiderOrder::where('IDCompany', $Company->IDCompany)->where('OrderActive', 1);
        $OrderAccept    = RiderOrder::where('IDCompany', $Company->IDCompany)->where('OrderActive', 1);
        $OrderCancel    = RiderOrder::where('IDCompany', $Company->IDCompany)->where('OrderActive', 1);
        if ($DateFrom) {
            $OrderCount     = $OrderCount->where('OrderDate', '>=', $DateFrom);
            $OrderTotal     = $OrderTotal->where('OrderDate', '>=', $DateFrom);
            $OrderAccept    = $OrderAccept->where('OrderDate', '>=', $DateFrom);
            $OrderCancel    = $OrderCancel->where('OrderDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $OrderCount     = $OrderCount->where('OrderDate', '<=', $DateTo);
            $OrderTotal     = $OrderTotal->where('OrderDate', '<=', $DateTo);
            $OrderAccept    = $OrderAccept->where('OrderDate', '<=', $DateTo);
            $OrderCancel    = $OrderCancel->where('OrderDate', '<=', $DateTo);
        }
        $OrderCount     = $OrderCount->get()->count();
        $OrderTotal     = $OrderTotal->get()->sum('OrderValue');
        $OrderAccept    = $OrderAccept->where('OrderStatus', 'ACCEPT')->get()->count();
        $OrderCancel    = $OrderCancel->where('OrderStatus', 'CANCEL')->get()->count();

        // 
        $BonusTotal     = RiderBonus::where('IDCompany', $Company->IDCompany)->where('BonusActive', 1);
        $BonusCount     = RiderBonus::where('IDCompany', $Company->IDCompany)->where('BonusActive', 1);
        if ($DateFrom) {
            $BonusTotal     = $BonusTotal->where('BonusDate', '>=', $DateFrom);
            $BonusCount     = $BonusCount->where('BonusDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $BonusTotal     = $BonusTotal->where('BonusDate', '<=', $DateTo);
            $BonusCount     = $BonusCount->where('BonusDate', '<=', $DateTo);
        }
        $BonusTotal     = $BonusTotal->get()->sum('BonusValue');
        $BonusCount     = $BonusCount->get()->count();

        // 
        $LateCount      = RiderLate::where('IDCompany', $Company->IDCompany)->where('LateActive', 1);
        if ($DateFrom) {
            $LateCount     = $LateCount->where('LateDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $LateCount     = $LateCount->where('LateDate', '<=', $DateTo);
        }
        $LateCount      = $LateCount->get()->count();

        // 
        $BreakCount     = RiderBreak::where('IDCompany', $Company->IDCompany)->where('BreakActive', 1);
        if ($DateFrom) {
            $BreakCount     = $BreakCount->where('BreakDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $BreakCount     = $BreakCount->where('BreakDate', '<=', $DateTo);
        }
        $BreakCount     = $BreakCount->get()->count();

        // 
        $AnnualCount    = RiderAnnual::where('IDCompany', $Company->IDCompany)->where('AnnualActive', 1);
        if ($DateFrom) {
            $AnnualCount     = $AnnualCount->where('AnnualDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $AnnualCount     = $AnnualCount->where('AnnualDate', '<=', $DateTo);
        }
        $AnnualCount    = $AnnualCount->get()->count();

        // 
        $AccidentCount  = RiderAccident::where('IDCompany', $Company->IDCompany)->where('AccidentActive', 1);
        if ($DateFrom) {
            $AccidentCount     = $AccidentCount->where('AccidentDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $AccidentCount     = $AccidentCount->where('AccidentDate', '<=', $DateTo);
        }
        $AccidentCount  = $AccidentCount->get()->count();

        // 
        $AbsenceCount   = RiderAbsence::where('IDCompany', $Company->IDCompany)->where('AbsenceActive', 1);
        if ($DateFrom) {
            $AbsenceCount     = $AbsenceCount->where('AbsenceDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $AbsenceCount     = $AbsenceCount->where('AbsenceDate', '<=', $DateTo);
        }
        $AbsenceCount   = $AbsenceCount->get()->count();

        // 
        $AcceptCount    = RiderAcceptOrder::where('IDCompany', $Company->IDCompany)->where('AcceptActive', 1);
        $AcceptAccept   = RiderAcceptOrder::where('IDCompany', $Company->IDCompany)->where('AcceptActive', 1);
        $AcceptRefuse   = RiderAcceptOrder::where('IDCompany', $Company->IDCompany)->where('AcceptActive', 1);
        if ($DateFrom) {
            $AcceptCount     = $AcceptCount->where('AcceptDate', '>=', $DateFrom);
            $AcceptAccept     = $AcceptAccept->where('AcceptDate', '>=', $DateFrom);
            $AcceptRefuse     = $AcceptRefuse->where('AcceptDate', '>=', $DateFrom);
        }
        if ($DateTo) {
            $AcceptCount     = $AcceptCount->where('AcceptDate', '<=', $DateTo);
            $AcceptAccept     = $AcceptAccept->where('AcceptDate', '<=', $DateTo);
            $AcceptRefuse     = $AcceptRefuse->where('AcceptDate', '<=', $DateTo);
        }
        $AcceptCount    = $AcceptCount->get()->count();
        $AcceptAccept   = $AcceptAccept->where('AcceptType', 'ACCEPT')->get()->count();
        $AcceptRefuse   = $AcceptRefuse->where('AcceptType', 'REFUSE')->get()->count();

        return response([
            'Success'       => true,
            'MessageEn'     => 'Home Page',
            'MessageAr'     => 'صفحة الرئيسية',
            // 
            'OrderTotal'    => (string)$OrderTotal,
            'OrderCount'    => (string)$OrderCount,
            'OrderAccept'   => (string)$OrderAccept,
            'OrderCancel'   => (string)$OrderCancel,
            //
            'BonusTotal'    => (string)$BonusTotal,
            'BonusCount'    => (string)$BonusCount,
            //
            'LateCount'     => (string)$LateCount,
            //
            'BreakCount'    => (string)$BreakCount,
            //
            'AbsenceCount'  => (string)$AbsenceCount,
            //
            'AnnualCount'   => (string)$AnnualCount,
            //
            'AccidentCount' => (string)$AccidentCount,
            //
            'AcceptCount'   => (string)$AcceptCount,
            'AcceptAccept'  => (string)$AcceptAccept,
            'AcceptRefuse'  => (string)$AcceptRefuse,
        ], 200);
    }
}
