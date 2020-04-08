<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
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

    public function test()
    {
        return view('admin/test');
    }
}
