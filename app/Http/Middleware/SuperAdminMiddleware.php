<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\UnthorizedException;

class SuperAdminMiddleware
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
        if(auth()->check()) {
            if( ! $request->user()->isSuperAdmin()){
                throw new UnthorizedException('This area is for Super Admin only. Access denied !');
            }
        }
        return $next($request);
    }
}
