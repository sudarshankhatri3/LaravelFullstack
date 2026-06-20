<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class vendorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()||Auth::user()->role!=='vendor'){
            abort(403);
        }

        if (Auth::user()->status === 'suspended'){
            abort(403, 'Your account has been suspended.');
        }
        return $next($request);
    }
}
