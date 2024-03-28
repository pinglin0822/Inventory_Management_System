<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role !== 'admin') {
            return redirect('/dashboard')->with('error', 'You are not authorized to perform this action.');
        }

        return $next($request);
    }
}
