<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Auth;
class RedirectIfNotAllowIp
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
       return $next($request);
        // $ipe=Auth::guard('admin')->user()->ip;

        // $ip=explode(',',$ipe);

        // if(Auth::guard('admin')->user()->allowed_ip==1){
        //     return $next($request);
        // }

        // elseif (in_array($request->ip(),$ip))
        // {
        //     return $next($request);

        // }
        // else{

        //     Auth::guard('admin')->logout();

        //     return redirect()->route('admin.login.form');
        // }

        
    }
}