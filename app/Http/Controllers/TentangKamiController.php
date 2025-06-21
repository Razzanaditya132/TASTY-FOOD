<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        if (!punya_akses('akses_tentang')) {
            return view('unauthorized'); // atau bisa return kosong
        }

        $data = TentangKami::all();
        return view('tentangkami.tentangkamipage', compact('data'));
    }


    public function create()
    {
        return view('tentangkami.tentangkamicreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
            'gambar2' => 'nullable|image',
        ]);

        $gambar = $request->file('gambar')->store('tentangkami', 'public');
        $gambar2 = $request->file('gambar2') ? $request->file('gambar2')->store('tentangkami', 'public') : null;

        TentangKami::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
            'gambar2' => $gambar2,
        ]);

        return redirect()->route('tentangkami.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(TentangKami $tentangkami)
    {
        return view('tentangkami.tentangkamiedit', compact('tentangkami'));
    }

    public function update(Request $request, TentangKami $tentangkami)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image',
            'gambar2' => 'nullable|image',
        ]);

        $data = $request->only(['judul', 'deskripsi']);

        // Simpan gambar 1 jika diunggah
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('tentangkami', 'public');
        }

        // Simpan gambar 2 jika diunggah
        if ($request->hasFile('gambar2')) {
            $data['gambar2'] = $request->file('gambar2')->store('tentangkami', 'public');
        }


        $tentangkami->update($data);

        return redirect()->route('tentangkami.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy(TentangKami $tentangkami)
    {
        $tentangkami->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
    public function front()
    {
        $data = TentangKami::all();
        return view('front-end.tentangkamifront', compact('data'));
    }
}
