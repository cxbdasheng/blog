<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/12
 * User: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, User $user)
    {
        $limit = $request->limit ? $request->limit : 20;
        $data = $user->withTrashed()->orderBy('id', 'desc')->paginate($limit);
        return view('admin.user.index', compact('data'));
    }
    public function store(Request $request, User $user)
    {
        $user->fill($request->except('_token'));
        $user->save();
        return redirect('admin/user/index');
    }

    public function edit($id, User $user)
    {
        $data = $user->withTrashed()->find($id);
        return view('admin.user.create_and_edit', compact('data'));
    }

    public function update(Request $request, User $user, $id)
    {
        $user->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }

    public function destroy(User $user, $id)
    {
        $user->find($id)->delete();
        return redirect('admin/user/index');
    }

    public function restore(User $user, $id)
    {
        $user->onlyTrashed()->find($id)->restore();
        return redirect('admin/user/index');
    }

    public function forceDelete(User $user, $id)
    {
        $user->onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/user/index');
    }
}