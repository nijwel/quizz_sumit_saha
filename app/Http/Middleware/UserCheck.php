<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserCheck
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
        if(auth()->check() && (auth()->user()->status == 1)){
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('warning', 'Your Account need approval by admin, please wait for approval.');

        }elseif(auth()->check() && (auth()->user()->status == 3)){
        	Auth::logout();

        	$request->session()->invalidate();

        	$request->session()->regenerateToken();

        	return redirect()->route('login')->with('error', 'Your Account is rejected, please contact with admin');
        }

        return $next($request);
    }
}
