<?php

namespace App\Http\Middleware;

use App\Enums\Privileges;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPrivilege
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->privilege !== Privileges::Admin->value) {
            abort(404);
        }
        return $next($request);
    }
}
