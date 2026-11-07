@php $l = $laporan; @endphp

<div class="grid2">
    <div class="fg">
        <label for="nama_pelapor">Nama Pelapor</label>
        <input type="text" id="nama_pelapor" name="nama_pelapor"
               value="{{ old('nama_pelapor', $l->nama_pelapor ?? '') }}"
               class="@error('nama_pelapor') is-err @enderror">
        @error('nama_pelapor') <div class="err">{{ $message }}</div> @enderror
    </div>
    <div class="fg">
        <label for="no_hp">Nomor HP</label>
        <input type="text" id="no_hp" name="no_hp" placeholder="081234567890"
               value="{{ old('no_hp', $l->no_hp ?? '') }}"
               class="@error('no_hp') is-err @enderror">
        @error('no_hp') <div class="err">{{ $message }}</div> @enderror
    </div>
</div>

<div class="fg">
    <label for="lokasi">Lokasi Kejadian</label>
    <input type="text" id="lokasi" name="lokasi" placeholder="Nama jalan, RT/RW, desa"
           value="{{ old('lokasi', $l->lokasi ?? '') }}"
           class="@error('lokasi') is-err @enderror">
    @error('lokasi') <div class="err">{{ $message }}</div> @enderror
</div>

<div class="grid2">
    <div class="fg">
        <label for="kecamatan">Kecamatan</label>
        <select id="kecamatan" name="kecamatan" class="@error('kecamatan') is-err @enderror">
            <option value="">-- Pilih kecamatan --</option>
            @foreach (\App\Models\Laporan::KECAMATAN as $k)
                <option value="{{ $k }}" @selected(old('kecamatan', $l->kecamatan ?? '') === $k)>{{ $k }}</option>
            @endforeach
        </select>
        @error('kecamatan') <div class="err">{{ $message }}</div> @enderror
    </div>
    <div class="fg">
        <label for="tinggi_air">Tinggi Air (cm)</label>
        <input type="number" id="tinggi_air" name="tinggi_air" min="1"
               value="{{ old('tinggi_air', $l->tinggi_air ?? '') }}"
               class="@error('tinggi_air') is-err @enderror">
        @error('tinggi_air') <div class="err">{{ $message }}</div> @enderror
    </div>
</div>

<div class="fg">
    <label for="keterangan">Keterangan</label>
    <textarea id="keterangan" name="keterangan" rows="4"
              class="@error('keterangan') is-err @enderror">{{ old('keterangan', $l->keterangan ?? '') }}</textarea>
    @error('keterangan') <div class="err">{{ $message }}</div> @enderror
</div>

@if ($withStatus)
    <div class="fg">
        <label for="status">Status Penanganan</label>
        <select id="status" name="status" class="@error('status') is-err @enderror">
            @foreach (\App\Models\Laporan::STATUS as $s)
                <option value="{{ $s }}" @selected(old('status', $l->status ?? '') === $s)>{{ $s }}</option>
            @endforeach
        </select>
        @error('status') <div class="err">{{ $message }}</div> @enderror
    </div>
@endif

<div class="fg">
    <label for="foto">Foto Bukti {{ $l ? '(kosongkan jika tidak diganti)' : '' }}</label>
    @if ($l)
        <img src="{{ asset('storage/' . $l->foto) }}" alt="Foto saat ini" class="thumb" style="width:140px;height:100px;margin-bottom:10px">
    @endif
    <input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png"
           class="@error('foto') is-err @enderror">
    <div class="hint">Format JPG/JPEG/PNG, maksimal 2 MB.</div>
    @error('foto') <div class="err">{{ $message }}</div> @enderror
</div>