<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GALERI KAMI</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    aspectRatio: {
                        'galeri': '4 / 3',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            @media (max-width: 767px) {
                .hero-mobile-text {
                    @apply text-2xl text-center mt-4 mr-0 bg-black/60 px-6 py-3 rounded;
                }

                .responsive-slider-img {
                    @apply w-full object-cover rounded-xl aspect-[4/3];
                }

                .responsive-grid-img {
                    @apply object-cover w-full aspect-[4/3] rounded-xl;
                }
            }
        }
    </style>
</head>

<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('front-end.layout.navbar')

    {{-- Hero Section --}}
    <div class="relative w-full h-[500px] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('ASET/Group 70.png') }}');">
        <h1 class="text-white font-bold text-[3rem] font-sans px-6 py-3 rounded-lg mt-[50px] mr-[760px] 
                   md:text-[3rem] md:mr-[760px] md:mt-[50px] 
                   hero-mobile-text">
            GALERI KAMI
        </h1>
    </div>

    {{-- Slider --}}
    @if ($galeris->count() > 0)
        <div class="relative overflow-hidden w-full py-10 px-4">
            <div class="relative w-full mx-auto max-w-5xl">
                <div id="slider-container" class="overflow-hidden w-full">
                    <div id="slider-track" class="flex transition-transform duration-500 ease-in-out">
                        @foreach ($galeris as $galeri)
                            <div class="flex-shrink-0 w-full px-4">
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="Slider Gambar"
                                    class="w-full rounded-xl object-cover h-[400px] responsive-slider-img" />
                            </div>
                        @endforeach
                    </div>
                </div>

                @if ($galeris->count() > 1)
                    <!-- Tombol Navigasi -->
                    <button id="prevBtn"
                        class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white shadow-lg rounded-full p-3 text-black hover:bg-gray-100 z-10">
                        &#10094;
                    </button>
                    <button id="nextBtn"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white shadow-lg rounded-full p-3 text-black hover:bg-gray-100 z-10">
                        &#10095;
                    </button>
                @endif
            </div>
        </div>
    @endif

    {{-- Grid Galeri --}}
    @if ($grid_galeris->count() > 0)
        <div class="max-w-7xl mx-auto px-4 pb-16">
            <h2 class="text-2xl font-semibold mb-6 text-center">Semua Galeri</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($grid_galeris as $grid)
                    <div class="overflow-hidden rounded-xl shadow hover:shadow-lg transition duration-300">
                        <img src="{{ asset('storage/' . $grid->gambar) }}" alt="Galeri Gambar"
                            class="w-full h-56 object-cover rounded-xl responsive-grid-img" />
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Footer --}}
    @include('front-end.layout.footer')

    {{-- Script Slider --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const sliderTrack = document.getElementById("slider-track");
            const prevBtn = document.getElementById("prevBtn");
            const nextBtn = document.getElementById("nextBtn");
            const totalSlides = {{ $galeris->count() }};
            let currentIndex = 0;

            function updateSlider() {
                sliderTrack.style.transform = `translateX(-${currentIndex * 100}%)`;
            }

            if (prevBtn && nextBtn) {
                prevBtn.addEventListener("click", function () {
                    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                    updateSlider();
                });

                nextBtn.addEventListener("click", function () {
                    currentIndex = (currentIndex + 1) % totalSlides;
                    updateSlider();
                });
            }
        });
    </script>

</body>

</html>