@extends('admin.layouts.layout')

@section('title', 'Tambah Dokter Baru')

@section('admin_content')
    <!-- Header Konten -->
    <div>
        <div class="flex items-center space-x-2">
             <a href="#" class="text-blue-600 hover:text-blue-800">Manajemen Dokter</a>
             <svg class="h-4 w-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="text-gray-500">Tambah Dokter Baru</span>
        </div>
        <h3 class="text-2xl font-semibold text-gray-700 mt-2">Formulir Dokter Baru</h3>
        <p class="text-gray-500 mt-1">Isi detail di bawah ini untuk menambahkan dokter baru ke sistem.</p>
    </div>

    <!-- Form Tambah Dokter -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Kolom Kiri: Info Dasar -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap & Gelar</label>
                        <input type="text" name="full_name" id="full_name" placeholder="Contoh: Dr. Budi Santoso, Sp.A" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="specialization" class="block text-sm font-medium text-gray-700">Spesialisasi</label>
                        <input type="text" name="specialization" id="specialization" placeholder="Contoh: Dokter Anak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                     <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                        <input type="email" name="email" id="email" placeholder="contoh@kliniksehat.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                     <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="tel" name="phone" id="phone" placeholder="08xxxxxxxxxx" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                     <div>
                        <label for="license" class="block text-sm font-medium text-gray-700">Nomor Izin Praktik (SIP)</label>
                        <input type="text" name="license" id="license" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="biography" class="block text-sm font-medium text-gray-700">Biografi Singkat</label>
                        <textarea id="biography" name="biography" rows="4" placeholder="Jelaskan pengalaman dan keahlian dokter..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>
                </div>

                <!-- Kolom Kanan: Foto Profil -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Unggah file</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">atau tarik dan lepas</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 10MB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="pt-8 flex justify-end space-x-4">
                <a href="#" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan Dokter
                </button>
            </div>
        </form>
    </div>
@endsection
