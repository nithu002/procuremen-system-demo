<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Financiallogin
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
        elseif ( Session()->has('loginId')&&(url('/financial')==$request->url()) ) {
            return redirect('financial/lock');
        }
        return $next($request);
    }
}