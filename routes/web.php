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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dogs/{id}', function ($id) {
  return view('dog', [
    'id' => $id
  ]);
});

Route::get('/dogs', function () {
  $dogs = [
    'Ruff',
    'Rover',
    'Ralph'
  ];
  return view('dogs', [
    'dogs' => $dogs
  ]);
});

Route::get('/submit', function () {
  return view('submit');
});
