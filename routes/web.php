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

Route::get('/show','PostController@index');
Route::get('/post','PostController@post');
Route::post('/store','PostController@store');
Route::post('/store_about','PostController@store_about');
Route::get('/menu/{id}','PostController@show');

Route::get('/search',function(){
    return view('search');
});
Route::get('/show_search','PostController@show_search');

Route::get('/show/{id}','UserController@show_account');

// Route::get('/like/{id}','LikeController@create');
// Route::get('/dislike/{id}','LikeController@destroy');

Route::get('/like_list/{id}','LikeController@show');

//Route::get('/rank','LikeController@show_rank');
Route::get('/rank',function(){
    return view('search_rank');
});

Route::get('/search_rank_genre/{id}','LikeController@show_rank_bygenre');


Route::get('/search_rank_age/{id}','LikeController@show_rank_byage');


//ajax
Route::post('/ajaxlike', 'PostController@ajaxlike');

Route::post('/ajaxfollow', 'FollowController@ajaxfollow');
//

//ユーザー情報
Route::get('/show_auth_like', 'PostController@show_auth_like');
Route::get('/show_auth_post', 'PostController@show_auth_post');