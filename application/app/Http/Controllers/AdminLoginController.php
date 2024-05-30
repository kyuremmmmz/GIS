<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailIDAndPassword;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;

use function Symfony\Component\Clock\now;

class AdminLoginController extends Controller
{
    public function createUser(User $user ,Request $request)
    {



        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comitteeID' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^04[\s-]*\d+[\s-]*\d+[\s-]*\d+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' =>['required', 'string',]
        ]);




        $user = User::create([
            'name' => $request->name,
            'comitteeID' => $request->comitteeID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email_verified_at' => now()
        ]);

        $comitteeID = $request->comitteeID ?? 'N/A'; // Default value if null
        $password = $request->password ?? 'N/A';

        $details = [
            'greeting' => 'Good Day University of Perpetual Help System Dalta - Molino Campus Comittee member',
            'body' => 'This is your Account Details
                        <br>comitteeID:'.$comitteeID.'
                        <br>Password:'.$password.'',
            'action' => route('admin.seeLogin'),
            'lastline' => 'No reply'
        ];

        $users = User::where('comitteeID', $request->comitteeID)->get();

        Notification::send($users, new EmailIDAndPassword($details));


        event(new Registered($user));



        Auth::login($user);

        return redirect(route('user', absolute: false));
    }



    public function seeLogin()
    {
        return view('admin.adminLogin');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'comitteeID' =>'required|string|max:70',
            'password' => 'required|string|max:8',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended(route('game1.index'));
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

    public function forgotpassword()
    {
        return view('admin.adminForgotpass');
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

        return view('admin.users', compact('selectUsers'));
    }

    public function deleteUsers(User $adminID)
    {
        $adminID->delete();

        return redirect(route('game1.index'))->with('adminID', 'Deleted Successfully');
    }
}
