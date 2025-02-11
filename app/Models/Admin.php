<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Kolom-kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Kolom-kolom yang tidak boleh diisi
    protected $guarded = [];

    // Menyembunyikan kolom seperti password dan remember_token dari array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Mengonversi kolom ke dalam tipe data tertentu, seperti timestamps
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
