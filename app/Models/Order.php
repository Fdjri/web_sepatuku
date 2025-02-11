<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    // Kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'status',
        'total_amount',  // Menambahkan total_amount ke dalam kolom yang dapat diisi
    ];

    // Relasi dengan pengguna
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan item pesanan
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Menambahkan method untuk menghitung total harga pesanan.
     * Ini bisa digunakan untuk memperbarui total_amount secara otomatis saat item pesanan ditambahkan.
     */
    public function calculateTotalAmount()
    {
        $totalAmount = $this->orderItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        // Memperbarui total_amount dalam tabel orders
        $this->update([
            'total_amount' => $totalAmount
        ]);
    }
}
