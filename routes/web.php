<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamJejakController;
use App\Http\Controllers\RekomendasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/baru', function () {
    return view('daftar');
});

Route::post('/test-logout', function () {
    dd('Test logout hit');
})->name('test-logout');

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

Route::delete('/delete-pasien/{pasien}', [PasienController::class, 'delete'])
    ->middleware('auth')
    ->name('admin.pasien.delete');

Route::put('/update-riwayat', [RekamJejakController::class, 'update'])
    ->middleware('auth')
    ->name('admin.rekam.update');

Route::delete('/delete-rekam/{rekam}', [RekamJejakController::class, 'delete'])
    ->middleware('auth')
    ->name('admin.rekam.delete');

Route::get('/recommendations/{id}', [RekomendasiController::class, 'getByDiagnosis']);

require __DIR__ . '/auth.php';
