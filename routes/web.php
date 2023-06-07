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
use Illuminate\Http\Request;



Route::get('/', [DataController::class, 'index'])->name('getData');
Route::post('/store-data', [DataController::class, 'store'])->name('storeData');


Route::get('/data', function () {
  return view('data');
});

// Route::post('/idBuatJadwal/{id_izin}', [JadwalBnspController::class, 'buatJadwal'])->name('buatJadwal');

// Route::get('/idBuatjadwal', [JadwalBnspController::class, 'index'])->name('buatJadwal');

Route::post('/show-data', [DataController::class, 'showData'])->name('showData');
Route::post('/buat-jadwal', [DataController::class, 'buatJadwal'])->name('buatJadwal');

Route::post('/buat-jadwal', [JadwalBnspController::class, 'buatJadwal'])->name('buatJadwal');

Route::post('/show-data/{id_izin}', [PutPersonalController::class, 'storePersonal'])->name('storePersonal');
Route::post('/buat-jadwal/{id_izin}', [PutPersonalController::class, 'storePersonal'])->name('storePersonal');

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
Route::post('/buat-jadwal', [JadwalBnspController::class, 'storeJadwal'])->name('storeJadwal');

// Route::post('/buat-jadwal/{id_izin}', [JadwalBnspController::class, 'buatJadwal'])->name('buatJadwal');

Route::get('show-data/{id_izin}', function () {
  return view('show');
});

Route::get('idBuatJadwal', function () {
  return view('idBuatJadwal');
});

Route::post('input-jadwal/', function (Request $request) {
  return redirect('input-jadwal/' . $request->input("id_izin"));
})->name("input_jadwal");

Route::get("input-jadwal/{id_izin}", function($id_izin){
  return view('buat-jadwal', ['id_izin' => $id_izin]);
});



// Generate Certificate
// Route::get('/generate-sertifikat/{id_izin}', SertifikatController::class, 'generate')->name('generate-sertifikat');
