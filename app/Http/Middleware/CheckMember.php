<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMember
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->type == "Member") {
            return $next($request);
        }

        return back()->with('warning', 'Only Member has permission.');
    }
}
