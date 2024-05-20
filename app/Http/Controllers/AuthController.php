<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function formSignin() 
    {
        return view('signin');
    }

    public function signin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($validated))
        {
            return redirect()
                ->intended(route('dashboard'));
        }

        return back()
            ->with('status', 'warning')
            ->with('message', 'Success');
    }

    public function formForgotPassword()
    {

    }

    public function forgotPassowrd(Request $request)
    {

    }
}
