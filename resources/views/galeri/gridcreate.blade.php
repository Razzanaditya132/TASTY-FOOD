@include('layout.header')

@section('content')
<div style="padding: 40px;">
    <h2 style="margin-bottom: 20px;">➕ Tambah Gambar ke Galeri Grid</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('grid_galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="gambar">Pilih Gambar:</label><br>
            <input type="file" name="gambar" accept="image/*" required>
        </div>

        <button type="submit"
            style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 8px;">
            Upload Gambar
        </button>
    </form>
</div>
@include('layout.footer')