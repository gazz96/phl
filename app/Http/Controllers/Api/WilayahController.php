<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\kelurahan;

class WilayahController extends Controller
{

    public function kota(Request $request)
    {
        return Kota::where($request->provinsi_id, function($query, $provinsi_id){
            return $query->where('provinsi_id', $provinsi_id);
        })
        ->orderBy('nama', 'ASC')
        ->get();
    }

    public function kecamatan(Request $request)
    {
        return Kecamatan::where($request->kota_id, function($query, $kota_id){
            return $query->where('kota_id', $kota_id);
        })
        ->orderBy('nama', 'ASC')
        ->get();
    }

    public function kelurahan(Request $request)
    {
        return Kelurahan::where($request->kecamatan_id, function($query, $kecamatan_id){
            return $query->where('kota_id', $kecamatan_id);
        })
        ->orderBy('nama', 'ASC')
        ->get();
    }

}
