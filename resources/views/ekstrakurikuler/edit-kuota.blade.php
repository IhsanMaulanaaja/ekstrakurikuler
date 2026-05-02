<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Atur Kuota</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: #dce3ea;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* TOP NAVBAR */
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

        /* LAYOUT */
        .app-body {
            display: flex;
            flex: 1;
        }

        /* SIDEBAR */
        .sidebar {
            width: 195px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 22px 12px 20px;
            min-height: calc(100vh - 62px);
            flex-shrink: 0;
            position: sticky;
            top: 62px;
            height: calc(100vh - 62px);
            overflow-y: auto;
        }

        .sidebar-logo {
            width: 100px;
            height: 100px;
            margin-bottom: 8px;
            border-radius: 6px;
        }

        .sidebar-title {
            font-size: 13.5px;
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
            font-weight: 800;
        }

        .nav-icon {
            width: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 24px 32px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 28px 32px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            max-width: 600px;
            margin: auto;
            width: 100%;
        }

        .card h1 {
            font-size: 24px;
            font-weight: 900;
            color: #111;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 24px;
        }

        /* FORM GROUP */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            color: #333;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-hint {
            font-size: 12px;
            color: #999;
            margin-top: 6px;
        }

        /* INFO BOX */
        .info-box {
            background: #eff6ff;
            border-left: 4px solid #3b82f6;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 20px;
        }

        .info-box p {
            font-size: 13px;
            color: #1e40af;
            margin: 0;
        }

        .info-box strong {
            font-weight: 700;
        }

        /* STATS */
        .stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 900;
            color: #111;
        }

        /* BUTTONS */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: #3b82f6;
            color: #fff;
            flex: 1;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #333;
            flex: 1;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        /* ALERT */
        .alert {
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
    </style>
</head>

<body>

    <!-- TOP NAVBAR -->
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Logo" style="border-radius: 4px;">
            <div class="brand-text"><b>SmartSchool</b> Ekskul</div>
        </div>
        <div class="topnav-right">
            <button class="user-btn">{{ Auth::user()->name ?? 'Pembina' }} <i class="fas fa-chevron-down" style="font-size:13px;"></i></button>
        </div>
    </nav>

    <div class="app-body">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" class="sidebar-logo" alt="Logo">
            <div class="sidebar-title">SmartSchool Ekskul</div>
            <div class="sidebar-divider"></div>

            <nav class="sidebar-nav">
                <a class="nav-item" href="{{ route('dashboard-pembina') }}">
                    <span class="nav-icon"><i class="fas fa-home"></i></span>
                    Beranda
                </a>
                <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                    <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                    Pendaftar
                </a>
                <a class="nav-item" href="{{ route('anggota-admin') }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span>
                    Kelola Siswa
                </a>
                <a class="nav-item active" href="{{ route('ekstrakurikuler.editKuota', $ekskul->id) }}">
                    <span class="nav-icon"><i class="fas fa-chart-bar"></i></span>
                    Atur Kuota
                </a>
            </nav>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main">

            <div class="card">
                <h1>
                    <i class="fas fa-chart-bar" style="color: #3b82f6;"></i>
                    Atur Kuota Peserta
                </h1>
                <p>Atur jumlah maksimal peserta untuk ekstrakurikuler {{ $ekskul->nama }}</p>

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ session('error') }}
                    </div>
                @endif

                <!-- CURRENT STATS -->
                <div class="info-box">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        Ekstrakurikuler <strong>{{ $ekskul->nama }}</strong> saat ini memiliki
                        <strong id="currentMembers">{{ $ekskul->anggota()->where('status', 'aktif')->count() }}</strong> anggota aktif
                    </p>
                </div>

                <!-- FORM -->
                <form action="{{ route('ekstrakurikuler.updateKuota', $ekskul->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="stats">
                        <div class="stat">
                            <div class="stat-label">Anggota Aktif</div>
                            <div class="stat-value">{{ $ekskul->anggota()->where('status', 'aktif')->count() }}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">Kuota Saat Ini</div>
                            <div class="stat-value">{{ $ekskul->kuota > 0 ? $ekskul->kuota : '-' }}</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-users" style="color: #3b82f6; margin-right: 6px;"></i>
                            Jumlah Kuota Maksimal
                        </label>
                        <input 
                            type="number" 
                            name="kuota" 
                            class="form-input @error('kuota') border-red-500 @enderror" 
                            value="{{ old('kuota', $ekskul->kuota) }}" 
                            min="0" 
                            max="1000"
                            required
                            placeholder="Contoh: 30"
                        >
                        <p class="form-hint">
                            <i class="fas fa-lightbulb"></i>
                            Masukkan angka 0 untuk kuota tidak terbatas, atau masukkan angka maksimal peserta yang dapat diterima.
                        </p>
                        @error('kuota')
                            <p style="color: #dc2626; font-size: 12px; margin-top: 6px;">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Kuota
                        </button>
                        <a href="{{ route('dashboard-pembina') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>

        </main>

    </div>

</body>

</html>
