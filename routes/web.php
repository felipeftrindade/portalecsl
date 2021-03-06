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

#Auth::routes();
Route::get('/', 'PostsController@index');
Route::get('/search/{s?}', 'SearchesController@getIndex')->where('s', '[\w\d]+');
Route::get('/admin', 'UsersController@getLogin');
Route::get('/posts','PostsController@listAll');
Route::get('/posts/add', 'PostsController@add');
Route::get('/posts/{id}/edit','PostsController@edit');
Route::get('/categorias','CategoriesController@index');
Route::get('/{url}','PostsController@show');
Route::post('/posts','PostsController@store');
Route::post('/posts/upload','PostsController@upload');
Route::post('/categorias','CategoriesController@store');
Route::patch('/posts/{post}','PostsController@update');
Route::delete('/posts/{id}','PostsController@delete');
Route::post('/login', 'UsersController@postLogin');
Route::post('/logout', 'UsersController@getLogout');
