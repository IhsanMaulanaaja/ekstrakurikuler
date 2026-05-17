<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - {{ config('app.name', 'SmartSchool Ekskul') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            min-height: 100%;
            width: 100%;
        }

        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #dce3ea;
            color: #1a1a1a;
        }

        .topnav {
            background: #f5f0e8;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            height: 62px;
            position: sticky;
            top: 0;
            z-index: 200;
            border-bottom: 1px solid #e0dbd0;
        }

        .topnav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-text {
            font-size: 19px;
            font-weight: 800;
            color: #1c1c1c;
            letter-spacing: -0.2px;
        }

        .topnav-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .bell-icon {
            font-size: 22px;
            color: #222;
            cursor: pointer;
        }

        .user-btn {
            background: #5b8deb;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 9px 22px;
            font-size: 17px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ===== LAYOUT ===== */
        .app-body {
            display: flex;
            flex: 1;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 195px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 12px 20px;
            min-height: calc(100vh - 62px);
            flex-shrink: 0;
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .sidebar-title {
            font-size: 14px;
            font-weight: 800;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 14px;
            line-height: 1.35;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: rgba(0, 0, 0, 0.13);
            margin-bottom: 8px;
        }

        .sidebar-nav {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 2px;
            flex: 1;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.15s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .nav-item.active {
            background: #ffffff;
            color: #1a1a1a;
            font-weight: 700;
        }

        .nav-item .nav-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .logout-area {
            width: 100%;
            margin-top: 14px;
        }

        .logout-btn {
            width: 100%;
            background: #e63946;
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 11px 14px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background 0.15s;
        }

        .logout-btn:hover {
            background: #c1121f;
        }

        .main {
            flex: 1;
            padding: 18px 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: #dce3ea;
            min-width: 0;
        }

        .content-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }
        
        .content-header {
            padding: 24px 28px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            justify-content: space-between;
        }

        .content-header h1 {
            font-size: 22px;
            font-weight: 800;
            color: #1a1a1a;
        }

        .content-header p {
            color: #6b7280;
            font-size: 13px;
        }

        .user-approval-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-approval-table th,
        .user-approval-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #eaeef2;
            vertical-align: middle;
            text-align: left;
            font-size: 14px;
        }

        .user-approval-table th {
            background: #f8fafc;
            color: #475569;
            font-weight: 700;
            font-size: 13px;
            padding: 12px 14px;
        }

        .user-approval-table tbody tr:hover {
            background: #f9fafb;
        }

        .btn-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .btn-primary,
        .btn-success,
        .btn-danger,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: none;
            border-radius: 8px;
            padding: 6px 10px;
            color: #ffffff;
            font-weight: 700;
            font-size: 13px;
            cursor: pointer;
            transition: transform 0.15s ease, background 0.15s ease;
            text-decoration: none;
        }

        .btn-primary { background: #3b82f6; }
        .btn-primary:hover { background: #2563eb; }
        .btn-success { background: #10b981; }
        .btn-success:hover { background: #059669; }
        .btn-danger { background: #ef4444; }
        .btn-danger:hover { background: #dc2626; }
        .btn-secondary { background: #6b7280; }
        .btn-secondary:hover { background: #4b5563; }

        .pagination {
    margin: 0;
}

.pagination svg {
    width: 18px;
    height: 18px;
}

.pagination .page-link {
    border-radius: 8px !important;
    margin: 0 2px;
}

.pagination .page-item.active .page-link {
    background: #3b82f6;
    border-color: #3b82f6;
    color: #fff;
}

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            padding: 20px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
        }

        .badge.pending { background: #fef3c7; color: #92400e; }
        .badge.approved { background: #d1fae5; color: #064e3b; }
        .badge.rejected { background: #fee2e2; color: #991b1b; }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            font-weight: 700;
        }

        .status-pending { background: #fef3c7; color: #92400e; }
        .status-approved { background: #d1fae5; color: #064e3b; }
        .status-rejected { background: #fee2e2; color: #991b1b; }

        .info-box {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 16px;
            padding: 20px;
        }

        .info-box h4 {
            margin-bottom: 14px;
            font-size: 16px;
            font-weight: 800;
            color: #1e40af;
        }

        .info-box ul { margin-top: 12px; list-style: none; padding-left: 0; }
        .info-box li { margin-bottom: 8px; color: #1e3a8a; }

        .pagination-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
        }

        .pagination-info {
            font-size: 13px;
            color: #525252;
            font-weight: 600;
        }

        .pagination-links {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            color: #1f2937;
            transition: all 0.15s ease;
            padding: 0 12px;
        }

        .pagination-links a:hover {
            background: #f8fafc;
            border-color: #3b82f6;
            color: #3b82f6;
        }

        .pagination-links span.active {
            background: #3b82f6;
            color: #fff;
            border-color: #3b82f6;
        }

        .pagination-links span.disabled {
            color: #9ca3af;
            border-color: #e5e7eb;
            background: #f8fafc;
            cursor: not-allowed;
        }

        @media (max-width: 1100px) {
            .app-body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; top: 0; }
            .main { padding: 18px 16px 28px; }
        }

        @media (max-width: 780px) {
            .topnav { flex-wrap: wrap; padding: 16px; gap: 12px; }
            .sidebar { padding: 16px; }
            .sidebar-title { font-size: 12px; }
            .nav-item { font-size: 13px; }
            .grid-3,
            .grid-2 { grid-template-columns: 1fr; }
        }
    </style>
    @yield('extra-styles')
</head>
<body>
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo"
                style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div class="bell-icon"><i class="fas fa-bell"></i></div>
            <button class="user-btn">{{ Auth::user()->name ?? 'Theo' }} <i class="fas fa-chevron-down"
                    style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-body">
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Logo"
                style="margin-bottom: 8px; border-radius: 6px;">
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>
            <nav class="sidebar-nav">
                <a class="nav-item {{ Request::routeIs('dashboard-admin') ? 'active' : '' }}" href="{{ route('dashboard-admin') }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item active" href="{{ route('user-approval.index') }}">
                    <span class="nav-icon"><i class="fas fa-check-circle"></i></span>
                    Persetujuan Akun
                </a>
                <a class="nav-item {{ Request::routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Pengguna
                </a>
                <a class="nav-item {{ Request::routeIs('anggota-admin') ? 'active' : '' }}" href="{{ route('anggota-admin') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>
                <a class="nav-item {{ Request::routeIs('ekstrakurikuler.*') ? 'active' : '' }}" href="{{ route('ekstrakurikuler.index') }}">
                    <span class="nav-icon"><i class="fas fa-book"></i></span>
                    Daftar Ekskul
                </a>
                <a class="nav-item {{ Request::routeIs('pendaftaran-ekskul') ? 'active' : '' }}" href="{{ route('pendaftaran-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>
                <a class="nav-item {{ Request::routeIs('jadwal-admin') ? 'active' : '' }}" href="{{ route('jadwal-admin') }}">
                    <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                    Jadwal Latihan
                </a>
                <a class="nav-item {{ Request::routeIs('absensi-admin') ? 'active' : '' }}" href="{{ route('absensi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    Absensi
                </a>
                <a class="nav-item {{ Request::routeIs('prestasi-admin') ? 'active' : '' }}" href="{{ route('prestasi-admin') }}">
                    <span class="nav-icon"><i class="fas fa-medal"></i></span>
                    Kegiatan &amp; Prestasi
                </a>
            </nav>
            <div class="logout-area">
                <form method="POST" action="{{ route('logout') }}" style="width:100%;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
</html>
