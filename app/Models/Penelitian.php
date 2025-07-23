<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $fillable = [
        'judul_penelitian',
        'nama_peneliti',
        'instansi',
        'tanggal_mulai',
        'tanggal_selesai',
        'kode_sampel',
        'jenis_sampel',
        'lokasi',
        'kabupaten_kota',
        'koordinat',
        'parameter_uji',
        'metode_uji',
        'satuan_hasil',
        'tanggal_uji_mulai',
        'tanggal_uji_selesai',
        'dokumen',
        'petugas',
        'status',
        'rating',
        'catatan',
    ];
}
