<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
class AdminLoginController extends Controller
{
    public function createUser(User $user ,Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:225',
            'email'=>'required|string|max:70',
            'adminID'=>'required|string|max:16|',
            'password'=>'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'adminID'=>$data['adminID'],
            'password'=>bcrypt($data['password']),
            'remember_token'=>Str::random(60),
        ]);

        Auth::login($user);

        return redirect()->route('game.index');
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

    public function forgotpassword()
    {
        return view('admin.adminForgotpass');
    }

    public function forgotpasswordFunctionality(Request $request)
    {
        $request->validate(['email'=> 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
    }

    public function users(){
        $selectUsers = User::select('*', DB::raw('COUNT(adminID) OVER (PARTITION by name) AS admins'))->get();

        return view('admin.users', compact('selectUsers'));
    }

    public function deleteUsers(User $adminID)
    {
        $adminID->delete();

        return redirect(route('game1.index'))->with('adminID', 'Deleted Successfully');
    }
}
