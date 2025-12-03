<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku_m extends Model
{
    protected $table = 'mst_buku';
    protected $primaryKey = 'ID_Buku';
    public $timestamps = false;

    protected $fillable = [
        'Judul',
        'Pengarang',
        'Penerbit',
        'Tahun',
        'Stok'
    ];

    // Ambil semua data buku atau satu berdasarkan ID
    public static function get_records($id = null)
    {
        if ($id === null) {
            return self::all();
        } else {
            return self::where('ID_Buku', $id)->get();
        }
    }

    // Tambah data buku
    public static function insert_record($data)
    {
        return self::insert($data);
    }

    // Update data buku berdasarkan ID_Buku
    public static function update_by_id($data, $id)
    {
        return self::where('ID_Buku', $id)->update($data);
    }

    // Hapus data buku berdasarkan ID_Buku
    public static function delete_by_id($id)
    {
        return self::where('ID_Buku', $id)->delete();
    }

    // Dropdown untuk pilihan buku (misal di tabel pinjam)
    public static function opt_Buku()
    {
        $data = self::all();
        $rowBuku = [];
        foreach ($data as $b) {
            $rowBuku[$b->ID_Buku] = $b->Judul . ' - ' . $b->Pengarang;
        }
        return $rowBuku;
    }
}
