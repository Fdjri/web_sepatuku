<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari nama model (opsional)
    protected $table = 'shoes';

    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'category_id', // Relasi ke tabel kategori
        'price',
        'stock',
        'image',
        'description',
    ];

    // Relasi dengan kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
