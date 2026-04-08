<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        html,body{
            height:100%;
            margin:0;
            font-family:Instrument Sans,system-ui, -apple-system,'Segoe UI',Roboto
        }
        body{
            display:flex;
            align-items:center;
            justify-content:center;
            background:linear-gradient(180deg,#2b1f6f 0%, #3b2fa6 60%);
            color:#fff
        }
        .container{
            max-width:980px;
            width:100%;
            padding:40px 20px;
            display:flex;
            flex-direction:column;
            align-items:center;
            gap:36px
        }
        .logo{
            width:130px;
        }
        .logo img{
            width:100%;
            filter:drop-shadow(0 8px 30px rgba(0,0,0,.4))
        }
        .cards{
            display:flex;
            gap:36px
        }
        .card{
            width:220px;
            height:220px;
            border-radius:16px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            text-decoration:none;
            color:#fff;
            box-shadow:0 12px 35px rgba(0,0,0,0.35);
            transition:.3s
        }
        .card:hover{
            transform:translateY(-6px)
        }
        .card.admin{
            background:linear-gradient(180deg,#3b2fa6 0%, #1f1b6e 100%)
        }
        .card.siswa{
            background:linear-gradient(180deg,#3b6fb0 0%, #17486e 100%)
        }
        .card img{
            width:90px;
            margin-bottom:18px
        }
        .label{
            font-weight:700;
            padding:8px 16px;
            border-radius:10px;
            background:rgba(255,255,255,0.12)
        }
        .btn-lanjut{
            display:inline-block;
            padding:12px 40px;
            border-radius:30px;
            background:#fff;
            color:#222;
            font-weight:700;
            text-decoration:none;
            box-shadow:0 8px 30px rgba(0,0,0,0.25)
        }
        @media (max-width:640px){
            .cards{flex-direction:column}
        }
    </style>
</head>

<body>
<div class="container">

    <!-- LOGO -->
    <div class="logo">
        <img src="{{ asset('assets/logo.png') }}" alt="SMK CIOMAS">
    </div>

    <!-- PILIH LOGIN -->
    <div class="cards">
        <a href="{{ route('login-admin') }}" class="card admin">
            <img src="{{ asset('assets/admin.png') }}" alt="Admin">
            <div class="label">Admin</div>
        </a>

        <a href="{{ route('login-siswa') }}" class="card siswa">
            <img src="{{ asset('assets/siswa.png') }}" alt="Siswa">
            <div class="label">Siswa</div>
        </a>
    </div>

    <a href="{{ route('login') }}" class="btn-lanjut">LANJUT</a>

</div>
</body>
</html>
