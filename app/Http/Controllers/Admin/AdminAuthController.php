<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login');
    }

    public function AdminLoginSubmit(Request $request)
    {
        $request->validate([
            'UserEmail'     => ['required', 'max:255', 'email:filter', 'exists:users'],
            'UserPassword'  => ['required'],
        ]);

        $User = User::where('UserEmail', $request->UserEmail)->first();

        if (!$User) {
            return redirect()->back()->withErrors('User Not Found');
        }

        if (!Hash::check($request->UserPassword, $User->UserPassword)) {
            return redirect()->back()->withErrors('An Error');
        }

        if (!$User->UserActive) {
            return redirect()->back()->withErrors('User Not Active');
        }

        Auth::login($User);

        return redirect()->route('admin.home');
    }

    public function AdminLogout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
