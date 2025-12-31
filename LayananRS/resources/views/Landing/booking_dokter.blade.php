@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat  | Booking Dokter
@endsection

@section('content')
    <div class="text-center mb-10 pt-12">
        <h1 class="text-3xl font-bold text-gray-800">Konfirmasi Janji Temu Anda</h1>
        <p class="text-gray-600 mt-2">Satu langkah lagi untuk menyelesaikan pemesanan Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 py-6 px-6">

        <!-- ===== Kolom Kiri: Form Data Pasien & Pembayaran ===== -->
        <div class="lg:col-span-2">
            <div class="bg-white p-8 rounded-xl shadow-lg">
                <!-- Bagian Data Diri Pasien -->
                <section>
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span
                            class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">1</span>
                        Data Diri Pasien
                    </h2>
                    <!-- Jika user sudah login, bisa tambahkan pesan: "Memesan sebagai [Nama User]" -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="full_name"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                Telepon</label>
                            <input type="tel" id="phone_number"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Contoh: 08123456789">
                        </div>
                        <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                Lahir</label>
                            <input type="date" id="birth_date"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                            <select id="gender"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option>Pilih Jenis Kelamin</option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label for="complaint" class="block text-sm font-medium text-gray-700 mb-1">Keluhan Singkat
                                (Opsional)</label>
                            <textarea id="complaint" rows="3"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Jelaskan keluhan utama Anda secara singkat"></textarea>
                        </div>
                    </div>
                </section>

                <!-- Bagian Metode Pembayaran -->
                <section class="mt-10 border-t pt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                        <span
                            class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">2</span>
                        Metode Pembayaran
                    </h2>
                    <div class="space-y-4">
                        <!-- Opsi 1: Virtual Account -->
                        <div class="border rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h3 class="font-semibold">Virtual Account</h3>
                                <p class="text-sm text-gray-500">Bayar melalui Bank BCA, Mandiri, BRI, dll.</p>
                            </div>
                            <input type="radio" name="payment_method" class="h-5 w-5 text-blue-600 focus:ring-blue-500">
                        </div>
                        <!-- Opsi 2: QRIS -->
                        <div class="border rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h3 class="font-semibold">QRIS</h3>
                                <p class="text-sm text-gray-500">Bayar dengan GoPay, OVO, Dana, dll.</p>
                            </div>
                            <input type="radio" name="payment_method" class="h-5 w-5 text-blue-600 focus:ring-blue-500">
                        </div>
                        <!-- Opsi 3: Kartu Kredit -->
                        <div class="border rounded-lg p-4 flex items-center justify-between">
                            <div>
                                <h3 class="font-semibold">Kartu Kredit / Debit</h3>
                                <p class="text-sm text-gray-500">Visa, Mastercard, JCB</p>
                            </div>
                            <input type="radio" name="payment_method" class="h-5 w-5 text-blue-600 focus:ring-blue-500">
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- ===== Kolom Kanan: Ringkasan Pemesanan ===== -->
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-lg sticky top-28">
                <h2 class="text-xl font-bold text-gray-800 mb-4 pb-4 border-b">Ringkasan Pemesanan</h2>

                <!-- Info Dokter -->
                <div class="flex items-center gap-4">
                    <img class="w-16 h-16 rounded-full object-cover"
                        src="https://placehold.co/100x100/3B82F6/FFFFFF?text=Dr.+A" alt="Foto Dokter">
                    <div>
                        <h3 class="font-bold text-gray-800">Dr. Andi Budiman, Sp.A</h3>
                        <p class="text-sm text-gray-600">Dokter Spesialis Anak</p>
                    </div>
                </div>

                <!-- Detail Janji Temu -->
                <div class="mt-6 space-y-3 text-gray-700">
                    <div class="flex justify-between">
                        <span class="font-medium">Tanggal</span>
                        <span>Rabu, 25 September 2025</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Waktu</span>
                        <span>09:00 WIB</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Lokasi</span>
                        <span>RS Sehat Sentosa</span>
                    </div>
                </div>

                <!-- Detail Biaya -->
                <div class="mt-6 border-t pt-4 space-y-3">
                    <div class="flex justify-between text-gray-700">
                        <span>Biaya Konsultasi</span>
                        <span>Rp 250.000</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Biaya Layanan</span>
                        <span>Rp 5.000</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg text-gray-800 mt-2">
                        <span>Total Pembayaran</span>
                        <span>Rp 255.000</span>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-8">
                    <button
                        class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                        Konfirmasi dan Bayar
                    </button>
                    <p class="text-xs text-gray-500 text-center mt-4">
                        Dengan melanjutkan, Anda menyetujui <a href="#" class="text-blue-600">Syarat & Ketentuan</a>
                        kami.
                    </p>
                </div>
            </div>
        </div>

    </div>
@endsection
