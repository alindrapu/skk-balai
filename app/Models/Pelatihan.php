<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihans';

    protected $fillable = [
        'id',
        'id_izin',
        'data_id',
        'penyelenggara',
        'nama_pelatihan',
        'tanggal_awal',
        'tanggal_akhir',
        'jumlah_jp',
        'jumlah_hari',
        'file_sertifikat',
        'updated',
        'created',
        'creator'

    ];

    public function personals()
    {
        return $this->belongsTo(Personal::class, 'id_izin', 'id_izin');
    }
}
