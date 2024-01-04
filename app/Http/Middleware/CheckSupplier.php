<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSupplier
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->type == "Supplier") {
            return $next($request);
        }

        return back()->with('warning', 'Only Supplier has permission.');
    }
}
