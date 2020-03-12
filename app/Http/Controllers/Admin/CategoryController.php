<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $limit = $request->limit ? $request->limit : 20;
        $name = $request->name ? $request->name : '';
        $data = $category->withTrashed()->where('name', 'like', '%' . $name . '%')->orderBy('sort')->paginate($limit);
        $request->flash();
        return view('admin/category/index', ['data' => $data]);
    }
}
