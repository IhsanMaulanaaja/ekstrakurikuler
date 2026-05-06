<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Pendaftaran Ekskul</title>
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
            font-size: 13px;
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

        /* ===== MAIN ===== */
        .main {
            flex: 1;
            padding: 24px 28px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #dce3ea;
            min-width: 0;
        }

        /* ===== CARD ===== */
        .form-card {
            background: #fff;
            border-radius: 14px;
            padding: 28px 32px;
            width: 100%;
            max-width: 860px;
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
            margin-bottom: 22px;
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            font-size: 17px;
            font-weight: 800;
            color: #111;
            margin-bottom: 16px;
        }

        /* ===== INFORMASI SISWA GRID ===== */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px 20px;
            margin-bottom: 24px;
        }

        .input-row {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            gap: 10px;
        }

        .input-row .input-icon {
            font-size: 18px;
            color: #5b8deb;
            flex-shrink: 0;
        }

        .input-row input,
        .input-row select {
            border: none;
            background: transparent;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            color: #555;
            outline: none;
            width: 100%;
        }

        .input-row select {
            cursor: pointer;
        }



        /* ===== TWO COL section ===== */
        .two-col-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 22px;
        }

        .ekskul-info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 16px;
            font-weight: 600;
            color: #222;
        }

        .ekskul-info-item .info-icon {
            font-size: 26px;
        }

        .jadwal-info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .jadwal-info-item .info-icon {
            font-size: 20px;
            color: #e63946;
        }

        .jadwal-info-item .info-text {
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        /* ===== ALASAN ===== */
        .alasan-section {
            margin-bottom: 20px;
        }

        .alasan-section label {
            font-size: 17px;
            font-weight: 800;
            color: #111;
            display: block;
            margin-bottom: 10px;
        }

        .alasan-textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 14px 16px;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            color: #555;
            resize: vertical;
            min-height: 100px;
            outline: none;
            background: #f8fafc;
        }

        .alasan-textarea:focus {
            border-color: #5b8deb;
            background: #fff;
        }

        /* ===== CHECKBOX ===== */
        .checkbox-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
            color: #333;
        }

        .checkbox-row input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #5b8deb;
            cursor: pointer;
            flex-shrink: 0;
        }

        /* ===== BUTTONS ===== */
        .btn-row {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
        }

        .btn-daftar {
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

        .btn-daftar:hover {
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
            transition: background 0.15s;
        }

        .btn-batal:hover {
            background: #cbd5e1;
        }

        /* ===== SUCCESS ALERT ===== */
        .alert-success {
            display: flex;
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

        /* Hidden by default */
        #successAlert {
            display: none;
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
            <form action="{{ route('pendaftaran.store') }}" method="POST" class="form-card" id="formDaftar">
                @csrf
                <h1>Pendaftaran Ekskul</h1>
                <hr class="divider-line">

                <!-- INFORMASI SISWA -->
                <div class="section-title">Informasi Siswa</div>
                <div class="info-grid">

                    <div class="input-row">
                        <span class="input-icon"><i class="fas fa-user-circle"></i></span>
                        <input type="text" placeholder="Masukan nama anda" value="{{ Auth::user()->name }}" readonly>
                    </div>

                    <div class="input-row">
                        <span class="input-icon" style="color:#22c55e;"><i class="fas fa-phone-alt"></i></span>
                        <input type="text" placeholder="Masukan no.telp anda" value="{{ Auth::user()->nomor_telepon }}" readonly>
                    </div>

                    <div class="input-row">
                        <span class="input-icon" style="color:#f59e0b;"><i class="fas fa-chalkboard-teacher"></i></span>
                        <input type="text" placeholder="Masukan kelas anda" value="{{ Auth::user()->kelas ?? '-' }}" readonly>
                    </div>

                    <div class="input-row">
                        <span class="input-icon" style="color:#3b82f6;"><i class="fas fa-map-marker-alt"></i></span>
                        <input type="text" placeholder="Masukan alamat anda" value="{{ Auth::user()->alamat }}" readonly>
                    </div>

                </div>

                <!-- PILIHAN EKSKUL & JADWAL -->
                <div class="two-col-section">
                    <div>
                        <div class="section-title">Pilihan Ekskul</div>
                        <div class="ekskul-info-item" style="border: 1px solid #cbd5e1; padding: 10px; border-radius: 8px;">
                            <span class="info-icon">🎯</span>
                            <select name="ekskul_id" style="border: none; outline: none; background: transparent; width: 100%; font-size: 16px; font-weight: 600; color: #333;" required {{ $ekskulSelected ? 'disabled' : '' }}>
                                @if(!$ekskulSelected)
                                    <option value="" disabled selected>Pilih Ekstrakurikuler</option>
                                @endif
                                @foreach($ekskulList as $ekskul)
                                    <option value="{{ $ekskul->id }}" {{ request('ekskul_id') == $ekskul->id ? 'selected' : '' }}>{{ $ekskul->nama }}</option>
                                @endforeach
                            </select>
                            @if($ekskulSelected)
                                <input type="hidden" name="ekskul_id" value="{{ $ekskulSelected->id }}">
                            @endif
                        </div>
                    </div>
                    <div>
                        <!-- Optional Schedule Notice here if dynamic schedules exist -->
                    </div>
                </div>

                <!-- ALASAN -->
                <div class="alasan-section">
                    <label>Alasan Mengikuti Ekskul</label>
                    <textarea name="alasan" class="alasan-textarea" placeholder="Tuliskan alasan dan motivasi mengikuti ekskul ini..." required></textarea>
                </div>

                <!-- CHECKBOX -->
                <div class="checkbox-row">
                    <input type="checkbox" name="setuju" id="setuju" checked required>
                    <label for="setuju">Saya bersedia mengikuti kegiatan ekskul sesuai aturan sekolah</label>
                </div>

                <!-- BUTTONS -->
                <div class="btn-row">
                    <button type="submit" class="btn-daftar">Daftar</button>
                    <a href="{{ route('dashboard-siswa') }}" class="btn-batal" style="text-decoration:none; display:inline-flex; align-items:center;">Batal</a>
                </div>

                <!-- ALERT MESSAGES -->
                @if (session('success'))
                    <div class="alert-success" style="display:flex;">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error') || $errors->any())
                    <div class="alert-success" style="background: #fee2e2; border-color: #fca5a5; color: #991b1b; display:flex;">
                        <i class="fas fa-exclamation-circle" style="color: #ef4444;"></i>
                        {{ session('error') ?? 'Gagal memproses pendaftaran. Silakan lengkapi semua yang diminta.' }}
                    </div>
                @endif

            </form>
        </main>
    </div>

    <script>
        // Form now uses standard HTTP POST back to server
    </script>

</body>

</html>
