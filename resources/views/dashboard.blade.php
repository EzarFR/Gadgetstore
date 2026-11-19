
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-heading', 'Dashboard Gadget Store')

@section('content')

<style>
    .dashboard-page {
        color: #293650;
    }

    .dashboard-page .dashboard-subtitle {
        color: #71809b;
        font-size: 14px;
        margin-bottom: 25px;
    }

    .dashboard-page .card {
        background: #ffffff;
        border: 1px solid #e8edf5 !important;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(31, 51, 87, 0.06) !important;
        transition: all .2s ease;
    }

    .dashboard-page .card:hover {
        box-shadow: 0 6px 18px rgba(31, 51, 87, 0.11) !important;
    }

    .dashboard-page .card-body {
        padding: 22px;
    }

    /* Statistik */
    .stat-card {
        position: relative;
        overflow: hidden;
        min-height: 125px;
        border-top: 4px solid #3478f6 !important;
    }

    .stat-card.stat-green {
        border-top-color: #16a779 !important;
    }

    .stat-card.stat-cyan {
        border-top-color: #19a7ce !important;
    }

    .stat-card.stat-red {
        border-top-color: #ed5968 !important;
    }

    .stat-label {
        color: #71809b;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 9px;
    }

    .stat-number {
        color: #263653;
        font-size: 29px;
        font-weight: 700;
        margin: 0;
    }

    .stat-icon {
        width: 49px;
        height: 49px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 22px;
        background: #eaf1ff;
        color: #3478f6;
    }

    .stat-green .stat-icon {
        background: #e5f7ef;
        color: #16a779;
    }

    .stat-cyan .stat-icon {
        background: #e4f6fb;
        color: #1599bd;
    }

    .stat-red .stat-icon {
        background: #fff0f0;
        color: #ed5968;
    }

    /* Judul card */
    .dashboard-card-title {
        color: #293b5b;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 20px;
    }

    /* Grafik */
    .chart-container {
        position: relative;
        width: 100%;
        height: 300px;
    }

    .chart-container.chart-stock {
        height: 270px;
    }

    /* Nilai persediaan */
    .inventory-card {
        border-left: 4px solid #3478f6 !important;
    }

    .inventory-value {
        color: #2864dc;
        font-size: 27px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .inventory-description {
        font-size: 12px;
        line-height: 1.7;
        color: #8290a8;
    }

    /* Tabel */
    .dashboard-page .table {
        margin-bottom: 0;
        color: #53627e;
    }

    .dashboard-page .table thead th {
        background: #f4f7fc;
        color: #52627e;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        padding: 15px 13px;
        border-top: none;
        border-bottom: 1px solid #e5ebf4;
        white-space: nowrap;
    }

    .dashboard-page .table tbody td {
        padding: 15px 13px;
        font-size: 13px;
        border-color: #edf0f6;
        vertical-align: middle;
    }

    .dashboard-page .table tbody tr:hover {
        background: #f5f8ff;
    }

    .product-code {
        color: #3478f6;
        font-weight: 700;
    }

    .product-name {
        color: #293b5b;
        font-weight: 600;
    }

    .stock-badge {
        display: inline-block;
        padding: 5px 11px;
        border-radius: 6px;
        background: #e8f7ef;
        color: #16865c;
        font-size: 12px;
        font-weight: 700;
    }

    .dashboard-page .btn-outline-primary {
        border-color: #3478f6;
        color: #3478f6;
        border-radius: 7px;
        font-weight: 600;
    }

    .dashboard-page .btn-outline-primary:hover {
        background: #3478f6;
        color: white;
    }

    @media (max-width: 768px) {
        .dashboard-page .card-body {
            padding: 17px;
        }

        .stat-number {
            font-size: 25px;
        }

        .inventory-value {
            font-size: 22px;
        }
    }
</style>

<div class="dashboard-page">

    <!-- Deskripsi -->
    <div class="dashboard-subtitle">
        Ringkasan inventaris dan kondisi stok produk toko gadget.
    </div>

    <!-- Statistik -->
    <div class="row mb-4">

        <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Total Produk</div>
                            <h2 class="stat-number">{{ number_format($totalProducts) }}</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card stat-card stat-green h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Kategori</div>
                            <h2 class="stat-number">{{ number_format($totalCategories) }}</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card stat-card stat-cyan h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Total Unit Stok</div>
                            <h2 class="stat-number">{{ number_format($totalStock) }}</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-3">
            <div class="card stat-card stat-red h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-label">Stok Menipis (≤ 5)</div>
                            <h2 class="stat-number">{{ number_format($lowStockProducts) }}</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Grafik Produk dan Kondisi Stok -->
    <div class="row mb-4">

        <div class="col-lg-8 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="dashboard-card-title">
                        <i class="fas fa-chart-bar mr-2 text-primary"></i>
                        Jumlah Produk per Kategori
                    </h5>

                    <div class="chart-container">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="dashboard-card-title">
                        <i class="fas fa-chart-pie mr-2 text-primary"></i>
                        Komposisi Kondisi Stok
                    </h5>

                    <div class="chart-container chart-stock">
                        <canvas id="stockChart"></canvas>
                    </div>

                    <div class="small text-secondary mt-3">
                        Menipis: 0–5 unit • Cukup: 6–20 unit • Banyak: lebih dari 20 unit
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Grafik Stok dan Nilai Persediaan -->
    <div class="row mb-4">

        <div class="col-lg-8 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="dashboard-card-title">
                        <i class="fas fa-chart-column mr-2 text-primary"></i>
                        Total Unit Stok per Kategori
                    </h5>

                    <div class="chart-container">
                        <canvas id="stockByCategoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-3">
            <div class="card inventory-card h-100">
                <div class="card-body">
                    <h5 class="dashboard-card-title">
                        <i class="fas fa-wallet mr-2 text-primary"></i>
                        Estimasi Nilai Persediaan
                    </h5>

                    <h3 class="inventory-value">
                        Rp {{ number_format($inventoryValue, 0, ',', '.') }}
                    </h3>

                    <p class="inventory-description mb-0">
                        Perhitungan harga produk × jumlah stok.
                        Ini bukan omzet atau laba penjualan.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Produk Terbaru -->
    <div class="card mb-4">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="dashboard-card-title mb-0">
                    <i class="fas fa-box-open mr-2 text-primary"></i>
                    Produk Terbaru
                </h5>

                <a href="{{ route('products.index') }}"
                   class="btn btn-sm btn-outline-primary">
                    Lihat semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($latestProducts as $product)
                            <tr>
                                <td class="product-code">
                                    {{ $product->product_code }}
                                </td>

                                <td class="product-name">
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ $product->category->name }}
                                </td>

                                <td>
                                    Rp {{ number_format((float) $product->price, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="stock-badge">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">
                                    Belum ada data produk. Tambahkan produk untuk menampilkan analitik.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const categoryLabels = @json($categoryStats->pluck('name')->values());
    const productCounts = @json($categoryStats->pluck('product_count')->map(fn($v) => (int) $v)->values());
    const stockTotals = @json($categoryStats->pluck('stock_total')->map(fn($v) => (int) $v)->values());
    const stockStatus = @json($stockStatus);

    // Konfigurasi tampilan grafik
    Chart.defaults.font.family = "'Nunito', sans-serif";
    Chart.defaults.color = '#71809b';

    const chartGrid = {
        color: 'rgba(148, 163, 184, 0.15)',
        drawBorder: false
    };

    // Grafik Jumlah Produk per Kategori
    new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Jumlah produk',
                data: productCounts,
                backgroundColor: 'rgba(52, 120, 246, 0.75)',
                borderColor: '#3478f6',
                borderWidth: 1,
                borderRadius: 6,
                maxBarThickness: 48
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false }
                },
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 },
                    grid: chartGrid
                }
            }
        }
    });

    // Grafik Komposisi Kondisi Stok
    new Chart(document.getElementById('stockChart'), {
        type: 'doughnut',
        data: {
            labels: ['Stok menipis', 'Stok cukup', 'Stok banyak'],
            datasets: [{
                data: stockStatus,
                backgroundColor: [
                    '#EF5350',
                    '#F5B942',
                    '#18A879'
                ],
                borderWidth: 3,
                borderColor: '#ffffff',
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '68%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 16
                    }
                }
            }
        }
    });

    // Grafik Total Unit Stok per Kategori
    new Chart(document.getElementById('stockByCategoryChart'), {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Unit stok',
                data: stockTotals,
                backgroundColor: 'rgba(22, 167, 121, 0.75)',
                borderColor: '#16a779',
                borderWidth: 1,
                borderRadius: 6,
                maxBarThickness: 48
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false }
                },
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0 },
                    grid: chartGrid
                }
            }
        }
    });
</script>

@endpush
