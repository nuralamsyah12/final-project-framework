<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Auth;

// 1. HALAMAN UTAMA
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. RUTE OTENTIKASI OTOMATIS BREEZE/LARAVEL
Auth::routes(['verify' => false]);

// 3. RUTE YANG DIKUNCI MIDDLEWARE
Route::middleware(['auth'])->group(function () {
    
    Route::get('/beranda', function () {
        $semuaBarang = \App\Models\Barang::all();
        $totalStok = \App\Models\Barang::sum('stok');
        return view('beranda', compact('semuaBarang', 'totalStok'));
    })->name('beranda');

    Route::resource('barang', BarangController::class);
});
