<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'akses_galeri',
        'akses_kontak',
        'akses_tentang',
        'akses_berita',
        'akses_roles',
        'akses_user',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
