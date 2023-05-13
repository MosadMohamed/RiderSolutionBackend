<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Rider;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminReportController extends Controller
{
    public function ReportList(Request $request)
    {
        $Riders     = Rider::all();
        $Companies  = Company::all();
        $DateFrom   = $request->DateFrom;
        $DateTo     = $request->DateTo;

        switch (request()->segment(3)) {
            case 'shift':
                return view('admin.report.shift', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'order':
                return view('admin.report.order', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'accident':
                return view('admin.report.accident', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'annual':
                return view('admin.report.annual', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'accept':
                return view('admin.report.accept', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'absence':
                return view('admin.report.absence', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'late':
                return view('admin.report.late', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'bonus':
                return view('admin.report.bonus', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'break':
                return view('admin.report.break', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'feedback':
                return view('admin.report.feedback', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            default:
                # code...
                break;
        }
    }

    public function ReportDetails(Request $request)
    {
        $IDRider    = $request->IDRider;
        $IDCompany  = $request->IDCompany;

        $Rider      = Rider::where('IDRider', $request->IDRider)->first();
        $Company    = Company::where('IDCompany', $request->IDCompany)->first();
        $DateFrom   = $request->DateFrom;
        $DateTo     = $request->DateTo;

        switch (request()->segment(3)) {
            case 'shift':
                $Shifts = RiderShift::get();
                if ($Rider) {
                    $Shifts = $Shifts->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Shifts = $Shifts->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Shifts = $Shifts->whereBetween('ShiftDateStart', [$DateFrom, $DateTo]);
                }
                return view('admin.report.shiftdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Shifts'));
                break;

            case 'order':
                $Orders = RiderOrder::get();
                if ($Rider) {
                    $Orders = $Orders->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Orders = $Orders->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Orders = $Orders->whereBetween('OrderDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.orderdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Orders'));
                break;

            case 'accident':
                $Accidents = RiderAccident::get();
                if ($Rider) {
                    $Accidents = $Accidents->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Accidents = $Accidents->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Accidents = $Accidents->whereBetween('AccidentDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.accidentdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Accidents'));
                break;

            case 'annual':
                $Annuals = RiderAnnual::get();
                if ($Rider) {
                    $Annuals = $Annuals->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Annuals = $Annuals->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Annuals = $Annuals->whereBetween('AnnualDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.annualdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Annuals'));
                break;

            case 'accept':
                $Accepts = RiderAcceptOrder::get();
                if ($Rider) {
                    $Accepts = $Accepts->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Accepts = $Accepts->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Accepts = $Accepts->whereBetween('AcceptDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.acceptdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Accepts'));
                break;

            case 'absence':
                $Absences = RiderAbsence::get();
                if ($Rider) {
                    $Absences = $Absences->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Absences = $Absences->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Absences = $Absences->whereBetween('AbsenceDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.absencedetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Absences'));
                break;

            case 'late':
                $Lates = RiderLate::get();
                if ($Rider) {
                    $Lates = $Lates->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Lates = $Lates->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Lates = $Lates->whereBetween('LateDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.latedetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Lates'));
                break;

            case 'bonus':
                $Bonus = RiderBonus::get();
                if ($Rider) {
                    $Bonus = $Bonus->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Bonus = $Bonus->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Bonus = $Bonus->whereBetween('BonusDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.bonusdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Bonus'));
                break;

            case 'break':
                $Breaks = RiderBreak::get();
                if ($Rider) {
                    $Breaks = $Breaks->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Breaks = $Breaks->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Breaks = $Breaks->whereBetween('BreakDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.breakdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Breaks'));
                break;

            case 'feedback':
                $Feedbacks = RiderFeedback::get();
                if ($Rider) {
                    $Feedbacks = $Feedbacks->where('IDRider', $Rider->IDRider);
                }
                if ($Company) {
                    $Feedbacks = $Feedbacks->where('IDCompany', $Company->IDCompany);
                }
                if ($DateFrom && $DateTo) {
                    $Feedbacks = $Feedbacks->whereBetween('FeedbackDate', [$DateFrom, $DateTo]);
                }
                return view('admin.report.feedbackdetails', compact('IDRider', 'IDCompany', 'DateFrom', 'DateTo', 'Feedbacks'));
                break;

            default:
                # code...
                break;
        }
    }
}
