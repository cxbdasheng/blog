<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ArticleTag;
use App\Handlers\ImageUploadHandler;

class ArticlesController extends Controller
{
    /**
     * 首页
     * @Author: ChenDasheng
     * @Created: 2020/3/15
     * @param Request $request
     * @param Article $articles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Article $articles)
    {
        $limit = $request->limit ? $request->limit : 20;
        $title = $request->title ? $request->title : '';
        $data = $articles->with('categories')->withTrashed()->where('title', 'like', '%' . $title . '%')->orderBy('id', 'desc')->paginate($limit);
        return view('admin.articles.index', compact('data', 'title'));
    }

    public function create(Article $data)
    {
        $category = Category::all();
        $tag = Tag::all();
        $data->tags = [];
        $assign = compact('category', 'tag', 'data');
        return view('admin.articles.create_and_edit', $assign);
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        $filename = "file";
        if ($request->guid) {
            $filename = "editormd-image-file";
        }
        // 初始化返回数据，默认是失败的
        $data = [
            'success' => 0,
            'message' => "上传失败",
            'url' => '',
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->file($filename)) {
            // 保存图片到本地
            $result = $uploader->save($file, 'articles', 'articles', $filename);
            // 图片保存成功的话
            if ($result) {
                $data['url'] = $result['path'];
                $data['message'] = "上传成功!";
                $data['success'] = 1;
            }
        }
        return $data;
    }

    public function store(ArticleRequest $request, Article $articles, ImageUploadHandler $uploader)
    {
        $data = $request->except('_token');
        $tags = $data['tags'];
        unset($data['tags']);
        $data['keywords'] = str_replace("，", ",", $data['keywords']);
        $res = $articles->create($data);
        if ($res) {
            // 给文章添加标签
            $articleTag = new ArticleTag();
            $articleTag->addTagIds($res->id, $tags);
        }
        return redirect('admin/articles/index');
    }

    public function edit($id, Article $articles)
    {
        $data = $articles->withTrashed()->find($id);
        $data->tags = ArticleTag::where('article_id', $id)->pluck('tag_id')->toArray();
        $category = Category::all();
        $tag = Tag::all();
        $assign = compact('category', 'tag', 'data');
        return view('admin.articles.create_and_edit', $assign);
    }

    public function update(ArticleRequest $request, Article $articles, ArticleTag $articleTagMode)
    {
        $data = $request->except('_token');
        $tags = $data['tags'];
        unset($data['tags']);
        $data['keywords'] = str_replace("，", ",", $data['keywords']);
        $result = $articles->withTrashed()->find($request->id)->update($data);
        if ($result) {
            ArticleTag::where('article_id', $request->id)->forceDelete();
            $articleTagMode->addTagIds($request->id, $tags);
        }
        return back()->withInput();
    }

    public function destroy(Article $articles, $id)
    {
        $articles->find($id)->delete();
        return redirect('admin/articles/index');
    }

    public function forceDelete($id, Article $articles)
    {
        $articles->onlyTrashed()->find($id)->forceDelete();
        return redirect('admin/articles/index');
    }

    public function restore(Article $articles, $id)
    {
        $articles->onlyTrashed()->find($id)->restore();
        return redirect('admin/articles/index');
    }

}
