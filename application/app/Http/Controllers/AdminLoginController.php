<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminLoginController extends Controller
{
    public function createUser(AdminModel $adminModel ,Request $request)
    {
        $datavalidation = $request->validate([
            'name' => 'required|string|max:225',
            'email'=>'required|string|max:70',
            'adminID'=>'required|string|max:16|',
            'password'=>'required|string|max:8|confirmed',
        ]);


        $user = new User();

        $user->name = $datavalidation['name'];
        $user->adminID = $datavalidation['adminID'];
        $user->email =  $datavalidation['email'];
        $user->password = bcrypt($datavalidation['password']);
        $user->remember_token = Str::random(60);
        $user->save();
        if (Auth::check()) {
            return redirect()->route('game.index')->with('user', $user);
        } else {
            return view('admin.admin');
        }





    }


    public function see()
    {
        return view('admin.admin');
    }

    public function seeLogin()
    {
        return view('admin.adminLogin');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'adminID' =>'required|string|max:70',
            'password' => 'required|string|max:8',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended(route('game1.index'));
        }
        return back()->withErrors([
            'auth_error' =>'Invalid credentials'
        ])->withInput([$request->only('adminID')])->with('status', 'Credentials are invalid');
        }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(route('admin.seeLogin'));
    }
}
