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
   

    .page-header {
      font-size: 26px;
      text-align: center;
      color: #333;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .centered-text {
      display: flex;
      justify-content: center;
      font-weight: bold;
      font-size: 20px;
      margin-top: 10px;
    }

    .dashed-line {
      border-top: 2px dashed #333;
      width: 100%;
      margin: 15px 0;
    }

    .table {
      margin-top: 20px;
      width: 100%;
      border-collapse: collapse;
    }

    .table th, .table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: left;
    }

    .table th {
      background-color: #f0f0f0;
      color: #333;
      font-weight: bold;
      text-transform: uppercase;
    }

    .invoice-info {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .invoice-info div {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
    }

    .info-item2 {
      float: right;
    }

    .info-item1 {
      float: left;
    }

    .photo-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 20px;
    }

    .photo-container img {
      width: 120px;
      height: auto;
      margin: 10px;
      border: 1px solid #ddd;
      padding: 5px;
      background: #f9f9f9;
    }

    .section-title {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      text-align: center;
      margin: 30px 0 10px;
    }

    .signature-section {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
      text-align: center;
    }

    .signature-placeholder {
      margin-top: 130px;
      text-align: center;
    }

    .print-row {
      background-color: #4682B4;
      color: white;
      padding: 10px;
    }

    @media print {
      .print-row {
        background-color: #4682B4 !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
      }
    }
  </style>
</head>

<body>
  <table style="width: 100%; border: none;">
    <tr>
      <td style="text-align: left; font-size: 35px;">
        <strong>BERITA ACARA KERUSAKAN</strong>
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

  <div class="wrapper">
    <section class="invoice">
      <!-- Title row -->
      <div class="row">
        <div class="col-12">
          <!-- Centered BA No -->
          <div style="text-align: center">BA NO: {{$kerusakan->no_ba}}</div>
          <div class="dashed-line"></div>
        </div>
      </div>

      <!-- Info row -->
      <div>
        <table style="width: 100%; border: none;">
          <tr>
            <td style="text-align: left"><strong>Unit:</strong> Airport Equipment</td>
            <td style="text-align: right"><strong>Tanggal Kerusakan:</strong> {{ \Carbon\Carbon::parse($kerusakan->tanggal_kerusakan)->locale('id')->translatedFormat('l, d F Y') }}</td>
          </tr>
          <tr>
            <td><strong>Nama Peralatan:</strong> {{$kerusakan->vehicle_name}}</td>
            <td style="text-align: right"><strong>Fasilitas:</strong> HEAVY EQUIPMENT</td>
          </tr>
        </table>
      </div>

      <!-- Table -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Bagian</th>
            <th>Penyebab Kerusakan</th>
            <th>Klasifikasi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              @foreach(explode("\n", $kerusakan->bagian) as $item)
                <p>{{ $item }}</p>
              @endforeach
            </td>
            <td>{{$kerusakan->penyebab}}</td>
            <td>{{$kerusakan->klasifikasi}}</td>
          </tr>
        </tbody>
      </table>

      <!-- Dokumentasi Section -->
      <div class="section-title">DOKUMENTASI BERITA ACARA KERUSAKAN</div>
      <div class="dashed-line"></div>

      <table style="width: 50%; border: none;">
        @if ($kerusakan->foto_kerusakan)
          @php
            $fotoArray = explode(',', $kerusakan->foto_kerusakan);
            $fotoCount = count($fotoArray);
          @endphp
          @for ($i = 0; $i < $fotoCount; $i++)
            @if ($i % 4 == 0)
              <tr> <!-- Memulai baris baru setelah 4 gambar -->
            @endif
            <td style="text-align: left; width: 25%; padding: 5px;">
              <img src="{{ public_path('foto_kerusakan/' . trim($fotoArray[$i])) }}" alt="Foto Kendaraan" style="width: 70px; height: auto; border: 1px solid #ddd; background: #f9f9f9;">
            </td>
            @if (($i + 1) % 4 == 0 || $i + 1 == $fotoCount)
              </tr> <!-- Menutup baris setelah 4 gambar atau pada gambar terakhir -->
            @endif
          @endfor
        @else
          <tr>
            <td colspan="4" style="text-align: center;">Tidak ada foto tersedia.</td>
          </tr>
        @endif
      </table>

      <br>
      <br>

      <!-- Signature Section -->
      <table style="width: 100%; border: none;">
        <tr>
          <td style="text-align: left; font-size: 12px;">
            Mengetahui :<br>
            AIRPORT EQUIPMENT MANAGER<br><br><br>
          </td>
          <td style="text-align: center; font-size: 12px;">
            Sidoarjo, {{ \Carbon\Carbon::parse($kerusakan->tanggal_perbaikan)->locale('id')->translatedFormat('l, d F Y ') }}<br>
            Pemakai Fasilitas<br><br><br>
          </td>
          <td style="text-align: center; font-size: 12px;">
            Pengawas Lapangan<br><br><br>
          </td>
        </tr>
        <tr>
          <td style="text-align: left; padding-top: 30px; font-size: 12px;">-----------------------------------------</td>
          <td style="text-align: center; padding-top: 30px; font-size: 12px;">--------------------------------------</td>
          <td style="text-align: center; padding-top: 30px; font-size: 12px;">MUHAMMAD SIDIQ W. P</td>
        </tr>
      </table>
    </section>
  </div>
</body>
</html>
