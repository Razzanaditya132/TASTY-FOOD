<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // FIX: Pastikan pakai nama tabel sesuai migration
    protected $table = 'galeri';

    protected $fillable = ['gambar'];
}
