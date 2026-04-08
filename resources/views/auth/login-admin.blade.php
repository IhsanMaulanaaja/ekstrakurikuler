<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - {{ config('app.name', 'Eskul') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        html,body{
            height:100%;
            font-family:'Instrument Sans',system-ui,-apple-system,'Segoe UI',Roboto,'Helvetica Neue',Arial
        }
        body{
            display:flex;
            align-items:center;
            justify-content:center;
            background:linear-gradient(180deg,#2b1f6f 0%, #3b2fa6 60%);
            padding:24px
        }
        .container{
            width:100%;
            max-width:520px;
            text-align:center;
            color:#fff
        }
        .box{
            background:rgba(0,0,0,0.06);
            padding:40px;
            border-radius:18px
        }
        .logo{
            width:100px;
            height:100px;
            margin:0 auto 18px;
            display:flex;
            align-items:center;
            justify-content:center
        }
        .logo img{
            width:90px;
            height:auto
        }
        h1{
            font-size:22px;
            color:#ffeccf;
            margin-bottom:18px;
            font-weight:700;
            letter-spacing:1px
        }
        .form-group{
            text-align:left;
            margin-bottom:16px
        }
        label{
            display:block;
            color:#ffeccf;
            font-size:13px;
            margin-bottom:6px
        }
        input[type=email],
        input[type=password]{
            width:100%;
            padding:11px 12px;
            border-radius:6px;
            border:0;
            background:#fff;
            color:#222;
            font-size:14px
        }
        .options{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin:18px 0;
            color:#dcd2ff
        }
        .remember{
            display:flex;
            align-items:center;
            gap:8px
        }
        .remember input{
            width:16px;
            height:16px
        }
        .login-btn{
            display:inline-block;
            padding:12px 44px;
            border-radius:24px;
            background:#fff;
            color:#222;
            font-weight:700;
            box-shadow:0 12px 40px rgba(0,0,0,0.35);
            border:none;
            cursor:pointer
        }
        .login-btn:hover{
            transform:translateY(-2px)
        }
        .links{
            margin-top:14px;
            color:#d6d6ff
        }
        .links a,
        .options a{
            color:#a4c7ff;
            text-decoration:none
        }
        @media(max-width:480px){
            .box{padding:26px}
        }
    </style>
</head>

<body>
<div class="container">
    <div class="box">

        <!-- LOGO -->
        <div class="logo">
            <img src="{{ asset('assets/logo.png') }}" alt="SMK CIOMAS">
        </div>

        <h1>LOGIN UNTUK ADMIN</h1>

        @if ($errors->any())
            <div style="background:#fee;color:#c00;padding:10px;border-radius:8px;margin-bottom:12px;text-align:left">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login-admin') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required placeholder="Masukkan password">
            </div>

            <div class="options">
                <label class="remember">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>

            <button class="login-btn" type="submit">LOGIN</button>

            <div class="links">
                Don't Have Account? <a href="{{ route('register-admin') }}">Sign Up</a>
            </div>
        </form>

    </div>
</div>
</body>
</html>
