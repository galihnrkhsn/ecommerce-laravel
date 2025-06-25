@extends('layouts.app')

@section('title', $produk->nm_produk)

@section('content')
<style>
    .detail-container {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        padding: 2rem 1rem;
        background-color: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        max-width: 900px;
        margin: 2rem auto;
    }

    .detail-image {
        flex: 1;
        min-width: 300px;
    }

    .detail-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .detail-info {
        flex: 1;
        min-width: 300px;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .detail-info h2 {
        font-size: 1.6rem;
        margin-bottom: 0;
    }

    .detail-info p {
        color: #555;
        line-height: 1.6;
    }

    .detail-info .price {
        font-size: 1.3rem;
        font-weight: bold;
        color: #38b000;
    }

    .detail-info .qty {
        font-size: 1rem;
        font-weight: 500;
        color: #888;
    }

    .qty-control {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .qty-control button {
        padding: 0.4rem 0.8rem;
        font-size: 1.1rem;
        border: none;
        background-color: #38b000;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .qty-control button:hover {
        background-color: #2f8f00;
    }

    .qty-control input {
        width: 60px;
        text-align: center;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 0.4rem;
    }

    .btn-beli {
        background-color: #38b000;
        color: white;
        border: none;
        padding: 0.7rem 1.2rem;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.25s ease;
        width: fit-content;
        margin-top: 1rem;
    }

    .btn-beli:hover {
        background-color: #2f8f00;
    }
</style>

<div class="detail-container">
    <div class="detail-image">
        @if ($produk->gambar)
            <img src="{{ asset('img/produk/' . $produk->gambar) }}" alt="{{ $produk->nm_produk }}">
        @else
            <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No Image">
        @endif
    </div>

    <div class="detail-info">
        <h2>{{ $produk->nm_produk }}</h2>
        <div class="price">Rp {{ number_format($produk->harga) }}</div>
        <div class="qty">Stok tersedia: {{ $produk->stok }}</div>
        <p><strong>Kategori:</strong> {{ $produk->kategori->nm_kategori ?? '-' }}</p>
        <p><strong>Deskripsi:</strong> {{ $produk->deskripsi }}</p>

        @auth
            <form method="POST" action="{{ url('/add-to-cart/' . $produk->id_produk) }}">
                @csrf

                <div class="qty-control">
                    <button type="button" onclick="changeQty(-1)">−</button>
                    <input type="number" name="qty" id="qtyInput" min="1" max="{{ $produk->stok }}" value="1" required>
                    <button type="button" onclick="changeQty(1)">+</button>
                </div>

                <button class="btn-beli" type="submit">+ Tambah ke Keranjang</button>
            </form>
        @else
            <a href="{{ route('user.login') }}" class="btn-beli">Login untuk Membeli</a>
        @endauth
    </div>
</div>

<script>
    function changeQty(change) {
        const input = document.getElementById('qtyInput');
        let current = parseInt(input.value) || 1;
        const min = parseInt(input.min);
        const max = parseInt(input.max);

        let newVal = current + change;
        if (newVal < min) newVal = min;
        if (newVal > max) newVal = max;

        input.value = newVal;
    }
</script>
@endsection
