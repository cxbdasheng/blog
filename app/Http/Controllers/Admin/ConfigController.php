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
}