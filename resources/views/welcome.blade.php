@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ePuskesmas Indonesia</title>

  <!-- Bootstrap & Font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Merriweather:wght@700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #0b4f6c;
      --secondary: #e0b100;
      --success: #0d9979;
      --light-bg: #f5f8f9;
      --dark-text: #1a1a1a;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: "Poppins", sans-serif;
      background-color: var(--light-bg);
      color: var(--dark-text);
      overflow-x: hidden;
    }

    /* Navbar */
    .navbar {
      background: var(--primary);
      transition: all 0.4s ease;
      box-shadow: 0 2px 10px rgba(0,0,0,0.15);
    }

    .navbar.scrolled {
      background: #08394e;
    }

    .navbar-brand {
      font-family: "Merriweather", serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: #fff !important;
      letter-spacing: 0.6px;
    }

    .nav-link {
      color: #f8f9fa !important;
      margin-left: 12px;
      font-weight: 500;
      transition: 0.3s;
    }

    .nav-link:hover {
      color: var(--secondary) !important;
    }

    /* Hero Section */
    .hero {
      min-height: 100vh;
      background: linear-gradient(to bottom right, var(--primary), #125f77);
      color: #fff;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 140px 20px 100px;
    }

    .hero h1 {
      font-family: "Merriweather", serif;
      font-size: 3rem;
      line-height: 1.3;
    }

    .hero p {
      max-width: 650px;
      margin: 20px auto 30px;
      font-size: 1.1rem;
      opacity: 0.95;
    }

    .hero .btn-warning {
      font-weight: 600;
      border-radius: 50px;
      padding: 12px 32px;
      background-color: var(--secondary);
      color: #1a1a1a;
      border: none;
      transition: 0.3s;
    }

    .hero .btn-warning:hover {
      background-color: #f0c63b;
      transform: translateY(-3px);
    }

    /* About Section */
    .about-section {
      padding: 100px 20px;
      background: #fff;
    }

    .about-section h2 {
      font-family: "Merriweather", serif;
      color: var(--primary);
      font-weight: 700;
      margin-bottom: 25px;
    }

    .about-section p {
      font-size: 1.05rem;
      text-align: justify;
      color: #333;
    }

    .about-section img {
      border-radius: 15px;
      width: 100%;
      box-shadow: 0 5px 15px rgba(0,0,0,0.12);
    }

    /* Features Section */
    .features {
      background: #eff6f5;
      padding: 100px 20px;
    }

    .features h2 {
      text-align: center;
      color: var(--primary);
      font-family: "Merriweather", serif;
      font-weight: 700;
      margin-bottom: 50px;
    }

    .feature-card {
      border: none;
      background: #fff;
      border-radius: 15px;
      padding: 35px 20px;
      box-shadow: 0 5px 12px rgba(0,0,0,0.08);
      transition: 0.3s;
      height: 100%;
    }

    .feature-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    }

    .feature-card h5 {
      color: var(--success);
      font-weight: 700;
      margin-bottom: 12px;
    }

    /* Footer */
    footer {
      background: var(--primary);
      color: #f8f9fa;
      text-align: center;
      padding: 30px 0;
      font-size: 0.95rem;
      border-top: 4px solid var(--secondary);
    }

    footer p {
      margin: 0;
      opacity: 0.9;
    }

    /* Fade Animation */
    .fade-in {
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.8s ease-in-out;
    }

    .fade-in.show {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">ePuskesmas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="#home">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
          <li class="nav-item">
            <a class="nav-link btn btn-warning text-dark px-3 py-1 ms-2" href="{{ url('register') }}">Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-warning text-dark px-3 py-1 ms-2" href="{{ url('login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section id="home" class="hero">
    <h1 class="fade-in">Transformasi Digital Layanan Kesehatan</h1>
    <p class="fade-in">ePuskesmas Indonesia menghadirkan sistem informasi kesehatan terpadu yang mendukung pelayanan publik yang efisien, transparan, dan terpercaya.</p>
    <a href="#about" class="btn btn-warning fade-in">Pelajari Lebih Lanjut</a>
  </section>

  <!-- About -->
  <section id="about" class="about-section">
    <div class="container">
      <div class="row align-items-center g-5">
        <div class="col-md-6 fade-in">
          <h2>Tentang ePuskesmas</h2>
          <p>
            <strong>ePuskesmas Indonesia</strong> adalah platform sistem informasi kesehatan digital yang dikembangkan untuk memperkuat tata kelola layanan publik di bidang kesehatan.
            Aplikasi ini terintegrasi dengan <strong>SATUSEHAT Kemenkes</strong> dan mendukung implementasi <em>Smart Health Management</em> di seluruh wilayah Indonesia.
          </p>
          <a href="#features" class="btn btn-success mt-3 px-4 py-2">Lihat Fitur</a>
        </div>
        <div class="col-md-6 fade-in">
          <img src="https://via.placeholder.com/600x400.png?text=Dashboard+ePuskesmas" alt="Dashboard ePuskesmas">
        </div>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section id="features" class="features">
    <div class="container">
      <h2 class="fade-in">Fitur Utama ePuskesmas</h2>
      <div class="row g-4 mt-4">
        <div class="col-md-3 fade-in">
          <div class="feature-card text-center">
            <h5>Integrasi BPJS</h5>
            <p>Mendukung integrasi penuh dengan BPJS Kesehatan untuk proses pendaftaran dan klaim pasien secara otomatis.</p>
          </div>
        </div>
        <div class="col-md-3 fade-in">
          <div class="feature-card text-center">
            <h5>Cloud Computing</h5>
            <p>Data kesehatan disimpan secara aman di server nasional dengan akses real-time antar fasilitas kesehatan.</p>
          </div>
        </div>
        <div class="col-md-3 fade-in">
          <div class="feature-card text-center">
            <h5>Integrasi SATUSEHAT</h5>
            <p>Terhubung langsung dengan platform resmi <strong>Kementerian Kesehatan Republik Indonesia</strong>.</p>
          </div>
        </div>
        <div class="col-md-3 fade-in">
          <div class="feature-card text-center">
            <h5>Online Monitoring</h5>
            <p>Pemantauan layanan dan pelaporan kesehatan dilakukan secara daring dengan transparansi data publik.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===================== -->
<!-- Section: Pendaftaran Pasien Baru -->
<!-- ===================== -->
<section id="pendaftaran" class="py-5" style="background-color: #ffffff;">
  <div class="container">
    <h2 class="text-center mb-4" style="font-family:'Merriweather', serif; color: var(--primary); font-weight:700;">
      Pendaftaran Pasien Baru
    </h2>
    <p class="text-center mb-5" style="max-width:700px; margin:auto;">
      Silakan isi formulir di bawah ini untuk melakukan pendaftaran pasien baru di ePuskesmas Indonesia. 
      Data Anda akan langsung tersimpan di sistem pusat secara aman.
    </p>

   
  </div>
</section>

<!-- ===================== -->
<!-- Section: Kontak Darurat & Lokasi -->
<!-- ===================== -->
<section id="kontak" class="py-5" style="background-color:#f1f7f6;">
  <div class="container">
    <h2 class="text-center mb-4" style="font-family:'Merriweather', serif; color: var(--primary); font-weight:700;">
      Kontak Darurat & Lokasi Kami
    </h2>
    <div class="row g-4 align-items-center">
      <div class="col-md-5">
        <div class="p-4 bg-white shadow rounded-4">
          <h5 class="fw-bold text-success mb-3">Hubungi Kami</h5>
          <p><strong>Alamat:</strong><br>Jl. Sehat No. 123, Kec. Sukamaju, Kota Indonesia</p>
          <p><strong>Telepon:</strong><br>(021) 1234-5678</p>
          <p><strong>Email:</strong><br>info@epuskesmas.go.id</p>
          <hr>
          <h6 class="fw-bold text-danger">Kontak Darurat</h6>
          <p>Ambulans: <strong>119</strong><br>Polisi: <strong>110</strong><br>BPJS Kesehatan: <strong>1500 400</strong></p>
        </div>
      </div>

      <div class="col-md-7">
        <div class="ratio ratio-16x9 shadow rounded-4">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.039480558646!2d112.6186840748475!3d-7.880663792132964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd629fc8bdfa6a3%3A0x894ee041c5de4210!2sPuskesmas%20Arjowinangun!5e0!3m2!1sid!2sid!4v1699364444444!5m2!1sid!2sid" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- Footer -->
  <footer>
    <p>© 2025 ePuskesmas Indonesia — Sistem Informasi Kesehatan Nasional</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Navbar scroll effect
    window.addEventListener("scroll", () => {
      const navbar = document.querySelector(".navbar");
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    });

    // Fade-in animation
    const fadeElements = document.querySelectorAll('.fade-in');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('show');
      });
    }, { threshold: 0.2 });
    fadeElements.forEach(el => observer.observe(el));
  </script>
</body>
</html>