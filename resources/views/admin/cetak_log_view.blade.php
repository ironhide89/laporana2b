<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log Activity Print</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">

  <style>
    .table-borderless {
        width: 100%;
        border-collapse: collapse;
    }

    .table-borderless th, .table-borderless td {
        padding: 4px 8px;
        text-align: left;
        vertical-align: top;
        border: 1px solid #ccc;
    }

    .border-left {
        border-left: 1px solid #ccc;
    }

    th, td {
        font-size: 12px;
    }

    .page-break {
        page-break-before: always;
    }

    @media print {
        .table-borderless {
            margin: 0;
            padding: 0;
            font-size: 10px;
        }
        table {
            page-break-inside: avoid; /* Table tidak terpotong */
        }
    }
  </style>
</head>

<body>
  <table style="width: 100%; border: none;">
    <tr>
      <td style="text-align: left; font-size: 50px;">
        <strong>LOG ACTIVITY</strong>
      </td>
      <td style="text-align: right;">
        <img style="width: 150px; height: auto;" src="{{ public_path('logo/air.png') }}" alt="Logo">
      </td>
    </tr>
  </table>
  
  <div class="wrapper">
    <section class="invoice">
      <div class="row">
        <div class="col-12">
          <div style="text-align: left">AIRPORT EQUIPMENT</div>
        </div>
      </div>
      <br>

      <table width="100%" cellspacing="0" cellpadding="5">
        <tr>
          <td style="width: 75%; background-color: rgb(99, 176, 190); color: white; height: 20px;">
            BANDAR UDARA INTERNASIONAL JUANDA
          </td>
          <td style="width: 8.33%; background-color: rgb(212, 105, 84); height: 20px;"></td>
          <td style="width: 8.33%; background-color: rgb(167, 189, 62); height: 20px;"></td>
          <td style="width: 8.33%; background-color: rgb(234, 174, 66); height: 20px;"></td>
        </tr>
      </table>

      <br>

      <table style="width: 100%;">
        <tr>
          <td style="text-align: left; vertical-align: top;">
            <strong>TANGGAL</strong><br>
            {{ \Carbon\Carbon::parse($tanggal)->locale('id')->translatedFormat('j F Y') }}<br><br>
            <strong>TEKNISI PELAKSANA</strong><br>
            {{ $teknisiName }}
          </td>

          <td style="text-align: right; vertical-align: top;">
            <strong>TEKNISI DINAS</strong><br>
            {{ $dinasName }}<br><br>

             <strong>CHECK LIST</strong><br>
            {{-- MODIFIKASI BAGIAN CHECKLIST --}}
            @if($checklist->isEmpty())
                Tidak ada checklist.
            @else
                @foreach($checklist as $item)
                    {{ $item->checklist }}<br> {{-- Ditambahkan <br> di sini --}}
                @endforeach
            @endif
            {{-- AKHIR MODIFIKASI --}}
          </td>
        </tr>
      </table>

      <!-- MULAI Kegiatan di halaman baru -->
      <div class="page-break"></div>

      <div>
        @if ($logbooks->isEmpty())
          <div class="text-center mt-5" style="font-size: 24px; text-align:center">
            Standby Operasional
          </div>
        @else
          @foreach ($logbooks as $count => $logbook)
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">

              <tr>
                <th colspan="2" style="font-size: 30px; text-align: center; padding: 10px;">
                  KEGIATAN {{ $count + 1 }}
                </th>
              </tr>

              <tr>
               <td style="width: 50%; padding: 8px;">
                <strong>TANGGAL DAN JAM KEGIATAN</strong><br>
                {{ \Carbon\Carbon::parse($logbook->created_at)->locale('id')->translatedFormat('j F Y \j\a\m H.i') }} WIB
                </td>
                <td style="width: 50%; padding: 8px;">
                  <strong>KENDARAAN</strong><br>
                  {{ $logbook->vehicle_name }}
                </td>
              </tr>

              <tr>
                <td colspan="2" style="padding: 8px;">
                  <strong>Uraian Kegiatan</strong>
                  <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    @php
                      $kegiatanArray = explode(',', $logbook->kegiatan);
                    @endphp
                    @foreach ($kegiatanArray as $kegiatan)
                      <div style="flex: 0 1 calc(50% - 10px);">
                        <label>{{ trim($kegiatan) }}</label>
                      </div>
                    @endforeach
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan="2" style="padding: 8px; text-align: center;">
                  <strong>Foto Kegiatan</strong><br>
                  @if ($logbook->foto_kendaraan)
                    @php
                      $fotoArray = explode(',', $logbook->foto_kendaraan);
                    @endphp
                    <table style="width: 100%;">
                      <tr>
                        @foreach ($fotoArray as $foto)
                          <td style="padding: 10px; text-align: left;">
                            @if(file_exists(public_path('logbook/' . trim($foto))))
                              <img src="{{ public_path('logbook/' . trim($foto)) }}" 
                                alt="Foto Kendaraan" 
                                style="width: 120px; height: 120px; object-fit: cover;">
                            @else
                              <p>Foto {{ trim($foto) }} tidak ditemukan.</p>
                            @endif
                          </td>

                          @if (($loop->index + 1) % 3 == 0)
                            </tr><tr> <!-- Baris baru tiap 3 foto -->
                          @endif
                        @endforeach
                      </tr>
                    </table>
                  @else
                    <p>Tidak ada foto tersedia.</p>
                  @endif
                </td>              
              </tr>
            </table>

            @if (!$loop->last)
              <div class="page-break"></div> <!-- Break antar kegiatan -->
            @endif

          @endforeach
        @endif
      </div>

    </section>
  </div>

  {{-- <script>
    window.addEventListener("load", function() {
      window.print();
    });
  </script> --}}
</body>
</html>
