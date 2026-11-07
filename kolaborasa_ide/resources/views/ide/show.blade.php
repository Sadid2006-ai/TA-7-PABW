@extends('layouts.app')
@section('title', $ide->judul)

@section('content')
<div class="page-h"><div class="container"><div><h1>Detail Ide</h1><p>oleh {{ $ide->user->name }} · {{ $ide->created_at->translatedFormat('d F Y') }}</p></div></div></div>

<div class="page">
    <div class="container">
        @if (session('success')) <div class="alert">✓ {{ session('success') }}</div> @endif

        <div class="detail">
            <img class="cover" src="{{ asset('storage/' . $ide->gambar) }}" alt="{{ $ide->judul }}">
            <div class="panel">
                <span class="chip">{{ $ide->kategori }}</span>
                <h2>{{ $ide->judul }}</h2>
                <p>{{ $ide->ringkasan }}</p>

                <div class="doc-box">
                    <div>
                        <strong>📄 Dokumen Ide</strong>
                        <span class="hint">{{ $ide->nama_asli_dokumen }}</span>
                    </div>
                    <div class="acts-r">
                        <a href="{{ route('ide.dokumen', [$ide, 'lihat']) }}" target="_blank" class="btn btn-sm btn-navy">Lihat</a>
                        <a href="{{ route('ide.dokumen', [$ide, 'unduh']) }}" class="btn btn-sm">Unduh</a>
                    </div>
                </div>

                <div class="acts-r" style="margin-top:24px">
                    <a href="{{ route('ide.index') }}" class="btn btn-o btn-sm">Kembali</a>
                    @if ($ide->user_id === Auth::id())
                        <a href="{{ route('ide.edit', $ide) }}" class="btn btn-sm">Edit</a>
                        <form action="{{ route('ide.destroy', $ide) }}" method="POST"
                              onsubmit="return confirm('Hapus ide ini beserta gambar dan dokumennya?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-d">Hapus</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection