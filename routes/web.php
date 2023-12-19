<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruBKController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function(){
    return view('template.master');
});

Route::resource('/siswa', SiswaController::class);
Route::resource('/guru_bk', GuruBKController::class);
Route::resource('/pelanggaran', PelanggaranController::class);
Route::resource('/kelas', KelasController::class);
// Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');


Route::controller(AuthController::class)->group(function() {
    Route::get('/registration', 'register')->name('auth.register');
    Route::post('/store', 'store')->name('auth.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/auth', 'authentication')->name('auth.authentication');
    Route::get('/dashboard', 'dashboard')->name('auth.dashboard');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::get('exportPdf', [PdfController::class, 'exportPdf'])->name('exportPdf');
