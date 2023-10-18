<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        toast()->error('Phiên đăng nhập của bạn đã hết. Hãy đăng nhập lại');
        return $request->expectsJson() ? null : route('home');
    }
}
