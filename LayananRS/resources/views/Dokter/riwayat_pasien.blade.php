@extends('Dokter.layouts.layout')

@section('title', 'Riwayat Pasien')

@section('content')
    <!-- Header Konten -->
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <div>
            <h3 class="text-2xl font-semibold text-gray-700">Riwayat Pasien</h3>
            <p class="text-gray-500 mt-1">Lihat dan kelola data semua pasien Anda.</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <div class="relative text-gray-600">
                <input type="search" name="search" placeholder="Cari pasien..." class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none border border-gray-300 w-full sm:w-auto">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Tabel Pasien -->
    <div class="mt-8 bg-white rounded-lg shadow-md">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pasien</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kunjungan Terakhir</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://placehold.co/100x100/E2E8F0/4A5568?text=AS" alt="Avatar">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Andi Saputra</div>
                                    <div class="text-sm text-gray-500">andi.s@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15-05-1990</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">081234567890</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">07-10-2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Lihat Riwayat</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://placehold.co/100x100/E2E8F0/4A5568?text=SA" alt="Avatar">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Siti Aminah</div>
                                    <div class="text-sm text-gray-500">siti.a@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">22-11-1985</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">089876543210</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03-10-2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Lihat Riwayat</a>
                        </td>
                    </tr>
                    <!-- Data pasien lainnya -->
                </tbody>
            </table>
        </div>
        <!-- Paginasi -->
        <div class="px-6 py-4 border-t border-gray-200">
             <div class="flex items-center justify-between">
                <p class="text-sm text-gray-700">
                    Menampilkan
                    <span class="font-medium">1</span>
                    sampai
                    <span class="font-medium">10</span>
                    dari
                    <span class="font-medium">25</span>
                    hasil
                </p>
                <div class="flex-1 flex justify-end space-x-2">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Sebelumnya</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Selanjutnya</a>
                </div>
            </div>
        </div>
    </div>
@endsection
