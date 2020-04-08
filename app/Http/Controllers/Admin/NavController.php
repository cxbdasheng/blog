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
use App\Models\Navs;
use App\Http\Requests\NavsRequest;
class NavController extends Controller
{
    public function index(Request $request, Navs $navs){
        $limit = $request->limit ? $request->limit : 20;
        $name = $request->name ? $request->name : '';
        $data = $navs->withTrashed()->where('name', 'like', '%' . $name . '%')->orderBy('id', 'desc')->paginate($limit);
        return view('admin.navs.index',compact('data','name'));
    }

    public function sort(Request $request, Navs $query)
    {
        $category = $query->withTrashed()->find($request->id);
        $data = [
            'success' => 0,
            'message' => "排序必须是数字！",
            'data' => [],
        ];
        if (is_numeric($request->sort)){
            if ($request->sort>=127){
                $category->sort=127;
            }else{
                $category->sort = $request->sort;
            }
            $res = $category->save();
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

    public function create(Navs $data)
    {
        return view('admin/navs/create_and_edit', compact('data'));
    }
    public function store(NavsRequest $request, Navs $navs)
    {
        $navs->fill($request->except('_token'));
        $navs->save();
        return redirect('admin/nav/index');
    }
    public function edit($id, Navs $category)
    {
        $data = $category->withTrashed()->find($id);
        return view('admin.navs.create_and_edit', compact('data'));
    }
    public function update(NavsRequest $request, Navs $navs,$id)
    {
        $navs->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }
    public function destroy(Navs $navs,$id){
        $navs->find($id)->delete();
        return redirect('admin/nav/index');
    }
    public function restore(Navs $navs,$id){
        $navs->onlyTrashed()->find($id)->restore();
        return redirect('admin/nav/index');
    }
    public function forceDelete(Navs $navs,$id){
        $navs->onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/nav/index');
    }
}