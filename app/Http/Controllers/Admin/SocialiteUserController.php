<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/8
 * Time: 23:49
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialiteUser;
class SocialiteUserController extends Controller
{
    public function index(Request $request,SocialiteUser $socialiteUser){
        $limit = $request->limit ? $request->limit : 20;
        $name = $request->name ? $request->name : '';
        $data = $socialiteUser->withTrashed()->where('name', 'like', '%' . $name . '%')->with('socialiteClient')->orderBy('id', 'desc')->paginate($limit);
        return view('admin.socialiteUser.index',compact('data','name'));
    }
    public function edit($id, SocialiteUser $socialiteUser)
    {
        $data = $socialiteUser->withTrashed()->with('socialiteClient')->find($id);
        return view('admin.socialiteUser.create_and_edit', compact('data'));
    }
    public function update(Request $request, SocialiteUser $socialiteUser,$id)
    {
        $socialiteUser->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }
}