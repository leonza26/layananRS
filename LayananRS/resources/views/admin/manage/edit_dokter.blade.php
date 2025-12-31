@extends('admin.layouts.layout')

@section('title', 'Edit Dokter - RS Prima Sehat ')


@section('admin_content')

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('admin.update.dokter', $doctor->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Kolom Kiri: Input Data -->
                            <div class="lg:col-span-2 space-y-6">

                                <!-- Bagian 1: Akun Login (Tabel Users) -->
                                <div class="bg-blue-50 p-4 rounded-md border border-blue-100">
                                    <h4 class="font-semibold text-blue-800 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        Data Dokter
                                    </h4>
                                    <div class="grid grid-cols-1 gap-4">
                                        <!-- Nama -->
                                        <div>
                                            <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                                Lengkap & Gelar</label>
                                            <input type="text" name="name" id="name" value="{{ old('name', $doctor->user->name) }}"
                                                placeholder="Contoh: Dr. Budi Santoso, Sp.A" required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('name') border-red-500 @enderror">
                                            @error('name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div>
                                            <label for="email" class="block text-sm font-medium text-gray-700">Alamat
                                                Email</label>
                                            <input type="email" name="email" id="email"
                                                value="{{ old('email', $doctor->user->email) }}" placeholder="dokter@kliniksehat.com"
                                                required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('email') border-red-500 @enderror">
                                            @error('email')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <!-- Bagian 2: Data Profesional (Tabel Doctors) -->
                                <div class="p-4 border rounded-md">
                                    <h4 class="font-semibold text-gray-700 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                            </path>
                                        </svg>
                                        Informasi Profesional
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Spesialisasi -->
                                        <div>
                                            <label for="specialization"
                                                class="block text-sm font-medium text-gray-700">Spesialisasi</label>
                                            <input type="text" name="specialization" id="specialization"
                                                value="{{ old('specialization', $doctor->specialization) }}" placeholder="Contoh: Dokter Anak"
                                                required
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('specialization') border-red-500 @enderror">
                                            @error('specialization')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Biaya Konsultasi -->
                                        <div>
                                            <label for="consultaion_fee"
                                                class="block text-sm font-medium text-gray-700">Biaya Konsultasi
                                                (Rp)</label>
                                            <input type="number" name="consultaion_fee" id="consultaion_fee"
                                                value="{{ old('consultaion_fee', $doctor->consultaion_fee) }}" placeholder="150000" required
                                                min="0"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('consultaion_fee') border-red-500 @enderror">
                                            @error('consultaion_fee')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Biografi -->
                                    <div class="mt-4">
                                        <label for="biography" class="block text-sm font-medium text-gray-700">Biografi
                                            Singkat</label>
                                        <textarea id="biography" name="biography" rows="4" placeholder="Jelaskan pengalaman dan keahlian dokter..."
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('biography', $doctor->biography) }}</textarea>
                                        @error('biography')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Foto Profil -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                                <div
                                    class="mt-1 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md bg-gray-50 hover:bg-gray-100 transition min-h-[200px]">
                                    <!-- Tampilkan foto yang ada atau placeholder -->
                                    <img id="image-preview" src="{{ $doctor->photo_url ?? '#' }}"
                                        alt="Pratinjau Gambar"
                                        class="{{ $doctor->photo_url ? '' : 'hidden' }} max-h-48 rounded-md shadow-sm" />
                                    <div id="image-upload-placeholder"
                                        class="space-y-1 text-center {{ $doctor->photo_url ? 'hidden' : '' }}">
                                         <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                            viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="photo"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500 px-2">
                                                <span id="file-name-display">Unggah file baru</span>
                                                <input id="photo" name="photo" type="file" class="sr-only"
                                                    accept="image/*">
                                            </label>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG hingga 2MB</p>
                                    </div>
                                </div>
                                @error('photo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="pt-8 flex justify-end space-x-4 border-t mt-6">
                            <a href="{{ route('admin.manage.dokter') }}"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function togglePasswordVisibility() {
            const password = document.getElementById('password');
            const passwordConfirmation = document.getElementById('password_confirmation');
            if (password.type === 'password') {
                password.type = 'text';
                passwordConfirmation.type = 'text';
            } else {
                password.type = 'password';
                passwordConfirmation.type = 'password';
            }
        }

        document.getElementById('photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                const imagePreview = document.getElementById('image-preview');
                const placeholder = document.getElementById('image-upload-placeholder');
                const fileNameDisplay = document.getElementById('file-name-display');

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }

                reader.readAsDataURL(file);
                fileNameDisplay.textContent = file.name;
            }
        });
    </script>
    @endpush

@endsection
