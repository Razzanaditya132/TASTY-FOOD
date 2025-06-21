<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('galeri')->insert([
            [
                'gambar' => 'galeri/foto1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'galeri/foto2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lagi sesuai jumlah file yang kamu miliki di folder galeri/
        ]);
    }
}
