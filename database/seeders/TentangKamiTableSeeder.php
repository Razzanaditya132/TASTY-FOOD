<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TentangKamiTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tentang_kamis')->insert([
            [
                'judul' => 'Tentang Kami',
                'deskripsi' => 'Ini adalah deskripsi tentang kami.',
                'gambar' => 'tentang1.jpg',
                'gambar2' => 'tentang2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
