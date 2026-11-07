<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LaporBanjir') · BPBD Kabupaten Bandung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="nav">
    <div class="container nav-in">
        <a href="{{ route('home') }}" class="brand"><i>🌊</i> LaporBanjir</a>
        <nav class="menu">
            <a href="{{ route('home') }}" class="hide-m">Beranda</a>
            <a href="{{ route('lapor.create') }}">Lapor Banjir</a>
            @auth
                <a href="{{ route('laporan.index') }}">Kelola Laporan</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-o btn-sm">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm">Masuk Petugas</a>
            @endauth
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <div class="f-grid">
            <div>
                <div class="brand" style="color:#fff"><i>🌊</i> LaporBanjir</div>
                <p>Layanan pelaporan banjir resmi Badan Penanggulangan Bencana Daerah Kabupaten Bandung.</p>
            </div>
            <div>
                <h5>Layanan</h5>
                <a href="{{ route('lapor.create') }}">Kirim Laporan</a>
                <a href="{{ route('login') }}">Portal Petugas</a>
            </div>
            <div>
                <h5>Kontak</h5>
                <a href="#">Soreang, Kabupaten Bandung</a>
                <a href="#">Darurat: 112</a>
            </div>
        </div>
        <div class="copy">© {{ date('Y') }} BPBD Kabupaten Bandung. Seluruh hak dilindungi.</div>
    </div>
</footer>
</body>
</html>