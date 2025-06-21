@include('layout.header')
@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">🖼️ Tambahkan Foto Galeri</h3>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow"
        style="max-width: 500px; margin: auto;">
        @csrf
        <div class="mb-3">
            <label for="gambar" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-success w-100">✅ Simpan Gambar</button>
        <a href="{{ route('galeri.index') }}" class="btn btn-secondary w-100 mt-2">🔙 Kembali</a>
    </form>
</div>
@include('layout.footer')