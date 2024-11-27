<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $fillable = [
        'customer_id',
        'description',
        'total_price',
        'service_date',
        'status',
    ];

    // Relasi dengan Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
