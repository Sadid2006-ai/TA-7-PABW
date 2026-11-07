@php $i = $ide; @endphp

<div class="fg">
    <label for="judul">Judul Ide</label>
    <input type="text" id="judul" name="judul" value="{{ old('judul', $i->judul ?? '') }}" class="@error('judul') is-err @enderror">
    @error('judul') <div class="err">{{ $message }}</div> @enderror
</div>

<div class="fg">
    <label for="kategori">Kategori</label>
    <select id="kategori" name="kategori" class="@error('kategori') is-err @enderror">
        <option value="">-- Pilih kategori --</option>
        @foreach (\App\Models\Ide::KATEGORI as $k)
            <option value="{{ $k }}" @selected(old('kategori', $i->kategori ?? '') === $k)>{{ $k }}</option>
        @endforeach
    </select>
    @error('kategori') <div class="err">{{ $message }}</div> @enderror
</div>

<div class="fg">
    <label for="ringkasan">Ringkasan Ide</label>
    <textarea id="ringkasan" name="ringkasan" rows="5" class="@error('ringkasan') is-err @enderror">{{ old('ringkasan', $i->ringkasan ?? '') }}</textarea>
    @error('ringkasan') <div class="err">{{ $message }}</div> @enderror
</div>

<div class="fg">
    <label for="gambar">Gambar Ide {{ $i ? '(kosongkan jika tidak diganti)' : '' }}</label>
    @if ($i)
        <img class="preview" src="{{ asset('storage/' . $i->gambar) }}" alt="Gambar saat ini">
    @endif
    <input type="file" id="gambar" name="gambar" accept=".jpg,.jpeg,.png" class="@error('gambar') is-err @enderror">
    <div class="hint">JPG/JPEG/PNG, maksimal 2 MB.</div>
    @error('gambar') <div class="err">{{ $message }}</div> @enderror
</div>

<div class="fg">
    <label for="dokumen">Dokumen Ide {{ $i ? '(kosongkan jika tidak diganti)' : '' }}</label>
    @if ($i)
        <div class="file-now">📄 {{ $i->nama_asli_dokumen }}</div>
    @endif
    <input type="file" id="dokumen" name="dokumen" accept=".pdf,.doc,.docx" class="@error('dokumen') is-err @enderror">
    <div class="hint">PDF/DOC/DOCX, maksimal 5 MB.</div>
    @error('dokumen') <div class="err">{{ $message }}</div> @enderror
</div>