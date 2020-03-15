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

Route::get('/', function () {
    return view('welcome');
});
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
// AdminLogin 模块
Route::namespace('Admin')->prefix('admin')->middleware('admin.auth')->group(function () {
    // 首页控制器
    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('index', 'IndexController@index')->name('admin.index');
        Route::get('test', 'IndexController@test')->name('admin.test');
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
    // 标签管理
    Route::prefix('tag')->group(function () {
        // 分类列表
        Route::get('index', 'TagController@index');
        Route::post('sort', 'TagController@sort');
        Route::get('create', 'TagController@create');
        Route::post('store', 'TagController@store');
        Route::get('edit/{id}', 'TagController@edit');
        Route::put('update/{id}', 'TagController@update');
        Route::get('destroy/{id}', 'TagController@destroy');
        Route::get('restore/{id}', 'TagController@restore');
        Route::get('forceDelete/{id}', 'TagController@forceDelete');
    });
});
