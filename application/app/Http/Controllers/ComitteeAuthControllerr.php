<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ComitteeAuthControllerr extends Controller
{
    public function Creater(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comitteeID' => ['required', 'string', 'max:255', 'unique:committees', 'regex:/^04[\s-]*\d+[\s-]*\d+[\s-]*\d+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:committees'],
            'password' => ['required', 'confirmed', 'string', 'min:8'],
        ]);

        $comittee = Committee::create([
            'name' => $request->name,
            'comitteeID' => $request->comitteeID,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Use bcrypt() to hash the password
        ]);

        Auth::guard('comittee')->login($comittee);

        return redirect(route('top3'));
    }

    public function seeLogin()
    {
        return view('comitteeAuth.adminLogin');
    }

    public function CreateUser(Request $request): RedirectResponse
    {
        $request->validate([
            'comitteeID' =>'required|string|max:70',
            'password' => 'required|string|max:8',
        ]);

        if (Auth::guard('comittee')->attempt($request->only('comitteeID', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('top3'));
        }

        return back()->withErrors([
            'auth_error' =>'Invalid credentials'
        ])->withInput([$request->only('comitteeID')])->with('status', 'Credentials are invalid');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(route('admin.seeLogin'));
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function users(){
        $selectUsers = User::select(['id', 'Adminname', 'email', 'adminID'],
                                    DB::raw('SUM(adminID) OVER (PARTITION by Adminname) AS admins'),
                                    )
                                    ->where('role', 'like', '%admin%')
                                    ->get();

        return view('comitteeAuth/users', compact('selectUsers'));
    }

    public function deleteUsers(User $adminID)
    {
        $adminID->delete();

        return redirect(route('game1.index'))->with('adminID', 'Deleted Successfully');
    }
}
