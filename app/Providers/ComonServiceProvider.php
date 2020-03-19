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

class ComonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('admin/index/index', function ($view) {
            $articleCount = Articles::count('id');
            $assign = compact('articleCount');
            $view->with($assign);
        });
    }

    public function register()
    {

    }
}