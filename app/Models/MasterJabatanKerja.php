<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJabatanKerja extends Model
{
    use HasFactory;

    protected $table = 'master_jabatan_kerja';

    protected $fillable = ([
        'lsp_id_klasifikasi',
        'id_klasifikasi_bnsp',
        'klasifikasi',
        'klasifikasi_en',
        'lsp_sub_klasifikasi_id',
        'id_sub_klasifikasi_bnsp',
        'subklasifikasi',
        'subklasifikasi_en',
        'lsp_kualifikasi_id',
        'kualifikasi',
        'kualifikasi_en',
        'id_jabker',
        'id_jabatan_kerja',
        'id_data_skema_bnsp',
        'jabatan_kerja',
        'work_position',
        'jenjang_id',
        'acuan',
        'kbli',
        'kbji',
        'keterangan',
    ]);
}
