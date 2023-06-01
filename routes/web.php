<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\HitStatus;
use App\Http\Controllers\JadwalBnspController;
use App\Http\Controllers\PostPendidikanController;
use App\Http\Controllers\PostProyekController;
use App\Http\Controllers\PutPersonalController;
use App\Http\Controllers\PutRegistrasi;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DataController::class, 'index'])->name('getData');
Route::post('/store-data', [DataController::class, 'store'])->name('storeData');


Route::get('/data', function () {
  return view('data');
});
Route::post('/show-data', [DataController::class, 'showData'])->name('showData');

Route::post('/show-data/{id_izin}', [PutPersonalController::class, 'storePersonal'])->name('storePersonal');

// Tombol Verifikasi
Route::post('/verifikasi/{id_izin}', [HitStatus::class, 'hitVerifikasi'])->name('hitVerifikasi');

// Tombol Validasi
Route::post('/validasi/{id_izin}', [HitStatus::class, 'hitValidasi'])->name('hitValidasi');

// Tombol Update Registrasi
Route::post('/registrasi/{id_izin}', [PutRegistrasi::class, 'storeRegistrasi'])->name('storeRegistrasi');

// Tombol Update Pendidikan
Route::post('store-pendidikan/{id_izin}', [PostPendidikanController::class, 'storePendidikan'])->name('storePendidikan');

// Tombol Update Proyek
Route::post('store-proyek/{id_izin}', [PostProyekController::class, 'storeProyek'])->name('storeProyek');

//Buat Jadwal
Route::post('buat-jadwal/{id_izin}', [JadwalBnspController::class, 'buatJadwal'])->name('buatJadwal');

Route::get('show-data/{id_izin}', function () {
  return view('show');
});

// Generate Certificate
// Route::get('/generate-sertifikat/{id_izin}', SertifikatController::class, 'generate')->name('generate-sertifikat');
