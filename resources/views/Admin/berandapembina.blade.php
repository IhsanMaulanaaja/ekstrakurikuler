<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SmartSchool Ekskul - Beranda Pembina</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

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

  .bell-icon { font-size: 22px; color: #222; cursor: pointer; }

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
  .app-body { display: flex; flex: 1; }

  /* ===== SIDEBAR ===== */
  .sidebar {
    width: 200px;
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
    background: rgba(0,0,0,0.13);
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
    padding: 10px 13px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 14.5px;
    font-weight: 600;
    color: #1a1a2e;
    text-decoration: none;
    transition: background 0.15s;
  }

  .nav-item:hover { background: rgba(255,255,255,0.35); }

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

  .logout-area { width: 100%; margin-top: 14px; }

  .logout-btn {
    width: 100%;
    background: #e63946;
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 11px 14px;
    font-size: 14px;
    font-weight: 800;
    font-family: 'Nunito', sans-serif;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background 0.15s;
  }

  .logout-btn:hover { background: #c1121f; }

  /* ===== MAIN ===== */
  .main {
    flex: 1;
    padding: 16px 20px 28px;
    display: flex;
    flex-direction: column;
    gap: 13px;
    background: #dce3ea;
    min-width: 0;
  }

  /* ===== WELCOME CARD ===== */
  .welcome-card {
    background: #fff;
    border-radius: 12px;
    padding: 14px 20px;
    display: flex;
    align-items: center;
    gap: 14px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
  }

  .avatar-circle {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #c8c8c8;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: #555;
    flex-shrink: 0;
    border: 2px solid #aaa;
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

  .badge-admin {
    background: #e8e8e8;
    color: #555;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 10px;
    border-radius: 20px;
    border: 1px solid #ddd;
  }

  .welcome-date {
    font-size: 11.5px;
    color: #888;
    display: flex;
    align-items: center;
    gap: 5px;
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
    <div class="bell-icon"><i class="fas fa-bell"></i></div>
    <button class="user-btn">
      {{ Auth::user()->name }}
</nav>

<div class="app-body">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <img src="{{ asset('assets/image3.png') }}" class="sidebar-logo" alt="Logo">
    <div class="sidebar-title">SmartSchool Ekskul</div>
    <div class="sidebar-divider"></div>

    <nav class="sidebar-nav">
      <a class="nav-item {{ request()->routeIs('dashboard-pembina') ? 'active' : '' }}" href="{{ route('dashboard-pembina') }}">
        <span class="nav-icon"><i class="fas fa-home"></i></span>
        Beranda
      </a>
      <a class="nav-item {{ request()->routeIs('pendaftaran-ekskul') ? 'active' : '' }}" href="{{ route('pendaftaran-ekskul') }}">
        <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
        Pendaftar
      </a>
      <a class="nav-item {{ request()->routeIs('absensi-ekskul') || request()->routeIs('absensi-admin') ? 'active' : '' }}" href="{{ route('absensi-admin') }}">
        <span class="nav-icon"><i class="fas fa-calendar-check"></i></span>
        Absensi
      </a>
      <a class="nav-item {{ request()->routeIs('prestasi-ekskul') || request()->routeIs('prestasi-admin') ? 'active' : '' }}" href="{{ route('prestasi-admin') }}">
        <span class="nav-icon"><i class="fas fa-trophy"></i></span>
        Kegiatan &amp; Prestasi
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

  <!-- MAIN CONTENT -->
  <main class="main">

    <!-- Welcome -->
    <div class="welcome-card">
      <div class="avatar-circle"><i class="fas fa-user"></i></div>
      <div>
        <div class="welcome-top">
          <h2>Halo {{ Auth::user()->name ?? 'Admin' }}!</h2>
          <span class="badge-admin">Admin</span>
        </div>
        <div class="welcome-date">
          <i class="far fa-clock" style="font-size:11px;"></i>
          {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
        </div>
        <div class="welcome-desc">Selamat datang di beranda pembina. Pantau absensi dan prestasi ekskul di sini.</div>
      </div>
    </div>

    <!-- Konten lain tetap sama, tinggal disesuaikan -->

  </main>
</div>

</body>
</html>
