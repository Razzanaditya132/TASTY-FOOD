<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TENTANG KAMI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">
    {{-- Navbar --}}
    @include('front-end.layout.navbar')

    {{-- Hero Section --}}
    <div class="relative w-full h-[500px] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('ASET/Group 70.png') }}')">
        <h1 class="font-sans font-bold text-white text-3xl px-8 py-4 rounded-lg mt-[50px] mr-[760px] md:block hidden">
            TENTANG KAMI
        </h1>
        <h1 class="font-sans font-bold text-white text-xl px-10 py-2 rounded-lg md:hidden block text-center">
            TENTANG KAMI
        </h1>
    </div>


    {{-- Konten --}}
    <div class="max-w-7xl mx-auto py-20 px-6 space-y-20">
        @foreach ($data as $index => $item)
            {{-- Bagian 1: TASTY FOOD --}}
            @if ($index === 0)
                <div class="bg-gray-100 p-10 rounded-xl grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-3xl font-bold font-sans mb-4">{{ $item->judul }}</h2>
                        <p class="text-gray-700 leading-relaxed font-medium">
                            {!! nl2br(e($item->deskripsi)) !!}
                        </p>
                    </div>

                    {{-- Gambar --}}
                    <div class="flex md:flex-row flex-col md:justify-end items-center gap-4">
                        @if (!empty($item->gambar))
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar"
                                class="w-[300px] h-[350px] object-cover rounded-xl shadow-md">
                        @endif
                        @if (!empty($item->gambar2))
                            <img src="{{ asset('storage/' . $item->gambar2) }}" alt="Gambar 2"
                                class="w-[300px] h-[350px] object-cover rounded-xl shadow-md">
                        @endif
                    </div>
                </div>
                {{-- Bagian 2: VISI (gambar kiri, teks kanan) --}}
                {{-- Bagian 2: VISI (gambar kiri, teks kanan) --}}
            @elseif ($index === 1)
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div class="flex gap-4 md:flex-row flex-col items-center">
                        @if (!empty($item->gambar))
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar"
                                class="w-full md:w-[300px] h-72 object-cover rounded-xl shadow-md">
                        @endif
                        @if (!empty($item->gambar2))
                            <img src="{{ asset('storage/' . $item->gambar2) }}" alt="Gambar 2"
                                class="w-full md:w-[300px] h-72 object-cover rounded-xl shadow-md">
                        @endif
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-4">{{ $item->judul }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($item->deskripsi)) !!}
                        </p>
                    </div>
                </div>
                {{-- Bagian 3+ --}}
            @else
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">{{ $item->judul }}</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($item->deskripsi)) !!}
                        </p>
                    </div>
                    <div class="flex gap-4 flex-wrap">
                        @if (!empty($item->gambar) && empty($item->gambar2))
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar"
                                class="w-[400px] h-64 object-cover rounded-xl shadow-md sm:w-full">
                        @elseif (!empty($item->gambar) && !empty($item->gambar2))
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar 1"
                                class="w-[200px] h-64 object-cover rounded-xl shadow-md sm:w-1/2">
                            <img src="{{ asset('storage/' . $item->gambar2) }}" alt="Gambar 2"
                                class="w-[200px] h-64 object-cover rounded-xl shadow-md sm:w-1/2">
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- Footer --}}
    @include('front-end.layout.footer')
</body>

</html>