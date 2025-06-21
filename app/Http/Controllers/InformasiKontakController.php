<?php

namespace App\Http\Controllers;

use App\Models\InformasiKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $request->validate([
            'subject' => 'required|max:255',
            'name' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        // Simpan ke database
        $data = InformasiKontak::create([
            'subject' => $request->subject,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Kirim email ke admin
        Mail::raw("
Subject: {$data->subject}
Name: {$data->name}
Email: {$data->email}
Message: {$data->message}
        ", function ($message) {
            $message->to('razzanadityapangestu@gmail.com')
                ->subject('Pesan Baru dari Form Kontak');
        });

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
    public function show($id)
    {
        $kontak = InformasiKontak::findOrFail($id);
        return view('informasikontak.detail', compact('kontak'));
    }

    public function destroy($id)
    {
        $kontak = InformasiKontak::findOrFail($id);
        $kontak->delete();

        return redirect()->route('informasikontak.informasikontak')->with('success', 'Pesan berhasil dihapus.');
    }
}
