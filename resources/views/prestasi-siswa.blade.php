<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Kegiatan & Prestasi</title>
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
            padding: 24px 14px 20px;
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
            margin-bottom: 16px;
            line-height: 1.35;
            white-space: nowrap;
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
            gap: 4px;
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

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 18px 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            min-width: 0;
            background: #dce3ea;
        }

        /* ===== GALLERY CARD ===== */
        .card-container {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .card-container h2 {
            font-size: 20px;
            font-weight: 800;
            color: #111;
            margin-bottom: 20px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .photo-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            border: 1px solid #e2e8f0;
        }

        .photo-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
            background: #eee;
        }

        .photo-info {
            padding: 12px 14px;
            background: #f8fafc;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .filename {
            font-size: 16px;
            font-weight: 800;
            color: #111;
        }

        .date {
            font-size: 12px;
            font-weight: 600;
            color: #475569;
        }

        .btn-tiny {
            border: none;
            border-radius: 12px;
            padding: 2px 10px;
            font-size: 10px;
            font-weight: 800;
            font-family: inherit;
            cursor: pointer;
        }

        .btn-lihat {
            background: #e2e8f0;
            color: #475569;
        }

        .lihat-semua-container {
            display: flex;
            justify-content: center;
            margin-top: 24px;
        }

        .btn-lihat-semua {
            background: #eef2ff;
            color: #111;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-lihat-semua i {
            color: #3b82f6;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 9999;
        }

        .modal-content {
            background: #fff;
            border-radius: 10px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.25);
            padding: 18px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .modal-header h3 {
            margin: 0;
            font-size: 18px;
            color: #0f172a;
        }

        .close-btn {
            background: transparent;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #334155;
        }

        .form-group label {
            font-weight: 700;
            color: #334155;
            display: block;
            margin-bottom: 4px;
        }

        .form-group p {
            margin: 0;
            padding: 7px 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background:#f8fafc;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 12px;
        }

        .btn-cancel {
            background-color: #e2e8f0;
            color: #1e293b;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
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

            <div class="card-container">
                <h2>Prestasi & Dokumentasi Ekskul</h2>

                <div class="gallery-grid">
                    @forelse($dokumentasis as $doc)
                        <div class="photo-card">
                            <img src="{{ $doc->foto ? $doc->fotoUrl : asset('assets/siswa.png') }}" alt="Foto" onerror="this.onerror=null;this.src='{{ asset('assets/siswa.png') }}'">
                            <div class="photo-info">
                                <div class="info-row">
                                    <span class="filename">{{ Str::limit($doc->nama_lomba ?? $doc->keterangan, 20) ?? 'Foto ' . $doc->id }}</span>
                                    <a href="javascript:void(0)" class="btn-tiny btn-lihat"
                                        style="text-decoration:none; display:inline-block; text-align:center;"
                                        onclick="openDetailModal(this)"
                                        data-nama="{{ e($doc->nama_lomba) }}"
                                        data-tanggal="{{ $doc->tanggal }}"
                                        data-juara="{{ e($doc->keterangan ?? ($doc->lomba->juara ?? '-')) }}">Lihat</a>
                                </div>
                                <div class="info-row">
                                    <span class="date">{{ \Carbon\Carbon::parse($doc->created_at)->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="grid-column: 1 / -1; text-align: center; color: #888; margin-top: 20px;">Belum ada foto dokumentasi.</p>
                    @endforelse
                </div>

            </div>

        </main>
    </div>

    <!-- DETAIL MODAL -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal-content" style="max-width: 420px;">
            <div class="modal-header">
                <h3>Detail Foto Dokumentasi</h3>
                <button type="button" class="close-btn" onclick="closeModal('detailModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="form-group">
                <label>Nama Lomba</label>
                <p id="detail_nama" style="margin: 6px 0 12px; color:#333; font-weight:700;"></p>
            </div>
            <div class="form-group">
                <label>Tanggal Juara</label>
                <p id="detail_tanggal" style="margin: 6px 0 12px; color:#333;"></p>
            </div>
            <div class="form-group">
                <label>Juara</label>
                <p id="detail_juara" style="margin: 6px 0 12px; color:#333;"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('detailModal')">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        function openDetailModal(el) {
            const nama = el.getAttribute('data-nama') || '-';
            const tanggal = el.getAttribute('data-tanggal') || '-';
            const juara = el.getAttribute('data-juara') || '-';

            document.getElementById('detail_nama').textContent = nama;
            document.getElementById('detail_tanggal').textContent = tanggal;
            document.getElementById('detail_juara').textContent = juara;

            openModal('detailModal');
        }
    </script>
</body>

</html>
