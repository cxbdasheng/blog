<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $limit = $request->limit ? $request->limit : 20;
        $name = $request->name ? $request->name : '';
        $data = $category->withTrashed()->where('name', 'like', '%' . $name . '%')->orderBy('id', 'desc')->paginate($limit);
        return view('admin/category/index', compact('data'));
    }
    public function sort(Request $request, Category $query)
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

    public function create(Category $data)
    {
        return view('admin/category/create_and_edit', compact('data'));
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->except('_token'));
        $category->save();
        return redirect('admin/category/index');
    }

    public function edit($id, Category $category)
    {
        $data = $category->withTrashed()->find($id);
        return view('admin/category/create_and_edit', compact('data'));
    }

    public function update(CategoryRequest $request, Category $category,$id)
    {
        $category->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }
    public function destroy(Category $category,$id){
        $category->find($id)->delete();
        return redirect('admin/category/index');
    }
    public function restore(Category $category,$id){
        $category->onlyTrashed()->find($id)->restore();
        return redirect('admin/category/index');
    }
    public function forceDelete(Category $category,$id){
        $category->onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/category/index');
    }
}