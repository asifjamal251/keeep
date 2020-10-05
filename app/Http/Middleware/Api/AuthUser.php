<?php
namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
class AuthUser
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

    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }



    public function handle($request, Closure $next)
    {
        $this->auth->authenticate();
        // $this->authenticate([]);
        return $next($request);
    }


    protected function authenticate(array $guards)
    {
        if (empty($guards)) {
            return $this->auth->authenticate();
        }

        if ($this->auth->guard($guard)->check()) {
            return $this->auth->shouldUse($guard);
        }
        
    }

   
}