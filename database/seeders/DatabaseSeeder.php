<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Panggil seeder untuk kategori, produk, customer, dan karyawan
        $this->call([
            KategoriSeeder::class,
            ProdukSeeder::class,
            CustomerSeeder::class,
            KaryawanSeeder::class,
        ]);
    }
}
