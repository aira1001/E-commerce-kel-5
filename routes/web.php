<?php

use App\Http\Controllers\KasusReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelaporKasusController;

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

Route::controller(KasusReservationController::class)->group(function(){
    Route::get('/kasus_reservation', [KasusReservationController::class, 'index']);
    Route::get('/kasus_reservation/create', [KasusReservationController::class, 'create']);
    Route::post('/kasus_reservation/store', [KasusReservationController::class, 'store']);
    Route::get('/pelapor_kasus/edit/{id_pelapor}', [PelaporKasusController::class, 'edit']);
    Route::put('/pelapor_kasus/update/{id_pelapor}', [PelaporKasusController::class, 'update']);
    // Route::delete('/pelapor_kasus/delete/{id_pelapor}', [PelaporKasusController::class, 'destroy']);
    Route::resource('kasus_reservation', KasusReservationController::class);
});





