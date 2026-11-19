<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portofolio</title>
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #ffffff;
            border-right: 1px solid #dee2e6;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }
        .nav-link {
            color: #495057;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: all 0.2s;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #ff2d55;
            color: #ffffff !important;
        }
    </style>
</head>
<body>

    <!-- Sidebar Kiri -->
    <div class="sidebar d-flex flex-column p-4 shadow-sm">
        <h4 class="fw-bold text-dark mb-4"><i class="bi bi-heart-fill text-danger me-2"></i>MyPersonal</h4>
        
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}">
                    <i class="bi bi-folder-fill me-2"></i> Projects
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('experiences.index') ?? '#' }}" class="nav-link {{ request()->routeIs('experiences*') ? 'active' : '' }}">
                    <i class="bi bi-briefcase-fill me-2"></i> Experiences
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile*') ? 'active' : '' }}">
                    <i class="bi bi-person-fill me-2"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('messages.index') }}" class="nav-link {{ request()->routeIs('messages*') ? 'active' : '' }}">
                    <i class="bi bi-chat-dots-fill me-2"></i> Messages
                </a>
            </li>
        </ul>

        <hr>
        <div class="dropdown">
            <a href="/" target="_blank" class="btn btn-outline-dark w-100 mb-2 rounded-pill btn-sm">
                <i class="bi bi-globe me-1"></i> Lihat Website
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-light text-danger w-100 rounded-pill btn-sm border">
                    <i class="bi bi-box-arrow-right me-1"></i> Log Out
                </button>
            </form>
        </div>
    </div>

    <!-- Konten Utama di Kanan -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>