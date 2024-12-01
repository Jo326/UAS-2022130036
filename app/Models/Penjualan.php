<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'customer_id',
        'employee_id',
        'total_price',
        'transaction_date',
        'payment_method',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'employee_id');
    }
}


//     // Relasi dengan Produk
//     public function produk()
//     {
//         return $this->belongsToMany(Produk::class, 'penjualan_produk')
//                     ->withPivot('quantity', 'subtotal');
//     }
// }
