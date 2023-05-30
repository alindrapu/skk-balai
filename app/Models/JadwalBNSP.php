<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBNSP extends Model
{
    use HasFactory;

    protected $table = 'jadwal_bnsp_table';

    protected $fillable = ([
        'id_izin',
        'jadwal_id',
        'id',
        'tuk_id',
        'asesor_id',
        'is_fg',
        'nik',
        'nib',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'kota_id',
        'provinsi_id',
        'negara_id',
        'telepon',
        'email',
        'jenis_mohon',
        'skema_id',
        'keterangan',
        'jenjang_id',
        'prodi',
        'no_ijasah',
        'tanggal_ijazah',
        'tahun_lulus',
        'kota_sekolah',
        'prov_sekolah',
        'negara_sekolah',
        'nama_sekolah',
        'pekerjaan',
        'instansi_pekerjaan',
        'jabatan_pekerjaan',
        'file_foto',
        'file_ktp',
        'file_nib',
        'file_ijazah',
    ]);

    public function personals()
    {
        return $this->belongsTo(Personal::class, 'id_izin');
    }
}
