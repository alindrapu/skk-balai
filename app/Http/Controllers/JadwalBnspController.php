<?php

namespace App\Http\Controllers;

use App\Models\JadwalBNSP;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\log;
use Illuminate\Database\QueryException;

class JadwalBnspController extends Controller
{
    public function index()
    {
        return view('idBuatJadwal');
    }

    public function buatJadwal(Request $request)
    {
        // Retrieve values from the "personals" table
        $id_izin = $request->input('id_izin');
        $personalsData = DB::table('personals')->where('id_izin', $id_izin)->select('nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'kabupaten', 'propinsi', 'telepon', 'email')->first();

        $jadwal_id = (int)$request->input('jadwal_id');
        $tuk_id = 45945;
        $asesor_id = (int)$request->input('asesor_id');
        $jenis_kelamin = $personalsData->jenis_kelamin;
        $nik = $personalsData->nik;
        $nama = $personalsData->nama;
        $tempat_lahir = $personalsData->tempat_lahir;
        $tanggal_lahir = $personalsData->tanggal_lahir;
        $jenis_kelamin = ($personalsData->jenis_kelamin == 'pria') ? 2 : 1;
        $alamat = $personalsData->alamat;
        $kota_id = $personalsData->kabupaten;
        $provinsi_id = $personalsData->propinsi;
        $telepon = $personalsData->telepon;
        $email = $personalsData->email;
        $skema_id = (int)$request->input('skema_id');


        // Retrieve values from the "pendidikans" table
        $pendidikansData = DB::table('pendidikans')->where('id_izin', $id_izin)->select('program_studi', 'no_ijazah', 'tahun_lulus', 'propinsi', 'jenjang', 'kabupaten', 'nama_sekolah_perguruan_tinggi', 'scan_ijazah_legalisir')->first();

        $prodi = $pendidikansData->program_studi;
        $no_ijasah = $pendidikansData->no_ijazah;
        $tahun_lulus = $pendidikansData->tahun_lulus;
        $kota_sekolah = $pendidikansData->kabupaten;
        $prov_sekolah = $pendidikansData->propinsi;
        $nama_sekolah = $pendidikansData->nama_sekolah_perguruan_tinggi;
        $fileFotoData = DB::table('personals')->where('id_izin', $id_izin)->select('pas_foto')->first();
        $file_foto = $fileFotoData->pas_foto;
        $fileKtpData = DB::table('personals')->where('id_izin', $id_izin)->select('ktp')->first();
        $file_ktp = $fileKtpData->ktp;
        $file_ijazah = $pendidikansData->scan_ijazah_legalisir;
        $jenjang_id = ($pendidikansData->jenjang == 8) ? 7 : $pendidikansData->jenjang;

        $apiData = [
            "jadwal_id" => $jadwal_id,
            "tuk_id" => $tuk_id,
            "asesor_id" => $asesor_id,
            "is_fg" => 0,
            "nik" => $nik,
            "nib" => "",
            "nama" => $nama,
            "tempat_lahir" => $tempat_lahir,
            "tanggal_lahir" => $tanggal_lahir,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat" => $alamat,
            "kota_id" => $kota_id,
            "provinsi_id" => $provinsi_id,
            "negara_id" => 1,
            "telepon" => $telepon,
            "email" => $email,
            "jenis_mohon" => 1,
            "skema_id" => $skema_id,
            "keterangan" => "",
            "jenjang_id" => $jenjang_id,
            "prodi" => $prodi,
            "no_ijasah" => $no_ijasah,
            "tanggal_ijazah" => '0000-00-00',
            "tahun_lulus" => $tahun_lulus,
            "kota_sekolah" => (int)$kota_sekolah,
            "prov_sekolah" => (int)$prov_sekolah,
            "negara_sekolah" => 1,
            "nama_sekolah" => $nama_sekolah,
            "pekerjaan" => 89,
            "instansi_pekerjaan" => "",
            "jabatan_pekerjaan" => "",
            "file_foto" => $file_foto,
            "file_ktp" => $file_ktp,
            "file_nib" => "",
            "file_ijazah" => $file_ijazah
        ];


        $httpClient = new \GuzzleHttp\Client();
        $authData = DB::table('b_n_s_p_auths')->select('x_authorization')->first()->x_authorization;
        $apiEndpoint = 'https://konstruksi.bnsp.go.id/api/v1/jadwal/peserta';

        try {
            $response = $httpClient->request('POST', $apiEndpoint, [
                'headers' => [
                    'Authorization' => $request->header('Authorization'),
                    'x-authorization' => $authData,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $apiData,
            ]);

            // $responseBody = $response->getBody()->getContents();
            // $responseData = json_decode($responseBody, true);


            // return response()->json(['success' => true, 'responseData' => $responseData]);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $responseBody = $response->getBody()->getContents();
                $responseData = json_decode($responseBody, true);

                // Log the Error
                error_log("API Request Failed with status code: $statusCode, response body: $responseBody");

                // Return the error response to the user
                return response()->json(['error' => 'Failed to process data', 'message' => $responseData['message']], $statusCode);
            }
            // else {
            //     // Handle the exception if no response is available
            //     return response()->json(['error' => 'Failed to process data', 'message' => 'An error occurred during the API request'], 500);
            // }
        }

        // try {
        //     DB::beginTransaction();
        //     $jadwalBnsp = JadwalBNSP::where('id_izin', $id_izin)->first();

        //     if ($jadwalBnsp) {
        //         $jadwalBnsp->id_izin = $id_izin;
        //         $jadwalBnsp->jadwal_id = $apiData['jadwal_id'];
        //         $jadwalBnsp->tuk_id = $apiData['tuk_id'];
        //         $jadwalBnsp->asesor_id = $apiData['asesor_id'];
        //         $jadwalBnsp->is_fg = $apiData['is_fg'];
        //         $jadwalBnsp->nik = $apiData['nik'];
        //         $jadwalBnsp->nib = $apiData['nib'];
        //         $jadwalBnsp->nama = $apiData['nama'];
        //         $jadwalBnsp->tempat_lahir = $apiData['tempat_lahir'];
        //         $jadwalBnsp->tanggal_lahir = $apiData['tanggal_lahir'];
        //         $jadwalBnsp->jenis_kelamin = $apiData['jenis_kelamin'];
        //         $jadwalBnsp->alamat = $apiData['alamat'];
        //         $jadwalBnsp->kota_id = $apiData['kota_id'];
        //         $jadwalBnsp->provinsi_id = $apiData['provinsi_id'];
        //         $jadwalBnsp->negara_id = $apiData['negara_id'];
        //         $jadwalBnsp->telepon = $apiData['telepon'];
        //         $jadwalBnsp->email = $apiData['email'];
        //         $jadwalBnsp->jenis_mohon = $apiData['jenis_mohon'];
        //         $jadwalBnsp->skema_id = $apiData['skema_id'];
        //         $jadwalBnsp->keterangan = $apiData['keterangan'];
        //         $jadwalBnsp->jenjang_id = $apiData['jenjang_id'];
        //         $jadwalBnsp->prodi = $apiData['prodi'];
        //         $jadwalBnsp->no_ijasah = $apiData['no_ijasah'];
        //         // $jadwalBnsp->tanggal_ijazah = $apiData['tanggal_ijazah'];
        //         $jadwalBnsp->tahun_lulus = $apiData['tahun_lulus'];
        //         $jadwalBnsp->kota_sekolah = $apiData['kota_sekolah'];
        //         $jadwalBnsp->prov_sekolah = $apiData['prov_sekolah'];
        //         $jadwalBnsp->negara_sekolah = $apiData['negara_sekolah'];
        //         $jadwalBnsp->nama_sekolah = $apiData['nama_sekolah'];
        //         $jadwalBnsp->pekerjaan = $apiData['pekerjaan'];
        //         $jadwalBnsp->instansi_pekerjaan = $apiData['instansi_pekerjaan'];
        //         $jadwalBnsp->jabatan_pekerjaan = $apiData['jabatan_pekerjaan'];
        //         $jadwalBnsp->file_foto = $apiData['file_foto'];
        //         $jadwalBnsp->file_ktp = $apiData['file_ktp'];
        //         $jadwalBnsp->file_nib = $apiData['file_nib'];
        //         $jadwalBnsp->file_ijazah = $apiData['file_ijazah'];
        //         $jadwalBnsp->save();
        //     } else {
        //         $jadwalBnsp = new JadwalBNSP();
        //         $jadwalBnsp->id_izin = $id_izin;
        //         $jadwalBnsp->jadwal_id = $apiData['jadwal_id'];
        //         $jadwalBnsp->tuk_id = $apiData['tuk_id'];
        //         $jadwalBnsp->asesor_id = $apiData['asesor_id'];
        //         $jadwalBnsp->is_fg = $apiData['is_fg'];
        //         $jadwalBnsp->nik = $apiData['nik'];
        //         $jadwalBnsp->nib = $apiData['nib'];
        //         $jadwalBnsp->nama = $apiData['nama'];
        //         $jadwalBnsp->tempat_lahir = $apiData['tempat_lahir'];
        //         $jadwalBnsp->tanggal_lahir = $apiData['tanggal_lahir'];
        //         $jadwalBnsp->jenis_kelamin = $apiData['jenis_kelamin'];
        //         $jadwalBnsp->alamat = $apiData['alamat'];
        //         $jadwalBnsp->kota_id = $apiData['kota_id'];
        //         $jadwalBnsp->provinsi_id = $apiData['provinsi_id'];
        //         $jadwalBnsp->negara_id = $apiData['negara_id'];
        //         $jadwalBnsp->telepon = $apiData['telepon'];
        //         $jadwalBnsp->email = $apiData['email'];
        //         $jadwalBnsp->jenis_mohon = $apiData['jenis_mohon'];
        //         $jadwalBnsp->skema_id = $apiData['skema_id'];
        //         $jadwalBnsp->keterangan = $apiData['keterangan'];
        //         $jadwalBnsp->jenjang_id = $apiData['jenjang_id'];
        //         $jadwalBnsp->prodi = $apiData['prodi'];
        //         $jadwalBnsp->no_ijasah = $apiData['no_ijasah'];
        //         // $jadwalBnsp->tanggal_ijazah = $apiData['tanggal_ijazah'];
        //         $jadwalBnsp->tahun_lulus = $apiData['tahun_lulus'];
        //         $jadwalBnsp->kota_sekolah = $apiData['kota_sekolah'];
        //         $jadwalBnsp->prov_sekolah = $apiData['prov_sekolah'];
        //         $jadwalBnsp->negara_sekolah = $apiData['negara_sekolah'];
        //         $jadwalBnsp->nama_sekolah = $apiData['nama_sekolah'];
        //         $jadwalBnsp->pekerjaan = $apiData['pekerjaan'];
        //         $jadwalBnsp->instansi_pekerjaan = $apiData['instansi_pekerjaan'];
        //         $jadwalBnsp->jabatan_pekerjaan = $apiData['jabatan_pekerjaan'];
        //         $jadwalBnsp->file_foto = $apiData['file_foto'];
        //         $jadwalBnsp->file_ktp = $apiData['file_ktp'];
        //         $jadwalBnsp->file_nib = $apiData['file_nib'];
        //         $jadwalBnsp->file_ijazah = $apiData['file_ijazah'];
        //         $jadwalBnsp->save();
        //     }

        //     DB::commit();
        //     return response()->json(['success' => true, 'apiData' => $apiData]);
        // } catch (QueryException $e) {
        //     DB::rollBack();
        //     $errorMessage = 'Error putting data into the database: ' . $e->getMessage();
        //     return response()->json(['error' => $errorMessage], 500);
        // }

        return view('idBuatJadwal', ['id_izin' => $id_izin]);
    }


    public function storeJadwal(Request $request)
    {
        $id_izin = $request->input("id_izin");
        // Retrieve values from the "personals" table
        $personalsData = DB::table('personals')->where('id_izin', $id_izin)->select('nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'kabupaten', 'propinsi', 'telepon', 'email')->first();

        $jadwal_id = (int)$request->input('jadwal_id');
        $tuk_id = 45945;
        $asesor_id = (int)$request->input('asesor_id');
        $jenis_kelamin = $personalsData->jenis_kelamin;
        $nik = $personalsData->nik;
        $nama = $personalsData->nama;
        $tempat_lahir = $personalsData->tempat_lahir;
        $tanggal_lahir = $personalsData->tanggal_lahir;
        $jenis_kelamin = ($personalsData->jenis_kelamin == 'pria') ? 2 : 1;
        $alamat = $personalsData->alamat;
        $kota_id = $personalsData->kabupaten;
        $provinsi_id = $personalsData->propinsi;
        $telepon = $personalsData->telepon;
        $email = $personalsData->email;


        // Retrieve values from the "pendidikans" table
        $pendidikansData = DB::table('pendidikans')->where('id_izin', $id_izin)->select('program_studi', 'no_ijazah', 'tahun_lulus', 'propinsi', 'jenjang', 'kabupaten', 'nama_sekolah_perguruan_tinggi', 'scan_ijazah_legalisir')->first();
        $prodi = $pendidikansData->program_studi;
        $no_ijasah = $pendidikansData->no_ijazah;
        $tahun_lulus = $pendidikansData->tahun_lulus;
        $kota_sekolah = $pendidikansData->kabupaten;
        $prov_sekolah = $pendidikansData->propinsi;
        $nama_sekolah = $pendidikansData->nama_sekolah_perguruan_tinggi;
        $fileFotoData = DB::table('personals')->where('id_izin', $id_izin)->select('pas_foto')->first();
        $file_foto = $fileFotoData->pas_foto;
        $fileKtpData = DB::table('personals')->where('id_izin', $id_izin)->select('ktp')->first();
        $file_ktp = $fileKtpData->ktp;
        $file_ijazah = $pendidikansData->scan_ijazah_legalisir;
        $jenjang_id = ($pendidikansData->jenjang == 8) ? 7 : $pendidikansData->jenjang;

        $apiData = [
            "jadwal_id" => $jadwal_id,
            "tuk_id" => $tuk_id,
            "asesor_id" => $asesor_id,
            "is_fg" => 0,
            "nik" => $nik,
            "nib" => "",
            "nama" => $nama,
            "tempat_lahir" => $tempat_lahir,
            "tanggal_lahir" => $tanggal_lahir,
            "jenis_kelamin" => $jenis_kelamin,
            "alamat" => $alamat,
            "kota_id" => $kota_id,
            "provinsi_id" => $provinsi_id,
            "negara_id" => 1,
            "telepon" => $telepon,
            "email" => $email,
            "jenis_mohon" => 1,
            "skema_id" => 63547,
            "keterangan" => "",
            "jenjang_id" => $jenjang_id,
            "prodi" => $prodi,
            "no_ijasah" => $no_ijasah,
            "tanggal_ijazah" => '0000-00-00',
            "tahun_lulus" => $tahun_lulus,
            "kota_sekolah" => (int)$kota_sekolah,
            "prov_sekolah" => (int)$prov_sekolah,
            "negara_sekolah" => 1,
            "nama_sekolah" => $nama_sekolah,
            "pekerjaan" => 89,
            "instansi_pekerjaan" => "",
            "jabatan_pekerjaan" => "",
            "file_foto" => $file_foto,
            "file_ktp" => $file_ktp,
            "file_nib" => "",
            "file_ijazah" => $file_ijazah
        ];


        $httpClient = new \GuzzleHttp\Client();
        $authData = DB::table('b_n_s_p_auths')->select('x_authorization')->first()->x_authorization;
        $apiEndpoint = 'https://konstruksi.bnsp.go.id/api/v1/jadwal/peserta';

        try {
            $response = $httpClient->request('POST', $apiEndpoint, [
                'headers' => [
                    'Authorization' => $request->header('Authorization'),
                    'x-authorization' => $authData,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $apiData,
            ]);

            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);


            return response()->json(['success' => true, 'responseData' => $responseData]);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $responseBody = $response->getBody()->getContents();
                $responseData = json_decode($responseBody, true);

                // Log the Error
                error_log("API Request Failed with status code: $statusCode, response body: $responseBody");

                // Return the error response to the user
                return response()->json(['error' => 'Failed to process data', 'message' => $responseData['message']], $statusCode);
            }
            // else {
            //     // Handle the exception if no response is available
            //     return response()->json(['error' => 'Failed to process data', 'message' => 'An error occurred during the API request'], 500);
            // }
        }
        // DB::beginTransaction();
        // try {
        //     $jadwalBnsp = JadwalBNSP::where('id_izin', $id_izin)->first();

        //     if ($jadwalBnsp) {
        //         $jadwalBnsp->id_izin = $id_izin;
        //         $jadwalBnsp->jadwal_id = $apiData['jadwal_id'];
        //         $jadwalBnsp->tuk_id = $apiData['tuk_id'];
        //         $jadwalBnsp->asesor_id = $apiData['asesor_id'];
        //         $jadwalBnsp->is_fg = $apiData['is_fg'];
        //         $jadwalBnsp->nik = $apiData['nik'];
        //         $jadwalBnsp->nib = $apiData['nib'];
        //         $jadwalBnsp->nama = $apiData['nama'];
        //         $jadwalBnsp->tempat_lahir = $apiData['tempat_lahir'];
        //         $jadwalBnsp->tanggal_lahir = $apiData['tanggal_lahir'];
        //         $jadwalBnsp->jenis_kelamin = $apiData['jenis_kelamin'];
        //         $jadwalBnsp->alamat = $apiData['alamat'];
        //         $jadwalBnsp->kota_id = $apiData['kota_id'];
        //         $jadwalBnsp->provinsi_id = $apiData['provinsi_id'];
        //         $jadwalBnsp->negara_id = $apiData['negara_id'];
        //         $jadwalBnsp->telepon = $apiData['telepon'];
        //         $jadwalBnsp->email = $apiData['email'];
        //         $jadwalBnsp->jenis_mohon = $apiData['jenis_mohon'];
        //         $jadwalBnsp->skema_id = $apiData['skema_id'];
        //         $jadwalBnsp->keterangan = $apiData['keterangan'];
        //         $jadwalBnsp->jenjang_id = $apiData['jenjang_id'];
        //         $jadwalBnsp->prodi = $apiData['prodi'];
        //         $jadwalBnsp->no_ijasah = $apiData['no_ijasah'];
        //         // $jadwalBnsp->tanggal_ijazah = $apiData['tanggal_ijazah'];
        //         $jadwalBnsp->tahun_lulus = $apiData['tahun_lulus'];
        //         $jadwalBnsp->kota_sekolah = $apiData['kota_sekolah'];
        //         $jadwalBnsp->prov_sekolah = $apiData['prov_sekolah'];
        //         $jadwalBnsp->negara_sekolah = $apiData['negara_sekolah'];
        //         $jadwalBnsp->nama_sekolah = $apiData['nama_sekolah'];
        //         $jadwalBnsp->pekerjaan = $apiData['pekerjaan'];
        //         $jadwalBnsp->instansi_pekerjaan = $apiData['instansi_pekerjaan'];
        //         $jadwalBnsp->jabatan_pekerjaan = $apiData['jabatan_pekerjaan'];
        //         $jadwalBnsp->file_foto = $apiData['file_foto'];
        //         $jadwalBnsp->file_ktp = $apiData['file_ktp'];
        //         $jadwalBnsp->file_nib = $apiData['file_nib'];
        //         $jadwalBnsp->file_ijazah = $apiData['file_ijazah'];
        //         $jadwalBnsp->save();
        //     } else {
        //         $jadwalBnsp = new JadwalBNSP();
        //         $jadwalBnsp->id_izin = $id_izin;
        //         $jadwalBnsp->jadwal_id = $apiData['jadwal_id'];
        //         $jadwalBnsp->tuk_id = $apiData['tuk_id'];
        //         $jadwalBnsp->asesor_id = $apiData['asesor_id'];
        //         $jadwalBnsp->is_fg = $apiData['is_fg'];
        //         $jadwalBnsp->nik = $apiData['nik'];
        //         $jadwalBnsp->nib = $apiData['nib'];
        //         $jadwalBnsp->nama = $apiData['nama'];
        //         $jadwalBnsp->tempat_lahir = $apiData['tempat_lahir'];
        //         $jadwalBnsp->tanggal_lahir = $apiData['tanggal_lahir'];
        //         $jadwalBnsp->jenis_kelamin = $apiData['jenis_kelamin'];
        //         $jadwalBnsp->alamat = $apiData['alamat'];
        //         $jadwalBnsp->kota_id = $apiData['kota_id'];
        //         $jadwalBnsp->provinsi_id = $apiData['provinsi_id'];
        //         $jadwalBnsp->negara_id = $apiData['negara_id'];
        //         $jadwalBnsp->telepon = $apiData['telepon'];
        //         $jadwalBnsp->email = $apiData['email'];
        //         $jadwalBnsp->jenis_mohon = $apiData['jenis_mohon'];
        //         $jadwalBnsp->skema_id = $apiData['skema_id'];
        //         $jadwalBnsp->keterangan = $apiData['keterangan'];
        //         $jadwalBnsp->jenjang_id = $apiData['jenjang_id'];
        //         $jadwalBnsp->prodi = $apiData['prodi'];
        //         $jadwalBnsp->no_ijasah = $apiData['no_ijasah'];
        //         // $jadwalBnsp->tanggal_ijazah = $apiData['tanggal_ijazah'];
        //         $jadwalBnsp->tahun_lulus = $apiData['tahun_lulus'];
        //         $jadwalBnsp->kota_sekolah = $apiData['kota_sekolah'];
        //         $jadwalBnsp->prov_sekolah = $apiData['prov_sekolah'];
        //         $jadwalBnsp->negara_sekolah = $apiData['negara_sekolah'];
        //         $jadwalBnsp->nama_sekolah = $apiData['nama_sekolah'];
        //         $jadwalBnsp->pekerjaan = $apiData['pekerjaan'];
        //         $jadwalBnsp->instansi_pekerjaan = $apiData['instansi_pekerjaan'];
        //         $jadwalBnsp->jabatan_pekerjaan = $apiData['jabatan_pekerjaan'];
        //         $jadwalBnsp->file_foto = $apiData['file_foto'];
        //         $jadwalBnsp->file_ktp = $apiData['file_ktp'];
        //         $jadwalBnsp->file_nib = $apiData['file_nib'];
        //         $jadwalBnsp->file_ijazah = $apiData['file_ijazah'];
        //         $jadwalBnsp->save();
        //     }

        //     DB::commit();
        //     return response()->json(['success' => true, 'apiData' => $apiData]);
        // } catch (QueryException $e) {
        //     DB::rollBack();
        //     $errorMessage = 'Error putting data into the database: ' . $e->getMessage();
        //     return response()->json(['error' => $errorMessage], 500);
        // }
        return view('idBuatJadwal', ['id_izin' => $id_izin]);
    }
}
