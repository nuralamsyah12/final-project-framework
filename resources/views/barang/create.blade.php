@extends('layout')
@section('content')
<div class="card p-4 shadow-sm">
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <div class="col-md-3 mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Barang</button>
    </form>
</div>
@endsection