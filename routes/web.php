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

Route::middleware(['auth', 'checkRoleAdmin'])->group(function () {
    Route::get('/kasus', [KasusController::class, 'index']);
    Route::get('/kasus/create', [KasusController::class, 'create']);
    // Route::get('/kasus/{id_kasus}', [KasusController::class, 'show']);
    Route::post('/kasus/store', [KasusController::class, 'store']);
    Route::put('/kasus/update/{id_kasus}', [KasusController::class, 'update']);
    Route::resource('kasus', KasusController::class);
});
Route::middleware(['auth', 'checkRoleTim'])->group(function () {
    Route::get('/tim/kasus', [PelaporanKasusController::class, 'index']);
    Route::get('/tim/kasus/{id_kasus}', [PelaporanKasusController::class, 'show']);
    Route::get('/tim/kasus/{id_kasus}/PelaporanKasus', [PelaporanKasusController::class, 'create']);
    Route::get('/tim/kasus/{id_kasus}/PelaporanKasus/{id_pelaporan}', [PelaporanKasusController::class, 'edit']);
    Route::post('/tim/PelaporanKasus/store', [PelaporanKasusController::class, 'store']);
    Route::put('/tim/pelaporanKasus/update', [PelaporanKasusController::class, 'update']);
    Route::resource('PelaporanKasus', PelaporanKasusController::class);
});
Route::middleware(['auth', 'checkRoleMasyarakat'])->group(function () {
    Route::get('/pra_kasus', [PraKasusController::class, 'index']);
    Route::get('/pra_kasus/create', [PraKasusController::class, 'create']);
    Route::post('/pra_kasus/store', [PraKasusController::class, 'store']);
    Route::put('/pra_kasus/update/{id_pra_kasus}', [PraKasusController::class, 'update']);
    // Route::get('/pra_kasus/{id_pra_kasus}', [PraKasusController::class, 'show']);
    // Route::delete('/pelapor_kasus/delete/{id_pelapor}', [PelaporKasusController::class, 'destroy']);
    Route::resource('pra_kasus', PraKasusController::class);
});

// Route::get('/kasus', [KasusController::class, 'index']);
// Route::get('/kasus/create', 'KasusController@create');
// Route::post('/kasus/store', 'KasusController@store');
// Route::get('/kasus/edit/{id}', 'KasusController@edit');
// Route::put('/kasus/update/{id}', 'KasusController@update');
// Route::put('/kasus/delete/{id}', 'KasusController@delete');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

