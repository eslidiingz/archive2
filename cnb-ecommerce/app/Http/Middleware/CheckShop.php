<?php

namespace App\Http\Middleware;

use Closure;
use App\Shops;
use Auth;

class CheckShop
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
        $user_shops = shops::Where('user_id', Auth::user()->id)->first();
        if (!isset($user_shops)) {
            return redirect('welcome');
        }
        return $next($request);
    }
}
