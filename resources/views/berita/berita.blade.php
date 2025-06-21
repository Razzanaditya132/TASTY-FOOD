@include('layout.header')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Berita</h3>
        <a href="{{ route('berita.create') }}" class="btn btn-primary">+ Tambah Berita</a>
    </div>

    <table class="table table-bordered table-striped table-responsive">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th style="width: 50%">Isi</th> {{-- Batasi lebar kolom --}}
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($beritas as $berita)
                <tr>
                    <td>{{ $berita->judul }}</td>
                    <td style="max-width: 1000px; word-break: break-word; white-space: normal;">
                        {{ $berita->isi }}
                    </td>

                    <td>
                        @if ($berita->gambar)
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar" width="100">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada berita.</td>
                </tr>
            @endforelse
        </tbody>    
    </table>
</div>
@include('layout.footer')