@include('layout.header')

@section('content')
<h1>Buat Role Baru</h1>

<form method="POST" action="{{ route('roles.store') }}">
    @csrf

    <label>Nama Role</label>
    <input type="text" name="name" required>

    <h4>Hak Akses:</h4>
    <label><input type="checkbox" name="akses_galeri"> Akses Galeri</label><br>
    <label><input type="checkbox" name="akses_kontak"> Akses Kontak</label><br>
    <label><input type="checkbox" name="akses_tentang"> Akses Tentang Kami</label><br>
    <label><input type="checkbox" name="akses_berita"> Akses Berita</label><br>
    <label><input type="checkbox" name="akses_roles"> Akses roles</label><br>
    <label><input type="checkbox" name="akses_berita"> Akses user</label><br>

    <button type="submit">Simpan</button>
</form>
@include('layout.footer')