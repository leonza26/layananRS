@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat  | Riwayat Dokter
@endsection

@section('content')
    <div class="text-center py-8">
        <h1 class="text-3xl font-bold text-gray-800">Riwayat Janji Temu Saya</h1>
        <p class="text-gray-600 mt-2">Lihat semua janji temu Anda yang akan datang dan yang telah selesai.</p>
    </div>

    <div class="bg-white p-4 sm:p-6 md:p-8 rounded-xl shadow-lg">
        <!-- Navigasi Tab -->
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                <button id="tab-upcoming" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm tab-active">
                    Akan Datang
                </button>
                <button id="tab-completed"
                    class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Selesai
                </button>
            </nav>
        </div>

        <!-- Konten Tab -->
        <div class="mt-8">
            <!-- Konten Tab: Akan Datang -->
            <div id="content-upcoming" class="space-y-6">
                <!-- Kartu Janji Temu 1 -->
                <div
                    class="border rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img class="w-16 h-16 rounded-full object-cover"
                            src="https://placehold.co/100x100/3B82F6/FFFFFF?text=Dr.+A" alt="Foto Dokter">
                        <div>
                            <h3 class="font-bold text-gray-800">Dr. Andi Budiman, Sp.A</h3>
                            <p class="text-sm text-gray-600">Dokter Spesialis Anak</p>
                            <p class="text-sm font-semibold text-gray-800 mt-1">Rabu, 25 September 2025 - 09:00 WIB</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 flex gap-2 w-full sm:w-auto">
                        <button
                            class="w-full sm:w-auto text-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Lihat
                            Detail</button>
                        <button
                            class="w-full sm:w-auto text-center px-4 py-2 text-sm font-medium text-red-700 bg-red-100 border border-transparent rounded-lg hover:bg-red-200">Batalkan</button>
                    </div>
                </div>
                <!-- Jika tidak ada janji temu -->
                <!-- <p class="text-center text-gray-500 py-8">Anda tidak memiliki janji temu yang akan datang.</p> -->
            </div>

            <!-- Konten Tab: Selesai -->
            <div id="content-completed" class="hidden space-y-6">
                <!-- Kartu Janji Temu 1 (Selesai) -->
                <div
                    class="border rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img class="w-16 h-16 rounded-full object-cover"
                            src="https://placehold.co/100x100/14B8A6/FFFFFF?text=Dr.+C" alt="Foto Dokter">
                        <div>
                            <h3 class="font-bold text-gray-800">Dr. Citra Ayu, Sp.KK</h3>
                            <p class="text-sm text-gray-600">Dokter Spesialis Kulit</p>
                            <p class="text-sm font-semibold text-gray-800 mt-1">Jumat, 10 Agustus 2025 - 14:00 WIB</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 flex gap-2 w-full sm:w-auto">
                        <button
                            class="w-full sm:w-auto text-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg hover:bg-blue-700">Beri
                            Ulasan</button>
                        <button
                            class="w-full sm:w-auto text-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Booking
                            Lagi</button>
                    </div>
                </div>
                <!-- Kartu Janji Temu 2 (Selesai) -->
                <div
                    class="border rounded-lg p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <img class="w-16 h-16 rounded-full object-cover opacity-70"
                            src="https://placehold.co/100x100/F97316/FFFFFF?text=Dr.+B" alt="Foto Dokter">
                        <div>
                            <h3 class="font-bold text-gray-500">Drg. Bambang Eko</h3>
                            <p class="text-sm text-gray-500">Dokter Gigi</p>
                            <p class="text-sm font-semibold text-gray-500 mt-1">Senin, 01 Juli 2025 - 11:30 WIB</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 flex gap-2 w-full sm:w-auto">
                        <button
                            class="w-full sm:w-auto text-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Lihat
                            Ulasan</button>
                        <button
                            class="w-full sm:w-auto text-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Booking
                            Lagi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
