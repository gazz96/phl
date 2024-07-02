<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanAnggota extends Model
{
    use HasFactory;
    protected $table = "pendidikan_anggota";
    protected $fillable = [
        'anggota_id',
        'tingkat',
        'institusi',
        'tampilkan_gelar',
        'tanggal_mulai_pendidikan',
        'tanggal_lulus',
        'akreditasi',
        'file_akreditasi',
        'transkrip_nilai',
        'file_transkrip_nilai',
        'jurusan',
        'nomor_ijazah',
        'file_ijazah'
    ];
}
