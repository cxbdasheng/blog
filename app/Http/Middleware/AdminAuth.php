<?php
/**
 * Created by PhpStorm.
 * User: ChenDasheng
 * Date: 2020/3/12
 * Time: 21:11
 */

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminAuth
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
        // 如果不是管理员或者没有登录;则重定向到登录页面
        if (!Auth::guard('admin')->check()) {
            return redirect('admin/login/index');
        }

        return $next($request);
    }
}