@extends('pasien.layouts.layout')

@section('title', 'Riwayat Janji Temu')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <!-- Header Halaman -->
    <div class="flex flex-col sm:flex-row justify-between items-center border-b pb-4 mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Riwayat Janji Temu</h2>
            <p class="text-gray-500 mt-1">Lihat semua janji temu Anda yang akan datang dan yang sudah selesai.</p>
        </div>
    </div>

    <!-- Navigasi Tab -->
    <div x-data="{ tab: 'upcoming' }">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                <button @click="tab = 'upcoming'" :class="{ 'border-blue-500 text-blue-600': tab === 'upcoming', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'upcoming' }" class="whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm focus:outline-none">
                    Akan Datang
                </button>
                <button @click="tab = 'completed'" :class="{ 'border-blue-500 text-blue-600': tab === 'completed', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'completed' }" class="whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm focus:outline-none">
                    Selesai
                </button>
            </nav>
        </div>

        <!-- Konten Tab -->
        <div class="mt-6 space-y-4">
            <!-- Tab: Akan Datang -->
            <div x-show="tab === 'upcoming'" x-cloak>
                @forelse ($upcomingAppointments as $appointment)
                    <div class="border rounded-lg p-4 flex flex-col sm:flex-row justify-between items-center">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <img class="h-12 w-12 rounded-full object-cover" src="{{ $appointment->dokter->photo_url ? asset('storage/' . $appointment->dokter->photo_url) : 'https://placehold.co/100x100/E2E8F0/4A5568?text=D' }}" alt="Foto {{ $appointment->dokter->user->name }}">
                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">{{ $appointment->dokter->user->name }} ({{ $appointment->dokter->specialization }})</p>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($appointment->appointment_time)->translatedFormat('l, d F Y - H:i') }} WIB</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <form action="{{ route('pasien.booking.cancel', $appointment->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin membatalkan janji temu ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Batalkan</button>
                            </form>
                            <a href="#" class="px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Lihat Detail</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500">Tidak ada janji temu yang akan datang.</p>
                    </div>
                @endforelse
            </div>

            <!-- Tab: Selesai -->
            <div x-show="tab === 'completed'" x-cloak>
                @forelse ($completedAppointments as $appointment)
                    <div class="border rounded-lg p-4 flex flex-col sm:flex-row justify-between items-center opacity-75">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <img class="h-12 w-12 rounded-full object-cover" src="{{ $appointment->dokter->photo_url ? asset('storage/' . $appointment->dokter->photo_url) : 'https://placehold.co/100x100/E2E8F0/4A5568?text=D' }}" alt="Foto {{ $appointment->dokter->user->name }}">
                            <div class="ml-4">
                                <p class="font-semibold text-gray-800">{{ $appointment->dokter->user->name }} ({{ $appointment->dokter->specialization }})</p>
                                <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($appointment->appointment_time)->translatedFormat('l, d F Y - H:i') }} WIB</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('daftar.dokter') }}" class="px-3 py-1.5 text-xs font-medium text-white bg-gray-500 rounded-md hover:bg-gray-600">Booking Lagi</a>
                            <a href="#" class="px-3 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">Beri Ulasan</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <p class="text-gray-500">Belum ada janji temu yang selesai.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
