<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy, nanti bisa diganti dengan query database
        $user = auth()->user();
        $sampelSedangProses = [
            (object)[ 'judul_lab' => 'Uji Sampel Batuan Vulkanik Tambora' ],
            (object)[ 'judul_lab' => 'Uji Sampel Fosil Mollusca Pantai Seribu' ],
        ];
        $notifHasil = 1;
        $notifChat = 2;
        $notifPengaduan = 5;
        return view('dashboard', [
            'user' => $user,
            'sampelSedangProses' => $sampelSedangProses,
            'notifHasil' => $notifHasil,
            'notifChat' => $notifChat,
            'notifPengaduan' => $notifPengaduan,
        ]);
    }
}
