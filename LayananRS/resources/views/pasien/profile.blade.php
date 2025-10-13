@extends('pasien.layouts.layout')

@section('title', 'Profil Saya')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-semibold text-gray-800">Profil Saya</h2>
        <p class="text-gray-500 mt-1">Di sini Anda dapat mengelola detail informasi pribadi Anda.</p>
        <!-- Konten form profil akan ditambahkan di sini -->
        <div class="mt-6">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="Nama Pasien" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="email@email.com" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" value="08123456789" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="address" id="address" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">Jl. Kesehatan No. 123, Jakarta</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
