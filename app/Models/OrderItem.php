<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    // Kolom yang dapat diisi
    protected $fillable = [
        'order_id',  // Relasi ke tabel orders
        'shoe_id',   // Relasi ke tabel shoes
        'quantity',
        'price',
    ];

    // Relasi dengan pesanan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi dengan sepatu
    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }
}
