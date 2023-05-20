<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\ActionBackLog;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OfficeAuthController extends Controller
{
    public function OfficeLogin()
    {
        return view('office.login');
    }

    public function OfficeLoginSubmit(Request $request)
    {
        $request->validate([
            'OfficeEmail'     => ['required', 'max:255', 'email:filter', 'exists:offices'],
            'OfficePassword'  => ['required'],
        ]);

        $Office = Office::where('OfficeEmail', $request->OfficeEmail)->first();

        if (!$Office) {
            return redirect()->back()->withErrors('Office Not Found');
        }

        if (!Hash::check($request->OfficePassword, $Office->OfficePassword)) {
            return redirect()->back()->withErrors('An Error');
        }

        if (!$Office->OfficeActive) {
            return redirect()->back()->withErrors('Office Not Active');
        }

        Auth::guard('office')->login($Office);

        ActionBackLog::create([
            'UserType'          => 'OFFICE',
            'IDUser'            => $Office->IDOffice,
            'ActionBackLog'     => 'OFFICE_LOGIN',
            'ActionBackLogDesc' => 'Office Login',
        ]);

        return redirect()->route('office.home');
    }

    public function OfficeLogout()
    {
        Auth::guard('office')->logout();
        return redirect()->route('office.login');
    }
}
