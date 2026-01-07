@extends('admin.layouts.layout')

@section('admin_page_title')
    Create Faq - RS Prima Sehat
@endsection

@section('admin_content')
    <div>
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
            <a href="{{ route('admin.manage.faq') }}" class="hover:text-blue-600">Manajemen FAQ</a>
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span>Tambah Baru</span>
        </div>
        <h3 class="text-2xl font-semibold text-gray-700">Tambah FAQ Baru</h3>
    </div>

    <div class="mt-6 bg-white rounded-lg shadow-md p-6 max-w-3xl">
        <form action="{{ route('admin.store.faq') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <!-- Pertanyaan -->
                <div>
                    <label for="question" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                    <input type="text" name="question" id="question" value="{{ old('question') }}"
                        placeholder="Contoh: Bagaimana cara membatalkan janji temu?" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('question')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jawaban -->
                <div>
                    <label for="answer" class="block text-sm font-medium text-gray-700">Jawaban</label>
                    <textarea id="answer" name="answer" rows="5" placeholder="Tuliskan jawaban yang jelas dan membantu..."
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('answer') }}</textarea>
                    @error('answer')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="pt-6 flex justify-end space-x-3">
                <a href="{{ route('admin.manage.faq') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan FAQ
                </button>
            </div>
        </form>
    </div>
@endsection
