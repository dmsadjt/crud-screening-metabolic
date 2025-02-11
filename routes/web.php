<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/diagnosa-berhasil', [RekamJejakController::class, 'diagnosaSukses'])->name('diagnosa.success');
Route::post('/diagnosa-baru', [RekamJejakController::class, 'submit']);
Route::post('/pasien-baru', [PasienController::class, 'new'])->name('pasien.new');
Route::get('/pasien-baru', [PasienController::class, 'addSuccess'])->name('pasien.success');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');

Route::get('/detail/{pasien}', [PasienController::class, 'show'])
    ->middleware('auth')
    ->name('admin.pasien.show');

Route::put('/update-pasien', [PasienController::class, 'update'])
    ->middleware('auth')
    ->name('admin.pasien.update');

require __DIR__ . '/auth.php';
