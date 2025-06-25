@extends('layouts.app')
@section('title', 'Upload Pembayaran')

@section('content')

<style>
    .upload-container {
        max-width: 520px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.05);
        animation: fadeIn 0.4s ease-in-out forwards;
        opacity: 0;
    }

    .upload-container h4 {
        font-size: 1.6rem;
        margin-bottom: 1.5rem;
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #555;
        margin-bottom: 0.4rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.65rem 0.8rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: border 0.2s ease, box-shadow 0.2s ease;
    }

    .form-group input:focus {
        border-color: #38b000;
        box-shadow: 0 0 0 3px rgba(56, 176, 0, 0.15);
        outline: none;
    }

    .btn-submit {
        width: 100%;
        padding: 0.75rem;
        background-color: #38b000;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.25s ease;
    }

    .btn-submit:hover {
        background-color: #2f8f00;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    /* Optional: Small screen support */
    @media (max-width: 600px) {
        .upload-container {
            padding: 1.5rem;
        }
    }
</style>
<div class="container mb-4" style="max-width: 520px;">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="card-title text-success mb-3">💳 Informasi Pembayaran</h5>
            <p class="mb-1">Bank: <strong>BCA</strong></p>
            <p class="mb-1">Nomor Rekening: <strong>1234567890</strong></p>
            <p class="mb-1">Atas Nama: <strong>PT. Electronic</strong></p>
            <div class="text-muted mt-3" style="font-size: 0.9rem;">
                Silakan transfer sesuai jumlah total, lalu upload bukti pembayaran di bawah.
            </div>
        </div>
    </div>
</div>

<div class="upload-container">
    <h4>📤 Upload Bukti Pembayaran</h4>

    <form action="{{ route('bayar.upload', $order->id_order) }}" method="POST" enctype="multipart/form-data" id="uploadForm">
        @csrf

        <div class="form-group">
            <label for="no_rekening">No Rekening</label>
            <input type="text" name="no_rekening" id="no_rekening" required>
        </div>

        <div class="form-group">
            <label for="nama_rekening">Nama Pemilik Rekening</label>
            <input type="text" name="nama_rekening" id="nama_rekening" required>
        </div>

        <div class="form-group">
            <label for="jumlah_transfer">Jumlah Transfer</label>
            <input type="number" name="jumlah_transfer" id="jumlah_transfer" value="{{ $order->total_order }}" readonly required>
        </div>

        <div class="form-group">
            <label for="bukti_transfer">Upload Bukti (jpg/png)</label>
            <input type="file" name="bukti_transfer" id="bukti_transfer" accept=".jpg,.png" required>
        </div>

        <button class="btn-submit" type="submit">Kirim Pembayaran</button>
    </form>
</div>

<script>
    // Tambahkan interaksi: ganti teks tombol saat proses submit
    const form = document.getElementById('uploadForm');
    const button = form.querySelector('button');

    form.addEventListener('submit', () => {
        button.disabled = true;
        button.innerText = 'Mengunggah...';
    });
</script>

@endsection
