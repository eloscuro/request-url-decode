<?php

namespace RequestUrlDecode;

use Closure;

class MiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = $request->route(null);

        if (empty($route[2]) || !is_array($route[2])) {
            return $next($request);
        }

        foreach ($route[2] as $key => $value) {
            $route[2][$key] = urldecode($value);
        }

        $request->setRouteResolver(function () use ($route) {
            return $route;
        });

        return $next($request);
    }
}
