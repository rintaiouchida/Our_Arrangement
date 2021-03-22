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
Route::get('/destroy','UserController@destroy');
Route::get('/destroy_confirm',function(){
    return view('destroy_confirm');
});


//メイン画面
Route::get('/main','UserController@index');

Route::get('/show','PostController@index');
Route::get('/menu/{id}','PostController@show');


Route::get('/show/{id}','UserController@show_account');



Route::get('/like_list/{id}','LikeController@show');


//料理投稿機能
Route::get('/post','PostController@post');
Route::post('/store','PostController@store');
Route::post('/store_about','PostController@store_about');

//アカウント編集機能
Route::get('/edit_account','UserController@edit_account');
Route::post('/update_account','UserController@update_account');

//フォロワー表示機能
Route::get('/follow/{id}','FollowController@follow');
Route::get('/follower/{id}','FollowController@follower');

//検索機能
Route::get('/search',function(){
    return view('search');
});
Route::get('/show_search','PostController@show_search');

//ランキング機能
Route::get('/rank',function(){
    return view('search_rank');
});
Route::get('/search_rank_genre/{id}','LikeController@show_rank_bygenre');
Route::get('/search_rank_age/{id}','LikeController@show_rank_byage');


//ajax機能
Route::post('/ajaxlike', 'PostController@ajaxlike');
Route::post('/ajaxfollow', 'FollowController@ajaxfollow');


//ユーザー情報表示機能
Route::get('/show_auth_like', 'PostController@show_auth_like');
Route::get('/show_auth_post', 'PostController@show_auth_post');