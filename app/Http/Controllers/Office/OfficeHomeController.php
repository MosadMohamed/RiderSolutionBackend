<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\ActionBackLog;
use App\Models\Complaint;
use App\Models\OfficeMember;
use App\Models\Rider;
use App\Models\RiderBonus;
use App\Models\RiderOrder;
use App\Models\RiderShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfficeHomeController extends Controller
{
    public function OfficeHome()
    {
        $Office     = Auth::guard('office')->user();
        $Riders     = Rider::where('IDOffice', $Office->IDOffice)->get();
        $Shifts     = RiderShift::whereIn('IDRider', $Riders->pluck('IDRider'))->get();
        $Orders     = RiderOrder::whereIn('IDRider', $Riders->pluck('IDRider'))->get();
        $Bonus      = RiderBonus::whereIn('IDRider', $Riders->pluck('IDRider'))->get();
        return view('office.home', compact('Riders', 'Shifts', 'Orders', 'Bonus'));
    }

    public function InfoList()
    {
        $Office = Auth::guard('office')->user();
        $OfficeMembers = OfficeMember::where('IDOffice', $Office->IDOffice)
            ->where('OfficeMemberActive', 1)->get();
        return view('office.info.list', compact('OfficeMembers'));
    }

    public function InfoAdd(Request $request)
    {
        $request->validate([
            'OfficeMemberType'  => ['required'],
            'OfficeMemberName'  => ['required'],
            'OfficeMemberPhone' => ['required'],
        ]);

        $Office = Auth::guard('office')->user();

        $OfficeMember = new OfficeMember();
        $OfficeMember->IDOffice             = $Office->IDOffice;
        $OfficeMember->OfficeMemberType     = $request->OfficeMemberType;
        $OfficeMember->OfficeMemberName     = $request->OfficeMemberName;
        $OfficeMember->OfficeMemberPhone    = $request->OfficeMemberPhone;
        $OfficeMember->save();

        ActionBackLog::create([
            'UserType'          => 'OFFICE',
            'IDUser'            => $Office->IDOffice,
            'ActionBackLog'     => 'OFFICE_ADD_MEMBER',
            'ActionBackLogDesc' => 'Office Add Member ID =>' . $OfficeMember->IDOfficeMember,
        ]);

        return redirect()->back()->with(['Message' => 'Add Successfuly']);
    }

    public function InfoEdit(Request $request, OfficeMember $OfficeMember)
    {
        $request->validate([
            'OfficeMemberType'  => ['required'],
            'OfficeMemberName'  => ['required'],
            'OfficeMemberPhone' => ['required'],
        ]);

        $Office = Auth::guard('office')->user();

        $OfficeMember->OfficeMemberType     = $request->OfficeMemberType;
        $OfficeMember->OfficeMemberName     = $request->OfficeMemberName;
        $OfficeMember->OfficeMemberPhone    = $request->OfficeMemberPhone;
        $OfficeMember->save();

        ActionBackLog::create([
            'UserType'          => 'OFFICE',
            'IDUser'            => $Office->IDOffice,
            'ActionBackLog'     => 'OFFICE_EDIT_MEMBER',
            'ActionBackLogDesc' => 'Office Edit Member ID =>' . $OfficeMember->IDOfficeMember,
        ]);

        return redirect()->back()->with(['Message' => 'Edit Successfuly']);
    }

    public function ComplaintList()
    {
        $Office = Auth::guard('office')->user();
        $OfficeComplaints = Complaint::where('UserType', 'OFFICE')->where('IDUser', $Office->IDOffice)->get();
        return view('office.complaint.list', compact('OfficeComplaints'));
    }

    public function ComplaintAdd(Request $request)
    {
        $request->validate([
            'ComplaintText' => ['required'],
        ]);

        $Office = Auth::guard('office')->user();

        $Complaint = new Complaint();
        $Complaint->UserType        = 'OFFICE';
        $Complaint->IDUser          = $Office->IDOffice;
        $Complaint->ComplaintText   = $request->ComplaintText;
        $Complaint->save();

        ActionBackLog::create([
            'UserType'          => 'OFFICE',
            'IDUser'            => $Office->IDOffice,
            'ActionBackLog'     => 'OFFICE_MAKE_COMPLAINT',
            'ActionBackLogDesc' => 'Office Make Complaint ID =>' . $Complaint->IDComplaint,
        ]);

        return redirect()->route('office.complaint.list');
    }
}
