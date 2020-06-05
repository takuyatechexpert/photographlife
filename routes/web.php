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
    Route::post('destroy/{id}', 'PostController@destroy')->name('post.destroy');

});

// user認証が必要なuserページ
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('show/{id}', 'UserController@show')->name('user.show');
});

// user認証が必要なtodoページ
Route::group(['prefix' => 'todo', 'middleware' => 'auth'], function() {
    Route::get('create', 'TodoController@create')->name('todo.create');
    Route::post('store', 'TodoController@store')->name('todo.store');
    Route::get('edit/{id}', 'TodoController@edit')->name('todo.edit');
    Route::post('update/{id}', 'TodoController@update')->name('todo.update');
    Route::post('destroy/{id}', 'TodoController@destroy')->name('todo.destroy');

});

// 投稿内容詳細ページ
Route::get('/post/{id}', 'PostController@show')->name('post.show');