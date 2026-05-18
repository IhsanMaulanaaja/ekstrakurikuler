<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool - Rekap Absensi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #dce3ea;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
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
            width: 100%;
        }
        .topnav-brand { display: flex; align-items: center; gap: 10px; }
        .topnav-brand img { width: 38px; height: 38px; border-radius: 4px; object-fit: cover; }
        .brand-text { font-size: 19px; font-weight: 800; color: #1c1c1c; letter-spacing: -0.2px; }
        .topnav-right { display: flex; align-items: center; gap: 18px; }
        .bell-icon { font-size: 22px; color: #222; cursor: pointer; display: flex; align-items: center; justify-content: center; border: none; background: none; }
        .user-btn { background: #5b8deb; color: #fff; border: none; border-radius: 10px; padding: 9px 22px; font-size: 17px; font-weight: 800; cursor: pointer; display: flex; align-items: center; gap: 10px; }
        .user-btn:hover { background: #4a7cdb; }
        .app-body { display: flex; flex: 1; min-height: calc(100vh - 62px); width: 100%; }
        .sidebar { width: 195px; background: #a8c4d8; display: flex; flex-direction: column; align-items: center; padding: 20px 12px 20px; flex-shrink: 0; position: sticky; top: 62px; height: calc(100vh - 62px); overflow-y: auto; }
        .sidebar-title { font-size: 14px; font-weight: 800; color: #1a1a1a; text-align: center; margin-bottom: 14px; line-height: 1.35; }
        .sidebar-divider { width: 100%; height: 1px; background: rgba(0,0,0,.13); margin-bottom: 8px; }
        .sidebar-nav { width: 100%; display: flex; flex-direction: column; gap: 2px; flex: 1; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 12px 14px; border-radius: 10px; cursor: pointer; font-size: 14px; font-weight: 600; color: #1a1a2e; text-decoration: none; transition: background .15s; white-space: nowrap; }
        .nav-item:hover { background: rgba(255,255,255,.35); }
        .nav-item.active { background: #ffffff; color: #1a1a1a; font-weight: 700; }
        .nav-item .nav-icon { width: 22px; display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; }
        .logout-area { width: 100%; margin-top: 14px; }
        .logout-btn { width: 100%; background: #e63946; color: #fff; border: none; border-radius: 6px; padding: 10px 14px; font-size: 15px; font-weight: 800; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: background .15s; }
        .logout-btn:hover { background: #c1121f; }
        .main { flex: 1; padding: 40px 24px; display: flex; justify-content: center; background: #dce3ea; overflow-y: auto; min-width: 0; }
        .card { width: 100%; max-width: 920px; background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,.08); padding: 28px; }
        .card-title { font-size: 18px; font-weight: 800; color: #111; margin-bottom: 18px; display: flex; align-items: center; gap: 10px; }
        .filter-row { display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin-bottom: 20px; }
        .filter-row label { font-size: 13px; font-weight: 700; color: #444; }
        .filter-row select { min-width: 200px; padding: 10px 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #fff; font-family: inherit; font-size: 14px; }
        .filter-row button { background: #3a7bd5; color: #fff; border: none; border-radius: 8px; padding: 10px 16px; font-size: 14px; font-weight: 700; cursor: pointer; }
        .summary-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; margin-bottom: 22px; }
        .summary-card { background: #fff; border: 1px solid #e5e7eb; border-radius: 14px; padding: 18px; min-height: 110px; display: flex; flex-direction: column; justify-content: center; gap: 8px; }
        .summary-card .label { font-size: 12px; font-weight: 700; color: #555; text-transform: uppercase; letter-spacing: .5px; }
        .summary-card .number { font-size: 28px; font-weight: 900; color: #111; }
        .summary-card.hadir { border-color: #16a34a; }
        .summary-card.izin { border-color: #f59e0b; }
        .summary-card.sakit { border-color: #ef4444; }
        .summary-card.alpha { border-color: #6b7280; }
        .attendance-table { width: 100%; border-collapse: collapse; }
        .attendance-table th, .attendance-table td { padding: 12px 14px; border-bottom: 1px solid #f3f4f6; text-align: left; color: #333; }
        .attendance-table th { background: #f8fafc; font-size: 13px; font-weight: 700; color: #555; }
        .attendance-table tr:last-child td { border-bottom: none; }
        .status-pill { display: inline-flex; align-items: center; padding: 5px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; color: #fff; }
        .status-pill.hadir { background: #16a34a; }
        .status-pill.izin { background: #f59e0b; }
        .status-pill.sakit { background: #ef4444; }
        .status-pill.alpha { background: #6b7280; }
        .empty-state { padding: 24px 0; color: #666; text-align: center; }
        @media (max-width: 960px) {
            .main { padding: 24px 18px; }
            .summary-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 680px) {
            .summary-grid { grid-template-columns: 1fr; }
            .filter-row { flex-direction: column; align-items: stretch; }
            .sidebar { position: relative; width: 100%; height: auto; top: 0; }
            .app-body { flex-direction: column; }
        }
    </style>
</head>
<body>
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" alt="Logo">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div class="bell-icon"><i class="fas fa-bell"></i></div>
            <a href="{{ route('profile.edit') }}" class="user-btn">{{ Auth::user()->name ?? 'Siswa' }} <i class="fas fa-chevron-down" style="font-size:13px;"></i></a>
        </div>
    </nav>
    <div class="app-body">
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Leaf logo" style="margin-bottom:8px;" />
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>
            <nav class="sidebar-nav">
                <a class="nav-item {{ request()->routeIs('dashboard-siswa') ? 'active' : '' }}" href="{{ route('dashboard-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item {{ request()->routeIs('pilihan-ekskul') ? 'active' : '' }}" href="{{ route('pilihan-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-hand-pointer"></i></span>
                    Pilihan ekskul
                </a>
                <a class="nav-item {{ request()->routeIs('absensi-siswa') ? 'active' : '' }}" href="{{ route('absensi-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                    Absensi Ekskul
                </a>
                <a class="nav-item {{ request()->routeIs('absensi.rekap') ? 'active' : '' }}" href="{{ route('absensi.rekap') }}">
                    <span class="nav-icon"><i class="fas fa-chart-line"></i></span>
                    Rekap Absensi
                </a>
                <a class="nav-item {{ request()->routeIs('prestasi-siswa') ? 'active' : '' }}" href="{{ route('prestasi-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-medal"></i></span>
                    Prestasi
                </a>
            </nav>
            <div class="logout-area">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
            </div>
        </aside>
        <main class="main">
            <div class="card">
                <div class="card-title"><i class="fas fa-chart-line"></i> Rekap Absensi Siswa</div>
                <form method="GET" class="filter-row" action="{{ route('absensi.rekap') }}">
                    <label for="period">Pilih Bulan</label>
                    <select id="period" name="period">
                        @foreach($monthOptions as $option)
                            <option value="{{ $option['value'] }}" {{ $option['value'] === $selectedPeriod ? 'selected' : '' }}>
                                {{ $option['label'] }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit"><i class="fas fa-filter"></i> Tampilkan</button>
                </form>
                <div class="summary-grid">
                    <div class="summary-card hadir">
                        <div class="label">Hadir</div>
                        <div class="number">{{ $rekapAbsensi['hadir'] ?? 0 }}</div>
                    </div>
                    <div class="summary-card izin">
                        <div class="label">Izin</div>
                        <div class="number">{{ $rekapAbsensi['izin'] ?? 0 }}</div>
                    </div>
                    <div class="summary-card sakit">
                        <div class="label">Sakit</div>
                        <div class="number">{{ $rekapAbsensi['sakit'] ?? 0 }}</div>
                    </div>
                    <div class="summary-card alpha">
                        <div class="label">Alpha</div>
                        <div class="number">{{ $rekapAbsensi['alpha'] ?? 0 }}</div>
                    </div>
                </div>
                <table class="attendance-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Ekskul</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($absensiList as $absensi)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->locale('id')->isoFormat('DD MMM YYYY') }}</td>
                                <td>{{ $absensi->ekskul->nama ?? '-' }}</td>
                                <td>
    <span class="status-pill {{ strtolower($absensi->status) == 'alfa' ? 'alpha' : strtolower($absensi->status) }}">
        {{ strtolower($absensi->status) == 'alfa' ? 'Alpha' : ucfirst($absensi->status) }}
    </span>
</td>
                                <td>{{ $absensi->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">Belum ada absensi untuk periode ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
