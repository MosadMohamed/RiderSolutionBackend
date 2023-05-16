<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminOfficeController extends Controller
{
    public function OfficeList()
    {
        $Offices = Office::all();
        return view('admin.office.list', compact('Offices'));
    }

    public function OfficeAdd()
    {
        return view('admin.office.add');
    }

    public function OfficeStore(Request $request)
    {
        $request->validate([
            'OfficeName'        => ['required'],
            'OfficeEmail'       => ['required', 'email:filter', 'unique:offices'],
            'OfficePhone'       => ['required', 'unique:offices'],
            'OfficeAddress'     => ['required'],
            'OfficePassword'    => ['required'],
        ]);

        $Office = new Office();
        $Office->OfficeName     = $request->OfficeName;
        $Office->OfficeEmail    = $request->OfficeEmail;
        $Office->OfficePhone    = $request->OfficePhone;
        $Office->OfficePassword = Hash::make($request->OfficePassword);
        $Office->OfficeAddress  = $request->OfficeAddress;
        $Office->save();

        return redirect()->route('admin.office.list')->with(['Message' => 'Add Successfuly']);
    }

    public function OfficeEdit(Office $Office)
    {
        return view('admin.office.edit', compact('Office'));
    }

    public function OfficeUpdate(Request $request, Office $Office)
    {
        $request->validate([
            'OfficeName'        => ['required'],
            'OfficeEmail'       => ['required', 'email:filter'],
            'OfficePhone'       => ['required'],
            'OfficeAddress'     => ['required'],
        ]);

        $OfficeEmail = $request->OfficeEmail;
        $OfficePhone = $request->OfficePhone;

        $Check = Office::where('IDOffice', '<>', $Office->IDOffice)
            ->where(function ($query) use ($OfficeEmail, $OfficePhone) {
                $query->where('OfficeEmail', $OfficeEmail)->orWhere('OfficePhone', $OfficePhone);
            })->first();

        if ($Check) {
            return redirect()->back()->withErrors(['Email or Phone Already Exist']);
        }

        $Office->OfficeName     = $request->OfficeName;
        $Office->OfficeEmail    = $request->OfficeEmail;
        $Office->OfficePhone    = $request->OfficePhone;
        $Office->OfficeAddress  = $request->OfficeAddress;
        if ($request->OfficePassword) {
            $Office->OfficePassword = Hash::make($request->OfficePassword);
        }
        $Office->save();

        return redirect()->route('admin.office.list')->with(['Message' => 'Edit Successfuly']);
    }

    public function OfficeActive(Office $Office)
    {
        $Office->OfficeActive = !$Office->OfficeActive;
        $Office->save();
        return redirect()->route('admin.office.list')->with(['Message' => 'Change Successfuly']);
    }
}
