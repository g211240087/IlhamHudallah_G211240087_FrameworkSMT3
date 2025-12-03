<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = DB::table('mst_anggota')->paginate(5);
        return view('anggota.list', ['anggota' => $anggota]);
    }

    public function add_new()
    {
        return view('anggota.add');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'progdi' => 'required',
        ]);
        DB::table('mst_anggota')->insert([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'progdi' => $request->progdi
        ]);
        return redirect('/anggota');
    }

    public function edit($id)
    {
        $anggota = DB::table('mst_anggota')->where('ID_Anggota', $id)->first();
        return view('anggota.edit', ['anggota' => $anggota]);
    }

    public function update(Request $request, $id)
    {
        DB::table('mst_anggota')->where('ID_Anggota', $id)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'progdi' => $request->progdi
        ]);
        return redirect('/anggota');
    }

    public function delete($id)
    {
        DB::table('mst_anggota')->where('ID_Anggota', $id)->delete();
        return redirect('/anggota');
    }
}
