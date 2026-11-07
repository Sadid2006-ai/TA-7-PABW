@extends('layouts.app')
@section('title', 'Daftar Ide')

@section('content')
<div class="page-h">
    <div class="container">
        <div>
            <h1>Daftar Ide</h1>
            <p>{{ $ides->total() }} ide dari masyarakat</p>
        </div>
        <a href="{{ route('ide.create') }}" class="btn">+ Tambah Ide</a>
    </div>
</div>

<div class="page">
    <div class="container">
        @if (session('success')) <div class="alert">✓ {{ session('success') }}</div> @endif

        @if ($ides->count())
            <div class="grid">
                @foreach ($ides as $ide)
                    <article class="ide-card">
                        <img src="{{ asset('storage/' . $ide->gambar) }}" alt="{{ $ide->judul }}">
                        <div class="ide-body">
                            <span class="chip">{{ $ide->kategori }}</span>
                            <h3>{{ $ide->judul }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($ide->ringkasan, 110) }}</p>
                            <div class="meta">oleh {{ $ide->user->name }} · {{ $ide->created_at->diffForHumans() }}</div>
                            <div class="acts-r">
                                <a href="{{ route('ide.show', $ide) }}" class="btn btn-sm btn-navy">Detail</a>
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
                    </article>
                @endforeach
            </div>
            {{ $ides->links('pagination.custom') }}
        @else
            <div class="empty">Belum ada ide. Jadilah yang pertama membagikan ide!</div>
        @endif
    </div>
</div>
@endsection