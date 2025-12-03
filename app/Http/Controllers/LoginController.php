<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting: Panggil library Auth [cite: 268]

class LoginController extends Controller
{
    // LOGIC LOGIN [cite: 275]
    public function authenticate(Request $request)
    {
        // Validasi inputan user [cite: 291]
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Coba login [cite: 295]
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Amankan sesi [cite: 296]
 
            return redirect()->intended('/perpus'); // Redirect ke halaman perpus jika sukses [cite: 297]
        }

        // Jika gagal login, kembalikan ke halaman login dengan pesan error [cite: 298]
        return back()->with('loginError', 'Login Gagal.');
    }

    // LOGIC LOGOUT [cite: 301]
    public function logout(Request $request)
    {
        Auth::logout(); // Hapus sesi login [cite: 305]
 
        $request->session()->invalidate(); // Invalidasi data sesi [cite: 307]
 
        $request->session()->regenerateToken(); // Buat token baru [cite: 309]
 
        return redirect('/login'); // Kembali ke halaman awal [cite: 311]
    }
}