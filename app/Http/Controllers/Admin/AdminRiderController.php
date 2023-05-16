<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRiderController extends Controller
{
    public function RiderList()
    {
        $Riders = Rider::where('IsUploaded', 1)->where('RiderActive', 1)->get();
        return view('admin.rider.list', compact('Riders'));
    }

    public function RiderNew()
    {
        $Riders = Rider::where('IsUploaded', 0)->orWhere('RiderActive', 0)->get();
        return view('admin.rider.new', compact('Riders'));
    }

    public function RiderAdd()
    {
        return view('admin.rider.add');
    }

    public function RiderStore(Request $request)
    {
        $request->validate([
            'RiderNationalID'   => ['required', 'unique:riders'],
            'IDOffice'          => ['required', 'exists:offices'],
            'RiderName'         => ['required'],
            'RiderPhone'        => ['required', 'unique:riders'],
            'RiderPassword'     => ['required'],
            'RiderBirthDate'    => ['required'],
        ]);

        $Rider = new Rider();
        $Rider->IDOffice        = $request->IDOffice;
        $Rider->IDCountry       = 1;
        $Rider->RiderNationalID = $request->RiderNationalID;
        $Rider->RiderName       = $request->RiderName;
        $Rider->RiderPhone      = $request->RiderPhone;
        $Rider->RiderEmail      = $request->RiderEmail;
        $Rider->RiderPassword   = Hash::make($request->RiderPassword);
        $Rider->RiderBirthDate  = $request->RiderBirthDate;
        $Rider->RiderGender     = $request->RiderGender;
        $Rider->IsRider         = ($request->IsRider) ? 1 : 0;
        $Rider->IsPicker        = ($request->IsPicker) ? 1 : 0;
        if ($request->IsRider) {
            $Rider->VehlcleType = $request->VehlcleType;
        }
        $Rider->save();

        return redirect()->route('admin.rider.list')->with(['Message' => 'Add Successfuly']);
    }

    public function RiderActive(Rider $Rider)
    {
        if ($Rider->RiderActive) {
            $Rider->RiderActive = 0;
        } else {
            $Rider->RiderActive = 1;
            $Rider->IsUploaded  = 1;
        }
        // $Rider->RiderActive = !$Rider->RiderActive;
        $Rider->save();
        return redirect()->back()->with(['Message' => 'Change Successfuly']);
        return redirect()->route('admin.rider.list')->with(['Message' => 'Change Successfuly']);
    }

    public function RiderUpload(Rider $Rider)
    {
        $Rider->IsUploaded  = 0;
        $Rider->RiderActive = 0;
        $Rider->save();
        return redirect()->back()->with(['Message' => 'Change Successfuly']);
        return redirect()->route('admin.rider.list')->with(['Message' => 'Change Successfuly']);
    }

    public function RiderDocument(Rider $Rider)
    {
        $Documents = $Rider->Documents->where('DocumentActive', 1);
        return view('admin.rider.document', compact('Rider', 'Documents'));
    }
}
