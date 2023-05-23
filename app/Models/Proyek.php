<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyeks';

    protected $fillable = [
        'id_izin',
        'id_proyek',
        'created',
        'creator',
        'updated',
        'data_id',
        'nama_proyek',
        'lokasi_proyek',
        'tanggal_awal',
        'tanggal_akhir',
        'jabatan',
        'nilai_proyek',
        'surat_referensi',
        'jenis_pengalaman',
        'pemberi_kerja',
        'nik',
        'no_registrasi'
    ];

    public function personals()
    {
        return $this->belongsTo(Personal::class, 'id_izin');
    }
}
