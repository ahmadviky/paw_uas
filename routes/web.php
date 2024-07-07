<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/laporan');
});

route::middleware('guest')->controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.store');
});
Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware('auth')->get('anggota/export/{type}', [App\Http\Controllers\AnggotaController::class, 'export'])->name('anggota.export');
Route::middleware('auth')->resource('anggota', App\Http\Controllers\AnggotaController::class);

Route::middleware('auth')->get('buku/export/{type}', [App\Http\Controllers\BukuController::class, 'export'])->name('buku.export');
Route::middleware('auth')->resource('buku', App\Http\Controllers\BukuController::class);

Route::middleware('auth')->get('laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan');
