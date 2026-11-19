<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Personal Website - Portofolio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        color: #333;
        transition: background-color 0.3s ease;
    }

    .hero-section {
        background: linear-gradient(135deg, #d81b60, #ff4081);
        color: white;
        padding: 90px 0 110px 0;
        border-radius: 0 0 3rem 3rem;
        box-shadow: 0 10px 30px rgba(216, 27, 96, 0.2);
    }

    .profile-img-container {
        width: 220px;
        height: 220px;
        margin: 0 auto;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        border: 4px solid white;
        background-color: #e9ecef;
    }
    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-custom {
        border: none;
        border-radius: 1rem;
        background: #ffffff;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }
    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.08);
    }

    section {
        scroll-margin-top: 100px;
        padding-top: 60px;
        padding-bottom: 60px;
    }

    /* ========================================== */
    /* PENGATURAN SOFT DARK MODE YANG ESTETIK     */
    /* ========================================== */
    [data-bs-theme="dark"] body {
        background-color: #1a1625 !important; /* Warna ungu-abu pastel yang lembut */
        color: #ffffff !important;
    }

    [data-bs-theme="dark"] .card-custom {
        background-color: #241f33 !important; /* Warna kotak card sedikit lebih terang agar kontras */
        border-color: #38304d !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3) !important;
    }

    /* Memastikan semua teks di konten & card menjadi putih bersih */
    [data-bs-theme="dark"] h1:not(.navbar-brand), 
    [data-bs-theme="dark"] h2, 
    [data-bs-theme="dark"] h3, 
    [data-bs-theme="dark"] h4, 
    [data-bs-theme="dark"] h5, 
    [data-bs-theme="dark"] h6, 
    [data-bs-theme="dark"] p, 
    [data-bs-theme="dark"] span, 
    [data-bs-theme="dark"] small,
    [data-bs-theme="dark"] .text-dark,
    [data-bs-theme="dark"] .text-secondary,
    [data-bs-theme="dark"] .text-muted {
        color: #ffffff !important;
    }

    /* Badge tahun di experiences menggunakan tema warna pink hero section agar kontras & jelas */
    [data-bs-theme="dark"] .badge {
        background-color: #ff4081 !important;
        color: #ffffff !important;
        font-weight: 600;
    }

    [data-bs-theme="dark"] .navbar .nav-link {
            color: #333333 !important; /* Atau bisa pakai #ffffff kalau navbarnya mau ikut putih, tapi ini dibuat kontras */
        }
</style>
</head>
<body>

   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#" style="color: #d81b60;">
                <i class="bi bi-heart-fill me-1"></i> MyPersonal
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-2">
                    <li class="nav-item"><a class="nav-link px-3 fw-semibold" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-semibold" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-semibold" href="#experiences">Experiences</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-semibold" href="#contact">Contact</a></li>

                    <!-- Tombol Toggle Dark Mode -->
<li class="nav-item">
    <button id="darkModeToggle" class="btn btn-outline-secondary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" title="Ubah Tema">
        <i class="bi bi-moon-fill" id="darkModeIcon"></i>
    </button>
</li>

                    <!-- Tombol Admin Panel (Jika diklik pengguna biasa akan diminta verifikasi password admin) -->
                    <!-- Tombol Admin Panel yang mengarah ke halaman verifikasi khusus -->
<li class="nav-item ms-lg-2">
    <a href="{{ route('admin.verify') }}" class="btn btn-outline-danger rounded-pill px-4 fw-semibold">Admin Panel</a>
</li>
                    <!-- Tombol Log Out -->
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="btn btn-danger rounded-pill px-4 fw-semibold text-white">Log Out</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center">
        <div class="container px-4">
            <h1 class="display-5 fw-bold mb-3">Halo, Selamat Datang di Website Saya!</h1>
            <p class="lead mb-4 opacity-9 mx-auto" style="max-width: 600px;">Portofolio digital interaktif yang bersih, rapi, dan dikembangkan menggunakan Laravel.</p>
            <a href="#about" class="btn btn-light btn-lg rounded-pill px-5 text-danger fw-bold shadow-sm">Kenali Saya Lebih Dekat</a>
        </div>
    </header>

    <div class="container my-4">
        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

     <!-- About Me Section -->
     <section id="about">
            <div class="row align-items-center g-5">
                <div class="col-lg-4 text-center">
                <div class="profile-img-container">
    <img src="{{ isset($user->photo) && $user->photo ? asset('storage/' . $user->photo) : 'https://via.placeholder.com/220' }}" alt="Foto Profil" style="width: 100%; height: 100%; object-fit: cover;">
</div>
                </div>
                <div class="col-lg-8">
                    <h2 class="fw-bold text-dark mb-2">{{ $user->name ?? 'Jaskia Ellysia S.' }}</h2>
                    <h5 class="text-danger fw-semibold mb-3">{{ $user->title ?? 'Web Developer' }}</h5>

                    <p class="text-secondary lead mb-4" style="line-height: 1.8; white-space: pre-line;">
                        suka makan, suka jajan, suka nyanyi, suka coding dan suka uang
                    </p>
                    <h5 class="fw-bold text-dark mb-3">Keahlian (Skills):</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-white text-danger border border-danger-subtle px-3 py-2 rounded-pill shadow-sm fw-semibold">PHP</span>
                        <span class="badge bg-white text-danger border border-danger-subtle px-3 py-2 rounded-pill shadow-sm fw-semibold">Laravel</span>
                        <span class="badge bg-white text-danger border border-danger-subtle px-3 py-2 rounded-pill shadow-sm fw-semibold">MySQL</span>
                        <span class="badge bg-white text-danger border border-danger-subtle px-3 py-2 rounded-pill shadow-sm fw-semibold">Bootstrap 5</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bagian Projects -->
        <section id="projects">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Daftar Project</h2>
                <p class="text-muted">Beberapa project pilihan yang telah saya buat.</p>
            </div>
            <div class="row g-4">
                @forelse($projects as $project)
                <div class="col-md-4">
                    <div class="card card-custom h-100 p-4">
                        <div class="card-body d-flex flex-column p-0">
                            <h4 class="fw-bold text-dark mb-2">{{ $project->title }}</h4>
                            <p class="text-muted text-secondary mb-4 flex-grow-1" style="line-height: 1.6;">{{ $project->description }}</p>
                            @if($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="btn btn-sm btn-outline-danger rounded-pill align-self-start px-3 py-2 fw-semibold">Kunjungi Link <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center text-muted py-5">
                    <p class="mb-0">Belum ada data project yang ditambahkan.</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- Bagian Experiences -->
        <section id="experiences">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Pengalaman (Experiences)</h2>
                <p class="text-muted">Riwayat organisasi atau pengalaman kerja.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @forelse($experiences as $experience)
                    <div class="card card-custom mb-3 p-4">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
                                <h5 class="fw-bold mb-0" style="color: #d81b60;">{{ $experience->role }}</h5>
                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-semibold">{{ $experience->year }}</span>
                            </div>
                            <h6 class="text-muted mb-3 fw-semibold">{{ $experience->company }}</h6>
                            <p class="temp text-secondary mb-0" style="line-height: 1.6;">{{ $experience->description }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center text-muted py-4">
                        <p class="mb-0">Belum ada data pengalaman yang ditambahkan.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Bagian Contact / Kirim Pesan -->
        <section id="contact">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card card-custom p-4 p-md-5">
                        <h3 class="fw-bold text-dark mb-2 text-center">Kirim Pesan</h3>
                        <p class="text-muted text-center mb-4 small">Pesan yang dikirim akan masuk ke database admin.</p>
                        
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Nama Anda</label>
                                <input type="text" name="name" class="form-control rounded-3 p-3 bg-light border-0" placeholder="Masukkan nama..." required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Email</label>
                                <input type="email" name="email" class="form-control rounded-3 p-3 bg-light border-0" placeholder="Masukkan email..." required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary small">Pesan</label>
                                <textarea name="message" class="form-control rounded-3 p-3 bg-light border-0" rows="4" placeholder="Tulis pesan..." required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn text-white rounded-pill py-3 fw-semibold shadow-sm" style="background-color: #d81b60;">Kirim Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-white text-center py-4 border-top mt-5">
        <div class="container text-muted small">
            &copy; 2026 My Personal Website. Dibuat dengan Laravel & Bootstrap.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');
    const htmlElement = document.documentElement;

    function applyTheme(isDark) {
        const cards = document.querySelectorAll('.card-custom');
        // Menangkap semua teks, link navbar, dan elemen tahun/badge
        const allTexts = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, span, small, a, .nav-link, .badge, div');

        if (isDark) {
            htmlElement.setAttribute('data-bs-theme', 'dark');
            
            // Paksa semua teks termasuk navbar jadi putih
            allTexts.forEach(el => {
                if (!el.classList.contains('btn') && !el.classList.contains('navbar-brand')) {
                    el.style.color = '#ffffff';
                }
            });

            cards.forEach(card => {
                card.style.backgroundColor = '#241f33';
                card.style.borderColor = '#38304d';
            });

            darkModeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            darkModeToggle.classList.replace('btn-outline-secondary', 'btn-outline-warning');
            localStorage.setItem('theme', 'dark');
        } else {
            htmlElement.removeAttribute('data-bs-theme');
            
            allTexts.forEach(el => {
                el.style.color = '';
            });

            cards.forEach(card => {
                card.style.backgroundColor = '#ffffff';
                card.style.borderColor = '';
            });

            darkModeIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
            darkModeToggle.classList.replace('btn-outline-warning', 'btn-outline-secondary');
            localStorage.setItem('theme', 'light');
        }
    }

    if (localStorage.getItem('theme') === 'dark') {
        applyTheme(true);
    }

    darkModeToggle.addEventListener('click', () => {
        const isDark = htmlElement.getAttribute('data-bs-theme') !== 'dark';
        applyTheme(isDark);
    });
</script>
</body>
</html>