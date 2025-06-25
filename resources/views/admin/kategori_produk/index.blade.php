@extends('layouts.admin')

@section('title', 'Kategori Produk')

@section('content')
    <h4 class="mb-4">Kategori Produk</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        {{-- Form Tambah Kategori --}}
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Tambah Kategori</div>
                <div class="card-body">
                    <form action="{{ route('admin.kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nm_kategori" class="form-label">Nama Kategori</label>
                            <input type="text" name="nm_kategori" id="nm_kategori" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Tabel Kategori --}}
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Daftar Kategori</div>
                <div class="card-body p-0">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nm_kategori }}</td>
                                    <td>
                                        <form action="{{ route('admin.kategori.destroy', $k->id_kategori) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
