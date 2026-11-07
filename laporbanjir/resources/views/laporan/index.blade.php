@extends('layouts.app')
@section('title', 'Kelola Laporan')

@section('content')
<div class="page-h">
    <div class="container">
        <h1>Kelola Laporan Banjir</h1>
        <p>Pantau, perbarui status, dan hapus laporan yang tidak valid.</p>
    </div>
</div>

<div class="page">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-ok">✓ {{ session('success') }}</div>
        @endif

        <div class="toolbar">
            <form method="GET">
                <select name="status" onchange="this.form.submit()">
                    <option value="">Semua status</option>
                    @foreach (\App\Models\Laporan::STATUS as $s)
                        <option value="{{ $s }}" @selected(request('status') === $s)>{{ $s }}</option>
                    @endforeach
                </select>
            </form>
            <span class="hint">{{ $laporans->total() }} laporan</span>
        </div>

        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Foto</th><th>Pelapor</th><th>Lokasi</th><th>Tinggi</th><th>Status</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($laporans as $l)
                    <tr>
                        <td><img class="thumb" src="{{ asset('storage/' . $l->foto) }}" alt="Foto"></td>
                        <td><strong>{{ $l->nama_pelapor }}</strong><br><span class="hint">{{ $l->no_hp }}</span></td>
                        <td>{{ $l->lokasi }}<br><span class="hint">Kec. {{ $l->kecamatan }}</span></td>
                        <td>{{ $l->tinggi_air }} cm</td>
                        <td><span class="badge b-{{ $l->status }}">{{ $l->status }}</span></td>
                        <td>
                            <div class="acts-r">
                                <a class="btn btn-o btn-sm" href="{{ route('laporan.show', $l) }}">Detail</a>
                                <a class="btn btn-sm" href="{{ route('laporan.edit', $l) }}">Edit</a>
                                <form action="{{ route('laporan.destroy', $l) }}" method="POST"
                                      onsubmit="return confirm('Hapus laporan ini beserta fotonya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-d btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" style="text-align:center;padding:40px;color:#64748b">Belum ada laporan.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{ $laporans->links('pagination.custom') }}
    </div>
</div>
@endsection