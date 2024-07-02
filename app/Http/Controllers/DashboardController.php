<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anggota;

class DashboardController extends Controller
{


    public function index()
    {

        $members = new Anggota();

        return view('dashboard', [
            'total_personel' => $members->count(),
            'total_non_k2' => $members->where('status', 'NON K2')->count(),
            'total_non_k2_pria' => $members->where('status', 'NON K2')->where('jenis_kelamin', 0)->count(),
            'total_non_k2_wanita' => $members->where('status', 'NON K2')->where('jenis_kelamin', 1)->count(),
            'total_k2' => $members->where('status', 'K2')->count(),
            'total_k2_pria' => $members->where('status', 'K2')->where('jenis_kelamin', 0)->count(),
            'total_k2_wanita' => $members->where('status', 'K2')->where('jenis_kelamin', 1)->count(),
        ]);
    }

    function signin(Request $request) 
    {
        return view('auth');    
    }
}
