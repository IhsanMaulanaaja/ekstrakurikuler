<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Profile') - {{ config('app.name', 'SmartSchool Ekskul') }}</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

   <!-- Tailwind / Vite -->
@if (file_exists(public_path('build/manifest.json')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@else
    <script src="https://cdn.tailwindcss.com"></script>
@endif

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Instrument Sans',sans-serif;
        }

        body{
            background:#f1f5f9;
            color:#1e293b;
            min-height:100vh;
            overflow-x:hidden;
        }

        a{
            text-decoration:none;
        }

        /* ================= TOPBAR ================= */

        .topbar{
            position:sticky;
            top:0;
            z-index:1000;
            width:100%;
            height:72px;
            background:#ffffff;
            border-bottom:1px solid #e2e8f0;
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 30px;
        }

        .topbar-left{
            display:flex;
            align-items:center;
            gap:14px;
        }

        .logo{
            width:42px;
            height:42px;
            border-radius:12px;
            object-fit:cover;
        }

        .brand-name{
            font-size:22px;
            font-weight:800;
            color:#0f172a;
        }

        .topbar-right{
            display:flex;
            align-items:center;
            gap:18px;
        }

        .notif-btn{
            width:44px;
            height:44px;
            border-radius:14px;
            border:none;
            background:#f8fafc;
            color:#475569;
            font-size:18px;
            cursor:pointer;
            transition:0.3s;
        }

        .notif-btn:hover{
            background:#e2e8f0;
        }

        .profile-btn{
            display:flex;
            align-items:center;
            gap:10px;
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            padding:10px 18px;
            border-radius:14px;
            font-weight:700;
            transition:0.3s;
        }

        .profile-btn:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 20px rgba(37,99,235,0.25);
        }

        /* ================= LAYOUT ================= */

        .wrapper{
            display:grid;
            grid-template-columns:280px 1fr;
            gap:28px;
            padding:28px;
            max-width:1400px;
            margin:auto;
        }

        /* ================= SIDEBAR ================= */

        .sidebar{
            background:#ffffff;
            border-radius:28px;
            padding:26px;
            box-shadow:0 10px 30px rgba(15,23,42,0.06);

            height:calc(100vh - 128px);
            position:sticky;
            top:95px;

            display:flex;
            flex-direction:column;
        }

        .sidebar-header{
            text-align:center;
            margin-bottom:24px;
        }

       .sidebar-header img{
            width:90px;
            height:90px;
            border-radius:20px;
            object-fit:cover;

            display:block;
            margin:0 auto 14px auto;
        }

        .sidebar-header h2{
            font-size:20px;
            font-weight:800;
            color:#0f172a;
        }

        .sidebar-divider{
            width:100%;
            height:1px;
            background:#e2e8f0;
            margin:22px 0;
        }

        .menu{
            display:flex;
            flex-direction:column;
            gap:12px;
            flex:1;
        }

        .menu-item{
            display:flex;
            align-items:center;
            gap:14px;
            padding:14px 16px;
            border-radius:18px;
            color:#475569;
            font-weight:700;
            transition:0.3s;
        }

        .menu-item:hover{
            background:#eff6ff;
            color:#2563eb;
        }

        .menu-item.active{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            box-shadow:0 8px 20px rgba(37,99,235,0.25);
        }

        .menu-icon{
            width:40px;
            height:40px;
            border-radius:12px;
            display:flex;
            align-items:center;
            justify-content:center;
            background:rgba(255,255,255,0.2);
            font-size:16px;
        }

        .logout-box{
            margin-top:24px;
            padding-top:24px;
            border-top:1px solid #e2e8f0;
        }

        .logout-btn{
            width:100%;
            border:none;
            background:#fee2e2;
            color:#dc2626;
            padding:14px;
            border-radius:16px;
            font-weight:700;
            cursor:pointer;
            transition:0.3s;
        }

        .logout-btn:hover{
            background:#fecaca;
        }

        /* ================= MAIN CONTENT ================= */

        .main-content{
            width:100%;
        }

        .page-header{
            margin-bottom:24px;
        }

        .page-title{
            font-size:34px;
            font-weight:800;
            color:#0f172a;
            margin-bottom:6px;
        }

        .page-subtitle{
            font-size:15px;
            color:#64748b;
        }

        .content-card{
            background:#ffffff;
            border-radius:30px;
            padding:32px;
            box-shadow:0 10px 30px rgba(15,23,42,0.06);
        }

        /* ================= FORM ================= */

        .content-card label{
            display:block;
            margin-bottom:8px;
            font-size:14px;
            font-weight:700;
            color:#334155;
        }

        .content-card input,
        .content-card textarea,
        .content-card select{
            width:100%;
            padding:14px 16px;
            border:1px solid #dbe2ea;
            border-radius:14px;
            background:#f8fafc;
            font-size:14px;
            margin-bottom:18px;
            transition:0.3s;
        }

        .content-card input:focus,
        .content-card textarea:focus,
        .content-card select:focus{
            border-color:#3b82f6;
            outline:none;
            background:#ffffff;
            box-shadow:0 0 0 4px rgba(59,130,246,0.12);
        }

        .content-card button{
            border:none;
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            padding:14px 22px;
            border-radius:14px;
            font-weight:700;
            cursor:pointer;
            transition:0.3s;
        }

        .content-card button:hover{
            transform:translateY(-2px);
            box-shadow:0 12px 20px rgba(37,99,235,0.25);
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:1024px){

            .wrapper{
                grid-template-columns:1fr;
            }

            .sidebar{
                position:relative;
                top:0;
                height:auto;
            }
        }

        @media(max-width:768px){

            .topbar{
                padding:16px 18px;
                height:auto;
                flex-direction:column;
                gap:14px;
            }

            .wrapper{
                padding:18px;
            }

            .content-card{
                padding:22px;
            }

            .page-title{
                font-size:28px;
            }

            .brand-name{
                font-size:18px;
            }
        }

        /* ===== FIX WARNA TEXT ===== */

body {
    color: #111827;
}

h1, h2, h3, h4, h5, h6 {
    color: #111827 !important;
}

p {
    color: #4b5563 !important;
}

label {
    color: #111827 !important;
    font-weight: 700;
}

input,
textarea,
select {
    color: #111827 !important;
}

input::placeholder,
textarea::placeholder {
    color: #9ca3af !important;
}

/* Jetstream / Breeze Fix */
.text-gray-900 {
    color: #111827 !important;
}

.text-gray-600,
.text-gray-500,
.text-gray-400 {
    color: #4b5563 !important;
}

    </style>

    @yield('extra-styles')
</head>

<body>

    <!-- TOPBAR -->
    <nav class="topbar">

        <div class="topbar-left">
            <img src="{{ asset('assets/image9.png') }}" class="logo" alt="Logo">

            <div class="brand-name">
                SmartSchool Ekskul
            </div>
        </div>

        <div class="topbar-right">

            <button class="notif-btn">
                <i class="fas fa-bell"></i>
            </button>

            <a href="{{ route('profile.edit') }}" class="profile-btn">
                <i class="fas fa-user"></i>
                {{ Auth::user()->name ?? 'Profil' }}
            </a>

        </div>

    </nav>

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="sidebar-header">
                <img src="{{ asset('assets/image3.png') }}" alt="Logo">

                <h2>SmartSchool Ekskul</h2>
            </div>

            <div class="sidebar-divider"></div>

            <div class="menu">

                <a href="{{ route('dashboard') }}"
                   class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <div class="menu-icon">
                        <i class="fas fa-home"></i>
                    </div>

                    <span>Dashboard</span>
                </a>

                <a href="{{ route('profile.edit') }}"
                   class="menu-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">

                    <div class="menu-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <span>Profil Saya</span>
                </a>

            </div>

            <div class="logout-box">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>

            </div>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-content">

            @if (trim($__env->yieldContent('header')))
                <div class="page-header">
                    @yield('header')
                </div>
            @endif

            <div class="content-card">
                @yield('content')
            </div>

        </main>

    </div>

    @yield('scripts')

</body>
</html>