@extends('layouts.admin')
@section('title', 'Edit User')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h4>Edit User</h4>

            <form method="POST" action="{{ route('admin.user.update', $user->id) }}">
                @csrf @method('PUT')

                <div class="mb-2">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->nm_pelanggan }}" required>
                </div>
                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="mb-2">
                    <label>Password (Kosongkan jika tidak diganti)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
