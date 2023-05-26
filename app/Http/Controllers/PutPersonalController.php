<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Personal;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\RequestException;





class PutPersonalController extends Controller
{
    public function storePersonal(Request $request, $id_izin)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validate([
                'alamat' => 'required',
                'negara' => 'required',
                'kodepos' => 'required',
                'ktp' => 'required|file',
                'surat_pernyataan_kebenaran_data' => 'file',
                'file_npwp' => '|file',
                'pas_foto' => 'required|file',
            ]);

            // Generate a new file name with id_izin
            // $idIzin = Str::slug($id_izin);
            // $ktpFile = $request->file('ktp');
            // $suratPernyataanFile = $request->file('surat_pernyataan_kebenaran_data');
            // $fileNpwpFile = $request->file('file_npwp');
            // $pasFotoFile = $request->file('pas_foto');


            //Store Files using the FTP Driver
            // $ktpFilePath = $ktpFile->storeAs('files/balai/ktp', $idIzin . '.' . $ktpFile->getClientOriginalExtension(), 'ftp');
            // $suratPernyataanFilePath = null;
            // $fileNpwpFilePath = $fileNpwpFile->storeAs('files/balai/file_npwp' . $idIzin . '.' . $fileNpwpFile->getClientOriginalExtension(), 'ftp');
            // $pasFotoFilePath = $pasFotoFile->storeAs('files/balai/pas_foto' . $idIzin . '.' . $pasFotoFile->getClientOriginalExtension(), 'ftp');

            $idIzin = Str::slug($id_izin);

            $ktpFile = $request->file('ktp');
            $suratPernyataanFile = $request->file('surat_pernyataan_kebenaran_data');
            $fileNpwpFile = $request->file('file_npwp');
            $pasFotoFile = $request->file('pas_foto');

            // Establish FTP connection
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

                    // Store Files using the FTP Driver
                    $ktpFilePath = null;
                    $suratPernyataanFilePath = null;
                    $fileNpwpFilePath = null;
                    $pasFotoFilePath = null;

                    if ($ktpFile) {
                        $ktpFilePath = '/balai/ktp/' . $idIzin . '.' . $ktpFile->getClientOriginalExtension();
                        ftp_put($ftpConnection, $ktpFilePath, $ktpFile->path(), FTP_BINARY);
                    }

                    if ($suratPernyataanFile) {
                        $suratPernyataanFilePath = '/balai/surat_pernyataan/' . $idIzin . '.' . $suratPernyataanFile->getClientOriginalExtension();
                        ftp_put($ftpConnection, $suratPernyataanFilePath, $suratPernyataanFile->path(), FTP_BINARY);
                    }

                    if ($fileNpwpFile) {
                        $fileNpwpFilePath = '/balai/file_npwp/' . $idIzin . '.' . $fileNpwpFile->getClientOriginalExtension();
                        ftp_put($ftpConnection, $fileNpwpFilePath, $fileNpwpFile->path(), FTP_BINARY);
                    }

                    if ($pasFotoFile) {
                        $pasFotoFilePath = '/balai/pas_foto/' . $idIzin . '.' . $pasFotoFile->getClientOriginalExtension();
                        ftp_put($ftpConnection, $pasFotoFilePath, $pasFotoFile->path(), FTP_BINARY);
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

            //Generate the file URLs
            $ktpUrl = 'https://lspgatensi.id/files/balai/ktp/' . $idIzin . '.' . 'pdf';
            $suratPernyataanUrl = null;
            $fileNpwpUrl = 'https://lspgatensi.id/files/balai/file_npwp/' . $idIzin . '.' . 'pdf';
            $pasFotoUrl = 'https://lspgatensi.id/files/balai/pas_foto/' . $idIzin . '.' . 'jpg';

            // Making API Request
            $apiData = [
                'alamat' => $request->input('alamat'),
                'negara' => $request->input('negara'),
                'kodepos' => $request->input('kodepos'),
                'ktp' => $ktpUrl,
                'pas_foto' => $pasFotoUrl,
            ];

            $suratPernyataanFile = $request->file('surat_pernyataan_kebenaran_data');
            if ($suratPernyataanFile && $suratPernyataanFile->getSize() === 0) {
                $apiData['surat_pernyataan_kebenaran_data'] = $suratPernyataanUrl;
            } else {
                $apiData['surat_pernyataan_kebenaran_data'] = "";
            }

            $fileNpwpFile = $request->file('file_npwp');
            if ($fileNpwpFile && $fileNpwpFile->getSize() === 0) {
                $apiData['file_npwp'] = $fileNpwpUrl;
            } else {
                $apiData['file_npwp'] = "";
            }


            $httpClient = new \GuzzleHttp\Client();
            $apiEndpoint = 'https://siki.pu.go.id/siki-api/v1/personal-skk-balai/' . $id_izin;

            try {
                $response = $httpClient->request('PUT', $apiEndpoint, [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'token' => 'f3332337ac671c33262198340c2f7b579f7843775ecc425107f086956cbb2b1a9e96b0cc6f643d24',
                    ],
                    'json' => $apiData,
                ]);

                // Process the response as needed
            } catch (RequestException $e) {
                // Handle the 422 Unprocessable Entity response error
                $statusCode = $e->getResponse()->getStatusCode();
                $responseBody = $e->getResponse()->getBody()->getContents();

                // Log the error
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

            // Create and save the Personal model within the transaction
            $personal = Personal::where('id_izin', $id_izin)->first();

            if ($personal) {
                $personal->alamat = $apiData['alamat'];
                $personal->negara = $apiData['negara'];
                $personal->kodepos = $apiData['kodepos'];
                $personal->ktp = $apiData['ktp'];
                $personal->surat_pernyataan_kebenaran_data = $apiData['surat_pernyataan_kebenaran_data'];
                $personal->file_npwp = $apiData['file_npwp'];
                $personal->pas_foto = $apiData['pas_foto'];
                $personal->save();
            } else {
                // Handle the case when the record is not found
                // You can create a new record or throw an exception based on your requirements
                // For example:
                throw new Exception("Personal record not found");
            }
            DB::commit();

            return response()->json([
                'message', 'Sukses'
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
