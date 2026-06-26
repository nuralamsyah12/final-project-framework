<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    // [GET] Ambil Semua Data Barang
    public function index()
    {
        $barang = Barang::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Daftar data barang',
            'data' => $barang
        ], 200);
    }

    // [POST] Tambah Barang Baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'stok'        => 'required|integer',
            'harga'       => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barang = Barang::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Barang berhasil ditambahkan',
            'data' => $barang
        ], 201);
    }

    // [GET] Lihat Detail 1 Barang berdasarkan ID
    public function show($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json(['status' => 'success', 'data' => $barang], 200);
    }

    // [PUT] Update Data Barang
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $barang->update($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Barang berhasil diperbarui',
            'data' => $barang
        ], 200);
    }

    // [DELETE] Hapus Barang
    public function destroy($id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $barang->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Barang berhasil dihapus'
        ], 200);
    }
}