@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat | Home
@endsection

@push('styles')
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Custom smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        .hero-gradient {
            background: radial-gradient(circle at top right, rgba(59, 130, 246, 0.1), transparent),
                radial-gradient(circle at bottom left, rgba(20, 184, 166, 0.05), transparent);
        }

        /* Mencegah elemen hilang jika JS lambat dimuat */
        [data-aos] {
            pointer-events: none;
        }

        .aos-animate {
            pointer-events: auto;
        }
    </style>
@endpush

@section('content')
    <div class="hero-gradient overflow-hidden">
        <!-- ===== Hero Section Start ===== -->
        <section class="relative pt-10 pb-20 lg:pt-20 lg:pb-32">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <!-- Animasi dari Kiri ke Kanan (fade-right) -->
                    <div class="lg:col-span-7" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <span
                            class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-600 text-xs font-bold uppercase tracking-wider mb-6">
                            Terpercaya & Profesional
                        </span>
                        <h1 class="text-4xl md:text-5xl xl:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                            Layanan Kesehatan <span class="text-blue-600">Profesional</span> di Ujung Jari Anda
                        </h1>
                        <p class="text-lg text-gray-600 mb-8 max-w-xl leading-relaxed">
                            Cari dan booking jadwal konsultasi dengan dokter spesialis terbaik di RS Prima Sehat tanpa harus
                            mengantre lama. Solusi cerdas untuk kesehatan Anda.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('daftar.dokter') }}"
                                class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1">
                                Booking Dokter
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all">
                                Daftar Akun
                            </a>
                        </div>
                    </div>
                    <!-- Animasi dari Kanan ke Kiri (fade-left) -->
                    <div class="lg:col-span-5 relative" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                        <div
                            class="relative z-10 rounded-3xl overflow-hidden shadow-2xl transform lg:rotate-3 hover:rotate-0 transition-transform duration-500">
                            <img src="{{ asset('img/homecare2.png') }}" alt="Medical Care" class="w-full h-auto">
                        </div>
                        <!-- Dekorasi Background -->
                        <div class="absolute -bottom-6 -right-6 w-64 h-64 bg-blue-400/10 rounded-full blur-3xl -z-10"></div>
                        <div class="absolute -top-6 -left-6 w-48 h-48 bg-teal-400/10 rounded-full blur-2xl -z-10"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== Search Bar Utama ===== -->
        <section class="relative z-20 -mt-12" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="50">
            <div class="container mx-auto px-6">
                <div class="bg-white p-2 rounded-2xl shadow-xl border border-gray-100 max-w-5xl mx-auto">
                    <form action="{{ route('daftar.dokter') }}" method="GET"
                        class="flex flex-col md:flex-row items-center gap-2">
                        <div class="flex-1 w-full relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" placeholder="Cari nama dokter atau spesialisasi..."
                                class="w-full pl-12 pr-4 py-4 bg-transparent border-none focus:ring-0 text-gray-700"
                                required>
                        </div>
                        <button type="submit"
                            class="w-full md:w-auto bg-blue-600 text-white font-bold px-10 py-4 rounded-xl hover:bg-blue-700 transition duration-300">
                            Cari Jadwal
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- ===== Spesialisasi Populer Start ===== -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-2xl mx-auto mb-16" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Spesialisasi Populer</h2>
                <p class="text-gray-600">Kami menyediakan berbagai layanan medis terbaik dengan dukungan teknologi modern
                    dan dokter ahli di bidangnya.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $specialties = [
                        [
                            'name' => 'Dokter Anak',
                            'desc' => 'Perawatan kesehatan terbaik untuk buah hati Anda.',
                            'icon' =>
                                'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-5.197-5.92M9 21a6 6 0 01-6-6v-1a6 6 0 016-6h6a6 6 0 016 6v1a6 6 0 01-6 6H9z',
                            'color' => 'blue',
                        ],
                        [
                            'name' => 'Dokter Gigi',
                            'desc' => 'Solusi untuk kesehatan gigi dan mulut yang prima.',
                            'icon' =>
                                'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                            'color' => 'teal',
                        ],
                        [
                            'name' => 'Dokter Kulit',
                            'desc' => 'Penanganan ahli untuk semua masalah kulit Anda.',
                            'icon' =>
                                'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1',
                            'color' => 'indigo',
                        ],
                        [
                            'name' => 'Dokter Umum',
                            'desc' => 'Konsultasi awal dan penanganan medis umum.',
                            'icon' =>
                                'M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z',
                            'color' => 'cyan',
                        ],
                    ];
                @endphp

                @foreach ($specialties as $index => $s)
                    <div class="group bg-gray-50 p-8 rounded-2xl transition-all duration-300 hover:bg-white hover:shadow-xl hover:-translate-y-2"
                        data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="{{ $index * 150 }}">
                        <div
                            class="w-16 h-16 mx-auto mb-6 bg-white rounded-xl shadow-sm flex items-center justify-center group-hover:bg-{{ $s['color'] }}-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-8 h-8 text-{{ $s['color'] }}-500 group-hover:text-white" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="{{ $s['icon'] }}"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $s['name'] }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $s['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== Cara Kerja Start ===== -->
    <section class="py-24 bg-blue-50 relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">3 Langkah Mudah Booking</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="text-center" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000">
                    <div class="relative mb-8 inline-block">
                        <div
                            class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-3xl font-black text-blue-600 shadow-lg z-10 relative">
                            1</div>
                        <div class="absolute -top-2 -right-2 w-24 h-24 bg-blue-200 rounded-full blur-xl opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Cari Dokter</h3>
                    <p class="text-gray-600 px-4">Gunakan fitur pencarian cerdas kami untuk menemukan spesialis yang Anda
                        butuhkan.</p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                    <div class="relative mb-8 inline-block">
                        <div
                            class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-3xl font-black text-blue-600 shadow-lg z-10 relative">
                            2</div>
                        <div class="absolute -top-2 -right-2 w-24 h-24 bg-teal-200 rounded-full blur-xl opacity-50"></div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pilih Jadwal</h3>
                    <p class="text-gray-600 px-4">Tentukan hari dan jam konsultasi yang paling fleksibel bagi agenda harian
                        Anda.</p>
                </div>

                <div class="text-center" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
                    <div class="relative mb-8 inline-block">
                        <div
                            class="w-24 h-24 bg-white rounded-full flex items-center justify-center text-3xl font-black text-blue-600 shadow-lg z-10 relative">
                            3</div>
                        <div class="absolute -top-2 -right-2 w-24 h-24 bg-indigo-200 rounded-full blur-xl opacity-50">
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Buat Janji</h3>
                    <p class="text-gray-600 px-4">Konfirmasi data dan lakukan pembayaran online. Anda akan menerima
                        notifikasi instan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Testimoni Start ===== -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6" data-aos="fade-up">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Apa Kata Mereka</h2>
                    <p class="text-gray-600">Lebih dari 10.000+ pasien telah mempercayakan kesehatan mereka kepada tim
                        dokter spesialis kami.</p>
                </div>
                <div class="flex gap-2">
                    <div class="flex -space-x-3 overflow-hidden">
                        <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white"
                            src="https://placehold.co/100?text=1" alt="">
                        <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white"
                            src="https://placehold.co/100?text=2" alt="">
                        <img class="inline-block h-12 w-12 rounded-full ring-2 ring-white"
                            src="https://placehold.co/100?text=3" alt="">
                        <div
                            class="flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 ring-2 ring-white text-xs font-bold text-gray-600">
                            +2k</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $testis = [
                        [
                            'name' => 'Andini Putri',
                            'role' => 'Ibu Rumah Tangga',
                            'msg' =>
                                'Sangat membantu! Saya tidak perlu antre dari subuh lagi. Fitur booking jadwalnya sangat akurat.',
                            'delay' => 100,
                        ],
                        [
                            'name' => 'Budi Santoso',
                            'role' => 'Wirausaha',
                            'msg' =>
                                'Dokter-dokternya sangat ramah dan profesional. Penjelasan diagnosisnya mudah dipahami.',
                            'delay' => 200,
                        ],
                        [
                            'name' => 'Citra Lestari',
                            'role' => 'Mahasiswa',
                            'msg' =>
                                'Aplikasi yang user-friendly. Pembayarannya lewat Midtrans jadi sangat praktis dan aman.',
                            'delay' => 300,
                        ],
                    ];
                @endphp

                @foreach ($testis as $t)
                    <div class="bg-gray-50 p-8 rounded-2xl border border-transparent hover:border-blue-100 hover:bg-white hover:shadow-xl transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $t['delay'] }}" data-aos-duration="1000">
                        <div class="flex text-yellow-400 mb-4">
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-gray-700 italic mb-8 leading-relaxed">"{{ $t['msg'] }}"</p>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600">
                                {{ substr($t['name'], 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $t['name'] }}</h4>
                                <p class="text-xs text-gray-500">{{ $t['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi AOS dengan pengaturan yang lebih terlihat
            AOS.init({
                once: false, // Animasi akan berjalan kembali jika di-scroll ulang ke atas
                mirror: true, // Elemen akan beranimasi keluar saat melewati viewport
                duration: 1000, // Durasi standar 1 detik
                offset: 100, // Trigger animasi sedikit lebih awal (100px)
                easing: 'ease-out-back', // Efek gerakan yang lebih dinamis
            });
        });
    </script>
@endpush
