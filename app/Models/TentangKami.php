<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;

    protected $table = 'tentang_kamis'; // pastikan nama tabel sesuai
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'gambar2',
    ];
}
