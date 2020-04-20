<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialiteUser;
use Auth;
class LoginController extends Controller
{
    /**
     * 登入
     * @Author: ChenDasheng
     * @Created: 2020/3/12
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SocialiteUser $socialiteUserModel)
    {
        // 获取是否有第三方用户被设置为管理员
        $count = $socialiteUserModel->where('is_admin', 1)->count();
        // 如果有第三方账号管理员；则通过第三方账号登录
        if ($count) {
            die('请通过第三方账号登录');
        } else {
            return view('admin.login.index');
        }
    }

    /**
     * 登出
     * @Author: ChenDasheng
     * @Created: 2020/3/12
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('socialite')->logout();

        return redirect('admin/login/index');
    }
}
