<?php

namespace App\Http\Middleware;

use App\Entity\Authentication;
use App\User;
use Closure;

class AdminMiddleware
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
        if (Authentication::isAuthenticate(Authentication::admin()) == false) {
            return response(view('errors.401'));
        }
        return $next($request);
    }
}
