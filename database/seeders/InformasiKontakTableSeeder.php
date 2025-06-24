<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiKontakTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('informasi_kontaks')->insert([
            [
                'name' => 'John Doe',
                'subject' => 'Pertanyaan',
                'email' => 'johndoe@example.com',
                'message' => 'Bagaimana cara menggunakan website ini?',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
