<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class comitteeReset extends Controller
{
    /**
     * Display the password reset link request view for committee.
     */
    public function PasswordCreate(): View
    {
        return view('comitteeAuth.ComitteeForgotPassword');
    }

    public function PasswordStore(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }

    /**
     * Handle an incoming password reset link request for committee.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
}
