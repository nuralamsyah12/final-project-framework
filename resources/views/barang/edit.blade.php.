<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang - GudangKu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Data Barang</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                            @csrf
                            @method('PUT') <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" value="{{ $barang->stok }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-warning">Perbarui Barang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
