<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'id_kategori' => 1,
            'nm_produk' => 'Laptop Asus',
            'berat' => 800,
            'harga' => 45000,
            'stok' => 30,
            'gambar' => null,
            'deskripsi' => 'Laptop Asus.'
        ]);

        Produk::create([
            'id_kategori' => 2,
            'nm_produk' => 'Laptop Lenovo',
            'berat' => 200,
            'harga' => 75000,
            'stok' => 50,
            'gambar' => null,
            'deskripsi' => 'Laptop Lenovo.'
        ]);
    }
}
