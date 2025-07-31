<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Contoh autentikasi manual (sementara)
        if ($username === 'admin' && $password === '1234') {
            Session::put('username', $username);
            return redirect()->route('admin_dashboard')->with('success', 'Berhasil login!');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
