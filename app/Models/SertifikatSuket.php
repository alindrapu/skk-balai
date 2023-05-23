<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertifikatSuket extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_sukets';

    protected $fillable = [
        'id_izin',
        'id',
        'id_sertifikat_suket',
        'created',
        'creator',
        'data_id',
        'nama_sertifikat_surket',
        'penerbit',
        'tanggal_mulai',
        'tanggal_selesai',
        'file_sertifikat'
    ];

    public function personals()
    {
        return $this->belongsTo(Personal::class, 'id_izin');
    }
}
