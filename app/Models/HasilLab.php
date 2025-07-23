<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilLab extends Model
{
    use HasFactory;

    protected $table = 'hasil_lab';

    protected $fillable = [
        'id_user',
        'kode_lab',
        'judul_lab',
        'jenis_sampel',
        'tanggal',
        'link_dokumen',
        'rating',
        'kategori',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
} 