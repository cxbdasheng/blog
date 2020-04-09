<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/9
 * Time: 18:48
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialiteClient;

class SocialiteClientController extends Controller
{
    public function index(Request $request, SocialiteClient $socialiteClient)
    {
        $limit = $request->limit ? $request->limit : 20;
        $name = $request->name ? $request->name : '';
        $data = $socialiteClient->withTrashed()->where('name', 'like', '%' . $name . '%')->paginate($limit);
        return view('admin/socialiteClient/index', compact('data','name'));
    }
    public function edit($id, SocialiteClient $socialiteClient)
    {
        $data = $socialiteClient->withTrashed()->find($id);
        return view('admin.socialiteClient.create_and_edit', compact('data'));
    }
    public function update(Request $request, SocialiteClient $socialiteClient,$id)
    {
        $socialiteClient->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }
}