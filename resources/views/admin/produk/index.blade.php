@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Manajemen Produk</h4>
        <a href="{{ route('admin.create') }}" class="btn btn-sm btn-primary">+ Tambah Produk</a>
    </div>
    <div class="card shadow-sm">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nm_produk }}</td>
                        <td>{{ $p->kategori->nm_kategori }}</td>
                        <td>Rp {{ number_format($p->harga) }}</td>
                        <td>{{ $p->stok }}</td>
                        <td>
                            <a href="{{ route('admin.edit', $p->id_produk) }}" class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil"></i></a>

                            <form action="{{ route('admin.destroy', $p->id_produk) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
