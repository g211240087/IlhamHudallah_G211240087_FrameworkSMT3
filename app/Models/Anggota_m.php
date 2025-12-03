<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota_m extends Model
{
    // Nama tabel di database
    protected $table = 'mst_anggota';

    // Primary key tabel
    protected $primaryKey = 'ID_Anggota';

    // Laravel tidak memakai created_at & updated_at
    public $timestamps = false;

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nim',
        'nama',
        'progdi'
    ];

    /**
     * Fungsi helper untuk menampilkan pilihan anggota (dropdown)
     * Output: array [ID_Anggota => "NIM - Nama"]
     */
    public static function opt_Anggota()
    {
        $data = self::all();
        $rowAnggota = [];

        foreach ($data as $a) {
            $rowAnggota[$a->ID_Anggota] = $a->nim . ' - ' . $a->nama;
        }

        return $rowAnggota;
    }
}
