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
use App\Models\Comment;
class CommentController extends Controller
{
    public function index(Request $request, Comment $links){
        $limit = $request->limit ? $request->limit : 20;
        $content = $request->content ? $request->content : '';
        $data = $links->withTrashed()->with([
            'articles' => function ($query) {
                return $query->select('id', 'title');
            },
            'socialiteUser' => function ($query) {
                return $query->select('id', 'name');
            },
        ])->where('content', 'like', '%' . $content  . '%')->orderBy('id', 'desc')->paginate($limit);
        return view('admin.comment.index',compact('data','content'));
    }
    public function edit($id, Comment $links)
    {
        $data = $links->withTrashed()->find($id);
        return view('admin.comment.create_and_edit', compact('data'));
    }
    public function update(Request $request, Comment $comment,$id)
    {
        $comment->withTrashed()->find($id)->update($request->except('_token'));
        return back()->withInput();
    }
    public function destroy(Comment $comment,$id){
        $comment->find($id)->delete();
        return redirect('admin/comment/index');
    }
    public function restore(Comment $comment,$id){
        $comment->onlyTrashed()->find($id)->restore();
        return redirect('admin/comment/index');
    }
    public function forceDelete(Comment $comment,$id){
        $comment->onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/comment/index');
    }
}