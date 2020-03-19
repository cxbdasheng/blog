<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * 首页
     * @Author: ChenDasheng
     * @Created: 2020/3/15
     * @param Request $request
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Tag $tag)
    {
        $limit = $request->limit ? $request->limit : 20;
        $name = $request->name ? $request->name : '';
        $data = $tag->withTrashed()->where('name', 'like', '%' . $name . '%')->orderBy('id', 'desc')->paginate($limit);
        return view('admin/tag/index', compact('data'));
    }

    /**
     * 新建页面
     * @Author: ChenDasheng
     * @Created: 2020/3/15
     * @param Tag $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Tag $data)
    {
        return view('admin/tag/create_and_edit', compact('data'));
    }

    /**
     * 创建
     * @Author: ChenDasheng
     * @Created: 2020/3/15
     * @param TagRequest $request
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TagRequest $request, Tag $tag)
    {
        $tag->fill($request->except('_token'));
        $tag->save();
        return redirect('admin/tag/index');
    }

    public function edit($id, Tag $tag)
    {
        $data = $tag->withTrashed()->find($id);
        return view('admin/tag/create_and_edit', compact('data'));
    }

    public function update(TagRequest $request, Tag $tag,$id)
    {
        $tag->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }
    public function destroy(Tag $tag,$id){
        $tag->find($id)->delete();
        return redirect('admin/tag/index');
    }
    public function restore(Tag $tag,$id){
        $tag->onlyTrashed()->find($id)->restore();
        return redirect('admin/tag/index');
    }
    public function forceDelete(Tag $tag,$id){
        $tag->onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/tag/index');
    }
}
