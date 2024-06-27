<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $gereja = $request->gereja;
        $nama_gereja = $gereja->nama_gereja;
        return view('auth.login', compact('nama_gereja'));
    }

    public function showLoginFormSA(Request $request)
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
            $gereja = Auth::user()->gereja; // Assuming the authenticated user has a relationship to gereja

            if ($gereja) {
                $nama_gereja = $gereja->nama_gereja;
                $request->session()->put('nama_gereja', $nama_gereja);
                return redirect()->route('list_warta', compact('nama_gereja'));
            } else {
                return redirect()->back()->withErrors(['loginError' => 'Gereja data not found for the authenticated user.']);
            }
        } else {
            return redirect()->back()->withErrors(['loginError' => 'Username atau password salah.']);
        }
    }

    public function loginSA(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            // Retrieve the nama_gereja data based on the authenticated user
            $gereja = Auth::user()->gereja; // Assuming the authenticated user has a relationship to gereja (church)

            if ($gereja) {
                $nama_gereja = $gereja->nama_gereja;
                // Store nama_gereja in session or pass it via redirect
                $request->session()->put('nama_gereja', $nama_gereja);

                // Redirect to the desired route, passing nama_gereja as a parameter if needed
                return redirect()->route('list_warta', ['nama_gereja' => $nama_gereja]);
            } else {
                // Handle case where gereja data is not found
                return redirect()->back()->withErrors(['loginError' => 'Gereja data not found for the authenticated user.']);
            }
        } else {
            // Jika autentikasi gagal
            return redirect()->back()->withErrors(['loginError' => 'Username atau password salah.']);
        }
    }

    public function logout(Request $request)
    {
        // Get the nama_gereja before invalidating the session
        $nama_gereja = $request->session()->get('nama_gereja');
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Redirect to the specific church's homepage or login page
        return redirect(url('/' . $nama_gereja));
    }
}
