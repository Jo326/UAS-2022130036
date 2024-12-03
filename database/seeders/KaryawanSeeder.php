<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan beberapa karyawan
        Karyawan::create([
            'name' => 'John Doe',
            'position' => 'Manager',
            'email' => 'john.doe@example.com',
            'phone' => '081234567890',
        ]);

        Karyawan::create([
            'name' => 'Jane Smith',
            'position' => 'Sales Executive',
            'email' => 'jane.smith@example.com',
            'phone' => '082345678901',
        ]);

        Karyawan::create([
            'name' => 'Michael Brown',
            'position' => 'Technician',
            'email' => 'michael.brown@example.com',
            'phone' => '083456789012',
        ]);

        Karyawan::create([
            'name' => 'Sarah White',
            'position' => 'Customer Service',
            'email' => 'sarah.white@example.com',
            'phone' => '084567890123',
        ]);
    }
}
