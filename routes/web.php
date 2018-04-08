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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', array('as' => 'index', 'uses' => 'PostsController@blog'));
Route::get('/post/{url}','PostsController@blog_post');
Route::get('/admin', array('as' => 'admin_area', 'uses' => 'PostsController@getAdmin'));
Route::post('/add', array('as' => 'add_new_post', 'uses' => 'PostsController@postAdd'));
/*Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@postLogin'));
Route::post('/logout', array('as' => 'logout', 'uses' => 'UsersController@getLogout'));*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
