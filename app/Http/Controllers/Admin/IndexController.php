<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\SocialiteUser;
class IndexController extends Controller
{
    public function index(Request $request)
    {
        // 最新登录的5个用户
        $socialiteUserData = SocialiteUser::select('name', 'avatar', 'login_times', 'updated_at')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();
        $version = [
            'system' => PHP_OS,
            'host' => $request->server('HTTP_HOST'),
            'date' => now()->toDateTimeString(),
            'webServer' => $_SERVER['SERVER_SOFTWARE'] ?? '',
            'php' => PHP_VERSION,
            'mysql' => DB::connection()->getPdo()->query('SELECT VERSION();')->fetchColumn(),
        ];
        $assign = compact('socialiteUserData', 'version');
        return view('admin/index/index', $assign);
    }

}
