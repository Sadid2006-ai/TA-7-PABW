<?php

namespace App\Http\Controllers;

use App\Models\Ide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IdeController extends Controller
{
    private function rules(bool $isUpdate = false): array
    {
        return [
            'judul'     => 'required|string|max:150',
            'kategori'  => 'required|in:' . implode(',', Ide::KATEGORI),
            'ringkasan' => 'required|string|min:20|max:1000',
            'gambar'    => ($isUpdate ? 'nullable' : 'required') . '|image|mimes:jpg,jpeg,png|max:2048',
            'dokumen'   => ($isUpdate ? 'nullable' : 'required') . '|file|mimes:pdf,doc,docx|max:5120',
        ];
    }

    private function messages(): array
    {
        return [
            'required'        => ':attribute wajib diisi.',
            'ringkasan.min'   => 'Ringkasan minimal 20 karakter.',
            'ringkasan.max'   => 'Ringkasan maksimal 1000 karakter.',
            'gambar.image'    => 'Gambar harus berupa file gambar.',
            'gambar.mimes'    => 'Gambar harus berformat jpg, jpeg, atau png.',
            'gambar.max'      => 'Ukuran gambar maksimal 2 MB.',
            'dokumen.mimes'   => 'Dokumen harus berformat PDF, DOC, atau DOCX.',
            'dokumen.max'     => 'Ukuran dokumen maksimal 5 MB.',
            'dokumen.uploaded' => 'Dokumen gagal diunggah (kemungkinan melebihi batas ukuran).',
            'gambar.uploaded' => 'Gambar gagal diunggah (kemungkinan melebihi batas ukuran).',
        ];
    }

    private function attributes(): array
    {
        return ['judul' => 'Judul', 'kategori' => 'Kategori', 'ringkasan' => 'Ringkasan',
                'gambar' => 'Gambar', 'dokumen' => 'Dokumen'];
    }

    private function pastikanPemilik(Ide $ide): void
    {
        abort_unless($ide->user_id === Auth::id(), 403, 'Anda tidak berhak mengubah ide ini.');
    }

    public function index()
    {
        $ides = Ide::with('user')->latest()->paginate(6);
        return view('ide.index', compact('ides'));
    }

    public function create()
    {
        return view('ide.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules(), $this->messages(), $this->attributes());

        $data['nama_asli_dokumen'] = $request->file('dokumen')->getClientOriginalName();
        $data['gambar']  = $request->file('gambar')->store('ide-gambar', 'public');
        $data['dokumen'] = $request->file('dokumen')->store('ide-dokumen', 'public');
        $data['user_id'] = Auth::id();

        Ide::create($data);

        return redirect()->route('ide.index')->with('success', 'Ide berhasil ditambahkan.');
    }

    public function show(Ide $ide)
    {
        return view('ide.show', compact('ide'));
    }

    public function edit(Ide $ide)
    {
        $this->pastikanPemilik($ide);
        return view('ide.edit', compact('ide'));
    }

    public function update(Request $request, Ide $ide)
    {
        $this->pastikanPemilik($ide);
        $data = $request->validate($this->rules(true), $this->messages(), $this->attributes());

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($ide->gambar);               // hapus gambar lama
            $data['gambar'] = $request->file('gambar')->store('ide-gambar', 'public');
        } else {
            unset($data['gambar']);
        }

        if ($request->hasFile('dokumen')) {
            Storage::disk('public')->delete($ide->dokumen);              // hapus dokumen lama
            $data['nama_asli_dokumen'] = $request->file('dokumen')->getClientOriginalName();
            $data['dokumen'] = $request->file('dokumen')->store('ide-dokumen', 'public');
        } else {
            unset($data['dokumen']);
        }

        $ide->update($data);

        return redirect()->route('ide.show', $ide)->with('success', 'Ide berhasil diperbarui.');
    }

    public function destroy(Ide $ide)
    {
        $this->pastikanPemilik($ide);

        Storage::disk('public')->delete([$ide->gambar, $ide->dokumen]); // hapus kedua file
        $ide->delete();

        return redirect()->route('ide.index')->with('success', 'Ide berhasil dihapus.');
    }

    public function dokumen(Ide $ide, string $mode)
    {
        $path = Storage::disk('public')->path($ide->dokumen);
        abort_unless(file_exists($path), 404);

        if ($mode === 'unduh') {
            return response()->download($path, $ide->nama_asli_dokumen);
        }

        return response()->file($path); // PDF tampil di browser; DOC/DOCX otomatis terunduh
    }
}