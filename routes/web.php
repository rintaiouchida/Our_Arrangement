<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',function(){
    return view('top');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//アカウント削除
Route::get('/destroy','userController@destroy');

Route::get('/destroy_confirm',function(){
    return view('destroy_confirm');
});

//アカウント編集
Route::get('/edit','UserController@edit');
Route::post('/update','UserController@update');

//メイン画面
Route::get('/main','UserController@index');

//フォロワー表示
Route::get('/follow/{id}','FollowController@follow');
Route::get('/follower/{id}','FollowController@follower');
Route::get('/add_follow/{id}','FollowController@add_follow');
Route::get('/destroy_follow/{id}','FollowController@destroy_follow');