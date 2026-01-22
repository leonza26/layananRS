@extends('pasien.layouts.layout')

@section('title', 'Pembayaran')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-blue-600 px-6 py-4">
            <h2 class="text-xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
                Selesaikan Pembayaran
            </h2>
        </div>

        <div class="p-6">
            <div class="text-center mb-8">
                <p class="text-gray-500 mb-2">Total Tagihan</p>
                <h1 class="text-4xl font-extrabold text-gray-800">Rp
                    {{ number_format($appointment->payment->amount, 0, ',', '.') }}</h1>
                <p class="text-sm text-gray-400 mt-2">Order ID: {{ $appointment->payment->transaction_id }}</p>
            </div>

            <div class="border-t border-b border-gray-200 py-4 mb-6 space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Dokter</span>
                    <span class="font-medium text-gray-800">{{ $appointment->doctor->user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Jadwal</span>
                    <span class="font-medium text-gray-800">
                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->translatedFormat('l, d F Y - H:i') }} WIB
                    </span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Status</span>
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Menunggu Pembayaran
                    </span>
                </div>
            </div>

            <button id="pay-button"
                class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:-translate-y-1 shadow-md">
                Bayar Sekarang
            </button>

            <a href="{{ route('pasien.riwayat') }}"
                class="block text-center mt-4 text-sm text-gray-500 hover:text-gray-700">
                Kembali ke Riwayat (Bayar Nanti)
            </a>
        </div>
    </div>

    <!-- Script Midtrans Snap -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $appointment->payment->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // Redirect ke halaman riwayat dengan pesan sukses
                    window.location.href = "{{ route('pasien.riwayat') }}?status=success";
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("Menunggu pembayaran Anda!");
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("Pembayaran gagal!");
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        };
    </script>
@endsection
