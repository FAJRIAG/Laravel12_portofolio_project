<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Penting: tambahkan ini untuk hash password

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat satu user admin yang akan kita gunakan untuk login
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // default password adalah 'password'
        ]);

        // Memanggil seeder lain untuk mengisi data portofolio
        $this->call([
            PortfolioSeeder::class,
        ]);
    }
}