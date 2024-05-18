<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahHukum extends Model
{
    use HasFactory;
    
    protected $table = "wilayah_hukum";
    
    protected $fillable = [
        "wilayah_hukum_id",
        "nama"
    ];

    public function wilayah_hukum()
    {
        return $this->belongsTo(WilayahHukum::class);
    }
}
