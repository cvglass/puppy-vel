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

Route::get('/', 'PagesController@home');
Route::get('/dogs', 'PagesController@index');
Route::get('/dogs/create', 'PagesController@create');
Route::get('/dogs/{dog}', 'PagesController@show');
Route::post('/dogs', 'PagesController@store');
Route::get('/dogs/{dog}/edit', 'PagesController@edit');
Route::patch('/dogs/{dog}', 'PagesController@update');
Route::delete('/dogs/{dog}', 'PagesController@destroy');



