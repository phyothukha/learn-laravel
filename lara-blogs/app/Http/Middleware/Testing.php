<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Testing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $num): Response
    {
        // logger("I am global middleware");
        // logger($num);
        dd($num);
        if (Auth::id() !== 11) {
            abort(404);
        }
        // dd("I am Gloabel");

        return $next($request);
    }
}
