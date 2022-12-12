<?php

use App\Http\Controllers\KasusController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\PelaporanKasusController;
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

Route::middleware(['auth', 'checkRoleAdmin'])->group(function () {
    Route::get('/kasus', [KasusController::class, 'index']);
    Route::get('/kasus/create', [KasusController::class, 'create']);
    Route::post('/kasus/store', [KasusController::class, 'store']);
    Route::put('/kasus/update/{id_kasus}', [KasusController::class, 'update']);
    Route::get('/disporsisi', [PraKasusController::class, 'lembar_disporsisi']);
    Route::get('/daftar_disporsisi', [PraKasusController::class, 'daftar']);
    Route::get('/disporsisi/{id}', [PraKasusController::class, 'open_data']);
    Route::get('/disporsisi/cetak_pdf/{id}',[PraKasusController::class, 'cetak_pdf']);
    Route::resource('kasus', KasusController::class);
});
Route::middleware(['auth', 'checkRoleTim'])->group(function () {
    Route::get('/tim/kasus/{id_kasus}/PelaporanKasus/{id_pelaporan}', [PelaporanKasusController::class, 'edit']);
    Route::resource('pelaporanKasus', PelaporanKasusController::class)->except(['edit']);
});
Route::middleware(['auth', 'checkRoleMasyarakat'])->group(function () {
    Route::get('/pra_kasus', [PraKasusController::class, 'index']);
    Route::get('/pra_kasus/create', [PraKasusController::class, 'create']);
    Route::post('/pra_kasus/store', [PraKasusController::class, 'store']);
    Route::put('/pra_kasus/update/{id_pra_kasus}', [PraKasusController::class, 'update']);
    Route::resource('pra_kasus', PraKasusController::class);
});
Route::middleware(['auth', 'checkRolePejabat'])->group(function () {
    Route::resource('pelaporanKasus', PelaporanKasusController::class)->except(['edit', 'update', 'create']);
    Route::put('/pegawaiKasus/{id_kasus}',  [KasusController::class, 'updatePegawai']);
    Route::put('/perintahKasus/{id_kasus}',  [KasusController::class, 'updatePerintah']);
    Route::resource('pejabatKasus', PejabatController::class)->except(['create','update','delete','show']);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
