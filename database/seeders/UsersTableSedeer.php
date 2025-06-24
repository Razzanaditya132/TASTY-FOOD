<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSedeer extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_active' => true,
            'role_id' => 1,
        ]);

        // pastikan role dengan ID 1 sudah ada
        if (!Role::find(1)) {
            Role::create([
                'id' => 1,
                'name' => 'superadmin',
                'akses_galeri' => true,
                'akses_kontak' => true,
                'akses_tentang' => true,
                'akses_berita' => true,
                'akses_roles' => true,
                'akses_user' => true,
            ]);
        }

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
    }
}
