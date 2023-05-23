<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiKualifikasi extends Model
{
    use HasFactory;

    protected $table = 'klasifikasi_kualifikasis';

    protected $fillable = ([
        'id_izin',
        'id',
        'id_klasifikasi_kualifikasi',
        'updated',
        'created',
        'creator',
        'data_id',
        'subklasifikasi',
        'kualifikasi',
        'jabatan_kerja',
        'jenjang',
        'asosiasi',
        'kta',
        'tuk',
        'jenis_permohonan',
        'berita_acara_vv',
        'surat_permohonan',
        'surat_pengantar_pemohonan_asosiasi',
        'sertifikat_skk',
        'self_asesmen_apl',
        'sertifikat_skk',
        'no_registrasi_asosiasi',
        'klasifikasi',
        'deleted_at'
    ]);

    public function personals()
    {
        return $this->belongsTo(Personal::class, 'id_izin');
    }
}
