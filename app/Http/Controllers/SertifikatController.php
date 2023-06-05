<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Exception;


class SertifikatController extends Controller
{
    public function generate(Request $request, $id_izin)
    {


        $klasifikasiKualifikasi = DB::table('klasifikasi_kualifikasis')->where('id_izin', $id_izin)->select('jabatan_kerja', 'jenjang')->first();
        $personal = DB::table('personals')->where('id_izin', $id_izin)->where('pas_foto')->first();


        $dataPencatatan = DB::table('data_pencatatans')->where('id_izin', $id_izin)->select('nomor_sertifikasi', 'nama', 'kualifikasi', 'kualifikasi_en', 'subklasifikasi', 'subklasifikasi_en', 'jabatan_kerja', 'jabatan_kerja_en', 'jenjang', 'nomor_sertifikat_lengkap', 'nomor_registrasi_lpjk', 'nomor_blangko_bnsp', 'tanggal_ditetapkan', 'tanggal_masa_berlaku', 'qr', 'qr_signature', 'ketua_pelaksana', 'ttd_ketua_pelaksana')->first();

        $certificateData = [
            'no_blangko_bnsp' => $dataPencatatan->nomor_blangko_bnsp,
            'certificateNumber' => $dataPencatatan->nomor_sertifikat_lengkap,
            'jenjang' => $dataPencatatan->jenjang,
            'nama' => $personal->nama,
            'kualifikasi' => $dataPencatatan->kualifikasi,
            'kualifikasi_en' => $dataPencatatan->kualifikasi_en,
            'subklasifikasi' => $dataPencatatan->subklasifikasi,
            'subklasifikasi_en' => $dataPencatatan->subklasifikasi_en,
            'jabatan_kerja' => $dataPencatatan->jabatan_kerja,
            'jabatan_kerja_en' => $dataPencatatan->jabatan_kerja_en,
            'qr_signature' => $dataPencatatan->qr_signature,
            'tanggal_ditetapkan' => $dataPencatatan->tanggal_ditetapkan,
            'tanggal_masa_berlaku' => $dataPencatatan->tanggal_masa_berlaku,
            'pas_foto' => $personal->pas_foto,
            'qr' => $dataPencatatan->qr,
            'nomor_registrasi_lpjk' => $dataPencatatan->nomor_registrasi_lpjk,

        ];

        $htmlContent = view('certificate.sertifikat', $certificateData)->render();

        $tempFile = tempnam(sys_get_temp_dir(), 'certificate');
        file_put_contents($tempFile, $htmlContent);

        $ftpConfig = [
            'host' => 'ftp.lspgatensi.id',
            'username' => 'mygatensi@lspgatensi.id',
            'password' => 'LSP@gkk2022',
            'port' => 21,
            'ssl' => false,
            'passive' => true,
        ];

        $ftpConnection = ftp_connect($ftpConfig['host'], $ftpConfig['port']);

        if ($ftpConnection) {
            $loggedIn = ftp_login($ftpConnection, $ftpConfig['username'], $ftpConfig['password']);

            if ($loggedIn) {
                // Set passive mode if needed
                ftp_pasv($ftpConnection, true);
                $nomorBlangko = Str::slug($certificateData['nomor_blangko_bnsp']);

                // Store Files using the FTP Driver
                $htmlContentPath = null;

                if ($htmlContent) {
                    $htmlContentPath = '/balai/sertifikat/' . $nomorBlangko . '.html';
                    ftp_put($ftpConnection, $htmlContentPath, $tempFile, FTP_BINARY);
                }

                // Close the FTP connection
                ftp_close($ftpConnection);

                // Use the stored file paths as needed
            } else {
                // Failed to log in to FTP server, handle the error
                // You can throw an exception, log an error, or take appropriate action
                // For example:
                throw new Exception('Failed to log in to FTP server.');
            }
        } else {
            // Failed to establish FTP connection, handle the error
            // You can throw an exception, log an error, or take appropriate action
            // For example:
            throw new Exception('Failed to establish FTP connection.');
        }

        return redirect()->back()->with('success', 'Certificate generated and stored successfully.');
    }
}
