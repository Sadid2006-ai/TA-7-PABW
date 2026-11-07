@extends('layouts.app')
@section('title', 'Daftar')

@section('content')
<div class="auth-wrap">
    <form class="auth-box" action="{{ route('register') }}" method="POST">
        @csrf
        <h2>Buat Akun</h2>
        <p class="hint" style="margin:0 0 22px">Bergabung dan bagikan ide Anda.</p>

        <div class="fg">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-err @enderror">
            @error('name') <div class="err">{{ $message }}</div> @enderror
        </div>
        <div class="fg">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-err @enderror">
            @error('email') <div class="err">{{ $message }}</div> @enderror
        </div>
        <div class="fg">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" class="@error('password') is-err @enderror">
            @error('password') <div class="err">{{ $message }}</div> @enderror
        </div>
        <div class="fg">
            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button class="btn btn-navy btn-block">Daftar</button>
        <p class="alt">Sudah punya akun? <a href="{{ route('login') }}"><strong>Masuk</strong></a></p>
    </form>
</div>
@endsection