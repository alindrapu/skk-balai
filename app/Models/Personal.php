<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';

    protected $fillable = [
        'id_izin',
        'id_pemohon',
        'updated',
        'created',
        'creator',
        'data_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'telepon',
        'npwp',
        'jenis_kelamin',
        'alamat',
        'negara',
        'propinsi',
        'kabupaten',
        'kodepost',
        'ktp',
        'surat_pernyataan_kebenaran_data',
        'file_npwp',
        'pas_foto'
    ];

    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class, 'id_izin');
    }

    public function proyeks()
    {
        return $this->hasMany(Proyek::class, 'id_izin');
    }

    public function pelatihans()
    {
        return $this->hasMany(Pelatihan::class, 'id_izin');
    }
    public function sertifikat_sukets()
    {
        return $this->hasMany(SertifikatSuket::class, 'id_izin');
    }
}