@extends('layouts.app')
@section('title', 'Tambah Ide')

@section('content')
<div class="page-h"><div class="container"><div><h1>Unggah Ide</h1><p>Bagikan gagasan Anda untuk kota yang lebih baik.</p></div></div></div>

<div class="page">
    <div class="container narrow">
        <form class="panel" action="{{ route('ide.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('ide._form', ['ide' => null])
            <div class="acts-r">
                <button class="btn btn-navy" type="submit">Simpan Ide</button>
                <a href="{{ route('ide.index') }}" class="btn btn-o">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection