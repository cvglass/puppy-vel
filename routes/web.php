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

Route::get('/', 'DogsController@home');
Route::get('/dogs', 'DogsController@index');
Route::get('/dogs/create', 'DogsController@create');
Route::get('/dogs/{dog}', 'DogsController@show');
Route::post('/dogs', 'DogsController@store');
Route::get('/dogs/{dog}/edit', 'DogsController@edit');
Route::patch('/dogs/{dog}', 'DogsController@update');
Route::delete('/dogs/{dog}', 'DogsController@destroy');



