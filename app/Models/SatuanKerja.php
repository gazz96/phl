<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanKerja extends Model
{
    use HasFactory;

    protected $table = "satuan_kerja";

    protected $fillable = [
        "nama", 
        "jenis"
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }


    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }


    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function wilayah_hukum()
    {
        return $this->belongsTo(WilayahHukum::class);
    }
}
