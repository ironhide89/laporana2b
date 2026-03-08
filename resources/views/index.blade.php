<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bukarivaso - Kesiapan Kendaraan A2B</title>
    <meta name="description" content="Website Bukarivaso untuk manajemen kesiapan kendaraan A2B, checklist, dan logbook.">
    <meta name="keywords" content="bukarivaso, checklist, logbook, kendaraan, A2B, pemeliharaan, bandara">

    <meta name="theme-color" content="#4e73df"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --app-primary: #4e73df;
            --app-primary-darker: #2e59d9;
            --app-primary-lighter: #e9eefe; /* Lighter shade for backgrounds */
            --app-secondary: #858796;
            --app-success: #1cc88a;
            --app-info: #36b9cc;
            --app-warning: #f6c23e;
            --app-danger: #e74a3b;
            --app-light: #f8f9fc; /* Main background */
            --app-lighter-grey: #eaecf4; /* Borders */
            --app-dark: #5a5c69; /* Dark grey text */
            --app-text-dark: #343a40; /* Near black text */
            --app-text-muted: #858796;
            --app-card-bg: #ffffff; /* Card background */
            --app-nav-bg: #ffffff; /* Navbar background */
            --app-nav-text: #858796; /* Inactive nav item color */
            --app-nav-active: var(--app-primary); /* Active nav item color */
            --app-nav-height-mobile: 65px; /* Mobile nav height */
            --app-border-radius: 0.75rem; /* Consistent border radius */
            --app-card-shadow: 0 4px 15px rgba(0, 0, 0, 0.06); /* Card shadow */
            --app-font-family: 'Poppins', sans-serif;
        }

        html, body {
            overflow-x: hidden;
        }

        body {
            background-color: var(--app-light);
            font-family: var(--app-font-family);
            color: var(--app-text-dark);
            padding-top: 70px; /* Space for fixed-top desktop navbar */
            padding-bottom: 0; /* No default bottom padding */
        }

        /* --- Utilities --- */
        .section-padding { padding: 4rem 1rem; }
        .section-title { font-size: 2rem; font-weight: 700; color: var(--app-text-dark); margin-bottom: 1rem; text-align: center; }
        .section-subtitle { font-size: 1rem; color: var(--app-text-muted); margin-bottom: 3rem; text-align: center; max-width: 650px; margin-left: auto; margin-right: auto; line-height: 1.7; }
        .brand-gradient-text { background: linear-gradient(90deg, var(--app-primary), var(--app-info)); -webkit-background-clip: text; background-clip: text; color: transparent; }
        .btn-pill { border-radius: 50px; padding: 0.7rem 1.8rem; font-weight: 500; }
        .btn-primary-custom { background-color: var(--app-primary); border-color: var(--app-primary); color: white; }
        .btn-primary-custom:hover { background-color: var(--app-primary-darker); border-color: var(--app-primary-darker); }
        .btn-outline-primary-custom { border-color: var(--app-primary); color: var(--app-primary); }
        .btn-outline-primary-custom:hover { background-color: var(--app-primary); color: white; }

        /* --- Desktop Navbar --- */
        .navbar-desktop { background-color: var(--app-card-bg) !important; box-shadow: 0 2px 4px rgba(0,0,0,0.05); padding-top: 0.8rem; padding-bottom: 0.8rem; transition: padding 0.3s ease; }
        .navbar-desktop.scrolled { padding-top: 0.5rem; padding-bottom: 0.5rem; background-color: rgba(255, 255, 255, 0.95) !important; backdrop-filter: blur(5px); }
        .navbar-desktop .navbar-brand img { max-height: 45px; width: auto; transition: max-height 0.3s ease; }
        .navbar-desktop.scrolled .navbar-brand img { max-height: 40px; }
        .navbar-desktop .nav-link { color: var(--app-dark) !important; font-weight: 500; padding: 0.5rem 1rem !important; font-size: 0.95rem; transition: color 0.2s ease; position: relative; }
        .navbar-desktop .nav-link::after { content: ''; position: absolute; width: 0; height: 2px; display: block; margin-top: 5px; right: 1rem; background: var(--app-primary); transition: width .2s ease; -webkit-transition: width .2s ease; }
        .navbar-desktop .nav-link:hover::after, .navbar-desktop .nav-link.active::after { width: calc(100% - 2rem); left: 1rem; right: auto; }
        .navbar-desktop .nav-link:hover, .navbar-desktop .nav-link.active { color: var(--app-primary) !important; }
        .navbar-desktop .btn-login { background-color: var(--app-primary); color: white !important; border-radius: 50px; padding: 0.5rem 1.2rem !important; font-weight: 500; transition: background-color 0.2s ease, transform 0.2s ease; }
        .navbar-desktop .btn-login:hover { background-color: var(--app-primary-darker); transform: translateY(-2px); }

        /* --- Mobile Bottom Navbar (Themed) --- */
        .navbar-mobile {
            height: var(--app-nav-height-mobile);
            background-color: var(--app-nav-bg); /* White background */
            border-top: 1px solid var(--app-lighter-grey); /* Subtle top border */
            box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.05); /* Consistent shadow */
            z-index: 1030;
            /* Applied via fixed-bottom class */
        }
        .navbar-mobile .nav-link {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            color: var(--app-nav-text); /* Grey inactive color */
            font-size: 0.7rem; /* Small text label */
            text-align: center; flex: 1;
            padding: 0.5rem 0.2rem;
            transition: color 0.2s ease-in-out;
            text-decoration: none; /* Remove underline */
            position: relative;
        }
        .navbar-mobile .nav-link i {
            font-size: 1.4rem; /* Slightly larger icon */
            margin-bottom: 0.2rem; /* Space between icon and text */
            line-height: 1;
        }
        .navbar-mobile .nav-link span {
             line-height: 1.1;
             font-weight: 500; /* Slightly bolder label */
        }
        .navbar-mobile .nav-link.active {
            color: var(--app-nav-active); /* Primary color for active */
            font-weight: 600; /* Bolder active label */
        }
        /* Optional: Add active indicator like in user theme */
        /* .navbar-mobile .nav-link.active::before {
            content: ''; position: absolute; top: 0; left: 30%; right: 30%; height: 3px;
            background-color: var(--app-nav-active); border-radius: 0 0 3px 3px;
        } */
        .navbar-mobile .nav-link:hover {
            color: var(--app-nav-active); /* Highlight on hover */
        }

        /* --- Hero Sections --- */
        .hero-mobile { background: var(--app-primary); color: white; padding: 3rem 1rem 4rem 1rem; text-align: center; margin-top: -70px; border-bottom-left-radius: 30px; border-bottom-right-radius: 30px; }
        .hero-mobile .navbar-brand img { max-width: 130px; margin-bottom: 1.5rem; }
        .hero-mobile h1 { font-size: 2rem; font-weight: 700; margin-bottom: 0.8rem; line-height: 1.3; }
        .hero-mobile p { font-size: 1rem; opacity: 0.9; margin-bottom: 2rem; max-width: 450px; margin-left: auto; margin-right: auto; }
        .hero-mobile .btn-cta { background-color: white; color: var(--app-primary); border-radius: 50px; padding: 0.8rem 2rem; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.2s ease; }
        .hero-mobile .btn-cta:hover { transform: translateY(-3px); }
        /* Desktop Hero */
        .hero-desktop { padding: 6rem 0; background: linear-gradient(rgba(248, 249, 252, 0.9), rgba(248, 249, 252, 0.9)), url("{{ asset('index/img/terminal-bw.jpg') }}") no-repeat center center; background-size: cover; text-align: center; }
        .hero-desktop h1 { font-size: 3.5rem; font-weight: 800; margin-bottom: 1rem; line-height: 1.2; color: var(--app-text-dark); }
        .hero-desktop p { font-size: 1.2rem; color: var(--app-text-muted); margin-bottom: 2.5rem; max-width: 700px; margin-left: auto; margin-right: auto; }
        .hero-desktop .btn { font-size: 1.1rem; padding: 0.9rem 2.5rem; }

        /* --- Features Section (No Cards) --- */
        .features-grid { display: grid; gap: 2.5rem; grid-template-columns: repeat(1, 1fr); }
        @media (min-width: 768px) { .features-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (min-width: 992px) { .features-grid { grid-template-columns: repeat(3, 1fr); } }
        .feature-item { display: flex; align-items: flex-start; text-align: left; }
        .feature-item .icon { flex-shrink: 0; width: 50px; height: 50px; background-color: var(--app-primary-lighter); color: var(--app-primary); border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-right: 1.2rem; }
        .feature-item .content h4 { font-size: 1.15rem; font-weight: 600; margin-bottom: 0.5rem; color: var(--app-text-dark); }
        .feature-item .content p { font-size: 0.9rem; color: var(--app-text-muted); line-height: 1.6; margin-bottom: 0; }

        /* --- About Section --- */
        .about-section img { border-radius: var(--app-border-radius); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .about-section h2.section-title { text-align: left; }
        .about-section p { color: var(--app-text-muted); line-height: 1.8; margin-bottom: 1.5rem; font-size: 0.95rem;}
        .about-section .list-unstyled i { color: var(--app-success); margin-right: 0.8rem; }
        .about-section .list-unstyled li { margin-bottom: 0.8rem; }

        /* --- Footer --- */
        .footer-desktop { background-color: var(--app-dark); color: rgba(255, 255, 255, 0.7); padding-top: 3rem; width: 100vw; margin-left: calc(-50vw + 50%); }
        .footer-desktop h5 { color: white; font-weight: 600; margin-bottom: 1.5rem; }
        .footer-desktop p, .footer-desktop a { font-size: 0.9rem; color: rgba(255, 255, 255, 0.7); text-decoration: none;}
        .footer-desktop a:hover { color: white; text-decoration: underline; }
        .footer-desktop .btn-social { border-color: rgba(255, 255, 255, 0.3); color: rgba(255, 255, 255, 0.7); }
        .footer-desktop .btn-social:hover { background-color: var(--app-primary); border-color: var(--app-primary); color: white; }
        .footer-bottom { background-color: #212529; padding: 1rem 0; font-size: 0.85rem; width: 100vw; margin-left: calc(-50vw + 50%); }
        .footer-bottom p { margin-bottom: 0; }
        .footer-bottom a { color: var(--app-primary); font-weight: 500; text-decoration: none; }
        .footer-bottom a:hover { text-decoration: underline; }

        /* --- Responsive Overrides --- */
        @media (min-width: 768px) {
            body { padding-top: 86px; padding-bottom: 0; }
            .navbar-mobile { display: none !important; }
            .hero-mobile { display: none !important; }
        }
        @media (max-width: 767.98px) {
            body { padding-top: 0; padding-bottom: var(--app-nav-height-mobile); } /* Apply bottom padding only on mobile */
            .navbar-desktop { display: none !important; }
            .hero-desktop { display: none !important; }
            .about-section img { margin-bottom: 2rem; }
            .footer-desktop { display: none !important; }
            .section-padding { padding: 2.5rem 1rem; }
            .section-title { font-size: 1.6rem; }
            .section-subtitle { font-size: 0.95rem; margin-bottom: 2rem;}
            .about-section h2.section-title { text-align: center; }
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-desktop fixed-top d-none d-md-block">
        <div class="container">
            <a href="{{ route('index') }}" class="navbar-brand">
                <img src="{{ asset('logo/air.png') }}" alt="Bukarivaso Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('index') }}" class="nav-item nav-link active">Home</a>
                    <a href="#features" class="nav-item nav-link">Fitur</a>
                    <a href="#about" class="nav-item nav-link">Tentang</a>
                    <a href="{{ route('leaderboard') }}" class="nav-item nav-link">Leaderboard</a>
                    <a href="{{ route('kendaraan') }}" class="nav-item nav-link">Data Fasilitas</a>
                    <a href="{{ route('qr_code') }}" class="nav-item nav-link">Scan QR</a>
                </div>
                 <a href="{{ route('login') }}" class="btn btn-login ms-lg-3">Login</a>
            </div>
        </div>
    </nav>
    <div class="hero-mobile d-md-none">
        <a href="{{ route('index') }}" class="navbar-brand">
             <img class="mt-5" src="{{ asset('logo/air.png') }}" alt="Bukarivaso Logo">
        </a>
         <h1>Bukarivaso</h1>
         <p>Solusi digital untuk manajemen kesiapan kendaraan A2B Anda.</p>
         <a href="#features" class="btn btn-cta">Jelajahi Fitur</a>
    </div>

    <div class="hero-desktop d-none d-md-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1>Optimalkan Kesiapan Kendaraan <span class="brand-gradient-text">A2B</span> Anda</h1>
                    <p>Bukarivaso menyediakan platform terintegrasi untuk checklist harian, logbook digital, pelaporan kerusakan, dan pemantauan status kendaraan secara efisien.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary-custom btn-pill me-3">Mulai Sekarang</a>
                    <a href="#features" class="btn btn-outline-primary-custom btn-pill">Lihat Fitur</a>
                </div>
            </div>
        </div>
    </div>
    <div id="features" class="container-fluid section-padding">
        <div class="container">
            <h2 class="section-title">Mengapa Memilih Bukarivaso?</h2>
            <p class="section-subtitle">Kami menyediakan solusi lengkap untuk memastikan operasional kendaraan Anda berjalan lancar, aman, dan efisien.</p>
            <div class="features-grid">
                {{-- Feature Items (same as before) --}}
                <div class="feature-item">
                    <div class="icon"><i class="fas fa-clipboard-check"></i></div>
                    <div class="content"><h4>Checklist Digital</h4><p>Standarisasi proses pemeriksaan harian dengan checklist digital yang mudah diisi dan dipantau.</p></div>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="fas fa-book-open"></i></div>
                    <div class="content"><h4>Logbook Terintegrasi</h4><p>Catat semua aktivitas perawatan dan perbaikan secara terpusat untuk riwayat yang lengkap.</p></div>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="fas fa-triangle-exclamation"></i></div>
                    <div class="content"><h4>Pelaporan Cepat</h4><p>Laporkan kerusakan atau temuan langsung dari lapangan melalui aplikasi mobile.</p></div>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="fas fa-qrcode"></i></div>
                    <div class="content"><h4>Akses QR Code</h4><p>Identifikasi kendaraan dan akses form terkait dengan cepat menggunakan pemindaian QR code.</p></div>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="fas fa-chart-line"></i></div>
                    <div class="content"><h4>Monitoring Status</h4><p>Pantau kondisi dan status kesiapan setiap kendaraan secara real-time dari dashboard.</p></div>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="fas fa-print"></i></div>
                    <div class="content"><h4>Laporan Lengkap</h4><p>Hasilkan laporan riwayat pemeliharaan, checklist, dan kerusakan dengan mudah.</p></div>
                </div>
            </div>
        </div>
    </div>
    <div id="about" class="container-fluid section-padding bg-white about-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img class="img-fluid rounded" src="{{ asset('index/img/airport-ground-crew.jpg') }}" alt="Airport Ground Crew">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title text-start mb-3">Dirancang untuk Efisiensi Operasional</h2>
                    <p>Bukarivaso memahami kebutuhan unik manajemen aset di lingkungan bandara. Platform kami dirancang untuk menyederhanakan proses, meningkatkan akuntabilitas, dan memastikan standar keselamatan tertinggi.</p>
                    <ul class="list-unstyled mt-4">
                        <li><i class="fas fa-check-circle"></i> Meminimalkan downtime kendaraan.</li>
                        <li><i class="fas fa-check-circle"></i> Meningkatkan kepatuhan terhadap prosedur keselamatan.</li>
                        <li><i class="fas fa-check-circle"></i> Memudahkan pelacakan riwayat perawatan.</li>
                        <li><i class="fas fa-check-circle"></i> Akses data yang mudah bagi teknisi dan manajemen.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-desktop mt-5 d-none d-md-block">
        <div class="container-fluid" style="background-color: var(--app-dark); color: rgba(255, 255, 255, 0.7); padding-top: 3rem;">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-lg-4 col-md-6 mb-5">
                        <a href="{{ route('index') }}" class="navbar-brand mb-3 d-block">
                            <img src="{{ asset('logo/air-white.png') }}" alt="Bukarivaso Logo Footer" style="max-height: 45px;">
                        </a>
                        <p>Solusi terpadu untuk manajemen kesiapan kendaraan A2B Anda.</p>
                        <p><i class="fa fa-map-marker-alt me-2"></i> Jl. Ir. Haji Juanda, Betro, Kec. Sedati, Sidoarjo, Jawa Timur 61253</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5">
                        <h5 class="text-white mb-4">Link Cepat</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="mb-2" href="{{ route('index') }}"><i class="fa fa-angle-right me-2"></i>Home</a>
                            <a class="mb-2" href="#features"><i class="fa fa-angle-right me-2"></i>Fitur</a>
                            <a class="mb-2" href="#about"><i class="fa fa-angle-right me-2"></i>Tentang</a>
                            <a class="mb-2" href="{{ route('kendaraan') }}"><i class="fa fa-angle-right me-2"></i>Data Fasilitas</a>
                            <a class="" href="{{ route('login') }}"><i class="fa fa-angle-right me-2"></i>Login</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5">
                        <h5 class="text-white mb-4">Hubungi Kami</h5>
                        <p>Untuk informasi lebih lanjut atau demo produk, silakan hubungi tim kami.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid footer-bottom py-4 px-sm-3 px-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="m-0">&copy; {{ date('Y') }} <a href="#">Bukarivaso</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="m-0">Designed by Rakha Racahyo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Applying the themed styles directly here --}}
    <nav class="navbar navbar-expand navbar-mobile fixed-bottom d-md-none" style="height: var(--app-nav-height-mobile); background-color: var(--app-nav-bg); border-top: 1px solid var(--app-lighter-grey); box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.05);">
        <div class="container-fluid d-flex justify-content-around">
             <a href="{{ route('index') }}" class="nav-link active" style="color: var(--app-nav-active); font-weight: 600;"> 
                <i class="fas fa-home" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i>
                <span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Home</span>
            </a>
            <a href="{{ route('leaderboard') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-trophy" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i>
                <span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Leaderboard</span>
            </a>
            <a href="{{ route('kendaraan') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-car" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i>
                <span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Fasilitas</span>
            </a>
            <a href="{{ route('qr_code') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-qrcode" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i>
                <span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Scan</span>
            </a>
            <a href="{{ route('login') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-sign-in-alt" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i>
                <span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Login</span>
            </a>
        </div>
    </nav>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => { console.log("Service worker registration succeeded:", registration); },
                (error) => { console.error(`Service worker registration failed: ${error}`); }
            );
        } else { console.error("Service workers are not supported."); }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- Optional: Add JS for navbar shrink effect --}}
    <script>
        const navbarDesktop = document.querySelector('.navbar-desktop');
        if (navbarDesktop) {
            window.onscroll = () => {
                if (window.scrollY > 50) { navbarDesktop.classList.add('scrolled'); }
                else { navbarDesktop.classList.remove('scrolled'); }
            };
        }
    </script>

</body>
</html>
