<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'name',
        'position',
        'email',
        'phone',
    ];

    // Relasi dengan Service
    public function services()
    {
        return $this->belongsToMany(Service::class, 'karyawan_service');
    }

    public function karyawan()
{
    return $this->belongsTo(Karyawan::class);
}

public function penjualans()
{
    return $this->hasMany(Penjualan::class);
}
}
