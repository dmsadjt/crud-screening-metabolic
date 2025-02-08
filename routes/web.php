<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamJejakController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/baru', function () {
    return view('daftar');
});

Route::get('/diagnosa', [RekamJejakController::class, 'diagnosaPasien'])->name('diagnosa.new');
Route::post('/diagnosa', [RekamJejakController::class, 'submit']);
Route::post('/pasien-baru', [PasienController::class, 'new'])->name('pasien.new');
Route::get('/pasien-baru', [PasienController::class, 'addSuccess'])->name('pasien.success');
