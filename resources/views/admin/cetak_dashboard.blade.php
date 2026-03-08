<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Heavy Equipment Dashboard</title>
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

  <style>
    /* --- Semua CSS Anda tetap sama, tidak perlu diubah --- */
    /* --- Global Resets & Base --- */
    body {
      font-family: 'Source Sans Pro', sans-serif;
      color: #333; /* Darker gray for better readability */
      background-color: #f4f6f9; /* Standard AdminLTE background */
    }

    h1, h2, h3, h4, h5, h6 {
      margin-top: 0;
      font-weight: 600; /* Slightly bolder headings */
    }

    hr.separator {
      border: 0;
      border-top: 1px solid #e0e0e0; /* Lighter, cleaner separator */
      margin: 1.5rem 0;
    }

    /* --- Responsiveness --- */
    @media (max-width: 768px) {
      .chart {
        width: 100% !important;
        height: auto !important;
        min-height: 200px; /* Slightly more space for mobile charts */
      }
      .card-header h3.card-title, .card-header h5 { /* Target specific card titles */
        font-size: 1rem !important;
      }
      .progress-group {
        font-size: 0.875rem;
      }
      .main-title h5 { font-size: 1.5rem !important; }
      .main-title h5.subtitle { font-size: 1.2rem !important; }
      .main-title h5.location-title { font-size: 1rem !important; }
      .main-logo img { width: 150px !important; }

      table th, table td {
        font-size: 0.8rem; /* Slightly smaller for mobile tables */
        padding: 0.4rem;
      }
      #dashboard .text-success { /* Percentage */
        font-size: 60px !important;
      }
      #dashboard .text-center h5 { /* Label for percentage */
        font-size: 0.9rem !important;
      }
      .card-header.border-transparent.d-flex.justify-content-left.align-items-center .card-title {
        font-size: 1.1rem !important;
      }
        /* Detail item titles on mobile */
      .detail-page-title .card-title {
        font-size: 1.5rem !important;
      }
      .detail-section-title .card-title {
          font-size: 1.1rem !important;
      }
      .signature-section p, .lampiran-section p, .lampiran-section ol, .lampiran-section li {
        font-size: 0.85rem !important;
      }
      .signature-section img {
        width: 80px !important;
      }
    }

    /* --- PDF Specific Styling (via html2canvas windowWidth) --- */
    body.pdf-generating {
      padding: 0 !important;
      background-color: #fff !important; /* Ensure white background for PDF */
    }
    body.pdf-generating .card {
        border: 1px solid #ccc; /* Ensure borders are visible on PDF */
        box-shadow: none; /* Remove shadow for PDF if preferred */
    }
    body.pdf-generating .main-title h5 { color: #000 !important; } /* Ensure text is black */
    body.pdf-generating .text-success { color: #28a745 !important; }
    /* Add other color overrides if needed for PDF */


    /* --- General Layout & Components --- */
    .content-wrapper-padding { /* Added class for main content padding */
        padding: 25px;
    }

    #tabelAtas { /* This ID is not used in the HTML, but style is kept if intended elsewhere */
      width: 100%;
      border-collapse: collapse;
    }
    #tabelAtas th, #tabelAtas td {
      border: 1px solid #dee2e6;
      padding: 8px;
      text-align: center;
    }
    #tabelAtas th { background-color: #f8f9fa; }
    #tabelAtas tbody tr:hover { background-color: #f1f1f1; }

    .chart-legend {
      list-style: none;
      padding: ;
      font-size: 0.8rem; /* Slightly smaller legend */
    }
    .chart-legend li {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }
    .chart-legend i {
      margin-right: 8px;
      font-size: 0.9em; /* Make circle icon slightly smaller */
    }
    .chart-legend strong {
      margin-left: auto;
    }

    .card {
      height: 100%;
      border: 1px solid #e0e0e0; /* Lighter border for cards */
      box-shadow: 0 2px 10px rgba(0,0,0,0.05); /* Softer shadow */
      margin-bottom: 1.5rem; /* Consistent bottom margin */
    }
    .col-md-4, .col-md-6, .col-md-12 { /* Ensure flex behavior for columns containing cards */
      display: flex;
      flex-direction: column;
    }
    .card-body {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      padding: 1.25rem; /* Standardized card body padding */
    }
    .card-header {
      background-color: #f8f9fa; /* Light gray header */
      border-bottom: 1px solid #e0e0e0;
      padding: 0.75rem 1.25rem;
    }
    .card-header .card-title {
      font-weight: 600; /* Bolder card titles */
      font-size: 1.1rem;
      margin: 0; /* Remove default margin if any */
    }
    .card-header.text-center.bg-secondary.text-white .card-title {
        color: white !important; /* Ensure title is white on dark bg */
        font-size: 1.1rem;
    }
     .card-header.bg-secondary { /* Specific for dark headers */
        background-color: #6c757d !important;
        color: white;
    }

    .table-responsive {
      overflow-x: auto;
    }
    .table {
      margin-bottom: 0;
      font-size: 0.9rem; /* Base font size for tables */
    }
    .table th, .table td {
      padding: 0.6rem; /* Slightly more padding in cells */
      vertical-align: middle;
      border: 1px solid #dee2e6; /* Ensure all tables have borders */
    }
    .table thead th {
      background-color: #e9ecef; /* Light header for tables */
      font-weight: 600;
      text-align: left; /* Default left align headers */
    }
    .table-bordered th, .table-bordered td {
      border: 1px solid #dee2e6 !important;
    }
    .badge {
      font-size: 0.75em;
      padding: 0.4em 0.65em;
      font-weight: 600;
    }

    /* --- Header Section --- */
    .main-title-container {
      margin-bottom: 2rem; /* Increased space below header */
      padding-bottom: 1.5rem;
      border-bottom: 2px solid #63b0be; /* Accent border */
    }
    .main-title .text-left {
      word-break: break-word;
    }
    .main-title h5 {
        font-size: 2.5rem; /* Desktop main title */
        font-weight: 700;
        color: #343a40;
        margin-bottom: 0.25rem;
    }
    .main-title h5.subtitle {
        font-size: 1.8rem; /* Desktop subtitle */
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.25rem;
    }
    .main-title h5.location-title {
        font-size: 1.3rem; /* Desktop location */
        font-weight: 500;
        color: #6c757d;
    }
    .main-logo img {
        width: 100%; /* Make logo responsive within its column */
        max-width: 220px; /* Max logo size */
        height: auto;
    }
    .header-color-bar > div {
        height: 10px !important; /* Thinner color bar */
    }
    .current-time-display { /* Class for timestamp */
        font-size: 1.1rem;
        font-weight: 500;
        color: #555;
        margin-bottom: 2rem;
    }
     #btn-pdf {
        font-size: 1rem;
        padding: 0.5rem 1.5rem;
        margin-bottom: 1.5rem; /* Space below button */
    }

    /* --- Dashboard Specific Styles --- */
    #dashboard .card-title { /* Titles in dashboard cards */
      font-size: 1.1rem;
    }
    #dashboard .text-success.performance-value { /* Big percentage value */
      font-size: 4.5rem; /* Slightly reduced for better fit */
      font-weight: 700;
      line-height: 1;
      margin-bottom: 0.5rem;
    }
    #dashboard .performance-label { /* Label below big percentage */
      font-size: 1rem;
      color: #6c757d;
    }
    #dashboard .list-group-item h2 { /* Airport category */
      font-size: 1.3rem;
      margin-bottom: 0.1rem;
    }
     #dashboard .list-group-item h4 {
        font-size: 0.9rem;
        margin-bottom: 0.25rem;
        color: #495057;
    }
    #dashboard .list-group-item {
        padding: 0.5rem 0.75rem; /* Adjust padding */
        background-color: transparent; /* Ensure clean look if card bg changes */
        border: none; /* Remove borders if not needed */
    }
    #dashboard .progress-group {
      font-size: 0.9rem;
      margin-bottom: 0.75rem; /* Space between progress bars */
    }
    #dashboard .chart-legend {
      font-size: 0.8rem;
    }
    #dashboard .chart-responsive {
        min-height: 170px; /* Ensure pie chart has enough space */
    }

    /* --- Signature and Attachment Section --- */
    .footer-section-table { /* Replaced inline styles on table */
        width: 100%;
        border-collapse: collapse;
        margin-top: 3rem; /* More space above */
    }
    .footer-section-table td {
        border: none; /* No borders for this layout table */
        padding: 0; /* Reset padding */
        vertical-align: top;
    }
    .lampiran-section {
        padding-right: 20px;
    }
    .lampiran-section p, .lampiran-section ol, .lampiran-section li {
      font-size: 0.9rem !important; /* Consistent font size */
      margin: 4px 0 !important;
    }
    .lampiran-section p { font-weight: bold; }
    .lampiran-section ol {
      padding-left: 25px !important;
      margin-top: 5px !important;
    }
    .signature-section {
        text-align: center;
    }
    .signature-section p {
      font-size: 0.9rem !important;
      margin: 3px 0 !important;
    }
    .signature-section img {
      width: 120px !important; /* Signature size */
      height: auto !important;
      margin-top: 10px !important;
      margin-bottom: 5px !important;
    }

    /* --- Detail Pages (item1 to item5) --- */
    .page-break-before { page-break-before: always; } /* Hint for printing */
    .page-break-after { page-break-after: always; }
    .page-break-inside-avoid { page-break-inside: avoid; }

    .detail-page-container { /* Wrapper for each item page */
        /* padding-top: 1.5rem; Add padding if these are distinct pages */
    }
    .detail-page-title { /* For main titles like "DETAIL PERFORMANCE" */
        text-align: center;
        background-color: #343a40 !important; /* Darker, distinct header */
        color: white !important;
        padding: 1rem 0 !important;
        margin-bottom: 1.5rem; /* Space after main title */
    }
    .detail-page-title .card-title {
        font-size: 1.7rem !important; /* Larger title for detail pages */
        font-weight: 700 !important;
        color: white !important;
    }

    .detail-section-title { /* For sub-titles like "FOAM TENDER" */
        text-align: left;
        padding: 0.75rem 1rem !important; /* Adjusted padding */
        background-color: #e9ecef !important; /* Light background for section titles */
        border-top: 1px solid #ced4da;
        border-bottom: 1px solid #ced4da;
        margin-top: 1.5rem; /* Space above section title */
        margin-bottom: 1rem; /* Space below section title */
    }
    .detail-section-title:first-of-type { /* No top margin for the very first section title on a page */
        margin-top: 0;
    }
    .detail-section-title .card-title {
        font-size: 1.2rem !important; /* Sub-title font size */
        font-weight: 600 !important;
        color: #343a40 !important;
    }
    /* Remove redundant hr if detail-section-title provides enough separation */
    #item1 hr, #item2 hr, #item3 hr, #item4 hr, #item5 hr {
        display: none; /* Hiding hr as section titles provide separation */
    }
    /* Table specific styling for item details */
    .detail-page-container .card-body {
      padding: 0; /* Remove card body padding if tables are direct children */
    }
    .detail-page-container .table-responsive {
        padding: 0 0.5rem; /* Add some horizontal padding to responsive containers */
    }
    .detail-page-container .d-flex.flex-wrap .table-responsive {
        padding: 0 5px; /* Keep original small padding between split tables */
    }
     /* Ensure consistent table header background in detail pages */
    #item1 .table thead th, #item2 .table thead th, #item3 .table thead th, #item4 .table thead th, #item5 .table thead th {
        background-color: #e9ecef;
    }


    /* Fix for card height issues within flex columns on detail pages */
    /* This ensures that cards within itemX divs behave correctly if they were still using card structure */
    #item1, #item2, #item3, #item4, #item5 {
        display: flex;
        flex-direction: column;
        /* If #itemX are supposed to be cards themselves, ensure they have a border etc. */
        /* border: 1px solid #e0e0e0;
        background-color: #fff;
        margin-bottom: 1.5rem; */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <section class="content content-wrapper-padding">
    <div class="container-fluid" id="dashboard">
      <div class="text-center mb-4 main-title-container"> <div class="row main-title" style="display: flex; justify-content: space-between; align-items: center;">
          <div class="col-8">
            <h5 class="text-left">HEAVY EQUIPMENT</h5>
            <h5 class="text-left subtitle">PERFORMANCE DASHBOARD</h5>
            <h5 class="text-left location-title">BANDAR UDARA INTERNASIONAL JUANDA SURABAYA</h5>
          </div>
          <div class="col-4 text-right main-logo">
            <img src="{{ asset('logo/air.png') }}" alt="Angkasa Pura Airports Logo">
          </div>
        </div>
      </div>
      <div class="row">
         <div class="col-12">
        <div style="display: flex; width: 100%; margin-bottom: 1.5rem;">
            <div style="flex: 9; background-color: rgb(99, 176, 190); height: 50px;"></div>
            <div style="flex: 1; background-color: rgb(212, 105, 84); height: 50px;"></div>
            <div style="flex: 1; background-color: rgb(167, 189, 62); height: 50px;"></div>
            <div style="flex: 1; background-color: rgb(234, 174, 66); height: 50px;"></div>
        </div>
</div>
      </div>

      <div class="text-center"> <button id="btn-pdf" class="btn btn-primary btn-lg">Cetak PDF</button>
          <p class="current-time-display">
             {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY, HH:mm:ss') }} WIB
          </p>
      </div>


      <div class="row">
        <div class="col-md-4">
          <div class="card shadow-sm">
            <div class="card-header text-center bg-secondary text-white">
              <h3 class="card-title" style="margin: 0 auto;">PERFORMA TOTAL</h3>
            </div>
            <div class="card-body d-flex justify-content-center align-items: center" style="min-height: 220px;"> <div class="text-center">
                <p class="text-success performance-value"> <strong>{{ floor($percentageServiceable) }}%</strong>
                </p>
                <h5 class="performance-label">Persentase Kendaraan Serviceable</h5> </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card shadow-sm">
            <div class="card-header text-center bg-secondary text-white">
              <h3 class="card-title" style="margin: 0 auto;">PERFORMA KENDARAAN UTAMA PKP-PK</h3>
            </div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center" style="padding: 1rem;">
              <div class="text-center mb-2">
                <h4 style="font-size: 0.9rem; margin-bottom: 0.1rem;">JUMLAH KENDARAAN UTAMA PKP-PK</h4>
                <h2 class="text-success font-weight-bold" style="font-size: 1.5rem; margin-bottom: 0.5rem;">{{ $countvehicle_pkppk }} UNIT</h2>
              </div>
              <div class="text-center mb-2">
                <h4 style="font-size: 0.9rem; margin-bottom: 0.1rem;">TOTAL KAPASITAS AIR</h4>
                <h2 class="text-success font-weight-bold" style="font-size: 1.5rem; margin-bottom: 0.5rem;">{{ number_format($kategori, 0, ',', '.') }} Liter</h2>
              </div>
              <div class="text-center mb-1">
                <h4 class="font-weight-bold" style="font-size: 0.9rem;">CUKUP UNTUK MEMENUHI KATEGORI BANDARA :</h4>
              </div>
              <ul class="list-group list-group-flush text-center" style="width: 100%;">
                @php
                  $kategori_bandara = [
                    ['Kategori Bandara 10', 32300, 500000],
                    ['Kategori Bandara 9', 24300, 32299],
                    ['Kategori Bandara 8', 18200, 24299],
                    ['Kategori Bandara 7', 12100, 18199],
                    ['Kategori Bandara 6', 7900, 12099],
                    ['Kategori Bandara 5', 5400, 7899],
                    ['Kategori Bandara 4', 2400, 5399],
                    ['Kategori Bandara 3', 1200, 2399],
                    ['Kategori Bandara 2', 670, 1199],
                    ['Kategori Bandara 1', 230, 669],
                  ];
                  $foundCategory = false;
                @endphp
                @foreach ($kategori_bandara as $bandara)
                  @if ($kategori >= $bandara[1] && $kategori <= $bandara[2] && !$foundCategory)
                    <li class="list-group-item">
                      <h2 class="text-success font-weight-bold">{{ $bandara[0] }}</h2>
                    </li>
                    @php $foundCategory = true; @endphp
                  @endif
                @endforeach
                @if (!$foundCategory && $kategori > 0)
                  <li class="list-group-item">
                    <h2 class="text-warning font-weight-bold" style="font-size: 1.3rem;">
                      @if ($kategori > end($kategori_bandara)[2])
                        Di Atas Kategori 10
                      @elseif ($kategori < $kategori_bandara[count($kategori_bandara)-1][1])
                        Di Bawah Kategori 1
                      @else
                        Kategori Tidak Terdefinisi
                      @endif
                    </h2>
                  </li>
                @endif
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card shadow-sm">
            <div class="card-header text-center bg-secondary text-white">
              <h3 class="card-title" style="margin: 0 auto;">PERFORMA DETAIL</h3>
            </div>
           <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="120"></canvas>
                                </div>
                            </div>
                            <div class="col">
                                <ul class="chart-legend clearfix">
                                    <li> PKPPK: <strong>{{ $percent_ppkpk }}%</strong></li>
                                    <li> Crash Car: <strong>{{ $percent_crashcar }}%</strong></li>
                                    <li> Operasional: <strong>{{ $percent_operasional }}%</strong></li>
                                    <li> Alat Berat: <strong>{{ $percent_alatberat }}%</strong></li>
                                    <li> Peralatan: <strong>{{ $percent_peralatan }}%</strong></li>
                                    <li> Motor Dinas: <strong>{{ $percent_motordinas }}%</strong></li>
                                </ul>
                            </div>
                        </div>
                </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header"> <h3 class="card-title">TREND PERFORMA KENDARAAN</h3>
            </div>
            <div class="card-body">
                <div class="chart">
                  <canvas id="salesChart" style="min-height: 280px; height: 280px; max-height: 280px; width: 100%;"></canvas> </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">JUMLAH KESIAPAN KENDARAAN</h3>
            </div>
            <div class="card-body">
              @foreach ($total_klasifikasi as $index => $total)
                @php
                  $good_condition = $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)
                                                  ->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])
                                                  ->sum('total');
                  $unserviceable = $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)
                                                ->where('vehicle_condition', 'Unserviceable')
                                                ->sum('total');
                  $total_condition = $good_condition + $unserviceable;
                  $percentage = $total_condition > 0 ? ($good_condition / $total_condition) * 100 : 0;
                  $colors = ['bg-danger', 'bg-success', 'bg-warning', 'bg-info', 'bg-primary', 'bg-secondary'];
                  $color = $colors[$index % count($colors)];
                @endphp
                <div class="progress-group page-break-inside-avoid">
                  {{ $total->klasifikasi_kendaraan }}
                  <span class="float-right"><b>{{ $good_condition }}</b>/{{ $total_condition }}</span>
                  <div class="progress progress-sm">
                    <div class="progress-bar {{ $color }}" style="width: {{ $percentage }}%"></div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      
      <hr class="separator page-break-inside-avoid"> <table class="footer-section-table page-break-inside-avoid"> <tr>
          <td style="width: 60%;" class="lampiran-section"> <div class="header mt-3">
              <p>Terlampir:</p>
              <ol>
                <li>Detail Performance</li>
                <li>Laporan Kerusakan Kendaraan</li>
                <li>Jadwal Pemeliharaan Rutin (Checklist)</li>
                <li>Update Pekerjaan A2B</li>
              </ol>
            </div>
          </td>
          <td style="width: 40%;" class="signature-section"> <p>Bandara Internasional Juanda Surabaya</p>
            <p>{{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }}</p>
            <p style="margin-top:1rem !important;">Disetujui oleh:</p>
            <img src="{{ asset('tanda_tangan.png') }}" alt="Tanda Tangan">
            <p style="font-weight: bold; margin-top:0.5rem !important;">(Nama Pejabat)</p>
             <p style="font-size: 0.8rem !important;">(Jabatan Pejabat)</p> </td>
        </tr>
      </table>
    </div> 
    
    <div id="item1" class="page-break-before detail-page-container">
        <div class="card-header detail-page-title"> <h3 class="card-title">DETAIL PERFORMANCE</h3>
        </div>
        
        <div class="detail-section-title">
            <h3 class="card-title">FOAM TENDER (CRASH CAR)</h3>
        </div>
        <div class="card-body p-0">
            <div class="d-flex flex-wrap">
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-right: 5px; padding-left: 5px;">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicle_crashcar->take(ceil($vehicle_crashcar->count() / 2)) as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-left: 5px; padding-right: 5px;">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicle_crashcar->slice(ceil($vehicle_crashcar->count() / 2)) as $d)
                            <tr>
                                <td>{{$loop->iteration + ceil($vehicle_crashcar->count() / 2)}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="detail-section-title">
            <h3 class="card-title">KENDARAAN PKP-PK</h3>
        </div>
        <div class="card-body p-0">
            <div class="d-flex flex-wrap">
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-right: 5px; padding-left: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_ppkpk->take(ceil($vehicle_ppkpk->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-left: 5px; padding-right: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_ppkpk->slice(ceil($vehicle_ppkpk->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration + ceil($vehicle_ppkpk->count()/2)}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="detail-section-title">
            <h3 class="card-title">ALAT-ALAT BERAT</h3>
        </div>
        <div class="card-body p-0">
            <div class="d-flex flex-wrap">
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-right: 5px; padding-left: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_alatberat->take(ceil($vehicle_alatberat->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-left: 5px; padding-right: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_alatberat->slice(ceil($vehicle_alatberat->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration + ceil($vehicle_alatberat->count()/2)}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    
    <div id="item2" class="page-break-before detail-page-container">
        <div class="detail-section-title" style="margin-top:1.5rem;"> <h3 class="card-title">KENDARAAN OPERASIONAL</h3>
        </div>
        <div class="card-body p-0">
            <div class="d-flex flex-wrap">
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-right: 5px; padding-left: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_operasional->take(ceil($vehicle_operasional->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-left: 5px; padding-right: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_operasional->slice(ceil($vehicle_operasional->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration + ceil($vehicle_operasional->count()/2)}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="detail-section-title">
            <h3 class="card-title">SEPEDA MOTOR DINAS</h3>
        </div>
        <div class="card-body p-0">
            <div class="d-flex flex-wrap">
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-right: 5px; padding-left: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_motordinas->take(ceil($vehicle_motordinas->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-left: 5px; padding-right: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Kendaraan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_motordinas->slice(ceil($vehicle_motordinas->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration + ceil($vehicle_motordinas->count()/2)}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="detail-section-title">
            <h3 class="card-title">PERALATAN LAINNYA</h3>
        </div>
        <div class="card-body p-0">
            <div class="d-flex flex-wrap">
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-right: 5px; padding-left: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Peralatan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_peralatan->take(ceil($vehicle_peralatan->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive" style="flex: 1 1 50%; min-width: 300px; padding-left: 5px; padding-right: 5px;">
                    <table class="table table-bordered m-0">
                        <thead><tr><th>No</th><th>Nama Peralatan</th><th>User</th><th>Status</th></tr></thead>
                        <tbody>
                            @foreach ($vehicle_peralatan->slice(ceil($vehicle_peralatan->count()/2)) as $d)
                            <tr>
                                <td>{{$loop->iteration + ceil($vehicle_peralatan->count()/2)}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 

    <div id="item3" class="page-break-before detail-page-container">
        <div class="card-header detail-page-title">
            <h3 class="card-title">LAPORAN KERUSAKAN KENDARAAN</h3>
        </div>
        <div class="card-body p-0"> <div class="table-responsive">
                <table class="table table-bordered table-striped m-0"> <thead>
                    <tr><th>No</th><th>Nama Peralatan</th><th>Kondisi</th><th>Bagian</th><th>Tindakan</th><th>Tgl Prediksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($vehicle as $d) 
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $d->vehicle_name }}</td>
                        <td><span class="badge {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">{{ $d->vehicle_condition }}</span></td>
                        <td>{{ $d->bagian }}</td>
                        <td>{{ $d->tindakan}}</td>
                        <td>{{ \Carbon\Carbon::parse($d->tanggal_prediksi)->isoFormat('D MMM YYYY') }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="text-center p-3">Tidak ada laporan kerusakan.</td></tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div> 

    <div id="item4" class="page-break-before detail-page-container">
        <div class="card-header detail-page-title">
            <h3 class="card-title">JADWAL CHECKLIST KENDARAAN</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped m-0"> <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 20%;">Nama Peralatan</th>
                        <th style="width: 15%;">Tipe</th>
                        <th style="width: 15%;">No Polisi</th>
                        <th style="width: 15%;">User</th>
                        <th style="width: 15%;">Tgl Cek</th>
                        <th style="width: 10%;">PIC</th>
                        <th style="width: 10%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($checklist as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->tugas }}</td>
                        <td>{{ $d->vehicle_type }}</td>
                        <td>{{ $d->no_polisi }}</td>
                        <td>{{ $d->user_peralatan }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->tanggal)->isoFormat('D MMM YYYY') }}</td>
                        <td>{{ $d->name }}</td>
                        <td>
                            <span class="badge {{ $d->is_completed == '1' ? 'badge-success' : ($d->is_completed == '0' ? 'badge-danger' : 'badge-warning') }}">
                                {{ $d->is_completed == '1' ? 'Selesai' : ($d->is_completed == '0' ? 'Belum' : 'N/A') }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center p-3">Tidak ada jadwal checklist.</td></tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div> 
    
    <div id="item5" class="page-break-before detail-page-container">
        <div class="card-header detail-page-title">
            <h3 class="card-title">PROGRES PEKERJAAN A2B</h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped m-0"> <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Pekerjaan</th>
                        <th style="width: 15%; text-align:right;">Nilai</th> <th style="width: 15%;">Vendor</th>
                        <th style="width: 10%;">GL Acc</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">No PO</th>
                        <th style="width: 10%;">No BAST</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pekerjaana2b as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->pekerjaan }}</td>
                        <td style="text-align:right;">{{ number_format($d->nilai_pekerjaan, 0, ',', '.') }}</td>
                        <td>{{ $d->vendor }}</td>
                        <td>{{ $d->glaccount }}</td>
                        <td>{{ $d->status}}</td>
                        <td>{{ $d->no_po}}</td>
                        <td>{{ $d->no_bast}}</td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="text-center p-3">Tidak ada progres pekerjaan A2B.</td></tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div> 
  </section> 

<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('lte/dist/js/adminlte.js')}}"></script>
<script src="{{asset('lte/plugins/chart.js/Chart.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>


<script>
// ========================================================================= //
// ========= SCRIPT BARU UNTUK MEMBUAT DAN MENGUNGGAH PDF ================== //
// ========================================================================= //
document.addEventListener('DOMContentLoaded', function () {
    // --- Inisialisasi Chart.js (TIDAK BERUBAH) ---
    var pieChartCanvas = document.getElementById('pieChart');
    if (pieChartCanvas) {
        var pieCtx = pieChartCanvas.getContext('2d');
        var pieData = {
            datasets: [{
                data: [
                    {{ $percent_ppkpk ?? 0 }}, {{ $percent_crashcar ?? 0 }}, {{ $percent_operasional ?? 0 }},
                    {{ $percent_alatberat ?? 0 }}, {{ $percent_peralatan ?? 0 }}, {{ $percent_motordinas ?? 0 }}
                ],
                backgroundColor: [
                    'rgba(220, 53, 69, 0.9)', 'rgba(40, 167, 69, 0.9)', 'rgba(255, 193, 7, 0.9)',
                    'rgba(23, 162, 184, 0.9)', 'rgba(0, 123, 255, 0.9)', 'rgba(108, 117, 125, 0.9)'
                ],
                borderWidth: 1
            }]
        };
        new Chart(pieCtx, {
            type: 'pie',
            data: pieData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = ['PKPPK', 'Crash Car', 'Operasional', 'Alat Berat', 'Peralatan', 'Motor Dinas'][context.dataIndex] || '';
                                var value = context.raw || 0;
                                return label + ': ' + value + '%';
                            }
                        }
                    }
                }
            }
        });
    }

    var salesChartCanvas = document.getElementById('salesChart');
    if (salesChartCanvas) {
        var salesCtx = salesChartCanvas.getContext('2d');
        var salesData = {
            labels: [
                @foreach($total_klasifikasi as $total) '{{ $total->klasifikasi_kendaraan }}', @endforeach
            ],
            datasets: [{
                label: 'Serviceable',
                data: [
                    @foreach($total_klasifikasi as $total)
                        {{ $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->sum('total') ?? 0 }},
                    @endforeach
                ],
                borderColor: 'rgba(40, 167, 69, 1)',
                backgroundColor: 'rgba(40, 167, 69, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }, {
                label: 'Unserviceable',
                data: [
                    @foreach($total_klasifikasi as $total)
                        {{ $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)->where('vehicle_condition', 'Unserviceable')->sum('total') ?? 0 }},
                    @endforeach
                ],
                borderColor: 'rgba(220, 53, 69, 1)',
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        };
        var salesOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { title: { display: true, text: 'Klasifikasi Kendaraan' }, ticks: { autoSkip: false, maxRotation: 45, minRotation: 30 } },
                y: { title: { display: true, text: 'Jumlah Kendaraan' }, ticks: { beginAtZero: true, stepSize: 1 } }
            },
            plugins: {
                legend: { position: 'top' },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.dataset.label + ': ' + context.raw + ' Kendaraan';
                        }
                    }
                }
            }
        };
        new Chart(salesCtx, { type: 'line', data: salesData, options: salesOptions });
    }
});


// --- Event Listener untuk Tombol PDF dengan Perbaikan ---
document.getElementById('btn-pdf').addEventListener('click', async function () {
    const btn = this;
    const originalText = btn.innerHTML;
    // Dapatkan referensi elemen lain yang ingin disembunyikan
    const timeDisplay = document.querySelector('.current-time-display');
    
    // Memberi feedback visual ke pengguna
    btn.disabled = true;
    btn.innerHTML = 'Membuat PDF...';

    // (PERBAIKAN 1) Sembunyikan elemen sebelum rendering
    btn.style.display = 'none';
    if(timeDisplay) timeDisplay.style.display = 'none';
    
    document.body.classList.add('pdf-generating');

    const marginTop = 10, marginLeft = 10, marginRight = 10, marginBottom = 10;
    const pdf = new jspdf.jsPDF('p', 'mm', 'a4');
    
    const html2canvasOptions = {
        scale: 1.5,
        useCORS: true,
        logging: false,
        windowWidth: 1200,
    };

    try {
        const dashboardElement = document.getElementById('dashboard');
        // `await` memastikan proses render selesai sebelum lanjut
        const canvas = await html2canvas(dashboardElement, html2canvasOptions);
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        
        let imgWidth = pageWidth - marginLeft - marginRight;
        let imgHeight = (canvas.height * imgWidth) / canvas.width;
        let imgX = (pageWidth - imgWidth) / 2;
        let imgY = marginTop;
        
        const imgData = canvas.toDataURL('image/jpeg', 0.75);
        pdf.addImage(imgData, 'JPEG', imgX, imgY, imgWidth, imgHeight);

        for (let i = 1; i <= 5; i++) {
            const cardElement = document.getElementById(`item${i}`);
            if (cardElement) {
                // Tampilkan progres di console, bukan di tombol
                console.log(`Memproses Halaman ${i+1}...`);
                pdf.addPage();
                const cardCanvas = await html2canvas(cardElement, html2canvasOptions);
                
                let cardImgWidth = pageWidth - marginLeft - marginRight;
                let cardImgHeight = (cardCanvas.height * cardImgWidth) / cardCanvas.width;
                let cardImgX = (pageWidth - cardImgWidth) / 2;
                let cardImgY = marginTop;

                if (cardImgHeight > pageHeight - marginTop - marginBottom) {
                    cardImgHeight = pageHeight - marginTop - marginBottom;
                    cardImgWidth = (cardCanvas.width * cardImgHeight) / cardCanvas.height;
                    cardImgX = (pageWidth - cardImgWidth) / 2;
                }

                const cardImgData = cardCanvas.toDataURL('image/jpeg', 0.75);
                pdf.addImage(cardImgData, 'JPEG', cardImgX, cardImgY, cardImgWidth, cardImgHeight);
            }
        }
        
        // Tampilkan progres unggah di console
        console.log('Mengunggah PDF...');

        const pdfData = pdf.output('datauristring');
        
        const response = await fetch('/admin/dashboard/upload-pdf', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ pdf_data: pdfData })
        });
        
        const result = await response.json();

        if (response.ok && result.success) {
            alert('Sukses! ' + result.message);
        } else {
            throw new Error(result.message || 'Gagal mengunggah PDF.');
        }

    } catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan. Silakan cek konsol browser untuk detailnya.');
    } finally {
        // (PERBAIKAN 2) Kembalikan semua ke keadaan semula
        btn.style.display = 'block';
        if(timeDisplay) timeDisplay.style.display = 'block';
        
        btn.disabled = false;
        btn.innerHTML = originalText;
        document.body.classList.remove('pdf-generating');
    }
});
</script>
</body>
</html>