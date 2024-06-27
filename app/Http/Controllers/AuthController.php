<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function landing()
    {
        return view('admin.landing');
    }

    public function login(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        // Jika autentikasi berhasil
        return redirect()->route('landing'); // Ganti 'home' dengan nama rute halaman beranda Anda
    } else {
        // Jika autentikasi gagal
        return redirect()->back()->withErrors(['loginError' => 'Username atau password salah.']);
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


}
