<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/3/19
 * Time: 0:32
 */

namespace App\Providers;

use App\Models\Articles;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Navs;
class ComonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(['admin/index/index','layouts/home'], function ($view) {
            $articleCount = Articles::count('id');
            $assign = compact('articleCount');
            $view->with($assign);
        });
        //前台Home页面基础数据
        view()->composer('layouts/home',function ($view){
            $category = Category::select('id', 'name', 'slug')->orderBy('sort')->get();
            $tag = Tag::has('articles')->withCount('articles')->get();
            $topArticle = Articles::select('id', 'title', 'slug','description','views','cover','created_at')
                ->where('is_top', 1)
                ->orderBy('created_at', 'desc')
                ->get();
            $navs = Navs::select('name', 'url')
                ->orderBy('sort')
                ->get();
            $assign = compact('category', 'tag','topArticle','navs');
            $view->with($assign);
        });
    }

    public function register()
    {

    }
}