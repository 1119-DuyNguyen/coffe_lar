<?php

namespace App\Http\Middleware;

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
//        if($request->user()->role !== $role){
//            return redirect()->route('dashboard');
//        }
        $nameRoute= $request->route()->getName();
        $last_word_start = strrpos($nameRoute, '.') + 1; // +1 so we don't include the space in our result
        $last_word = substr($nameRoute, $last_word_start); // $last_word = PHP.
        switch ($last_word){
            case 'change-status': $nameRoute=substr_replace($nameRoute,'update',$last_word_start); break;
        }
        if(in_array($last_word,['index','show','store','update','destroy']))
        {
            if($request->user()->can($nameRoute)) {
                return $next($request);
            }

            abort(403);
        }
        else {
            return $next($request);
        }
    }
}
