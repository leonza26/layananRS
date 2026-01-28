@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat | Halaman Tidak Dijumpai
@endsection

@section('content')
    <section class="min-h-[80vh] flex items-center justify-center bg-white overflow-hidden">
        <div class="container mx-auto px-6 py-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Kolom Teks -->
                <div class="text-center lg:text-left order-2 lg:order-1" data-aos="fade-right">
                    <h1 class="text-9xl font-black text-blue-100 absolute -mt-20 -ml-4 z-0 hidden lg:block select-none">
                        404
                    </h1>
                    <div class="relative z-10">
                        <span
                            class="inline-block py-1 px-3 rounded-full bg-red-100 text-red-600 text-xs font-bold uppercase tracking-wider mb-4">
                            Kesalahan Akses
                        </span>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                            Oops! Halaman Ini <br><span class="text-blue-600">Tidak Ditemukan.</span>
                        </h2>
                        <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto lg:mx-0">
                            Maaf, halaman yang Anda cari mungkin telah dipindahkan, dihapus, atau memang tidak pernah ada.
                            Silakan periksa kembali alamat URL Anda.
                        </p>

                        <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                Kembali ke Beranda
                            </a>
                            <a href="{{ route('daftar.dokter') }}"
                                class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-all">
                                Cari Dokter
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Kolom Ilustrasi -->
                <div class="relative order-1 lg:order-2" data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative z-10 w-full max-w-md mx-auto">
                        <!-- Ilustrasi Medis -->
                        <div
                            class="bg-blue-50 rounded-3xl p-8 border border-blue-100 shadow-inner relative overflow-hidden">
                            <img src="https://illustrations.popsy.co/blue/crashed-error.svg" alt="404 Error"
                                class="w-full h-auto relative z-10 drop-shadow-xl">

                            <!-- Elemen Dekoratif -->
                            <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-200/50 rounded-full blur-2xl"></div>
                            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-teal-200/50 rounded-full blur-2xl"></div>
                        </div>
                    </div>

                    <!-- Floating Icons -->
                    <div class="absolute top-0 right-0 animate-bounce transition-all delay-150">
                        <div class="bg-white p-3 rounded-2xl shadow-lg border border-gray-100">
                            <i class="fas fa-stethoscope text-blue-500 text-2xl"></i>
                        </div>
                    </div>
                    <div class="absolute bottom-10 left-0 animate-pulse transition-all">
                        <div class="bg-white p-3 rounded-2xl shadow-lg border border-gray-100">
                            <i class="fas fa-pills text-teal-500 text-2xl"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section Bantuan -->
    <section class="py-12 bg-gray-50 border-t border-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-widest mb-6 text-center">Mungkin Anda mencari:
            </h3>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ route('faq') }}"
                    class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition group font-medium">
                    <span
                        class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center group-hover:bg-blue-50 transition">?</span>
                    Pertanyaan Umum (FAQ)
                </a>
                <a href="{{ route('kontak.kami') }}"
                    class="flex items-center gap-2 text-gray-600 hover:text-blue-600 transition group font-medium">
                    <span
                        class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center group-hover:bg-blue-50 transition">
                        <i class="fas fa-phone-alt text-xs"></i>
                    </span>
                    Hubungi Layanan Bantuan
                </a>
            </div>
        </div>
    </section>
@endsection
