<?php

// app/Http/Controllers/FrontendBeritaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class ShowBeritaKami extends Controller
{
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('front-end.showberitakami', compact('berita'));
    }
}
