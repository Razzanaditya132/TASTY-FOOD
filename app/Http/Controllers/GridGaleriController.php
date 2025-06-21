<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\GridGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GridGaleriController extends Controller
{
    public function index()
    {
        $grid_galeris = GridGaleri::latest()->get();
        $galeris = Galeri::latest()->get(); // tambahkan baris ini

        return view('galeri.galeri', compact('grid_galeris', 'galeris'));
    }


    public function create()
    {
        return view('galeri.gridcreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:5120', // ← 5MB
        ]);

        $gambarPath = $request->file('gambar')->store('grid_galeri', 'public');

        GridGaleri::create([
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('grid_galeri.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $grid = GridGaleri::findOrFail($id);
        return view('galeri.gridedit', compact('grid'));
    }

    public function update(Request $request, $id)
    {
        $grid = GridGaleri::findOrFail($id);

        if ($request->hasFile('gambar')) {
            Storage::delete('public/' . $grid->gambar);
            $gambarPath = $request->file('gambar')->store('grid_galeri', 'public');
            $grid->update(['gambar' => $gambarPath]);
        }

        return redirect()->route('grid_galeri.index')->with('success', 'Gambar berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $grid = GridGaleri::findOrFail($id);
        Storage::delete('public/' . $grid->gambar);
        $grid->delete();

        return redirect()->route('grid_galeri.index')->with('success', 'Gambar berhasil dihapus!');
    }
}
