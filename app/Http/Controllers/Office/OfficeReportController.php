<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Rider;
use App\Models\RiderShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeReportController extends Controller
{
    public function ReportList(Request $request)
    {
        $Office     = Auth::guard('office')->user();
        $Riders     = Rider::where('IDOffice', $Office->IDOffice)->get();
        $Companies  = Company::all();
        $DateFrom   = $request->DateFrom;
        $DateTo     = $request->DateTo;

        switch (request()->segment(3)) {
            case 'shift':
                return view('office.report.shift', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'order':
                return view('office.report.order', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'accident':
                return view('office.report.accident', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'annual':
                return view('office.report.annual', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'accept':
                return view('office.report.accept', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'absence':
                return view('office.report.absence', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'late':
                return view('office.report.late', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'bonus':
                return view('office.report.bonus', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'break':
                return view('office.report.break', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            case 'feedback':
                return view('office.report.feedback', compact('Riders', 'Companies', 'DateFrom', 'DateTo'));
                break;

            default:
                # code...
                break;
        }
    }
}
