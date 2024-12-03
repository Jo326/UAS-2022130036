<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualan;
use App\Models\Customer;
use App\Models\Karyawan;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        // // Ambil data karyawan dan customer yang ada
        // $customers = Customer::all();
        // $karyawans = Karyawan::all();

        // // Menambahkan 10 data penjualan
        // foreach (range(1, 10) as $index) {
        //     Penjualan::create([
        //         'customer_id' => $customers->random()->id,  // Pilih customer secara acak
        //         'employee_id' => $karyawans->random()->id,  // Pilih karyawan secara acak
        //         'total_price' => rand(100000, 1000000),      // Total harga acak antara 100.000 dan 1.000.000
        //         'transaction_date' => now(),
        //         'payment_method' => 'Cash',
        //     ]);
        // }
    }
}
