<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Kolaborasa')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/kolaborasa.css') }}">
</head>
<body>
<header class="nav">
    <div class="container nav-in">
        <a href="{{ route('home') }}" class="brand">Kolabor<span>asa</span></a>
        <nav class="menu">
            @auth
                <a href="{{ route('ide.index') }}">Ide</a>
                <a href="{{ route('ide.create') }}" class="hide-m">Tambah Ide</a>
                <span class="user">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-sm">Daftar</a>
            @endauth
        </nav>
    </div>
</header>

<main>@yield('content')</main>

<footer class="footer">© {{ date('Y') }} Kolaborasa · Wadah ide masyarakat untuk kota yang lebih cerdas</footer>
</body>
</html>