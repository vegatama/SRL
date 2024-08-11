<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekKelas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$kelas)
    {
        if(in_array($request->user()->class,$kelas)){
            return $next($request);
        }
        return view('/');
    }
}
