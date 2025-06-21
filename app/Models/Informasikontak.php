<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiKontak extends Model
{
    use HasFactory;

    protected $table = 'informasi_kontaks';

    protected $fillable = [
        'subject',
        'name',
        'email',
        'message',
    ];
}
