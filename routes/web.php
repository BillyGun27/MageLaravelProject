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

Route::get('/', 'HomeController@index');

Route::get('/detail/{post}', 'HomeController@detail');

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/home/edit/{idpost}', 'HomeController@edit');


Route::post('/post/create', 'PostController@create');
Route::post('/post/update/{idpost}', 'PostController@update');
Route::get('/post/delete/{idpost}', 'PostController@delete');