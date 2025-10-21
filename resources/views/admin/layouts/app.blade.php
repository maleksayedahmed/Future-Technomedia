<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - @yield('title', 'Future Technomedia')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Admin CSS -->
    <style>
        :root {
            --primary-color: #007bff;
            --sidebar-bg: #343a40;
            --sidebar-text: #ffffff;
            --sidebar-hover: #495057;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background: linear-gradient(135deg, var(--sidebar-bg) 0%, #495057 100%);
            min-height: 100vh;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding: 20px 0;
            transition: all 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.35) transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 12px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        .sidebar.collapsed {
            width: 70px;
            overflow: visible;
        }

        .sidebar.collapsed .nav-link {
            overflow: hidden;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar .brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 30px;
        }

        .sidebar .brand h4 {
            color: var(--sidebar-text);
            margin: 0;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed .brand h4 {
            font-size: 0;
        }

        .sidebar .nav-item {
            margin: 5px 0;
        }

        .sidebar .nav-link {
            color: var(--sidebar-text);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0 25px 25px 0;
            margin-right: 20px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: var(--primary-color);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 15px;
            text-align: center;
        }

        .sidebar.collapsed .nav-link span {
            display: none;
        }

        .sidebar .nav {
            padding-right: 10px;
        }

        .sidebar.collapsed::-webkit-scrollbar {
            display: none;
        }

        .sidebar.collapsed {
            overflow-y: auto;
        }

        .sidebar.collapsed .nav {
            padding-right: 0;
        }

        .main-content {
            margin-left: 250px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        .topbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 30px;
        }

        .content-wrapper {
            padding: 0 30px 30px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .stats-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, #0056b3 100%);
            color: white;
        }

        .stats-card .card-body {
            padding: 30px;
        }

        .stats-card h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .btn-toggle-sidebar {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .table th {
            border-top: none;
            font-weight: 600;
            color: #495057;
            background-color: #f8f9fa;
        }

        .badge-status {
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .image-preview {
            max-width: 100px;
            max-height: 100px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                margin-left: -100%;
            }

            .sidebar.show {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="brand">
            <h4><i class="fas fa-cog"></i> <span>Admin Panel</span></h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}"
                    href="{{ route('admin.sliders.index') }}">
                    <i class="fas fa-images"></i>
                    <span>Sliders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.features.*') ? 'active' : '' }}"
                    href="{{ route('admin.features.index') }}">
                    <i class="fas fa-star"></i>
                    <span>Features</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.fact-sections.*') ? 'active' : '' }}"
                    href="{{ route('admin.fact-sections.index') }}">
                    <i class="fas fa-layer-group"></i>
                    <span>Fact Sections</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.facts.*') ? 'active' : '' }}"
                    href="{{ route('admin.facts.index') }}">
                    <i class="fas fa-chart-line"></i>
                    <span>Facts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}"
                    href="{{ route('admin.projects.index') }}">
                    <i class="fas fa-folder-open"></i>
                    <span>Projects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.blogs-page-content.*') ? 'active' : '' }}"
                    href="{{ route('admin.blogs-page-content.edit') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Blogs Page</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"
                    href="{{ route('admin.blogs.index') }}">
                    <i class="fas fa-blog"></i>
                    <span>Blog Posts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}"
                    href="{{ route('admin.faqs.index') }}">
                    <i class="fas fa-question-circle"></i>
                    <span>FAQs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"
                    href="{{ route('admin.testimonials.index') }}">
                    <i class="fas fa-comments"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}"
                    href="{{ route('admin.clients.index') }}">
                    <i class="fas fa-handshake"></i>
                    <span>Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}"
                    href="{{ route('admin.contacts.index') }}">
                    <i class="fas fa-envelope"></i>
                    <span>Contact Messages</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.abouts.*') ? 'active' : '' }}"
                    href="{{ route('admin.abouts.index') }}">
                    <i class="fas fa-info-circle"></i>
                    <span>About Page</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"
                    href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-cog"></i>
                    <span>Site Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <button class="btn-toggle-sidebar" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <div class="ms-auto">
                <span class="text-muted">Welcome to Admin Dashboard</span>
            </div>
        </div>

        <!-- Content -->
        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }

        // Auto-dismiss alerts
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bootstrapAlert = new bootstrap.Alert(alert);
                bootstrapAlert.close();
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>

</html>
