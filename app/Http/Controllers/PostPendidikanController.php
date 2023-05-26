<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Personal;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use League\Flysystem\UnableToRetrieveMetadata;

use function GuzzleHttp\Promise\exception_for;

class PostPendidikanController extends Controller
{
    public function storePendidikan(Request $request, $id_izin)
    {
        try {
            DB::beginTransaction();
            $validateData = $request->validate([]);

            $idIzin = Str::slug('id_izin');

            $scanIjazahFile = $request->file('scan_ijazah_legalisir');
            $scanSuketFile = $request->file('scan_surat_keterangan');


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
                $loggedIn = ftp_login(
                    $ftpConnection,
                    $ftpConfig['username'],
                    $ftpConfig['password']
                );

                if ($loggedIn) {
                    //Set Passive mode if needed
                    ftp_pasv($ftpConnection, true);

                    // Store Files using the FTP Driver
                    $scanIjazahFile = null;
                    $scanSuketFile = null;

                    if ($scanIjazahFile) {
                        $scanIjazahPath = '/balai/jawdaskkxkIIwk/' . $idIzin . '.' . $scanIjazahFile->getClientOriginalExtension();
                        ftp_put($ftpConnection, $scanIjazahPath, $scanIjazahFile->path(), FTP_BINARY);
                    }

                    if ($scanSuketFile) {
                        $scanSuketPath = '/balai/kajsdflaehijuwbgaJJSS/' . $idIzin . '.' . $scanSuketFile->getClientOriginalExtension();
                        ftp_put($ftpConnection, $scanSuketPath, $scanSuketFile->path(), FTP_BINARY);
                    }

                    // Close the FTP Connection
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

            // Generate the file URLs
            $scanIjazahUrl = 'https://lspgatensi.id/files/balai/jawdaskkxkIIwk/' . $id_izin . '.' . 'pdf';
            $scanSuketUrl = 'https://lspgatensi.id/file/balai/kajsdflaehijuwbgaJJSS/' . $id_izin . '.' . 'pdf';


            // Check if personals record exists
            $personal = Personal::where('id_izin', $id_izin)->first();

            if ($personal) {
                // Retrieve data from personal
                $negara = $personal->negara;
                $propinsi = $personal->propinsi;
                $kabupaten = $personal->kabupaten;

                // Retrieve data from input form
                $apiData = [
                    'nama_sekolah_perguruan_tinggi' => $request->input('nama_sekolah_perguruan_tinggi'),
                    'program_studi' => $request->input('program_studi'),
                    'no_ijazah' => $request->input('no_ijazah'),
                    'tahun_lulus' => $request->input('tahun_lulus'),
                    'jenjang' => intval($request->input('jenjang')),
                    'alamat' => $request->input('alamat'),
                    'negara' => $negara,
                    'propinsi' => $propinsi,
                    'kabupaten' => $kabupaten,
                    'scan_ijazah_legalisir' => $scanIjazahUrl,
                    'scan_surat_keterangan' => $scanSuketUrl,
                ];
            } else {

                return redirect()->back()->with('error', 'Personal record not found.');
            }

            $scanSuketFile = $request->file('scan_surat_keterangan');
            if ($scanSuketFile && $scanSuketFile->getSize() === 0) {
                $apiData['scan_surat_keterangan'] = $scanSuketUrl;
            } else {
                $apiData['scan_surat_keterangan'] = '';
            }

            $httpClient = new \GuzzleHttp\Client();
            $apiEndpoint = 'https://siki.pu.go.id/siki-api/v1/pendidikan-skk-balai/' . $id_izin;

            try {
                $response = $httpClient->request('POST', $apiEndpoint, [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'token' => 'f3332337ac671c33262198340c2f7b579f7843775ecc425107f086956cbb2b1a9e96b0cc6f643d24',
                    ],
                    'json' => $apiData,
                ]);
            } catch (RequestException $e) {
                $statusCode = $e->getResponse()->getStatusCode();
                $responseBody = $e->getResponse()->getBody()->getContents();

                // Log the Error
                error_log("API Request Failed with status code: $statusCode, response body: $responseBody");

                // Return an appropriate error response to the user with detailed error message
                return response()->json(['error' => 'Failed to process data', 'message' => $responseBody], 500);
            } catch (\Exception $e) {
                // Handle any other exceptions

                // Log the error
                error_log('API Request Failed with an exception: ' . $e->getMessage());

                // Return an appropriate error response to the user with detailed error message
                return response()->json(['error' => 'Failed to process data', 'message' => $e->getMessage()], 500);
            }

            // Create and save the Pendidikan model within the transaction
            $pendidikan = Pendidikan::where('id_izin', $id_izin)->first();

            if ($pendidikan) {
                // $pendidikan->id_pendidikan->increment();
                $pendidikan->nama_sekolah_perguruan_tinggi = $apiData['nama_sekolah_perguruan_tinggi'];
                $pendidikan->program_studi = $apiData['program_studi'];
                $pendidikan->no_ijazah = $apiData['no_ijazah'];
                $pendidikan->jenjang = $apiData['jenjang'];
                $pendidikan->alamat = $apiData['alamat'];
                $pendidikan->negara = $apiData['negara'];
                $pendidikan->propinsi = $apiData['propinsi'];
                $pendidikan->kabupaten = $apiData['kabupaten'];
                $pendidikan->scan_ijazah_legalisir = $apiData['scan_ijazah_legalisir'];
                $pendidikan->scan_surat_keterangan = $apiData['scan_surat_keterangan'];
                $pendidikan->save();
            } else {
                $pendidikan = new Pendidikan([
                    'id_izin' => $id_izin,
                    'nama_sekolah_perguruan_tinggi' => $apiData['nama_sekolah_perguruan_tinggi'],
                    'program_studi' => $apiData['program_studi'],
                    'no_ijazah' => $apiData['no_ijazah'],
                    'jenjang' => $apiData['jenjang'],
                    'alamat' => $apiData['alamat'],
                    'negara' => $apiData['negara'],
                    'propinsi' => $apiData['propinsi'],
                    'kabupaten' => $apiData['kabupaten'],
                    'scan_ijazah_legalisir' => $apiData['scan_ijazah_legalisir'],
                    'scan_surat_keterangan' => $apiData['scan_surat_keterangan'],
                ]);

                $pendidikan->save();
            }
            DB::commit();
            return response()->json([
                'message', 'Berhasil menambahkan data ke database'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Gagal memproses data',
                'error' => $e->getMessage(),
            ], 500);
        };
    }
}
