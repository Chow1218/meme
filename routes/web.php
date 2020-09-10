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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/meme/all', 'App\Http\Controllers\MemeController@index');
Route::get('/meme/id/{id}', 'App\Http\Controllers\MemeController@show');
Route::get('/meme/page/{page}', 'App\Http\Controllers\MemeController@showPage');
Route::get('/meme/popular', 'App\Http\Controllers\MemeController@showPopular');
Route::get('/meme/create', 'App\Http\Controllers\MemeController@create')->name('meme.create');
Route::post('/meme/all', 'App\Http\Controllers\MemeController@store');
