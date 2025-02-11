<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan user dummy
        User::create([
            'email' => 'customer@example.com',
            'password' => Hash::make('password123'),
            'name' => 'Customer Name',
        ]);
    }
}
