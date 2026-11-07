@extends('layouts.app')
@section('title', 'Edit Laporan')

@section('content')
<div class="page-h">
    <div class="container">
        <h1>Edit Laporan #{{ $laporan->id }}</h1>
        <p>Perbarui data, ganti foto, atau ubah status penanganan.</p>
    </div>
</div>

<div class="page">
    <div class="container narrow">
        <form class="card" action="{{ route('laporan.update', $laporan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('lapor._fields', ['laporan' => $laporan, 'withStatus' => true])
            <div class="acts-r">
                <button class="btn" type="submit">Simpan Perubahan</button>
                <a class="btn btn-o" href="{{ route('laporan.index') }}">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection