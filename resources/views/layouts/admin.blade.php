<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #4e73df, #6f42c1);
            color: #fff;
            box-shadow: 2px 0 6px rgba(0,0,0,0.05);
        }

        .sidebar h4 {
            font-weight: bold;
        }

        .sidebar a {
            color: #e0e0e0;
            text-decoration: none;
            padding: 0.6rem 1rem;
            display: block;
            border-radius: 6px;
            transition: all 0.2s;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background-color: rgba(255,255,255,0.1);
            color: #ffffff;
        }

        .main {
            margin-left: 250px;
            padding: 2rem;
        }

        @media (max-width: 768px) {
            .main {
                margin-left: 0;
                padding: 1rem;
            }

            .sidebar {
                display: none;
            }
        }

        .navbar {
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .card-stat {
            border: none;
            border-radius: 10px;
            transition: all 0.2s ease;
            background: #ffffff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .card-stat:hover {
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            transform: translateY(-4px);
        }

        .btn-outline-danger {
            border-radius: 8px;
            font-size: 0.9rem;
        }

        .nav-link {
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3 position-fixed" style="width:250px;">
            <h4 class="mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">📊 Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.produk') }}" class="nav-link">🛒 Produk</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link">👥 User</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link">📝 Artikel</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.order') }}" class="nav-link">📦 Order</a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main flex-grow-1">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg mb-4 px-4">
                <div class="container-fluid justify-content-between">
                    <span class="navbar-brand h5 mb-0">@yield('title')</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
