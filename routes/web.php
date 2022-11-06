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

Route::get('/kasus', 'KasusController@index');
Route::get('/kasus/create', 'KasusController@create');
Route::post('/kasus/store', 'KasusController@store');
Route::get('/kasus/edit/{id}', 'KasusController@edit');
Route::put('/kasus/update/{id}', 'KasusController@update');
Route::put('/kasus/delete/{id}', 'KasusController@delete');

Route::get('/pelapor_kasus', 'PelaporKasusController@index');
Route::get('/pelapor_kasus/create', 'PelaporKasusController@create');
Route::post('/pelapor_kasus/store', 'PelaporKasusController@store');
Route::get('/pelapor_kasus/edit/{id}', 'PelaporKasusController@edit');
Route::put('/pelapor_kasus/update/{id}', 'PelaporKasusController@update');
Route::put('/pelapor_kasus/delete/{id}', 'PelaporKasusController@delete');