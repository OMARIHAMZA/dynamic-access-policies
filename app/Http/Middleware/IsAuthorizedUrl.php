<?php

namespace App\Http\Middleware;

use App\Utils\CanUseService;
use Closure;

class IsAuthorizedUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!CanUseService::isAuthorized('can_viewPolicies')) {
            session()->put('alerts', [
                ["icon" => "fa fa-info", "message" => "You are not allowed to view policies!"]
            ]);
            return back();
        }


        return $next($request);
    }
}
