<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login ePuskesmas</title>

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

    .login-card {
      background: #ffffff;
      border-radius: 25px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      padding: 45px 40px;
      width: 100%;
      max-width: 420px;
      text-align: center;
      animation: fadeInUp 0.8s ease;
    }

    .login-logo {
      width: 80px;
      height: 80px;
      margin-bottom: 15px;
    }

    .login-card h2 {
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 8px;
    }

    .login-card p {
      color: #7f8c8d;
      font-size: 14px;
      margin-bottom: 28px;
    }

    .form-control {
      border-radius: 10px;
      padding: 12px;
      font-size: 14px;
    }

    .form-label {
      font-weight: 500;
      color: #34495e;
    }

    .btn-login, .btn-register {
      background: linear-gradient(90deg, #3b8ac4, #4fb6cb);
      border: none;
      border-radius: 10px;
      color: white;
      font-weight: 600;
      width: 100%;
      padding: 12px;
      transition: all 0.3s ease;
    }

    .btn-login:hover, .btn-register:hover {
      opacity: 0.95;
      transform: translateY(-2px);
    }

    .toggle-link {
      display: block;
      margin-top: 15px;
      color: #3b8ac4;
      font-weight: 500;
      text-decoration: none;
    }

    .toggle-link:hover {
      text-decoration: underline;
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

  <div class="login-card">
    <img src="https://cdn-icons-png.flaticon.com/512/2966/2966485.png" alt="Logo ePuskesmas" class="login-logo">

    <!-- FORM LOGIN -->
    <div id="loginForm">
      <h2>Login ePuskesmas</h2>
      <p>Masuk untuk mengakses sistem layanan kesehatan digital</p>

      @if ($errors->any())
        <div class="error-box">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-4 text-start">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn-login">Masuk</button>
      </form>

      <a href="#" class="toggle-link" onclick="toggleForms()">Belum punya akun? Daftar di sini</a>
    </div>

    <!-- FORM REGISTER -->
    <div id="registerForm" style="display: none;">
      <h2>Daftar Akun Baru</h2>
      <p>Buat akun untuk mengakses ePuskesmas</p>

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3 text-start">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-4 text-start">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn-register">Daftar</button>
      </form>

      <a href="#" class="toggle-link" onclick="toggleForms()">Sudah punya akun? Login</a>
    </div>

    <footer>© 2025 ePuskesmas Indonesia</footer>
  </div>

  <script>
    function toggleForms() {
      const loginForm = document.getElementById('loginForm');
      const registerForm = document.getElementById('registerForm');

      if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
      } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
      }
    }
  </script>

</body>
</html>
