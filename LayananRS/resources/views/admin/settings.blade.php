@extends('admin.layouts.layout')

@section('admin_page_title')
    Setting - RS Prima Sehat
@endsection

@section('admin_content')
    <div>
        <h3 class="text-2xl font-semibold text-gray-700">Pengaturan</h3>
    </div>

    <div x-data="{ tab: 'profile' }" class="mt-8">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button @click="tab = 'profile'" :class="{ 'border-blue-500 text-blue-600': tab === 'profile', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'profile' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Profil
                </button>
                <button @click="tab = 'security'" :class="{ 'border-blue-500 text-blue-600': tab === 'security', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'security' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Keamanan
                </button>
                 <button @click="tab = 'general'" :class="{ 'border-blue-500 text-blue-600': tab === 'general', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'general' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Umum
                </button>
            </nav>
        </div>

        <!-- Tabs Content -->
        <div class="mt-6">
            <!-- Profile Tab Content -->
            <div x-show="tab === 'profile'" x-cloak class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-700 mb-4">Informasi Profil</h4>
                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="Admin Utama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                        <input type="email" name="email" id="email" value="admin@kliniksehat.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Security Tab Content -->
            <div x-show="tab === 'security'" x-cloak class="bg-white p-6 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-700 mb-4">Ubah Password</h4>
                 <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                        <input type="password" name="current_password" id="current_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                        <input type="password" name="new_password" id="new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div class="pt-2">
                         <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>

            <!-- General Tab Content -->
            <div x-show="tab === 'general'" x-cloak class="bg-white p-6 rounded-lg shadow-md">
                 <h4 class="text-lg font-semibold text-gray-700 mb-4">Pengaturan Umum</h4>
                 <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="site_name" class="block text-sm font-medium text-gray-700">Nama Situs</label>
                        <input type="text" name="site_name" id="site_name" value="RS Prima Sehat " class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                     <div class="pt-2">
                         <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


