<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProsesController;
use Illuminate\Support\Facades\Route;

/// group untuk controller MenuController
Route::controller(MenuController::class)->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('index')->middleware('isLogin');
    Route::get('/daftar', [MenuController::class, 'daftar'])->name('daftar')->middleware('isLogin');
    Route::get('/admin', [MenuController::class, 'admin'])->name('admin')->middleware('isLogin');
});

// route untuk login yang dihubungkan dengan controler login
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('isTamu');
    Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses')->middleware('isTamu');
    Route::post('/register-proses', [AuthController::class, 'register_proses'])->name('register-proses')->middleware('isLogin');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::controller(ProsesController::class)->group(function () {
    Route::post('/delete-proses', [ProsesController::class, 'delete_proses'])->name('delete-proses')->middleware('isLogin');
    Route::post('/titip-proses', [ProsesController::class, 'titip_proses'])->name('titip-proses')->middleware('isLogin');
    Route::post('/keluar-proses/{kode}', [ProsesController::class, 'keluar_proses'])->name('keluar-proses')->middleware('isLogin');
});

Route::controller(PrintController::class)->group(function () {
    Route::get('/print', [PrintController::class, 'print'])->name('print')->middleware('isLogin');
    Route::post('/print-proses', [PrintController::class, 'print_proses'])->name('print-proses')->middleware('isLogin');
});
