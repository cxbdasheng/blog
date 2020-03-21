<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Category;
use Cache;
class IndexController extends Controller
{
    public function index()
    {
        // 获取文章列表数据
        $articles = Articles::select(
            'id', 'category_id', 'title',
            'slug', 'author', 'description',
            'cover', 'is_top', 'created_at'
        )->orderBy('created_at', 'desc')->with(['categories', 'tags'])->paginate(10);
        $assign=['articles'=>$articles];
        return view('home.index',$assign);
    }

    public function article(Articles $articles,Request $request){
        // 同一个用户访问同一篇文章每天只增加1个访问量  使用 ip+id 作为 key 判别
        $ipAndId = 'article_' . $request->ip() . ':' . $articles->id;
        if (!Cache::has($ipAndId)) {
            Cache::set($ipAndId,'1',1440);
            // 文章点击量+1
            $articles->increment('views');
        }
        $assign=compact('articles');
        return view('home.article',$assign);
    }
}
