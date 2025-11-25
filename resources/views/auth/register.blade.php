<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi ePuskesmas</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #3b8ac4, #4fb6cb);
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
    }

    .register-card {
      background: #ffffff;
      border-radius: 25px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      padding: 45px 40px;
      width: 100%;
      max-width: 450px;
      text-align: center;
      animation: fadeInUp 0.8s ease;
    }

    .register-logo {
      width: 80px;
      height: 80px;
      margin-bottom: 15px;
    }

    h2 {
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 8px;
    }

    p {
      color: #7f8c8d;
      font-size: 14px;
      margin-bottom: 25px;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
      font-size: 14px;
    }

    .btn-register {
      background: linear-gradient(90deg, #3b8ac4, #4fb6cb);
      border: none;
      border-radius: 10px;
      color: white;
      font-weight: 600;
      width: 100%;
      padding: 12px;
      transition: all 0.3s ease;
    }

    .btn-register:hover {
      opacity: 0.95;
      transform: translateY(-2px);
    }

    .error-box {
      background: #ffe6e6;
      border-left: 5px solid #e74c3c;
      color: #c0392b;
      border-radius: 10px;
      padding: 10px 15px;
      text-align: left;
      margin-bottom: 20px;
    }

    footer {
      margin-top: 25px;
      color: #7f8c8d;
      font-size: 13px;
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
  </style>
</head>
<body>

  <div class="register-card">
    <img src="https://cdn-icons-png.flaticon.com/512/2966/2966485.png" alt="Logo ePuskesmas" class="register-logo">
    <h2>Registrasi ePuskesmas</h2>
    <p>Daftar untuk membuat akun layanan kesehatan digital</p>

    @if ($errors->any())
      <div class="error-box">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="mb-3 text-start">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
      </div>

      <div class="mb-3 text-start">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
      </div>

      <div class="mb-4 text-start">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn-register">Daftar</button>
    </form>

    <footer class="mt-3">
      Sudah punya akun? <a href="{{ route('login') }}" style="text-decoration:none; color:#3b8ac4;">Login di sini</a>
    </footer>
  </div>

</body>
</html>
