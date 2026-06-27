<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GudangKu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-4">
            <div class="card shadow border-0 p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary">📦 GudangKu</h3>
                    <p class="text-muted">Silakan masuk ke akun Anda</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 small">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-bold">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small fw-bold">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
                    </div>

                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label small text-muted">Ingat saya</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-3">
                        Masuk
                    </button>

                    <div class="text-center">
                        <span class="small text-muted">Belum punya akun?</span>
                        <a href="{{ route('register') }}" class="small fw-bold text-decoration-none">Daftar Sekarang</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>
</html>
