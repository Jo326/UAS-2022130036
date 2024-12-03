<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan'; // Pastikan tabelnya sesuai dengan nama yang ada di database

    protected $fillable = [
        'customer_id',
        'employee_id',
        'total_price',
        'transaction_date',
        'payment_method'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function penjualanDetails()
    {
        return $this->hasMany(PenjualanDetail::class);
    }



    // Relasi dengan produk (optional, jika diperlukan)
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'penjualan_produk') // Sesuaikan dengan tabel pivot Anda
                    ->withPivot('quantity', 'subtotal'); // Menambahkan kolom pivot jika perlu
    }
}
