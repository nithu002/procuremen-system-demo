<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Procurementlogin
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
        elseif ( Session()->has('loginId')&&(url('/procurementPanel')==$request->url()) ) {
            return redirect('procurementPanel/lock');
        }
        return $next($request);
    }
}
