<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/26
 * Time: 21:07
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;
use Artisan;
class ConfigController extends Controller
{
    public function seo()
    {
        return view('admin.config.seo');
    }

    public function other()
    {
        return view('admin.config.other');
    }
    public function mail()
    {
        return view('admin.config.mail');
    }
    public function socialShare()
    {
        return view('admin.config.socialShare');
    }
    public function update(Request $request,Config $configModel)
    {
        $configs = $request->except('_token');
        foreach ($configs as $id => $config) {
            $configModel->find($id)->update([
                'value' => is_array($config) ? json_encode($config) : $config,
            ]);
        }
        return redirect()->back();
    }
    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        Artisan::call('clear-compiled');
        Artisan::call('modelCache:clear');
        push_success('操作成功');

        return redirect()->back();
    }
}