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
        'total_price',
        'transaction_date',
        'payment_method',
    ];

    // Relasi dengan Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
