<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function adminSettings()
    {
        return view('Settings');
    }
}
