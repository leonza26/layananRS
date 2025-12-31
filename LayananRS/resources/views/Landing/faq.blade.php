@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat | FAQ
@endsection

@section('content')
    <section class="bg-white py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-800 dark:text-blue mb-4">Pertanyaan yang Sering Diajukan (FAQ)</h1>
                <p class="text-lg text-gray-600 dark:text-gray-600">Temukan jawaban atas pertanyaan umum Anda tentang layanan kami.</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="mb-6 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Bagaimana cara membuat janji temu dengan dokter?</h3>
                    <p class="text-gray-700 dark:text-gray-300">Anda dapat membuat janji temu dengan dokter melalui halaman "Booking Dokter". Cukup cari dokter berdasarkan spesialisasi atau nama, pilih jadwal yang tersedia, dan ikuti langkah-langkah untuk konfirmasi janji temu Anda.</p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="mb-6 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Apakah saya bisa memilih dokter spesialis tertentu?</h3>
                    <p class="text-gray-700 dark:text-gray-300">Ya, tentu saja. Sistem kami memungkinkan Anda untuk mencari dan memilih dokter berdasarkan spesialisasi yang Anda butuhkan, serta melihat profil lengkap dokter tersebut sebelum membuat janji temu.</p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="mb-6 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Apakah saya bisa memilih dokter spesialis tertentu?</h3>
                    <p class="text-gray-700 dark:text-gray-300">Ya, tentu saja. Sistem kami memungkinkan Anda untuk mencari dan memilih dokter berdasarkan spesialisasi yang Anda butuhkan, serta melihat profil lengkap dokter tersebut sebelum membuat janji temu.</p>
                </div>

            </div>
        </div>
    </section>
@endsection

