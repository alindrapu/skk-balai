<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\PutPersonalController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DataController::class, 'index'])->name('getData');
Route::post('/store-data', [DataController::class, 'store'])->name('storeData');


Route::get('/data', function () {
  return view('data');
});
Route::post('/show-data', [DataController::class, 'showData'])->name('showData');


Route::post('/show-data/{id_izin}', [PutPersonalController::class, 'storePersonal'])->name('storePersonal');
