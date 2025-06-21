@include('layout.header')

@section('content')
<div class="container mt-5">
    <h2>Edit Foto Galeri</h2>
    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="gambar" class="form-label">Foto Baru</label><br>
            <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Foto Saat Ini" width="200" class="mb-3"><br>
            <input type="file" name="gambar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@include('layout.footer')