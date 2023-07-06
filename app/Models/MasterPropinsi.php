<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPropinsi extends Model
{
    use HasFactory;
    protected $table = 'master_propinsis';

    protected $guarded = ['id'];

}
