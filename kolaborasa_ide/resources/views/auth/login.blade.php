@extends('layouts.app')
@section('title', 'Masuk')

@section('content')
<div class="auth-wrap">
    <form class="auth-box" action="{{ route('login') }}" method="POST">
        @csrf
        <h2>Masuk</h2>
        <p class="hint" style="margin:0 0 22px">Masuk untuk mengelola ide Anda.</p>

        @if (session('success')) <div class="alert">{{ session('success') }}</div> @endif

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
        <label class="remember"><input type="checkbox" name="remember" value="1"> Ingat saya</label>

        <button class="btn btn-navy btn-block">Masuk</button>
        <p class="alt">Belum punya akun? <a href="{{ route('register') }}"><strong>Daftar</strong></a></p>
    </form>
</div>
@endsection