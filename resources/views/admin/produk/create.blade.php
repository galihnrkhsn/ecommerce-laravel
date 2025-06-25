@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <h4>Tambah Produk</h4>

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control" required>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}">{{ $kat->nm_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label>Nama Produk</label>
            <input type="text" name="nm_produk" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Berat (gram)</label>
            <input type="number" name="berat" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Foto</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
