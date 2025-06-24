<!-- Tailwind Config -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                keyframes: {
                    slideIn: {
                        '0%': { transform: 'translateX(100%)' },
                        '100%': { transform: 'translateX(0)' }
                    },
                    slideOut: {
                        '0%': { transform: 'translateX(0)' },
                        '100%': { transform: 'translateX(100%)' }
                    }
                },
                animation: {
                    slideIn: 'slideIn 0.3s ease-out forwards',
                    slideOut: 'slideOut 0.3s ease-in forwards'
                }
            }
        }
    }
</script>

<style type="text/tailwindcss">
    @layer utilities {
        .mobile-toggle {
            @apply block text-white text-3xl cursor-pointer md:hidden;
        }

        .mobile-nav {
            @apply fixed top-0 right-0 w-3/4 h-full bg-black text-white p-6 z-50 flex flex-col gap-6 text-lg;
        }

        .mobile-nav a {
            @apply font-semibold uppercase hover:text-yellow-400;
        }
    }
</style>

<!-- Navbar -->
<nav class="w-full flex items-center justify-between px-10 py-5 absolute top-0 left-0 z-40 text-white">
    <div class="text-2xl font-extrabold tracking-wide">
        TASTY FOOD
    </div>

    <!-- Desktop Nav -->
    <ul class="hidden md:flex gap-8 text-sm font-semibold uppercase">
        <li><a href="{{ url('/home-kami') }}" class="hover:text-yellow-400">Home</a></li>
        <li><a href="{{ url('/tentang-kami') }}" class="hover:text-yellow-400">Tentang</a></li>
        <li><a href="{{ url('/berita-kami') }}" class="hover:text-yellow-400">Berita</a></li>
        <li><a href="{{ url('/galeri-kami') }}" class="hover:text-yellow-400">Galeri</a></li>
        <li><a href="{{ url('/kontak-kami') }}" class="hover:text-yellow-400">Kontak</a></li>
    </ul>

    <!-- Hamburger -->
    <div class="mobile-toggle" id="hamburgerBtn">
        &#9776;
    </div>
</nav>

<!-- Mobile Nav -->
<div id="mobileNav" class="hidden"></div>

<!-- Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const btn = document.getElementById('hamburgerBtn');
        const mobileNav = document.getElementById('mobileNav');

        let isOpen = false;

        const navContent = `
            <div class="mobile-nav animate-slideIn" id="navPanel">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xl font-bold">MENU</span>
                    <button id="closeBtn" class="text-3xl">&times;</button>
                </div>
                <a href="{{ url('/home-kami') }}">Home</a>
                <a href="{{ url('/tentang-kami') }}">Tentang</a>
                <a href="{{ url('/berita-kami') }}">Berita</a>
                <a href="{{ url('/galeri-kami') }}">Galeri</a>
                <a href="{{ url('/kontak-kami') }}">Kontak</a>
            </div>
        `;

        function openMenu() {
            mobileNav.innerHTML = navContent;
            mobileNav.classList.remove('hidden');
            btn.innerHTML = '&times;';
            isOpen = true;

            // Close when clicking X or menu item
            document.getElementById('closeBtn').addEventListener('click', closeMenu);
            document.querySelectorAll('#navPanel a').forEach(link => {
                link.addEventListener('click', closeMenu);
            });
        }

        function closeMenu() {
            const panel = document.getElementById('navPanel');
            panel.classList.remove('animate-slideIn');
            panel.classList.add('animate-slideOut');

            setTimeout(() => {
                mobileNav.classList.add('hidden');
                mobileNav.innerHTML = '';
                btn.innerHTML = '&#9776;';
                isOpen = false;
            }, 300); // match animation duration
        }

        btn.addEventListener('click', () => {
            if (isOpen) {
                closeMenu();
            } else {
                openMenu();
            }
        });
    });
</script>