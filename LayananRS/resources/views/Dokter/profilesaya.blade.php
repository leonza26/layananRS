@extends('Dokter.layouts.layout')

@section('title', 'Profil Saya')

@section('content')
    <!-- Header Konten -->
    <div>
        <h3 class="text-2xl font-semibold text-gray-700">Profil Saya</h3>
        <p class="text-gray-500 mt-1">Kelola informasi profil dan keamanan akun Anda.</p>
    </div>

    <div class="mt-8 bg-white rounded-lg shadow-md">
        <div x-data="{ tab: 'personal' }">
            <!-- Navigasi Tab -->
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 px-6" aria-label="Tabs">
                    <button @click="tab = 'personal'" :class="{ 'border-blue-500 text-blue-600': tab === 'personal', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'personal' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Informasi Pribadi
                    </button>
                    <button @click="tab = 'professional'" :class="{ 'border-blue-500 text-blue-600': tab === 'professional', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'professional' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Data Profesional
                    </button>
                    <button @click="tab = 'security'" :class="{ 'border-blue-500 text-blue-600': tab === 'security', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'security' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Keamanan
                    </button>
                </nav>
            </div>

            <!-- Konten Tab -->
            <div class="p-6">
                <!-- Tab Informasi Pribadi -->
                <div x-show="tab === 'personal'" x-cloak>
                    <form action="#" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" name="full_name" id="full_name" value="Dr. Budi Santoso" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                             <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                                <input type="email" name="email" id="email" value="dr.budi.s@example.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                        <div>
                             <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                             <input type="tel" name="phone" id="phone" value="081234567890" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                         <div>
                            <label for="avatar" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                            <div class="mt-2 flex items-center space-x-4">
                                <img class="h-16 w-16 rounded-full object-cover" src="https://placehold.co/100x100/E2E8F0/4A5568?text=D" alt="Current avatar">
                                <input type="file" name="avatar" id="avatar" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                        </div>
                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

                <!-- Tab Data Profesional -->
                <div x-show="tab === 'professional'" x-cloak>
                    <form action="#" method="POST" class="space-y-6">
                         <div>
                            <label for="specialization" class="block text-sm font-medium text-gray-700">Spesialisasi</label>
                            <input type="text" name="specialization" id="specialization" value="Dokter Umum" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                         <div>
                            <label for="license" class="block text-sm font-medium text-gray-700">Nomor Izin Praktik (SIP)</label>
                            <input type="text" name="license" id="license" value="12345/SIP/DINKES/2025" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                         <div>
                            <label for="biography" class="block text-sm font-medium text-gray-700">Biografi Singkat</label>
                            <textarea id="biography" name="biography" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">Berpengalaman lebih dari 10 tahun sebagai dokter umum di berbagai rumah sakit terkemuka.</textarea>
                        </div>
                        <div class="pt-4 flex justify-end">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>

                 <!-- Tab Keamanan -->
                <div x-show="tab === 'security'" x-cloak>
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                            <input type="password" name="current_password" id="current_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                         <div class="pt-4 flex justify-end">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Ubah Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
