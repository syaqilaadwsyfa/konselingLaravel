<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruBKController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KonselingController;
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


// Route::get('/', function(){
//     return view('template.master');
// });

Route::resource('/siswa', SiswaController::class)->middleware('auth');
Route::resource('/guru_bk', GuruBKController::class)->middleware('auth');
Route::resource('/pelanggaran', PelanggaranController::class)->middleware('auth');
Route::resource('/kelas', KelasController::class)->middleware('auth');

Route::controller(AuthController::class)->group(function() {
    Route::get('/registration', 'register')->name('auth.register');
    Route::get('/register', 'registerGuru')->name('auth.registerGuru')->middleware('can:isAdmin');
    Route::post('/store', 'store')->name('auth.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/auth', 'authentication')->name('auth.authentication');
    Route::get('/', 'dashboard')->name('auth.dashboard');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::get('exportPdf', [PdfController::class, 'exportPdf'])->name('exportPdf');

// Route Konseling yaa choco
Route::get('/konseling', [KonselingController::class, 'index'])->name('konseling.index')->middleware('auth');
Route::get('/konseling/create', [KonselingController::class, 'create'])->name('konseling.create')->middleware('auth');
Route::post('/konseling/store', [KonselingController::class, 'store'])->name('konseling.store')->middleware('auth');
Route::get('/konseling/history/{siswa_id}', [KonselingController::class, 'history'])->name('konseling.history')->middleware('auth');
Route::get('/konseling/req/{guru_id}', [KonselingController::class, 'requestKonsul'])->name('konseling.req')->middleware('auth');
Route::get('/konseling/req/tolak/{konseling_id}', [KonselingController::class, 'tolakReq'])->name('req.tolak')->middleware('auth');
Route::get('/konseling/req/terima/{konseling_id}', [KonselingController::class, 'terimaReq'])->name('req.terima')->middleware('auth');
