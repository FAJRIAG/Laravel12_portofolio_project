<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio; // <-- Pastikan model di-import

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::create([
            'title' => 'Proyek Aplikasi E-commerce',
            'description' => 'Aplikasi toko online lengkap dengan fitur keranjang belanja, checkout, dan manajemen produk.',
            'image' => 'images/sample1.png', // path contoh
            'link' => 'https://github.com/username/project1'
        ]);

        Portfolio::create([
            'title' => 'Sistem Informasi Sekolah',
            'description' => 'Sistem untuk mengelola data siswa, guru, dan jadwal pelajaran berbasis web.',
            'image' => 'images/sample2.png',
            'link' => 'https://github.com/username/project2'
        ]);

        Portfolio::create([
            'title' => 'Landing Page Perusahaan',
            'description' => 'Desain halaman depan yang modern dan responsif untuk profil perusahaan startup.',
            'image' => 'images/sample3.png',
            'link' => 'https://github.com/username/project3'
        ]);
    }
}