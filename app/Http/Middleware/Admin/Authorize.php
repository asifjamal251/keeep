<?php

namespace App\Http\Middleware\Admin;

use Closure;

class Authorize
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $ability
     * @param  array|null  $models
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function handle($request, Closure $next, $ability)
    {
        if(!auth('admin')->user()->can($ability)){
            abort(403, 'This action is unauthorized.');
            // return redirect()->back();
        }

        return $next($request);
    }

   
}