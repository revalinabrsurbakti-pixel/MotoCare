<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') | MotoCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #14243d;
            --blue: #2878f0;
            --background: #f4f7fc;
            --text: #24334b;
            --muted: #8592a6;
            --border: #edf0f5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            font-family: 'Inter', sans-serif;
            color: var(--text);
            font-size: 14px;
        }

        /* SIDEBAR */

        .sidebar {
            width: 265px;
            height: 100vh;
            min-height: 100vh;
            background: linear-gradient(180deg, #14243d, #101d32);
            position: fixed;
            top: 0;
            left: 0;
            padding: 28px 19px;
            z-index: 1050;
            overflow-y: auto;
            isolation: isolate;
            pointer-events: auto;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 42px;
            color: white;
            font-size: 24px;
            font-weight: 800;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #3c91ff, #1764d5);
            border-radius: 13px;
            font-size: 23px;
        }

        .brand small {
            display: block;
            color: #91a4c0;
            font-size: 9px;
            letter-spacing: 2px;
            margin-top: 2px;
        }

        .menu-label {
            color: #8294b0;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin: 25px 12px 12px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 13px;
            position: relative;
            z-index: 1051;
            pointer-events: auto;
            cursor: pointer;
            color: #c5d1e2;
            text-decoration: none;
            padding: 13px 14px;
            margin-bottom: 6px;
            border-radius: 11px;
            font-size: 13px;
            font-weight: 500;
            transition: all .2s ease;
        }

        .sidebar a i {
            font-size: 17px;
            width: 22px;
            text-align: center;
        }

        .sidebar a:hover {
            color: white;
            background: rgba(255,255,255,.08);
            transform: translateX(3px);
        }

        .sidebar a.active {
            color: white;
            background: linear-gradient(110deg, #2878f0, #1764d5);
            box-shadow: 0 5px 15px rgba(40,120,240,.25);
        }

        .sidebar-footer {
            margin-top: 45px;
            padding: 16px 13px;
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 12px;
            color: #c5d1e2;
            font-size: 11px;
        }

        .sidebar-footer i {
            color: #50d6a0;
        }

        /* MAIN CONTENT */

        .main-content {
            margin-left: 265px;
            min-height: 100vh;
            padding: 30px 34px;
            position: relative;
            z-index: 1;
        }

        .topbar {
            background: white;
            padding: 20px 25px;
            border: 1px solid var(--border);
            border-radius: 16px;
            margin-bottom: 28px;
            box-shadow: 0 5px 20px rgba(28,45,75,.035);
        }

        .topbar h5 {
            color: var(--navy);
            font-weight: 700;
            font-size: 17px;
        }

        .topbar small {
            color: var(--muted);
            font-size: 12px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text);
            font-weight: 600;
            font-size: 12px;
        }

        .admin-avatar {
            width: 39px;
            height: 39px;
            border-radius: 12px;
            background: #eaf2ff;
            color: var(--blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        /* CONTENT */

        .content-card {
            background: white;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 5px 22px rgba(28,45,75,.035);
        }

        .page-heading {
            color: var(--navy);
            font-size: 23px;
            font-weight: 800;
        }

        .page-description {
            color: var(--muted);
            font-size: 13px;
        }

        /* BUTTONS */

        .btn {
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            padding: 10px 16px;
        }

        .btn-primary {
            background: var(--blue);
            border-color: var(--blue);
        }

        .btn-primary:hover {
            background: #1764d5;
            border-color: #1764d5;
        }

        .btn-secondary {
            background: #edf1f7;
            border-color: #edf1f7;
            color: #53627a;
        }

        /* FORM */

        .form-label {
            color: #34445c;
            font-size: 12px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border: 1px solid #e3e9f1;
            border-radius: 9px;
            padding: 11px 13px;
            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #78aaff;
            box-shadow: 0 0 0 3px rgba(40,120,240,.1);
        }

        /* TABLE */

        .table {
            font-size: 12px;
            color: var(--text);
            vertical-align: middle;
        }

        .table thead th {
            background: #f6f8fc;
            color: #66758d;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .6px;
            font-weight: 700;
            padding: 15px 12px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .table tbody td {
            padding: 14px 12px;
            border-color: #f0f2f6;
        }

        .table tbody tr:hover {
            background: #f9fbff;
        }

        /* RESPONSIVE */

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                min-height: auto;
                padding: 18px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .sidebar a {
                display: inline-flex;
                margin-right: 4px;
                padding: 10px;
            }

            .menu-label {
                margin-top: 15px;
            }

            .sidebar-footer {
                margin-top: 15px;
            }

            .main-content {
                margin-left: 0;
                padding: 18px;
            }

            .admin-profile span {
                display: none;
            }

            .content-card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-wrench-adjustable-circle"></i>
            </div>

            <div>
                MotoCare
                <small>SERVICE MANAGEMENT</small>
            </div>
        </div>

        <div class="menu-label">Menu Utama</div>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <a href="{{ route('pelanggan.index') }}"
           class="{{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i>
            Data Pelanggan
        </a>

        <a href="{{ route('kendaraan.index') }}"
           class="{{ request()->routeIs('kendaraan.*') ? 'active' : '' }}">
            <i class="bi bi-bicycle"></i>
            Data Kendaraan
        </a>

        <div class="menu-label">Transaksi Service</div>

        <a href="{{ route('daftar-service.index') }}"
           class="{{ request()->routeIs('daftar-service.*') ? 'active' : '' }}">
            <i class="bi bi-clipboard-check-fill"></i>
            Daftar Service
        </a>

        <a href="{{ route('data-service.index') }}"
           class="{{ request()->routeIs('data-service.*') ? 'active' : '' }}">
            <i class="bi bi-tools"></i>
            Data Service
        </a>

        <a href="{{ route('pembayaran-service.index') }}"
           class="{{ request()->routeIs('pembayaran-service.*') ? 'active' : '' }}">
            <i class="bi bi-credit-card-2-front-fill"></i>
            Pembayaran Service
        </a>

        <div class="sidebar-footer">
            <div class="mb-2">
                <i class="bi bi-circle-fill me-2"></i>
                Sistem Aktif
            </div>
            <span>Motorcycle Service Management</span>
            <div class="mt-2">MotoCare © 2026</div>
        </div>

    </aside>

    <main class="main-content">

        <div class="topbar d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1">@yield('page-title', 'Dashboard')</h5>
                <small>
                    <i class="bi bi-house-door me-1"></i>
                    Sistem Informasi Pelayanan Bengkel Motor
                </small>
            </div>

            <div class="admin-profile">
                <div class="admin-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>
                <span>
                    Administrator
                    <small class="d-block text-muted fw-normal">
                        Pengelola Sistem
                    </small>
                </span>
            </div>
        </div>

        @yield('content')

        <footer class="text-center mt-4 py-3">
            <small class="text-muted">
                © 2026 MotoCare. Motorcycle Service Management System.
            </small>
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
