<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// 1. HALAMAN UTAMA (Otomatis dilempar ke login)
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. RUTE YANG DIKUNCI MIDDLEWARE (Harus Login)
Route::middleware(['auth'])->group(function () {
    
    Route::get('/beranda', function () {
        $semuaBarang = \App\Models\Barang::all();
        $totalStok = \App\Models\Barang::sum('stok');
        return view('beranda', compact('semuaBarang', 'totalStok'));
    })->name('beranda');

    Route::resource('barang', BarangController::class);
});

// 3. MEMANGGIL FILE AUTH BREEZE YANG BARU KITA UPLOAD
require __DIR__.'/auth.php';
