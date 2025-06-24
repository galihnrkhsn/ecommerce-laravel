@extends('layouts.admin')

@section('title', 'Kategori Produk')

@section('content')
    <h4>Kategori Produk</h4>
    <a href="{{ route('kategori-produk.create') }}" class="btn btn-sm btn-primary mb-3">+ Tambah Kategori</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nm_kategori }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
