<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'nm_pelanggan' => 'User Demo',
            'username' => 'userdemo',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
        ]);
        $this->call(KategoriSeeder::class);
        $this->call(ProdukSeeder::class);
    }
}
