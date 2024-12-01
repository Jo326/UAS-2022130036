<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name',
        'email',
        'address',
    ];

    // Relasi dengan Penjualan
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    // Relasi dengan Service
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
