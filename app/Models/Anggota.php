<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = "anggota";

    protected $fillable = [
        'satuan_kerja_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'suku',
        'nama_panggilan',
        'hp',
        'golongan_darah',
        'email',
        'jenis_kelamin',
        'jenis_rambut',
        'warna_rambut',
        'warna_mata',
        'warna_kulit',
        'anak_ke',
        'anak_dari',
        'alamat',
        'tinggi',
        'berat',
        'ukuran_topi',
        'ukuran_sepatu',
        'ukuran_celana',
        'ukuran_baju',
        'sidik_jari_1',
        'sidik_jari_2',
        'file_bpjs',
        'file_npwp',
        'file_paspor',
        'file_nik',
        'nik',
        'file_akta_lahir',
        'jenis_anggota_id',
        'foto',
        'status_pernikahan',

        'bpjs',
        'npwp',
        'nik',
        'nomor_kk',
        'nomor_keanggotaan',
        'status'
    ];

    public function satuan_kerja()
    {
        return $this->belongsTo(SatuanKerja::class);
    }

    public function pendidikan()
    {
        return $this->hasMany(PendidikanAnggota::class);
    }

    public function jabatan()
    {
        return $this->hasMany(JabatanAnggota::class);
    }
}
