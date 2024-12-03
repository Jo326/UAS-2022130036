<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan kategori produk komputer
        Kategori::create([
            'name' => 'Laptop',
        ]);
        Kategori::create([
            'name' => 'PC Desktop',
        ]);
        Kategori::create([
            'name' => 'Peripherals',
        ]);
        Kategori::create([
            'name' => 'Komponen',
        ]);
        Kategori::create([
            'name' => 'Aksesoris',
        ]);
        Kategori::create([
            'name' => 'Software',
        ]);
    }
}
