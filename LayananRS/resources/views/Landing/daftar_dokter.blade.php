@extends('Landing.layouts.layout')

@section('landing_page_title')
    Klinik Sehat | Daftar Dokter
@endsection

@section('content')
    <!-- ===== Judul Halaman & Breadcrumb Start ===== -->
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold text-gray-800">Temukan Dokter Spesialis Anda</h1>
            <p class="text-gray-600 mt-1">Gunakan filter untuk menemukan dokter yang tepat.</p>
        </div>
    </section>
    <!-- ===== Judul Halaman & Breadcrumb End ===== -->

    <div class="container mx-auto px-6 py-12">
        <!-- Tombol Filter untuk Mobile -->
        <div class="lg:hidden mb-6">
            <button id="filter-toggle-button"
                class="w-full flex items-center justify-center gap-2 bg-white border border-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.572a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                </svg>
                Tampilkan Filter
            </button>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- ===== Area Filter Start ===== -->
            <aside id="filter-sidebar" class="hidden lg:block lg:w-1/4">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-6 border-b pb-4">Filter</h3>

                    <!-- Filter Spesialisasi -->
                    <div class="mb-6">
                        <label for="specialization"
                            class="block text-sm font-medium text-gray-700 mb-2">Spesialisasi</label>
                        <select id="specialization"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>Semua Spesialisasi</option>
                            <option>Dokter Anak</option>
                            <option>Dokter Gigi</option>
                            <option>Dokter Kulit</option>
                            <option>Dokter Umum</option>
                            <option>Dokter Kandungan</option>
                        </select>
                    </div>

                    <!-- Filter Rumah Sakit -->
                    <div class="mb-6">
                        <label for="hospital" class="block text-sm font-medium text-gray-700 mb-2">Rumah Sakit</label>
                        <select id="hospital"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>Semua Rumah Sakit</option>
                            <option>RS Sehat Sentosa</option>
                            <option>RS Harapan Bunda</option>
                            <option>Klinik Medika Utama</option>
                        </select>
                    </div>

                    <!-- Filter Hari Praktik -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Hari Praktik</h4>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="senin" type="checkbox"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="senin" class="ml-2 text-sm text-gray-600">Senin</label>
                            </div>
                            <div class="flex items-center">
                                <input id="selasa" type="checkbox"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="selasa" class="ml-2 text-sm text-gray-600">Selasa</label>
                            </div>
                            <div class="flex items-center">
                                <input id="rabu" type="checkbox"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="rabu" class="ml-2 text-sm text-gray-600">Rabu</label>
                            </div>
                            <!-- ... tambahkan hari lain ... -->
                        </div>
                    </div>

                    <!-- Filter Rating -->
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Rating</h4>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="rating-4" type="radio" name="rating"
                                    class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                <label for="rating-4" class="ml-2 text-sm text-gray-600 flex items-center">
                                    4 <svg class="w-4 h-4 text-yellow-400 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    & ke atas
                                </label>
                            </div>
                            <!-- ... tambahkan rating lain ... -->
                        </div>
                    </div>

                    <div class="mt-8 border-t pt-6">
                        <button
                            class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Terapkan
                            Filter</button>
                        <button
                            class="w-full mt-2 bg-transparent text-gray-600 font-bold py-2 px-4 rounded-lg hover:bg-gray-100 transition duration-300">Reset</button>
                    </div>
                </div>
            </aside>
            <!-- ===== Area Filter End ===== -->

            <!-- ===== Hasil Pencarian & Grid Dokter Start ===== -->
            <div class="flex-1">
                <!-- Bar Info Hasil & Urutkan -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                    <p class="text-gray-600 mb-2 sm:mb-0">Menampilkan 6 dari 25 dokter</p>
                    <select class="border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option>Urutkan berdasarkan: Relevansi</option>
                        <option>Rating Tertinggi</option>
                        <option>Nama (A-Z)</option>
                    </select>
                </div>

                <!-- Grid Kartu Dokter -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                    <!-- Kartu Dokter 1 -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img class="w-full h-48 object-cover" src="https://placehold.co/400x300/3B82F6/FFFFFF?text=Dr.+Andi"
                            alt="Foto Dr. Andi Budiman">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800">Dr. Andi Budiman, Sp.A</h3>
                            <p class="text-blue-600 font-semibold mt-1">Dokter Anak</p>
                            <div class="flex items-center mt-3 text-sm text-gray-500">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span>4.9 (150 ulasan)</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">RS Sehat Sentosa</p>
                            <a href="{{ route('jadwal.dokter', ['id' => 1]) }}"
                                class="mt-6 block w-full text-center bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Lihat
                                Profil & Jadwal</a>
                        </div>
                    </div>

                    <!-- Kartu Dokter 2 -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img class="w-full h-48 object-cover"
                            src="https://placehold.co/400x300/14B8A6/FFFFFF?text=Dr.+Citra" alt="Foto Dr. Citra Ayu">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800">Dr. Citra Ayu, Sp.KK</h3>
                            <p class="text-teal-600 font-semibold mt-1">Dokter Kulit</p>
                            <div class="flex items-center mt-3 text-sm text-gray-500">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span>4.8 (124 ulasan)</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Klinik Medika Utama</p>
                            <a href="#"
                                class="mt-6 block w-full text-center bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Lihat
                                Profil & Jadwal</a>
                        </div>
                    </div>

                    <!-- ... Tambahkan lebih banyak kartu dokter di sini ... -->
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                        <img class="w-full h-48 object-cover"
                            src="https://placehold.co/400x300/F97316/FFFFFF?text=Dr.+Bambang" alt="Foto Dr. Bambang">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-800">Drg. Bambang Eko</h3>
                            <p class="text-orange-600 font-semibold mt-1">Dokter Gigi</p>
                            <div class="flex items-center mt-3 text-sm text-gray-500">
                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <span>4.9 (210 ulasan)</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">RS Harapan Bunda</p>
                            <a href="#"
                                class="mt-6 block w-full text-center bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300">Lihat
                                Profil & Jadwal</a>
                        </div>
                    </div>

                </div>

                <!-- Paginasi -->
                <nav class="mt-12 flex justify-center">
                    <ul class="flex items-center -space-x-px h-10 text-base">
                        <li><a href="#"
                                class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Sebelumnya</a>
                        </li>
                        <li><a href="#" aria-current="page"
                                class="z-10 flex items-center justify-center px-4 h-10 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">1</a>
                        </li>
                        <li><a href="#"
                                class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">2</a>
                        </li>
                        <li><a href="#"
                                class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Berikutnya</a>
                        </li>
                    </ul>
                </nav>

            </div>
            <!-- ===== Hasil Pencarian & Grid Dokter End ===== -->
        </div>
    </div>
@endsection
