<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComitteeSettingsController extends Controller
{
    public function comitteeSettings(Request $request)
    {
        $comitteeID = Auth::guard('committees')->id(); // Get the ID of the authenticated committee user

        return view('comittee.Settings', compact('comitteeID'));
    }
}
