@extends('layouts.app')
@section('title', 'Edit Ide')

@section('content')
<div class="page-h"><div class="container"><div><h1>Edit Ide</h1><p>{{ $ide->judul }}</p></div></div></div>

<div class="page">
    <div class="container narrow">
        <form class="panel" action="{{ route('ide.update', $ide) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('ide._form', ['ide' => $ide])
            <div class="acts-r">
                <button class="btn btn-navy" type="submit">Simpan Perubahan</button>
                <a href="{{ route('ide.show', $ide) }}" class="btn btn-o">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection