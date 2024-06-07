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
        return view('auth.ComitteeForgotPassword');
    }

    /**
     * Handle an incoming password reset link request for committee.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
}
