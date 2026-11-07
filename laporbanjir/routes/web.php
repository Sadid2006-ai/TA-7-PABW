<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanWargaController;
use Illuminate\Support\Facades\Route;

// Publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/lapor', [LaporanWargaController::class, 'create'])->name('lapor.create');
Route::post('/lapor', [LaporanWargaController::class, 'store'])->name('lapor.store');

// Autentikasi manual
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Pengelolaan petugas (semua di dalam middleware auth)
Route::middleware('auth')->prefix('petugas')->group(function () {
    Route::resource('laporan', LaporanController::class)
        ->only(['index', 'show', 'edit', 'update', 'destroy']);
});