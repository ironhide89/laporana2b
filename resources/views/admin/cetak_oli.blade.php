<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MechaSafe Print BA RELEASE</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      font-size: 17px;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .centered-content {
      text-align: center;
      margin: 20px 0;
    }

    .centered-content img {
      width: 150px;
      height: auto;
    }

    .form-title {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      margin-top: 10px;
    }

    .content {
      margin: 20px;
    }

    .info-table {
      width: 100%;
      margin: 20px 0;
      border-collapse: collapse;
    }

    .info-table td {
      padding: 8px;
      vertical-align: top;
      text-align: left;
    }

    .info-table td:first-child {
      width: 40%;
      font-weight: bold;
    }

    .dashed-line {
      border-top: 2px dashed #333;
      margin: 20px 0;
    }

    .section-title {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      text-align: center;
      margin: 30px 0 10px;
    }

    .signature-section {
      margin-top: 50px;
      text-align: left;
    }

    .signature-name {
      margin-top: 40px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <table  style="width: 100%; border: none;">
    <tr>
      <td style="text-align: left; font-size: 35px;">
        <strong>FORM REKOMENDASI PERGANTIAN OLI</strong>
      </td>
      <td style="text-align: right;">
        <img style="width: 150px; height: auto;" src="{{ public_path('logo/air.png') }}" alt="Logo">
      </td>
    </tr>
  </table>
  
  <BR>
    <table width="100%" cellspacing="0" cellpadding="5">
      <tr>
          <td style="width: 75%; background-color: rgb(99, 176, 190); color: white; height: 20px;">BANDAR UDARA INTERNASIONAL JUANDA</td>
          <td style="width: 8.33%; background-color: rgb(212, 105, 84); height: 20px;"></td>
          <td style="width: 8.33%; background-color: rgb(167, 189, 62); height: 20px;"></td>
          <td style="width: 8.33%; background-color: rgb(234, 174, 66); height: 20px;"></td>
      </tr>
  </table>
  <br>

  <div class="content">
    <div class="dashed-line"></div>

    <!-- Info Section -->
    <table class="info-table">
      <tr>
        <td>Tanggal</td>
        <td>{{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}</td>
      </tr>
      <tr>
        <td>User</td>
        <td>{{ $vehicle->user_peralatan }}</td>
      </tr>
      <tr>
        <td>Kendaraan / Peralatan</td>
        <td>{{ $oli->vehicle_name }}</td>
      </tr>
    </table>

   

    <!-- Kilometer Section -->
    @if($oli->kategori_oli === 'oli mesin')
    <div class="dashed-line"></div>
    <table class="info-table">
      <tr>
        <td>Kilometer Sekarang</td>
        <td>{{ $oli->odo_meter }}</td>
      </tr>
      <tr>
        <td>Kilometer Pergantian</td>
        <td>{{ $oli->oli_selanjutnya }}</td>
      </tr>
      <tr>
        <td>Selisih / Kelebihan</td>
        <td>{{ $oli->odo_meter && $oli->oli_selanjutnya ? $oli->odo_meter - $oli->oli_selanjutnya : '-' }}</td>
      </tr>
    </table>
    @endif

    <div class="dashed-line"></div>

    <!-- Oil Info Section -->
    <table class="info-table">
      <tr>
        <td>Bulan Pergantian Terakhir</td>
        <td>{{ \Carbon\Carbon::parse($oli->tanggal_oli)->locale('id')->translatedFormat('l, d F Y') }}</td>
      </tr>
      <tr>
        <td>Jenis Oli</td>
        <td>{{ $oli->jenis_oli }}</td>
      </tr>
      <tr>
        <td>Volume Oli</td>
        <td>{{ $oli->volume_oli }} Liter</td>
      </tr>
    </table>

    <div class="dashed-line"></div>

    <!-- Remarks Section -->
    <div class="section-title">KETERANGAN</div>
    @if($oli->kategori_oli === 'oli mesin')
  
    <p>Oli telah melewati {{ $oli->odo_meter && $oli->oli_selanjutnya ? $oli->odo_meter - $oli->oli_selanjutnya : '-' }} KM.</p>
    <div class="dashed-line"></div>
  @endif
  

    <!-- Signature Section -->
    <div class="signature-section">
      <p>Teknisi</p>
      <BR>
        <BR>
      <p class="signature-section">Muhammad Sidiq W. P</p>
    </div>
  </div>
</body>
</html>
