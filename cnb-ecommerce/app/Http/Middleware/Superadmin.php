<?php

namespace App\Http\Middleware;

use Closure;

class Superadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->type == "superadmin") {
            return $next($request);
        } else {
            // abort(403, 'Unauthorized action.');
            return redirect("dashboard");
        }
    }
}
