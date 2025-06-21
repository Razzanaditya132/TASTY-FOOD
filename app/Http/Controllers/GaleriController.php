<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\GridGaleri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        if (!punya_akses('akses_galeri')) return view('akses_ditolak');
        $galeris = Galeri::all();
        $grid_galeris = GridGaleri::all();
        return view('galeri.galeri', compact('galeris', 'grid_galeris'));
    }

    public function create()
    {
        if (!punya_akses('akses_galeri')) return view('akses_ditolak');
        return view('galeri.galericreate');
    }

    public function store(Request $request)
    {
        if (!punya_akses('akses_galeri')) return view('akses_ditolak');
        $request->validate(['gambar' => 'required|image']);
        $file = $request->file('gambar')->store('galeri', 'public');
        Galeri::create(['gambar' => $file]);
        return redirect()->route('galeri.index');
    }

    public function edit(Galeri $galeri)
    {
        if (!punya_akses('akses_galeri')) return view('akses_ditolak');
        return view('galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        if (!punya_akses('akses_galeri')) return view('akses_ditolak');
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar')->store('galeri', 'public');
            $galeri->update(['gambar' => $file]);
        }
        return redirect()->route('galeri.index');
    }

    public function destroy(Galeri $galeri)
    {
        if (!punya_akses('akses_galeri')) return view('akses_ditolak');
        $galeri->delete();
        return back();
    }
    public function galerifront()
    {
        $galeris = Galeri::all(); // untuk slider
        $grid_galeris = GridGaleri::all(); // untuk grid
        return view('front-end.galerifront', compact('galeris', 'grid_galeris'));
    }
}
