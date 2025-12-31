<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk atau Daftar - Klinik Sehat</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Fira+Code:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .font-code {
            font-family: 'Fira Code', monospace;
        }
    </style>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        /* Animation Classes */
        .container-auth.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .container-auth.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        .container-auth.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .container-auth.right-panel-active .overlay {
            transform: translateX(50%);
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen p-4">

    <!-- Background Image with Blur -->
    <div class="fixed inset-0 -z-10">
        <!-- Gambar Latar (Rumah Sakit / Medis) -->
        <img src="{{ asset('img/login2.avif') }}" alt="Background Rumah Sakit"
            class="w-full h-full object-cover filter blur-sm scale-105 brightness-75">
        <!-- Overlay Gradient Tipis -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 to-teal-900/40"></div>
    </div>

    <!-- Wrapper Alpine Data -->
    <div x-data="{
        isSignUp: {{ request()->has('register') || $errors->has('name') ? 'true' : 'false' }}
    }"
        class="relative bg-white rounded-2xl shadow-2xl overflow-hidden w-full max-w-4xl min-h-[600px] container-auth"
        :class="{ 'right-panel-active': isSignUp }">

        <!-- ===== FORM REGISTER (SIGN UP) ===== -->
        <div
            class="absolute top-0 left-0 h-full w-1/2 opacity-0 z-[1] transition-all duration-500 ease-in-out sign-up-container bg-white">
            <form action="{{ route('register') }}" method="POST"
                class="flex flex-col justify-center items-center h-full px-10 text-center">
                @csrf
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Buat Akun Baru</h1>



                <span class="text-xs text-gray-500 mb-4">Gunakan email untuk pendaftaran</span>

                <!-- Input Fields -->
                <div class="w-full space-y-3">
                    <div class="relative">
                        <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}"
                            class="w-full bg-gray-100 border-none px-4 py-3 rounded-lg text-sm focus:ring-2 focus:ring-blue-400 outline-none" />
                        @error('name')
                            <span class="text-red-500 text-xs text-left block mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                            class="w-full bg-gray-100 border-none px-4 py-3 rounded-lg text-sm focus:ring-2 focus:ring-blue-400 outline-none" />
                        @error('email')
                            <span class="text-red-500 text-xs text-left block mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Register -->
                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password" placeholder="Password"
                            class="w-full bg-gray-100 border-none px-4 py-3 rounded-lg text-sm focus:ring-2 focus:ring-blue-400 outline-none pr-10" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <!-- Icon Eye Off (Show) -->
                            <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <!-- Icon Eye (Hide) -->
                            <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        @error('password')
                            <span class="text-red-500 text-xs text-left block mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password Register -->
                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password_confirmation"
                            placeholder="Konfirmasi Password"
                            class="w-full bg-gray-100 border-none px-4 py-3 rounded-lg text-sm focus:ring-2 focus:ring-blue-400 outline-none pr-10" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="mt-6 bg-gradient-to-r from-blue-600 to-teal-500 text-white font-bold py-3 px-12 rounded-full uppercase text-xs tracking-wider transform transition hover:scale-105 hover:shadow-lg focus:outline-none">
                    Daftar Sekarang
                </button>

                <div class="text-center">
                    <p class="text-xm text-gray-500 mt-3 mb-2 sentence tracking-wide ">Atau</p>

                    <a href="{{ route('login.google') }}"
                        class="group w-full flex items-center justify-center gap-3 bg-white border border-gray-300 rounded-lg px-6 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 shadow-sm hover:shadow-md transition-all duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                        <!-- Google SVG Icon (Lebih tajam daripada FontAwesome) -->
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335" />
                        </svg>
                        <span>Lanjutkan dengan Google</span>
                    </a>
                </div>

                <!-- Baris 1: Developed By -->
                <div class="flex items-center space-x-2 text-sm group cursor-default select-none mt-4">
                    <i class="fa-solid fa-terminal text-blue-500 group-hover:text-blue-600 transition-colors"></i>
                    <span class="font-medium text-gray-500">Developed by</span>
                    <!-- Badge Nama Biru -->
                    <span
                        class="text-white font-bold bg-blue-600 px-3 py-1 rounded shadow-sm hover:bg-blue-700 transition-colors text-xs tracking-wider transform hover:scale-105 duration-200">
                        Bang Leon
                    </span>
                </div>

            </form>


        </div>

        <!-- ===== FORM LOGIN (SIGN IN) ===== -->
        <div
            class="absolute top-0 left-0 h-full w-1/2 z-[2] transition-all duration-500 ease-in-out sign-in-container bg-white">
            <form action="{{ route('login') }}" method="POST"
                class="flex flex-col justify-center items-center h-full px-10 text-center">
                @csrf
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang</h1>


                <span class="text-xs text-gray-500 mb-4">Login akun anda</span>

                <div class="w-full space-y-3">
                    <div class="relative">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                            class="w-full bg-gray-100 border-none px-4 py-3 rounded-lg text-sm focus:ring-2 focus:ring-blue-400 outline-none" />
                        @error('email')
                            <span class="text-red-500 text-xs text-left block mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Login -->
                    <div class="relative" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" name="password" placeholder="Password"
                            class="w-full bg-gray-100 border-none px-4 py-3 rounded-lg text-sm focus:ring-2 focus:ring-blue-400 outline-none pr-10" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                            <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        @error('password')
                            <span class="text-red-500 text-xs text-left block mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <a href="{{ route('password.request') }}"
                    class="text-xs text-gray-600 mt-4 hover:text-blue-600 transition">Lupa Password?</a>

                <button type="submit"
                    class="mt-6 bg-gradient-to-r from-blue-600 to-teal-500 text-white font-bold py-3 px-12 rounded-full uppercase text-xs tracking-wider transform transition hover:scale-105 hover:shadow-lg focus:outline-none">
                    Masuk
                </button>

                <div class="text-center">
                    <p class="text-xm text-gray-500 mt-3 mb-2 sentence tracking-wide ">Atau</p>

                    <a href="{{ route('login.google') }}"
                        class="group w-full flex items-center justify-center gap-3 bg-white border border-gray-300 rounded-lg px-6 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 shadow-sm hover:shadow-md transition-all duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                        <!-- Google SVG Icon (Lebih tajam daripada FontAwesome) -->
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                fill="#EA4335" />
                        </svg>
                        <span>Lanjutkan dengan Google</span>
                    </a>
                </div>

                <!-- Baris 1: Developed By -->
                <div class="flex items-center space-x-2 text-sm group cursor-default select-none mt-4">
                    <i class="fa-solid fa-terminal text-blue-500 group-hover:text-blue-600 transition-colors"></i>
                    <span class="font-medium text-gray-500">Developed by</span>
                    <!-- Badge Nama Biru -->
                    <span
                        class="text-white font-bold bg-teal-600 px-3 py-1 rounded shadow-sm hover:bg-blue-700 transition-colors text-xs tracking-wider transform hover:scale-105 duration-200">
                        Bang Leon
                    </span>
                </div>
            </form>
        </div>

        <!-- ===== OVERLAY (ANIMASI GESER) ===== -->
        <div
            class="absolute top-0 left-1/2 w-1/2 h-full overflow-hidden transition-transform duration-500 ease-in-out z-[100] overlay-container">
            <div
                class="bg-gradient-to-r from-blue-800 to-teal-600 text-white relative -left-full h-full w-[200%] transform transition-transform duration-500 ease-in-out overlay">

                <!-- Overlay Left (Untuk tampilan Register Aktif) -->
                <div
                    class="absolute flex flex-col justify-center items-center top-0 flex w-1/2 h-full px-10 text-center transform translate-x-0 transition-transform duration-500 ease-in-out overlay-left">
                    <h1 class="text-3xl font-bold mb-4">Sudah punya akun?</h1>
                    <p class="text-sm font-light mb-8">
                        Silakan masuk kembali untuk mengakses riwayat kesehatan dan jadwal dokter Anda.
                    </p>
                    <button @click="isSignUp = false"
                        class="bg-transparent border border-white text-white font-bold py-3 px-12 rounded-full uppercase text-xs tracking-wider transform transition hover:bg-white hover:text-blue-600 hover:scale-105 focus:outline-none">
                        Masuk Disini
                    </button>

                </div>

                <!-- Overlay Right (Untuk tampilan Login Aktif) -->
                <div
                    class="absolute flex flex-col justify-center items-center top-0 right-0 flex w-1/2 h-full px-10 text-center transform translate-x-0 transition-transform duration-500 ease-in-out overlay-right">
                    <h1 class="text-3xl font-bold mb-4">Halo, Teman Sehat!</h1>
                    <p class="text-sm font-light mb-8">
                        Daftarkan diri Anda sekarang dan mulai perjalanan kesehatan yang lebih baik bersama Klinik
                        Sehat.
                    </p>
                    <button @click="isSignUp = true"
                        class="bg-transparent border border-white text-white font-bold py-3 px-12 rounded-full uppercase text-xs tracking-wider transform transition hover:bg-white hover:text-blue-600 hover:scale-105 focus:outline-none">
                        Daftar Akun
                    </button>
                </div>

            </div>
        </div>

        <!-- Tombol Mobile Toggle (Hanya muncul di layar kecil) -->
        <div class="absolute top-4 right-4 md:hidden z-[110]">
            <button @click="isSignUp = !isSignUp" class="text-gray-500 text-xs underline">
                <span x-text="isSignUp ? 'Sudah punya akun? Login' : 'Belum punya akun? Daftar'"></span>
            </button>
        </div>

    </div>
    {{--
    <!-- Dekorasi Background -->
    <div class="fixed top-0 left-0 w-full h-full -z-10 bg-gray-100">
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-blue-200 opacity-50 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-teal-200 opacity-50 blur-3xl"></div>
    </div> --}}

</body>

</html>
