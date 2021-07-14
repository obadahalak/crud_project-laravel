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


Route::get('/','PageController@about');

Route::get('/posts/{id}','PostsController@update_user')->name('user.profile');
Route::get('/posts/create/','PostsController@strore');
Route::get('/about','PageController@about');
Auth::routes();


Route::get('/index','PageController@index');
//Route::get('/posts/profile','PostsController@profile');




Route::resource('posts', 'PostsController');


Route::get('/home', 'HomeController@index')->name('home');
