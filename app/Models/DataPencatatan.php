<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataPencatatan extends Model
{
    use HasFactory;

    protected $table = 'data_pencatatans';

    protected $fillable = ([
        'nomor_sertifikasi',
        'id_izin',
        'nik',
        'nama',
        'id_propinsi',
        'id_kabupaten',
        'kabupaten',
        'id_kualifikasi',
        'kualifikasi',
        'kualifikasi_en',
        'id_klasifikasi',
        'id_subklasifikasi',
        'subklasifikasi',
        'subklasifikasi_en',
        'id_jabatan_kerja',
        'jabatan_kerja',
        'jabatan_kerja_en',
        'jenjang',
        'nomor_sertifikat_lengkap',
        'nomor_registrasi_lsp',
        'nomor_registrasi_lpjk',
        'nomor_blangko_bnsp',
        'tanggal_ditetapkan',
        'tanggal_masa_berlaku',
        'jenis_permohonan',
        'qr',
        'qr_signature',
        'link_e_sertifikat',
        'catatan',
        'ketua_pelaksana',
        'ttd_ketua_pelaksana',
    ]);

    public function personals()
    {
        return $this->belongsTo(Personal::class, 'id_izin');
    }
}
