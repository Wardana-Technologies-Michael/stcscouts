<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Allow the request through only when the admin session flag is set
     * (established by entering the shared password on the login page).
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('is_admin')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
