@extends('pasien.layouts.layout')

@section('title', 'Ringkasan Akun')

@section('content')
    <!-- Salam Pembuka -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Selamat Datang, [Nama Pasien]!</h2>
        <p class="text-gray-500 mt-1">Ini adalah ringkasan aktivitas akun Anda.</p>
    </div>

    <!-- Fokus Utama: Janji Temu Berikutnya -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-700 border-b pb-3">Janji Temu Anda Berikutnya</h3>

        {{-- Tampilkan ini jika ADA janji temu --}}
        <div class="mt-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-center">
                    <img class="h-12 w-12 rounded-full object-cover" src="https://placehold.co/100x100/E2E8F0/4A5568?text=D" alt="Avatar Dokter">
                    <div class="ml-4">
                        <p class="font-semibold text-gray-900">Dr. Budi Santoso</p>
                        <p class="text-sm text-gray-600">Dokter Umum</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 text-left sm:text-right">
                    <p class="font-semibold text-gray-900">Rabu, 30 Oktober 2025</p>
                    <p class="text-sm text-gray-600">Pukul 10:00 - Selesai</p>
                </div>
            </div>
            <div class="flex justify-end space-x-3 mt-4">
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Batalkan</a>
                <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Lihat Detail</a>
            </div>
        </div>

        {{-- Tampilkan ini jika TIDAK ADA janji temu --}}
        {{--
        <div class="mt-6 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada janji temu</h3>
            <p class="mt-1 text-sm text-gray-500">Anda belum memiliki janji temu yang akan datang.</p>
            <div class="mt-6">
              <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                Booking Sekarang
              </a>
            </div>
        </div>
        --}}
    </div>

    <!-- Aksi Cepat & Notifikasi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Aksi Cepat -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Aksi Cepat</h3>
            <div class="space-y-3">
                <a href="{{ route('pasien.booking') }}" class="block w-full text-center px-4 py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">Booking Janji Temu Baru</a>
                <a href="#" class="block w-full text-center px-4 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200">Lihat Semua Riwayat</a>
            </div>
        </div>
        <!-- Notifikasi -->
        <div class="bg-white rounded-lg shadow p-6">
             <h3 class="text-lg font-semibold text-gray-700 mb-4">Notifikasi Terbaru</h3>
             <ul class="space-y-4">
                 <li class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 rounded-full bg-green-100 flex items-center justify-center">
                        <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="ml-3 text-sm text-gray-600">Janji temu Anda dengan <strong>Dr. Budi</strong> telah dikonfirmasi.</p>
                 </li>
                 <li class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 rounded-full bg-blue-100 flex items-center justify-center">
                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="ml-3 text-sm text-gray-600">Jangan lupa untuk janji temu Anda besok pukul 10:00.</p>
                 </li>
             </ul>
        </div>
    </div>
@endsection
