@include('layout.header')

@section('content')
<div class="container mt-4">
    <h3>Data Informasi Kontak</h3>

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>Subject</th>
                <th>Name</th>
                <th>Email</th>
                <th style="width: 250px;">Message</th> {{-- Batasi lebar kolom --}}
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $kontak)
                <tr>
                    <td>{{ $kontak->subject }}</td>
                    <td>{{ $kontak->name }}</td>
                    <td>{{ $kontak->email }}</td>
                    <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">
                        {{ \Illuminate\Support\Str::limit(strip_tags($kontak->message), 50, '...') }}
                    </td>
                    <td>
                        <a href="{{ route('kontak.show', $kontak->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pesan masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@include('layout.footer')