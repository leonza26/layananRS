@extends('admin.layouts.layout')

@section('admin_page_title')
    Laporan & Analitik - Klinik Sehat
@endsection

@section('admin_content')
    <div class="flex flex-col sm:flex-row justify-between items-center">
        <h3 class="text-2xl font-semibold text-gray-700">Laporan & Analitik</h3>
        <div class="mt-4 sm:mt-0">
            <input type="date" class="form-input rounded-md border-gray-300">
            <span class="mx-2 text-gray-500">to</span>
            <input type="date" class="form-input rounded-md border-gray-300">
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-sm font-medium text-gray-500">Total Pendapatan</h4>
            <p class="text-3xl font-bold text-gray-800 mt-2">Rp 125.000.000</p>
            <p class="text-sm text-green-500 mt-1">+15% dari bulan lalu</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-sm font-medium text-gray-500">Total Janji Temu</h4>
            <p class="text-3xl font-bold text-gray-800 mt-2">1,250</p>
            <p class="text-sm text-green-500 mt-1">+10% dari bulan lalu</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-sm font-medium text-gray-500">Pasien Baru</h4>
            <p class="text-3xl font-bold text-gray-800 mt-2">85</p>
            <p class="text-sm text-red-500 mt-1">-5% dari bulan lalu</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-sm font-medium text-gray-500">Rata-rata Rating</h4>
            <p class="text-3xl font-bold text-gray-800 mt-2">4.8 <span class="text-yellow-400">★</span></p>
            <p class="text-sm text-gray-500 mt-1">Berdasarkan 250 ulasan</p>
        </div>
    </div>

    <!-- Main Chart -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h4 class="text-lg font-semibold text-gray-700">Tren Pendapatan Bulanan (2025)</h4>
        <div class="mt-4">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>
@endsection


@push('scripts')
    <!-- Chart.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt'],
                    datasets: [{
                        label: 'Pendapatan (Juta Rp)',
                        data: [50, 65, 80, 75, 90, 110, 100, 120, 115, 125],
                        borderColor: 'rgba(59, 130, 246, 1)',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush
