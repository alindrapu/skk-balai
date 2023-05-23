<?php

namespace Database\Seeders;

use App\Models\Personal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_izin' => 123, // Replace with the actual id_izin value
                'id' => 15078,
                'updated' => null,
                'created' => '2023-05-19 18:27:59',
                'creator' => 'bjkw4skk5@pu.go.id',
                'data_id' => 454492,
                'nik' => '3275051809970006',
                'nama' => 'John Doe', // Replace with the desired name
                'tempat_lahir' => 'Jakarta',
                'email' => 'johndoe@gmail.com', // Replace with the desired email
                'telepon' => '081234567890', // Replace with the desired phone number
                'npwp' => '',
                'jenis_kelamin' => 'Pria',
                'alamat' => null,
                'negara' => null,
                'propinsi' => '35',
                'kabupaten' => '3504',
                'kodepos' => null,
                'ktp' => null,
                'surat_pernyataan_kebenaran_data' => null,
                'file_npwp' => null,
                'pas_foto' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Personal::insert($data);
    }
}
