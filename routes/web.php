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

Route::get('/',  'HomeController@index');

Auth::routes();

Route::get('new-meme','MemeController@new');
Route::post('save-meme','MemeController@save');
Route::get('friend-suggests','FriendsController@suggests');
Route::get('invite/{id}','FriendsController@invite');

Route::post('like','MemeController@like');
Route::get('profile/{id?}','ProfileController@index');

Route::post('uploadAvatar','ProfileController@uploadAvatar');
Route::group(["prefix"=>"comments"],function(){
    Route::post('post','CommentsController@post');
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('login','Admin\AdminController@login');
    Route::get('dashboard','Admin\AdminController@dashboard');
    Route::get('categories','Admin\AdminController@categories');
    Route::get('category/edit/{id}','Admin\AdminController@editShow');
    Route::post('category/update/{id}','Admin\AdminController@update');
    Route::get('category/delete/{id}','Admin\AdminController@deleteCategory');
    Route::get('category/create','Admin\AdminController@addCategory');
    Route::post('category/create','Admin\AdminController@postCategory');
});

Route::post('noti/seen','NotificationController@seen');
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\LoginController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\LoginController@getSocialHandle']);