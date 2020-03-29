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
use App\Models\Link;
use App\Models\Config;
use Exception;
use Artisan;
class ComonServiceProvider extends ServiceProvider
{
    public function boot()
    {

        try {
            $config = Config::where('id', '>', 200)->pluck('value', 'name');
        } catch (Exception $exception) {
            return true;
        }
        /**
         * 如果已经执行了 migrate ；
         * 当再当执行 db:seed 的时候上面的 try 并不会触发错误
         * 而是缓存了一个空的 config
         * 所以此处需要清空缓存并不再向下执行
         */
        if ($config->isEmpty()) {
            Artisan::call('modelCache:clear');
            return true;
        }
        // 动态替换 /config 目录下的配置项
        config($config->toArray());
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
            $links = Link::select('name', 'url')
                ->orderBy('sort')
                ->get();
            $assign = compact('category', 'tag','topArticle','navs','links');
            $view->with($assign);
        });
        view()->composer(['admin/config/*'], function ($view) use ($config) {
            $assign = compact('config');
            $view->with($assign);
        });
    }

    public function register()
    {

    }
}