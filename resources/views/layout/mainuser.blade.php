<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Pengguna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --app-primary: #4e73df; /* Primary Blue */
            --app-secondary: #858796; /* Grey */
            --app-success: #1cc88a; /* Green */
            --app-info: #36b9cc; /* Teal */
            --app-warning: #f6c23e; /* Yellow */
            --app-danger: #e74a3b; /* Red */
            --app-light: #f8f9fc; /* Very Light Grey BG */
            --app-lighter-grey: #eaecf4; /* Lighter Grey for borders */
            --app-dark: #5a5c69; /* Dark Grey Text */
            --app-text-dark: #343a40; /* Near Black Text */
            --app-text-muted: #858796; /* Muted Text */
            --app-card-bg: #ffffff; /* White Card BG */
            --app-nav-bg: #ffffff;
            --app-nav-text: #858796;
            --app-nav-active: var(--app-primary);
            --app-nav-height: 65px;
            --app-header-height: auto; /* Header height adapts */
            --app-border-radius: 0.75rem; /* Consistent border radius */
            --app-card-shadow: 0 4px 15px rgba(0, 0, 0, 0.06); /* Softer shadow */
            --app-font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--app-light);
            font-family: var(--app-font-family);
            color: var(--app-text-dark);
            /* Remove padding-bottom, handle spacing in main content */
        }

        /* Main container for app content, excluding bottom nav */
        .app-container {
            padding-bottom: var(--app-nav-height); /* Space for bottom nav */
            min-height: 100vh; /* Ensure it takes full height */
        }

        /* Header Section */
        .app-header {
            background-color: var(--app-primary); /* Header with primary color */
            color: white;
            padding: 1.2rem 1rem 1rem 1rem; /* Adjust padding */
            border-radius: 0 0 20px 20px; /* Rounded bottom corners */
            margin-bottom: -30px; /* Overlap content slightly for effect */
            position: relative;
            z-index: 1;
        }
        .profile-section {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        .profile-avatar {
            width: 45px;
            height: 45px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.8rem;
            font-size: 1.2rem;
            font-weight: 500;
        }
        .profile-info h1 {
            font-size: 1.2rem; /* Slightly smaller name */
            font-weight: 600;
            margin: 0;
            line-height: 1.2;
        }
        .profile-info p {
            font-size: 0.85rem;
            margin: 0;
            opacity: 0.9;
        }

        /* Search Bar */
        .search-bar {
            position: relative;
        }
        .search-bar .form-control {
            border-radius: 50px; /* Fully rounded */
            background-color: rgba(255, 255, 255, 0.2); /* Slightly transparent */
            border: none;
            padding-left: 2.5rem; /* Space for icon */
            color: white;
            height: 45px; /* Consistent height */
            font-size: 0.9rem;
        }
        .search-bar .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .search-bar .search-icon {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        /* Main Content Area */
        .main-content {
            padding: 1rem;
            padding-top: 45px; /* Space for the overlapping header */
            position: relative;
            z-index: 0;
        }

        /* Section Title */
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--app-dark);
            margin-bottom: 1rem;
        }

        /* Quick Access Section */
        .quick-access-row {
            display: flex;
            overflow-x: auto; /* Horizontal scroll */
            padding-bottom: 1rem; /* Space for scrollbar */
            margin-bottom: 1.5rem;
            /* Hide scrollbar visually */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .quick-access-row::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        .quick-access-card {
            flex: 0 0 auto; /* Prevent shrinking/growing */
            width: 120px; /* Fixed width for cards */
            height: 110px; /* Fixed height */
            background-color: var(--app-card-bg);
            border-radius: var(--app-border-radius);
            box-shadow: var(--app-card-shadow);
            margin-right: 0.8rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0.8rem;
            text-decoration: none;
            color: var(--app-text-dark);
            transition: transform 0.2s ease;
        }
        .quick-access-card:hover {
            transform: translateY(-3px);
        }
        .quick-access-card i {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--app-primary); /* Icon color */
        }
        .quick-access-card span {
            font-size: 0.8rem;
            font-weight: 500;
            line-height: 1.2;
        }
        .quick-access-card.success i { color: var(--app-success); }
        .quick-access-card.danger i { color: var(--app-danger); }
        .quick-access-card.info i { color: var(--app-info); }

        /* Card Styling */
        .card {
            border: none;
            border-radius: var(--app-border-radius);
            background-color: var(--app-card-bg);
            box-shadow: var(--app-card-shadow);
            margin-bottom: 1.5rem;
            overflow: hidden; /* Ensure content respects border radius */
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid var(--app-lighter-grey);
            padding: 0.9rem 1rem;
            font-weight: 600;
            font-size: 0.95rem; /* Slightly smaller header */
            display: flex;
            align-items: center;
        }
        .card-header i {
            margin-right: 0.6rem;
            color: var(--app-secondary); /* Default icon color */
            font-size: 1em;
        }
        .card-header.bg-primary { color: var(--app-primary); } /* Text color for non-gradient */
        .card-header.bg-danger { color: var(--app-danger); }
        .card-header.bg-warning { color: #c59721; } /* Darker Yellow Text */
        .card-header.bg-info { color: var(--app-info); }

        /* List Group inside Card */
        .card-body {
            padding: 0; /* Remove padding if list-group is used */
        }
        .list-group-flush .list-group-item {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid var(--app-lighter-grey);
            padding: 0.9rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
         .list-group-flush .list-group-item:last-child {
            border-bottom: none;
         }
        .list-group-item .task-text {
            flex-grow: 1;
            margin-right: 1rem;
            font-size: 0.88rem; /* Consistent text size */
            line-height: 1.4;
            color: var(--app-text-dark);
        }
        .list-group-item .task-text small {
            font-size: 0.8em;
            color: var(--app-text-muted);
        }
        .list-group-item .task-text.completed {
            text-decoration: line-through;
            color: var(--app-text-muted);
        }
        .list-group-item .btn-action {
            padding: 0.3rem 0.9rem; /* Slightly more horizontal padding */
            font-size: 0.78rem; /* Smaller button text */
            font-weight: 500;
            flex-shrink: 0;
        }
        .list-group-item .badge-status {
             font-size: 0.75rem;
             padding: 0.4em 0.8em;
             font-weight: 500;
        }

        /* Bottom Navigation Bar Styling */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: var(--app-nav-height);
            background-color: var(--app-nav-bg);
            border-top: 1px solid var(--app-lighter-grey);
            box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.05); /* Slightly stronger shadow */
            z-index: 1030;
            display: flex;
            justify-content: space-around;
            align-items: stretch;
        }
        .bottom-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: var(--app-nav-text);
            font-size: 0.7rem;
            text-align: center;
            flex: 1;
            padding: 0.5rem 0.2rem;
            transition: color 0.2s ease-in-out;
            position: relative;
        }
        .bottom-nav-item i {
            font-size: 1.35rem; /* Slightly larger icon */
            margin-bottom: 0.25rem;
            line-height: 1;
        }
        .bottom-nav-item span {
             line-height: 1.1;
             font-weight: 500; /* Bolder label */
        }
        .bottom-nav-item.active {
            color: var(--app-nav-active);
        }
        /* Remove ::before indicator for a cleaner look */
        /* .bottom-nav-item.active::before { ... } */
        .bottom-nav-item:hover {
            color: var(--app-nav-active);
        }

    </style>
</head>
<body>

    <div class="app-container">
        {{-- Header Area --}}
        <header class="app-header">
            <div class="profile-section">
                <div class="profile-avatar">
                    {{-- Mengambil inisial nama, atau ikon default --}}
                    {{ strtoupper(substr(Auth::user()->name ?? 'P', 0, 1)) }}
                    {{-- Atau: <i class="fas fa-user"></i> --}}
                </div>
                <div class="profile-info">
                    <p>Selamat Datang,</p>
                    <h1>{{ Auth::user()->name ?? 'Pengguna' }}!</h1>
                </div>
            </div>
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="search" class="form-control" placeholder="Cari tugas atau kendaraan...">
                {{-- NOTE: Search function needs backend implementation --}}
            </div>
        </header>

        {{-- Main Content Area --}}
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    {{-- Bottom Navigation Bar --}}
    <nav class="bottom-nav">
        <a href="{{ route('user.todolist') }}" class="bottom-nav-item {{ Route::is('user.todolist') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        <a href="{{ route('user.dashboard') }}" class="bottom-nav-item {{ Route::is('user.dashboard') || Route::is('user.pemeliharaan_kendaraan_new') ? 'active' : '' }}">
             <i class="fas fa-clipboard-list"></i>
             <span>Checklist</span>
         </a>
        <a href="{{ route('user.scan_kerusakan') }}" class="bottom-nav-item {{ Route::is('user.scan_kerusakan') || Route::is('user.form_logbook') || Route::is('user.form_logbooknew') ? 'active' : '' }}">
            <i class="fas fa-tools"></i>
            <span>Kerusakan</span>
        </a>
        <a href="{{ route('user.cetak_laporan') }}" class="bottom-nav-item {{ Route::is('user.cetak_laporan') ? 'active' : '' }}">
            <i class="fas fa-print"></i>
            <span>Laporan</span>
        </a>
        <a href="{{ route('logout') }}" class="bottom-nav-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Keluar</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">@csrf</form>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @yield('scripts')
    @stack('scripts') {{-- <<< PASTIKAN INI ADA --}}
</body>
</html>