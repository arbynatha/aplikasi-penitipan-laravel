<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsTamu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // melakukan checking apabila user sudah dalam keadaan login
        if(Auth::check()){
            return redirect('index')->with('success','Kamu sudah dalam keadaan Login');
        }
        return $next($request);
    }
}
