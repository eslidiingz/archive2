<?php

namespace App\Http\Middleware;

use Closure;

class apiKeyMiddleware
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
      $myKey = array(
        'tFxfsv0Kt@5Y!#VuW96cketOgsMUVfTcAVj1pdg2zds0NOHszcH$ggvNi@bm',
        'P1s2FYLkPz2haJw6aAaK0uKFkevz4oc10iZowm7Qv1!X3nOaegE#86jpycgg'
      );
      if(in_array($request->header('APIKEY'),$myKey)){
        return $next($request);
      }
      $data['status'] = 200;
      $data['message'] = 'Unauthorization';
      return response()->json($data,404);
    }
}
