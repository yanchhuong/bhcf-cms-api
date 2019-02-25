<?php

namespace App\Http\Middleware;

use Closure;

class Finance
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
        $roles = \Auth::user()->roles()->pluck('name');
        if (\Auth::user() && in_array('finance', $roles)) {
            return $next($request);
        }

        abort(401, 'METHOD_NOT_ALLOWED');

        // return $next($request);
    }
}
