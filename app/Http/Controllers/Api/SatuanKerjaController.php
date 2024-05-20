<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SatuanKerja;
use Illuminate\Http\Request;

class SatuanKerjaController extends Controller
{
    function index(Request $request) 
    {
        $koleksi_satuan_kerja = SatuanKerja::when($request->jenis, function($query, $jenis){
            return $query->where('jenis', $jenis);
        })->get();
        return response()
            ->json($koleksi_satuan_kerja);  
    }
}
