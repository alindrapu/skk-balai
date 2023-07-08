<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\DataPencatatan;
use App\Models\Personal;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Ramsey\Uuid\Uuid;

class CertificateController extends Controller
{
    public function index(){
        $id_izin = "I-2023061913210242846";

        $dataPencatatan = DataPencatatan::where("id_izin", $id_izin)->first();
        if($dataPencatatan->jenjang == 1){
            $jenjang_en = "One";
        }
        else if($dataPencatatan->jenjang == 2){
            $jenjang_en = "Two";
        }
        else if($dataPencatatan->jenjang == 3){
            $jenjang_en = "Three";
        }
        else if($dataPencatatan->jenjang == 4){
            $jenjang_en = "Four";
        }
        else if($dataPencatatan->jenjang == 5){
            $jenjang_en = "Five";
        }
        else if($dataPencatatan->jenjang == 6){
            $jenjang_en = "Six";
        }
        else if($dataPencatatan->jenjang == 7){
            $jenjang_en = "Seven";
        }
        else if($dataPencatatan->jenjang == 8){
            $jenjang_en = "Eight";
        }
        else if($dataPencatatan->jenjang == 9){
            $jenjang_en = "Nine";
        }

        $pas_foto = Personal::select("pas_foto")->where("id_izin", $id_izin)->first();

        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        
        $tgl_ditetapkan =  $dataPencatatan->tanggal_ditetapkan;
        $tanggal_ditetapkan = Carbon::parse($tgl_ditetapkan)->isoFormat('D MMMM Y');
        
        setlocale(LC_TIME, 'en_EN');
        Carbon::setLocale('en');
        
        $tgl_ditetapkan_en =  $dataPencatatan->tanggal_ditetapkan;
        $tanggal_ditetapkan_en = Carbon::parse($tgl_ditetapkan_en)->isoFormat('MMMM, D Y');
        
        $result = [
            "nama" => $dataPencatatan->nama,
            "kualifikasi" => $dataPencatatan->kualifikasi,
            "kualifikasi_en" => $dataPencatatan->kualifikasi_en,
            "subklasifikasi" => $dataPencatatan->subklasifikasi,
            "subklasifikasi_en" => $dataPencatatan->subklasifikasi_en,
            "jabatan_kerja" => $dataPencatatan->jabatan_kerja,
            "jabatan_kerja_en" => $dataPencatatan->jabatan_kerja_en,
            "jenjang" => $dataPencatatan->jenjang,
            "jenjang_en" => $jenjang_en,
            "pas_foto" => $pas_foto->pas_foto,
            "nomor_registrasi_lpjk" => $dataPencatatan->nomor_registrasi_lpjk,
            "nomor_sertifikat_lengkap" => $dataPencatatan->nomor_sertifikat_lengkap,
            "nomor_registrasi_lsp" => $dataPencatatan->nomor_registrasi_lsp,
            "nomor_blangko_bnsp" => $dataPencatatan->nomor_blangko_bnsp,
            "tanggal_ditetapkan" => $tanggal_ditetapkan,
            "tanggal_ditetapkan_en" => $tanggal_ditetapkan_en,
            "qr" => $dataPencatatan->qr,
            "qr_ketua" => QrCode::margin(0)->size(70)->generate("Radinal Efendy, ST\n" . $tanggal_ditetapkan)
        ];

        // Export to html and save to lspgatensi.id/files/balai/sertifikat/
        $nama_file = (string) Uuid::uuid4();
        $html = view('certificate.sertifikat', $result)->render();
        Storage::disk("sertif_ftp")->put("/balai/sertifikat/" . $nama_file . ".html", $html);

        return redirect("https://lspgatensi.id/files/balai/sertifikat/" . $nama_file . ".html");
    }
}
