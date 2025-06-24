<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'akses_galeri' => true,
                'akses_kontak' => true,
                'akses_tentang' => true,
                'akses_berita' => true,
                'akses_roles' => true,
                'akses_user' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Editor',
                'akses_galeri' => true,
                'akses_kontak' => true,
                'akses_tentang' => true,
                'akses_berita' => true,
                'akses_roles' => false,
                'akses_user' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
