@include('layout.header')

@section('content')
<div class="container mt-4">
    <h3>Detail Pesan Kontak</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Subject:</strong> {{ $kontak->subject }}</p>
            <p><strong>Name:</strong> {{ $kontak->name }}</p>
            <p><strong>Email:</strong> {{ $kontak->email }}</p>
            <p><strong>Message:</strong> {{ $kontak->message }}</p>
        </div>
    </div>

    <a href="{{ route('kontak.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@include('layout.footer')