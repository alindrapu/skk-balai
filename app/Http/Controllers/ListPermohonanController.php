<?php

namespace App\Http\Controllers;

use App\Models\ListPermohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ListPermohonanController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function getListPermohonan(Request $request)
    {
        //Fetch data from API List Permohonan Balai

        $url = 'https://siki.pu.go.id/siki-api/v1/permohonan-skk-balai';

        $jsonResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
            'token' => 'f3332337ac671c33262198340c2f7b579f7843775ecc425107f086956cbb2b1a9e96b0cc6f643d24'
        ])->get($url);
        $response = json_decode($jsonResponse, true);

        //Store List data to list_permohonans table

        DB::beginTransaction();
        try {
            if (isset($response['data']) && is_array($response['data']))
                $data = $response['data'];
            foreach ($data as $entry) {
                $result = ListPermohonan::create([
                    'id_izin' => $entry['id_izin'],
                    'nik' => $entry['nik'],
                    'created' => $entry['created_at'],
                    'updated' => $entry['updated_at'],
                    'id_lsp' => $entry['id_lsp']
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Berhasil Update Data Permohonan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal Update list permohonan');
        }

        return view('dashboard', compact('id_izin', 'nik', 'created', 'creator', 'id_lsp'));
    }
}
