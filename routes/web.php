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
// Admin 模块
Route::namespace('Admin')->prefix('admin')->group(function () {
    // 首页控制器
    Route::prefix('index')->group(function () {
        // 后台首页
        Route::get('index', 'IndexController@index')->name('admin.index');
        Route::get('test', 'IndexController@test')->name('admin.test');
    });
});