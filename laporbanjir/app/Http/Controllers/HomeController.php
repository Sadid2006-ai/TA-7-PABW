<?php

namespace App\Http\Controllers;

use App\Models\Laporan;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'total'    => Laporan::count(),
            'diproses' => Laporan::where('status', 'Diproses')->count(),
            'selesai'  => Laporan::where('status', 'Selesai')->count(),
        ]);
    }
}