@extends('admin.layouts.layout')

@section('admin_page_title')
    Manajemen Pasien - Klinik Sehat
@endsection

@section('admin_content')
    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-semibold text-gray-700">Manajemen Pasien</h3>
        <!-- Tombol Tambah Pasien mungkin tidak diperlukan jika pendaftaran hanya dari sisi user -->
    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h4 class="text-lg font-semibold text-gray-700">Daftar Pasien</h4>
            <input class="form-input rounded-md border-gray-300" type="text" placeholder="Cari pasien...">
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Pasien</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.
                            Telepon</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                            Bergabung</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Andi Saputra</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">andi.saputra@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">081234567890</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">01 Okt 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Citra Lestari</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">citra.lestari@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">085678901234</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">29 Sep 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                            <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                        </td>
                    </tr>
                    <!-- Data lainnya bisa ditambahkan di sini -->
                </tbody>
            </table>
        </div>
    </div>
@endsection
