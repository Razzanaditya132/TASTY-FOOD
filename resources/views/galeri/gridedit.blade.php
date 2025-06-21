@include('layout.header')

@section('content')
<div style="padding: 40px;">
    <h2 style="margin-bottom: 20px;">✏️ Edit Gambar Galeri Grid</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <<form action="{{ route('grid_galeri.update', $grid->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label>Gambar Saat Ini:</label><br>
            <img src="{{ asset('storage/' . $grid->gambar) }}" alt="Gambar"
                style="max-width: 300px; border-radius: 12px; margin-top: 10px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="gambar">Ganti Gambar (opsional):</label><br>
            <input type="file" name="gambar" accept="image/*">
        </div>

        <button type="submit"
            style="background: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 8px;">
            Simpan Perubahan
        </button>
        </form>
</div>
@include('layout.footer')