<?php

namespace App\Http\Controllers;

use App\Models\InformasiKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\KontakMasukMail; // ✅ Import Mailable

class InformasiKontakController extends Controller
{
    // Tampilkan semua data ke dashboard admin
    public function index()
    {
        if (!punya_akses('akses_kontak')) return view('akses_ditolak');
        $data = InformasiKontak::latest()->get();
        return view('informasikontak.informasikontak', compact('data'));
    }

    // Proses simpan dari form kontak front-end
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'subject' => 'required|max:255',
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        // Simpan ke database
        $kontak = InformasiKontak::create($validated);

        // Kirim email ke admin
        Mail::to('razzanadityapangestu@gmail.com')->send(new KontakMasukMail($validated));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    // Detail pesan masuk
    public function show($id)
    {
        $kontak = InformasiKontak::findOrFail($id);
        return view('informasikontak.detail', compact('kontak'));
    }

    // Hapus pesan
    public function destroy($id)
    {
        $kontak = InformasiKontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('informasikontak.informasikontak')->with('success', 'Pesan berhasil dihapus.');
    }
}
