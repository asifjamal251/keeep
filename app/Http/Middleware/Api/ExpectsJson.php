<?php
namespace App\Http\Middleware\Api;

use Closure;

class ExpectsJson
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
    public function handle($request, Closure $next)
    {
        if (!$request->expectsJson()) {
            return response()->json(['error'=>true,'message'=>'Not valid request']);
        }

        return $next($request);
    }

   
}