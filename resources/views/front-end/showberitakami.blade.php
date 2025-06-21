<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $berita->judul }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 px-4 sm:px-6 md:px-16 py-10 font-sans">
    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
        class="w-full h-40 sm:h-56 md:h-72 lg:h-96 object-cover rounded-md mb-6">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ $berita->judul }}</h1>
    <p class="text-base md:text-lg text-gray-700 leading-relaxed">{{ $berita->isi }}</p>
    <div class="mt-6">
        <a href="{{ route('homefront') }}" class="text-orange-500 text-sm hover:underline">&larr; Kembali</a>
    </div>
    </div>
</body>

</html>