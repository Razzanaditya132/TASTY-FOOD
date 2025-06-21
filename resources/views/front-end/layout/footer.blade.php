<footer class="bg-black text-white py-12 px-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10 text-sm">

        {{-- Kolom 1 - Brand --}}
        <div>
            <h2 class="text-2xl font-extrabold mb-4">Tasty Food</h2>
            <p class="text-gray-400 leading-relaxed mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.
            </p>
            <div class="flex space-x-4">
                <a href="#" class="transform hover:scale-110 transition duration-300 ease-in-out">
                    <img src="{{ asset('ASET/001-facebook@2x.png') }}" alt="Facebook" class="w-10 h-10 rounded-full">
                </a>
                <a href="#" class="transform hover:scale-110 transition duration-300 ease-in-out">
                    <img src="{{ asset('ASET/002-twitter@2x.png') }}" alt="Twitter" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </div>

        {{-- Kolom 2 - Useful Links --}}
        <div>
            <h3 class="text-lg font-semibold mb-4">Useful links</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-yellow-400">Blog</a></li>
                <li><a href="#" class="hover:text-yellow-400">Hewan</a></li>
                <li><a href="#" class="hover:text-yellow-400">Galeri</a></li>
                <li><a href="#" class="hover:text-yellow-400">Testimonial</a></li>
            </ul>
        </div>

        {{-- Kolom 3 - Privacy --}}
        <div>
            <h3 class="text-lg font-semibold mb-4">Privacy</h3>
            <ul class="space-y-2">
                <li><a href="#" class="hover:text-yellow-400">Karir</a></li>
                <li><a href="#" class="hover:text-yellow-400">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-yellow-400">Kontak Kami</a></li>
                <li><a href="#" class="hover:text-yellow-400">Servis</a></li>
            </ul>
        </div>

        {{-- Kolom 4 - Contact Info --}}
        <div>
            <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
            <ul class="space-y-4 text-sm">
                <li class="flex items-center space-x-3">
                    <img src="{{ asset('ASET/Group 66@2x.png') }}" alt="email" class="w-10 h-10">
                    <span>tastyfood@gmail.com</span>
                </li>
                <li class="flex items-center space-x-3">
                    <img src="{{ asset('ASET/Group 67@2x.png') }}" alt="phone" class="w-10 h-10">
                    <span>+62 812 3456 7890</span>
                </li>
                <li class="flex items-center space-x-3">
                    <img src="{{ asset('ASET/Group 68@2x.png') }}" alt="locotion" class="w-10 h-10">
                    <span>Kota Bandung, Jawa Barat</span>