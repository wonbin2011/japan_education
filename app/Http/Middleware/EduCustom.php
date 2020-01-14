<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class EduCustom
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
//        dd('eduCustom');
        $params = $request->all();
        if (array_key_exists('provider', $params)) {
            Config::set('auth.guards.api.provider', $params['provider']);
        }


        return $next($request);
    }
}
