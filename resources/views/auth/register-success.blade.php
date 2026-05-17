<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Sukses - {{ config('app.name', 'SMK Ciomas') }}</title>

  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Instrument Sans', sans-serif;
    }

    body {
      min-height: 100vh;
      overflow-x: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      padding: 30px 20px;

      /* ANIMATED GRADIENT */
      background: linear-gradient(-45deg, #2b1f6f, #3b2fa6, #4f46e5, #2e3fa3, #1e3a8a);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    body::before,
    body::after,
    body .shape1,
    body .shape2 {
      content: "";
      position: fixed;
      border-radius: 50%;
      z-index: 0;
    }

    body::before {
      width: 600px;
      height: 600px;
      background: rgba(255,255,255,0.08);
      top: -200px;
      left: -200px;
      filter: blur(80px);
      animation: float 20s ease-in-out infinite;
    }

    body::after {
      width: 500px;
      height: 500px;
      background: rgba(79, 70, 229, 0.1);
      bottom: -150px;
      right: -150px;
      filter: blur(70px);
      animation: float 25s ease-in-out infinite reverse;
    }

    .shape1 {
      width: 300px;
      height: 300px;
      background: rgba(255,255,255,0.05);
      top: 20%;
      right: 10%;
      filter: blur(50px);
      animation: float 18s ease-in-out infinite;
    }

    .shape2 {
      width: 200px;
      height: 200px;
      background: rgba(255,255,255,0.03);
      bottom: 20%;
      left: 10%;
      filter: blur(40px);
      animation: float 22s ease-in-out infinite reverse;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      33% { transform: translateY(-20px) rotate(120deg); }
      66% { transform: translateY(10px) rotate(240deg); }
    }

    .bg-overlay {
      position: fixed;
      width: 700px;
      height: 700px;
      background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 70%);
      top: 15%;
      left: 50%;
      transform: translateX(-50%);
      filter: blur(100px);
      z-index: 0;
      animation: pulse 8s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 0.6; transform: translateX(-50%) scale(1); }
      50% { opacity: 1; transform: translateX(-50%) scale(1.05); }
    }

    .container {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 600px;
      animation: fadeInUp 1s ease-out;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .success-box {
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 25px;
      padding: 45px 35px;
      box-shadow: 0 25px 50px rgba(0,0,0,0.3);
      text-align: center;
    }

    .success-icon {
      width: 100px;
      height: 100px;
      background: rgba(34, 197, 94, 0.2);
      border: 2px solid rgba(34, 197, 94, 0.5);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 25px;
      animation: checkmark 0.6s ease-out;
    }

    .success-icon i {
      font-size: 50px;
      color: #86efac;
    }

    @keyframes checkmark {
      0% {
        transform: scale(0) rotate(45deg);
        opacity: 0;
      }
      50% {
        transform: scale(1.1);
      }
      100% {
        transform: scale(1) rotate(0);
        opacity: 1;
      }
    }

    h1 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 10px;
      background: linear-gradient(135deg, #86efac, #86efac);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .subtitle {
      font-size: 14px;
      opacity: 0.85;
      margin-bottom: 25px;
      color: #d6d6ff;
    }

    .message-box {
      background: rgba(34, 197, 94, 0.15);
      border-left: 3px solid rgba(34, 197, 94, 0.6);
      border-radius: 10px;
      padding: 15px 15px;
      margin-bottom: 25px;
      text-align: left;
      font-size: 13px;
      color: #d1fae5;
      line-height: 1.6;
    }

    .message-box strong {
      display: block;
      margin-bottom: 8px;
      color: #86efac;
    }

    .info-list {
      background: rgba(99, 102, 241, 0.1);
      border: 1px solid rgba(99, 102, 241, 0.2);
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 25px;
      text-align: left;
    }

    .info-item {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 10px;
      font-size: 12px;
      color: #e0d8ff;
    }

    .info-item:last-child {
      margin-bottom: 0;
    }

    .info-item i {
      color: #a4c7ff;
      margin-top: 2px;
      min-width: 16px;
    }

    .action-buttons {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 12px;
      margin-bottom: 15px;
    }

    .btn {
      padding: 12px 15px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 13px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-primary {
      background: linear-gradient(135deg, #6366f1 0%, #3b82f6 50%, #1d4ed8 100%);
      color: white;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
    }

    .btn-secondary {
      background: rgba(255,255,255,0.15);
      color: #a4c7ff;
      border: 1px solid rgba(255,255,255,0.2);
    }

    .btn-secondary:hover {
      background: rgba(255,255,255,0.2);
      color: #fff;
    }

    .back-home {
      text-align: center;
      margin-top: 20px;
    }

    .back-home a {
      color: #a4c7ff;
      text-decoration: none;
      font-size: 13px;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .back-home a:hover {
      color: #fff;
    }

    @media (max-width: 600px) {
      .success-box {
        padding: 35px 25px;
        border-radius: 20px;
      }
      h1 {
        font-size: 24px;
      }
      .action-buttons {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>
  <!-- SHAPES -->
  <div class="shape1"></div>
  <div class="shape2"></div>

  <!-- BACKGROUND LAYER -->
  <div class="bg-overlay"></div>

  <div class="container">
    <div class="success-box">
      <!-- SUCCESS ICON -->
      <div class="success-icon">
        <i class="fas fa-check"></i>
      </div>

      <h1>Pendaftaran Berhasil!</h1>
      <div class="subtitle">Akun Anda telah terdaftar dalam sistem</div>

      <div class="message-box">
        <strong><i class="fas fa-info-circle" style="margin-right: 8px;"></i>Menunggu Persetujuan Admin</strong>
        Akun Anda sudah berhasil dibuat dan sedang menunggu persetujuan dari administrator. Anda akan dapat login setelah admin menyetujui pendaftaran Anda. 
      </div>

      <div class="info-list">
        <div class="info-item">
          <i class="fas fa-envelope"></i>
          <span><strong>Email:</strong> Gunakan email Anda untuk login</span>
        </div>
        <div class="info-item">
          <i class="fas fa-clock"></i>
          <span><strong>Waktu Persetujuan:</strong> Biasanya dalam 1-2 hari kerja</span>
        </div>
        <div class="info-item">
          <i class="fas fa-bell"></i>
          <span><strong>Pemberitahuan:</strong> Anda akan menerima notifikasi saat akun disetujui</span>
        </div>
      </div>

      <div class="action-buttons">
        <a href="{{ route('login-siswa') }}" class="btn btn-primary">
          <i class="fas fa-sign-in-alt"></i> LOGIN
        </a>
        <a href="{{ route('landing') ?? '/' }}" class="btn btn-secondary">
          <i class="fas fa-home"></i> BERANDA
        </a>
      </div>

      <div class="back-home">
        <a href="{{ route('landing') ?? '/' }}">
          <i class="fas fa-arrow-left"></i> Kembali ke Home
        </a>
      </div>
    </div>
  </div>
</body>
</html>
