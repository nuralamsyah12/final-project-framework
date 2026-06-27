<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/beranda', function () {
        $semuaBarang = \App\Models\Barang::all();
        $totalStok = \App\Models\Barang::sum('stok');
        return view('beranda', compact('semuaBarang', 'totalStok'));
    })->name('beranda');

    Route::resource('barang', BarangController::class);
});

// 3. RUTE OTENTIKASI (Pastikan tertulis rapi tanpa titik di tengah)
require __DIR__.'/auth.php';
