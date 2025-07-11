<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    protected $table = 'kategori_produk';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nm_kategori'
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}
