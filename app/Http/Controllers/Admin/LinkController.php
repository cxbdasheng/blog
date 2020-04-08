<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/24
 * Time: 20:19
 */

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Http\Requests\LinkRequest;
class LinkController extends Controller
{
    public function index(Request $request, Link $links){
        $limit = $request->limit ? $request->limit : 20;
        $name = $request->name ? $request->name : '';
        $data = $links->withTrashed()->where('name', 'like', '%' . $name . '%')->orderBy('id', 'desc')->paginate($limit);
        return view('admin.link.index',compact('data','name'));
    }

    public function sort(Request $request, Link $query)
    {
        $links = $query->withTrashed()->find($request->id);
        $data = [
            'success' => 0,
            'message' => "排序必须是数字！",
            'data' => [],
        ];
        if (is_numeric($request->sort)){
            if ($request->sort>=127){
                $links->sort=127;
            }else{
                $links->sort = $request->sort;
            }
            $res = $links->save();
            if ($res) {
                $data = [
                    'success' => 1,
                    'message' => "请求成功！",
                    'data' => [],
                ];
            } else {
                $data = [
                    'success' => 0,
                    'message' => "请求失败！",
                    'data' => [],
                ];
            }
        }
        return response()->json($data);
    }

    public function create(Link $data)
    {
        return view('admin/link/create_and_edit', compact('data'));
    }
    public function store(LinkRequest $request, Link $Link)
    {
        $Link->fill($request->except('_token'));
        $Link->save();
        return redirect('admin/link/index');
    }
    public function edit($id, Link $links)
    {
        $data = $links->withTrashed()->find($id);
        return view('admin.link.create_and_edit', compact('data'));
    }
    public function update(LinkRequest $request, Link $Link,$id)
    {
        $Link->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }
    public function destroy(Link $Link,$id){
        $Link->find($id)->delete();
        return redirect('admin/link/index');
    }
    public function restore(Link $Link,$id){
        $Link->onlyTrashed()->find($id)->restore();
        return redirect('admin/link/index');
    }
    public function forceDelete(Link $Link,$id){
        $Link->onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/link/index');
    }
}