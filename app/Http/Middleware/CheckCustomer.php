<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->type == "customer") {
            return $next($request);
        }

        return back()->with('warning', 'Only Customer has permission.');
    }
}
