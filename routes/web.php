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
Route::get('/', 'TopPageController@index')->name('toppage.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// user認証が必要なpostページ
Route::group(['prefix' => 'post', 'middleware' => 'auth'], function() {
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('store', 'PostController@store')->name('post.store');
});

// user認証が必要なuserページ
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('show/{id}', 'UserController@show')->name('user.show');
});
// 投稿内容詳細ページ
Route::get('/post/{id}', 'PostController@show')->name('post.show');