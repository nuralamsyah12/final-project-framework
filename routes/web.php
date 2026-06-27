<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// 1. HALAMAN UTAMA (Langsung diarahkan ke form login)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. RUTE UNTUK PROSES AUTHENTICATION (Bawaan Laravel Breeze)
require __DIR__.'/auth.php';

// 3. RUTE YANG DIKUNCI (Hanya bisa diakses jika sudah login)
Route::middleware(['auth'])->group(function () {
    
    // Halaman Beranda Utama
    Route::get('/beranda', function () {
        $semuaBarang = \App\Models\Barang::all();
        $totalStok = \App\Models\Barang::sum('stok');
        return view('beranda', compact('semuaBarang', 'totalStok'));
    })->name('beranda');

    // CRUD Barang
    Route::resource('barang', BarangController::class);
});

require __DIR__.'/auth.php';
