<?php

namespace App\Http\Middleware;

use App\Http\Services\GateService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);

        $routeName= GateService::getGateDefineFromRouteName($request->route()->getName());

        if($request->user()->can($routeName)) {
            return $next($request);
        }

        abort(403);
//        if(in_array($last_word,['index','show','store','update','destroy']))
//        {
//
//        }
//        else {
//            return $next($request);
//        }
    }
}
