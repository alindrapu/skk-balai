<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiKualifikasi;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Personal;
use App\Models\Pendidikan;
use App\Models\Proyek;
use App\Models\SertifikatSuket;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        return view('getData');
    }

    public function store(Request $request)
    {
        $id_izin = $request->input('id_izin');

        // Fetch data from the API
        $url = 'https://siki.pu.go.id/siki-api/v1/permohonan-skk/' . $id_izin;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'token' => 'f3332337ac671c33262198340c2f7b579f7843775ecc425107f086956cbb2b1a9e96b0cc6f643d24'
        ])->get($url);

        $data = $response->json();

        // Store Personal data to Personal table
        DB::beginTransaction();

        try {
            foreach ($data['personal'] as $personal) {
                Personal::create([
                    'id_izin' => $id_izin,
                    'id_pemohon' => $personal['id'],
                    'updated' => now(),
                    'created' => $personal['created'],
                    'creator' => $personal['creator'],
                    'data_id' => $personal['data_id'],
                    'nik' => $personal['nik'],
                    'nama' => $personal['nama'],
                    'tempat_lahir' => $personal['tempat_lahir'],
                    'tanggal_lahir' => $personal['tanggal_lahir'],
                    'email' => $personal['email'],
                    'telepon' => $personal['telepon'],
                    'npwp' => $personal['npwp'],
                    'jenis_kelamin' => $personal['jenis_kelamin'],
                    'alamat' => $personal['alamat'],
                    'negara' => $personal['negara'],
                    'propinsi' => $personal['propinsi'],
                    'kabupaten' => $personal['kabupaten'],
                    'kodepos' => $personal['kodepos'],
                    'ktp' => $personal['ktp'],
                    'surat_pernyataan_kebenaran_data' => $personal['surat_pernyataan_kebenaran_data'],
                    'file_npwp' => $personal['file_npwp'],
                    'pas_foto' => $personal['pas_foto'],
                ]);
            }

            foreach ($data['pendidikan'] as $pendidikan) {
                Pendidikan::create([
                    'id_izin' => $id_izin,
                    'id_pendidikan' => $pendidikan['id'],
                    'updated' => now(),
                    'created' => $pendidikan['created'],
                    'creator' => $pendidikan['creator'],
                    'data_id' => $pendidikan['data_id'],
                    'nama_sekolah_perguruan_tinggi' => $pendidikan['nama_sekolah_perguruan_tinggi'],
                    'program_studi' => $pendidikan['program_studi'],
                    'no_ijazah' => $pendidikan['no_ijazah'],
                    'tahun_lulus' => $pendidikan['tahun_lulus'],
                    'jenjang' => $pendidikan['jenjang'],
                    'alamat' => $pendidikan['alamat'],
                    'negara' => $pendidikan['negara'],
                    'propinsi' => $pendidikan['propinsi'],
                    'kabupaten' => $pendidikan['kabupaten'],
                    'scan_ijazah_legalisir' => $pendidikan['scan_ijazah_legalisir'],
                    'scan_surat_keterangan' => $pendidikan['scan_surat_keterangan'],
                ]);
            }

            foreach ($data['proyek'] as $proyek) {
                Proyek::create([
                    'id_izin' => $id_izin,
                    'id_proyek' => $proyek['id'],
                    'updated' => now(),
                    'created' => $proyek['created'],
                    'creator' => $proyek['creator'],
                    'data_id' => $proyek['data_id'],
                    'nama_proyek' => $proyek['nama_proyek'],
                    'lokasi_proyek' => $proyek['lokasi_proyek'],
                    'tanggal_awal' => $proyek['tanggal_awal'],
                    'tanggal_akhir' => $proyek['tanggal_akhir'],
                    'jabatan' => $proyek['jabatan'],
                    'nilai_proyek' => $proyek['nilai_proyek'],
                    'surat_referensi' => $proyek['surat_referensi'],
                    'jenis_pengalaman' => $proyek['jenis_pengalaman'],
                    'pemberi_kerja' => $proyek['pemberi_kerja'],
                    'nik' => $proyek['nik'],
                    'no_registrasi' => $proyek['no_registrasi'],
                ]);
            }

            foreach ($data['pelatihan'] as $pelatihan) {
                Pelatihan::create([
                    'id_izin' => $id_izin,
                    'id_pelatihan' => $pelatihan['id'],
                    'updated' => now(),
                    'created' => $pelatihan['created'],
                    'creator' => $pelatihan['creator'],
                    'data_id' => $pelatihan['data_id'],
                    'nama_pelatihan' => $pelatihan['nama_pelatihan'],
                    'tanggal_awal' => $pelatihan['tanggal_awal'],
                    'tanggal_akhir' => $pelatihan['tanggal_akhir'],
                    'jumlah_jp' => $pelatihan['jumlah_jp'],
                    'jumlah_hari' => $pelatihan['jumlah_hari'],
                    'file_sertifikat' => $pelatihan['file_sertifikat'],
                ]);
            }
            foreach ($data['sertifikat_surat_keterangan'] as $sertifikatsuket) {
                SertifikatSuket::create([
                    'id_izin' => $id_izin,
                    'id_sertifikat_suket' => $sertifikatsuket['id'],
                    'updated' => $sertifikatsuket['updated'],
                    'created' => $sertifikatsuket['created'],
                    'creator' => $sertifikatsuket['creator'],
                    'nama_sertifikat_surket' => $sertifikatsuket['nama_sertifikat_surket'],
                    'penerbit' => $sertifikatsuket['penerbit'],
                    'tanggal_mulai' => $sertifikatsuket['tanggal_mulai'],
                    'tanggal_selesai' => $sertifikatsuket['tanggal_selesai'],
                    'file_sertifikat' => $sertifikatsuket['file_sertifikat'],
                ]);
            }

            foreach ($data['klasifikasi_kualifikasi'] as $klasifikasikualifikasi) {
                KlasifikasiKualifikasi::create([
                    'id_izin' => $id_izin,
                    'updated' => $klasifikasikualifikasi['updated'],
                    'id_klasifikasi_kualifikasi' => $klasifikasikualifikasi['id'],
                    'created' => $klasifikasikualifikasi['created'],
                    'creator' => $klasifikasikualifikasi['creator'],
                    'data_id' => $klasifikasikualifikasi['data_id'],
                    'lsp' => $klasifikasikualifikasi['lsp'],
                    'subklasifikasi' => $klasifikasikualifikasi['subklasifikasi'],
                    'kualifikasi' => $klasifikasikualifikasi['kualifikasi'],
                    'jabatan_kerja' => $klasifikasikualifikasi['jabatan_kerja'],
                    'jenjang' => $klasifikasikualifikasi['jenjang'],
                    'asosiasi' => $klasifikasikualifikasi['asosiasi'],
                    'kta' => $klasifikasikualifikasi['kta'],
                    'tuk' => $klasifikasikualifikasi['tuk'],
                    'jenis_permohonan' => $klasifikasikualifikasi['jenis_permohonan'],
                    'berita_acara_vv' => $klasifikasikualifikasi['berita_acara_vv'],
                    'surat_permohonan' => $klasifikasikualifikasi['surat_permohonan'],
                    'surat_pengantar_pemohonan_asosiasi' => $klasifikasikualifikasi['surat_pengantar_pemohonan_asosiasi'],
                    'sertifikat_skk' => $klasifikasikualifikasi['sertifikat_skk'],
                    'self_asesmen_apl' => $klasifikasikualifikasi['self_asesmen_apl'],
                    'no_registrasi_asosiasi' => $klasifikasikualifikasi['no_registrasi_asosiasi'],
                    'klasifikasi' => $klasifikasikualifikasi['klasifikasi'],
                    'deleted_at' => $klasifikasikualifikasi['deleted_at'],
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Data stored successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());

            // Log or handle the exception
            return redirect()->back()->with('error', 'Error storing data.');
        }
    }

    public function showData(Request $request)
    {
        $id_izin = $request->input('id_izin');

        $personals = Personal::where('id_izin', $id_izin)->get();
        $pendidikans = Pendidikan::where('id_izin', $id_izin)->get();
        $proyeks = Proyek::where('id_izin', $id_izin)->get();
        $pelatihans = Pelatihan::where('id_izin', $id_izin)->get();
        $sertifikatsukets = SertifikatSuket::where('id_izin', $id_izin)->get();
        $klasifikasikualifikasis = KlasifikasiKualifikasi::where('id_izin', $id_izin)->get();

        return view('show', compact('id_izin', 'personals', 'pendidikans', 'proyeks', 'pelatihans', 'sertifikatsukets', 'klasifikasikualifikasis'));
    }
}
