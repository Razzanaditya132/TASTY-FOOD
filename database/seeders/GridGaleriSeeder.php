<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GridGaleriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('grid_galeris')->insert([
            [
                'gambar' => 'grid_galeri/grid1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'grid_galeri/grid2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lagi sesuai isi folder grid_galeri/
        ]);
    }
}
