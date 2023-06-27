<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterApiSiki extends Model
{
    use HasFactory;

    protected $table = 'master_api_sikis';
    protected $fillable = [
        'id_lsp',
        'no_lisensi',
        'lisensi',
        'username',
        'alamat',
        'email',
        'token',
        'created_at',
    ];
}
