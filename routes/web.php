<?php

use App\Http\Controllers\DetailQuisionerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
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
Route::get('/', [LandingController::class, 'index']);

//login routes
Route::post('/masuk', [LoginController::class, 'login'])->name('login');
Route::get('/masuk', [LoginController::class, 'showLoginForm']);

//logout routes
Route::post('/keluar', [LoginController::class, 'logout'])->name('logout');

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