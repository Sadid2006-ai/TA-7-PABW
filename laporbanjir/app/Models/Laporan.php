<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'nama_pelapor', 'no_hp', 'lokasi', 'kecamatan',
        'tinggi_air', 'keterangan', 'foto', 'status',
    ];

    public const STATUS = ['Menunggu', 'Diproses', 'Selesai'];

    public const KECAMATAN = [
        'Arjasari', 'Baleendah', 'Banjaran', 'Bojongsoang', 'Cangkuang',
        'Cicalengka', 'Cikancung', 'Cilengkrang', 'Cileunyi', 'Cimaung',
        'Cimenyan', 'Ciparay', 'Ciwidey', 'Dayeuhkolot', 'Ibun', 'Katapang',
        'Kertasari', 'Kutawaringin', 'Majalaya', 'Margaasih', 'Margahayu',
        'Nagreg', 'Pacet', 'Pameungpeuk', 'Pangalengan', 'Paseh',
        'Rancabali', 'Rancaekek', 'Soreang', 'Solokanjeruk', 'Sukasari',
    ];
}