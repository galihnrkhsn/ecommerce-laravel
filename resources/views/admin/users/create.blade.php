@extends('layouts.admin')
@section('title', 'Tambah User')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4>Tambah User Baru</h4>

            <form method="POST" action="{{ route('admin.user.store') }}">
                @csrf

                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection
