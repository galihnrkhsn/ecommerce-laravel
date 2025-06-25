@extends('layouts.admin')
@section('title', 'Tracking Order')

@section('content')
    <h4 class="mb-4">Tracking Orderan</h4>

    <div class="row mb-4">
        <div class="col-md-2">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <h6>Total Order</h6>
                    <h4>{{ $total }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h6>Belum Dibayar</h6>
                    <h4>{{ $belum }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h6>Menunggu Verifikasi</h6>
                    <h4>{{ $verif }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h6>Diproses</h6>
                    <h4>{{ $diproses }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h6>Dikirim</h6>
                    <h4>{{ $dikirim }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h6>Selesai</h6>
                    <h4>{{ $diterima }}</h4>
                </div>
            </div>
        </div>
    </div>

    <h5 class="mb-3">Daftar Order dengan Bukti Transfer</h5>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Total</th>
                <th>Bukti</th>
                <th>Status</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->user->nm_pelanggan ?? '-' }}</td>
                    <td>Rp {{ number_format($order->total_order) }}</td>
                    <td>
                        @php
                            $bukti = \App\Models\Pembayaran::where('id_order', $order->id_order)->first();
                        @endphp
                        @if ($bukti)
                            <a href="{{ asset($bukti->bukti_transfer) }}" target="_blank">Lihat Bukti</a>
                        @else
                            <span class="text-danger">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.order.status', $order->id_order) }}">
                            @csrf
                            <select name="status" class="form-select form-select-sm">
                                @foreach(['Menunggu Verifikasi', 'Diproses', 'Dikirim', 'Selesai'] as $s)
                                    <option value="{{ $s }}" {{ $order->status == $s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
