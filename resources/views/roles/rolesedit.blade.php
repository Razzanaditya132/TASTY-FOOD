@include('layout.header')

@section('content')
<div class="container px-4"> {{-- tambahkan padding kiri-kanan agar tidak mentok --}}
    <h1 class="mb-4">Edit Role</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama Role --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama Role</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}"
                required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Hak Akses --}}
        <div class="mb-3">
            <label class="form-label">Hak Akses:</label>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akses_galeri" id="akses_galeri" {{ $role->akses_galeri ? 'checked' : '' }}>
                        <label class="form-check-label" for="akses_galeri">Akses Galeri</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akses_kontak" id="akses_kontak" {{ $role->akses_kontak ? 'checked' : '' }}>
                        <label class="form-check-label" for="akses_kontak">Akses Kontak</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akses_tentang" id="akses_tentang" {{ $role->akses_tentang ? 'checked' : '' }}>
                        <label class="form-check-label" for="akses_tentang">Akses Tentang Kami</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akses_berita" id="akses_berita" {{ $role->akses_berita ? 'checked' : '' }}>
                        <label class="form-check-label" for="akses_berita">Akses Berita</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akses_roles" id="akses_roles" {{ $role->akses_roles ? 'checked' : '' }}>
                        <label class="form-check-label" for="akses_roles">Akses Role</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akses_user" id="akses_user" {{ $role->akses_user ? 'checked' : '' }}>
                        <label class="form-check-label" for="akses_user">Akses User</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol --}}
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@include('layout.footer')