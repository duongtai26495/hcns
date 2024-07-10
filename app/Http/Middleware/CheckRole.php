<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Nếu người dùng không đăng nhập, chuyển hướng đến trang đăng nhập
            return redirect('/authen');
        }

        $user = Auth::user();

        // Kiểm tra xem vai trò của người dùng có trong danh sách các vai trò được phép hay không
        if (!in_array($user->role->name, $roles)) {
            return redirect('/authen');
        }

        return $next($request);
    }
}
