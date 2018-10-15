<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class CertManagerMiddleware
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
        if (Auth::user()->hasPermissionTo('Administer roles & permissions')){
            return $next($request);
        } else if (!Auth::user()->hasPermissionTo('Certificate Manager'))
         {
                abort('401','Sorry you are not Authorized');
            } 
         else {
                return $next($request);
            }
        
    }
}
