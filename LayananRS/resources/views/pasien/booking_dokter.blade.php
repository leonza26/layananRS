@extends('pasien.layouts.layout')

@section('title', 'Buat Janji Temu')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <!-- Header -->
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Konfirmasi Booking</h2>
            <p class="text-gray-500 mt-1">Periksa kembali data Anda sebelum melanjutkan ke pembayaran.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kolom Kiri: Form Data -->
            <div class="lg:col-span-2">
                <form action="{{ route('pasien.booking.store') }}" method="POST" class="space-y-8">
                    @csrf

                    {{-- Data Hidden untuk Controller --}}
                    <input type="hidden" name="dokter_id" value="{{ $dokter->id }}">
                    <input type="hidden" name="appointment_date" value="{{ $requestData->date }}">
                    <input type="hidden" name="appointment_time" value="{{ $requestData->time }}">

                    {{-- Default Payment Method ke 'midtrans' --}}
                    <input type="hidden" name="payment_method" value="midtrans">

                    <!-- 1. Data Pasien -->
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            1. Data Pasien
                        </h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" value="{{ Auth::user()->name }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-600 shadow-sm"
                                    readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="text" value="{{ $pasien->phone_number ?? '-' }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-white text-gray-600 shadow-sm"
                                    readonly>
                            </div>
                            <div>
                                <label for="complaint" class="block text-sm font-medium text-gray-700">Keluhan Singkat <span
                                        class="text-red-500">*</span></label>
                                <textarea id="complaint" name="complaint" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Contoh: Demam tinggi sejak kemarin sore" required></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Informasi Pembayaran -->
                    <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                        <h3 class="text-lg font-semibold text-blue-800 mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                            2. Pembayaran
                        </h3>
                        <p class="text-sm text-blue-700 mb-0">
                            Pembayaran akan diproses secara aman melalui <strong>Payment Gateway</strong>. Anda dapat
                            memilih metode pembayaran (QRIS, GoPay, Transfer Bank, dll) pada langkah selanjutnya.
                        </p>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-blue-600 text-white font-bold py-4 px-6 rounded-lg hover:bg-blue-700 transition shadow-lg flex justify-center items-center">
                            <span>Lanjut ke Pembayaran</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Kolom Kanan: Ringkasan -->
            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sticky top-24">
                    <h3 class="text-lg font-semibold text-gray-800 border-b pb-4 mb-4">Ringkasan Pesanan</h3>

                    <div class="space-y-4">
                        <!-- Info Dokter -->
                        <div class="flex items-center space-x-4">
                            <img class="h-14 w-14 rounded-full object-cover border-2 border-white shadow-sm"
                                src="{{ $dokter->dokter->photo_url ? asset($dokter->dokter->photo_url) : 'https://placehold.co/400x400?text=' . urlencode($dokter->name) }}"
                                alt="{{ $dokter->name }}">
                            <div>
                                <p class="font-bold text-gray-900 text-sm">{{ $dokter->name }}</p>
                                <p class="text-xs text-gray-500">{{ $dokter->dokter->specialization ?? 'Dokter Umum' }}</p>
                            </div>
                        </div>

                        <!-- Detail Waktu -->
                        <div class="bg-gray-50 p-3 rounded-md space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Tanggal</span>
                                <span class="font-medium text-gray-800">{{ $dateFormatted }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Jam</span>
                                <span class="font-medium text-gray-800">{{ $requestData->time }} WIB</span>
                            </div>
                        </div>

                        @php
                            $biaya = $dokter->dokter->consultation_fee ?? 150000;
                            $admin = 5000;
                            $total = $biaya + $admin;
                        @endphp

                        <!-- Rincian Biaya -->
                        <div class="space-y-2 pt-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Biaya Konsultasi</span>
                                <span class="font-medium text-gray-900">Rp {{ number_format($biaya, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Biaya Layanan</span>
                                <span class="font-medium text-gray-900">Rp {{ number_format($admin, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="border-t border-dashed border-gray-300 pt-4 mt-2">
                            <div class="flex justify-between items-end">
                                <span class="text-gray-900 font-bold">Total</span>
                                <span class="text-2xl font-bold text-blue-600">Rp
                                    {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
