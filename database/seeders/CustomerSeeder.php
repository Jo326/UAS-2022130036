<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 10 data customer
        Customer::create([
            'name' => 'Customer 1',
            'email' => 'customer1@example.com',
        ]);
        Customer::create([
            'name' => 'Customer 2',
            'email' => 'customer2@example.com',
        ]);
        // Tambahkan data customer lainnya sesuai kebutuhan
    }
}
