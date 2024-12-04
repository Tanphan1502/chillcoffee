<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) { 
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user(); // Lấy thông tin người dùng đã đăng nhập
                // Kiểm tra vai trò người dùng
                if ($user->role === 'admin') {
                    return redirect('/admin'); // Chuyển hướng đến dashboard admin
                } else {
                    return redirect(RouteServiceProvider::HOME); // Chuyển hướng đến trang chính cho người dùng bình thường
            }
        }

        return $next($request);
    }
}
}