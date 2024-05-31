<?php

namespace App\Http\Middleware;

use App\Http\Services\GateService;
use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HasPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        //log out if user unactive
        if (Auth::check() && Auth::user()->status != 1) {
            Auth::logout();
            abort(401, 'Tài khoản đã bị khoá');
        }

        $routeName = GateService::getGateDefineFromRouteName($request->route()->getName());
//        dd($routeName);
        if ($request->user()->can($routeName)) {
            return $next($request);
        } else {
            if ($request->ajax()) {
//                return response()->json(['error' => 'Tài khoản không có quyền truy cập'], 403);

                abort(403, 'Tài khoản không có quyền truy cập');
//                return false;
            }
            if (Gate::allows('admin')) {
                $gate = array_filter(Gate::abilities(), function ($var, $key) {
                    return str_contains($key, 'admin');
                }, ARRAY_FILTER_USE_BOTH);

                //check if admin site
                foreach ($gate as $key => $value) {
                    if (Gate::any($key)) {
                        return redirect(route('admin.dashboard.index'));
                    }
                }
                return false;
                // return redirect()->;
            }
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
