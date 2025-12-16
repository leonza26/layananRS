@extends('Dokter.layouts.layout')

@section('title', 'Dashboard Dokter')

@section('content')
    <!-- Header Konten -->
    <div class="flex flex-col sm:flex-row justify-between items-start">
        <div>
            <h3 class="text-2xl font-semibold text-gray-700">Selamat Datang, {{ Auth::user()->name }}!</h3>
            <p class="text-gray-500 mt-1">Hari {{ now()->isoFormat('dddd, DD MMMM Y') }}</p>
        </div>
    </div>

    <!-- Kartu Statistik Cepat -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
            <div class="bg-blue-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Janji Temu Hari Ini</p>
                <p class="text-2xl font-bold text-gray-800">8</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
             <div class="bg-green-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Pasien Berikutnya</p>
                <p class="text-xl font-bold text-gray-800">Andi Saputra (10:00)</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
             <div class="bg-yellow-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Permintaan Baru</p>
                <p class="text-2xl font-bold text-gray-800">2</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
             <div class="bg-red-100 p-3 rounded-full">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">Ulasan Baru</p>
                <p class="text-2xl font-bold text-gray-800">1</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
        <!-- Daftar Janji Temu Akan Datang -->
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-lg font-semibold text-gray-700">Janji Temu Akan Datang</h4>
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pasien</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keluhan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10:00</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Andi Saputra</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Demam 3 hari</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10:30</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Siti Aminah</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Kontrol rutin</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                            </td>
                        </tr>
                        <!-- Data lainnya -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Kalender & Aktivitas Terbaru -->
        <div class="space-y-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-700">Kalender Mingguan</h4>
                <div class="grid grid-cols-7 gap-2 mt-4 text-center text-sm">
                    <div class="font-medium text-gray-500">Sen</div>
                    <div class="font-medium text-gray-500">Sel</div>
                    <div class="font-medium text-gray-500">Rab</div>
                    <div class="font-medium text-gray-500">Kam</div>
                    <div class="font-medium text-gray-500">Jum</div>
                    <div class="font-medium text-gray-500">Sab</div>
                    <div class="font-medium text-gray-500">Min</div>

                    <div class="text-gray-400">30</div>
                    <div class="font-bold text-blue-600 bg-blue-100 rounded-full p-1">1</div>
                    <div class="p-1">2</div>
                    <div class="relative p-1">3 <span class="absolute bottom-0 left-1/2 -translate-x-1/2 h-1 w-1 bg-red-500 rounded-full"></span></div>
                    <div class="p-1">4</div>
                    <div class="p-1">5</div>
                    <div class="p-1">6</div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-700">Aktivitas Terbaru</h4>
                <ul class="mt-4 space-y-4">
                    <li class="flex items-start space-x-3">
                        <div class="bg-red-100 p-2 rounded-full"><svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></div>
                        <p class="text-sm text-gray-600">Pasien <strong>Citra Lestari</strong> membatalkan janji temu.</p>
                    </li>
                    <li class="flex items-start space-x-3">
                        <div class="bg-green-100 p-2 rounded-full"><svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></div>
                        <p class="text-sm text-gray-600">Anda menerima <strong>permintaan janji temu baru</strong>.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
