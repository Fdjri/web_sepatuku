<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;  // Pastikan model Admin digunakan

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan admin dummy
        Admin::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('adminpassword'),
            'name' => 'Admin Name',
        ]);
    }
}
