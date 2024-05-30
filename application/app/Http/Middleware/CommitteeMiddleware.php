<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CommitteeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if user is authenticated and has the 'committee' role
        if (!Auth::check() || Auth::user()->role !== 'committee') {
            return redirect(route('admin.login')); // Redirect if not authorized
        }

        return $next($request);
    }
}
