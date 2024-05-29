<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserAccountDetailsMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }


    public function createComittee()
    {
        return view('admin.users');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'adminID' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^03[\s-]*\d+[\s-]*\d+[\s-]*\d+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'adminID.regex' => 'The adminID must start with 03.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'adminID' => $request->adminID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }



    public function storeComittee(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comitteeID'  => ['required', 'string', 'max:255', 'unique:users', 'regex:/^04[\s-]*\d+[\s-]*\d+[\s-]*\d+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'  => ['required', 'string', 'lowercase', 'email']
        ], [
            'comitteeID.regex' => 'The Comittee ID must start with 04.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'comitteeID' => $request->comitteeID,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),

        ]);

        $password  = $request->password;
        $comitteeID = $request->comitteeID;

        Mail::to($user->email)->send(new UserAccountDetailsMail($user, $comitteeID, $password));

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('user', absolute: false));
    }
}
