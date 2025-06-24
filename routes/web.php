<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\InformasiKontakController;
use App\Http\Controllers\TentangKamiController;
use App\Models\Berita;
use App\Models\InformasiKontak;
use App\Models\GridGaleri;

// Route utama diarahkan ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

//halaman home
Route::get('/home', function () {
    return view('home.home'); // File di resources/views/home/home.blade.php
})->name('home');
//halaman users
Route::resource('users', UserController::class);

//halaman roles
Route::resource('roles', RoleController::class);

//halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//halaman galeri
Route::resource('galeri', \App\Http\Controllers\GaleriController::class);
Route::resource('grid_galeri', \App\Http\Controllers\GridGaleriController::class);

//halaman berita
Route::resource('berita', BeritaController::class)->parameters([
    'berita' => 'berita'
]);

//halaman tentang kami
Route::resource('tentangkami', \App\Http\Controllers\TentangKamiController::class);

//halaman informasi kontak
Route::resource('kontak', InformasiKontakController::class);

//khusus halaman front-end

//halaman galeri
Route::get('/galeri-kami', [GaleriController::class, 'galerifront'])->name('galeri.front');

//halaman berita
Route::get('/berita-kami', [BeritaController::class, 'beritafront'])->name('berita.front');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

//halaman kontak
Route::get('/kontak-kami', function () {
    return view('front-end.kontakfront');
})->name('kontak.front');
Route::post('/kontak/kirim', [InformasiKontakController::class, 'store'])->name('kontak.store');

//halaman tentang kami
Route::get('/tentang-kami', [TentangKamiController::class, 'front'])->name('tentangkamifront');

//halaman home
Route::get('/home-kami', function () {
    $beritas = Berita::latest()->get();
    $grid_galeris = GridGaleri::latest()->take(12)->get(); // ambil 12 gambar pertama

    return view('front-end.homefront', compact('beritas', 'grid_galeris'));
})->name('homefront');

//halaman show berita kami
Route::get('/berita-kami/{id}', [App\Http\Controllers\ShowBeritaKami::class, 'show'])->name('beritakami.show');
