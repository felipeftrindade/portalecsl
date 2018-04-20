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

Route::get('/', 'PostsController@index');
Route::get('/search/{s?}', 'SearchesController@getIndex')->where('s', '[\w\d]+');
Route::get('/admin', 'UsersController@getLogin');
Route::get('/posts','PostsController@listAll');
Route::get('/posts/add', 'PostsController@add');
Route::get('/posts/{id}/edit','PostsController@edit');
Route::get('/{url}','PostsController@show');
Route::post('/posts','PostsController@store');
Route::patch('/posts/{post}','PostsController@update');
Route::delete('/posts/{id}','PostsController@delete');

Route::post('/login', 'UsersController@postLogin');
Route::post('/logout', 'UsersController@getLogout');

#Auth::routes();
#Route::get('/home', 'HomeController@index')->name('home');
