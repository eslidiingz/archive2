<?php

namespace App\Http\Middleware;

use Closure;
use App\balance;
use Auth;

class checkbalance
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
        if(Auth::check()){
            $CheckB = balance::Where('user_id', Auth::user()->id)->first();
            if (!isset($CheckB)) {
                balance::create([
                    'user_id' => Auth::user()->id,
                    'credit' => 0,
                    'point' => 0,
                    'coin'=> 0,
                    'seller_credit'=> 0,
                ]);
                
            }
        }
        return $next($request);
    }
}
