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

// $ composer require guzzlehttp/guzzle:~6.0

Route::get('singers', 'SingersController@index');
Route::get('singers/create', 'SingersController@create');
Route::get('singers/{id}', 'SingersController@show');
Route::get('albums', 'AlbumsController@index');
Route::get('albums/create', 'AlbumsController@create');
Route::get('albums/{id}', 'AlbumsController@show');
Route::get('hello', function(){
	return "Hello";
});
Route::get('gpus', 'GpusController@index');
Route::get('gpus/create', 'GpusController@create');
Route::get('gpus/calculate', 'GpusController@calculate');
Route::get('starwar', 'StarwarController@index');

