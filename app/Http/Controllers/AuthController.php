<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function formSignin() 
    {
        return view('signin');
    }

    public function signin(Request $request)
    {

    }

    public function formForgotPassword()
    {

    }

    public function forgotPassowrd(Request $request)
    {

    }
}
