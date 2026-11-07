@extends('layouts.app')
@section('title', 'Kolaborasa')

@section('content')
<section class="hero">
    <div class="container">
        <h1>Kolabor<span>asa</span></h1>
        <p>Bagikan ide Anda untuk kota pintar. Unggah dokumen gagasan, lengkap dengan ringkasan dan gambar.</p>
        <div class="acts">
            @auth
                <a href="{{ route('ide.index') }}" class="btn">Lihat Ide</a>
            @else
                <a href="{{ route('register') }}" class="btn">Mulai</a>
                <a href="{{ route('login') }}" class="btn btn-o" style="color:#fff;border-color:#fff">Masuk</a>
            @endauth
        </div>
    </div>
</section>
@endsection