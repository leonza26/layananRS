@extends('pasien.layouts.layout')

@section('title', 'Buat Janji Temu')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <!-- Header Halaman -->
    <div class="border-b pb-4 mb-6">
        <div class="flex items-center space-x-2 text-sm mb-2">
             <a href="#" class="text-blue-600 hover:text-blue-800">Detail Dokter</a>
             <svg class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="text-gray-500">Konfirmasi Janji Temu</span>
        </div>
        <h2 class="text-2xl font-semibold text-gray-800">Formulir Booking</h2>
        <p class="text-gray-500 mt-1">Lengkapi data diri dan pembayaran untuk menyelesaikan janji temu.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Kolom Form -->
        <div class="lg:col-span-2">
            <form action="#" method="POST" class="space-y-8">
                @csrf
                <!-- 1. Data Pasien -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">1. Data Pasien</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="full_name" id="full_name" value="Nama Pasien (dari data login)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="tel" name="phone_number" id="phone_number" value="08123456789 (dari data login)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" readonly>
                        </div>
                        <div class="sm:col-span-2">
                             <label for="complaint" class="block text-sm font-medium text-gray-700">Keluhan Singkat (Opsional)</label>
                             <textarea id="complaint" name="complaint" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                        </div>
                    </div>
                </div>

                 <!-- 2. Metode Pembayaran -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">2. Pilih Metode Pembayaran</h3>
                    <div class="space-y-4">
                        <!-- Pilihan 1: Virtual Account -->
                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500">
                            <input name="payment_method" type="radio" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <span class="ml-3 font-medium text-gray-800">Virtual Account</span>
                        </label>
                        <!-- Pilihan 2: QRIS -->
                         <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500">
                            <input name="payment_method" type="radio" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                            <span class="ml-3 font-medium text-gray-800">QRIS</span>
                        </label>
                    </div>
                </div>

                 <!-- Tombol Aksi -->
                <div class="pt-5">
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Konfirmasi dan Bayar
                    </button>
                </div>
            </form>
        </div>

        <!-- Kolom Ringkasan -->
        <div class="lg:col-span-1">
            <div class="bg-gray-50 rounded-lg p-6 sticky top-24">
                <h3 class="text-lg font-semibold text-gray-800 border-b pb-4">Ringkasan Janji Temu</h3>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center space-x-4">
                        <img class="h-16 w-16 rounded-lg object-cover" src="https://placehold.co/100x100/E2E8F0/4A5568?text=D" alt="Dokter">
                        <div>
                            <p class="font-bold text-gray-900">Dr. Budi Santoso</p>
                            <p class="text-sm text-gray-600">Dokter Umum</p>
                        </div>
                    </div>
                    <div class="border-t pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tanggal</span>
                            <span class="font-medium text-gray-800">Rabu, 30 Okt 2025</span>
                        </div>
                         <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Waktu</span>
                            <span class="font-medium text-gray-800">10:00 WIB</span>
                        </div>
                    </div>
                    <div class="border-t pt-4 space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Biaya Konsultasi</span>
                            <span class="font-medium text-gray-800">Rp 150.000</span>
                        </div>
                         <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Biaya Admin</span>
                            <span class="font-medium text-gray-800">Rp 5.000</span>
                        </div>
                    </div>
                     <div class="border-t pt-4">
                        <div class="flex justify-between font-bold text-base">
                            <span class="text-gray-900">Total Pembayaran</span>
                            <span class="text-blue-600">Rp 155.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
