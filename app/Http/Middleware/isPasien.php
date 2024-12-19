<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isPasien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()) {
            // return response()->json('Opps! You do not have permission to access.');
            return redirect()->route('login.tampil');
        }
        if (Auth::user()->role != 'pasien') {
            // return response()->json('Opps! You do not have permission to access.');
            return redirect()->route('auth.redirect');
        }
        return $next($request);     
    }
}
