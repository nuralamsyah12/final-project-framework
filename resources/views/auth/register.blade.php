<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - GudangKu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .reg-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container reg-container">
    <div class="row w-100 justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary">📦 GudangKu</h3>
                    <p class="text-muted small">Buat akun baru</p>
                </div>

                <form method="POST" action="/register">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mt-2">Daftar Akun</button>
                    
                    <div class="text-center mt-3">
                        <a href="/login" class="small text-decoration-none">Sudah punya akun? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
