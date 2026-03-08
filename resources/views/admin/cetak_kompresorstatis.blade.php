<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>

<style>
    .table-borderless {
        width: 100%;
        border-collapse: collapse;
    }

    .table-borderless th, .table-borderless td {
        padding: 4px 8px;
        text-align: left;
        vertical-align: top;
        border: 1px solid #ccc; /* menambahkan border untuk cetakan */
    }

    .border-left {
        border-left: 1px solid #ccc;
    }

    th, td {
        font-size: 12px; /* ukuran font lebih kecil untuk lebih banyak muatan dalam halaman PDF */
    }

    @media print {
        .table-borderless {
            margin: 0;
            padding: 0;
            font-size: 10px; /* sesuaikan ukuran font saat dicetak */
        }
    }
</style>


<body>
    <table style="width: 100%; border: none;">
        <tr>
          <td style="text-align: left; font-size: 50px;">
            <strong>INSPECTION REPORT</strong>
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
              <div style="text-align: left">HEAVY EQUIPMENT</div>
            </div>
          </div>
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

   <!-- Info row -->
<table class="table" style="width: 100%;">
    <tr>
        <!-- Kolom Kiri -->
        <td style="width: 33%;">
            <strong>TANGGAL</strong><br>
            <span>{{ \Carbon\Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('l, d F Y \p\u\k\u\l H.i') }}</span>
            <br><br>
            <strong>TEKNISI PELAKSANA</strong><br>
            <span>{{ $vehicle->user }}</span>
        </td>

        <!-- Kolom Tengah (Foto Kendaraan) -->
        <td style="width: 33%; text-align: center;">
           
        </td>

        <!-- Kolom Kanan -->
        <td style="width: 33%;">
            <strong>KENDARAAN</strong><br>
            <span>{{ $vehicle->vehicle_name }}</span>
            <br><br>
            <strong>USER KENDARAAN</strong><br>
            <span>{{ $kendaraan->user_peralatan }}</span>
        </td>
    </tr>
</table>

<br>


<br>


    <!-- /.row -->

      <div style="text-align: center">
        <hr>
        <b>PENGECEKAN ENGINE OFF</b>
      </div>
    <br>

    <!-- Table row -->
        <table class="table table-borderless" style="width: 100%;">
              <thead>
                  <tr>
                      <th class="border-left">No</th>
                      <th>Pengecekan</th>
                      <th>Hasil Pengecekan</th>
                      <th class="border-left">No</th>
                      <th>Pengecekan</th>
                      <th>Hasil Pengecekan</th>
                  </tr>
              </thead>
              <tbody>
                <tbody>
                    <tr>
                        <td class="border-left">1</td>
                        <td>Odometer / Running Hour</td>
                        <td>{{ $vehicle->odometer }} KM</td>
                        <td class="border-left">2</td>
                        <td>Kebersihan Kendaraan</td>
                        <td>{{ $vehicle->kebersihan_kendaraan }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">3</td>
                        <td>Body Kendaraan</td>
                        <td>{{ $vehicle->body_kendaraan }}</td>
                        <td class="border-left">4</td>
                        <td>Filter Oli</td>
                        <td>{{ $vehicle->filter_oli }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">5</td>
                        <td>Filter Udara</td>
                        <td>{{ $vehicle->filter_udara }}</td>
                        <td class="border-left">6</td>
                        <td>Filter Air Dryer</td>
                        <td>{{ $vehicle->filter_air_drayer }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">7</td>
                        <td>Filter Water Separator</td>
                        <td>{{ $vehicle->filter_water_sparator }}</td>
                        <td class="border-left">8</td>
                        <td>Filter Hidrolis</td>
                        <td>{{ $vehicle->filter_hidrolis }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">9</td>
                        <td>V-Belt Kompresor</td>
                        <td>{{ $vehicle->v_belt_kompresor }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>                    
          </table>
  

      <!-- /.row -->
      <div class="row justify-content-center">
        <div class="col text-center p-2" style="text-align: center">
          <hr>
          <b>PENGECEKAN ENGINE ON</b>
        </div>
      </div>
      <br>
      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-borderless" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="border-left">No</th>
                        <th>Pengecekan</th>
                        <th>Hasil Pengecekan</th>
                        <th class="border-left">No</th>
                        <th>Pengecekan</th>
                        <th>Hasil Pengecekan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-left">1</td>
                        <td>Starter Engine</td>
                        <td>{{ $vehicle->starter_engine }}</td>
                        <td class="border-left">2</td>
                        <td>Kondisi Engine</td>
                        <td>{{ $vehicle->kondisi_engine }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">3</td>
                        <td>Air Drayer</td>
                        <td>{{ $vehicle->airdrayer }}</td>
                        <td class="border-left">4</td>
                        <td>Electrical System</td>
                        <td>{{ $vehicle->electrical_system }}</td>
                    </tr>
                </tbody>                              
            </table>
        </div>
        <!-- /.col -->
     </div>
      <!-- /.row -->
      <div class="row justify-content-center">
        <div class="col text-center p-2" style="text-align: center">
            <hr>
            <b>PENGECEKAN LAMPU</b>
        </div>
      </div>
      <br>
      <div class="row justify-content-center">
        <div class="col text-center p-2" style="text-align: center">
            <b>Tidak Ada </b>
        </div>
      </div>

            <!-- /.row -->
            <div class="row justify-content-center">
              <div class="col text-center p-2"style="text-align: center">
                  <hr>
                  <b>PENGECEKAN CABIN</b>
              </div>
            </div>
      <br>
            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-borderless" style="width: 100%;">
                      <thead>
                          <tr>
                              <th class="border-left">No</th>
                              <th>Pengecekan</th>
                              <th>Hasil Pengecekan</th>
                              <th class="border-left">No</th>
                              <th>Pengecekan</th>
                              <th>Hasil Pengecekan</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td class="border-left">1</td>
                            <td>Indikator Dashboard</td>
                            <td>{{ $vehicle->indikator_dashboard }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>                                 
                  </table>
              </div>
              <!-- /.col -->
          </div>
          

    
        <!-- /.row -->
        <div class="row justify-content-center">
          <div class="col text-center p-2" style="text-align: center">
            <hr>
            <b>PENGECEKAN BAN</b>
          </div>
        </div>
        <br>

        <!-- Table row -->
        <div class="row justify-content-center">
            <div class="col text-center p-2" style="text-align: center">
                <b>Tidak Ada </b>
            </div>
          </div>    

      <div class="row justify-content-center">
        <div class="col text-center p-2" style="text-align: center">
          <hr>
          <b>PENGECEKAN PERALATAN KHUSUS</b>
        </div>
      </div>
      <br>

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-borderless" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="border-left">No</th>
                        <th>Pengecekan</th>
                        <th>Hasil Pengecekan</th>
                        <th class="border-left">No</th>
                        <th>Pengecekan</th>
                        <th>Hasil Pengecekan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-left">1</td>
                        <td>Oli Kompresor</td>
                        <td>{{ $vehicle->oli_kompresor }}</td>
                        <td class="border-left">2</td>
                        <td>Fungsi Screw Kompresor</td>
                        <td>{{ $vehicle->fungsi_screw_kompresor }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">3</td>
                        <td>Fungsi Cut Off Pressure</td>
                        <td>{{ $vehicle->fungsi_cut_off_pressure }}</td>
                        <td class="border-left">4</td>
                        <td>Fungsi Drayer</td>
                        <td>{{ $vehicle->fungsi_drayer }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">5</td>
                        <td>Fungsi Auto Start</td>
                        <td>{{ $vehicle->fungsi_auto_start }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <!-- /.col -->
    </div>
<br>
          <div style="text-align: center">
            <hr>
            <b>KESIMPULAN KENDARAAN</b>
          </div>

          
          <div style="text-align: center">
            <h>{{$vehicle->kesimpulan_kendaraan}}</h>
          </div>

        <div class="row justify-content-center">
          <div class="col text-left p-3">
              <hr>
              <b>CATATAN :</b>
              <p>{{ $vehicle->catatan }}</p> <!-- Menampilkan catatan di bawah garis -->
          </div>
      </div>



      <div style="text-align: center">
        <hr>
        <b>DOKUMENTASI</b>
      </div>

      <div class="row justify-content-center">
        <div class="col text-center p-1">
            <hr>
            <br>
            @if ($vehicle->foto_kendaraan)
                @php
                    // Memecah string jika ada lebih dari satu foto
                    $fotoArray = explode(',', $vehicle->foto_kendaraan);
                @endphp
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                    <tr>
                        @foreach ($fotoArray as $foto)
                            <td style="border: 1px solid #ccc; padding: 5px; text-align: left;">
                                <img src="{{ public_path('pemeliharaan/' . trim($foto)) }}" alt="Foto Kendaraan" style="width: 100px; height: 100px; object-fit: cover;">
                            </td>
                            @if ($loop->iteration % 3 == 0)
                                </tr><tr> <!-- Membuat baris baru setiap 3 foto -->
                            @endif
                        @endforeach
                    </tr>
                </table>
            @else
                <p>Tidak ada foto tersedia.</p>
            @endif
        </div>
    </div>
    
    </div>


    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 50%; padding: 10px; vertical-align: top; text-align: left;">
                <b>Surabaya, {{ \Carbon\Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') }}</b>
                <div style="margin-top: 10px"><b>User Kendaraan:</b></div>
                <div style="">
                    <img src="{{ $vehicle->approval }}" alt="Vehicle Approval Image" style="width: 150px; height: auto; margin-top: 10px;" />
                </div>
                <div style="margin-top: 10px; vertical-align: bottom;">
                    <b>{{ $vehicle->user_kendaraan }}</b>
                </div>
            </td>
            
            <td style="width: 50%; padding: 10px; vertical-align: top; text-align: right;">
                  <br>
                <b>Teknisi A2B</b>
                <br><br>
                @if ($user && $user->tanda_tangan)
                    <img src="{{ public_path('tanda_tangan/' . $user->tanda_tangan) }}" alt="Tanda Tangan" style="width: 100px; height: 100px; object-fit: cover; border-radius: 10px;">
                @endif
                <div style="margin-top: 10px; vertical-align: bottom;">
                    <b>{{ $vehicle->user }}</b>
                </div>
            </td>
        </tr>
    </table>
    
    
    
  
  
  
      
        

    
    <!-- /.row -->

    
    
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->

</body>
</html>
