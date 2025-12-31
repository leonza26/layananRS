@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat | Kebijakan Privasi
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 py-16">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Kebijakan Privasi</h1>
            <p class="text-blue-100 text-lg max-w-2xl mx-auto">
                Transparansi adalah kunci kepercayaan. Pelajari bagaimana Klinik Sehat melindungi dan mengelola data pribadi
                Anda.
            </p>
            <div
                class="mt-6 inline-block bg-blue-700 bg-opacity-50 px-4 py-1 rounded-full text-sm text-blue-100 border border-blue-500">
                Terakhir diperbarui: 23 Oktober 2025
            </div>
        </div>
    </section>

    <!-- Content Accordion -->
    <section class="py-12 -mt-8">
        <div class="container mx-auto px-6 max-w-3xl" x-data="{ active: 1 }">

            <!-- Intro Card -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8 border border-gray-100">
                <p class="text-gray-600 leading-relaxed">
                    Selamat datang di <strong>Klinik Sehat</strong>. Kami sangat menghargai privasi Anda. Dokumen ini
                    menjelaskan secara rinci bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi
                    serta data medis Anda saat menggunakan layanan kami.
                </p>
            </div>

            <!-- Accordion Items -->
            <div class="space-y-4">

                <!-- Item 1 -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-md">
                    <button @click="active = (active === 1 ? null : 1)"
                        class="w-full flex justify-between items-center p-5 focus:outline-none bg-white">
                        <div class="flex items-center gap-4">
                            <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Informasi yang Kami Kumpulkan</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                            :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="active === 1" x-collapse x-cloak>
                        <div class="p-5 pt-0 text-gray-600 border-t border-gray-100 bg-gray-50">
                            <p class="mb-3">Kami dapat mengumpulkan beberapa jenis informasi berikut untuk keperluan
                                layanan:</p>
                            <ul class="space-y-2 ml-2">
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Data Identitas:</strong> Nama lengkap, tanggal lahir, jenis kelamin,
                                        NIK.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Data Kontak:</strong> Email, nomor telepon, alamat domisili.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-green-500 mt-0.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span><strong>Data Medis:</strong> Riwayat kesehatan, alergi, catatan konsultasi.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-md">
                    <button @click="active = (active === 2 ? null : 2)"
                        class="w-full flex justify-between items-center p-5 focus:outline-none bg-white">
                        <div class="flex items-center gap-4">
                            <div class="bg-green-100 p-2 rounded-lg text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Penggunaan Informasi</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                            :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="active === 2" x-collapse x-cloak>
                        <div class="p-5 pt-0 text-gray-600 border-t border-gray-100 bg-gray-50">
                            <p class="mb-2">Informasi Anda digunakan untuk tujuan-tujuan berikut:</p>
                            <ul class="list-disc pl-5 space-y-1">
                                <li>Memproses pendaftaran dan mengelola akun pengguna.</li>
                                <li>Menjadwalkan janji temu dan mengirimkan pengingat.</li>
                                <li>Memfasilitasi layanan konsultasi medis.</li>
                                <li>Memproses pembayaran yang aman.</li>
                                <li>Meningkatkan kualitas layanan situs kami.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-md">
                    <button @click="active = (active === 3 ? null : 3)"
                        class="w-full flex justify-between items-center p-5 focus:outline-none bg-white">
                        <div class="flex items-center gap-4">
                            <div class="bg-purple-100 p-2 rounded-lg text-purple-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Keamanan & Perlindungan Data</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                            :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="active === 3" x-collapse x-cloak>
                        <div class="p-5 pt-0 text-gray-600 border-t border-gray-100 bg-gray-50">
                            <p>
                                Kami menerapkan langkah keamanan teknis setingkat industri (seperti enkripsi SSL) untuk
                                melindungi data Anda dari akses tidak sah. Data medis Anda disimpan secara terpisah dan
                                hanya dapat diakses oleh tenaga medis yang berwenang.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden transition-all duration-300 hover:shadow-md">
                    <button @click="active = (active === 4 ? null : 4)"
                        class="w-full flex justify-between items-center p-5 focus:outline-none bg-white">
                        <div class="flex items-center gap-4">
                            <div class="bg-orange-100 p-2 rounded-lg text-orange-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg font-semibold text-gray-800">Pengungkapan Pihak Ketiga</span>
                        </div>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-300"
                            :class="active === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="active === 4" x-collapse x-cloak>
                        <div class="p-5 pt-0 text-gray-600 border-t border-gray-100 bg-gray-50">
                            <p>
                                Kami <strong>tidak menjual</strong> data Anda. Informasi hanya dibagikan kepada:
                            </p>
                            <ul class="list-disc pl-5 mt-2 space-y-1">
                                <li>Dokter yang menangani Anda.</li>
                                <li>Penyedia layanan pembayaran (Payment Gateway) untuk transaksi.</li>
                                <li>Pihak berwenang jika diwajibkan oleh hukum Indonesia.</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Contact Card -->
            <div
                class="mt-10 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold mb-4">Masih memiliki pertanyaan?</h3>
                    <p class="text-gray-300 mb-6 max-w-lg">
                        Jika Anda memiliki kekhawatiran tentang bagaimana data Anda dikelola, tim perlindungan data kami
                        siap membantu Anda.
                    </p>
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="flex items-center gap-3">
                            <div class="bg-gray-700 p-2 rounded-full">
                                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="font-medium">privacy@kliniksehat.com</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="bg-gray-700 p-2 rounded-full">
                                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <span class="font-medium">(021) 1234-5678</span>
                        </div>
                    </div>
                </div>
                <!-- Decorative Circle -->
                <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-blue-600 rounded-full opacity-20 blur-3xl"></div>
            </div>

        </div>
    </section>
@endsection
