<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporans = Laporan::query()
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('laporan.index', compact('laporans'));
    }

    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $data = $request->validate([
            'nama_pelapor' => 'required|string|max:100',
            'no_hp'        => ['required', 'regex:/^(\+62|62|0)8[0-9]{8,12}$/'],
            'lokasi'       => 'required|string|max:255',
            'kecamatan'    => 'required|in:' . implode(',', Laporan::KECAMATAN),
            'tinggi_air'   => 'required|integer|min:1|max:500',
            'keterangan'   => 'nullable|string|max:1000',
            'status'       => 'required|in:' . implode(',', Laporan::STATUS),
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'required'    => ':attribute wajib diisi.',
            'no_hp.regex' => 'Format nomor HP tidak valid (contoh: 081234567890).',
            'foto.image'  => 'File harus berupa gambar.',
            'foto.mimes'  => 'Foto harus berformat jpg, jpeg, atau png.',
            'foto.max'    => 'Ukuran foto maksimal 2 MB.',
        ], [
            'nama_pelapor' => 'Nama pelapor',
            'no_hp' => 'Nomor HP',
            'tinggi_air' => 'Tinggi air',
        ]);

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($laporan->foto);          // hapus foto lama
            $data['foto'] = $request->file('foto')->store('laporan', 'public');
        } else {
            unset($data['foto']);
        }

        $laporan->update($data);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy(Laporan $laporan)
    {
        Storage::disk('public')->delete($laporan->foto);              // hapus foto bersama laporan
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}