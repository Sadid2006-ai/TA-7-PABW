<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanWargaController extends Controller
{
    public function create()
    {
        return view('lapor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp'        => ['required', 'regex:/^(\+62|62|0)8[0-9]{8,12}$/'],
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|in:' . implode(',', Laporan::KECAMATAN),
            'tinggi_air'   => 'required|integer|min:1|max:500',
            'keterangan'   => 'nullable|string|max:1000',
            'foto'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'required'   => ':attribute wajib diisi.',
            'no_hp.regex' => 'Format nomor HP tidak valid (contoh: 081234567890).',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'   => 'Ukuran foto maksimal 2 MB.',
            'tinggi_air.integer' => 'Tinggi air harus berupa angka (cm).',
        ], [
            'nama_pelapor' => 'Nama pelapor',
            'no_hp' => 'Nomor HP',
            'tinggi_air' => 'Tinggi air',
            'foto' => 'Foto',
        ]);

        $data['foto'] = $request->file('foto')->store('laporan', 'public');

        Laporan::create($data); // status otomatis "Menunggu"

        return redirect()->route('lapor.create')
            ->with('success', 'Laporan berhasil dikirim. Terima kasih, petugas BPBD akan segera menindaklanjuti.');
    }
}