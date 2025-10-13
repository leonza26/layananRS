@extends('Dokter.layouts.layout')

@section('title', 'Jadwal Saya')

@section('content')
    <!-- Modal Tambah Jadwal -->
    <div x-data="{ isModalOpen: false }" x-cloak>
        <div x-show="isModalOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">

            <div @click.away="isModalOpen = false"
                 x-show="isModalOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-90"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-90"
                 class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Slot Jadwal Baru</h3>

                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" id="date" name="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
                            <input type="time" id="start_time" name="start_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="end_time" class="block text-sm font-medium text-gray-700">Waktu Selesai</label>
                            <input type="time" id="end_time" name="end_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="flex items-center">
                        <input id="repeat" name="repeat" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="repeat" class="ml-2 block text-sm text-gray-900">Ulangi setiap minggu pada hari ini</label>
                    </div>
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" @click="isModalOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Batal</button>
                        <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan Jadwal</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Header Konten -->
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <div>
                <h3 class="text-2xl font-semibold text-gray-700">Jadwal Saya</h3>
                <p class="text-gray-500 mt-1">Kelola slot waktu praktik Anda di sini.</p>
            </div>
            <button @click="isModalOpen = true" class="mt-4 sm:mt-0 w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah Slot Jadwal
            </button>
        </div>

        <!-- Kalender -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <!-- Header Kalender -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-2">
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <h4 class="text-lg font-semibold text-gray-700">Oktober 2025</h4>
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Grid Kalender -->
            <div class="grid grid-cols-7 gap-px border-t border-l border-gray-200 bg-gray-200">
                <!-- Header Hari -->
                <div class="text-center py-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase">Min</div>
                <div class="text-center py-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase">Sen</div>
                <div class="text-center py-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase">Sel</div>
                <div class="text-center py-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase">Rab</div>
                <div class="text-center py-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase">Kam</div>
                <div class="text-center py-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase">Jum</div>
                <div class="text-center py-2 bg-gray-50 text-xs font-medium text-gray-500 uppercase">Sab</div>

                <!-- Baris Tanggal -->
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="text-sm text-gray-400">28</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="text-sm text-gray-400">29</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="text-sm text-gray-400">30</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="font-semibold">1</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="font-semibold">2</span>
                    <div class="mt-1 text-xs bg-blue-100 text-blue-800 rounded px-1 cursor-pointer">09:00 - 12:00</div>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="font-semibold">3</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="font-semibold">4</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="font-semibold">5</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto">
                    <span class="font-semibold">6</span>
                </div>
                <div class="bg-white h-32 p-2 overflow-y-auto relative">
                     <span class="font-semibold text-white bg-blue-600 rounded-full h-6 w-6 flex items-center justify-center">7</span>
                    <div class="mt-1 text-xs bg-green-100 text-green-800 rounded px-1 cursor-pointer">13:00 - 17:00</div>
                    <div class="mt-1 text-xs bg-red-100 text-red-800 rounded px-1 cursor-pointer">Andi (14:00)</div>
                </div>
                <!-- Tanggal lainnya -->

            </div>
        </div>
    </div>
@endsection
