<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Route::namespace('Auth')->prefix('auth')->as('auth.')->group(function () {
    // 后台登录
    Route::prefix('admin')->group(function () {
        Route::post('login', 'AdminController@login');
    });
});
// 后台登录页面
Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::redirect('/', url('admin/login/index'));
    Route::prefix('login')->group(function () {
        // 登录页面
        Route::get('index', 'LoginController@index')->middleware('admin.login');
        // 退出
        Route::get('logout', 'LoginController@logout');
    });
});
Route::namespace('Admin')->prefix('admin')->middleware('admin.auth')->group(function () {
    // 首页控制器
    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('index', 'IndexController@index')->name('admin.index');
    });
    // 分类管理
    Route::prefix('category')->group(function () {
        // 分类列表
        Route::get('index', 'CategoryController@index');
        Route::post('sort', 'CategoryController@sort');
        Route::get('create', 'CategoryController@create');
        Route::post('store', 'CategoryController@store');
        Route::get('edit/{id}', 'CategoryController@edit');
        Route::put('update/{id}', 'CategoryController@update');
        Route::get('destroy/{id}', 'CategoryController@destroy');
        Route::get('restore/{id}', 'CategoryController@restore');
        Route::get('forceDelete/{id}', 'CategoryController@forceDelete');
    });
    // 添加外链
    Route::prefix('link')->group(function () {
        Route::get('index', 'LinkController@index');
        Route::get('create', 'LinkController@create');
        Route::post('store', 'LinkController@store');
        Route::get('edit/{id}', 'LinkController@edit');
        Route::put('update/{id}', 'LinkController@update');
        Route::post('sort', 'LinkController@sort');
        Route::get('destroy/{id}', 'LinkController@destroy');
        Route::get('restore/{id}', 'LinkController@restore');
        Route::get('forceDelete/{id}', 'LinkController@forceDelete');
    });
    // 标签管理
    Route::prefix('tag')->group(function () {
        Route::get('index', 'TagController@index');
        Route::get('create', 'TagController@create');
        Route::get('edit/{id}', 'TagController@edit');
        Route::put('update/{id}', 'TagController@update');
        Route::get('destroy/{id}', 'TagController@destroy');
        Route::get('restore/{id}', 'TagController@restore');
        Route::get('forceDelete/{id}', 'TagController@forceDelete');
    });
    // 文章管理
    Route::prefix('articles')->group(function () {
        // 分类列表
        Route::get('index', 'ArticlesController@index');
        Route::post('sort', 'ArticlesController@sort');
        Route::post('store', 'ArticlesController@store');
        Route::get('create', 'ArticlesController@create');
        Route::get('edit/{id}', 'ArticlesController@edit');
        Route::put('update/{id}', 'ArticlesController@update');
        Route::get('destroy/{id}', 'ArticlesController@destroy');
        Route::get('restore/{id}', 'ArticlesController@restore');
        Route::get('forceDelete/{id}', 'ArticlesController@forceDelete');
        Route::post('upload_image', 'ArticlesController@uploadImage');
    });
    // 菜单管理
    Route::prefix('nav')->group(function () {
        Route::get('index', 'NavController@index');
        Route::get('create', 'NavController@create');
        Route::post('store', 'NavController@store');
        Route::get('edit/{id}', 'NavController@edit');
        Route::put('update/{id}', 'NavController@update');
        Route::post('sort', 'NavController@sort');
        Route::get('destroy/{id}', 'NavController@destroy');
        Route::get('restore/{id}', 'NavController@restore');
        Route::get('forceDelete/{id}', 'NavController@forceDelete');
    });

    // 随言碎语管理
    Route::prefix('time')->group(function () {
        Route::get('index', 'TimeController@index');
        Route::get('create', 'TimeController@create');
        Route::post('store', 'TimeController@store');
        Route::get('edit/{id}', 'TimeController@edit');
        Route::put('update/{id}', 'TimeController@update');
        Route::get('destroy/{id}', 'TimeController@destroy');
        Route::get('restore/{id}', 'TimeController@restore');
        Route::get('forceDelete/{id}', 'TimeController@forceDelete');
    });

});

// Home 模块
Route::namespace('Home')->name('home.')->group(function () {
    // 首页
    Route::get('/', 'IndexController@index')->name('index');
    // 分类
    Route::get('category/{category}/{slug?}', 'IndexController@category')->name('category');
    // 标签
    Route::get('tag/{tag}/{slug?}', 'IndexController@tag')->name('tag');
    // 搜索文章
    Route::get('search', 'IndexController@search')->name('search');
    // 文章详情
    Route::get('article/{articles}', 'IndexController@article')->name('article');
    Route::post('articles/more','IndexController@more');
//    Route::get('time', 'IndexController@time')->name('time');
//    // 开源项目
//    Route::get('git', 'IndexController@git')->name('git');

//    // 检测是否登录
//    Route::get('checkLogin', 'IndexController@checkLogin')->name('checkLogin');

//    // feed
//    Route::get('feed', 'IndexController@feed')->name('feed');
//    // 推荐博客
//    Route::prefix('site')->name('site.')->group(function () {
//        Route::get('/', 'SiteController@index')->name('index');
//        Route::post('store', 'SiteController@store')->middleware('auth.socialite', 'clean.xss')->name('store');
//    });
//    Route::middleware('auth.socialite')->group(function () {
//        Route::post('comment', 'IndexController@comment')->name('comment.store');
//        Route::prefix('like')->name('like.')->group(function () {
//            Route::post('store', 'LikeController@store')->name('store');
//            Route::delete('destroy', 'LikeController@destroy')->name('destroy');
//        });
//    });
});
