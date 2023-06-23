<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTukLpjk extends Model
{
    use HasFactory;

    protected $table = 'master_tuk_lpjk';

    protected $fillable = ([
        'id_lsp',
        'kode',
        'jenis_tuk',
        'nama_tuk',
        'alamat',
        'telp',
        'hp',
        'fax',
        'email',
        'keterangan',
        'id_propinsi',
        'id_kota',
    ]);
}
