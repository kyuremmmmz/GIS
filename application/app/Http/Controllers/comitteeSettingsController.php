<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
        ]);
        $user->update($data);
        return redirect()->route('UpdateUser', ['user'=>Auth::guard('committees')->id()])->with('status', 'Updated Successfully');
    }

    public function UpdatePassword(Request $request, Committee $user)
    {
        $data = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $updatePassword = $user->update([
            'password' => Hash::make($data['password']), // Hash the new password
        ]);
        if ($updatePassword) {
            return redirect()->route('UpdatePassword', ['user'=>Auth::guard('committees')->id()])->with('status', 'Updated Successfully');
        }else{
            return redirect()->route('UpdatePassword', ['user'=>Auth::guard('committees')->id()])->with('status', 'Wrong Current Password');
        }

    }

}
