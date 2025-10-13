@extends('Dokter.layouts.layout')

@section('title', 'Notifikasi')

@section('content')
    <!-- Header Konten -->
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <div>
            <h3 class="text-2xl font-semibold text-gray-700">Notifikasi</h3>
            <p class="text-gray-500 mt-1">Lihat semua pemberitahuan terbaru di sini.</p>
        </div>
        <button class="mt-4 sm:mt-0 text-sm font-medium text-blue-600 hover:text-blue-800">
            Tandai semua sudah dibaca
        </button>
    </div>

    <!-- Daftar Notifikasi -->
    <div class="mt-8 bg-white rounded-lg shadow-md">
        <div class="divide-y divide-gray-200">
            <!-- Contoh Notifikasi: Janji Temu Baru (Belum Dibaca) -->
            <div class="p-6 flex items-start space-x-4 hover:bg-gray-50">
                <div class="relative flex-shrink-0">
                    <div class="h-10 w-10 flex items-center justify-center bg-blue-100 rounded-full">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-blue-500 ring-2 ring-white"></span>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800">
                        Anda memiliki <span class="font-semibold">janji temu baru</span> dengan pasien <span class="font-semibold">Andi Saputra</span> untuk tanggal 10 Oktober 2025 pukul 14:00.
                    </p>
                    <p class="mt-1 text-xs text-gray-500">5 menit yang lalu</p>
                </div>
            </div>

            <!-- Contoh Notifikasi: Pembatalan Janji Temu -->
            <div class="p-6 flex items-start space-x-4 hover:bg-gray-50">
                <div class="h-10 w-10 flex-shrink-0 flex items-center justify-center bg-red-100 rounded-full">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800">
                        Pasien <span class="font-semibold">Siti Aminah</span> telah <span class="font-semibold text-red-600">membatalkan</span> janji temunya pada 09 Oktober 2025.
                    </p>
                    <p class="mt-1 text-xs text-gray-500">1 jam yang lalu</p>
                </div>
            </div>

            <!-- Contoh Notifikasi: Ulasan Baru -->
            <div class="p-6 flex items-start space-x-4 hover:bg-gray-50">
                <div class="h-10 w-10 flex-shrink-0 flex items-center justify-center bg-yellow-100 rounded-full">
                    <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800">
                        Anda menerima <span class="font-semibold">ulasan baru</span> (5 bintang) dari pasien <span class="font-semibold">Rizky Pratama</span>.
                    </p>
                    <p class="mt-1 text-xs text-gray-500">Kemarin</p>
                </div>
            </div>
             <!-- Contoh Notifikasi: Pengingat Jadwal -->
            <div class="p-6 flex items-start space-x-4 hover:bg-gray-50">
                <div class="h-10 w-10 flex-shrink-0 flex items-center justify-center bg-green-100 rounded-full">
                     <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-800">
                        <span class="font-semibold text-green-700">Pengingat:</span> Janji temu Anda dengan <span class="font-semibold">Dewi Lestari</span> akan dimulai dalam 15 menit.
                    </p>
                    <p class="mt-1 text-xs text-gray-500">2 hari yang lalu</p>
                </div>
            </div>
        </div>
    </div>
@endsection
