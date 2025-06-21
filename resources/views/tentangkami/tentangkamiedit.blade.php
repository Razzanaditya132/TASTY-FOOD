@include('layout.header')

@section('content')
<div class="container mt-4">
    <h3>Edit Tentang Kami</h3>

    <form action="{{ route('tentangkami.update', $tentangkami->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{ $tentangkami->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5" required>{{ $tentangkami->deskripsi }}</textarea>
        </div>

        {{-- Gambar 1 --}}
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar 1 (biarkan kosong jika tidak diganti)</label><br>
            <img src="{{ asset('storage/' . $tentangkami->gambar) }}" width="150" class="mb-2"><br>
            <input type="file" class="form-control" name="gambar">
        </div>

        {{-- Gambar 2 --}}
        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar 2 (biarkan kosong jika tidak diganti)</label><br>
            @if ($tentangkami->gambar2)
                <img src="{{ asset('storage/' . $tentangkami->gambar2) }}" width="150" class="mb-2"><br>
            @else
                <span class="text-muted">Tidak ada gambar 2</span><br>
            @endif
            <input type="file" class="form-control" name="gambar2">
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('tentangkami.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@include('layout.footer')