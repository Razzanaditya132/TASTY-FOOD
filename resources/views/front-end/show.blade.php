@include('layout.header')
@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        @if($berita->gambar)
            <img class="w-full h-96 object-cover" src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita">
        @endif
        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $berita->judul }}</h1>
            <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                {!! nl2br(e($berita->isi)) !!}
            </div>
            <a href="{{ route('berita.front') }}" class="mt-6 inline-block text-blue-600 hover:underline">
                &larr; Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</div>
@include('layout.footer')