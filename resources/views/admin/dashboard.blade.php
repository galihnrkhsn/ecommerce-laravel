@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card card-stat bg-primary text-white">
                <div class="card-body">
                    <h5>Total User</h5>
                    <p class="fs-4">{{ $totalUser }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat bg-success text-white">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <p class="fs-4">{{ $totalProduk }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat bg-warning text-dark">
                <div class="card-body">
                    <h5>Total Pendapatan</h5>
                    <p class="fs-5">Rp {{ number_format($totalPendapatan) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-stat bg-info text-white">
                <div class="card-body">
                    <h5>Total Artikel</h5>
                    <p class="fs-4">{{ $totalArtikel }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Chart -->
    <section class="chart-section">
        <h3>Stok Produk</h3>
        <canvas id="stokChart" height="100"></canvas>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('stokChart').getContext('2d');
    const stokChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(\App\Models\Produk::pluck('nm_produk')) !!},
            datasets: [{
                label: 'Stok Produk',
                data: {!! json_encode(\App\Models\Produk::pluck('stok')) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderRadius: 8,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endsection
