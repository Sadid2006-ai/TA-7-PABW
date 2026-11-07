@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
<section class="hero">
    <div class="container hero-grid">
        <div>
            <span class="tag">Layanan Resmi BPBD Kabupaten Bandung</span>
            <h1>Laporkan banjir,<br><span>tanggap lebih cepat.</span></h1>
            <p>Kirim laporan beserta foto kondisi banjir di sekitar Anda. Petugas kami memverifikasi dan menindaklanjuti setiap laporan secara transparan.</p>
            <div class="acts">
                <a href="{{ route('lapor.create') }}" class="btn">Laporkan Sekarang</a>
                <a href="{{ route('login') }}" class="btn btn-o">Portal Petugas</a>
            </div>
        </div>
        <div class="hero-card">
            <h4>Bagaimana cara kerjanya?</h4>
            <div class="step"><b>1</b><div><strong>Isi formulir</strong><small>Lokasi, tinggi air, dan foto bukti.</small></div></div>
            <div class="step"><b>2</b><div><strong>Diverifikasi petugas</strong><small>Status berubah menjadi Diproses.</small></div></div>
            <div class="step"><b>3</b><div><strong>Ditangani</strong><small>Laporan ditandai Selesai.</small></div></div>
        </div>
    </div>
</section>

<div class="container">
    <div class="stats">
        <div class="stat"><b>{{ $total }}</b><span>Total laporan masuk</span></div>
        <div class="stat"><b>{{ $diproses }}</b><span>Sedang diproses</span></div>
        <div class="stat"><b>{{ $selesai }}</b><span>Laporan selesai</span></div>
    </div>
</div>

<section class="section">
    <div class="container">
        <h2>Mengapa LaporBanjir?</h2>
        <p class="sub">Dirancang agar warga mudah melapor dan petugas mudah bertindak.</p>
        <div class="feat">
            <div><em>📸</em><h3>Bukti Foto</h3><p>Lampirkan foto kondisi banjir (JPG/PNG, maks. 2 MB) agar petugas dapat menilai situasi.</p></div>
            <div><em>⚡</em><h3>Respons Cepat</h3><p>Laporan langsung masuk ke dasbor petugas BPBD tanpa perantara.</p></div>
            <div><em>🔎</em><h3>Status Transparan</h3><p>Setiap laporan memiliki status: Menunggu, Diproses, atau Selesai.</p></div>
        </div>
    </div>
</section>
@endsection