<?php
namespace App\Http\Middleware\Api;

use Closure;
use Laravel\Passport\Client;

class ClientAuthorization
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
        if ($request->header('Client-Token') != 'DH#K@H8%IJ9&%*H') {
            return response()->json(['error'=>true,'message'=>'Unauthorize']);
        }
        return $next($request);
    }

   
}