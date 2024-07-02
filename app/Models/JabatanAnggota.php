<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanAnggota extends Model
{
    use HasFactory;
    protected $table = "jabatan_anggota";
    protected $fillable = [
        'nama',
        'no_sprin_awal',
        'anggota_id',
        'tamat_jabatan',
        'file',
        'satuan_kerja_id'
    ];

    public function satuan_kerja()
    {
        return $this->belongsTo(SatuanKerja::class);
    }

    
}
