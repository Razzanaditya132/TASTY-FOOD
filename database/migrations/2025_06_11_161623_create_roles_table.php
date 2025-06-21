<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->boolean('akses_galeri')->default(false);
            $table->boolean('akses_kontak')->default(false);
            $table->boolean('akses_tentang')->default(false);
            $table->boolean('akses_berita')->default(false);
            $table->boolean('akses_roles')->default(false);
            $table->boolean('akses_user')->default(false);
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // ditambahkan
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
