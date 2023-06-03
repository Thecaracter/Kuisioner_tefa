<?php

use App\Http\Controllers\anjay;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailPenyimpananController;
use App\Http\Controllers\DetailQuisionerController;
use App\Http\Controllers\JeniQuisionerController;
use App\Http\Controllers\JenisQuisionerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenyimpananController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\QuisionerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//landing routes
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/get-kuisioner', [LandingController::class, 'getQuisioner'])->name('get-kuisioner');
Route::post('/store', [LandingController::class, 'store'])->name('landing.store');

//login routes
Route::post('/masuk', [LoginController::class, 'login'])->name('login');
Route::get('/masuk', [LoginController::class, 'showLoginForm']);

//logout routes
Route::match(['get', 'post'], '/keluar', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'admin'], function () {
    //dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //user routes
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    //quisioner routes
    Route::get('/quisioner', [QuisionerController::class, 'index'])->name('quisioner.index');
    Route::post('/quisioner', [QuisionerController::class, 'store'])->name('quisioner.store');
    Route::put('/quisioner/{id}', [QuisionerController::class, 'update'])->name('quisioner.update');
    Route::delete('/quisioner/{id}', [QuisionerController::class, 'destroy'])->name('quisioner.destroy');

    //detail quisioner routes
    Route::get('/detail-quisioner', [DetailQuisionerController::class, 'index'])->name('detailq.index');
    Route::post('/detail-quisioner', [DetailQuisionerController::class, 'store'])->name('detail-quisioner.store');
    Route::post('/detail-quisioner/{id}', [DetailQuisionerController::class, 'update'])->name('detail-quisioner.update');
    Route::delete('/detail-quisioner/{id}', [DetailQuisionerController::class, 'destroy'])->name('detail-quisioner.destroy');

    //perusahaan routes
    Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
    Route::post('/perusahaan', [PerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::post('/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('/perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');

    //posisi routes
    Route::get('/posisi', [PosisiController::class, 'index'])->name('posisi.index');
    Route::post('/posisi', [PosisiController::class, 'store'])->name('posisi.store');
    Route::post('/posisi/{id}', [PosisiController::class, 'update'])->name('posisi.update');
    Route::delete('/posisi/{id}', [PosisiController::class, 'destroy'])->name('posisi.destroy');

    //penyimpanan routes
    Route::get('/penyimpanan', [PenyimpananController::class, 'index'])->name('penyimpanan.index');
    Route::delete('/penyimpanan/{id}', [PenyimpananController::class, 'destroy'])->name('penyimpanan.destroy');

    //Detail Penyimpanan routes
    Route::get('/detail-penyimpanan/{id}', [DetailPenyimpananController::class, 'index'])->name('detailpenyimpanan');

    //jenis quisioner routes
    Route::get('/jenis-quisioner', [JenisQuisionerController::class, 'index'])->name('jenisq.index');
    Route::post('/jenis-quisioner', [JenisQuisionerController::class, 'store'])->name('jenisq.store');
    Route::post('/jenis-quisioner/{id}', [JenisQuisionerController::class, 'update'])->name('jenisq.update');
    Route::delete('/jenis-quisioner/{id}', [JenisQuisionerController::class, 'destroy'])->name('jenisq.destroy');
});