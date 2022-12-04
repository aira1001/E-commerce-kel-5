<?php

use App\Http\Controllers\KasusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PraKasusController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/kasus', [KasusController::class, 'index']);
Route::get('/kasus/create', 'KasusController@create');
Route::post('/kasus/store', 'KasusController@store');
Route::get('/kasus/edit/{id}', 'KasusController@edit');
Route::put('/kasus/update/{id}', 'KasusController@update');
Route::put('/kasus/delete/{id}', 'KasusController@delete');
Route::get('/disporsisi', [PraKasusController::class, 'lembar_disporsisi']);
Route::get('/daftar_disporsisi', [PraKasusController::class, 'daftar']);
Route::get('/disporsisi/{id}', [PraKasusController::class, 'open_data']);

Route::middleware(['auth', 'checkRoleMasyarakat'])->group(function () {
    Route::get('/pra_kasus', [PraKasusController::class, 'index']);
    Route::get('/pra_kasus/create', [PraKasusController::class, 'create']);
    Route::post('/pra_kasus/store', [PraKasusController::class, 'store']);
    // Route::get('/pra_kasus/{id_pra_kasus}/edit', [PraKasusController::class, 'edit']);
    Route::put('/pra_kasus/update/{id_pra_kasus}', [PraKasusController::class, 'update']);
    // Route::get('/pra_kasus/{id_pra_kasus}', [PraKasusController::class, 'show']);
    // Route::delete('/pelapor_kasus/delete/{id_pelapor}', [PelaporKasusController::class, 'destroy']);
    Route::resource('pra_kasus', PraKasusController::class);
    
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
