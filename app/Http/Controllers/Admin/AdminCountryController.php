<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminCountryController extends Controller
{
    public function CountryList()
    {
        $Countries = Country::all();
        return view('admin.country.list', compact('Countries'));
    }

    public function CountryAdd()
    {
        return view('admin.country.add');
    }

    public function CountryStore(Request $request)
    {
        $request->validate([
            'CountryNameEn'     => ['required', 'unique:countries'],
            'CountryNameAr'     => ['required', 'unique:countries'],
            'CountryUTC'        => ['required', 'date_format:H:i'],
            'CountryOperation'  => ['required', 'in:+,-'],
        ]);

        $Country = new Country();
        $Country->CountryNameEn     = $request->CountryNameEn;
        $Country->CountryNameAr     = $request->CountryNameAr;
        $Country->CountryUTC        = $request->CountryUTC;
        $Country->CountryOperation  = $request->CountryOperation;
        $Country->save();

        return redirect()->route('admin.country.list')->with(['Message' => 'Add Successfuly']);
    }

    public function CountryEdit(Country $Country)
    {
        return view('admin.country.edit', compact('Country'));
    }

    public function CountryUpdate(Request $request, Country $Country)
    {
        $request->validate([
            'CountryNameEn'     => ['required'],
            'CountryNameAr'     => ['required'],
            'CountryUTC'        => ['required', 'date_format:H:i'],
            'CountryOperation'  => ['required', 'in:+,-'],
        ]);

        $Country->CountryNameEn     = $request->CountryNameEn;
        $Country->CountryNameAr     = $request->CountryNameAr;
        $Country->CountryUTC        = $request->CountryUTC;
        $Country->CountryOperation  = $request->CountryOperation;
        $Country->save();

        return redirect()->route('admin.country.list')->with(['Message' => 'Edit Successfuly']);
    }

    public function CountryActive(Country $Country)
    {
        $Country->CountryActive = !$Country->CountryActive;
        $Country->save();
        return redirect()->route('admin.country.list')->with(['Message' => 'Change Successfuly']);
    }
}
