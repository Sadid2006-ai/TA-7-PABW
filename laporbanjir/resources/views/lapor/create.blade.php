@extends('layouts.app')
@section('title', 'Lapor Banjir')

@section('content')
<div class="page-h">
    <div class="container">
        <h1>Formulir Pelaporan Banjir</h1>
        <p>Isi data dengan benar. Laporan palsu dapat dihapus oleh petugas.</p>
    </div>
</div>

<div class="page">
    <div class="container narrow">
        @if (session('success'))
            <div class="alert alert-ok">✓ {{ session('success') }}</div>
        @endif

        <form class="card" action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('lapor._fields', ['laporan' => null, 'withStatus' => false])
            <button class="btn" type="submit">Kirim Laporan</button>
        </form>
    </div>
</div>
@endsection