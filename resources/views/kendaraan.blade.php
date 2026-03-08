<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bukarivaso - Data Fasilitas</title>
    <meta name="description" content="Lihat data fasilitas dan kendaraan yang terdaftar di Bukarivaso.">
    <meta name="keywords" content="bukarivaso, data kendaraan, fasilitas, A2B, daftar kendaraan">

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

        /* --- Navbar Styles (Same as before) --- */
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
        .page-header-vehicles {
            background: linear-gradient(135deg, var(--app-primary) 0%, #6f8fff 100%);
            color: white;
            padding: 3rem 1rem 6rem 1rem; /* More bottom padding */
            margin-top: -70px; /* Offset body padding */
            text-align: center;
            position: relative;
            overflow: hidden; /* Hide overflow for pseudo-elements */
        }

         /* Optional: Add subtle background shapes */
         .page-header-vehicles::before, .page-header-vehicles::after {
            content: ''; position: absolute; border-radius: 50%; opacity: 0.1;
        }
        .page-header-vehicles::before { width: 200px; height: 200px; background: white; bottom: -100px; left: -50px; }
        .page-header-vehicles::after { width: 150px; height: 150px; background: white; top: -50px; right: -75px; }

        .page-header-vehicles i.header-icon { font-size: 2.5rem; margin-bottom: 0.8rem;  display: block; opacity: 0.8; }
        .page-header-vehicles h1 { font-size: 2rem; font-weight: 700; margin-bottom: 0.3rem; }
        .page-header-vehicles p { font-size: 1rem; opacity: 0.9; max-width: 600px; margin: 0 auto; }

        /* --- Filter Section --- */
        .filter-section {
            background-color: transparent; /* Remove card background */
            padding: 0; /* Remove padding */
            box-shadow: none; /* Remove shadow */
            margin-bottom: 2rem;
        }
        .filter-section label { font-weight: 500; margin-bottom: 0; margin-right: 0.5rem; font-size: 0.9rem; color: var(--app-dark); }
        .filter-section .form-select {
            border-radius: var(--app-border-radius); /* Standard radius */
            font-size: 0.9rem; padding: 0.6rem 1rem; padding-right: 2.5rem;
            border-color: var(--app-lighter-grey);
            max-width: 300px; /* Adjust width */
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); /* Subtle shadow */
        }
        .filter-section .form-select:focus { border-color: var(--app-primary); box-shadow: 0 0 0 0.2rem rgba(var(--app-primary-rgb, 78, 115, 223), 0.25); }
        .filter-section .btn-reset { font-size: 0.85rem; }

        /* --- Vehicle List Styling --- */
        .vehicle-list { list-style: none; padding: 0; margin: 0; }
        .vehicle-list-item {
            background-color: var(--app-card-bg);
            border-radius: var(--app-border-radius);
            box-shadow: var(--app-card-shadow);
            border: 1px solid var(--app-lighter-grey);
            margin-bottom: 1rem;
            padding: 1rem 1.2rem;
            display: flex;
            align-items: center; /* Vertically align items */
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .vehicle-list-item:hover {
             transform: scale(1.015); /* Slight scale on hover */
             box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .vehicle-list-item .vehicle-thumbnail {
            flex-shrink: 0;
            width: 70px; /* Thumbnail size */
            height: 70px;
            border-radius: 10px; /* Rounded square */
            margin-right: 1.2rem;
            overflow: hidden;
            background-color: var(--app-lighter-grey);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .vehicle-list-item .vehicle-thumbnail img {
            width: 100%; height: 100%; object-fit: cover;
        }
        .vehicle-list-item .vehicle-thumbnail .no-image-icon {
            font-size: 1.8rem; color: var(--app-text-muted);
        }

        .vehicle-list-item .vehicle-info {
            flex-grow: 1; /* Take remaining space */
            min-width: 0; /* Prevent overflow issues with flex */
        }
        .vehicle-list-item .vehicle-info h5 { /* Vehicle Name */
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 0.3rem;
            color: var(--app-text-dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis; /* Add ellipsis for long names */
        }
        .vehicle-list-item .vehicle-info .details {
            font-size: 0.85rem;
            color: var(--app-text-muted);
            line-height: 1.5;
            margin-bottom: 0;
        }
         .vehicle-list-item .vehicle-info .details strong {
             color: var(--app-dark);
             margin-right: 4px;
         }
         .vehicle-list-item .vehicle-info .details .separator {
             margin: 0 0.4rem; /* Separator between details */
             color: var(--app-lighter-grey);
         }
         /* Condition Badge in list */
        .condition-badge-list {
            font-size: 0.7rem; font-weight: 500; padding: 0.25em 0.5em;
            border-radius: 50px; vertical-align: middle;
        }
        .condition-badge-list.bg-success { background-color: var(--app-success) !important; color: white;}
        .condition-badge-list.bg-warning { background-color: var(--app-warning) !important; color: var(--app-text-dark); }
        .condition-badge-list.bg-danger { background-color: var(--app-danger) !important; color: white; }

        .vehicle-list-item .vehicle-action {
            flex-shrink: 0;
            margin-left: 1rem; /* Space before button */
        }
        .vehicle-list-item .btn-spec {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }

        /* --- Pagination --- (Same as before) */
        .pagination { justify-content: center; }
        .pagination .page-link { color: var(--app-primary); border-radius: 0.3rem; margin: 0 3px; border-color: var(--app-lighter-grey); font-size: 0.9rem; padding: 0.4rem 0.8rem; }
        .pagination .page-item.active .page-link { background-color: var(--app-primary); border-color: var(--app-primary); color: white; z-index: 3; }
        .pagination .page-item.disabled .page-link { color: var(--app-secondary); background-color: var(--app-card-bg); border-color: var(--app-lighter-grey); }
        .pagination .page-link:hover { background-color: var(--app-primary-lighter); border-color: var(--app-lighter-grey); z-index: 2; }

        /* --- Responsive Adjustments --- */
        @media (min-width: 768px) {
            body { padding-top: 86px; padding-bottom: 0; }
            .navbar-mobile { display: none !important; }
            .page-header-vehicles { margin-top: -86px; padding: 5rem 1rem; }
        }
        @media (max-width: 767.98px) {
            body { padding-top: 0; padding-bottom: var(--app-nav-height-mobile); }
            .navbar-desktop { display: none !important; }
            .page-header-vehicles { margin-top: 0; padding: 2.5rem 1rem; border-radius: 0; }
            .page-header-vehicles h1 { font-size: 1.8rem; }
            .page-header-vehicles p { font-size: 0.9rem; }
            .filter-section { text-align: center; }
            .filter-section .form-select { max-width: none; display: block; width: 100%; }
            .filter-section label { display: block; margin-bottom: 0.5rem; margin-right: 0;}
            .vehicle-list-item { flex-direction: column; align-items: flex-start; padding: 1rem; }
            .vehicle-list-item .vehicle-thumbnail { width: 100%; height: 150px; margin-right: 0; margin-bottom: 1rem; }
            .vehicle-list-item .vehicle-info h5 { font-size: 1.1rem; }
            .vehicle-list-item .vehicle-info .details .separator { display: none; } /* Hide separators */
            .vehicle-list-item .vehicle-info .details span { display: block; margin-bottom: 0.3rem; } /* Stack details */
            .vehicle-list-item .vehicle-action { margin-left: 0; margin-top: 1rem; width: 100%; }
            .vehicle-list-item .btn-spec { width: 100%; }
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
                    <a href="{{ route('kendaraan') }}" class="nav-item nav-link active">Data Fasilitas</a> 
                    <a href="{{ route('qr_code') }}" class="nav-item nav-link">Scan QR</a>
                </div>
                 <a href="{{ route('login') }}" class="btn btn-login ms-lg-3">Login</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid page-header-vehicles">
        <div class="container">
            <i class="fas fa-car-side header-icon"></i>
            <h1 class="display-4 text-uppercase">Data Fasilitas</h1>
            <p>Informasi detail mengenai kendaraan dan fasilitas yang terdaftar.</p>
        </div>
    </div>
    <div class="container mt-4 mb-5">

        <div class="row justify-content-center mb-4">
            <div class="col-md-8 col-lg-6">
                <div class="filter-section">
                    <form method="GET" action="{{ route('kendaraan') }}" class="d-flex align-items-center justify-content-center flex-wrap">
                        <label for="vehicle_type" class="form-label me-2 mb-2 mb-sm-0">Filter Tipe:</label>
                        <select id="vehicle_type" name="vehicle_type"
                                class="form-select form-select-sm"
                                onchange="this.form.submit()">
                            <option value="">Semua Tipe</option>
                            {{-- Ensure $vehicleTypes is passed from controller --}}
                            @isset($vehicleTypes)
                                @foreach ($vehicleTypes as $type)
                                    <option value="{{ $type }}" {{ request('vehicle_type') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                        @if(request('vehicle_type'))
                            <a href="{{ route('kendaraan') }}" class="btn btn-sm btn-outline-secondary ms-2 rounded-pill btn-reset">Reset</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9"> 
                <ul class="vehicle-list">
                    @forelse ($vehicle as $d)
                        <li class="vehicle-list-item" data-vehicle-type="{{ $d->vehicle_type }}">
                            {{-- Thumbnail --}}
                            <div class="vehicle-thumbnail">
                                @if($d->foto_kendaraan)
                                    <img src="{{ asset('foto_kendaraan/' . $d->foto_kendaraan) }}" alt="Foto {{ $d->vehicle_name }}">
                                @else
                                    <i class="fas fa-image no-image-icon"></i>
                                @endif
                            </div>
                            {{-- Info --}}
                            <div class="vehicle-info">
                                <h5>{{ $d->vehicle_name }}</h5>
                                <p class="details">
                                    <span><strong>Tipe:</strong> {{ $d->vehicle_type }}</span>
                                    <span class="separator d-none d-sm-inline">|</span> 
                                    <span>
                                        <strong>Kondisi:</strong> {{ $d->vehicle_condition }}
                                        @if($d->vehicle_condition == 'Serviceable')
                                            <span class="badge condition-badge-list bg-success">Baik</span>
                                        @elseif($d->vehicle_condition == 'Unserviceable')
                                             <span class="badge condition-badge-list bg-danger">Rusak</span>
                                        @elseif($d->vehicle_condition == 'Serviceable dengan catatan')
                                             <span class="badge condition-badge-list bg-warning">Catatan</span>
                                        @endif
                                    </span>
                                     <span class="separator d-none d-lg-inline">|</span> 
                                     <span class="d-block d-lg-inline"> 
                                        <strong>Odo:</strong> {{ number_format($d->odo_meter ?? 0, 0, ',', '.') }} KM
                                    </span>
                                </p>
                            </div>
                            {{-- Action Button --}}
                            <div class="vehicle-action">
                                 <a href="{{ route('spek_kendaraan', ['barcodes' => $d->barcodes]) }}" class="btn btn-outline-primary-custom btn-pill btn-sm btn-spec">
                                    <i class="fas fa-info-circle me-1 d-none d-md-inline"></i> {{-- Hide icon on mobile --}}
                                    <span>Detail</span>
                                </a>
                            </div>
                        </li>
                    @empty
                        <li class="col-12">
                            <div class="alert alert-secondary text-center" role="alert">
                                <i class="fas fa-box-open fa-lg me-2"></i> Tidak ada data fasilitas yang cocok.
                            </div>
                        </li>
                    @endforelse
                </ul>

                 <div class="d-flex justify-content-center mt-5">
                    {{ $vehicle->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

    </div>

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
            <a href="{{ route('kendaraan') }}" class="nav-link active" style="color: var(--app-nav-active); font-weight: 600;"> 
                <i class="fas fa-car" style="font-size: 1.4rem; margin-bottom: 0.2rem;"></i><span style="font-size: 0.7rem; font-weight: 500; line-height: 1.1;">Fasilitas</span>
            </a>
            <a href="{{ route('qr_code') }}" class="nav-link" style="color: var(--app-nav-text);">
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

    <script> const navbarDesktop = document.querySelector('.navbar-desktop'); if (navbarDesktop) { /* ... scroll code ... */ } </script>

</body>
</html>
