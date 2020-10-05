<?php

namespace App\Http\Middleware\User;

use Closure;
use Auth;
class RedirectIfAuthenticated
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
        if (Auth::guard('user')->check()) {
            if ($request->expectsJson()) {
                return response()->json(['authenticated'=>true,'message'=>'Please login first','redirect'=>url('login'),'data'=>auth()->user()],403);
            }
            return redirect()->route('web.home');
        }
        return $next($request);
    }
}