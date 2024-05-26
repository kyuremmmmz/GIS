<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function createUser(Request $request)
    {
        $request->validate([
            'adminID'=>'required|string|max:16|',
            'password'=>'required',
            'confirmPassword'=>'required',
        ]);
        return view('admin.admin');
    }
}
