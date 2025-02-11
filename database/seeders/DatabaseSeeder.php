<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menjalankan seeder User dan Admin
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
