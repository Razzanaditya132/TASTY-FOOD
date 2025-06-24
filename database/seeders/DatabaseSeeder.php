<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder lainnya
        $this->call([
            RolesTableSeeder::class,
            UsersTableSedeer::class,
            GaleriTableSeeder::class,
            GridGaleriTableSeeder::class,
            InformasiKontakTableSeeder::class,
            TentangKamiTableSeeder::class,
        ]);
    }
}
