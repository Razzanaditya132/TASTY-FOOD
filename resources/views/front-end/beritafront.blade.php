<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    aspectRatio: {
                        'mobile': '4 / 3',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            @media (max-width: 767px) {
                .responsive-img {
                    @apply aspect-[4/3] h-auto w-full object-cover;
                }
            }
        }
    </style>
</head>

<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('front-end.layout.navbar')

    {{-- Hero --}}
    <div class="relative w-full h-[500px] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('ASET/Group 70.png') }}');">
        <h1 class="text-white font-bold font-sans px-6 py-3 rounded-lg
           text-2xl mt-4 text-center bg-black/60
           md:text-[3rem] md:mt-[50px] md:mr-[760px] md:text-left md:bg-transparent">
            BERITA KAMI
        </h1>

    </div>

    {{-- Konten Berita --}}
    <div class="max-w-7xl mx-auto py-12 px-4">
        @if ($beritas->count() > 0)

            {{-- Berita Utama --}}
            <div class="grid md:grid-cols-2 gap-8 items-center bg-gray-50 p-6 rounded-xl shadow mb-12">
                <img src="{{ asset('storage/' . $beritas[0]->gambar) }}" alt="Berita Utama"
                    class="rounded-xl object-cover w-full h-[350px] responsive-img" />
                <div>
                    <h2 class="text-3xl font-bold mb-4">{{ $beritas[0]->judul }}</h2>
                    <p class="text-gray-700 mb-6">{{ \Illuminate\Support\Str::limit($beritas[0]->isi, 300) }}</p>
                    <a href="{{ route('berita.show', $beritas[0]->id) }}"
                        class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800 transition">Baca Selengkapnya</a>
                </div>
            </div>

            {{-- Berita Lainnya --}}
            <h3 class="text-2xl font-semibold mb-6">Berita Lainnya</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($beritas->skip(1) as $berita)
                    <div class="bg-white rounded-xl shadow hover:shadow-md transition p-4 flex flex-col">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Berita"
                            class="rounded-xl object-cover h-40 w-full mb-4 responsive-img" />
                        <h4 class="font-semibold text-lg mb-2">{{ $berita->judul }}</h4>
                        <p class="text-sm text-gray-700 flex-grow">
                            {{ \Illuminate\Support\Str::limit($berita->isi, 100) }}
                        </p>
                        <a href="{{ route('berita.show', $berita->id) }}"
                            class="mt-4 text-sm text-yellow-500 font-semibold hover:underline">Baca selengkapnya</a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600">Belum ada berita tersedia.</p>
        @endif
    </div>

    {{-- Footer --}}
    @include('front-end.layout.footer')

</body>

</html>