<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Error;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostProyekController extends Controller
{
    public function storeProyek(Request $request, $id_izin)
    {
        try {
            DB::beginTransaction();

            $idIzin = Str::slug($id_izin);

            // FTP Configuration
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
                    ftp_pasv($ftpConnection, true);

                    $suratReferensiFile = $request->file('surat_referensi');

                    if ($suratReferensiFile) {
                        $suratReferensiPath = '/balai/kjhsdfkjahsKLIGHKU/' . $idIzin . '.' . $suratReferensiFile->getClientOriginalExtension();
                        ftp_put($ftpConnection, $suratReferensiPath, $suratReferensiFile->path(), FTP_BINARY);
                    }
                    error_reporting(E_ALL);
                    ini_set('display_errors', true);
                    ftp_close($ftpConnection);
                } else {
                    throw new Exception('Failed to log in to FTP Server');
                }
            } else {
                throw new Exception('Failed to establish FTP connection');
            }

            $suratReferensiUrl = 'https://lspgatensi.id/files/balai/kjhsdfkjahsKLIGHKU/' . $idIzin . '.pdf';

            // Making API Request
            $apiData = [
                'nama_proyek' => $request->input('nama_proyek'),
                'lokasi_proyek' => $request->input('lokasi_proyek'),
                'tanggal_awal' => $request->input('tanggal_awal'),
                'tanggal_akhir' => $request->input('tanggal_akhir'),
                'jabatan' => $request->input('jabatan'),
                'nilai_proyek' => $request->input('nilai_proyek'),
                'surat_referensi' => $suratReferensiUrl,
                'jenis_pengalaman' => 'Riwayat Pekerjaan',
                'pemberi_kerja' => $request->input('pemberi_kerja'),
            ];

            $httpClient = new \GuzzleHttp\Client();
            $apiEndpoint = 'https://siki.pu.go.id/siki-api/v1/proyek-skk-balai/' . $id_izin;

            try {
                $response = $httpClient->request('POST', $apiEndpoint, [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'token' => 'f3332337ac671c33262198340c2f7b579f7843775ecc425107f086956cbb2b1a9e96b0cc6f643d24',
                    ],
                    'json' => $apiData,
                ]);
                $responseBody = $response->getBody()->getContents();
                $responseData = json_decode($responseBody, true); // Decode the JSON response

                // // $id = $responseData['id'];
                // $created = $responseData['created'];
                // $creator = $responseData['creator'];
                // $dataID = $responseData['data_id'];
                // $updated = $responseData['updated'];
                Log::info('Sukses mengirim request');
            } catch (RequestException $e) {
                $statusCode = $e->getResponse()->getStatusCode();
                $responseBody = $e->getResponse()->getBody()->getContents();

                // Log the Error
                error_log("API Request Failed with status code: $statusCode, response body: $responseBody");

                // Return an appropriate error response to the user with detailed error message
                return response()->json(['error' => 'Failed to process data', 'message' => $responseBody], 500);
            }

            // Create and save Proyek model within the transaction
            $proyek = Proyek::where('id_izin', $id_izin)->first();

            if ($proyek) {
                $proyek->nama_proyek = $apiData['nama_proyek'];
                $proyek->lokasi_proyek = $apiData['lokasi_proyek'];
                $proyek->tanggal_awal = $apiData['tanggal_awal'];
                $proyek->tanggal_akhir = $apiData['tanggal_akhir'];
                $proyek->jabatan = $apiData['jabatan'];
                $proyek->nilai_proyek = $apiData['nilai_proyek'];
                $proyek->surat_referensi = $apiData['surat_referensi'];
                $proyek->jenis_pengalaman = $apiData['jenis_pengalaman'];
                $proyek->pemberi_kerja = $apiData['pemberi_kerja'];
            } else {
                $proyek = new Proyek([
                    'id_izin' => $id_izin,
                    'nama_proyek' => $apiData['nama_proyek'],
                    'lokasi_proyek' => $apiData['lokasi_proyek'],
                    'tanggal_awal' => $apiData['tanggal_awal'],
                    'tanggal_akhir' => $apiData['tanggal_akhir'],
                    'jabatan' => $apiData['jabatan'],
                    'nilai_proyek' => $apiData['nilai_proyek'],
                    'surat_referensi' => $apiData['surat_referensi'],
                    'jenis_pengalaman' => $apiData['jenis_pengalaman'],
                    'pemberi_kerja' => $apiData['pemberi_kerja'],
                ]);

                $proyek->save();
            }

            DB::commit();

            return response()->json([
                'message' => 'Berhasil menambahkan data ke database',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Gagal memproses data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
