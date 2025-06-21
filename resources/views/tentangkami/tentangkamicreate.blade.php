@include('layout.header')

@section('content')
<div class="container mt-4">
    <h3>Tambah Tentang Kami</h3>

    <form action="{{ route('tentangkami.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" required>
        </div>

        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar Tambahan (opsional)</label>
            <input type="file" class="form-control" name="gambar2">
        </div>


        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('tentangkami.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@include('layout.footer')