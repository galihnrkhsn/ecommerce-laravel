@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <h4>Tambah Kategori Produk</h4>

    <form method="POST" action="{{ route('kategori-produk.store') }}">
        @csrf
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="nm_kategori" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection
