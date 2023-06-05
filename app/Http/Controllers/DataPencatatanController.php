<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class DataPencatatanController extends Controller
{
    public function generateDataPencatatan(Request $request, $id_izin)
    {
        $klasifikasiKualifikasi = DB::table('klasifikasi_kualifikasis')->where('id_izin', $id_izin)->select('jabatan_kerja', 'jenjang')->first();
        $personal = DB::table('personals')->where('id_izin', $id_izin)->where('pas_foto')->first();
    }
}
