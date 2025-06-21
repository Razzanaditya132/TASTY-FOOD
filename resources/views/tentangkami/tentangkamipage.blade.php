@include('layout.header')

@section('content')
<div class="container mt-4">
    <h3>Tentang Kami</h3>
    <a href="{{ route('tentangkami.create') }}" class="btn btn-primary mb-3">+ Tambah Tentang</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar 1</th>
                <th>Gambar 2</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $tentangkami)
                <tr>
                    <td>{{ $tentangkami->judul }}</td>
                    <td style="max-width: 300px; white-space: normal; word-wrap: break-word;">
                        {{ $tentangkami->deskripsi }}
                    </td>
                    <td>
                        @if ($tentangkami->gambar)
                            <img src="{{ asset('storage/' . $tentangkami->gambar) }}" width="100">
                        @endif
                    </td>
                    <td>
                        @if (!empty($tentangkami->gambar2))
                            <img src="{{ asset('storage/' . $tentangkami->gambar2) }}" width="100">
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('tentangkami.edit', $tentangkami->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tentangkami.destroy', $tentangkami->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@include('layout.footer')