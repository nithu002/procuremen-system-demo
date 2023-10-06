<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Superlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session()->has('loginId')&&(url('/')==$request->url() )){
            return back();
        }
        elseif ( Session()->has('loginId')&&(url('/supervisor')==$request->url()) ) {
            return redirect('voiser/lock');
        }
        return $next($request);
    }
}
