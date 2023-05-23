<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('http://siki.pu.go.id/siki-api/v1/permohonan-skk-balai');
        $data = $response->json();

        if (isset($data['data'])) {
            $permohonans = $data['data'];

            foreach ($permohonans as $permohonan) {
                $id_izin = $permohonan['id_izin'];
                $nik = $permohonan['nik'];
                $id_lsp = $permohonan['id_lsp'];

                // Create a new record in the database
                DB::table('list_permohonan_balai')->insert([
                    'id_izin' => $id_izin,
                    'nik' => $nik,
                    'id_lsp' => $id_lsp
                ]);
            }
        }
    }
}
