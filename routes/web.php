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

Route::get('/', 'UploadController@index');

Route::get('/upload', 'UploadController@show');

Route::post('/upload', 'UploadController@store')->name('addUpload');

Route::get('/edit', 'UploadController@showedit');

Route::get('/edit/{name}', 'UploadController@showeditplayer');

Route::post('/edit', 'UploadController@edit')->name('editPlayer');

Route::post('/delete', 'UploadController@delete')->name('deletePlayer');

Route::get('/{name}', 'UploadController@display');

