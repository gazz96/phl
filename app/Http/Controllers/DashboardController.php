<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function signin(Request $request) 
    {
        return view('auth');    
    }
}
