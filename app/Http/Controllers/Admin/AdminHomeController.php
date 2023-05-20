<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActionBackLog;
use App\Models\Complaint;
use App\Models\Rider;
use App\Models\RiderBonus;
use App\Models\RiderOrder;
use App\Models\RiderShift;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function AdminHome()
    {
        $Riders     = Rider::all();
        $Shifts     = RiderShift::all();
        $Orders     = RiderOrder::all();
        $Bonus      = RiderBonus::all();
        return view('admin.home', compact('Riders', 'Shifts', 'Orders', 'Bonus'));
    }

    public function ActionBackLog(Request $request)
    {
        switch (request()->segment(3)) {
            case 'rider':
                $Logs = ActionBackLog::where('UserType', 'RIDER')
                    ->leftjoin('riders', 'riders.IDRider', 'actionbacklogs.IDUser')
                    ->select(
                        'actionbacklogs.ActionBackLog as Action',
                        'actionbacklogs.ActionBackLogDesc as Desc',
                        'riders.IDRider as ID',
                        'riders.RiderName as Name',
                        'actionbacklogs.created_at as Time'
                    )->get();
                $Type = 'Rider';
                return view('admin.log.list', compact('Logs', 'Type'));
                break;

            case 'office':
                $Logs = ActionBackLog::where('UserType', 'OFFICE')
                    ->leftjoin('offices', 'offices.IDOffice', 'actionbacklogs.IDUser')
                    ->select(
                        'actionbacklogs.ActionBackLog as Action',
                        'actionbacklogs.ActionBackLogDesc as Desc',
                        'offices.IDOffice as ID',
                        'offices.OfficeName as Name',
                        'actionbacklogs.created_at as Time'
                    )->get();
                $Type = 'Office';
                return view('admin.log.list', compact('Logs', 'Type'));
                break;

            case 'company':
                $Logs = ActionBackLog::where('UserType', 'COMPANY')
                    ->leftjoin('companies', 'companies.IDCompany', 'actionbacklogs.IDUser')
                    ->select(
                        'actionbacklogs.ActionBackLog as Action',
                        'actionbacklogs.ActionBackLogDesc as Desc',
                        'companies.IDCompany as ID',
                        'companies.CompanyNameEn as Name',
                        'actionbacklogs.created_at as Time'
                    )->get();
                $Type = 'Company';
                return view('admin.log.list', compact('Logs', 'Type'));
                break;

            case 'integration':
                $Logs = ActionBackLog::where('UserType', 'INTEGRATION')
                    ->leftjoin('companies', 'companies.IDCompany', 'actionbacklogs.IDUser')
                    ->select(
                        'actionbacklogs.ActionBackLog as Action',
                        'actionbacklogs.ActionBackLogDesc as Desc',
                        'companies.IDCompany as ID',
                        'companies.CompanyNameEn as Name',
                        'actionbacklogs.created_at as Time'
                    )->get();
                $Type = 'Integration';
                return view('admin.log.list', compact('Logs', 'Type'));
                break;

            default:
                # code...
                break;
        }
    }

    public function ComplaintList(Request $request)
    {
        switch (request()->segment(3)) {
            case 'rider':
                $Complaints = Complaint::where('ComplaintActive', 1)
                    ->where('UserType', 'RIDER')
                    ->leftjoin('riders', 'riders.IDRider', 'complaints.IDUser')
                    ->select(
                        'complaints.ComplaintText as Text',
                        'complaints.ComplaintReplied as Replied',
                        'riders.IDRider as ID',
                        'riders.RiderName as Name',
                        'complaints.created_at as Time'
                    )->get();
                $Type = 'Rider';
                return view('admin.complaint.list', compact('Complaints', 'Type'));
                break;

            case 'office':
                $Complaints = Complaint::where('ComplaintActive', 1)
                    ->where('UserType', 'OFFICE')
                    ->leftjoin('offices', 'offices.IDOffice', 'complaints.IDUser')
                    ->select(
                        'complaints.ComplaintText as Text',
                        'complaints.ComplaintReplied as Replied',
                        'offices.IDOffice as ID',
                        'offices.OfficeName as Name',
                        'complaints.created_at as Time'
                    )->get();
                $Type = 'Office';
                return view('admin.complaint.list', compact('Complaints', 'Type'));
                break;

            case 'company':
                $Complaints = Complaint::where('ComplaintActive', 1)
                    ->where('UserType', 'COMPANY')
                    ->leftjoin('companies', 'companies.IDCompany', 'complaints.IDUser')
                    ->select(
                        'complaints.ComplaintText as Text',
                        'complaints.ComplaintReplied as Replied',
                        'companies.IDCompany as ID',
                        'companies.CompanyNameEn as Name',
                        'complaints.created_at as Time'
                    )->get();

                $Type = 'Company';
                return view('admin.complaint.list', compact('Complaints', 'Type'));
                break;

            default:
                # code...
                break;
        }
    }
}
