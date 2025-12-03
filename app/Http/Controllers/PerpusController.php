<?php

namespace App\Http\Controllers;

class PerpusController extends Controller
{
    public function index()
    {
        // Menampilkan halaman utama menu perpustakaan
        return view('perpus.main');
    }

    public function login()
    {
        return view('perpus.login');
    }
}
