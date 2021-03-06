<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
Use Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function postlogin (Request $request)
    {
        if (Auth::attempt($request->only('username','password'))){
             return redirect('/dashboard');
         }

         return redirect('/login');
    }

    public function logout (Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
