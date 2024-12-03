<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\Kategori;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        // Ambil kategori yang sudah ada
        $kategori = Kategori::all();

        // Menambahkan beberapa produk komputer
        Produk::create([
            'name' => 'Laptop ASUS ROG',
            'price' => 15000000,
            'category_id' => $kategori->where('name', 'Laptop')->first()->id,  // Pilih kategori Laptop
        ]);
        Produk::create([
            'name' => 'PC Gaming',
            'price' => 20000000,
            'category_id' => $kategori->where('name', 'PC Desktop')->first()->id,  // Pilih kategori PC Desktop
        ]);
        Produk::create([
            'name' => 'Mouse Logitech',
            'price' => 500000,
            'category_id' => $kategori->where('name', 'Peripherals')->first()->id,  // Pilih kategori Peripherals
        ]);
        Produk::create([
            'name' => 'Keyboard Mechanical',
            'price' => 800000,
            'category_id' => $kategori->where('name', 'Peripherals')->first()->id,  // Pilih kategori Peripherals
        ]);
        Produk::create([
            'name' => 'Motherboard MSI',
            'price' => 1200000,
            'category_id' => $kategori->where('name', 'Komponen')->first()->id,  // Pilih kategori Komponen
        ]);
        Produk::create([
            'name' => 'Windows 11 Pro',
            'price' => 300000,
            'category_id' => $kategori->where('name', 'Software')->first()->id,  // Pilih kategori Software
        ]);
    }
}
