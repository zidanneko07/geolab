<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilPengujianController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $hasil = [
            [
                'kode' => 'UOIX-12982',
                'judul' => 'Uji sampel mollusca dari pantai seribu',
                'tanggal' => '16 November 2024 10:30 WIB',
                'link' => '#',
                'rating' => 2,
                'notif' => 1,
                'survey' => true,
            ],
            [
                'kode' => 'UOIX-12982',
                'judul' => 'Uji sampel mollusca dari pantai seribu',
                'tanggal' => '16 November 2024 10:30 WIB',
                'link' => '#',
                'rating' => 3,
                'notif' => 1,
                'survey' => false,
            ],
            [
                'kode' => 'UOIX-12982',
                'judul' => 'Uji sampel mollusca dari pantai seribu',
                'tanggal' => '16 November 2024 10:30 WIB',
                'link' => '#',
                'rating' => 3,
                'notif' => 1,
                'survey' => false,
            ],
        ];
        $page = 1;
        $totalPage = 3;
        return view('hasil_pengujian', compact('user', 'hasil', 'page', 'totalPage'));
    }
}
