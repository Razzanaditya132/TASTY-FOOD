<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GaleriTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('galeri')->insert([
            ['gambar' => 'galeri1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'galeri2.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
