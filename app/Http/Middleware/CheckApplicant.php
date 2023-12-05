<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApplicant
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->type == "Applicant") {
            return $next($request);
        }

        return back()->with('warning', 'Only Applicant has permission.');
    }
}
