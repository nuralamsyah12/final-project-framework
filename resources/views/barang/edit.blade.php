@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Data Barang</h2>
    </div>

    <div class="card p-4 shadow-sm border-0">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label fw-bold">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary px-4">Perbarui Barang</button>
                <a href="{{ route('barang.index') }}" class="btn btn-outline-secondary px-4">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
