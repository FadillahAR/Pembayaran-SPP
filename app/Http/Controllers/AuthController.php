<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]);

            $kredensil = $request->only('username','password');

                if (Auth::attempt($kredensil)) {
                    $petugas = Auth::petugas();
                    if ($petugas->level == 'admin') {
                        return redirect()->intended('admin');
                    } elseif ($petugas->level == 'petugas') {
                        return redirect()->intended('petugas');
                    }
                    return redirect()->intended('/');
                }
            
            return redirect('login');
    }
}
