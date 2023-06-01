<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;

class PutRegistrasi extends Controller
{
    public function storeRegistrasi(Request $request, $id_izin)
    {

        $id_izin = $request->route('id_izin');

        $httpClient = new \GuzzleHttp\Client();
        $apiEndpoint = 'https://siki.pu.go.id/siki-api/v1/registrasi-skk-balai/' . $id_izin;

        $apiData = [
            'tuk' => (int)$request->input('tuk'),
            'jenis_permohonan' => '1',
            'sertifikat_skk' => '',
            'self_asesmen_apl' => ''
        ];

        try {
            $response = $httpClient->request('PUT', $apiEndpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'token' => 'f3332337ac671c33262198340c2f7b579f7843775ecc425107f086956cbb2b1a9e96b0cc6f643d24',
                ],
                'json' => $apiData
            ]);
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
        };
    }
}
