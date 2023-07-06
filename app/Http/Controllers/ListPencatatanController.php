<?php

namespace App\Http\Controllers;

use App\Models\DataPencatatan;
use App\Models\MasterPropinsi;
use App\Models\MasterKabupaten;
use App\Models\KlasifikasiKualifikasi;
use App\Models\MasterJabatanKerja;
use App\Models\Personal;
use Illuminate\Support\Facades\DB;

class ListPencatatanController extends Controller
{
    public function listPencatatan(){
        // Get all data from data_pencatatans
        $listPencatatan = DB::table("data_pencatatans")->join("personals", 'data_pencatatans.id_izin', '=', 'personals.id_izin')->leftJoin("jadwal_bnsp_table", 'data_pencatatans.id_izin', 'jadwal_bnsp_table.id_izin')->get();

        // $listPencatatan = DataPencatatan::all();
        // foreach($listPencatatan as $pencatatan){
        //     Personal::where("id_izin", $pencatatan->id_izin)->update(['status' => "50"]);
        // }
        // dd("Pencatatan berhasil di update!");

        return view("list-pencatatan", ["listPencatatan" => $listPencatatan]);
    }

    public function inputDataPencatatan(){
        $input_id_izin = ['I-2023061705302254355'];
        DB::beginTransaction();
        foreach ($input_id_izin as $id_izin){
            // ambil data dari personals (nama dan nik)
            try{
                $personal = Personal::where("id_izin", $id_izin)->first();

                $propinsi = MasterPropinsi::where("id_propinsi_dagri", $personal->propinsi)->first();

                $kabupaten = MasterKabupaten::where("kode_kabupaten_dagri", $personal->kabupaten)->first();
    
                $klasifikasi_kualifikasi = KlasifikasiKualifikasi::where("id_izin", $id_izin)->first();
    
                $jabatan_kerja = MasterJabatanKerja::where("id_jabatan_kerja", $klasifikasi_kualifikasi->jabatan_kerja)->first();
                
                // masukkan data
                $result = DataPencatatan::create([
                    "nomor_sertifikasi" => "-",
                    "id_izin" => $id_izin,
                    "nik" => $personal->nik,
                    "nama" => $personal->nama,
                    "propinsi" => $propinsi->nama,
                    "id_propinsi" => $propinsi->id_propinsi_dagri,
                    "id_kabupaten" => $kabupaten->kode_kabupaten_dagri,
                    "kabupaten" => $kabupaten->nama_kabupaten_dagri,
                    "id_kualifikasi" => $jabatan_kerja->lsp_kualifikasi_id,
                    "kualifikasi" => $jabatan_kerja->kualifikasi,
                    "kualifikasi_en" => $jabatan_kerja->kualifikasi_en,
                    "id_klasifikasi" => $jabatan_kerja->lsp_id_klasifikasi,
                    "id_subklasifikasi" => $jabatan_kerja->lsp_sub_klasifikasi_id,
                    "subklasifikasi" => $jabatan_kerja->subklasifikasi,
                    "subklasifikasi_en" => $jabatan_kerja->subklasifikasi_en,
                    "id_jabatan_kerja" => $jabatan_kerja->id_jabatan_kerja,
                    "jabatan_kerja" => $jabatan_kerja->jabatan_kerja,
                    "jabatan_kerja_en" => $jabatan_kerja->work_position,
                    "jenjang" => $jabatan_kerja->jenjang_id,
                    "nomor_sertifikat_lengkap" => "-",
                    "nomor_registrasi_lsp" => "-",
                    "nomor_registrasi_lpjk" => "-",
                    "nomor_blangko_bnsp" => "-",
                    "tanggal_ditetapkan" => date('Y-m-d'),
                    "tanggal_masa_berlaku" => date('Y-m-d', strtotime('+5 years -1 day')),
                    "jenis_permohonan" => "-",
                    "qr" => "-",
                    "qr_signature" => "-",
                    "link_e_sertifikat" => "-",
                    "catatan" => "-",
                    "ketua_pelaksana" => "-",
                    "ttd_ketua_pelaksana" => "-",
                ]);
            } catch(\Exception $e){
                dd($e);
                DB::rollBack();
            }
        }
        DB::commit();
    }
}
