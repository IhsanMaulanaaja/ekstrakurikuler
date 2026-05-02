<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool - Absensi Ekskul</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
    <style>
        /* ===== RESET & BODY ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        html {
            width: 100%;
            height: 100%;
        }

        body {
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #dce3ea;
            width: 100%;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        /* ===== TOP NAVBAR (SAMA PERSIS DENGAN ADMIN) ===== */
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

        .topnav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topnav-brand img {
            width: 38px;
            height: 38px;
            border-radius: 4px;
            object-fit: cover;
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
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
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
            line-height: 1.2;
            box-shadow: none; /* Menghapus shadow ungu/indigo bawaan */
        }

        .user-btn:hover {
            background: #4a7cdb;
        }

        /* ===== LAYOUT & SIDEBAR ===== */
        .app-body {
            display: flex;
            flex: 1;
            min-height: calc(100vh - 62px);
            width: 100%;
        }

        .sidebar {
            width: 195px;
            background: #a8c4d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 12px 20px;
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
            color: #1a1a2e;
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
            border-radius: 6px;
            padding: 10px 14px;
            font-size: 15px;
            font-weight: 800;
            font-family: 'Nunito', sans-serif;
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

        /* ===== MAIN CONTENT ===== */
        .main {
            flex: 1;
            padding: 40px 24px;
            display: flex;
            justify-content: center;
            background: #dce3ea;
            overflow-y: auto;
            overflow-x: hidden;
            min-width: 0;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            padding: 28px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            height: fit-content;
        }

        .card h1 {
            font-size: 22px;
            font-weight: 900;
            color: #111;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #333;
            margin-bottom: 6px;
        }

        select, textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        textarea {
            min-height: 80px;
            resize: none;
        }

        .radio-group {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 0;
            font-weight: 600;
            color: #333;
        }

        /* ===== GPS SECTION ===== */
        .gps-section {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 16px;
            margin: 16px 0;
        }

        .gps-status {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 12px;
            background: #fef3c7;
            border: 1px solid #fcd34d;
            color: #92400e;
        }

        .gps-status.ready {
            background: #dcfce7;
            border: 1px solid #86efac;
            color: #166534;
        }

        .gps-map {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            margin: 12px 0;
        }

        .gps-info {
            background: #fff;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 10px;
            font-size: 12px;
            margin-bottom: 12px;
            color: #444;
            font-weight: 600;
        }

        /* ===== BUTTONS ===== */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            font-family: inherit;
            text-decoration: none;
            transition: all 0.15s;
        }

        .btn-primary {
            background: #5b8deb;
            color: #fff;
        }

        .btn-primary:hover {
            background: #3a6fd8;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .btn-gps {
            background: #3b82f6;
            color: #fff;
            width: 100%;
        }

        .btn-gps:hover {
            background: #2563eb;
        }

        /* ===== ALERT ===== */
        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
            font-weight: 600;
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

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
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
            <button class="bell-icon" type="button">
                <i class="fas fa-bell"></i>
            </button>
            <button class="user-btn" type="button">
                {{ Auth::user()->name ?? 'Siswa' }}
                <i class="fas fa-chevron-down" style="font-size:13px;"></i>
            </button>
        </div>
    </nav>

    <div class="app-body">
        <aside class="sidebar">
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Logo" style="margin-bottom:8px; border-radius: 6px;" />
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
                <a class="nav-item {{ request()->routeIs('prestasi-siswa') ? 'active' : '' }}" href="{{ route('prestasi-siswa') }}">
                    <span class="nav-icon"><i class="fas fa-medal"></i></span>
                    Prestasi
                </a>
            </nav>

            <div class="logout-area">
                <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="main">
            <div class="card">
                <h1><i class="fas fa-clipboard-list"></i> Absensi Ekskul</h1>

                @if(session("success"))
                    <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session("success") }}</div>
                @endif

                @if(session("error"))
                    <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session("error") }}</div>
                @endif

                <form action="{{ route('absensi-siswa.store') }}" method="POST">
                    @csrf

                    <div class="gps-section">
                        <div style="font-weight: 700; margin-bottom: 10px;"><i class="fas fa-location-dot"></i> Lokasi Absensi (GPS)</div>
                        <div class="gps-status" id="gpsStatus">
                            <i class="fas fa-spinner"></i> Menunggu lokasi...
                        </div>
                        <div id="gpsMap" class="gps-map"></div>
                        <div class="gps-info">
                            <div><i class="fas fa-map-pin"></i> Latitude: <span id="gpsLat">-</span></div>
                            <div><i class="fas fa-map-pin"></i> Longitude: <span id="gpsLng">-</span></div>
                            <div><i class="fas fa-map-pin"></i> Akurasi: <span id="gpsAcc">-</span></div>
                        </div>
                        <button type="button" class="btn btn-gps" id="captureGpsBtn" onclick="captureGPS(event)">
                            <i class="fas fa-location-crosshairs"></i> Capture Lokasi
                        </button>
                    </div>

                    <input type="hidden" name="latitude" id="lat" value="">
                    <input type="hidden" name="longitude" id="lng" value="">
                    <input type="hidden" name="accuracy" id="acc" value="">

                    <div class="form-group">
                        <label class="form-label">Pilih Ekstrakurikuler</label>
                        <select name="ekskul_id" required>
                            <option value="">-- Pilih --</option>
                            @foreach($ekskulDikuti as $ekskul)
                                <option value="{{ $ekskul->id }}">{{ $ekskul->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status Kehadiran</label>
                        <div class="radio-group">
                            <div class="radio-item">
                                <input type="radio" name="status" value="hadir" checked> Hadir
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="status" value="izin"> Izin
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="status" value="sakit"> Sakit
                            </div>
                            <div class="radio-item">
                                <input type="radio" name="status" value="alfa"> Alfa
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Keterangan (Opsional)</label>
                        <textarea name="keterangan" placeholder="Tulis keterangan jika diperlukan..."></textarea>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-floppy-disk"></i> Simpan</button>
                        <a href="{{ route('dashboard-siswa') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script>
        let map = null;

        function updateGPSStatus(text, isReady = false) {
            const el = document.getElementById("gpsStatus");
            el.textContent = text;
            if (isReady) {
                el.className = "gps-status ready";
            }
        }

        function captureGPS(e) {
            e.preventDefault();
            updateGPSStatus("Mendapatkan lokasi...");

            if (!navigator.geolocation) {
                updateGPSStatus("Browser tidak support GPS");
                return;
            }

            navigator.geolocation.getCurrentPosition(
                function(pos) {
                    const lat = pos.coords.latitude;
                    const lng = pos.coords.longitude;
                    const acc = pos.coords.accuracy;

                    document.getElementById("lat").value = lat;
                    document.getElementById("lng").value = lng;
                    document.getElementById("acc").value = acc.toFixed(2);

                    document.getElementById("gpsLat").textContent = lat.toFixed(8);
                    document.getElementById("gpsLng").textContent = lng.toFixed(8);
                    document.getElementById("gpsAcc").textContent = acc.toFixed(2) + "m";

                    updateGPSStatus("Lokasi berhasil didapat", true);

                    if (map) map.remove();
                    map = L.map("gpsMap").setView([lat, lng], 17);
                    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(map);
                    L.circleMarker([lat, lng], {color: "#3b82f6", radius: 10, weight: 3, fillOpacity: 0.7}).addTo(map);
                },
                function(err) {
                    updateGPSStatus("Error: " + (err.message || "Gagal"));
                },
                {enableHighAccuracy: true, timeout: 10000, maximumAge: 0}
            );
        }

        window.addEventListener("load", function() {
            setTimeout(() => captureGPS({preventDefault: () => {}}), 500);
        });

        document.querySelector("form").addEventListener("submit", function(e) {
            if (!document.getElementById("lat").value || !document.getElementById("lng").value) {
                e.preventDefault();
                alert("Silakan capture lokasi GPS terlebih dahulu!");
            }
        });
    </script>
</body>
</html>