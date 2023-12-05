<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckManager
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->type == "Manager") {
            return $next($request);
        }

        return back()->with('warning', 'Only Manager has permission.');
    }
}
