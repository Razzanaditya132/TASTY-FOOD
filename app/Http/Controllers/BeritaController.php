<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        if (!punya_akses('akses_berita')) return view('akses_ditolak');
        return view('berita.berita', ['beritas' => Berita::with('user')->get()]);
    }

    public function create()
    {
        if (!punya_akses('akses_berita')) return view('akses_ditolak');
        return view('berita.beritacreate');
    }

    public function store(Request $request)
    {
        if (!punya_akses('akses_berita')) return view('akses_ditolak');
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image'
        ]);

        $gambar = $request->hasFile('gambar') ? $request->file('gambar')->store('berita', 'public') : null;

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $gambar,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('berita.index');
    }

    public function edit(Berita $berita)
    {
        if (!punya_akses('akses_berita')) return view('akses_ditolak');
        return view('berita.beritaedit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        if (!punya_akses('akses_berita')) return view('akses_ditolak');
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if (!punya_akses('akses_berita')) return view('akses_ditolak');
        $berita->delete();
        return back();
    }
    // Menampilkan semua berita ke halaman front-end
    public function beritafront()
    {
        $beritas = Berita::latest()->get(); // urutkan dari yang terbaru
        return view('front-end.beritafront', compact('beritas'));
    }

    // Menampilkan detail satu berita
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('front-end.show', compact('berita'));
    }
}
