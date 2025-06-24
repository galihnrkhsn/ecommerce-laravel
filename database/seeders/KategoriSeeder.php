<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriProduk;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = ['Laptop', 'Smartphone', 'Televisi', 'Kamera'];

        foreach ($data as $kategori) {
            KategoriProduk::create(['nm_kategori' => $kategori]);
        }
    }
}
