<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('landing_page_title')</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* Menggunakan font Inter sebagai default */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Style untuk tab aktif */
        .tab-active {
            border-bottom-color: #3B82F6;
            color: #3B82F6;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- ===== Bagian Header & Navigasi Start ===== -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="#" class="text-2xl font-bold text-blue-600">Klinik Sehat</a>

            <!-- Menu Navigasi (Desktop) -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/"
                    class="{{ request()->is('/') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }}">Home</a>
                <a href="/daftar_dokter"
                    class="{{ request()->is('daftar_dokter*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }}">Daftar
                    Dokter</a>
                {{-- <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }}">Riwayat</a> --}}


            </div>

            <!-- Tombol Aksi (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role === 0)
                            <a href="{{ url('/admin/dashboard') }}" class="block w-full text-center mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg">Dashboard Admin</a>
                        @elseif (Auth::user()->role === 1)
                            <a href="{{ url('/dokter/dashboard') }}" class="block w-full text-center mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg">Dashboard Dokter</a>
                        @elseif (Auth::user()->role === 2)
                            <a href="{{ url('/pasien/dashboard') }}" class="block w-full text-center mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg">Akun Saya</a>
                        @endif
                    @else
                        {{-- Jika belum login, tampilkan link Login dan Register --}}
                        <a href="{{ route('login') }}" class="block py-2 text-gray-600">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block w-full text-center mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg">Daftar</a>
                        @endif

                    @endauth

                @endif
                {{-- <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">Daftar</a> --}}
            </div>

            <!-- Tombol Hamburger (Mobile) -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <!-- Menu Mobile (Tersembunyi secara default) -->
        <div id="mobile-menu" class="hidden md:hidden bg-white px-6 pb-4">
            <a href="#" class="block py-2 text-gray-700 font-semibold">Home</a>
            <a href="#" class="block py-2 text-gray-600">Daftar Dokter</a>
            <a href="#" class="block py-2 text-gray-600">Riwayat</a>

            <div class="mt-4 border-t pt-4">
                <a href="#" class="block py-2 text-gray-600">Login</a>
                <a href="#"
                    class="block w-full text-center mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg">Daftar</a>
            </div>
        </div>
    </header>
    <!-- ===== Bagian Header & Navigasi End ===== -->

    <main>
        {{-- konten templating --}}
        @yield('content')
    </main>

    <!-- ===== Footer Start ===== -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Kolom 1: Tentang -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Klinik Sehat</h3>
                    <p class="text-gray-400">Kami berkomitmen untuk memberikan akses layanan kesehatan yang mudah,
                        cepat, dan terpercaya bagi seluruh masyarakat.</p>
                </div>
                <!-- Kolom 2: Navigasi -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Daftar Dokter</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Login</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Daftar</a></li>
                    </ul>
                </div>
                <!-- Kolom 3: Dukungan -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Dukungan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Kontak Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <!-- Kolom 4: Kontak -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Hubungi Kami</h3>
                    <p class="text-gray-400">Jl. Kesehatan No. 123<br>Jakarta, Indonesia</p>
                    <p class="text-gray-400 mt-2">Email: support@kliniksehat.com</p>
                </div>
            </div>
            <div class="mt-10 border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
                &copy; 2025 Klinik Sehat. Semua Hak Cipta Dilindungi.
            </div>
        </div>
    </footer>
    <!-- ===== Footer End ===== -->

    <!-- JavaScript untuk menu mobile -->
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.getElementById('mobile-menu-button')?.addEventListener('click', () => {
            document.getElementById('mobile-menu')?.classList.toggle('hidden');
        });

        // Script untuk filter mobile
        const filterToggleButton = document.getElementById('filter-toggle-button');
        const filterSidebar = document.getElementById('filter-sidebar');
        filterToggleButton.addEventListener('click', () => {
            filterSidebar.classList.toggle('hidden');
        });

        // Script untuk navigasi tab
        const tabUpcoming = document.getElementById('tab-upcoming');
        const tabCompleted = document.getElementById('tab-completed');
        const contentUpcoming = document.getElementById('content-upcoming');
        const contentCompleted = document.getElementById('content-completed');

        tabUpcoming.addEventListener('click', () => {
            // Tampilkan konten 'Akan Datang', sembunyikan yang lain
            contentUpcoming.classList.remove('hidden');
            contentCompleted.classList.add('hidden');

            // Atur style tab aktif
            tabUpcoming.classList.add('tab-active');
            tabUpcoming.classList.remove('text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
            tabCompleted.classList.remove('tab-active');
            tabCompleted.classList.add('text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
        });

        tabCompleted.addEventListener('click', () => {
            // Tampilkan konten 'Selesai', sembunyikan yang lain
            contentCompleted.classList.remove('hidden');
            contentUpcoming.classList.add('hidden');

            // Atur style tab aktif
            tabCompleted.classList.add('tab-active');
            tabCompleted.classList.remove('text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
            tabUpcoming.classList.remove('tab-active');
            tabUpcoming.classList.add('text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
        });
    </script>
</body>

</html>
