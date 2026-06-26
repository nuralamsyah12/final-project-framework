@extends('layout')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3 shadow-sm border text-center text-md-start">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold text-primary">Selamat Datang di GudangKu!</h1>
        <p class="col-md-8 fs-5">Sistem pencatatan barang gudang berbasis web. Kelola stok barang Anda dengan mudah, cepat, dan terorganisir.</p>
        <hr class="my-4">
        <a href="{{ route('barang.index') }}" class="btn btn-primary px-4">Lihat Daftar Barang</a>
        <a href="{{ route('barang.create') }}" class="btn btn-outline-secondary px-4">Tambah Barang Baru</a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold"><i class="bi bi-box-seam me-2"></i>Status Inventaris Gudang</h6>
                <span class="badge bg-info text-dark">{{ $semuaBarang->count() }} Jenis Barang</span>
            </div>
            
            <div class="card-body p-0">
                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th class="ps-4" style="width: 70%">Rincian Nama Barang</th>
                                <th class="text-end pe-4">Jumlah Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($semuaBarang as $barang)
                                <tr>
                                    <td class="ps-4">
                                        <div class="fw-bold text-dark">{{ $barang->nama_barang }}</div>
                                        <small class="text-muted text-uppercase" style="font-size: 0.75rem;">SKU: {{ $barang->kode_barang }}</small>
                                    </td>
                                    <td class="text-end pe-4">
                                        <span class="badge rounded-pill px-3 {{ $barang->stok <= 10 ? 'bg-danger' : 'bg-primary' }}">
                                            {{ number_format($barang->stok) }} Pcs
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                        Belum ada data barang yang tersimpan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-primary border-0 py-3">
                <div class="d-flex justify-content-between align-items-center px-3">
                    <div>
                        <span class="fw-bold text-white text-uppercase d-block small">Total Stok Keseluruhan</span>
                        <h3 class="fw-bolder mb-0 text-white">{{ number_format($totalStok) }} <small class="fs-6">Pcs</small></h3>
                    </div>

                    <a href="{{ route('barang.index') }}" class="btn btn-light btn-sm fw-bold shadow-sm px-3 py-2 text-primary">
                        Kelola Data Selengkapnya <i class="bi bi-chevron-double-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row text-center mt-4">
    <div class="col-md-4 mb-3">
        <div class="p-3 border rounded shadow-sm bg-white h-100">
            <h5 class="fw-bold">📦 Stok Akurat</h5>
            <p class="small text-muted mb-0">Pantau jumlah stok secara real-time.</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="p-3 border rounded shadow-sm bg-white h-100">
            <h5 class="fw-bold">⚡ Proses Cepat</h5>
            <p class="small text-muted mb-0">Input dan edit data hanya dalam hitungan detik.</p>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="p-3 border rounded shadow-sm bg-white h-100">
            <h5 class="fw-bold">📊 Laporan Rapi</h5>
            <p class="small text-muted mb-0">Data tersusun dalam tabel yang bersih.</p>
        </div>
    </div>
</div>
@endsection