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
Route::group(['middleware' => ['web']], function () {
    Route::get('/home', 'ArtilcleController@showHome');
    Route::get('/timeline', 'ArtilcleController@showTimeline');
    Route::post('/article', 'ArtilcleController@createArticle');
    Route::get('/article/{article}/edit', 'ArtilcleController@edit');
    Route::patch('/article/{article}', 'ArtilcleController@update');


    Route::get('/article/{article}/like', 'ActionController@likeCount');
    Route::post('/article/{article}/comment', 'ActionController@comment');


    Route::get('/user/{userId}/timeline', 'UserController@showProfile');
    Route::get('/test', function () {
        return "hello";
    });
});
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');

