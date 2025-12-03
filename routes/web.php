<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ftik');
});
Route::get('/info', function () {
    return view('info',['progdi'=>'TI']);
});

use App\Http\Controllers\InfoController;
Route ::get('/info/{kd}',[InfoController::class, 'infoMhs']);
/*
Route::get('/buku', function (){
     return view('buku.add', [
        'is_update' => 0,
        'optkategori' =>[
            ''=>'-pilih salah satu-',
            'novel' => 'Novel',
            'komik' => 'Komik',
            'kamus' => 'Kamus',
            'program'=> 'Pemrograman'
        ]
        ]);
    });
*/
use App\Http\Controllers\BukuController;
Route::get('/buku', [BukuController::class, 'index']); 
Route::get('/buku/add', [BukuController::class, 'add_new']); 
Route::post('/buku/save', [BukuController:: class, 'save']); 
Route::get('/buku/edit/{id}', [BukuController:: class, 'edit']); 
Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);

use App\Http\Controllers\AnggotaController;
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/add', [AnggotaController::class, 'add_new']);
Route::post('/anggota/save', [AnggotaController::class, 'save']);
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
Route::post('/anggota/update/{id}', [AnggotaController::class, 'update']);
Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete']);

use App\Http\Controllers\PinjamController;

Route::get('/pinjam', [PinjamController::class, 'index']);
Route::get('/pinjam/add', [PinjamController::class, 'add_new']);
Route::post('/pinjam/save', [PinjamController::class, 'save']);
Route::get('/pinjam/edit/{id}', [PinjamController::class, 'edit']);
Route::post('/pinjam/update/{id}', [PinjamController::class, 'update']);
Route::get('/pinjam/delete/{id}', [PinjamController::class, 'delete']);

use App\Http\Controllers\PerpusController;

Route::get('/pinjam', [PinjamController::class, 'index']);
Route::get('/pinjam/add', [PinjamController::class, 'add_new']);
Route::post('/pinjam/save', [PinjamController::class, 'save']);

Route::get('/perpus', [PerpusController::class, 'index']);

use App\Http\Controllers\LoginController;
// --- BAGIAN LOGIN (Hanya untuk Guest/Tamu yang belum login) ---
Route::get('/login', [PerpusController::class, 'login'])
    ->name('login')
    ->middleware('guest'); 

Route::post('/login', [LoginController::class, 'authenticate']); // Proses form login


// --- BAGIAN LOGOUT (Hanya untuk User yang sudah login) ---
Route::get('/logout', [LoginController::class, 'logout']);


// --- BAGIAN HALAMAN PERPUS (Wajib Login/Auth) ---
// Tambahkan ->middleware('auth') di belakang route halaman penting
Route::get('/perpus', [PerpusController::class, 'index'])->middleware('auth');
Route::get('/buku', [BukuController::class, 'index'])->middleware('auth');
Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('auth');
Route::get('/pinjam', [PinjamController::class, 'index'])->middleware('auth');