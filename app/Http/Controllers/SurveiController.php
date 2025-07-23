<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SurveiController extends Controller
{
    public function index()
    {
        $data = [
            'kode' => 'UOIX-12982',
            'judul' => 'Uji sampel mollusca dari pantai seribu',
            'tanggal' => '16 November 2024 10:30 WIB',
            'gambar' => 'https://i.ibb.co/6b8wQ2d/lab-table-example.png', // Ganti dengan link gambar tabel
        ];
        return view('survei', $data);
    }
}
