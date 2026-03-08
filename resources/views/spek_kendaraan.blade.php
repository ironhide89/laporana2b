<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- Make sure $vehicle is passed and has a name --}}
    <title>Bukarivaso - Spesifikasi {{ $vehicle->vehicle_name ?? 'Kendaraan' }}</title>
    <meta name="description" content="Detail spesifikasi dan riwayat untuk {{ $vehicle->vehicle_name ?? 'kendaraan' }} di Bukarivaso.">
    <meta name="keywords" content="bukarivaso, spesifikasi, kendaraan, riwayat, {{ $vehicle->vehicle_name ?? '' }}">

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
            color: var(--app-text-dark); padding-top: 0; padding-bottom: var(--app-nav-height-mobile); /* Adjust for mobile */
        }
        @media (min-width: 768px) { body { padding-top: 86px; padding-bottom: 0; } } /* Desktop padding */

        /* --- Navbar Styles --- */
        /* Desktop Navbar */
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
        /* Mobile Navbar */
        .navbar-mobile { height: var(--app-nav-height-mobile); background-color: var(--app-nav-bg); border-top: 1px solid var(--app-lighter-grey); box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.05); z-index: 1030; }
        .navbar-mobile .nav-link { display: flex; flex-direction: column; align-items: center; justify-content: center; color: var(--app-nav-text); font-size: 0.7rem; text-align: center; flex: 1; padding: 0.5rem 0.2rem; transition: color 0.2s ease-in-out; text-decoration: none; position: relative; }
        .navbar-mobile .nav-link i { font-size: 1.4rem; margin-bottom: 0.2rem; line-height: 1; }
        .navbar-mobile .nav-link span { line-height: 1.1; font-weight: 500; }
        .navbar-mobile .nav-link.active { color: var(--app-nav-active); font-weight: 600; }

        /* --- Page Header --- */
        .page-header-spec {
            padding: 2.5rem 1rem 1rem 1rem; /* Reduced padding */
            background: var(--app-primary);
            color: white;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .page-header-spec h1 { font-size: 1.6rem; font-weight: 600; margin-bottom: 0.2rem; }
        .page-header-spec p { font-size: 0.9rem; opacity: 0.9; margin-bottom: 0; }

        /* --- Tab Navigation --- */
        .nav-tabs-custom {
            border-bottom: 2px solid var(--app-lighter-grey);
            margin-bottom: 1.5rem;
            overflow-x: auto; /* Allow horizontal scroll on mobile */
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
        .nav-tabs-custom .nav-item {
             margin-bottom: -2px; /* Overlap border */
        }
        .nav-tabs-custom .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            color: var(--app-secondary);
            font-weight: 500;
            padding: 0.8rem 1rem;
            font-size: 0.9rem;
            transition: color 0.2s ease, border-color 0.2s ease;
        }
        .nav-tabs-custom .nav-link:hover {
            color: var(--app-primary);
            border-bottom-color: var(--app-lighter-grey);
        }
        .nav-tabs-custom .nav-link.active {
            color: var(--app-primary);
            border-bottom-color: var(--app-primary);
            font-weight: 600;
        }

        /* --- Specification Section (Tab 1) --- */
        .spec-section { padding: 1rem; }
        .spec-image-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        .spec-image-container img {
            max-width: 100%;
            max-height: 300px; /* Limit image height */
            border-radius: var(--app-border-radius);
            box-shadow: var(--app-card-shadow);
            object-fit: contain;
            border: 1px solid var(--app-lighter-grey);
        }
         .spec-image-container .no-image {
            color: var(--app-text-muted); font-size: 0.9rem;
            padding: 3rem; background-color: var(--app-lighter-grey);
            border-radius: var(--app-border-radius);
        }
        .spec-list dt { /* Term (Label) */
            font-weight: 600;
            color: var(--app-text-dark);
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }
        .spec-list dd { /* Definition (Value) */
            margin-left: 0; /* Reset default dl margin */
            margin-bottom: 1rem;
            font-size: 0.95rem;
            color: var(--app-dark);
            padding-bottom: 1rem;
            border-bottom: 1px dashed var(--app-lighter-grey); /* Separator */
        }
         .spec-list dd:last-child {
             margin-bottom: 0;
             border-bottom: none;
         }
        .spec-list .condition-badge { /* Reuse badge style */
            font-size: 0.75rem; font-weight: 500; padding: 0.3em 0.6em;
            border-radius: 50px; vertical-align: middle; margin-left: 5px;
        }
        .spec-list .condition-badge.bg-success { background-color: var(--app-success) !important; color: white;}
        .spec-list .condition-badge.bg-warning { background-color: var(--app-warning) !important; color: var(--app-text-dark); }
        .spec-list .condition-badge.bg-danger { background-color: var(--app-danger) !important; color: white; }

        /* --- History Tables --- */
        .history-table th, .history-table td {
            font-size: 0.85rem;
            vertical-align: middle;
            padding: 0.7rem 0.8rem;
        }
        .history-table thead th {
            background-color: var(--app-light);
            font-weight: 600;
            color: var(--app-dark);
            white-space: nowrap;
        }
        .history-table tbody tr:hover {
            background-color: var(--app-primary-lighter);
        }

        /* --- Responsive Adjustments --- */
        @media (min-width: 768px) {
            .page-header-vehicles { margin-top: -86px; padding: 4rem 1rem; }
        }
        @media (max-width: 767.98px) {
            body { padding-top: 0; padding-bottom: var(--app-nav-height-mobile); }
            .navbar-desktop { display: none !important; }
            .page-header-spec { margin-top: 0; padding: 1.5rem 1rem; border-radius: 0; }
            .page-header-spec h1 { font-size: 1.3rem; }
            .page-header-spec p { font-size: 0.85rem; }
            .nav-tabs-custom { margin-left: -1rem; margin-right: -1rem; padding-left: 1rem; } /* Allow scroll */
            .nav-tabs-custom .nav-link { padding: 0.7rem 0.8rem; font-size: 0.85rem; }
            .spec-section { padding: 0.5rem; }
            .spec-list dd { font-size: 0.9rem; }
            .history-table th, .history-table td { font-size: 0.8rem; padding: 0.6rem 0.5rem; }
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
                    {{-- Mark 'Data Fasilitas' active if coming from there --}}
                    <a href="{{ route('kendaraan') }}" class="nav-item nav-link active">Data Fasilitas</a>
                    <a href="{{ route('qr_code') }}" class="nav-item nav-link">Scan QR</a>
                </div>
                 <a href="{{ route('login') }}" class="btn btn-login ms-lg-3">Login</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid page-header-spec d-md-none"> 
        <div class="container">
            <h1>{{ $vehicle->vehicle_name ?? 'Detail Fasilitas' }}</h1>
            <p>{{ $vehicle->vehicle_type ?? 'Spesifikasi & Riwayat' }}</p>
        </div>
    </div>
    <div class="container mt-4 mb-5">

        {{-- Tab Navigation --}}
        <ul class="nav nav-tabs nav-tabs-custom" id="specTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="spec-data-tab" data-bs-toggle="tab" data-bs-target="#spec-data-pane" type="button" role="tab" aria-controls="spec-data-pane" aria-selected="true">
                    <i class="fas fa-car me-1 d-none d-sm-inline"></i> Data Fasilitas
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="spec-oli-tab" data-bs-toggle="tab" data-bs-target="#spec-oli-pane" type="button" role="tab" aria-controls="spec-oli-pane" aria-selected="false">
                     <i class="fas fa-oil-can me-1 d-none d-sm-inline"></i> Riwayat Oli
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="spec-kerusakan-tab" data-bs-toggle="tab" data-bs-target="#spec-kerusakan-pane" type="button" role="tab" aria-controls="spec-kerusakan-pane" aria-selected="false">
                    <i class="fas fa-triangle-exclamation me-1 d-none d-sm-inline"></i> Riwayat Kerusakan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="spec-perbaikan-tab" data-bs-toggle="tab" data-bs-target="#spec-perbaikan-pane" type="button" role="tab" aria-controls="spec-perbaikan-pane" aria-selected="false">
                     <i class="fas fa-tools me-1 d-none d-sm-inline"></i> Riwayat Perbaikan
                </button>
            </li>
        </ul>

        {{-- Tab Content --}}
        <div class="tab-content" id="specTabContent">

            {{-- Tab 1: Data Fasilitas --}}
            <div class="tab-pane fade show active" id="spec-data-pane" role="tabpanel" aria-labelledby="spec-data-tab" tabindex="0">
                <div class="card shadow-sm border-0">
                    <div class="card-body spec-section">
                        <div class="row g-4">
                            {{-- Kolom Gambar --}}
                            <div class="col-md-5 col-lg-4">
                                <div class="spec-image-container">
                                     @if($vehicle->foto_kendaraan)
                                        <img src="{{ asset('foto_kendaraan/' . $vehicle->foto_kendaraan) }}" alt="Foto {{ $vehicle->vehicle_name }}">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-image fa-3x"></i>
                                            <p class="mt-2 mb-0">Gambar tidak tersedia</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                             {{-- Kolom Spesifikasi --}}
                            <div class="col-md-7 col-lg-8">
                                <h4 class="mb-3 border-bottom pb-2">Spesifikasi {{ $vehicle->vehicle_name ?? '' }}</h4>
                                <dl class="spec-list row">
                                    {{-- Display fields in two columns on larger screens --}}
                                    <div class="col-lg-6">
                                        <dt>Tipe Kendaraan</dt>
                                        <dd>{{ $vehicle->vehicle_type ?? '-' }}</dd>

                                        <dt>Kondisi</dt>
                                        <dd>
                                            {{ $vehicle->vehicle_condition ?? '-' }}
                                            @if($vehicle->vehicle_condition == 'Serviceable')
                                                <span class="badge condition-badge bg-success">Baik</span>
                                            @elseif($vehicle->vehicle_condition == 'Unserviceable')
                                                 <span class="badge condition-badge bg-danger">Rusak</span>
                                            @elseif($vehicle->vehicle_condition == 'Serviceable dengan catatan')
                                                 <span class="badge condition-badge bg-warning">Catatan</span>
                                            @endif
                                        </dd>

                                        <dt>Odometer Terakhir</dt>
                                        <dd>{{ number_format($vehicle->odo_meter ?? 0, 0, ',', '.') }} KM</dd>

                                        <dt>No. Polisi</dt>
                                        <dd>{{ $vehicle->no_polisi ?? '-' }}</dd>

                                        <dt>Tahun</dt>
                                        <dd>{{ $vehicle->tahun ?? '-' }}</dd>

                                        <dt>User Peralatan</dt>
                                        <dd>{{ $vehicle->user_peralatan ?? '-' }}</dd>

                                        <dt>Lokasi</dt>
                                        <dd>{{ $vehicle->lokasi ?? '-' }}</dd>

                                         {{-- Conditional field for Crash Car --}}
                                        @if ($vehicle->vehicle_type === 'Crash Car' && isset($vehicle->vol_tangki))
                                            <dt>Volume Tangki</dt>
                                            <dd>{{ $vehicle->vol_tangki }} Liter</dd>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <dt>No. Aset</dt>
                                        <dd>{{ $vehicle->no_aset ?? '-' }}</dd>

                                        <dt>No. Rangka</dt>
                                        <dd>{{ $vehicle->no_rangka ?? '-' }}</dd>

                                        <dt>No. Mesin</dt>
                                        <dd>{{ $vehicle->no_mesin ?? '-' }}</dd>

                                        <dt>Engine</dt>
                                        <dd>{{ $vehicle->engine ?? '-' }}</dd>

                                        <dt>Kapasitas Silinder</dt>
                                        <dd>{{ isset($vehicle->kap_silinder) ? $vehicle->kap_silinder . ' CC' : '-' }}</dd>

                                        <dt>Transmisi</dt>
                                        <dd>{{ $vehicle->transmisi ?? '-' }}</dd>

                                        <dt>Jenis Bahan Bakar</dt>
                                        <dd>{{ $vehicle->bakar_jenis ?? '-' }}</dd>

                                        <dt>Kapasitas Tangki BBM</dt>
                                        <dd>{{ isset($vehicle->bakar_kapasitas) ? $vehicle->bakar_kapasitas . ' Liter' : '-' }}</dd>
                                    </div>
                                     {{-- Oli Specs - could be in a sub-section or here --}}
                                     <div class="col-12 mt-3"><hr><h5>Spesifikasi Oli & Ban</h5></div>
                                     <div class="col-lg-6">
                                        <dt>Oli Mesin 1 (Jenis/Vol)</dt>
                                        <dd>{{ $vehicle->oli_mesin_jenis1 ?? '-' }} / {{ isset($vehicle->oli_mesin_volume1) ? $vehicle->oli_mesin_volume1 . ' L' : '-' }}</dd>

                                        <dt>Oli Mesin 2 (Jenis/Vol)</dt>
                                        <dd>{{ $vehicle->oli_mesin_jenis2 ?? '-' }} / {{ isset($vehicle->oli_mesin_volume2) ? $vehicle->oli_mesin_volume2 . ' L' : '-' }}</dd>

                                        <dt>Oli Transmisi (Jenis/Vol)</dt>
                                        <dd>{{ $vehicle->oli_transmisi_jenis ?? '-' }} / {{ isset($vehicle->oli_transmisi_volume) ? $vehicle->oli_transmisi_volume . ' L' : '-' }}</dd>

                                        <dt>Oli Hidrolis (Jenis/Vol)</dt>
                                        <dd>{{ $vehicle->oli_hydrolis_oli ?? '-' }} / {{ isset($vehicle->oli_hydrolis_volume) ? $vehicle->oli_hydrolis_volume . ' L' : '-' }}</dd>
                                     </div>
                                     <div class="col-lg-6">
                                        <dt>Ban Depan</dt>
                                        <dd>{{ $vehicle->ban_depan ?? '-' }}</dd>

                                        <dt>Ban Belakang</dt>
                                        <dd>{{ $vehicle->ban_belakang ?? '-' }}</dd>

                                        <dt>Jumlah Ban</dt>
                                        <dd>{{ $vehicle->ban_jumlah ?? '-' }}</dd>

                                        <dt>Accu 1 (Spek/Jml)</dt>
                                        <dd>{{ $vehicle->accu1_spesifikasi ?? '-' }} / {{ $vehicle->accu1_jumlah ?? '-' }}</dd>

                                        <dt>Accu 2 (Spek/Jml)</dt>
                                        <dd>{{ $vehicle->accu2_spesifikasi ?? '-' }} / {{ $vehicle->accu2_jumlah ?? '-' }}</dd>
                                     </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab 2: Riwayat Oli --}}
            <div class="tab-pane fade" id="spec-oli-pane" role="tabpanel" aria-labelledby="spec-oli-tab" tabindex="0">
                 <div class="card shadow-sm border-0">
                    <div class="card-header bg-light">
                        <h5 class="mb-0 fw-semibold">Riwayat Pergantian Oli</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover history-table mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Ganti</th>
                                        <th>Jenis Oli</th>
                                        <th>Kategori</th>
                                        <th>Volume (L)</th>
                                        <th>Odometer (KM)</th>
                                        <th>Ganti Berikutnya (KM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Pastikan $oli dikirim dari controller --}}
                                    @forelse ($oli as $o)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::parse($o->tanggal_oli)->locale('id')->isoFormat('DD MMM YYYY') }}</td>
                                            <td>{{ $o->jenis_oli ?? '-' }}</td>
                                            <td>{{ $o->kategori_oli ?? '-' }}</td>
                                            <td>{{ $o->volume_oli ?? '-' }}</td>
                                            <td>{{ number_format($o->odo_meter ?? 0, 0, ',', '.') }}</td>
                                            <td>{{ number_format($o->oli_selanjutnya ?? 0, 0, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">Tidak ada riwayat pergantian oli.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tab 3: Riwayat Kerusakan --}}
            <div class="tab-pane fade" id="spec-kerusakan-pane" role="tabpanel" aria-labelledby="spec-kerusakan-tab" tabindex="0">
                 <div class="card shadow-sm border-0">
                     <div class="card-header bg-light">
                        <h5 class="mb-0 fw-semibold">Riwayat Laporan Kerusakan</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover history-table mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No BA</th>
                                        <th>Tanggal Lapor</th>
                                        <th>Bagian Rusak</th>
                                        <th>Penyebab</th>
                                        <th>Klasifikasi</th>
                                        <th>Pelapor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{-- Pastikan $kerusakan dikirim dari controller --}}
                                     @forelse ($kerusakan as $k)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->no_ba ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($k->tanggal_kerusakan ?? $k->created_at)->locale('id')->isoFormat('DD MMM YYYY') }}</td>
                                            <td>{{ $k->bagian ?? '-' }}</td>
                                            <td>{{ $k->penyebab ?? '-' }}</td>
                                            <td>{{ $k->klasifikasi ?? '-' }}</td>
                                             <td>{{ $k->user->name ?? $k->name ?? '-' }}</td> 
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">Tidak ada riwayat laporan kerusakan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

             {{-- Tab 4: Riwayat Perbaikan --}}
            <div class="tab-pane fade" id="spec-perbaikan-pane" role="tabpanel" aria-labelledby="spec-perbaikan-tab" tabindex="0">
                 <div class="card shadow-sm border-0">
                     <div class="card-header bg-light">
                        <h5 class="mb-0 fw-semibold">Riwayat Tindakan Perbaikan</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover history-table mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No BA</th>
                                        <th>Tanggal Perbaikan</th>
                                        <th>Detail Perbaikan</th>
                                        <th>Teknisi</th>
                                        {{-- Tambah kolom foto jika ada --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Pastikan $perbaikan dikirim dari controller --}}
                                    @forelse ($perbaikan as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->no_ba ?? '-' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($p->tanggal_perbaikan ?? $p->created_at)->locale('id')->isoFormat('DD MMM YYYY') }}</td>
                                            <td>{{ $p->detail_perbaikan ?? $p->kegiatan ?? '-' }}</td> 
                                            <td>{{ $p->user->name ?? $p->name ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">Tidak ada riwayat perbaikan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- End tab-content --}}

    </div> {{-- End container --}}

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

    {{-- Optional: Navbar shrink script --}}
    <script> const navbarDesktop = document.querySelector('.navbar-desktop'); if (navbarDesktop) { /* ... scroll code ... */ } </script>

</body>
</html>
