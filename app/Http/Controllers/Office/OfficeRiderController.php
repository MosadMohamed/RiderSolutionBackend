<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OfficeRiderController extends Controller
{
    public function RiderList()
    {
        $Office = Auth::guard('office')->user();
        $Riders = Rider::where('IDOffice', $Office->IDOffice)
            ->where('RiderActive', 1)->get();
        return view('office.rider.list', compact('Riders'));
    }

    public function RiderAdd(Request $request)
    {
        return view('office.rider.add');
    }

    public function RiderStore(Request $request)
    {
        $request->validate([
            'RiderNationalID'    => ['required', 'unique:riders'],
            'RiderName'         => ['required'],
            'RiderPhone'        => ['required', 'unique:riders'],
            'RiderPassword'     => ['required'],
            'RiderBirthDate'    => ['required'],
        ]);

        $Office = Auth::guard('office')->user();

        $Rider = new Rider();
        $Rider->IDOffice        = $Office->IDOffice;
        $Rider->IDCountry       = 1;
        $Rider->RiderNationalID = $request->RiderNationalID;
        $Rider->RiderName       = $request->RiderName;
        $Rider->RiderPhone      = $request->RiderPhone;
        $Rider->RiderPassword   = Hash::make($request->RiderPassword);
        $Rider->RiderBirthDate  = $request->RiderBirthDate;
        $Rider->RiderGender     = 'MALE';
        $Rider->IsRider         = ($request->IsRider) ? 1 : 0;
        $Rider->IsPicker        = ($request->IsPicker) ? 1 : 0;
        if ($request->IsRider) {
            $Rider->VehlcleType = $request->VehlcleType;
        }
        $Rider->save();

        return redirect()->route('office.rider.list')->with(['Message' => 'Add Successfuly']);
    }
}
