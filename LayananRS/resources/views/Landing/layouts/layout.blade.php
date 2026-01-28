<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token - Penting untuk keamanan request JS/Ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('landing_page_title', 'RS Prima Sehat')</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS CSS (Animasi) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts: Inter & Fira Code -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Fira+Code:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-code { font-family: 'Fira Code', monospace; }
        [x-cloak] { display: none !important; }

        /* Style untuk tab aktif */
        .tab-active {
            border-bottom-color: #3B82F6;
            color: #3B82F6;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #3b82f6; border-radius: 10px; }
    </style>

    <!-- CSS Tambahan dari Halaman Spesifik -->
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-900">

    <!-- ===== Pesan Notifikasi (Toast Messages) ===== -->
    <div class="fixed top-24 right-4 z-[100] space-y-3 pointer-events-none">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                 class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-2xl flex items-center gap-3 pointer-events-auto transition transform"
                 x-transition:enter="translate-x-20 opacity-0" x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="opacity-0 scale-90">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                 class="bg-red-600 text-white px-6 py-3 rounded-lg shadow-2xl flex items-center gap-3 pointer-events-auto transition transform"
                 x-transition:enter="translate-x-20 opacity-0" x-transition:enter-end="translate-x-0 opacity-100">
                <i class="fas fa-exclamation-triangle"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>

    <!-- ===== Bagian Header & Navigasi Start ===== -->
    <header x-data="{ mobileMenuOpen: false }" class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600 flex items-center gap-2">
                <i class="fas fa-heartbeat"></i>
                <span>RS Prima Sehat</span>
            </a>

            <!-- Menu Navigasi (Desktop) -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="{{ request()->is('/') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600 transition' }}">Home</a>
                <a href="/daftar_dokter" class="{{ request()->is('daftar_dokter*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600 transition' }}">Daftar Dokter</a>
                <a href="/faq" class="{{ request()->is('faq*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600 transition' }}">FAQ</a>
                <a href="/kebijakan_privasi" class="{{ request()->is('kebijakan_privasi*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600 transition' }}">Kebijakan Privasi</a>
                <a href="/kontak_kami" class="{{ request()->is('kontak_kami*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600 transition' }}">Kontak Kami</a>
            </div>

            <!-- Tombol Aksi (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    @if (Auth::user()->role == 0)
                        <a href="{{ url('/admin/dashboard') }}" class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-900 transition shadow-md">Dashboard Admin</a>
                    @elseif (Auth::user()->role == 1)
                        <a href="{{ url('/dokter/dashboard') }}" class="bg-teal-600 text-white px-5 py-2 rounded-lg hover:bg-teal-700 transition shadow-md">Dashboard Dokter</a>
                    @elseif (Auth::user()->role == 2)
                        <a href="{{ url('/pasien/summary') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow-md">Akun Saya</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium transition">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow-md font-semibold">Daftar</a>
                @endauth
            </div>

            <!-- Tombol Hamburger (Mobile) -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 focus:outline-none">
                    <i class="fa-solid fa-bars text-2xl" x-show="!mobileMenuOpen"></i>
                    <i class="fa-solid fa-xmark text-2xl" x-show="mobileMenuOpen" x-cloak></i>
                </button>
            </div>
        </nav>

        <!-- Menu Mobile -->
        <div x-show="mobileMenuOpen" x-transition x-cloak class="md:hidden bg-white px-6 pb-6 border-t shadow-lg">
            <div class="flex flex-col space-y-4 pt-4">
                <a href="/" class="py-2 text-gray-600 border-b border-gray-50">Home</a>
                <a href="/daftar_dokter" class="py-2 text-gray-600 border-b border-gray-50">Daftar Dokter</a>
                <a href="/faq" class="py-2 text-gray-600 border-b border-gray-50">FAQ</a>
                <a href="/kebijakan_privasi" class="py-2 text-gray-600 border-b border-gray-50">Kebijakan Privasi</a>
                <a href="/kontak_kami" class="py-2 text-gray-600 border-b border-gray-50">Kontak Kami</a>

                @auth
                    <a href="{{ Auth::user()->role == 0 ? '/admin/dashboard' : (Auth::user()->role == 1 ? '/dokter/dashboard' : '/pasien/summary') }}"
                       class="bg-blue-600 text-white text-center py-2 rounded-lg font-bold">Dashboard</a>
                @else
                    <div class="grid grid-cols-2 gap-4 pt-2">
                        <a href="{{ route('login') }}" class="text-center py-2 text-gray-600 border border-gray-200 rounded-lg font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white text-center py-2 rounded-lg font-bold">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <main class="min-h-[70vh]">
        @yield('content')
    </main>

    <!-- ===== Footer Start ===== -->
    <footer class="bg-gray-800 text-white pt-16 pb-8">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
                <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <i class="fas fa-heartbeat text-blue-400"></i>
                    <span>RS Prima Sehat</span>
                </h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    Kami berkomitmen untuk memberikan akses layanan kesehatan yang mudah, cepat, dan terpercaya bagi seluruh masyarakat dengan dukungan teknologi terkini.
                </p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4 text-blue-300">Navigasi</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('daftar.dokter') }}" class="hover:text-white transition">Daftar Dokter</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition">Login Pasien</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition">Pendaftaran Baru</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4 text-blue-300">Dukungan</h3>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('faq') }}" class="hover:text-white transition">FAQ</a></li>
                    <li><a href="{{ route('kontak.kami') }}" class="hover:text-white transition">Kontak Kami</a></li>
                    <li><a href="{{ route('kebijakan.privasi') }}" class="hover:text-white transition">Kebijakan Privasi</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4 text-blue-300">Hubungi Kami</h3>
                <p class="text-gray-400 text-sm"><i class="fas fa-map-marker-alt mr-2 text-blue-400"></i> Jl. Kesehatan No. 123, Jakarta Selatan</p>
                <p class="text-gray-400 text-sm mt-3"><i class="fas fa-envelope mr-2 text-blue-400"></i> support@primasehat.com</p>
                <p class="text-gray-400 text-sm mt-3"><i class="fas fa-phone mr-2 text-blue-400"></i> (021) 1234-5678</p>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-gray-700">
            <div class="container mx-auto px-6 flex flex-col items-center justify-center space-y-6">

                <!-- Baris 1: Developed By -->
                <div class="flex items-center space-x-2 text-sm group cursor-default select-none">
                    <i class="fa-solid fa-terminal text-blue-400"></i>
                    <span class="font-medium text-gray-400">Developed by</span>
                    <span class="text-gray-800 font-bold bg-white px-3 py-1 rounded shadow-sm transition-transform text-xs tracking-wider transform hover:scale-105 duration-200">
                        Bang Leon
                    </span>
                </div>

                <!-- Baris 2: Tech Stack Icons -->
                <div class="flex items-center gap-6 text-xs font-medium text-gray-400">
                    <div class="flex items-center gap-2 group hover:text-white transition-colors" title="Laravel Framework">
                        <i class="fa-brands fa-laravel text-xl text-red-500 group-hover:scale-110 transition-transform"></i>
                        <span>Laravel 12</span>
                    </div>
                    <span class="text-gray-600">|</span>
                    <div class="flex items-center gap-2 group hover:text-white transition-colors" title="Tailwind CSS">
                        <i class="fa-brands fa-css3 text-lg text-blue-400"></i>
                        <span>Tailwind</span>
                    </div>
                    <span class="text-gray-600">|</span>
                    <div class="flex items-center gap-2 group hover:text-white transition-colors" title="Alpine.js">
                        <svg class="w-5 h-5 text-teal-400 group-hover:scale-110 transition-transform" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21.5758 6.17969L13.8885 18.257L11.5977 14.6593L19.2849 6.17969H21.5758ZM7.92523 18.257L13.316 9.77335L15.6069 13.371L10.2161 18.257H7.92523ZM7.35242 6.17969L11.0251 11.9566L5.63436 18.257H2.19629L7.35242 6.17969Z" />
                        </svg>
                        <span>Alpine.js</span>
                    </div>
                </div>

                <!-- Baris 3: Copyright -->
                <div class="text-[11px] text-gray-500 uppercase tracking-widest opacity-80">
                    &copy; {{ date('Y') }} RS Prima Sehat. All Rights Reserved
                </div>
            </div>
        </div>
    </footer>
    <!-- ===== Footer End ===== -->

    <!-- AOS JS (Animasi On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi AOS
            AOS.init({
                once: true,
                duration: 1000,
                offset: 50,
                easing: 'ease-in-out'
            });

            // Script untuk navigasi tab (Hanya jalan di halaman yang ada elemen tab-nya)
            const tabUpcoming = document.getElementById('tab-upcoming');
            const tabCompleted = document.getElementById('tab-completed');
            const contentUpcoming = document.getElementById('content-upcoming');
            const contentCompleted = document.getElementById('content-completed');

            if (tabUpcoming && tabCompleted) {
                tabUpcoming.addEventListener('click', () => {
                    contentUpcoming?.classList.remove('hidden');
                    contentCompleted?.classList.add('hidden');
                    tabUpcoming.classList.add('tab-active');
                    tabUpcoming.classList.remove('text-gray-500', 'hover:text-gray-700');
                    tabCompleted.classList.remove('tab-active');
                    tabCompleted.classList.add('text-gray-500', 'hover:text-gray-700');
                });

                tabCompleted.addEventListener('click', () => {
                    contentCompleted?.classList.remove('hidden');
                    contentUpcoming?.classList.add('hidden');
                    tabCompleted.classList.add('tab-active');
                    tabCompleted.classList.remove('text-gray-500', 'hover:text-gray-700');
                    tabUpcoming.classList.remove('tab-active');
                    tabUpcoming.classList.add('text-gray-500', 'hover:text-gray-700');
                });
            }
        });
    </script>

    <!-- JS Tambahan dari Halaman Spesifik -->
    @stack('scripts')
</body>

</html>
