@include('layout.header')
@section('content')
<h1>Daftar Role</h1>

<a href="{{ route('roles.create') }}">Tambah Role</a>

<table>
    <thead>
        <tr>
            <th>Nama Role</th>
            <th>Galeri</th>
            <th>Kontak</th>
            <th>Tentang</th>
            <th>Berita</th>
            <th>roles</th>
            <th>user</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->akses_galeri ? '✅' : '❌' }}</td>
                <td>{{ $role->akses_kontak ? '✅' : '❌' }}</td>
                <td>{{ $role->akses_tentang ? '✅' : '❌' }}</td>
                <td>{{ $role->akses_berita ? '✅' : '❌' }}</td>
                <td>{{ $role->akses_roles ? '✅' : '❌' }}</td>
                <td>{{ $role->akses_user ? '✅' : '❌' }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('layout.footer')