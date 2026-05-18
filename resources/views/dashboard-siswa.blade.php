<!DOCTYPE html>
<html lang="id">

<head>
    @php
        use Carbon\Carbon;
        use Illuminate\Support\Str;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #dce3ea;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
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
            background: #3a7bd5;
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
            padding: 24px 14px 20px;
            min-height: calc(100vh - 62px);
            flex-shrink: 0;
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .logo-wrapper {
            position: relative;
            width: 126px;
            height: 126px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            flex-shrink: 0;
        }

        .logo-wrapper svg.dashed-circle {
            position: absolute;
            top: 0;
            left: 0;
            width: 126px;
            height: 126px;
        }

        .logo-icons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0px;
            z-index: 1;
        }

        .logo-icons .top-row {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 0px;
        }

        .logo-icons .icon-grad {
            font-size: 46px;
            line-height: 1;
            margin: -4px 0 -2px;
        }

        .sidebar-title {
            font-size: 14px;
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
            padding: 12px 14px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
            text-decoration: none;
            transition: background 0.15s;
            white-space: nowrap;
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

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            width: 100%;
            max-width: 2220px;
            margin: 0 auto;
            padding: 18px 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background: #dce3ea;
            min-width: 0;
        }

        /* ===== WELCOME CARD ===== */
        .welcome-card {
            background: #fff;
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .avatar-circle {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: #c8c8c8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            color: #555;
            flex-shrink: 0;
            border: 2px solid #aaa;
        }

          .avatar-circle img {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
        }

        .welcome-top {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 3px;
        }

        .welcome-top h2 {
            font-size: 16px;
            font-weight: 800;
            color: #1a1a1a;
        }

        .badge-murid {
            background: #e8e8e8;
            color: #555;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
            border: 1px solid #ddd;
        }

        .welcome-date {
            font-size: 11.5px;
            color: #888;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .welcome-desc {
            font-size: 12.5px;
            color: #777;
        }

        /* ===== STATS ===== */
        .stats-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 14px;
        }

        .stat-card {
            border-radius: 12px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
            min-height: 82px;
        }

        .stat-card.red {
            background: #d96060;
        }

        .stat-card.yellow {
            background: #c9b84e;
        }

        .stat-card.green {
            background: #7aba7a;
        }

        .attendance-summary {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-top: 14px;
        }

        .summary-item {
            background: #fff;
            border-radius: 14px;
            padding: 16px 18px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-height: 96px;
            justify-content: center;
        }

        .summary-item .summary-label {
            font-size: 12px;
            font-weight: 700;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .summary-item .summary-number {
            font-size: 28px;
            font-weight: 900;
            color: #111;
        }

        .summary-item.hadir {
            border-left: 4px solid #16a34a;
        }

        .summary-item.izin {
            border-left: 4px solid #f59e0b;
        }

        .summary-item.sakit {
            border-left: 4px solid #ef4444;
        }

       .summary-item.alpha{
    border-left: 4px solid #6b7280 !important;
    padding-left: 12px;
}

        .filter-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 14px;
        }

        .filter-row label {
            font-size: 14px;
            font-weight: 700;
            color: #333;
        }

        .filter-row select,
        .filter-row button {
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 9px 12px;
            font-size: 14px;
        }

        .filter-row button {
            background: #3a7bd5;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        .filter-row button:hover {
            background: #285eaa;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        .attendance-table th,
        .attendance-table td {
            text-align: left;
            padding: 10px 12px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #333;
        }

        .attendance-table th {
            font-weight: 700;
            color: #555;
            background: #f8fafc;
        }

        .attendance-table tr:last-child td {
            border-bottom: none;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            color: #fff;
        }

        .status-pill.hadir {
            background: #16a34a;
        }

        .status-pill.izin {
            background: #f59e0b;
        }

        .status-pill.sakit {
            background: #ef4444;
        }

       .status-pill.alpha{
    background:#6b7280 !important;
    color:#ffffff !important;
}

        .cal-box {
            background: #fff;
            border-radius: 7px;
            width: 44px;
            height: 44px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            flex-shrink: 0;
        }

        .cal-box .cal-header {
            background: #c9b84e;
            color: #fff;
            font-size: 8.5px;
            font-weight: 800;
            text-align: center;
            padding: 2px 0;
            letter-spacing: 0.5px;
        }

        .cal-box .cal-num {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            font-weight: 900;
            color: #c9b84e;
            line-height: 1;
        }

        .stat-icon-wrap {
            font-size: 30px;
            flex-shrink: 0;
        }

        .stat-info {
            color: #fff;
        }

        .stat-info .stat-label {
            font-size: 11.5px;
            font-weight: 600;
            opacity: 0.95;
            margin-bottom: 1px;
            line-height: 1.3;
        }

        .stat-info .stat-number {
            font-size: 32px;
            font-weight: 900;
            line-height: 1;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 18px 20px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.07);
        }

        .card-title {
            font-size: 14.5px;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ekskul-table,
.pendaftaran-table,
.nilai-table {
    width: 100%;
    border-collapse: collapse;
}

.ekskul-table td,
.pendaftaran-table td,
.nilai-table td {
    padding: 10px 12px;
    font-size: 15px;
    color: #222;
}

/* biar isi sejajar dan gak loncat */
.row-inline {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

/* dash */
.dash {
    color: #888;
}

/* status */
.status {
    font-weight: 700;
}

/* badge */
.status-badge {
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 700;
}

.badge-accepted {
    background: #dcfce7;
    color: #166534;
}

.badge-rejected {
    background: #fee2e2;
    color: #991b1b;
}

.badge-pending {
    background: #fef9c3;
    color: #92400e;
}

/* nilai */
.grade-a {
    background: #dcfce7;
    color: #166534;
    padding: 4px 10px;
    border-radius: 6px;
    font-weight: 800;
}


        /* ===== TWO COL ===== */
        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .jadwal-item {
            font-size: 13.5px;
            color: #333;
            padding: 5px 0;
            line-height: 1.5;
        }

        .pengumuman-item {
            font-size: 13.5px;
            color: #333;
            padding: 10px 0;
            line-height: 1.6;
            border-bottom: 1px solid #f1f5f9;
            margin-bottom: 10px;
            word-break: break-word;
            position: relative;
            padding-left: 16px;
        }

        .pengumuman-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .pengumuman-item::before {
            content: '•';
            position: absolute;
            left: 0;
            top: 10px;
            font-size: 14px;
            color: #3b82f6;
            line-height: 1;
        }

        .pengumuman-item .pengumuman-title {
            display: block;
            font-weight: 800;
            margin-bottom: 4px;
            color: #111;
        }

        .pengumuman-item .pengumuman-body {
            display: block;
            margin-left: 0;
            color: #333;
        }

        .notif-item {
            font-size: 13.5px;
            color: #333;
            padding: 4px 0;
            display: flex;
            align-items: center;
            gap: 6px;
            line-height: 1.5;
        }

        .notif-item::before {
            content: '•';
            font-size: 16px;
            font-weight: 900;
            flex-shrink: 0;
        }
        @media (max-width: 1120px) {
            .app-body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                position: relative;
                top: 0;
                height: auto;
                min-height: auto;
            }

            .main {
                padding: 16px;
            }

            .stats-row {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 760px) {
            .topnav {
                flex-wrap: wrap;
                gap: 10px;
                padding: 12px 18px;
            }

            .user-btn {
                padding: 8px 16px;
                font-size: 15px;
            }

            .welcome-card,
            .card,
            .stat-card,
            .jadwal-card {
                padding: 16px;
            }

            .stats-row {
                grid-template-columns: 1fr;
            }

            .sidebar {
                padding: 18px 12px;
            }

            .nav-item {
                padding: 10px 12px;
                font-size: 13px;
            }

            .logout-btn {
                padding: 10px 14px;
                font-size: 14px;
            }
        }    
        
        /* ================= PROFILE IMAGE ================= */

.profile-photo{
    width:46px;
    height:46px;
    border-radius:50%;
    object-fit:cover;
    cursor:pointer;
    transition:0.3s ease;
}

.profile-photo:hover{
    transform:scale(1.08);
    opacity:0.9;
}

/* ================= IMAGE MODAL ================= */

.image-modal{
    display:none;
    position:fixed;
    z-index:9999;
    left:0;
    top:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.88);
    backdrop-filter:blur(6px);

    justify-content:center;
    align-items:center;

    animation:fadeIn 0.2s ease;
}

.modal-image{
    max-width:90%;
    max-height:85%;
    border-radius:18px;
    box-shadow:0 10px 40px rgba(0,0,0,0.4);

    animation:zoomIn 0.25s ease;
}

.close-modal{
    position:absolute;
    top:20px;
    right:35px;
    color:white;
    font-size:42px;
    font-weight:bold;
    cursor:pointer;
}

/* ANIMATION */

@keyframes zoomIn{
    from{
        transform:scale(0.8);
        opacity:0;
    }
    to{
        transform:scale(1);
        opacity:1;
    }
}

@keyframes fadeIn{
    from{
        opacity:0;
    }
    to{
        opacity:1;
    }
}
        
        
    </style>

</head>

<body>

    <!-- TOP NAVBAR -->
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo"
                style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <div class="bell-icon"><i class="fas fa-bell"></i></div>
            <a href="{{ route('profile.edit') }}" class="user-btn">{{ Auth::user()->name ?? 'Siswa' }} <i class="fas fa-chevron-down"
                    style="font-size:13px;"></i></a>
        </div>
    </nav>

    <div class="app-body">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Leaf logo"
                style="margin-bottom:8px;" />
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
                <a class="nav-item {{ request()->routeIs('absensi.rekap') ? 'active' : '' }}"
                    href="{{ route('absensi.rekap') }}">
                    <span class="nav-icon"><i class="fas fa-chart-line"></i></span>
                    Rekap Absensi
                </a>
                <a class="nav-item {{ request()->routeIs('prestasi-siswa') ? 'active' : '' }}"
                    href="{{ route('prestasi-siswa') }}">
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

        <!-- MAIN -->
        <main class="main">

          
           <!-- WELCOME -->
                <div class="welcome-card">
                    <div class="avatar-circle">
                    @if(Auth::user() && Auth::user()->foto_url)
                <img 
                    src="{{ Auth::user()->foto_url }}" 
                    alt="{{ Auth::user()->name }}"
                    class="profile-photo"
                    onclick="openImage(this.src)"
                    >
             @else
        <i class="fas fa-user"></i>
    @endif
</div>  
                <div>
                    <div class="welcome-top">
                        <h2>Halo {{ Auth::user()->name }}!</h2>
                        <span class="badge-murid">{{ ucfirst(Auth::user()->role) }}</span>
                    </div>
                    <div class="welcome-date">
                        <i class="far fa-clock" style="font-size:11px;"></i>
                        {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                    </div>
                    <div class="welcome-desc">Selamat datang di beranda untuk memantau aktivitas dan perkembangan
                        ekstrakurikuler secara real-time.</div>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats-row">

                <div class="stat-card red">
                    <div class="stat-icon-wrap">🏅</div>
                    <div class="stat-info">
                        <div class="stat-label">Eskul Diikuti</div>
                        <div class="stat-number">{{ $ekskulSiswa->count() }}</div>
                    </div>
                </div>

                <div class="stat-card yellow">
                    <div class="cal-box">
                        <div class="cal-header">{{ $namaBulanShort }}</div>
                        <div class="cal-num">{{ $tanggalHariIni }}</div>
                    </div>
                    <div class="stat-info">
                        <div class="stat-label">Kegiatan {{ \Carbon\Carbon::createFromFormat('Y-m', $selectedPeriod)->locale('id')->isoFormat('MMMM') }}</div>
                        <div class="stat-number">{{ $jumlahKegiatan }}</div>
                    </div>
                </div>

                <div class="stat-card green">
                    <div class="stat-icon-wrap">🏆</div>
                    <div class="stat-info">
                        <div class="stat-label">Prestasi</div>
                        <div class="stat-number">{{ $jumlahPrestasi }}</div>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-title"><span style="font-size:17px;">📋</span> Rekap Absensi {{ \Carbon\Carbon::createFromFormat('Y-m', $selectedPeriod)->locale('id')->isoFormat('MMMM YYYY') }}</div>
                <form method="GET" class="filter-row" action="{{ route('dashboard-siswa') }}">
                    <label for="dashboard-period">Pilih Bulan</label>
                    <select id="dashboard-period" name="period">
                        @foreach($monthOptions as $option)
                            <option value="{{ $option['value'] }}" {{ $selectedPeriod === $option['value'] ? 'selected' : '' }}>
                                {{ $option['label'] }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit">Ubah</button>
                </form>
                <div class="attendance-summary">
                    <div class="summary-item hadir">
                        <div class="summary-label">Hadir</div>
                        <div class="summary-number">{{ $absensiRekap['hadir'] }}</div>
                    </div>
                    <div class="summary-item izin">
                        <div class="summary-label">Izin</div>
                        <div class="summary-number">{{ $absensiRekap['izin'] }}</div>
                    </div>
                    <div class="summary-item sakit">
                        <div class="summary-label">Sakit</div>
                        <div class="summary-number">{{ $absensiRekap['sakit'] }}</div>
                    </div>
                    <div class="summary-item alpha">
                        <div class="summary-label">Alpha</div>
                        <div class="summary-number">{{ $absensiRekap['alpha'] }}</div>
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
                        @forelse($rekapAbsensiTerakhir as $absensi)
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

            <!-- Ekskul Saya -->
            <div class="card">
                <div class="card-title">Ekskul Saya</div>
                <table class="ekskul-table">
                    @forelse ($ekskulSiswa as $ekskul)
                        <tr>
                            <td>
                                <div class="row-inline">
                                    <strong>{{ $ekskul->nama }}</strong>
                                    <span class="dash">—</span>
                                    <span>{{ $ekskul->jadwal_lengkap ?: 'Jadwal belum tersedia' }}</span>
                                    <span class="dash">—</span>
                                    <span class="status">Aktif</span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                <div class="row-inline" style="color: #666;">
                                    Belum ada ekstrakurikuler yang sedang diikuti.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <!-- Status Pendaftaran -->
            @if($statusPendaftaran->count() > 0)
            <div class="card">
                <div class="card-title">Status Pendaftaran</div>
                <table class="pendaftaran-table">
                    @foreach($statusPendaftaran as $pendaftaran)
                        <tr>
                            <td>
                                <div class="row-inline" style="flex-wrap: wrap; gap: 8px;">
                                    <strong>{{ $pendaftaran->ekskul->nama ?? 'Ekskul tidak ditemukan' }}</strong>
                                    <span class="dash">—</span>
                                    @php
                                        $statusLabel = $pendaftaran->status;
                                    @endphp
                                    <span class="status-badge {{ $statusLabel === 'disetujui' ? 'badge-accepted' : ($statusLabel === 'ditolak' ? 'badge-rejected' : 'badge-pending') }}">
                                        {{ ucfirst($statusLabel) }}
                                    </span>
                                    @if($pendaftaran->status === 'ditolak' && $pendaftaran->catatan_admin)
                                        <span class="dash">—</span>
                                        <span style="color:#ef4444; font-size:13px;">
                                            {{ $pendaftaran->catatan_admin }}
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @endif

            <!-- Nilai Siswa -->
            @if(count($nilaiSiswa) > 0)
            <div class="card">
                <div class="card-title"><span style="font-size:17px;">⭐</span> Nilai Saya</div>
                <table class="nilai-table">
                    @foreach($nilaiSiswa as $nilai)
                        <tr>
                            <td>
                                <div class="row-inline">
                                    <strong>{{ $nilai->ekskul->nama ?? $nilai->ekskul_name ?? 'Ekskul' }}</strong>
                                    <span class="dash">—</span>
                                    <span class="grade-a">{{ $nilai->nilai }}{{ $nilai->keterangan ? ' (' . $nilai->keterangan . ')' : '' }}</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            @endif

            <!-- Jadwal + Pengumuman -->
            <div class="two-col">

                <div class="card">
                    <div class="card-title"><span style="font-size:17px;">📅</span> Jadwal Terdekat</div>
                    @forelse ($jadwalTerdekat as $j)
                        <div class="jadwal-item">
                            {{ $j->nama_ekskul }} - {{ ucfirst($j->hari) }}, {{ Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ $j->lokasi }}
                        </div>
                    @empty
                        <div class="jadwal-item" style="color: #777;">Tidak ada jadwal terdekat.</div>
                    @endforelse
                </div>

                <div class="card">
                    <div class="card-title"><span style="font-size:17px;">📢</span> Pengumuman</div>
                    @forelse ($pengumuman as $p)
                        <div class="pengumuman-item">
                            <span class="pengumuman-title">{{ $p->judul }}</span>
                            <span class="pengumuman-body">{{ $p->isi }}</span>
                        </div>
                    @empty
                        <div class="pengumuman-item" style="color: #777;">Tidak ada pengumuman terbaru.</div>
                    @endforelse
                </div>

            </div>


                </main>

    </div>

    <!-- IMAGE MODAL -->
    <div id="imageModal" class="image-modal" onclick="closeImage()">

        <span class="close-modal">&times;</span>

        <img id="modalImage" class="modal-image">

    </div>

    <!-- JAVASCRIPT -->
    <script>

    function openImage(src){
        document.getElementById('imageModal').style.display = 'flex';
        document.getElementById('modalImage').src = src;
    }

    function closeImage(){
        document.getElementById('imageModal').style.display = 'none';
    }

    </script>

</body>
</html>

</body>

</html>
