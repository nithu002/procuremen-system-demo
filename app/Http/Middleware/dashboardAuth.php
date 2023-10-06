<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class dashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Session()->has('loginId')&&(url('/')==$request->url())){
            return back();
        }

        elseif ( Session()->has('loginId')&&(url('/admin')==$request->url()) ) {
            return redirect('lockscreen');
        }
        return $next($request);
    }
}
