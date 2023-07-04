<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HitStatus;
use App\Http\Controllers\JadwalBnspController;
use App\Http\Controllers\PostPendidikanController;
use App\Http\Controllers\PostProyekController;
use App\Http\Controllers\PutPersonalController;
use App\Http\Controllers\PutRegistrasi;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', [DataController::class, 'index'])->name('getData');
    Route::post('/store-data', [DataController::class, 'store'])->name('storeData');
    Route::get('/data', function () {
        return view('data');
    })->name('verifikasiData');
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

//Surat Tugas
Route::post('/suratTugas', [SuratTugasController::class, 'surat-tugas'])->name('surat-tugas');

// Route::post('/buat-jadwal/{id_izin}', [JadwalBnspController::class, 'buatJadwal'])->name('buatJadwal');

Route::get('show-data/{id_izin}', function () {
    return view('show');
});

Route::get('idBuatJadwal', function () {
    return view('idBuatJadwal');
})->name('idBuatJadwal');

Route::post('input-jadwal/', function (Request $request) {
    return redirect('input-jadwal/' . $request->input("id_izin"));
})->name("input_jadwal");

Route::get("input-jadwal/{id_izin}", function ($id_izin) {
    return view('buat-jadwal', ['id_izin' => $id_izin]);
});

Route::get("list-pencatatan", [ListPencatatanController::class, 'listPencatatan'])->name('listPencatatan');
    
Route::get('suratTugas', function () {
    return view('suratTugas');
})->name('suratTugas');

// Route::post('/idBuatJadwal/{id_izin}', [JadwalBnspController::class, 'buatJadwal'])->name('buatJadwal');

// Route::get('/idBuatjadwal', [JadwalBnspController::class, 'index'])->name('buatJadwal');



// Generate Certificate
// Route::get('/generate-sertifikat/{id_izin}', SertifikatController::class, 'generate')->name('generate-sertifikat');