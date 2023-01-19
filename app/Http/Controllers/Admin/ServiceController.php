<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function tencent()
    {
        return view('admin.services.tencent');
    }

    public function youpai()
    {
        return view('admin.services.youpai');
    }
}
