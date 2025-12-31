@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat  | Home
@endsection

@section('content')
    <!-- ===== Hero Section Start ===== -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Layanan Kesehatan Profesional di Ujung Jari Anda</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Cari dan booking jadwal konsultasi</p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Booking Dokter
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Daftar
                </a>
            </div>
            <div class="hidden shadow-lg shadow-blue-500/50 lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('img/homecare2.png') }}" alt="mockup">
            </div>
        </div>
    </section>

    <section class="bg-blue-50 pt-20 pb-24">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl pb-8 md:text-5xl font-extrabold text-gray-800 leading-tight mb-4">
                Konsultasi dengan dokter spesialis terbaik di RS Prima Sehat dengan mudah dan cepat.
            </h1>


            <!-- Search Bar Utama -->
            <div class="max-w-4xl mx-auto bg-white p-4 rounded-xl shadow-lg flex flex-col md:flex-row items-center gap-4">
                <div class="w-full flex-1">
                    <input type="text" placeholder="Cari nama dokter atau spesialisasi..."
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <button
                    class="w-full md:w-auto bg-blue-600 text-white font-bold px-8 py-3 rounded-lg hover:bg-blue-700 transition duration-300">
                    Cari Sekarang
                </button>
            </div>
        </div>
    </section>
    <!-- ===== Hero Section End ===== -->

    <!-- ===== Layanan Unggulan (Spesialisasi) Start ===== -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Spesialisasi Populer</h2>
                <p class="text-gray-600 mt-2">Temukan dokter dari berbagai bidang spesialisasi.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="flex justify-center items-center mb-4">
                        <!--  -->
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-1a6 6 0 00-5.197-5.92M9 21a6 6 0 01-6-6v-1a6 6 0 016-6h6a6 6 0 016 6v1a6 6 0 01-6 6H9z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Dokter Anak</h3>
                    <p class="text-gray-500 mt-2">Perawatan kesehatan terbaik untuk buah hati Anda.</p>
                </div>
                <!-- Card 2 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="flex justify-center items-center mb-4">
                        <!--  -->
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Dokter Gigi</h3>
                    <p class="text-gray-500 mt-2">Solusi untuk kesehatan gigi dan mulut yang prima.</p>
                </div>
                <!-- Card 3 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="flex justify-center items-center mb-4">
                        <!--  -->
                        <svg class="w-16 h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Dokter Kulit</h3>
                    <p class="text-gray-500 mt-2">Penanganan ahli untuk semua masalah kulit Anda.</p>
                </div>
                <!-- Card 4 -->
                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                    <div class="flex justify-center items-center mb-4">
                        <!--  -->
                        <svg class="w-16 h-16 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Dokter Umum</h3>
                    <p class="text-gray-500 mt-2">Konsultasi awal dan penanganan medis umum.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Layanan Unggulan (Spesialisasi) End ===== -->

    <!-- ===== Cara Kerja (How it Works) Start ===== -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Hanya 3 Langkah Mudah</h2>
                <p class="text-gray-600 mt-2">Booking dokter tidak pernah semudah ini.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Step 1 -->
                <div>
                    <div
                        class="flex items-center justify-center h-20 w-20 mx-auto bg-blue-100 text-blue-600 rounded-full text-3xl font-bold mb-4">
                        1</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Cari Dokter</h3>
                    <p class="text-gray-500">Gunakan fitur pencarian untuk menemukan dokter berdasarkan spesialisasi atau
                        nama.</p>
                </div>
                <!-- Step 2 -->
                <div>
                    <div
                        class="flex items-center justify-center h-20 w-20 mx-auto bg-blue-100 text-blue-600 rounded-full text-3xl font-bold mb-4">
                        2</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pilih Jadwal</h3>
                    <p class="text-gray-500">Lihat jadwal yang tersedia dan pilih waktu konsultasi yang paling sesuai untuk
                        Anda.</p>
                </div>
                <!-- Step 3 -->
                <div>
                    <div
                        class="flex items-center justify-center h-20 w-20 mx-auto bg-blue-100 text-blue-600 rounded-full text-3xl font-bold mb-4">
                        3</div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Buat Janji Temu</h3>
                    <p class="text-gray-500">Isi data diri dan konfirmasi booking Anda. Notifikasi akan dikirimkan kepada
                        Anda.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Cara Kerja (How it Works) End ===== -->

    <!-- ===== Testimoni Pasien Start ===== -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800">Apa Kata Mereka</h2>
                <p class="text-gray-600 mt-2">Pengalaman pasien yang telah menggunakan layanan kami.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-gray-600 italic mb-6">"Aplikasinya sangat membantu! Saya bisa membuat janji dengan
                        dokter spesialis tanpa harus antre lama di rumah sakit. Prosesnya cepat dan mudah."</p>
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://placehold.co/100x100/E2E8F0/4A5568?text=A"
                            alt="Avatar Andini Putri">
                        <div>
                            <p class="font-semibold text-gray-800">Andini Putri</p>
                            <p class="text-sm text-gray-500">Karyawan Swasta</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-gray-600 italic mb-6">"Fitur pencarian dokternya sangat detail. Saya bisa menemukan
                        dokter anak terdekat dengan rating terbaik. Sangat direkomendasikan!"</p>
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://placehold.co/100x100/E2E8F0/4A5568?text=B"
                            alt="Avatar Budi Santoso">
                        <div>
                            <p class="font-semibold text-gray-800">Budi Santoso</p>
                            <p class="text-sm text-gray-500">Wirausaha</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <p class="text-gray-600 italic mb-6">"Sistem notifikasi pengingatnya sangat berguna. Saya jadi tidak
                        pernah lupa jadwal kontrol rutin saya. Terima kasih RS Prima Sehat !"</p>
                    <div class="flex items-center">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://placehold.co/100x100/E2E8F0/4A5568?text=C"
                            alt="Avatar Citra Lestari">
                        <div>
                            <p class="font-semibold text-gray-800">Citra Lestari</p>
                            <p class="text-sm text-gray-500">Mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===== Testimoni Pasien End ===== -->
@endsection
