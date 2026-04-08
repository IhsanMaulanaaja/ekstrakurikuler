<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Prestasi Ekskul</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ===== BODY ===== */
        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #dce3ea;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== TOP NAVBAR ===== */
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
            border-bottom: 1px solid #cbd5e1;
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
            width: 235px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 14px 20px;
            min-height: calc(100vh - 62px);
            flex-shrink: 0;
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .sidebar-title {
            font-size: 14.5px;
            font-weight: 800;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 16px;
            line-height: 1.35;
        }

        .sidebar-divider {
            width: 100%;
            height: 1px;
            background: rgba(0, 0, 0, 0.13);
            margin-bottom: 10px;
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
            gap: 12px;
            padding: 11px 16px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15.5px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.15s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .nav-item.active {
            background: #5b8deb;
            color: #fff;
            font-weight: 700;
        }

        .nav-item .nav-icon {
            width: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
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
            padding: 12px 16px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background 0.15s;
        }

        .logout-btn:hover {
            background: #c1121f;
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 24px 28px;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background: #dce3ea;
        }

        .main h1 {
            font-size: 26px;
            font-weight: 800;
            color: #111;
            margin-bottom: 24px;
        }

        /* ===== TABLE ===== */
        .prestasi-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            font-size: 15px;
            text-align: center;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .prestasi-table thead {
            background: #cbd5e1;
        }

        .prestasi-table th {
            font-weight: 800;
            color: #333;
            padding: 16px 12px;
            border: 1px solid #94a3b8;
        }

        .prestasi-table td {
            padding: 12px;
            color: #333;
            border: 1px solid #94a3b8;
            vertical-align: middle;
            font-weight: 600;
        }

        .photo-cell img {
            height: 120px;
            width: 190px;
            object-fit: cover;
            border-radius: 4px;
            display: block;
            margin: 0 auto;
            border: 1px solid #eee;
        }
    </style>
</head>

<body>
    <!-- TOP NAVBAR -->
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo"
                style="border-radius: 4px;" />
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div class="bell-icon"><i class="fas fa-bell"></i></div>
            <button class="user-btn">{{ Auth::user()->name }} &nbsp;<i class="fas fa-chevron-down"
                    style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-body">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Logo"
                style="margin-bottom:8px; border-radius: 6px;" />
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>

            <nav class="sidebar-nav">
                <a class="nav-item {{ request()->routeIs('dashboard-siswa') ? 'active' : '' }}"
                    href="{{ route('dashboard-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item {{ request()->routeIs('pilihan-ekskul') ? 'active' : '' }}"
                    href="{{ route('pilihan-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-hand-pointer"></i></span>
                    Pilihan ekskul
                </a>

                <a class="nav-item {{ request()->routeIs('absensi-siswa') ? 'active' : '' }}"
                    href="{{ route('absensi-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    Absensi Ekskul
                </a>
                <a class="nav-item active" href="{{ route('prestasi-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-medal"></i></span>
                    Prestasi
                </a>
            </nav>

            <div class="logout-area">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">

            <h1>Prestasi Ekskul</h1>

            <table class="prestasi-table">
                <thead>
                    <tr>
                        <th>Foto Dokumentasi</th>
                        <th>Nama Lomba</th>
                        <th>Tanggal Juara</th>
                        <th>Juara</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @forelse($lombas as $lomba)
                        <tr>
                            <td class="photo-cell">
                                @if ($lomba->dokumentasi->count() > 0)
                                    <img src="{{ $lomba->dokumentasi->first()->foto ? asset('storage/' . $lomba->dokumentasi->first()->foto) : asset('images/no-image.png') }}" alt="Foto Lomba" style="width:120px; height:80px; object-fit:cover;">
                                @else
                                    <span style="color:#888; font-size:13px; font-style:italic;">Belum ada foto</span>
                                @endif
                            </td>
                            <td>{{ $lomba->nama_lomba }} <br><span
                                    style="font-size:12px;color:#666;">({{ $lomba->ekskul->nama ?? '-' }})</span></td>
                            <td>{{ \Carbon\Carbon::parse($lomba->tanggal)->format('d M Y') }}</td>
                            <td>{{ $lomba->juara ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 24px; color: #888;">Belum ada data lomba tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </main>
    </div>
</body>

</html>
