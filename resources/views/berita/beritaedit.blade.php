@include('layout.header')

@section('content')
<div class="container mt-4">
    <h3>Edit Berita</h3>

    {{-- FORM MULAI --}}
    <form method="POST" action="{{ route('berita.update', $berita) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="5" required>{{ $berita->isi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (biarkan kosong jika tidak diganti)</label><br>
            <img src="{{ asset('storage/' . $tentangkami->gambar) }}" width="150" class="mb-2"><br>
            <input type="file" class="form-control" name="gambar">
        </div>

        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar Tambahan (opsional)</label><br>
            @if ($tentangkami->gambar2)
                <img src="{{ asset('storage/' . $tentangkami->gambar2) }}" width="150" class="mb-2"><br>
            @endif
            <input type="file" class="form-control" name="gambar2">
        </div>

        {{-- TOMBOL AKSI --}}
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@include('layout.footer')