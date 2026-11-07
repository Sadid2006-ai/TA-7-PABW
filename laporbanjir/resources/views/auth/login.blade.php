@extends('layouts.app')
@section('title', 'Masuk Petugas')

@section('content')
<div class="container">
    <div class="login-box">
        @if (session('success'))
            <div class="alert alert-ok">✓ {{ session('success') }}</div>
        @endif
        <form class="card" action="{{ route('login') }}" method="POST">
            @csrf
            <h2 style="margin:0 0 4px">Masuk Petugas</h2>
            <p class="hint" style="margin:0 0 24px">Portal pengelolaan laporan BPBD.</p>

            <div class="fg">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="@error('email') is-err @enderror">
                @error('email') <div class="err">{{ $message }}</div> @enderror
            </div>
            <div class="fg">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password"
                       class="@error('password') is-err @enderror">
                @error('password') <div class="err">{{ $message }}</div> @enderror
            </div>
            <button class="btn" style="width:100%">Masuk</button>
        </form>
    </div>
</div>
@endsection