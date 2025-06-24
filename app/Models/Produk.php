<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_kategori', 'nm_produk', 'berat', 'harga', 'stok', 'gambar', 'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori');
    }
}
