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
Route::get('profile','ProfileController@index');

Route::post('uploadAvatar','ProfileController@uploadAvatar');

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\LoginController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\LoginController@getSocialHandle']);