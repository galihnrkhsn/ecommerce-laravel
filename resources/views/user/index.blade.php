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
                    <img src="{{ asset('img/tv.png') }}" alt="produk">
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
                    <img src="{{ asset('img/tv.png') }}" alt="produk">
                    <h4 style="color: black; margin-top: 2px;">{{ $cate->nm_kategori }}</h4>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Footer --}}
    <footer class="footer">
        <div class="footer-col">
            <h4>ABOUT US</h4>
            <p>Electronicsmart is a website that sells a variety of good quality furniture or household appliances.</p>
            <p>
                <a href="#">IG</a> • <a href="#">FB</a> • <a href="#">Twitter</a>
            </p>
        </div>
        <div class="footer-col">
            <h4>CUSTOMER SERVICE</h4>
            <ul>
                <li>Contact Us</li>
                <li>Ordering & Payment</li>
                <li>Delivery</li>
                <li>Return</li>
                <li>FAQ</li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>INFORMATION</h4>
            <ul>
                <li>Privacy</li>
                <li>Terms</li>
                <li>Press</li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>CONTACT US</h4>
            <p>0821 8142 8888</p>
            <p>Electronicsmart@gmail.com</p>
            <p>Jl. Buahbatu 800</p>
        </div>
    </footer>
@endsection
