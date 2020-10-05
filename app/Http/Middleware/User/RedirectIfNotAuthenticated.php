<?php

namespace App\Http\Middleware\User;

use Closure;
use Auth;
class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            if ($request->expectsJson()) {
                return response()->json(['authenticated'=>false,'message'=>'Please login first','redirect'=>url('login'),'data'=>null],401);
            }
            return redirect()->route('user.login.form');
        }
        return $next($request);
    }
}