@extends('admin.layouts.layout')

@section('admin_page_title')
    Admin Dashboard - Klinik Sehat
@endsection

@section('admin_content')
    <h3 class="text-2xl font-semibold text-gray-700">Dashboard</h3>

    <!-- Kartu Statistik -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Janji Temu Hari Ini</p>
                    <p class="text-2xl font-bold text-gray-900">12</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Pasien Terdaftar</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $patient_amount }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <div class="p-3 bg-indigo-100 rounded-full">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Dokter Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $doctor_amount }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h4 class="text-lg font-semibold text-gray-700">Tren Pemesanan (7 Hari Terakhir)</h4>
        <div class="mt-4">
            <canvas id="bookingChart"></canvas>
        </div>
    </div>

    <!-- Tabel Janji Temu Terbaru -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h4 class="text-lg font-semibold text-gray-700">Janji Temu Terbaru</h4>
        <div class="mt-4 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pasien
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokter
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Andi Saputra</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Budi Santoso</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">06 Okt, 10:00</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terkonfirmasi</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Siti Aminah</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Rina Melati</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">06 Okt, 11:30</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Joko Widodo</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Budi Santoso</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">05 Okt, 15:00</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Selesai</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Dewi Lestari</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Dr. Anisa Putri</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">05 Okt, 14:00</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Dibatalkan</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
