<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bukarivaso - Leaderboard Teknisi</title>
    <meta name="description" content="Lihat peringkat teknisi berdasarkan penyelesaian tugas di Bukarivaso.">
    <meta name="keywords" content="bukarivaso, leaderboard, teknisi, peringkat, checklist, logbook">

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
            --app-warning: #f6c23e; /* Gold */
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
            --color-gold: #ffd700;
            --color-silver: #c0c0c0;
            --color-bronze: #cd7f32;
            --text-bronze: #8c5a2b;
        }

        html, body { overflow-x: hidden; }

        body {
            background-color: var(--app-light); font-family: var(--app-font-family);
            color: var(--app-text-dark); padding-top: 70px; padding-bottom: 0;
        }

        /* --- Navbar Styles --- */
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
        .page-header-leaderboard {
            background: linear-gradient(135deg, var(--app-primary) 0%, #6f8fff 100%);
            color: white;
            padding: 3rem 1rem 6rem 1rem;
            margin-top: -70px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .page-header-leaderboard::before, .page-header-leaderboard::after {
            content: ''; position: absolute; border-radius: 50%; opacity: 0.1;
        }
        .page-header-leaderboard::before { width: 200px; height: 200px; background: white; bottom: -100px; left: -50px; }
        .page-header-leaderboard::after { width: 150px; height: 150px; background: white; top: -50px; right: -75px; }
        .page-header-leaderboard i.header-icon {
            font-size: 3rem; margin-bottom: 1rem; display: block; opacity: 0.8;
        }
        .page-header-leaderboard h1 { font-size: 2.2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .page-header-leaderboard p { font-size: 1rem; opacity: 0.9; max-width: 600px; margin: 0 auto; }

        /* --- Leaderboard Content Area --- */
        .leaderboard-content {
            margin-top: -4rem;
            padding: 0 1rem 3rem 1rem;
            position: relative;
            z-index: 2;
        }

        /* --- Top 3 Podium --- */
        .podium {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
        }
        .podium-item {
            background-color: var(--app-card-bg);
            border-radius: var(--app-border-radius);
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            padding: 1.5rem 1rem;
            text-align: center;
            width: 30%;
            position: relative;
            transition: transform 0.3s ease;
        }
        .podium-item:hover { transform: translateY(-8px); }
        .podium-item .rank-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .podium-item .medal-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
        }
        .podium-item h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: var(--app-text-dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .podium-item p {
            font-size: 0.9rem;
            color: var(--app-text-muted);
            margin-bottom: 0;
        }
        .podium-rank-2 { order: 1; height: 90%; background-color: #f0f0f5; }
        .podium-rank-1 { order: 2; height: 100%; transform: scale(1.05); z-index: 3; }
        .podium-rank-3 { order: 3; height: 85%; background-color: #fdf0e1; }
        .podium-rank-1 .rank-badge { background-color: var(--color-gold); color: #6e5a00; }
        .podium-rank-2 .rank-badge { background-color: var(--color-silver); color: #555; }
        .podium-rank-3 .rank-badge { background-color: var(--color-bronze); }
        .podium-rank-1 .medal-icon { color: var(--color-gold); }
        .podium-rank-2 .medal-icon { color: var(--color-silver); }
        .podium-rank-3 .medal-icon { color: var(--color-bronze); }

        /* --- Leaderboard List --- */
        .leaderboard-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .leaderboard-item {
            display: flex;
            align-items: center;
            background-color: var(--app-card-bg);
            border-radius: var(--app-border-radius);
            margin-bottom: 0.8rem;
            padding: 0.9rem 1.2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.04);
            transition: background-color 0.2s ease;
            border: 1px solid var(--app-lighter-grey);
        }
        .leaderboard-item:hover { background-color: var(--app-primary-lighter); }
        .leaderboard-item .rank {
            font-size: 1rem;
            font-weight: 600;
            color: var(--app-secondary);
            min-width: 40px;
            text-align: center;
            margin-right: 1rem;
        }
        .leaderboard-item .user-info {
            flex-grow: 1;
        }
        .leaderboard-item .user-info .name {
            font-weight: 500;
            color: var(--app-text-dark);
            font-size: 0.95rem;
            display: block;
        }
        .leaderboard-item .score {
            font-size: 1rem;
            font-weight: 600;
            color: var(--app-primary);
            text-align: right;
            min-width: 60px;
        }
        .leaderboard-item .score small {
            font-size: 0.75rem;
            font-weight: 400;
            color: var(--app-text-muted);
            display: block;
            line-height: 1;
            margin-top: 2px;
        }

        /* --- Responsive Adjustments --- */
        @media (min-width: 768px) {
            body { padding-top: 86px; padding-bottom: 0; }
            .navbar-mobile { display: none !important; }
            .page-header-leaderboard { padding: 6rem 1rem 8rem 1rem; }
            .leaderboard-content { margin-top: -6rem; }
        }
        @media (max-width: 767.98px) {
            body { padding-top: 0; padding-bottom: var(--app-nav-height-mobile); }
            .navbar-desktop { display: none !important; }
            .page-header-leaderboard { margin-top: 0; padding: 2.5rem 1rem 5rem 1rem; border-radius: 0; }
            .page-header-leaderboard h1 { font-size: 1.8rem; }
            .page-header-leaderboard p { font-size: 0.9rem; }
            .leaderboard-content { margin-top: -3rem; }
            .podium { gap: 0.5rem; }
            .podium-item { width: 32%; padding: 1rem 0.5rem; }
            .podium-item .rank-badge { width: 30px; height: 30px; font-size: 0.8rem; top: -10px; }
            .podium-item .medal-icon { font-size: 2.5rem; margin-bottom: 0.5rem; }
            .podium-item h5 { font-size: 0.9rem; }
            .podium-item p { font-size: 0.8rem; }
            .leaderboard-item { padding: 0.7rem 1rem; }
            .leaderboard-item .rank { font-size: 0.9rem; min-width: 30px; margin-right: 0.8rem;}
            .leaderboard-item .user-info .name { font-size: 0.9rem; }
            .leaderboard-item .score { font-size: 0.9rem; min-width: 50px; }
        }
        @media (max-width: 575.98px) {
            .podium-item h5 { font-size: 0.8rem; }
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
                    <a href="{{ route('leaderboard') }}" class="nav-item nav-link active">Leaderboard</a>
                    <a href="{{ route('kendaraan') }}" class="nav-item nav-link">Data Fasilitas</a>
                    <a href="{{ route('qr_code') }}" class="nav-item nav-link">Scan QR</a>
                </div>
                <a href="{{ route('login') }}" class="btn btn-login ms-lg-3">Login</a>
            </div>
        </div>
    </nav>

    <div class="page-header-leaderboard">
        <i class="fas fa-trophy header-icon"></i>
        <h1>Leaderboard Teknisi</h1>
        <p>Peringkat berdasarkan jumlah tugas yang telah diselesaikan.</p>
    </div>

    <div class="leaderboard-content">
        <div class="container">

            {{-- Top 3 Podium Section --}}
            @if(isset($leaderboard) && count($leaderboard) >= 3)
                <div class="podium">
                    {{-- Rank 2 --}}
                    <div class="podium-item podium-rank-2">
                        <div class="rank-badge">2</div>
                        <i class="fas fa-medal medal-icon"></i>
                        <h5>{{ $leaderboard[1]->name }}</h5>
                        <p>{{ $leaderboard[1]->leaderboard ?? 0 }} Tugas</p>
                    </div>
                    {{-- Rank 1 --}}
                    <div class="podium-item podium-rank-1">
                        <div class="rank-badge">1</div>
                        <i class="fas fa-crown medal-icon"></i>
                        <h5>{{ $leaderboard[0]->name }}</h5>
                        <p>{{ $leaderboard[0]->leaderboard ?? 0 }} Tugas</p>
                    </div>
                    {{-- Rank 3 --}}
                    <div class="podium-item podium-rank-3">
                        <div class="rank-badge">3</div>
                        <i class="fas fa-medal medal-icon"></i>
                        <h5>{{ $leaderboard[2]->name }}</h5>
                        <p>{{ $leaderboard[2]->leaderboard ?? 0 }} Tugas</p>
                    </div>
                </div>
            @elseif(isset($leaderboard) && count($leaderboard) > 0) {{-- Handles 1 or 2 users --}}
                <div class="podium justify-content-center"> {{-- Added justify-content-center for 1 or 2 items --}}
                    @if(isset($leaderboard[0]))
                    <div class="podium-item podium-rank-1" style="width: {{ count($leaderboard) == 1 ? '45%' : '30%' }};">
                        <div class="rank-badge">1</div>
                        <i class="fas fa-crown medal-icon"></i>
                        <h5>{{ $leaderboard[0]->name }}</h5>
                        <p>{{ $leaderboard[0]->leaderboard ?? 0 }} Tugas</p>
                    </div>
                    @endif
                    @if(isset($leaderboard[1])) {{-- Show rank 2 if there are 2 users --}}
                    <div class="podium-item podium-rank-2" style="width: 30%;">
                        <div class="rank-badge">2</div>
                        <i class="fas fa-medal medal-icon"></i>
                        <h5>{{ $leaderboard[1]->name }}</h5>
                        <p>{{ $leaderboard[1]->leaderboard ?? 0 }} Tugas</p>
                    </div>
                    @endif
                </div>
            @endif

            {{-- Daftar Peringkat Lengkap --}}
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">

                    {{-- Tampilkan judul jika ada data leaderboard --}}
                    @if(isset($leaderboard) && count($leaderboard) > 0)
                        <h4 class="text-center my-4 fw-semibold" style="color: var(--app-dark);">Daftar Peringkat Lengkap</h4>
                    @endif

                    <ul class="leaderboard-list">
                        @forelse ($leaderboard as $index => $user)
                            {{-- Tidak ada kondisi @if di sini, tampilkan semua pengguna dari $leaderboard --}}
                            <li class="leaderboard-item">
                                <div class="rank">#{{ $index + 1 }}</div>
                                <div class="user-info">
                                    <span class="name">{{ $user->name }}</span>
                                </div>
                                <div class="score">
                                    {{ $user->leaderboard ?? 0 }}
                                    <small>Tugas</small>
                                </div>
                            </li>
                        @empty
                            {{-- Pesan ini hanya muncul jika $leaderboard benar-benar kosong.
                                 Podium juga tidak akan ditampilkan dalam kasus ini. --}}
                            <li class="text-center text-muted py-4" style="background-color: transparent; box-shadow: none; border: none;">
                                Belum ada data leaderboard untuk ditampilkan.
                            </li>
                        @endforelse
                    </ul>

                    {{-- Optional Pagination --}}
                    {{--
                    @if (isset($leaderboard) && $leaderboard instanceof \Illuminate\Pagination\AbstractPaginator && $leaderboard->hasPages())
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $leaderboard->links() }}
                    </div>
                    @endif
                    --}}
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
                            <a class="mb-2" href="{{ route('leaderboard') }}"><i class="fa fa-angle-right me-2"></i>Leaderboard</a>
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
        <div class="container-fluid footer-bottom py-4 px-sm-3 px-md-5" style="background-color: #343a40;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="m-0" style="color: rgba(255,255,255,0.6);">&copy; {{ date('Y') }} <a href="#" style="color: rgba(255,255,255,0.8); text-decoration: none;">Bukarivaso</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="m-0" style="color: rgba(255,255,255,0.6);">Designed by Rakha Racahyo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand navbar-mobile fixed-bottom d-md-none">
        <div class="container-fluid d-flex justify-content-around">
            <a href="{{ route('index') }}" class="nav-link">
                <i class="fas fa-home"></i><span>Home</span>
            </a>
            <a href="{{ route('leaderboard') }}" class="nav-link active">
                <i class="fas fa-trophy"></i><span>Leaderboard</span>
            </a>
            <a href="{{ route('kendaraan') }}" class="nav-link">
                <i class="fas fa-car"></i><span>Fasilitas</span>
            </a>
            <a href="{{ route('qr_code') }}" class="nav-link">
                <i class="fas fa-qrcode"></i><span>Scan</span>
            </a>
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fas fa-sign-in-alt"></i><span>Login</span>
            </a>
        </div>
    </nav>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            navigator.serviceWorker.register("{{ asset('/sw.js') }}")
                .then(function(registration) {
                    console.log("Service Worker registered with scope:", registration.scope);
                }).catch(function(error) {
                    console.error("Service Worker registration failed:", error);
                });
        } else {
            console.error("Service workers are not supported.");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        const navbarDesktop = document.querySelector('.navbar-desktop');
        if (navbarDesktop) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbarDesktop.classList.add('scrolled');
                } else {
                    navbarDesktop.classList.remove('scrolled');
                }
            });
        }
    </script>

</body>
</html>