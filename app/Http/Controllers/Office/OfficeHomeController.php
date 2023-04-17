<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficeHomeController extends Controller
{
    public function OfficeHome()
    {
        return view('office.home');
    }
}
