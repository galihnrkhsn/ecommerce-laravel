@extends('layouts.admin')
@section('title', 'User')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <h4>Manajemen User</h4>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>
    </div>

    <div class="card shadow-sm">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->nm_pelanggan }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $u->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus user ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
