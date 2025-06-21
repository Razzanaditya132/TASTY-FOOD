<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil dulu role seeder
        $this->call([
            RoleSeeder::class,
        ]);

        // Baru buat user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => 1,
        ]);

        // Seeder lainnya
        $this->call([
            GaleriSeeder::class,
            GridGaleriSeeder::class,
        ]);
    }
}
