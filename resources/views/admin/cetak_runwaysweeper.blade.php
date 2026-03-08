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
                <tr>
                    <td class="border-left">1</td>
                    <td>Odometer / Running Hour</td>
                    <td>{{ $vehicle->odometer }}</td>
                    <td class="border-left">2</td>
                    <td>Voltase Baterai</td>
                    <td>{{ $vehicle->v_aki }}</td>
                </tr>
                <tr>
                    <td class="border-left">3</td>
                    <td>Tanggal Pengadaan Accu</td>
                    <td>{{ $vehicle->tanggal_aki }}</td>
                    <td class="border-left">4</td>
                    <td>Kebersihan Kendaraan</td>
                    <td>{{ $vehicle->kebersihan_kendaraan }}</td>
                </tr>
                <tr>
                    <td class="border-left">5</td>
                    <td>Body Kendaraan</td>
                    <td>{{ $vehicle->body_kendaraan }}</td>
                    <td class="border-left">6</td>
                    <td>Air Accu</td>
                    <td>{{ $vehicle->cek_air_accu }}</td>
                </tr>
                <tr>
                    <td class="border-left">7</td>
                    <td>Oli Mesin</td>
                    <td>{{ $vehicle->oli_mesin }}</td>
                    <td class="border-left">8</td>
                    <td>Oli Transmisi</td>
                    <td>{{ $vehicle->oli_transmisi }}</td>
                </tr>
                <tr>
                    <td class="border-left">9</td>
                    <td>Oli Gardan</td>
                    <td>{{ $vehicle->oli_gardan }}</td>
                    <td class="border-left">10</td>
                    <td>Oli Hidrolis</td>
                    <td>{{ $vehicle->oli_hidrolis }}</td>
                </tr>
                <tr>
                    <td class="border-left">11</td>
                    <td>Minyak Power Steering</td>
                    <td>{{ $vehicle->minyak_power_steering }}</td>
                    <td class="border-left">12</td>
                    <td>Minyak Rem</td>
                    <td>{{ $vehicle->minyak_rem }}</td>
                </tr>
                <tr>
                    <td class="border-left">13</td>
                    <td>Air Radiator (Coolant Water) & Reservoir</td>
                    <td>{{ $vehicle->air_radiator_reservoir }}</td>
                    <td class="border-left">14</td>
                    <td>Air Radiator / Oil Cooler</td>
                    <td>{{ $vehicle->air_radiator_mesin }}</td>
                </tr>
                <tr>
                    <td class="border-left">15</td>
                    <td>Filter Oli</td>
                    <td>{{ $vehicle->filter_oli }}</td>
                    <td class="border-left">16</td>
                    <td>Filter Bahan Bakar</td>
                    <td>{{ $vehicle->filter_bahan_bakar }}</td>
                </tr>
                <tr>
                    <td class="border-left">17</td>
                    <td>Filter Udara</td>
                    <td>{{ $vehicle->filter_udara }}</td>
                    <td class="border-left">18</td>
                    <td>Filter Air Dryer</td>
                    <td>{{ $vehicle->filter_air_drayer }}</td>
                </tr>
                <tr>
                    <td class="border-left">19</td>
                    <td>Filter Water Separator</td>
                    <td>{{ $vehicle->filter_water_sparator }}</td>
                    <td class="border-left">20</td>
                    <td>Filter Transmisi</td>
                    <td>{{ $vehicle->filter_transmisi }}</td>
                </tr>
                <tr>
                    <td class="border-left">21</td>
                    <td>Filter Hidrolis</td>
                    <td>{{ $vehicle->filter_hidrolis }}</td>
                    <td class="border-left">22</td>
                    <td>Karet Wiper</td>
                    <td>{{ $vehicle->kondisi_karet_wiper }}</td>
                </tr>
                <tr>
                    <td class="border-left">23</td>
                    <td>Kaca Film</td>
                    <td>{{ $vehicle->kaca_film }}</td>
                    <td class="border-left">24</td>
                    <td>APAR</td>
                    <td>{{ $vehicle->apar }}</td>
                </tr>
                <tr>
                    <td class="border-left">25</td>
                    <td>V-Belt Ampere</td>
                    <td>{{ $vehicle->v_belt_ampere }}</td>
                    <td class="border-left">26</td>
                    <td>V-Belt AC</td>
                    <td>{{ $vehicle->v_belt_ac }}</td>
                </tr>
                <tr>
                    <td class="border-left">27</td>
                    <td>V-Belt Power Steering</td>
                    <td>{{ $vehicle->v_belt_power_steering }}</td>
                    <td class="border-left">28</td>
                    <td>V-Belt Kompresor</td>
                    <td>{{ $vehicle->v_belt_kompresor }}</td>
                </tr>
                <tr>
                    <td class="border-left">29</td>
                    <td>Oli Mesin Atas</td>
                    <td>{{ $vehicle->oli_mesin_atas }}</td>
                    <td class="border-left">30</td>
                    <td>Air Radiator Mesin Atas</td>
                    <td>{{ $vehicle->air_radiator_mesin_atas }}</td>
                </tr>
                <tr>
                    <td class="border-left">31</td>
                    <td>Filter Oli Mesin Atas</td>
                    <td>{{ $vehicle->filter_oli_mesin_atas }}</td>
                    <td class="border-left">32</td>
                    <td>Filter Bahan Bakar Mesin Atas</td>
                    <td>{{ $vehicle->filter_bahan_bakar_mesin_atas }}</td>
                </tr>
                <tr>
                    <td class="border-left">33</td>
                    <td>Filter Udara Mesin Atas</td>
                    <td>{{ $vehicle->filter_udara_mesin_atas }}</td>
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
                        <td>Turbo</td>
                        <td>{{ $vehicle->kondisi_turbo }}</td>
                        <td class="border-left">4</td>
                        <td>Transmisi</td>
                        <td>{{ $vehicle->transmisi }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">5</td>
                        <td>Cooling System</td>
                        <td>{{ $vehicle->cooling_system }}</td>
                        <td class="border-left">6</td>
                        <td>Rem / Brake</td>
                        <td>{{ $vehicle->rem_kaki }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">7</td>
                        <td>Handrem / Handbrake</td>
                        <td>{{ $vehicle->rem_tangan }}</td>
                        <td class="border-left">8</td>
                        <td>Gas / Accelerator Pedal</td>
                        <td>{{ $vehicle->pedal_gas }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">9</td>
                        <td>Power Steering</td>
                        <td>{{ $vehicle->power_steering }}</td>
                        <td class="border-left">10</td>
                        <td>Kaki-kaki / Understyle</td>
                        <td>{{ $vehicle->kaki_kaki }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">11</td>
                        <td>Airdryer</td>
                        <td>{{ $vehicle->airdrayer }}</td>
                        <td class="border-left">12</td>
                        <td>Pneumatic System</td>
                        <td>{{ $vehicle->pneumatic_system }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">13</td>
                        <td>Hydraulic System</td>
                        <td>{{ $vehicle->hydraulic_system }}</td>
                        <td class="border-left">14</td>
                        <td>Electrical System</td>
                        <td>{{ $vehicle->electrical_system }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">15</td>
                        <td>Kompresor</td>
                        <td>{{ $vehicle->kompresor }}</td>
                        <td class="border-left">16</td>
                        <td>Starter Engine Mesin Atas</td>
                        <td>{{ $vehicle->starter_engine_mesin_atas }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">17</td>
                        <td>Kondisi Engine Mesin Atas</td>
                        <td>{{ $vehicle->kondisi_engine_mesin_atas }}</td>
                        <td class="border-left">18</td>
                        <td>Turbo Mesin Atas</td>
                        <td>{{ $vehicle->turbo_mesin_atas }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">19</td>
                        <td>Cooling System Mesin Atas</td>
                        <td>{{ $vehicle->cooling_system_mesin_atas }}</td>
                        <td class="border-left">20</td>
                        <td>Gas / Accelerator Pedal Mesin Atas</td>
                        <td>{{ $vehicle->gas_accelerator_pedal_mesin_atas }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">21</td>
                        <td>Pompa Hidrolis</td>
                        <td>{{ $vehicle->pompa_hidrolis }}</td>
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
            <b>PENGECEKAN LAMPU</b>
        </div>
      </div>
      <br>
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
                        <td>Headlamp (Lampu Utama)</td>
                        <td>{{ $vehicle->headlamp_dekat }}</td>
                        <td class="border-left">2</td>
                        <td>Headlamp Jauh (Dim)</td>
                        <td>{{ $vehicle->headlamp_jauh }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">3</td>
                        <td>Lamppu Kota / Reversing Lamp</td>
                        <td>{{ $vehicle->reversing_lamp }}</td>
                        <td class="border-left">4</td>
                        <td>Folklamp</td>
                        <td>{{ $vehicle->folklamp }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">5</td>
                        <td>Retting Depan / Sein Lamp</td>
                        <td>{{ $vehicle->retting_depan }}</td>
                        <td class="border-left">6</td>
                        <td>Retting Belakang / Sein Lamp</td>
                        <td>{{ $vehicle->retting_belakang }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">7</td>
                        <td>Stoplamp</td>
                        <td>{{ $vehicle->stoplamp }}</td>
                        <td class="border-left">8</td>
                        <td>Lamppu Atret</td>
                        <td>{{ $vehicle->lampu_atret }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">9</td>
                        <td>Lamppu Sorot</td>
                        <td>{{ $vehicle->lampu_sorot }}</td>
                        <td class="border-left">10</td>
                        <td>Rotary Lamp</td>
                        <td>{{ $vehicle->rotary_lamp }}</td>
                    </tr>
                </tbody>
                             
            </table>
        </div>
        <!-- /.col -->
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
                            <td>Air Conditioning</td>
                            <td>{{ $vehicle->air_coditioning }}</td>
                            <td class="border-left">2</td>
                            <td>Jok Kendaraan</td>
                            <td>{{ $vehicle->jok_kendaraan }}</td>
                        </tr>
                        <tr>
                            <td class="border-left">3</td>
                            <td>Indikator Dashboard</td>
                            <td>{{ $vehicle->indikator_dashboard }}</td>
                            <td class="border-left">4</td>
                            <td>Lampu Cabin</td>
                            <td>{{ $vehicle->cabin_lamp }}</td>
                        </tr>
                        <tr>
                            <td class="border-left">5</td>
                            <td>Klakson</td>
                            <td>{{ $vehicle->klakson }}</td>
                            <td class="border-left">6</td>
                            <td>Fungsi Wiper</td>
                            <td>{{ $vehicle->fungsi_wipper }}</td>
                        </tr>
                        <tr>
                            <td class="border-left">7</td>
                            <td>Central Lock</td>
                            <td>{{ $vehicle->central_lock }}</td>
                            <td class="border-left">8</td>
                            <td>Power Window</td>
                            <td>{{ $vehicle->power_window_lock }}</td>
                        </tr>
                        <tr>
                            <td class="border-left">9</td>
                            <td>Microphone</td>
                            <td>{{ $vehicle->microphone }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    
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
                        <td>Ban Depan Kanan</td>
                        <td>{{ $vehicle->ban_depan_kanan }}</td>
                        <td class="border-left">2</td>
                        <td>Ban Belakang Kanan</td>
                        <td>{{ $vehicle->ban_belakang_kanan }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">3</td>
                        <td>Ban Depan Kiri</td>
                        <td>{{ $vehicle->ban_depan_kiri }}</td>
                        <td class="border-left">4</td>
                        <td>Ban Belakang Kiri</td>
                        <td>{{ $vehicle->ban_belakang_kiri }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">5</td>
                        <td>Ban Cadangan</td>
                        <td>{{ $vehicle->ban_cadangan }}</td>
                        <td class="border-left">6</td>
                        <td>Tekanan Ban</td>
                        <td>{{ $vehicle->tekanan_angin }}</td>
                    </tr>
                </tbody>                                   
              </table>             
          </div>
          <!-- /.col -->
      </div>
<br>
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
                        <td>Fungsi Hisapan Vacum</td>
                        <td>{{ $vehicle->fungsi_hisapan_vacum }}</td>
                        <td class="border-left">2</td>
                        <td>Fungsi Gerakan Vacum</td>
                        <td>{{ $vehicle->fungsi_gerakan_vacum }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">3</td>
                        <td>Fungsi Putaran Sapu Kanan</td>
                        <td>{{ $vehicle->fungsi_putaran_sapu_kanan }}</td>
                        <td class="border-left">4</td>
                        <td>Fungsi Putaran Sapu Kiri</td>
                        <td>{{ $vehicle->fungsi_putaran_sapu_kiri }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">5</td>
                        <td>Fungsi Putaran Sapu Tengah</td>
                        <td>{{ $vehicle->fungsi_putaran_sapu_tengah }}</td>
                        <td class="border-left">6</td>
                        <td>Fungsi Gerakan Sapu Kanan</td>
                        <td>{{ $vehicle->fungsi_gerakan_sapu_kanan }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">7</td>
                        <td>Fungsi Gerakan Sapu Kiri</td>
                        <td>{{ $vehicle->fungsi_gerakan_sapu_kiri }}</td>
                        <td class="border-left">8</td>
                        <td>Fungsi Gerakan Sapu Tengah</td>
                        <td>{{ $vehicle->fungsi_gerakan_sapu_tengah }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">9</td>
                        <td>Fungsi Spray Bar Depan</td>
                        <td>{{ $vehicle->fungsi_spray_bar_depan }}</td>
                        <td class="border-left">10</td>
                        <td>Fungsi Spray Bar Kiri</td>
                        <td>{{ $vehicle->fungsi_spray_bar_kiri }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">11</td>
                        <td>Fungsi Spray Bar Kanan</td>
                        <td>{{ $vehicle->fungsi_spray_bar_kanan }}</td>
                        <td class="border-left">12</td>
                        <td>Fungsi Jet Spray Gun</td>
                        <td>{{ $vehicle->fungsi_jet_spray_gun }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">13</td>
                        <td>Fungsi Hidrolis Hooper</td>
                        <td>{{ $vehicle->fungsi_hidrolis_hooper }}</td>
                        <td class="border-left">14</td>
                        <td>Fungsi Hidrolis Tutup Hooper</td>
                        <td>{{ $vehicle->fungsi_hidrolis_tutup_hooper }}</td>
                    </tr>
                    <tr>
                        <td class="border-left">15</td>
                        <td>Fungsi Monitor Control</td>
                        <td>{{ $vehicle->fungsi_monitor_control }}</td>
                        <td class="border-left">16</td>
                        <td>Fungsi Pendant</td>
                        <td>{{ $vehicle->fungsi_pendant }}</td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <!-- /.col -->
    </div>
<br>
<br>
<br>
<br>
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
