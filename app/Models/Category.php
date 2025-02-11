<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari nama model (opsional)
    protected $table = 'categories';

    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi dengan sepatu
    public function shoes()
    {
        return $this->hasMany(Shoe::class);
    }
}
