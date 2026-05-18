<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartSchool Ekskul - Kelola Anggota</title>
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
            background: #e2e8f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== TOP NAVBAR ===== */
        .topnav {
            background: #f8fafc;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            height: 62px;
            position: sticky;
            top: 0;
            z-index: 200;
            border-bottom: 1px solid #e2e8f0;
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
            padding: 18px 22px 28px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            min-width: 0;
        }

        /* Header Section */
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .header-actions h1 {
            font-size: 22px;
            font-weight: 800;
            color: #111;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            background: #272c72;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 14px;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        .btn-action i {
            color: #8bb4e9;
        }

        /* ===== TABLE CARD ===== */
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
        }

        th {
            padding: 14px;
            text-align: left;
            font-size: 14px;
            font-weight: 800;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            color: #333;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .student-name {
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 2px;
        }

        .student-card {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            background: #f8fafc;
            display: grid;
            place-items: center;
        }

        .student-avatar button {
            border: none;
            background: transparent;
            padding: 0;
            cursor: pointer;
            display: block;
            width: 100%;
            height: 100%;
        }

        .student-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.2s ease;
            display: block;
        }

        .student-avatar button:hover img {
            transform: scale(1.05);
        }

        .student-meta {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 0;
        }

        .image-preview-modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.75);
            z-index: 1100;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .image-preview-modal.active {
            display: flex;
        }

        .image-preview-card {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            border-radius: 18px;
            overflow: hidden;
            background: #111;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .image-preview-card img {
            width: 100%;
            height: auto;
            display: block;
            max-height: 80vh;
            object-fit: contain;
            background: #111;
        }

        .image-preview-close {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: #fff;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 18px;
            cursor: pointer;
            display: grid;
            place-items: center;
            transition: background 0.15s ease;
        }

        .image-preview-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .image-preview-caption {
            position: absolute;
            left: 16px;
            bottom: 16px;
            color: #f8fafc;
            font-size: 14px;
            background: rgba(0, 0, 0, 0.45);
            padding: 8px 12px;
            border-radius: 12px;
            max-width: calc(100% - 64px);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .student-nisn {
            font-size: 12px;
            color: #64748b;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 220px;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            text-align: center;
        }

        .status-aktif {
            background: #dcfce7;
            color: #166534;
        }

        .status-tidak-aktif {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
        }

        .btn-tiny {
            border: none;
            border-radius: 6px;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.15s;
        }

        .btn-edit {
            background: #bbf7d0;
            color: #166534;
        }

        .btn-edit:hover {
            background: #86efac;
        }

        .btn-hapus {
            background: #fecaca;
            color: #991b1b;
        }

        .btn-hapus:hover {
            background: #fca5a5;
        }

        /* ===== MODAL & FORM ===== */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: #fff;
            border-radius: 12px;
            width: 100%;
            max-width: 480px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            font-size: 18px;
            font-weight: 800;
            color: #111;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 20px;
            color: #888;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #444;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            outline: none;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }

        .btn-save {
            background: #5b8deb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-cancel {
            background: #e2e8f0;
            color: #333;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-delete-confirm {
            background: #ef4444;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #888;
        }

        .empty-state i {
            font-size: 48px;
            color: #cbd5e1;
            margin-bottom: 14px;
            display: block;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 14px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        /* ===== PAGINATION ===== */
        .pagination-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .pagination-info {
            font-size: 14px;
            color: #666;
            font-weight: 600;
        }

        .pagination-links {
            display: flex;
            gap: 6px;
        }

        .pagination-links a,
        .pagination-links span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
            color: #333;
            text-decoration: none;
            background: #fff;
            transition: all 0.15s;
        }

        .pagination-links a:hover {
            background: #5b8deb;
            color: #fff;
            border-color: #5b8deb;
            cursor: pointer;
        }

        .pagination-links span.active {
            background: #5b8deb;
            color: #fff;
            border-color: #5b8deb;
        }

        .pagination-links span.disabled {
            background: #f8fafc;
            color: #cbd5e1;
            border-color: #e2e8f0;
            cursor: not-allowed;
        }
    </style>
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
                @if($user?->role === 'pembina')
                    <!-- PEMBINA SIDEBAR -->
                    <a class="nav-item" href="{{ route('dashboard-pembina') }}">
                        <span class="nav-icon"><i class="fas fa-home"></i></span>
                        Beranda
                    </a>
                    <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                        <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                        Pendaftar
                    </a>
                    <a class="nav-item active" href="{{ route('anggota-admin') }}">
                        <span class="nav-icon"><i class="fas fa-users"></i></span>
                        Kelola Siswa
                    </a>
                    <a class="nav-item" href="{{ route('jadwal-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                        Jadwal Latihan
                    </a>
                    <a class="nav-item" href="{{ route('absensi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                        Absensi
                    </a>
                    <a class="nav-item" href="{{ route('prestasi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-medal"></i></span>
                        Kegiatan &amp; Prestasi
                    </a>
                    <a class="nav-item" href="{{ route('pengumuman.index') }}">
                        <span class="nav-icon"><i class="fas fa-bullhorn"></i></span>
                        Pengumuman
                    </a>
                    <a class="nav-item" href="{{ route('nilai.index') }}">
                        <span class="nav-icon"><i class="fas fa-star"></i></span>
                        Nilai Siswa
                    </a>
                @else
                    <!-- ADMIN SIDEBAR -->
                    <a class="nav-item" href="{{ route('dashboard-admin') }}">
                        <span class="nav-icon"><i class="fas fa-home"></i></span>
                        Beranda
                    </a>
                    <a class="nav-item" href="{{ route('user-approval.index') }}">
                        <span class="nav-icon"><i class="fas fa-check-circle"></i></span>
                        Persetujuan Akun
                    </a>
                    <a class="nav-item" href="{{ route('users.index') }}">
                        <span class="nav-icon"><i class="fas fa-users"></i></span>
                        Kelola Pengguna
                    </a>
                    <a class="nav-item active" href="{{ route('anggota-admin') }}">
                        <span class="nav-icon"><i class="fas fa-users"></i></span>
                        Kelola Siswa
                    </a>
                    <a class="nav-item" href="{{ route('ekstrakurikuler.index') }}">
                        <span class="nav-icon"><i class="fas fa-book"></i></span>
                        Daftar Ekskul
                    </a>
                    <a class="nav-item" href="{{ route('pendaftaran-ekskul') }}">
                        <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                        Pendaftar
                    </a>
                    <a class="nav-item" href="{{ route('jadwal-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar"></i></span>
                        Jadwal Latihan
                    </a>
                    <a class="nav-item" href="{{ route('absensi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
                        Absensi
                    </a>
                    <a class="nav-item" href="{{ route('prestasi-admin') }}">
                        <span class="nav-icon"><i class="fas fa-medal"></i></span>
                        Kegiatan &amp; Prestasi
                    </a>
                @endif
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

            <div class="header-actions">
                <h1>
                    @if($isAdmin)
                        Daftar Siswa
                    @else
                        {{ $ekskulName ? "Anggota $ekskulName" : 'Kelola Siswa' }}
                    @endif
                </h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <div class="card-container">
                <h2>Daftar Siswa</h2>

                @if($anggota->count() > 0)
                    <table style="margin-bottom: 20px;">
                        <thead>
                            <tr>
                                <th style="width: 8%;">No</th>
                                <th style="width: 25%;">Nama Siswa</th>
                                <th style="width: 15%;">Kelas</th>
                                <th style="width: 25%;">Email</th>
                                @if(!$isAdmin && $ekskuls->count() > 1)
                                    <th style="width: 18%;">Ekskul</th>
                                @endif
                                @if(!$isAdmin)
                                    <th style="width: 12%;">Status</th>
                                @endif
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($anggota as $member)
                                <tr>
                                    <td>{{ ($anggota->currentPage() - 1) * $anggota->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <div class="student-card">
                                            <div class="student-avatar">
                                                <button type="button" onclick="openImageModal({{ json_encode($isAdmin ? ($member->foto_url ?? asset('assets/siswa.png')) : ($member->user->foto_url ?? asset('assets/siswa.png'))) }}, {{ json_encode($isAdmin ? $member->name : $member->user->name) }})">
                                                    <img src="{{ $isAdmin ? ($member->foto_url ?? asset('assets/siswa.png')) : ($member->user->foto_url ?? asset('assets/siswa.png')) }}"
                                                        alt="Foto Profil {{ $isAdmin ? $member->name : $member->user->name }}">
                                                </button>
                                            </div>
                                            <div class="student-meta">
                                                <div class="student-name">
                                                    @if($isAdmin)
                                                        {{ $member->name }}
                                                    @else
                                                        {{ $member->user->name }}
                                                    @endif
                                                </div>
                                                <div class="student-nisn">
                                                    NISN: {{ $isAdmin ? ($member->nisn ?? '-') : ($member->user->nisn ?? '-') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($isAdmin)
                                            {{ $member->kelas ?? '-' }}
                                        @else
                                            {{ $member->user->kelas ?? '-' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($isAdmin)
                                            {{ $member->email }}
                                        @else
                                            {{ $member->user->email }}
                                        @endif
                                    </td>
                                    @if(!$isAdmin && $ekskuls->count() > 1)
                                        <td>{{ $member->ekskul->nama ?? '-' }}</td>
                                    @endif
                                    @if(!$isAdmin)
                                        <td>
                                            <span class="status-badge status-{{ str_replace(' ', '-', strtolower($member->status)) }}">
                                                {{ ucfirst($member->status) }}
                                            </span>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-tiny btn-edit"
                                                onclick="openEditModal({{ $isAdmin ? $member->id : $member->id }}, '{{ $isAdmin ? 'aktif' : $member->status }}')">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn-tiny btn-hapus"
                                                onclick="openDeleteModal({{ $isAdmin ? $member->id : $member->id }})">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- PAGINATION -->
                    <div class="pagination-wrapper">
                        <div class="pagination-info">
                            Showing {{ $anggota->firstItem() ?? 0 }} to {{ $anggota->lastItem() ?? 0 }} of {{ $anggota->total() }} results
                        </div>
                        <div class="pagination-links">
                            {{-- Previous Page Link --}}
                            @if ($anggota->onFirstPage())
                                <span class="disabled">‹</span>
                            @else
                                <a href="{{ $anggota->previousPageUrl() }}">‹</a>
                            @endif
                            {{-- Pagination Elements --}}
                            @foreach ($anggota->getUrlRange(1, $anggota->lastPage()) as $page => $url)
                                @if ($page == $anggota->currentPage())
                                    <span class="active">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @endforeach
                            {{-- Next Page Link --}}
                            @if ($anggota->hasMorePages())
                                <a href="{{ $anggota->nextPageUrl() }}">›</a>
                            @else
                                <span class="disabled">›</span>
                            @endif
                        </div>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>Belum ada siswa yang terdaftar di ekstrakurikuler ini.</p>
                    </div>
                @endif

            </div>

        </main>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal-overlay" id="editModal">
        <form class="modal-content" id="formEditModal" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h3>Ubah Status Siswa</h3>
                <button type="button" class="close-btn" onclick="closeModal('editModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" id="edit_status" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('editModal')">Batal</button>
                <button type="submit" class="btn-save">Simpan</button>
            </div>
        </form>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal-overlay" id="deleteModal">
        <form class="modal-content" id="formDeleteModal" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h3>Hapus Siswa</h3>
                <button type="button" class="close-btn" onclick="closeModal('deleteModal')"><i
                        class="fas fa-times"></i></button>
            </div>
            <p style="font-size:15px; color:#444; margin-bottom: 20px;">
                Apakah Anda yakin ingin menghapus siswa ini dari ekstrakurikuler? Data yang dihapus tidak dapat dikembalikan.
            </p>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('deleteModal')">Batal</button>
                <button type="submit" class="btn-delete-confirm">Ya, Hapus</button>
            </div>
        </form>
    </div>

    <!-- IMAGE PREVIEW MODAL -->
    <div class="image-preview-modal" id="imagePreviewModal" onclick="closeImageModal(event)">
        <div class="image-preview-card">
            <button type="button" class="image-preview-close" onclick="closeImageModal(event)">×</button>
            <img src="" alt="Preview Foto" id="previewImage">
            <div class="image-preview-caption" id="previewCaption"></div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = 'flex';
        }

        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }

        function openImageModal(src, caption) {
            const modal = document.getElementById('imagePreviewModal');
            const image = document.getElementById('previewImage');
            const captionEl = document.getElementById('previewCaption');

            image.src = src;
            image.alt = `Preview foto ${caption}`;
            captionEl.textContent = caption;
            modal.classList.add('active');
        }

        function closeImageModal(event) {
            if (event.target.id === 'imagePreviewModal' || event.target.classList.contains('image-preview-close')) {
                const modal = document.getElementById('imagePreviewModal');
                modal.classList.remove('active');
            }
        }

        function openEditModal(id, status) {
            const form = document.getElementById('formEditModal');
            form.action = `/anggota-ekskul/${id}/status`;
            document.getElementById('edit_status').value = status;
            openModal('editModal');
        }

        function openDeleteModal(id) {
            const form = document.getElementById('formDeleteModal');
            form.action = `/anggota-ekskul/${id}`;
            openModal('deleteModal');
        }
    </script>
</body>

</html>
