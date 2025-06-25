@extends('layouts.admin')
@section('title', 'Edit Produk')

@section('content')
    <h4 class="mb-3">Edit Produk</h4>

    <form method="POST" action="{{ route('admin.update', $produk->id_produk) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id_kategori }}" {{ $produk->id_kategori == $k->id_kategori ? 'selected' : '' }}>
                            {{ $k->nm_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nm_produk" value="{{ $produk->nm_produk }}" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Harga</label>
                <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Stok</label>
                <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Berat (gram)</label>
                <input type="number" name="berat" value="{{ $produk->berat }}" class="form-control" required>
            </div>

            <div class="col-md-12 mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $produk->deskripsi }}</textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label>Gambar Produk</label><br>
                @if ($produk->gambar)
                    <img src="{{ asset('img/produk/' . $produk->gambar) }}" alt="Produk" style="width: 100px; margin-bottom: 10px;">
                @endif
                <input type="file" name="gambar" class="form-control">
            </div>
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.produk') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
