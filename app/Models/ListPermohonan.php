<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPermohonan extends Model
{
    use HasFactory;

    protected $table = 'list_permohonans';
    protected $fillable = ['nik', 'id_izin', 'id_lsp', 'created_at', 'updated_at'];
}
