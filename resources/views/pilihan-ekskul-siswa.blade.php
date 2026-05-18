<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Pilihan Ekskul</title>
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
            color: #1a1a2e;
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
            padding: 18px 22px 28px;
            display: flex;
            flex-direction: column;
            background: #e2e8f0;
            min-width: 0;
            align-items: center;
        }

        /* ===== GALLERY CONTAINER ===== */
        .gallery-container {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            /* Match white background context */
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .ekskul-card {
            background: #e2e8f0;
            border-radius: 8px;
            padding: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            cursor: pointer;
        }

        .ekskul-card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .ekskul-image-wrapper {
            width: 100%;
            height: 140px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #cbd5e1;
            margin-bottom: 12px;
        }

        .ekskul-image-wrapper img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .ekskul-title {
            font-size: 17px;
            font-weight: 900;
            color: #111;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body>

    <!-- TOP NAVBAR -->
    <nav class="topnav">
        <div class="topnav-brand">
            <img src="{{ asset('assets/image9.png') }}" width="38" height="38" alt="Leaf logo"
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
            <img src="{{ asset('assets/image3.png') }}" width="100" height="100" alt="Leaf logo"
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
            <div class="gallery-container">
                <div class="cards-grid">
                    @forelse($ekskulList as $ekskul)
                        @php
                            $keyword = strtolower($ekskul->nama);
                            $imgUrl = "https://source.unsplash.com/300x200/?{$keyword}";
                            
                            $imgMap = [
                                'futsal' => 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?q=80&w=300&h=200&fit=crop',
                                'paskibra' => 'https://images.unsplash.com/photo-1533560904424-a0c61dc306fc?q=80&w=300&h=200&fit=crop',
                                'basket' => 'https://images.unsplash.com/photo-1519861531473-9200262188ff?q=80&w=300&h=200&fit=crop',
                                'pramuka' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=300&h=200&fit=crop',
                                'voli' => 'https://images.unsplash.com/photo-1592656094267-764a45160876?q=80&w=300&h=200&fit=crop',
                                'rohis' => 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=300&h=200&fit=crop',
                            ];
                            
                            // Prioritaskan foto dari database jika ada
                            if ($ekskul->foto) {
                                $finalImg = asset('assets/ekskul/' . $ekskul->foto);
                            } else {
                                $finalImg = $imgMap[$keyword] ?? $imgUrl;
                            }
                        @endphp
                        <a href="{{ route('pendaftaran-ekskul', ['ekskul_id' => $ekskul->id]) }}" class="ekskul-card" style="text-decoration:none; color:inherit;">
                            <div class="ekskul-image-wrapper">
                                <img src="{{ $finalImg }}" alt="{{ $ekskul->nama }}">
                            </div>
                            <div class="ekskul-title">{{ $ekskul->nama }}</div>
                        </a>
                    @empty
                        <div style="grid-column: 1 / -1; text-align: center; font-size: 16px; color: #555;">
                            Belum ada ekstrakurikuler yang tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </main>
    </div>

</body>

</html>
