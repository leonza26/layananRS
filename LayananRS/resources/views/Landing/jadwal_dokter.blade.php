@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat  | Jadwal Dokter
@endsection

@section('content')
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <!-- ===== Bagian Profil Dokter Start ===== -->
        <section class="flex flex-col md:flex-row gap-8 pb-8 border-b">
            <!-- Foto Dokter -->
            <div class="md:w-1/3 text-center">
                <img class="w-48 h-48 rounded-full mx-auto object-cover shadow-md"
                    src="{{ $dokters->dokter->photo_url ? asset('storage/' . $dokters->dokter->photo_url) : 'https://placehold.co/400x400/3B82F6/FFFFFF?text=' . urlencode($dokters->name) }}" alt="{{ $dokters->name }}">
            </div>
            <!-- Detail Info Dokter -->
            <div class="md:w-2/3">
                <h1 class="text-3xl font-bold text-gray-800">{{ $dokters->name }}</h1>
                <p class="text-blue-600 font-semibold text-lg mt-1">{{ $dokters->dokter->specialization }}</p>
                <div class="flex items-center mt-3 text-gray-600">
                    <svg class="w-5 h-5 text-yellow-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>4.9 (150 ulasan)</span>
                </div>
                <p class="text-gray-600 mt-4 leading-relaxed">
                    {{ $dokters->dokter->bio ?? 'Dokter ' . $dokters->name . ' adalah seorang profesional medis yang berdedikasi dengan pengalaman luas dalam bidang ' . $dokters->dokter->specialization . '. Dengan pendekatan yang penuh perhatian dan pengetahuan mendalam, dokter ini berkomitmen untuk memberikan perawatan terbaik bagi setiap pasiennya.' }}
                </p>
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-700">Praktik di:</h3>
                    <p class="text-gray-600">RS Sehat Sentosa, Jakarta</p>
                </div>
            </div>
        </section>
        <!-- ===== Bagian Profil Dokter End ===== -->

        <!-- ===== Bagian Jadwal Dokter Start ===== -->
        <section class="mt-10">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Pilih Jadwal Konsultasi</h2>

            <!-- Navigasi Tanggal/Minggu -->
            <div class="flex justify-between items-center mb-6">
                <button class="p-2 rounded-full hover:bg-gray-100" title="Minggu Sebelumnya (Fungsi belum aktif)">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <h3 class="text-lg font-semibold text-gray-700">{{ $weekRange }}</h3>
                <button class="p-2 rounded-full hover:bg-gray-100" title="Minggu Berikutnya (Fungsi belum aktif)">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <!-- Grid Hari & Slot Waktu -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach ($weeklySchedule as $day)
                    <div class="border p-4 rounded-lg @if ($day['status'] !== 'Tersedia') bg-gray-50 @endif">
                        <h4 class="font-bold text-center">{{ $day['dayName'] }}</h4>
                        <p class="text-sm text-gray-500 text-center mb-4">{{ $day['date'] }}</p>

                        @if ($day['status'] === 'Tersedia')
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($day['slots'] as $slot)
                                    <a href="{{ route('pasien.booking', ['dokter_id' => $dokters->dokter->id, 'date' => $day['date_raw'], 'time' => $slot]) }}"
                                        class="px-3 py-2 text-sm text-center font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 transition">
                                        {{ $slot }}
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center text-gray-500 text-sm mt-4">{{ $day['status'] }}</div>
                        @endif
                    </div>
                @endforeach

            </div>
        </section>
        <!-- ===== Bagian Jadwal Dokter End ===== -->
    </div>
@endsection
