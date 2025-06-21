<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASTY FOOD - HOME</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 font-sans bg-gray-200 text-gray-800">
    <!-- Navbar -->
    <nav class="px-6 py-5 mt-1 md:px-16 shadow relative bg-gray-100">
        <div class="flex justify-between items-center">
            <h1 class="text-xl md:text-2xl lg:text-3xl font-bold relative md:top-9">TASTY FOOD</h1>
            <!-- Mobile Toggle Button -->
            <button class="md:hidden block text-2xl focus:outline-none" id="navbar-toggle">
                ☰
            </button>
        </div>

        <!-- Navigation Menu -->
        <<ul id="navbar-menu"
            class="transition-all duration-300 ease-in-out transform origin-top scale-y-0 md:scale-y-100 md:transform-none md:flex flex-col md:flex-row md:gap-2 mt-4 md:mt-0 md:items-center md:static bg-white md:bg-transparent md:shadow-none absolute md:relative top-full left-0 w-full md:w-auto px-6 md:px-60 z-50 overflow-hidden">
            <li><a href="{{ route('homefront') }}" class="block px-4 py-2 text-black font-medium">HOME</a></li>
            <li><a href="{{ route('tentangkamifront') }}" class="block px-4 py-2 text-black font-medium">TENTANG</a>
            </li>
            <li><a href="{{route('berita.front')}}" class="block px-4 py-2 text-black font-medium">BERITA</a></li>
            <li><a href="{{route('galeri.front')}}" class="block px-4 py-2 text-black font-medium">GALERI</a></li>
            <li><a href="{{ url('/kontakkami') }}" class="block px-4 py-2 text-black font-medium">KONTAK</a></li>
            </ul>
    </nav>


    <!-- Hero Section -->
    <div
        class="hero-section relative flex flex-col-reverse md:flex-row items-center justify-between px-6 md:px-16 bg-gray-100 pt-20">
        <div class="max-w-full md:max-w-[50%] mb-10 md:mb-0">
            <hr class="w-[100px] h-[5px] bg-black mb-5">
            <h2 class="text-[48px] md:text-[70px] font-normal m-0">HEALTHY</h2>
            <h1 class="text-[56px] md:text-[78px] font-extrabold my-2">TASTY FOOD</h1>
            <p class="text-sm md:text-base leading-relaxed text-gray-600">Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex
                sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
            <a href="{{ route('tentangkamifront') }}"
                class="inline-block mt-5 px-20 py-3 bg-black text-white font-bold no-underline">TENTANG KAMI</a>
        </div>
        <div class="absolute right-[-250px] top-[-300px] w-4/6 hidden md:block">
            <img src="{{asset('ASET/img-4-2000x2000.png')}}" alt="Gambar Makanan" class="rounded-lg w-full h-auto">
        </div>
    </div>
    <div class="text-center bg-white py-16 px-4 sm:px-8 md:py-24 md:px-16">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold mb-4 sm:mb-5">TENTANG KAMI</h2>
        <p
            class="max-w-[90%] sm:max-w-[600px] md:max-w-[700px] mx-auto text-sm sm:text-base leading-relaxed text-gray-800">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam
            convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit
            amet viverra ante.
        </p>
        <hr class="w-12 sm:w-[60px] h-[3px] bg-black mt-6 sm:mt-8 mx-auto">
    </div>
    <!-- Menu Section -->
    <div class="bg-cover bg-center py-20 md:py-32" style="background-image: url('{{ asset('ASET/Group 70.png') }}');">
        <div class="flex flex-wrap justify-center items-center gap-x-6 gap-y-20 max-w-[1200px] mx-auto">
            <!-- Card 1 -->
            <div
                class="bg-white rounded-[16px] w-[250px] px-6 pt-[100px] pb-5 text-center relative shadow-[0_6px_15px_rgba(0,0,0,0.1)]">
                <img src="{{asset('ASET/img-1.png')}}" alt="Makanan 1"
                    class="w-4/5 h-4/5 object-cover rounded-full absolute -top-28 left-1/2 -translate-x-1/2">
                <h3 class="font-bold font-sans mt-2">LOREM IPSUM</h3>
                <p class="text-sm text-gray-700 mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white rounded-[16px] w-[250px] px-6 pt-[100px] pb-5 text-center relative shadow-[0_6px_15px_rgba(0,0,0,0.1)]">
                <img src="{{asset('ASET/img-2.png')}}" alt="Makanan 2"
                    class="w-4/5 h-4/5 object-cover rounded-full absolute -top-28 left-1/2 -translate-x-1/2">
                <h3 class="font-bold font-sans mt-2">LOREM IPSUM</h3>
                <p class="text-sm text-gray-700 mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white rounded-[16px] w-[250px] px-6 pt-[100px] pb-5 text-center relative shadow-[0_6px_15px_rgba(0,0,0,0.1)]">
                <img src="{{asset('ASET/img-3.png')}}" alt="Makanan 3"
                    class="w-4/5 h-4/5 object-cover rounded-full absolute -top-28 left-1/2 -translate-x-1/2">
                <h3 class="font-bold font-sans mt-2">LOREM IPSUM</h3>
                <p class="text-sm text-gray-700 mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-white rounded-[16px] w-[250px] px-6 pt-[100px] pb-5 text-center relative shadow-[0_6px_15px_rgba(0,0,0,0.1)]">
                <img src="{{asset('ASET/img-4.png')}}" alt="Makanan 4"
                    class="w-4/5 h-4/5 object-cover rounded-full absolute -top-28 left-1/2 -translate-x-1/2">
                <h3 class="font-bold font-sans mt-2">LOREM IPSUM</h3>
                <p class="text-sm text-gray-700 mt-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.
                </p>
            </div>
        </div>
    </div>
    <div class="py-16 px-6 md:px-16 bg-gray-100">
        <h2 class="text-2xl font-bold text-center mb-10">BERITA KAMI</h2>
        @if ($beritas->count() > 0)
            <div class="flex flex-col lg:flex-row gap-6 flex-wrap">
                <div class="flex-1 lg:w-[60%] bg-white rounded-xl overflow-hidden shadow-md">
                    <img src="{{ asset('storage/' . $beritas[0]->gambar) }}" alt="Berita Utama"
                        class="w-full h-[300px] object-cover">
                    <div class="p-5">
                        <h3 class="text-lg font-bold mb-3">{{ $beritas[0]->judul }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($beritas[0]->isi, 300) }}
                        </p>
                        <a href="{{ route('beritakami.show', $beritas[0]->id) }}"
                            class="text-orange-400 font-semibold text-sm">Baca selengkapnya</a>
                    </div>
                </div>
                <div class="flex-1 lg:w-[35%] grid grid-cols-2 gap-4">
                    @foreach ($beritas->skip(1)->take(6) as $berita)
                        <div class="bg-white rounded-xl overflow-hidden shadow-md flex flex-col">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Berita"
                                class="w-full h-[120px] object-cover">
                            <div class="p-4 flex flex-col flex-grow">
                                <h4 class="text-base font-bold mb-2">{{ $berita->judul }}</h4>
                                <p class="text-sm text-gray-600 flex-grow">
                                    {{ \Illuminate\Support\Str::limit($berita->isi, 100) }}
                                </p>
                                <a href="{{ route('beritakami.show', $berita->id) }}"
                                    class="text-orange-400 text-sm font-semibold mt-3">Baca selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p class="text-center">Belum ada berita tersedia.</p>
        @endif
    </div>

    <section class="py-16 px-5 text-center">
        <h2 class="text-2xl font-bold mb-8">GALERI KAMI</h2>
        <div id="galeri-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 max-w-[1200px] mx-auto">
            @foreach($grid_galeris as $index => $galeri)
                <div
                    class="overflow-hidden rounded-2xl shadow-md transition-transform duration-300 {{ $index >= 6 ? 'hidden' : '' }}">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Galeri Gambar"
                        class="w-full h-[250px] object-cover rounded-2xl">
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            <button id="lihat-lebih-btn" class="bg-black text-white px-7 py-3 font-bold hover:bg-gray-800">LIHAT LEBIH
                BANYAK</button>
        </div>
        <script>
            document.getElementById('lihat-lebih-btn').addEventListener('click', function () {
                const hiddenItems = document.querySelectorAll('.hidden');
                hiddenItems.forEach(item => item.classList.remove('hidden'));
                this.style.display = 'none';
            });
        </script>
    </section>

    @include('front-end.layout.footer')
    <script>
        const toggleBtn = document.getElementById("navbar-toggle");
        const menu = document.getElementById("navbar-menu");

        let menuOpen = false;

        toggleBtn.addEventListener("click", () => {
            menuOpen = !menuOpen;

            if (menuOpen) {
                menu.classList.remove("scale-y-0");
                menu.classList.add("scale-y-100");
            } else {
                menu.classList.remove("scale-y-100");
                menu.classList.add("scale-y-0");
            }

            toggleBtn.textContent = menuOpen ? "✕" : "☰";
        });

        // Close menu after clicking link
        document.querySelectorAll("#navbar-menu a").forEach(link => {
            link.addEventListener("click", () => {
                if (window.innerWidth < 768) {
                    menu.classList.remove("scale-y-100");
                    menu.classList.add("scale-y-0");
                    toggleBtn.textContent = "☰";
                    menuOpen = false;
                }
            });
        });
    </script>


</body>

</html>