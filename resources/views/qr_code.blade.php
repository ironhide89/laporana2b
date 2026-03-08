<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bukarivaso - Scan QR Kendaraan</title>
    <meta name="description" content="Pindai QR Code kendaraan untuk melihat spesifikasi dan riwayat di Bukarivaso.">
    <meta name="keywords" content="bukarivaso, scan qr, qr code, kendaraan, A2B, spesifikasi">

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
            --app-primary-lighter: #e9eefe;
            --app-secondary: #858796;
            --app-success: #1cc88a;
            --app-info: #36b9cc;
            --app-warning: #f6c23e;
            --app-danger: #e74a3b;
            --app-light: #f8f9fc;
            --app-lighter-grey: #eaecf4;
            --app-dark: #5a5c69;
            --app-text-dark: #343a40;
            --app-text-muted: #858796;
            --app-card-bg: #ffffff;
            --app-nav-bg: #ffffff;
            --app-nav-text: #858796;
            --app-nav-active: var(--app-primary);
            --app-nav-height-mobile: 65px;
            --app-border-radius: 0.75rem;
            --app-card-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            --app-font-family: 'Poppins', sans-serif;
        }

        html, body { overflow-x: hidden; }

        body {
            background-color: var(--app-light); font-family: var(--app-font-family);
            color: var(--app-text-dark); padding-top: 70px; padding-bottom: 0;
        }

        /* --- Navbar Styles (Same as index/leaderboard) --- */
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
        .navbar-mobile { height: var(--app-nav-height-mobile); background-color: var(--app-nav-bg); border-top: 1px solid var(--app-lighter-grey); box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.05); z-index: 1030; }
        .navbar-mobile .nav-link { display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--app-nav-text); font-size: 0.7rem; text-align: center; flex: 1; padding: 0.5rem 0.2rem; transition: color 0.2s ease-in-out; text-decoration: none; position: relative; }
        .navbar-mobile .nav-link i { font-size: 1.4rem; margin-bottom: 0.2rem; line-height: 1; }
        .navbar-mobile .nav-link span { line-height: 1.1; font-weight: 500; }
        .navbar-mobile .nav-link.active { color: var(--app-nav-active); font-weight: 600; }

        /* --- Page Header --- */
        .page-header-scan {
            background: linear-gradient(135deg, var(--app-primary) 0%, #6f8fff 100%);
            color: white;
            padding: 3rem 1rem 6rem 1rem; /* More bottom padding */
            margin-top: -70px; /* Offset body padding */
            text-align: center;
            position: relative;
            overflow: hidden; /* Hide overflow for pseudo-elements */
        }
        .page-header-scan::before, .page-header-scan::after {
            content: ''; position: absolute; border-radius: 50%; opacity: 0.1;
        }

        .page-header-scan::before { width: 200px; height: 200px; background: white; bottom: -100px; left: -50px; }
        .page-header-scan::after { width: 150px; height: 150px; background: white; top: -50px; right: -75px; }

        .page-header-scan i.header-icon { font-size: 2.5rem; margin-bottom: 0.8rem; display: block; opacity: 0.8; }
        .page-header-scan h1 { font-size: 2rem; font-weight: 700; margin-bottom: 0.3rem; }
        .page-header-scan p { font-size: 1rem; opacity: 0.9; max-width: 600px; margin: 0 auto; }

        /* --- Scanner Area Styling --- */
        .scanner-section { padding: 1rem 1rem 3rem 1rem; }
        .scanner-card {
            background-color: var(--app-card-bg);
            border-radius: var(--app-border-radius);
            box-shadow: var(--app-card-shadow);
            border: 1px solid var(--app-lighter-grey);
            padding: 1.5rem; /* Padding inside card */
        }
        .scanner-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--app-text-dark);
        }
        .scanner-card .card-subtitle {
             font-size: 0.9rem;
             color: var(--app-text-muted);
             margin-bottom: 1.5rem;
        }
        #reader { /* The div where the scanner video appears */
            max-width: 450px; /* Max width */
            width: 100%; /* Full width within container */
            min-height: 250px; /* Min height while loading */
            border: 2px dashed var(--app-lighter-grey); /* Dashed border */
            border-radius: var(--app-border-radius);
            margin: 0 auto 1rem auto; /* Center and add bottom margin */
            position: relative;
            overflow: hidden; /* Clip video */
            background-color: #f0f0f0; /* Loading background */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* Style the video element created by the library */
        #reader video {
            display: block;
            width: 100% !important;
            height: auto !important;
            border-radius: calc(var(--app-border-radius) - 2px); /* Match parent radius */
        }
        .scanner-loading {
            font-size: 0.9rem;
            color: var(--app-text-muted);
        }
        /* Optional: Scan result display area */
        #scan-result-display { display: none; /* Initially hidden */ }

        /* --- Footer --- */
        .footer-desktop { /* Styles from previous version */ }
        .footer-bottom { /* Styles from previous version */ }

        /* --- Responsive Adjustments --- */
        @media (min-width: 768px) {
            body { padding-top: 86px; padding-bottom: 0; }
            .navbar-mobile { display: none !important; }
            .page-header-scan { margin-top: -86px; padding: 5rem 1rem; }
        }
        @media (max-width: 767.98px) {
            body { padding-top: 0; padding-bottom: var(--app-nav-height-mobile); }
            .navbar-desktop { display: none !important; }
            .page-header-scan { margin-top: 0; padding: 2.5rem 1rem; border-radius: 0; }
            .page-header-scan h1 { font-size: 1.8rem; }
            .page-header-scan p { font-size: 0.9rem; }
            .footer-desktop { display: none !important; }
            .scanner-section { padding: 1.5rem 1rem; }
            .scanner-card { padding: 1rem; }
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
                    <a href="{{ route('index') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('leaderboard') }}" class="nav-item nav-link">Leaderboard</a>
                    <a href="{{ route('kendaraan') }}" class="nav-item nav-link">Data Fasilitas</a>
                    <a href="{{ route('qr_code') }}" class="nav-item nav-link active">Scan QR</a> 
                </div>
                 <a href="{{ route('login') }}" class="btn btn-login ms-lg-3">Login</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid page-header-scan">
        <div class="container">
            <i class="fas fa-qrcode header-icon"></i>
            <h1 class="display-4 text-uppercase">Scan QR Code</h1>
            <p>Arahkan kamera ke QR Code pada kendaraan untuk melihat detail spesifikasi.</p>
        </div>
    </div>
    <section class="scanner-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="scanner-card text-center">
                         <h5 class="card-title">Pindai Kode QR Kendaraan</h5>
                         <p class="card-subtitle">Posisikan QR Code di dalam area pemindaian.</p>

                        {{-- Div for the QR Code Scanner --}}
                        <div id="reader">
                             <div class="scanner-loading p-5">
                                <i class="fas fa-spinner fa-spin me-2"></i> Memuat kamera...
                            </div>
                        </div>

                        {{-- Area to display detected code (optional) --}}
                        <div id="scan-result-display" class="mt-3">
                            <p class="mb-1 text-muted small">Kode Terdeteksi:</p>
                            <p class="fw-bold mb-1" id="detected-code-value">-</p>
                            <p class="text-muted small">Mengarahkan ke halaman spesifikasi...</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-desktop mt-5 d-none d-md-block">
        {{-- Footer content same as index --}}
        <div class="container-fluid" style="background-color: var(--app-dark); color: rgba(255, 255, 255, 0.7); padding-top: 3rem;"> <div class="container"> <div class="row pt-5"> <div class="col-lg-4 col-md-6 mb-5"> <a href="{{ route('index') }}" class="navbar-brand mb-3 d-block"><img src="{{ asset('logo/air-white.png') }}" alt="Bukarivaso Logo Footer" style="max-height: 45px;"></a> <p>Solusi terpadu untuk manajemen kesiapan kendaraan A2B Anda.</p> <p><i class="fa fa-map-marker-alt me-2"></i> Jl. Ir. Haji Juanda, Betro, Kec. Sedati, Sidoarjo, Jawa Timur 61253</p> <div class="d-flex justify-content-start mt-4"> <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a> <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a> <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a> <a class="btn btn-outline-light btn-social rounded-circle text-center me-2 px-0" style="width: 38px; height: 38px;" href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a> </div></div><div class="col-lg-4 col-md-6 mb-5"> <h5 class="text-white mb-4">Link Cepat</h5> <div class="d-flex flex-column justify-content-start"> <a class="mb-2" href="{{ route('index') }}"><i class="fa fa-angle-right me-2"></i>Home</a> <a class="mb-2" href="{{ route('leaderboard') }}"><i class="fa fa-angle-right me-2"></i>Leaderboard</a> <a class="mb-2" href="{{ route('kendaraan') }}"><i class="fa fa-angle-right me-2"></i>Data Fasilitas</a> <a class="" href="{{ route('login') }}"><i class="fa fa-angle-right me-2"></i>Login</a> </div></div><div class="col-lg-4 col-md-6 mb-5"> <h5 class="text-white mb-4">Hubungi Kami</h5> <p>Untuk informasi lebih lanjut atau demo produk, silakan hubungi tim kami.</p> </div></div></div> </div>
        <div class="container-fluid footer-bottom py-4 px-sm-3 px-md-5"> <div class="container"> <div class="row"> <div class="col-md-6 text-center text-md-start mb-3 mb-md-0"> <p class="m-0">&copy; {{ date('Y') }} <a href="#">Bukarivaso</a>. All Rights Reserved.</p> </div><div class="col-md-6 text-center text-md-end"> <p class="m-0">Designed by Rakha Racahyo</p> </div></div></div> </div>
    </div>
    <nav class="navbar navbar-expand navbar-mobile fixed-bottom d-md-none">
        <div class="container-fluid d-flex justify-content-around">
             <a href="{{ route('index') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-home" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i><span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Home</span>
            </a>
            <a href="{{ route('leaderboard') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-trophy" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i><span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Leaderboard</span>
            </a>
            <a href="{{ route('kendaraan') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-car" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i><span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Fasilitas</span>
            </a>
            <a href="{{ route('qr_code') }}" class="nav-link active" style="color: var(--app-nav-active); font-weight: 600;"> 
                <i class="fas fa-qrcode" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i><span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Scan</span>
            </a>
            <a href="{{ route('login') }}" class="nav-link" style="color: var(--app-nav-text);">
                <i class="fas fa-sign-in-alt" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i><span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Login</span>
            </a>
        </div>
    </nav>
    <script src="{{ asset('/sw.js') }}"></script>
    <script> if ("serviceWorker" in navigator) { /* ... registration code ... */ } else { console.error("Service workers are not supported."); } </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            console.log("QR Code Detected:", decodedText);

            // Optional: Show detected code and redirect message
            const resultDisplay = document.getElementById('scan-result-display');
            const detectedCodeEl = document.getElementById('detected-code-value');
            if(detectedCodeEl) detectedCodeEl.textContent = decodedText;
            if(resultDisplay) resultDisplay.style.display = 'block';

            // Construct the redirect URL using Laravel's url() helper
            const baseUrl = "{{ url('/') }}"; // Get base URL
            const redirectUrl = `${baseUrl}/spek-kendaraan/${decodedText}`; // Use correct path

            // Stop the scanner before redirecting
            html5QrcodeScanner.clear().then(_ => {
                console.log("Scanner stopped, redirecting to:", redirectUrl);
                window.location.href = redirectUrl;
            }).catch(error => {
                console.error('Failed to clear html5QrcodeScanner.', error);
                // Still attempt to redirect even if clearing fails
                window.location.href = redirectUrl;
            });
        }

        function onScanFailure(error) {
            // Optional: Log scan failure for debugging, but usually ignore continuous errors
            // console.warn(`QR error = ${error}`);
        }

        // Configuration for the scanner
        const scannerConfig = {
            fps: 15, // Slightly higher FPS
            qrbox: (viewfinderWidth, viewfinderHeight) => {
                let minEdgePercentage = 0.7; // Use 70% of the shortest edge
                let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
                let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
                return { width: qrboxSize, height: qrboxSize };
            },
            rememberLastUsedCamera: true,
            supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA] // Explicitly use camera
        };

        // Initialize the scanner
        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",       // ID of the container element
            scannerConfig,
            /* verbose= */ false); // Reduce console logs

        // Render the scanner
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

    </script>

    {{-- Optional: Navbar shrink script --}}
    <script> const navbarDesktop = document.querySelector('.navbar-desktop'); if (navbarDesktop) { /* ... scroll code ... */ } </script>

</body>
</html>
