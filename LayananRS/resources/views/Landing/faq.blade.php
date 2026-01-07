@extends('Landing.layouts.layout')

@section('landing_page_title')
    RS Prima Sehat | FAQ
@endsection

@section('content')
    <section class="bg-white py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-800 dark:text-blue mb-4">Pertanyaan yang Sering Diajukan (FAQ)
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-600">Temukan jawaban atas pertanyaan umum Anda tentang layanan
                    kami.</p>
            </div>

            <div class="max-w-3xl mx-auto">
                {{-- 1. Filter dulu FAQ yang statusnya aktif (is_active == 1 atau true) --}}
                @php
                    $activeFaqs = $faqs->where('is_active', true);
                @endphp

                {{-- 2. Cek apakah ada FAQ yang aktif --}}
                @if ($activeFaqs->isNotEmpty())
                    {{-- 3. Jika ADA, lakukan looping pada hasil filter ($activeFaqs) --}}
                    @foreach ($activeFaqs as $faq)
                        <div class="mb-6 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-md transition hover:shadow-lg">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">
                                {{ $faq->question }}
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{ $faq->answer }}
                            </p>
                        </div>
                    @endforeach
                @else
                    {{-- 4. Jika TIDAK ADA satupun yang aktif --}}
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <p class="text-gray-500">Tidak ada FAQ yang tersedia saat ini.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
