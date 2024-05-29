<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public $role = 'admin';

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Adminname' => ['required', 'string', 'max:255'],
            'adminID' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^03[\s-]*\d+[\s-]*\d+[\s-]*\d+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required']

        ], [
            'adminID.regex' => 'The adminID must start with 03.',
        ]);

        $user = User::create([
            'Adminname' => $request->Adminname,
            'adminID' => $request->adminID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

}
