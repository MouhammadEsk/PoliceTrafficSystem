<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Dashbourd\Base as Base ;
use Closure;
use Illuminate\Http\Request;

class MyAPIsKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if($request->header('authorization')==='Bearer 2|UaAwW0yWxmPwPNIOWSo0DPppi9PZaCaJavBuNRSu'){
            return $next($request);
        }
        return Base::sendError([],'can not find APIs Key',401);


    }
}
