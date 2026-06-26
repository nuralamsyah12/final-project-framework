@extends('layout')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Daftar Barang</h3>
    <a href="{{ route('barang.create') }}" class="btn btn-success">Tambah Barang</a>
</div>
<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $b)
        <tr>
            <td>{{ $b->kode_barang }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->stok }}</td>
            <td>Rp {{ number_format($b->harga) }}</td>
            <td>
                <form action="{{ route('barang.destroy', $b->id) }}" method="POST">
                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection