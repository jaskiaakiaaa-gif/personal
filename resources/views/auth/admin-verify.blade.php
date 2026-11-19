<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Admin - MyPersonal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #fce4ec);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .verify-card {
            max-width: 420px;
            width: 100%;
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 15px 35px rgba(216, 27, 96, 0.12);
        }
    </style>
</head>
<body>

<div class="container px-3">
    <div class="card verify-card mx-auto p-4 p-md-5 bg-white">
        <div class="text-center mb-4">
            <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger rounded-circle mb-3" style="width: 60px; height: 60px;">
                <i class="bi bi-shield-lock-fill fs-3"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">Verifikasi Akses Admin</h4>
            <p class="text-muted small">Masukkan kredensial akun admin untuk membuka Admin Panel.</p>
        </div>

        <!-- Menampilkan Pesan Error Jika Salah -->
        @if($errors->any())
            <div class="alert alert-danger rounded-3 py-2 small">
                <i class="bi bi-exclamation-circle-fill me-1"></i> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.verify.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Email Admin</label>
                <input type="email" name="email" class="form-control rounded-3 p-3 bg-light border-0" placeholder="admin@gmail.com" required autofocus>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold small text-secondary">Password Admin</label>
                <input type="password" name="password" class="form-control rounded-3 p-3 bg-light border-0" placeholder="••••••••" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn text-white rounded-pill py-3 fw-semibold shadow-sm" style="background-color: #d81b60;">
                    Masuk ke Admin Panel
                </button>
                <!-- Tombol Back ke Halaman Pengguna -->
                <a href="{{ route('home') }}" class="btn btn-light rounded-pill py-2 fw-semibold text-secondary border mt-1">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Utama
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>