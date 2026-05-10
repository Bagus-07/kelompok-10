<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // NOT LOGGED IN
        if (!auth()->check()) {

            return redirect('/admin/login');
        }

        // NOT ADMIN
        if (auth()->user()->role != 'admin') {

            return redirect('/home');
        }

        return $next($request);
    }
}