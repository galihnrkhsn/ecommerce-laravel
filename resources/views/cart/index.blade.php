@extends('layouts.app')

@section('title', 'Keranjang')

@section('content')

<style>
    .cart-container {
        max-width: 800px;
        margin: 0 auto;
        background: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    }

    .cart-container h4 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
    }

    .cart-table th, .cart-table td {
        padding: 0.75rem;
        border-bottom: 1px solid #eaeaea;
        text-align: left;
    }

    .cart-table tr:hover {
        background-color: #f9f9f9;
        transition: 0.2s ease;
    }

    .cart-table th {
        background-color: #f0f0f0;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 0.6rem;
        margin-bottom: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 0.95rem;
    }

    .btn-checkout {
        padding: 0.75rem 1.5rem;
        background-color: #38b000;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-checkout:hover {
        background-color: #2d9400;
    }

    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 6px;
        color: #721c24;
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
    }

    @media (max-width: 600px) {
        .cart-container {
            padding: 1rem;
        }

        .cart-table th, .cart-table td {
            font-size: 0.9rem;
        }
    }
</style>

<div class="cart-container">
    <h4>🛒 Keranjang Saya</h4>

    @if(session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('cart.checkout') }}">
        @csrf

        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cart as $id => $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>Rp {{ number_format($item['harga']) }}</td>
                        <td>
                            <form action="{{ route('cart.decrease', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm">-</button>
                            </form>

                            <span>{{ $item['qty'] }}</span>

                            <form action="{{ route('cart.increase', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm">+</button>
                            </form>
                        </td>

                        <td>Rp {{ number_format($item['harga'] * $item['qty']) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4">Keranjang kosong</td></tr>
                @endforelse
            </tbody>
        </table>

        <h5 style="margin-bottom: 1rem;">Total: <strong>Rp {{ number_format($total) }}</strong></h5>

        <hr>
        <h6 style="margin-bottom: 0.75rem;">Data Pengiriman</h6>

        <input name="nm_penerima" class="form-control" placeholder="Nama penerima" required>
        <input name="telp" class="form-control" type="number" placeholder="No. HP" required>
        <input name="provinsi" class="form-control" placeholder="Provinsi" required>
        <input name="kota" class="form-control" placeholder="Kota" required>
        <input name="kode_pos" class="form-control" placeholder="Kode Pos" required>
        <textarea name="alamat" class="form-control" placeholder="Alamat lengkap" rows="3" required></textarea>

        <button class="btn-checkout">Checkout Sekarang</button>
    </form>
</div>

<script>
    // Tambahan animasi ringan saat submit
    const form = document.querySelector('form');
    form.addEventListener('submit', () => {
        const button = form.querySelector('.btn-checkout');
        button.disabled = true;
        button.textContent = 'Memproses...';
    });
</script>

@endsection
