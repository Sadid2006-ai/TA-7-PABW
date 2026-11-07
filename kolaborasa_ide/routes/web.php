<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IdeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

// Autentikasi manual
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Halaman pengelolaan ide (dilindungi middleware auth)
Route::middleware('auth')->group(function () {
    Route::get('ide/{ide}/dokumen/{mode}', [IdeController::class, 'dokumen'])
        ->whereIn('mode', ['lihat', 'unduh'])
        ->name('ide.dokumen');

    Route::resource('ide', IdeController::class)->parameters(['ide' => 'ide']);
});