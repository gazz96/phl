<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Anggota;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{

    public function __construct()
    {
        View::share('singular', 'Cari Personel');
    }


    public function index(Request $request)
    {
        $members = Anggota::paginate(20);
        return view('search.list', compact('members'));
    }

}
