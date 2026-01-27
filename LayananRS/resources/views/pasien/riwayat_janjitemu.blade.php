@extends('pasien.layouts.layout')

@section('title', 'Riwayat Janji Temu')

@section('content')
    <div x-data="{
        tab: 'upcoming',
        showModal: false,
        detail: {}
    }" class="bg-white rounded-lg shadow p-6">

        <!-- Header -->
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Riwayat Janji Temu</h2>
            <p class="text-gray-500 mt-1">
                Lihat semua janji temu Anda yang akan datang dan yang sudah selesai.
            </p>
        </div>

        <!-- Tabs -->
        <div class="border-b mb-4">
            <nav class="flex space-x-6 text-sm font-medium">
                <button @click="tab='upcoming'"
                    :class="tab === 'upcoming' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'" class="pb-2">
                    Akan Datang
                </button>

                <button @click="tab='completed'"
                    :class="tab === 'completed' ? 'border-b-2 border-blue-600 text-blue-600' : 'text-gray-500'"
                    class="pb-2">
                    Selesai
                </button>
            </nav>
        </div>

        <!-- ================= AKAN DATANG ================= -->
        <div x-show="tab==='upcoming'" x-cloak>
            <table class="w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Dokter</th>
                        <th class="p-2 border">Tanggal</th>
                        <th class="p-2 border">Jam</th>
                        <th class="p-2 border">Keluhan</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($upcomingAppointments as $appointment)
                        <tr>
                            <td class="p-2 border">
                                {{ $appointment->doctor?->user?->name ?? '-' }}
                                <div class="text-xs text-gray-500">
                                    {{ $appointment->doctor?->specialization ?? '-' }}
                                </div>
                            </td>
                            <td class="p-2 border">
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->translatedFormat('d F Y') }}
                            </td>
                            <td class="p-2 border">
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }} WIB
                            </td>
                            <td class="p-2 border">
                                {{ $appointment->complaint ?? '-' }}
                            </td>
                            <td class="p-2 border">
                                <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                            <td class="p-2 border space-x-2">
                                <button
                                    @click="
                                detail = {
                                    dokter: '{{ $appointment->doctor?->user?->name }}',
                                    spesialis: '{{ $appointment->doctor?->specialization }}',
                                    tanggal: '{{ \Carbon\Carbon::parse($appointment->appointment_time)->translatedFormat('l, d F Y') }}',
                                    jam: '{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }} WIB',
                                    keluhan: '{{ $appointment->complaint ?? '-' }}',
                                    status: '{{ ucfirst($appointment->status) }}',
                                    pembayaran: '{{ $appointment->payment->status ?? 'belum bayar' }}'
                                };
                                showModal=true;
                            "
                                    class="text-blue-600 hover:underline">
                                    Lihat Detail
                                </button>

                                <form action="{{ route('pasien.booking.cancel', $appointment->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Batalkan janji temu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">
                                        Batalkan
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">
                                Tidak ada janji temu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ================= SELESAI ================= -->
        <div x-show="tab==='completed'" x-cloak>
            <table class="w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">Dokter</th>
                        <th class="p-2 border">Tanggal</th>
                        <th class="p-2 border">Jam</th>
                        <th class="p-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($completedAppointments as $appointment)
                        <tr class="opacity-70">
                            <td class="p-2 border">
                                {{ $appointment->doctor?->user?->name ?? '-' }}
                            </td>
                            <td class="p-2 border">
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->translatedFormat('d F Y') }}
                            </td>
                            <td class="p-2 border">
                                {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i') }} WIB
                            </td>
                            <td class="p-2 border">
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                    Selesai
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Belum ada janji temu selesai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ================= MODAL ================= -->
        <div x-show="showModal" x-cloak class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 w-full max-w-md" @click.away="showModal=false">
                <h3 class="text-lg font-semibold mb-4">Detail Janji Temu</h3>

                <div class="space-y-2 text-sm">
                    <div><strong>Dokter:</strong> <span x-text="detail.dokter"></span></div>
                    <div><strong>Spesialis:</strong> <span x-text="detail.spesialis"></span></div>
                    <div><strong>Tanggal:</strong> <span x-text="detail.tanggal"></span></div>
                    <div><strong>Jam:</strong> <span x-text="detail.jam"></span></div>
                    <div><strong>Keluhan:</strong> <span x-text="detail.keluhan"></span></div>
                    <div><strong>Status:</strong> <span x-text="detail.status"></span></div>
                    <div><strong>Pembayaran:</strong> <span x-text="detail.pembayaran"></span></div>
                </div>

                <div class="mt-6 text-right">
                    <button @click="showModal=false" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection
