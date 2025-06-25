@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero">
        <div class="hero-text">
            <h1>MEGA SALE</h1>
            <p>MODEL TERBARU • GARANSI 2 TAHUN • HARGA BERSAING</p>
        </div>
    </section>


    {{-- Artikel Terbaru --}}
    <section class="highlight">
        <h2><span class="blue">ARTIKEL</span> TERBARU</h2>
        <p class="text-center">
            Temukan berbagai informasi terbaru seputar dunia elektronik hanya di toko kami. Kami menyajikan artikel-artikel menarik mengenai produk-produk terbaru, inovasi teknologi terkini, serta ulasan lengkap tentang fitur-fitur unggulan dari perangkat elektronik pilihan. Dapatkan juga update mengenai promo dan penawaran khusus yang tidak boleh Anda lewatkan. Semua artikel disusun secara informatif dan mudah dipahami, cocok untuk Anda yang ingin selalu up-to-date sebelum membeli produk impian.
        </p>
    </section>

    {{-- Produk Terbaru --}}
    <section class="highlight">
        <h2><span class="blue">PRODUK</span> TERBARU</h2>
        <div class="produk-grid">
            {{-- Loop produk --}}
            @foreach ($produk as $item)
                <div class="produk-card">
                    <img src="{{ asset('img/produk/' . $item->gambar) }}" alt="{{ $item->nm_produk }}" style="wid">
                    <h4>{{ $item->nm_produk }}</h4>
                    <p>Rp {{ number_format($item->harga) }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Kategori Populer --}}
    <section class="kategori-populer">
        <h2 class="blue"><span class="blue">KATEGORI</span> POPULER</h2>
        <div class="kategori-list">
            @foreach ($category as $cate)
                <div class="produk-card">
                    <img src="{{ $cate->icon ? asset('img/icon/' . $cate->icon) : asset('img/icon/default.png') }}" alt="{{ $cate->nm_kategori }}" style="width: 60px; height: 60px; object-fit: contain;">
                    <h4 style="color: black; margin-top: 2px;">{{ $cate->nm_kategori }}</h4>
                </div>
            @endforeach
        </div>
    </section>
@endsection
