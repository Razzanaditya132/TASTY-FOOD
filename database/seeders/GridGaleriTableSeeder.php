<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GridGaleriTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('grid_galeris')->insert([
            ['gambar' => 'grid1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'grid2.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
