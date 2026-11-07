@extends('layouts.app')
@section('title', 'Detail Laporan')

@section('content')
<div class="page-h">
    <div class="container">
        <h1>Detail Laporan #{{ $laporan->id }}</h1>
        <p>Dikirim {{ $laporan->created_at->translatedFormat('d F Y, H:i') }}</p>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="detail">
            <div class="card">
                <a href="{{ asset('storage/' . $laporan->foto) }}" target="_blank">
                    <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto banjir">
                </a>
            </div>
            <div class="card">
                <dl class="dl">
                    <dt>Status</dt><dd><span class="badge b-{{ $laporan->status }}">{{ $laporan->status }}</span></dd>
                    <dt>Pelapor</dt><dd>{{ $laporan->nama_pelapor }}</dd>
                    <dt>No. HP</dt><dd>{{ $laporan->no_hp }}</dd>
                    <dt>Lokasi</dt><dd>{{ $laporan->lokasi }}</dd>
                    <dt>Kecamatan</dt><dd>{{ $laporan->kecamatan }}</dd>
                    <dt>Tinggi Air</dt><dd>{{ $laporan->tinggi_air }} cm</dd>
                    <dt>Keterangan</dt><dd>{{ $laporan->keterangan ?: '-' }}</dd>
                </dl>
                <div class="acts-r" style="margin-top:28px">
                    <a class="btn" href="{{ route('laporan.edit', $laporan) }}">Edit / Ubah Status</a>
                    <a class="btn btn-o" href="{{ route('laporan.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection