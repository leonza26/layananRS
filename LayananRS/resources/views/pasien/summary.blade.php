@extends('pasien.layouts.layout')

@section('title', 'Ringkasan Akun')

@section('content')

    <!-- Salam Pembuka -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">
            Selamat Datang, {{ $pasien->name }}!
        </h2>
        <p class="text-gray-500 mt-1">
            Ini adalah ringkasan aktivitas akun Anda.
        </p>
    </div>

    <!-- Fokus Utama: Janji Temu Berikutnya -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-700 border-b pb-3">
            Janji Temu Anda Berikutnya
        </h3>

        @if ($nextAppointment)
            <div class="mt-4">
                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 bg-blue-50 border border-blue-200 rounded-lg">

                    <!-- Dokter -->
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover"
                            src="https://placehold.co/100x100/E2E8F0/4A5568?text=D" alt="Avatar Dokter">

                        <div class="ml-4">
                            <p class="font-semibold text-gray-900">
                                {{ $nextAppointment->doctor->user->name }}
                            </p>
                            <p class="text-sm text-gray-600">
                                {{ $nextAppointment->doctor->specialization ?? 'Dokter' }}
                            </p>
                        </div>
                    </div>

                    <!-- Waktu -->
                    <div class="mt-4 sm:mt-0 text-left sm:text-right">
                        <p class="font-semibold text-gray-900">
                            {{ \Carbon\Carbon::parse($nextAppointment->appointment_time)->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="text-sm text-gray-600">
                            Pukul {{ \Carbon\Carbon::parse($nextAppointment->appointment_time)->format('H:i') }}
                        </p>
                    </div>

                </div>

                <!-- Status & Aksi -->
                <div class="flex justify-end space-x-3 mt-4">

                    @if ($nextAppointment->status === 'pending')
                        <span class="px-4 py-2 text-sm rounded-md bg-yellow-100 text-yellow-700">
                            Menunggu Pembayaran
                        </span>
                    @elseif($nextAppointment->status === 'confirmed')
                        <span class="px-4 py-2 text-sm rounded-md bg-green-100 text-green-700">
                            Sudah Dibayar
                        </span>
                    @endif

                    <a href="{{ route('pasien.appointment.show', $nextAppointment->id) }}"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Lihat Detail
                    </a>
                </div>
            </div>
        @else
            <!-- Tidak Ada Janji -->
            <div class="mt-6 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>

                <h3 class="mt-2 text-sm font-medium text-gray-900">
                    Tidak ada janji temu
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Anda belum memiliki janji temu yang akan datang.
                </p>

                <div class="mt-6">
                    <a href="{{ route('pasien.booking') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Booking Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Aksi Cepat & Notifikasi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Aksi Cepat -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                Aksi Cepat
            </h3>

            <div class="space-y-3">
                <a href="{{ route('daftar.dokter') }}"
                    class="block w-full text-center px-4 py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                    Booking Janji Temu Baru
                </a>

                <a href="{{ route('pasien.riwayat') }}"
                    class="block w-full text-center px-4 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200">
                    Lihat Semua Riwayat
                </a>
            </div>
        </div>

        <!-- Notifikasi -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                Notifikasi Terbaru
            </h3>

            <ul class="space-y-4">
                {{-- @forelse($latestAppointments as $appointment)
                    <li class="flex items-start">
                        <div
                            class="flex-shrink-0 h-6 w-6 rounded-full
                        {{ $appointment->status === 'confirmed' ? 'bg-green-100' : 'bg-blue-100' }}
                        flex items-center justify-center">

                            <svg class="h-4 w-4
                            {{ $appointment->status === 'confirmed' ? 'text-green-600' : 'text-blue-600' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <p class="ml-3 text-sm text-gray-600">
                            Janji temu dengan <strong>{{ $appointment->doctor->name }}</strong>
                            {{ $appointment->status === 'confirmed' ? 'telah dikonfirmasi' : 'menunggu proses pembayaran' }}.
                        </p>
                    </li>
                @empty
                    <p class="text-sm text-gray-500">
                        Belum ada notifikasi terbaru.
                    </p>
                @endforelse --}}
            </ul>
        </div>

    </div>

@endsection
