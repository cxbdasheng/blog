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
            return view('admin.login.index');
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
