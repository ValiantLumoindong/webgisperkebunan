<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckVerified
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->verified == false) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is not verified yet.');
        }

        return $next($request);
    }
}
