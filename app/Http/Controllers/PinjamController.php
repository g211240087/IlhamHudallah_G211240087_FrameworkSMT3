<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
public function index()
{
    // JOIN untuk menampilkan nama anggota & judul buku
    $pinjam = DB::table('pinjam')
        ->join('mst_anggota', 'pinjam.ID_Anggota', '=', 'mst_anggota.ID_Anggota')
        ->join('mst_buku', 'pinjam.ID_Buku', '=', 'mst_buku.ID_Buku')
        ->select(
            'pinjam.*',
            'mst_anggota.nama as nama_anggota',
            'mst_buku.Judul as judul_buku'
        )
        ->paginate(5); // <--- Ubah get() menjadi paginate(jumlah_per_halaman)

    return view('pinjam.list', ['pinjam' => $pinjam]);
}

    public function add_new()
    {
        $anggota = DB::table('mst_anggota')->get();
        $buku = DB::table('mst_buku')->get();
        return view('pinjam.add', compact('anggota', 'buku'));
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);
        DB::table('pinjam')->insert([
            'ID_Anggota' => $request->ID_Anggota,
            'ID_Buku' => $request->ID_Buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        return redirect('/pinjam');
    }

    public function edit($ID_Pinjam)
    {
        $pinjam = DB::table('pinjam')->where('ID_Pinjam', $ID_Pinjam)->first();
        $anggota = DB::table('mst_anggota')->get();
        $buku = DB::table('mst_buku')->get();
        return view('pinjam.edit', compact('pinjam', 'anggota', 'buku'));
    }

    public function update(Request $request, $ID_Pinjam)
    {
        DB::table('pinjam')->where('ID_Pinjam', $ID_Pinjam)->update([
            'ID_Anggota' => $request->ID_Anggota,
            'ID_Buku' => $request->ID_Buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        return redirect('/pinjam');
    }

    public function delete($ID_Pinjam)
    {
        DB::table('pinjam')->where('ID_Pinjam', $ID_Pinjam)->delete();
        return redirect('/pinjam');
    }
}
