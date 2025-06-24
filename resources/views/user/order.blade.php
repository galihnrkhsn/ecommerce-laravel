@extends('layouts.app')

@section('title', 'Orderan Saya')

@section('content')

<style>
    .orders-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.4s ease forwards;
        opacity: 0;
    }

    .orders-container h4 {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        text-align: center;
        color: #333;
    }

    .alert-success {
        background-color: #d4edda;
        padding: 1rem;
        border-radius: 8px;
        color: #155724;
        margin-bottom: 1.25rem;
        border: 1px solid #c3e6cb;
    }

    table.order-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.95rem;
    }

    table.order-table th,
    table.order-table td {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid #e0e0e0;
        text-align: left;
    }

    table.order-table th {
        background-color: #f8f8f8;
        color: #444;
        font-weight: 600;
    }

    table.order-table tr:hover {
        background-color: #f5f5f5;
    }

    .btn-small {
        padding: 0.4rem 0.75rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 0.85rem;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.25s ease;
    }

    .btn-small:hover {
        background-color: #0056b3;
    }

    .text-warning {
        color: #d39e00;
        font-weight: 500;
    }

    .text-success {
        color: #28a745;
        font-weight: 500;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }
</style>

<div class="orders-container">
    <h4>🧾 Orderan Saya</h4>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table class="order-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->tgl_order)->format('d M Y') }}</td>
                    <td>Rp {{ number_format($order->total_order) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        @if($order->status === 'Belum Dibayar')
                            <a href="{{ route('bayar.form', $order->id_order) }}" class="btn-small">Bayar</a>
                        @elseif($order->status === 'Menunggu Verifikasi')
                            <span class="text-warning">Menunggu Verifikasi</span>
                        @else
                            <span class="text-success">Selesai / Diproses</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="text-align: center; padding: 1rem;">Belum ada order.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    // Tambahkan efek smooth scroll ke atas saat halaman dimuat
    window.onload = () => {
        document.querySelector('.orders-container').scrollIntoView({ behavior: 'smooth' });
    };
</script>

@endsection
