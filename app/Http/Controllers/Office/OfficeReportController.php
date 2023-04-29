<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeReportController extends Controller
{
    public function ReportShiftList()
    {
        $Office     = Auth::guard('office')->user();
        $Riders     = Rider::where('IDOffice', $Office->IDOffice)->get();
        $Companies  = Company::all();
        return view('office.report.shift', compact('Riders', 'Companies'));
    }
}
