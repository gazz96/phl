<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaAnggota extends Model
{
    use HasFactory;
    protected $table = "keluarga_anggota";
    protected $fillable = [
        'anggota_id',
        'nama',
        'jenis_kelamin',
        'hubungan_keluarga',
        'status',
        'pekerjaan',
        'nik',
        'file_nik',
        'tempat_lahir',
        'tanggal_lahir',
        'foto',
        'telp',
        'alamat',
        'file_buku_nikah'
    ];
}
