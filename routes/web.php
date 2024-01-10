<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuruController;


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

Route::get('/home', [IndexController::class, 'home']);

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/login_admin', 'loginAdmin');
    Route::post('/login_guru', 'loginGuru');
    Route::post('/login_siswa', 'loginSiswa');
    Route::get('/logout', 'logout');
    Route::get('/home', 'home');
});

Route::middleware('CheckUserRole:admin')->group(function () {
    Route::controller(GuruController::class)->prefix('guru')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{guru}', 'edit');
        Route::post('/update/{guru}', 'update');
        Route::get('/destroy/{guru}', 'destroy');
    });
});
