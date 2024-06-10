<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComitteeSettingsController extends Controller
{
    public function comitteeSettings(Request $request)
    {
        $comitteeID = Auth::guard('committees')->id();

        return view('comittee.Settings', compact('comitteeID'));
    }

    public function updateUser(Request $request, Committee $user)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user->update($data);
        return redirect()->route('UpdateUser', ['user'=>Auth::guard('committees')->id()])->with('status', 'Updated Successfully');
    }

    public function DeleteAccount(Committee $user, Request $request)
    {
        $user->delete();
        return redirect()->route('admin.login')->with('status', 'Committee account deleted successfully');
    }


}
