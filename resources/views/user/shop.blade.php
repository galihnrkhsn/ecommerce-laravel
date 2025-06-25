@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <style>
        .produk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .produk-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .produk-card:hover {
            transform: translateY(-3px);
        }

        .produk-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .produk-card-body {
            padding: 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .produk-card-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .produk-card-price {
            color: #444;
            margin-bottom: 0.5rem;
        }

        .produk-card-desc {
            font-size: 0.9rem;
            color: #666;
            flex-grow: 1;
            margin-bottom: 0.75rem;
        }

        .produk-card button,
        .produk-card a {
            display: block;
            width: 100%;
            padding: 0.5rem;
            text-align: center;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #3490dc;
            color: white;
        }

        .btn-outline {
            background-color: transparent;
            color: #666;
            border: 1px solid #ccc;
        }

        .kategori-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 2rem;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 600px) {
            .produk-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
        }

        .search-box {
            margin: 1rem 0;
        }

        .hidden {
            display: none;
        }
    </style>

    <div class="search-box">
        <input type="text" id="searchInput" placeholder="Cari produk..." style="width:100%; padding:0.5rem; font-size:1rem; border-radius:5px; border:1px solid #ccc;">
    </div>

    @foreach ($produkByKategori as $kategori)
        <div class="kategori-section">
            <div class="kategori-title">{{ $kategori->nama_kategori }}</div>
            <div class="produk-grid">
                @foreach ($kategori->produk as $p)
                    <div class="produk-card" data-nama="{{ strtolower($p->nm_produk) }}">
                        @if ($p->gambar)
                            <img src="{{ asset('img/produk/' . $p->gambar) }}" alt="{{ $p->nm_produk }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No Image">
                        @endif

                        <div class="produk-card-body">
                            <div class="produk-card-title">{{ $p->nm_produk }}</div>
                            <div class="produk-card-price">Rp {{ number_format($p->harga) }}</div>
                            <div class="produk-card-desc">{{ Str::limit($p->deskripsi, 60) }}</div>
                            <a href="{{ route('produk.detail', $p->id_produk) }}" class="btn-primary">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <script>
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            const cards = document.querySelectorAll('.produk-card');

            cards.forEach(card => {
                const nama = card.getAttribute('data-nama');
                if (nama.includes(keyword)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    </script>

@endsection
