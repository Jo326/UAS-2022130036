<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock',
        'description',
        'photo',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }

    // Relasi many-to-many dengan Penjualan melalui tabel pivot penjualan_produk
public function penjualan()
{
    return $this->belongsToMany(Penjualan::class, 'penjualan_produk')
                ->withPivot('quantity', 'subtotal');
}

}

