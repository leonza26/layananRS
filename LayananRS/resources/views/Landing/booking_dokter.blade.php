@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat | Booking Dokter
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <!-- Header -->
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Formulir Booking</h2>
            <p class="text-gray-500 mt-1">Konfirmasi data dan pembayaran.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kolom Form -->
            <div class="lg:col-span-2">
                <form action="{{ route('pasien.booking.store') }}" method="POST" class="space-y-8">
                    @csrf

                    {{-- Data Hidden --}}
                    <input type="hidden" name="dokter_id" value="{{ $dokter->id }}">
                    {{-- Tanggal dan Waktu diambil dari requestData yang dikirim controller --}}
                    <input type="hidden" name="appointment_date" value="{{ $requestData->date }}">
                    <input type="hidden" name="appointment_time" value="{{ $requestData->time }}">

                    <!-- 1. Data Pasien -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">1. Data Pasien</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" value="{{ Auth::user()->name }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="text" value="{{ $pasien->phone_number ?? '-' }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100" readonly>
                                <p class="text-xs text-gray-500 mt-1">*Ubah nomor telepon di menu Profil Saya</p>
                            </div>
                            <div>
                                <label for="complaint" class="block text-sm font-medium text-gray-700">Keluhan
                                    Singkat</label>
                                <textarea id="complaint" name="complaint" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Metode Pembayaran -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">2. Pembayaran</h3>
                        <div class="space-y-4">
                            <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:border-blue-500">
                                <input name="payment_method" type="radio" value="midtrans"
                                    class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" checked>
                                <span class="ml-3 font-medium text-gray-800">Pembayaran Online (Midtrans)</span>
                            </label>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-5">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-blue-700 transition">
                            Konfirmasi Booking
                        </button>
                    </div>
                </form>
            </div>

            <!-- Kolom Ringkasan -->
            <div class="lg:col-span-1">
                <div class="bg-gray-50 rounded-lg p-6 sticky top-24">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-4">Ringkasan</h3>
                    <div class="mt-4 space-y-4">
                        <div class="flex items-center space-x-4">
                            <!-- Cek foto dokter -->
                            <img class="h-16 w-16 rounded-lg object-cover"
                                src="{{ $dokter->dokter->photo_url ? asset($dokter->dokter->photo_url) : 'https://placehold.co/400x400?text=' . urlencode($dokter->name) }}"
                                alt="{{ $dokter->name }}">
                            <div>
                                <p class="font-bold text-gray-900">{{ $dokter->name }}</p>
                                <p class="text-sm text-gray-600">{{ $dokter->dokter->specialization ?? 'Dokter Umum' }}</p>
                            </div>
                        </div>

                        <div class="border-t pt-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Tanggal</span>
                                <span class="font-medium text-gray-800">{{ $dateFormatted }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Waktu</span>
                                <span class="font-medium text-gray-800">{{ $time }} WIB</span>
                            </div>
                        </div>

                        @php
                            $biaya = $dokter->dokter->consultation_fee ?? 150000;
                            $admin = 5000;
                            $total = $biaya + $admin;
                        @endphp

                        <div class="border-t pt-4 space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Biaya Konsultasi</span>
                                <span class="font-medium text-gray-800">Rp {{ number_format($biaya, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Biaya Admin</span>
                                <span class="font-medium text-gray-800">Rp {{ number_format($admin, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="border-t pt-4">
                            <div class="flex justify-between font-bold text-base">
                                <span class="text-gray-900">Total</span>
                                <span class="text-blue-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
