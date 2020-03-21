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
class ComonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(['admin/index/index','layouts/home'], function ($view) {
            $articleCount = Articles::count('id');
            $assign = compact('articleCount');
            $view->with($assign);
        });
        view()->composer('layouts/home',function ($view){
            $category = Category::select('id', 'name', 'slug')->orderBy('sort')->get();
            $tag = Tag::has('articles')->withCount('articles')->get();
            $assign = compact('category', 'tag');
            $view->with($assign);
        });
    }

    public function register()
    {

    }
}