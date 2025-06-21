<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KONTAK KAMI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('front-end.layout.navbar')

    {{-- Hero Section --}}
    <div class="relative w-full h-[500px] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('ASET/Group 70.png') }}');">
        <h1 class="font-bold text-white text-4xl md:text-5xl px-6 py-4 rounded-md mt-12 ml-0 md:ml-[-380px]">
            KONTAK KAMI
        </h1>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg my-6 w-full text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Kontak --}}
    <form action="{{ route('kontak.store') }}" method="POST" class="max-w-5xl mx-auto px-4 py-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-[240px]">
            <!-- Kolom kiri: Subject, Name, Email (dibuat sejajar penuh dengan tinggi textarea) -->
            <div class="flex flex-col justify-between h-full">
                <input name="subject" placeholder="Subject"
                    class="border border-gray-400 rounded-md px-4 py-3 w-full h-1/3 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    required>
                <input name="name" placeholder="Name"
                    class="border border-gray-400 rounded-md px-4 py-3 w-full h-1/3 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    required>
                <input name="email" type="email" placeholder="Email"
                    class="border border-gray-400 rounded-md px-4 py-3 w-full h-1/3 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    required>
            </div>

            <!-- Kolom kanan: Message -->
            <div class="h-full">
                <textarea name="message" placeholder="Message"
                    class="border border-gray-400 rounded-md px-4 py-3 w-full h-full resize-none focus:outline-none focus:ring-2 focus:ring-gray-300"
                    required></textarea>
            </div>
        </div>

        <!-- Tombol Kirim -->
        <div class="mt-6">
            <button type="submit"
                class="bg-black text-white w-full py-4 rounded-lg font-bold text-sm tracking-wide hover:bg-gray-800 transition">
                KIRIM
            </button>
        </div>
    </form>


    {{-- Kontak Info Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 text-center mb-10 gap-8 px-4 max-w-6xl mx-auto">
        <div>
            <img src="{{ asset('ASET/Group 66@2x.png') }}" alt="email icon" class="mx-auto w-10 h-10 mb-2">
            <p class="font-bold">EMAIL</p>
            <p>tastyfood@gmail.com</p>
        </div>
        <div>
            <img src="{{ asset('ASET/Group 67.png') }}" alt="phone icon" class="mx-auto w-10 h-10 mb-2">
            <p class="font-bold">PHONE</p>
            <p>+62 812 3456 7890</p>
        </div>
        <div>
            <img src="{{ asset('ASET/Group 68.png') }}" alt="location icon" class="mx-auto w-10 h-10 mb-2">
            <p class="font-bold">LOCATION</p>
            <p><a href="#map" class="hover:underline">Kota Bandung, Jawa Barat</a></p>
        </div>
    </div>

    {{-- Google Maps --}}
    <div id="map" class="w-full h-[400px]">
        <iframe src="https://www.google.com/maps?q=Kota+Bandung,+Jawa+Barat&output=embed" width="100%" height="100%"
            frameborder="0" style="border:0;" allowfullscreen aria-hidden="false" tabindex="0">
        </iframe>
    </div>

    {{-- Footer --}}
    @include('front-end.layout.footer')

</body>

</html>