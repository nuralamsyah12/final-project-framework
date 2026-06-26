<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Models\Barang;

Route::get('/', function () {
    $semuaBarang = Barang::all(); // Mengambil semua data barang
    $totalStok = Barang::sum('stok'); 
    
    return view('beranda', compact('semuaBarang', 'totalStok'));
});
Route::resource('barang', BarangController::class);