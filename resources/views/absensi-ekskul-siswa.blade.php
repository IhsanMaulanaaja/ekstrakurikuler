<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Absensi Ekskul</title>
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

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 24px 28px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            background: #dce3ea;
        }

        /* ===== CARD ===== */
        .form-card {
            background: #fff;
            border-radius: 14px;
            padding: 28px 32px;
            width: 100%;
            max-width: 920px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        .form-card h1 {
            font-size: 22px;
            font-weight: 900;
            color: #111;
            margin-bottom: 6px;
        }

        .divider-line {
            border: none;
            border-top: 1px solid #e2e8f0;
            margin-bottom: 24px;
        }

        /* ===== TWO COLUMN ===== */
        .two-col-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-bottom: 28px;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-size: 17px;
            font-weight: 800;
            color: #111;
            margin-bottom: 14px;
        }

        /* ===== INPUT FIELD ===== */
        .input-row {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            gap: 10px;
            margin-bottom: 12px;
        }

        .input-row:last-child {
            margin-bottom: 0;
        }

        .input-row .input-icon {
            font-size: 18px;
            color: #5b8deb;
            flex-shrink: 0;
        }

        .input-row input {
            border: none;
            background: transparent;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            color: #555;
            outline: none;
            width: 100%;
        }

        /* ===== ABSENSI KEHADIRAN (right column) ===== */
        .absensi-kehadiran-col .section-title {
            margin-bottom: 12px;
        }

        .status-dropdown {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            font-weight: 600;
            color: #555;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .radio-list {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 14px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px 0;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            border-bottom: 1px solid #e2e8f0;
        }

        .radio-item:last-child {
            border-bottom: none;
        }

        .radio-item input[type="radio"] {
            width: 18px;
            height: 18px;
            accent-color: #5b8deb;
            cursor: pointer;
        }

        /* ===== KETERANGAN TEXTAREA (right col) ===== */
        .keterangan-box {
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            overflow: hidden;
        }

        .keterangan-label {
            background: #e2e8f0;
            padding: 8px 12px;
            font-size: 13px;
            font-weight: 700;
            color: #555;
            border-bottom: 1px solid #cbd5e1;
        }

        .keterangan-textarea {
            width: 100%;
            border: none;
            padding: 10px 12px;
            font-family: 'Nunito', sans-serif;
            font-size: 13px;
            color: #555;
            min-height: 72px;
            outline: none;
            background: #f8fafc;
            resize: none;
        }

        /* ===== INFORMASI EKSKUL ===== */
        .ekskul-info-section {
            margin-bottom: 28px;
        }

        .ekskul-select-row {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 12px;
        }

        .ekskul-select-row .ekskul-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .ekskul-select-row select {
            border: none;
            background: transparent;
            font-family: 'Nunito', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: #333;
            outline: none;
            width: 100%;
            cursor: pointer;
        }

        .ekskul-select-row .chevron {
            font-size: 13px;
            color: #888;
            flex-shrink: 0;
        }

        .jadwal-rows {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .jadwal-select-row {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
        }

        .jadwal-select-row .jadwal-icon {
            font-size: 18px;
            color: #e63946;
            flex-shrink: 0;
        }

        .jadwal-select-row .jadwal-icon.clock {
            color: #5b8deb;
        }

        .jadwal-select-row select {
            border: none;
            background: transparent;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #333;
            outline: none;
            width: 100%;
            cursor: pointer;
        }

        .jadwal-select-row .chevron {
            font-size: 13px;
            color: #888;
            flex-shrink: 0;
        }

        /* ===== KEHADIRAN BUTTONS SECTION (bottom) ===== */
        .bottom-section .section-title {
            margin-bottom: 14px;
        }

        .btn-row {
            display: flex;
            gap: 12px;
            margin-bottom: 14px;
        }

        .btn-simpan {
            background: #5b8deb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }

        .btn-simpan:hover {
            background: #3a6fd8;
        }

        .btn-batal {
            background: #e2e8f0;
            color: #333;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 28px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
        }

        .btn-batal:hover {
            background: #cbd5e1;
        }

        /* ===== SUCCESS ALERT ===== */
        .alert-success {
            display: none;
            align-items: center;
            gap: 10px;
            background: #dcfce7;
            border: 1px solid #86efac;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 700;
            color: #166534;
        }

        .alert-success i {
            font-size: 18px;
            color: #22c55e;
            flex-shrink: 0;
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
            <div class="form-card">
                <h1>Absensi Ekskul</h1>
                <hr class="divider-line">

                @if (session('success'))
                    <div class="alert-success" style="display: flex; margin-bottom: 20px;">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert-error"
                        style="display: flex; align-items: center; gap: 10px; background: #fee2e2; border: 1px solid #fecaca; border-radius: 8px; padding: 12px 16px; font-size: 14px; font-weight: 700; color: #991b1b; margin-bottom: 20px;">
                        <i class="fas fa-exclamation-circle" style="color: #ef4444;"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('absensi-siswa.store') }}" method="POST">
                    @csrf
                    <!-- TOP TWO-COL: Informasi Siswa | Absensi Kehadiran -->
                <div class="two-col-layout">

                    <!-- Kiri: Informasi Siswa -->
                        <div>
                            <div class="section-title">Informasi Siswa</div>
                            <div class="input-row">
                                <span class="input-icon"><i class="fas fa-user-circle"></i></span>
                                <input type="text" placeholder="Masukan nama anda" value="{{ Auth::user()->name }}"
                                    readonly>
                            </div>
                            <div class="input-row">
                                <span class="input-icon" style="color:#f59e0b;"><i
                                        class="fas fa-chalkboard-teacher"></i></span>
                                <input type="text" placeholder="Masukan kelas anda"
                                    value="{{ Auth::user()->kelas ?? 'Kelas belum diatur' }}" readonly>
                            </div>
                        </div>

                    <!-- Kanan: Absensi Kehadiran -->
                    <div class="absensi-kehadiran-col">
                        <div class="section-title">Absensi Kehadiran</div>

                        <div class="status-dropdown">
                            <span>Pilih status kehadiran</span>
                            <i class="fas fa-chevron-down" style="font-size:12px; color:#888;"></i>
                        </div>

                        <div class="radio-list">
                            <div class="radio-item">
                                <span>Hadir</span>
                                <input type="radio" name="status" value="hadir" checked>
                            </div>
                            <div class="radio-item">
                                <span>Izin</span>
                                <input type="radio" name="status" value="izin">
                            </div>
                            <div class="radio-item">
                                <span>Sakit</span>
                                <input type="radio" name="status" value="sakit">
                            </div>
                            <div class="radio-item">
                                <span>Alfa</span>
                                <input type="radio" name="status" value="alfa">
                            </div>
                        </div>

                        <div class="keterangan-box">
                            <div class="keterangan-label">Keterangan (optional)</div>
                            <textarea name="keterangan" class="keterangan-textarea" placeholder="Tulis keterangan jika izin atau tidak hadir..."></textarea>
                        </div>
                    </div>

                </div>

                    <div class="ekskul-info-section">
                        <div class="section-title">Informasi Ekskul</div>
                        <div class="ekskul-select-row">
                            <span class="ekskul-icon">✨</span>
                            <select name="ekskul_id" required>
                                <option value="" disabled selected>Pilih Ekskul</option>
                                @foreach ($ekskulDikuti as $ekskul)
                                    <option value="{{ $ekskul->id }}">{{ $ekskul->nama }}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down chevron"></i>
                        </div>
                        @if ($ekskulDikuti->isEmpty())
                            <p style="color: #991b1b; font-size: 13px; font-weight: 700; margin-top: -8px;">Anda belum
                                terdaftar di ekskul mana pun.</p>
                        @endif
                    <div class="jadwal-rows">
                        <div class="jadwal-select-row">
                            <i class="fas fa-calendar-alt jadwal-icon"></i>
                            <select>
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option>Jumat</option>
                                <option>Sabtu</option>
                            </select>
                            <i class="fas fa-chevron-down chevron"></i>
                        </div>
                        <div class="jadwal-select-row">
                            <i class="fas fa-clock jadwal-icon clock"></i>
                            <select>
                                <option>15:00 - 17:00</option>
                                <option>16:00 - 18:00</option>
                                <option>07:00 - 09:00</option>
                            </select>
                            <i class="fas fa-chevron-down chevron"></i>
                        </div>
                    </div>
                </div>

                <!-- Absensi Kehadiran (bottom action buttons) -->
                    <div class="bottom-section">
                        <div class="section-title">Absensi Kehadiran</div>
                        <div class="btn-row">
                            <button type="submit" class="btn-simpan"
                                {{ $ekskulDikuti->isEmpty() ? 'disabled' : '' }}>Simpan</button>
                            <a href="{{ route('dashboard-siswa') }}" class="btn-batal"
                                style="text-decoration: none; display: inline-block;">Batal</a>
                        </div>
                    </div>
                </form>

            </div>
        </main>
    </div>

    <script>
        // Form submitted via POST
    </script>

</body>

</html>
