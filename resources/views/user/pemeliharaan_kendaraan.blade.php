@extends('layout.mainuser')
@section('content')


<html>
    <head>
         <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">

    </head>
</html>

<script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset ('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset ('lte/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset ('lte/plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset ('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset ('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset ('lte/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset ('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ asset ('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset ('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset ('lte/dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset ('lte/dist/js/pages/dashboard.js') }}"></script>
  
  <!-- jQuery -->
  <script src="{{ asset ('lte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset ('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset ('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset ('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- AdminLTE App -->
  



<style>

    .label1{
        font-size: 20px;
    }

    .form-check {
        border: 1px solid #ccc;
        padding: 1px;
        border-radius: 5px;
        margin-bottom: 10px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
        cursor: pointer;
        background-color: #fff; /* Warna default */
    }

    .form-check-input {
        display: none; /* Sembunyikan radio button */
    }

    .form-check-input:checked + label {
        font-weight: bold;
        color: #007bff;
        border-color: #007bff;
        background-color: #e0f7ff; /* Ubah background saat dipilih */
    }

    .form-check label {
        display: block;
        padding: 10px;
        border: 1px solid transparent; /* Default border transparan untuk transisi */
        border-radius: 5px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
        cursor: pointer; /* Tambahkan cursor pointer untuk label */
    }

    .form-check:hover label {
        border-color: #007bff;
        background-color: #f0f8ff; /* Ubah background saat hover */
    }
</style>







<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title">Form Laporan Pemeliharaan {{ $vehicle->vehicle_name }}</h3>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('user.store_pemeliharaan') }}" method="POST" enctype="multipart/form-data" id="maintenanceForm">
                        @csrf
                        <!-- Bagian 1 -->
                         <div class="form-section" id="section1">
                            <label class="label1 mb-5" style="text-align: center; display: block;">Pengecekan Engine OFF</label>


                            <div class="row">
                                <div class="col-sm-6" id="vehicle_name">
                                    <div class="form-group">
                                        
                                        @if($vehicle && $vehicle->foto_kendaraan)
                                            <img src="{{ asset('foto_kendaraan/' . $vehicle->foto_kendaraan) }}" alt="Foto Kendaraan" style="max-width: 300px; max-height: 300px;">
                                        @else
                                            <p>Tidak ada foto kendaraan.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Nama Kendaraan -->
                            <div class="row">
                                <div class="col-sm-6" id="vehicle_name">
                                    <div class="form-group">
                                        <label  class="label1">Nama Kendaraan</label>
                                        <input type="text" class="form-control" name="vehicle_name" value="{{ $vehicle->vehicle_name }}" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-sm-6" id="vehicle_name">
                                    <div class="form-group">
                                        <label class="label1">Teknisi Dinas</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            name="nama_dinas" 
                                            value="{{ $dinas->nama_dinas ?? '' }}" 
                                            readonly 
                                            required
                                        >
                                        @if(empty($dinas->nama_dinas))
                                            <small class="text-danger">
                                                Jadwal teknisi dinas belum dimasukan, hubungi admin.
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            

                            <div class="row d-none">
                                <div class="col-sm-6" id="vehicle_name">
                                    <div class="form-group">
                                        <label  class="label1">ID</label>
                                        <input type="text" class="form-control" name="id" value="{{ $vehicle->id }}" readonly required>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Nama User -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  class="label1">Nama Teknisi</label>
                                        <input type="text" class="form-control" name="user" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- Penggantian Oli Selanjutnya -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  class="label1">Oli Akan Di Ganti Pada KM</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="oli_selanjutnya" id="oli_selanjutnya" value="{{ $vehicle->oli_selanjutnya }}" readonly required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">KM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Oli Telat -->
                            <div class="row" id="oliTelatForm">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  class="label1">Oli Telat (KM)</label>
                                        <div>*Cttn: Jika Nilai masih 0 berarti belum telat !</div>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="oli_kurang" id="oli_kurang" placeholder="Masukkan Penggantian Oli Kurang" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">KM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Penggantian Oli Kurang -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  class="label1">KM Oli Yang Akan Diganti masih bersisa</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="oli_lebih" id="oli_lebih" value="{{ $vehicle->oli_selanjutnya }}" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">KM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Jenis Kendaraan -->
                            <div class="row" >
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  class="label1">Jenis Kendaraan</label>
                                        <input type="text" class="form-control" name="vehicle_type" id="vehicle_type" value="{{ $vehicle->vehicle_type }}" readonly required>
                                    </div>
                                </div>
                            </div>

                                <!-- Tanggal dan Jam -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label1">Tanggal dan Jam</label>
                                            <input type="datetime-local" class="form-control" name="tanggal" value="{{ \Carbon\Carbon::now()->toDateTimeLocalString() }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label1">Tanggal Pengadaan Accu</label>
                                            <input type="date" class="form-control"  name="tanggal_aki" id="tanggal_aki" value="{{ $vehicle->tanggal_aki }}" required>
                                        </div>
                                    </div>
                                </div>

                            <!-- Odo Meter -->
                            <div class="row" id="odometers">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  class="label1" >Odo Meter</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="odometer" id="odometer" placeholder="Masukkan Odo Meter" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">KM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Voltase Baterai -->
                            <div class="row">
                                <div class="col-sm-6" id="v_aki">
                                    <div class="form-group">
                                        <label  class="label1">Voltase Baterai</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="v_aki" id="v_aki" placeholder="Masukkan V Aki" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">V</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kondisi Kendaraan -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label  class="label1">Kondisi Kendaraan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vehicle_condition" id="kondisi1" value="Serviceable" required>
                                            <label class="form-check-label" for="kondisi1">Serviceable</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vehicle_condition" id="kondisi2" value="Unserviceable" required>
                                            <label class="form-check-label" for="kondisi2">Unserviceable</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vehicle_condition" id="kondisi3" value="Serviceable Dengan Catatan" required>
                                            <label class="form-check-label" for="kondisi3">Serviceable Dengan Catatan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label  class="label1">Kebersihan Kendaraan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kebersihan_kendaraan" id="kebersihan1" value="Kendaraan bersih" required>
                                            <label class="form-check-label" for="kebersihan1">Kendaraan bersih</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kebersihan_kendaraan" id="kebersihan2" value="Kendaraan kotor" required>
                                            <label class="form-check-label" for="kebersihan2">Kendaraan kotor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kondisi Body Kendaraan -->
                            <div class="row" id="body_kendaraan">
                                <div class="col-sm-6">
                                    <label  class="label1">Kondisi Body Kendaraan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="body_kendaraan" id="body1" value="Baik" required>
                                            <label class="form-check-label" for="body1">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="body_kendaraan" id="body2" value="Tidak Baik" required>
                                            <label class="form-check-label" for="body2">Tidak Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="body_kendaraan" id="body3" value="Baik Dengan Catatan" required>
                                            <label class="form-check-label" for="body3">Baik Dengan Catatan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="cek_air_accu">
                                    <label  class="label1">Cek Air Accu</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cek_air_accu" id="cek_air_accu1" value="Batas Normal" required>
                                            <label class="form-check-label" for="cek_air_accu1">Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cek_air_accu" id="cek_air_accu2" value="Dibawah Batas Normal" required>
                                            <label class="form-check-label" for="cek_air_accu2">Dibawah Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cek_air_accu" id="cek_air_accu3" value="Dilakukan Penambahan" required>
                                            <label class="form-check-label" for="cek_air_accu3">Dilakukan Penambahan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="oli_mesin">
                                    <label  class="label1">Oli Mesin</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_mesin" id="oli_mesin1" value="Batas Normal" required>
                                            <label class="form-check-label" for="oli_mesin1">Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_mesin" id="oli_mesin2" value="Dibawah Batas Normal" required>
                                            <label class="form-check-label" for="oli_mesin2">Dibawah Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_mesin" id="oli_mesin3" value="Dilakukan Penambahan" required>
                                            <label class="form-check-label" for="oli_mesin3">Dilakukan Penambahan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="row">
                                <div class="col-sm-6" id="oli_transmisi">
                                    <label  class="label1">Oli Transmisi</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_transmisi" id="oli_transmisi1" value="Batas Normal" required>
                                            <label class="form-check-label" for="oli_transmisi1">Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_transmisi" id="oli_transmisi2" value="Dibawah Batas Normal" required>
                                            <label class="form-check-label" for="oli_transmisi2">Dibawah Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_transmisi" id="oli_transmisi3" value="Dilakukan Penambahan" required>
                                            <label class="form-check-label" for="oli_transmisi3">Dilakukan Penambahan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="oli_gardan">
                                    <label  class="label1">Oli Gardan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_gardan" id="oli_gardan1" value="Batas normal" required>
                                            <label class="form-check-label" for="oli_gardan1">Batas normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_gardan" id="oli_gardan2" value="Di bawah batas normal" required>
                                            <label class="form-check-label" for="oli_gardan2">Di bawah batas normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_gardan" id="oli_gardan3" value="Ditambahkan" required>
                                            <label class="form-check-label" for="oli_gardan3">Ditambahkan</label>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="oli_hidrolis">
                                        <label  class="label1">Oli Hidrolis</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="oli_hidrolis" id="oli_hidrolis1" value="Batas normal" required>
                                                <label class="form-check-label" for="oli_hidrolis1">Batas normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="oli_hidrolis" id="oli_hidrolis2" value="Di bawah batas normal" required>
                                                <label class="form-check-label" for="oli_hidrolis2">Di bawah batas normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="oli_hidrolis" id="oli_hidrolis3" value="Ditambahkan" required>
                                                <label class="form-check-label" for="oli_hidrolis3">Ditambahkan</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6" id="minyak_power_steering">
                                            <label  class="label1">Minyak Power Steering</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="minyak_power_steering" id="minyak_power_steering1" value="Batas Normal" required>
                                                    <label class="form-check-label" for="minyak_power_steering1">Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="minyak_power_steering" id="minyak_power_steering2" value="Dibawah Batas Normal" required>
                                                    <label class="form-check-label" for="minyak_power_steering2">Dibawah Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="minyak_power_steering" id="minyak_power_steering3" value="Dilakukan Penambahan" required>
                                                    <label class="form-check-label" for="minyak_power_steering3">Dilakukan Penambahan</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="minyak_power_steering" id="minyak_power_steering4" value="Tidak ada Power Steering" required>
                                                    <label class="form-check-label" for="minyak_power_steering4">Tidak ada Power Steering</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="col-sm-6" id="minyak_rem">
                                            <label  class="label1">Minyak Rem</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="minyak_rem" id="minyak_rem1" value="Batas Normal" required>
                                                    <label class="form-check-label" for="minyak_rem1">Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="minyak_rem" id="minyak_rem2" value="Dibawah Batas Normal" required>
                                                    <label class="form-check-label" for="minyak_rem2">Dibawah Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="minyak_rem" id="minyak_rem3" value="Dilakukan Penambahan" required>
                                                    <label class="form-check-label" for="minyak_rem3">Dilakukan Penambahan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="air_radiator_reservoir">
                                        <div class="col-sm-6">
                                            <label  class="label1">Air Radiator (Coolant Water) & Reservoir</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="air_radiator_reservoir" id="air_radiator_reservoir1" value="Batas Normal" required>
                                                    <label class="form-check-label" for="air_radiator_reservoir1">Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="air_radiator_reservoir" id="air_radiator_reservoir2" value="Dibawah Batas Normal" required>
                                                    <label class="form-check-label" for="air_radiator_reservoir2">Dibawah Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="air_radiator_reservoir" id="air_radiator_reservoir3" value="Ditambahkan" required>
                                                    <label class="form-check-label" for="air_radiator_reservoir3">Ditambahkan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6" id="air_radiator_mesin">
                                            <label  class="label1">Air Radiator/ Oil Cooler</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="air_radiator_mesin" id="air_radiator_mesin1" value="Batas Normal" required>
                                                    <label class="form-check-label" for="air_radiator_mesin1">Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="air_radiator_mesin" id="air_radiator_mesin2" value="Di Bawah Batas Normal" required>
                                                    <label class="form-check-label" for="air_radiator_mesin2">Di Bawah Batas Normal</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="air_radiator_mesin" id="air_radiator_mesin3" value="Ditambahkan" required>
                                                    <label class="form-check-label" for="air_radiator_mesin3">Ditambahkan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6" id="filter_oli">
                                            <label  class="label1">Filter Oli</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_oli" id="filter_oli1" value="Kondisi Baik" required>
                                                    <label class="form-check-label" for="filter_oli1">Kondisi Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_oli" id="filter_oli2" value="Kondisi Kotor" required>
                                                    <label class="form-check-label" for="filter_oli2">Kondisi Kotor</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_oli" id="filter_oli3" value="Perlu Penggantian" required>
                                                    <label class="form-check-label" for="filter_oli3">Perlu Penggantian</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6" id="filter_oli_kompresor">
                                            <label  class="label1">Filter Oli Kompresor</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_oli_kompresor" id="filter_oli_kompresor1" value="Baik" required>
                                                    <label class="form-check-label" for="filter_oli_kompresor1">Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_oli_kompresor" id="filter_oli_kompresor2" value="Kotor" required>
                                                    <label class="form-check-label" for="filter_oli_kompresor2">Kotor</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_oli_kompresor" id="filter_oli_kompresor3" value="Perlu penggantian" required>
                                                    <label class="form-check-label" for="filter_oli_kompresor3">Perlu penggantian</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    <div class="row" id="filter_bahan_bakar">
                                        <div class="col-sm-6" >
                                            <label  class="label1">Filter Bahan Bakar</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_bahan_bakar" id="filter_bahan_bakar1" value="Kondisi Baik" required>
                                                    <label class="form-check-label" for="filter_bahan_bakar1">Kondisi Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_bahan_bakar" id="filter_bahan_bakar2" value="Kondisi Kotor" required>
                                                    <label class="form-check-label" for="filter_bahan_bakar2">Kondisi Kotor</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_bahan_bakar" id="filter_bahan_bakar3" value="Perlu Penggantian" required>
                                                    <label class="form-check-label" for="filter_bahan_bakar3">Perlu Penggantian</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6" id="filter_udara">
                                            <label  class="label1">Filter Udara</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_udara" id="filter_udara1" value="Kondisi Baik" required>
                                                    <label class="form-check-label" for="filter_udara1">Kondisi Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_udara" id="filter_udara2" value="Kondisi Kotor" required>
                                                    <label class="form-check-label" for="filter_udara2">Kondisi Kotor</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_udara" id="filter_udara3" value="Perlu Penggantian" required>
                                                    <label class="form-check-label" for="filter_udara3">Perlu Penggantian</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-sm-6" id="filter_air_drayer">
                                        <label  class="label1">Filter Air Drayer</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="filter_air_drayer" id="filter_air_drayer1" value="Baik" required>
                                                <label class="form-check-label" for="filter_air_drayer1">Baik</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="filter_air_drayer" id="filter_air_drayer2" value="Kotor" required>
                                                <label class="form-check-label" for="filter_air_drayer2">Kotor</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="filter_air_drayer" id="filter_air_drayer3" value="Perlu penggantian" required>
                                                <label class="form-check-label" for="filter_air_drayer3">Perlu penggantian</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-sm-6" id="filter_water_sparator">
                                        <label  class="label1">Filter Water Sparator</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="filter_water_sparator" id="filter_water_sparator1" value="Baik" required>
                                                <label class="form-check-label" for="filter_water_sparator1">Baik</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="filter_water_sparator" id="filter_water_sparator2" value="Kotor" required>
                                                <label class="form-check-label" for="filter_water_sparator2">Kotor</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="filter_water_sparator" id="filter_water_sparator3" value="Perlu penggantian" required>
                                                <label class="form-check-label" for="filter_water_sparator3">Perlu penggantian</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6" id="filter_transmisi">
                                            <label  class="label1">Filter Transmisi</label>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_transmisi" id="filter_transmisi1" value="Baik" required>
                                                    <label class="form-check-label" for="filter_transmisi1">Baik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_transmisi" id="filter_transmisi2" value="Kotor" required>
                                                    <label class="form-check-label" for="filter_transmisi2">Kotor</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="filter_transmisi" id="filter_transmisi3" value="Perlu penggantian" required>
                                                    <label class="form-check-label" for="filter_transmisi3">Perlu penggantian</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="filter_hidrolis">
                                                <label  class="label1">Filter Hidrolis</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_hidrolis" id="filter_hidrolis1" value="Baik" required>
                                                        <label class="form-check-label" for="filter_hidrolis1">Baik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_hidrolis" id="filter_hidrolis2" value="Kotor" required>
                                                        <label class="form-check-label" for="filter_hidrolis2">Kotor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_hidrolis" id="filter_hidrolis3" value="Perlu penggantian" required>
                                                        <label class="form-check-label" for="filter_hidrolis3">Perlu penggantian</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="kondisi_karet_wiper" >
                                                <label  class="label1">Kondisi Karet Wiper</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kondisi_karet_wiper" id="kondisi_karet_wiper1" value="Baik" required>
                                                        <label class="form-check-label" for="kondisi_karet_wiper1">Baik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kondisi_karet_wiper" id="kondisi_karet_wiper2" value="Rusak" required>
                                                        <label class="form-check-label" for="kondisi_karet_wiper2">Rusak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-sm-6" id="kaca_film">
                                                <label  class="label1">Kaca Film</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kaca_film" id="kaca_film1" value="Baik" required>
                                                        <label class="form-check-label" for="kaca_film1">Baik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kaca_film" id="kaca_film2" value="Rusak" required>
                                                        <label class="form-check-label" for="kaca_film2">Rusak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="row" id="apar">
                                            <div class="col-sm-6">
                                                <label  class="label1">APAR (Alat Pemadam Api Ringan)</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="apar" id="apar1" value="Ada" required>
                                                        <label class="form-check-label" for="apar1">Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="apar" id="apar2" value="Tidak Ada" required>
                                                        <label class="form-check-label" for="apar2">Tidak Ada</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="v_belt_ampere">
                                                <label  class="label1">V-Belt Ampere</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ampere" id="v_belt_ampere1" value="Normal" required>
                                                        <label class="form-check-label" for="v_belt_ampere1">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ampere" id="v_belt_ampere2" value="Upnormal" required>
                                                        <label class="form-check-label" for="v_belt_ampere2">Upnormal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ampere" id="v_belt_ampere3" value="Rusak" required>
                                                        <label class="form-check-label" for="v_belt_ampere3">Rusak</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ampere" id="v_belt_ampere4" value="Normal dengan catatan" required>
                                                        <label class="form-check-label" for="v_belt_ampere4">Normal dengan catatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ampere" id="v_belt_ampere5" value="Tidak bisa di test karena part lain rusak" required>
                                                        <label class="form-check-label" for="v_belt_ampere5">Tidak bisa di test karena part lain rusak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="v_belt_ac">
                                                <label  class="label1">V-Belt Ac</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ac" id="v_belt_ac1" value="Normal" required>
                                                        <label class="form-check-label" for="v_belt_ac1">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ac" id="v_belt_ac2" value="Upnormal" required>
                                                        <label class="form-check-label" for="v_belt_ac2">Upnormal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ac" id="v_belt_ac3" value="Rusak" required>
                                                        <label class="form-check-label" for="v_belt_ac3">Rusak</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ac" id="v_belt_ac4" value="Normal dengan catatan" required>
                                                        <label class="form-check-label" for="v_belt_ac4">Normal dengan catatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_ac" id="v_belt_ac5" value="Tidak bisa di test karena part lain rusak" required>
                                                        <label class="form-check-label" for="v_belt_ac5">Tidak bisa di test karena part lain rusak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="v_belt_power_steering">
                                                <label  class="label1">V-Belt Power Steering</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_power_steering" id="v_belt_power_steering1" value="Normal" required>
                                                        <label class="form-check-label" for="v_belt_power_steering1">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_power_steering" id="v_belt_power_steering2" value="Upnormal" required>
                                                        <label class="form-check-label" for="v_belt_power_steering2">Upnormal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_power_steering" id="v_belt_power_steering3" value="Rusak" required>
                                                        <label class="form-check-label" for="v_belt_power_steering3">Rusak</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_power_steering" id="v_belt_power_steering4" value="Normal dengan catatan" required>
                                                        <label class="form-check-label" for="v_belt_power_steering4">Normal dengan catatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_power_steering" id="v_belt_power_steering5" value="Tidak bisa di test karena part lain rusak" required>
                                                        <label class="form-check-label" for="v_belt_power_steering5">Tidak bisa di test karena part lain rusak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="dongkrak">
                                            <div class="col-sm-6">
                                                <label  class="label1">Dongkrak</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dongkrak" id="dongkrak_Ada" value="Ada" required>
                                                        <label class="form-check-label" for="dongkrak_Ada">Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="dongkrak" id="dongkrak_Tidak_Ada" value="Tidak Ada" required>
                                                        <label class="form-check-label" for="dongkrak_Tidak_Ada">Tidak Ada</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        
                                        
            
                                        <div class="row" id="kunci_roda">
                                            <div class="col-sm-6">
                                                <label  class="label1">Kunci Roda</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kunci_roda" id="kunci_roda_Ada" value="Ada" required>
                                                        <label class="form-check-label" for="kunci_roda_Ada">Ada</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="kunci_roda" id="kunci_roda_Tidak_Ada" value="Tidak Ada" required>
                                                        <label class="form-check-label" for="kunci_roda_Tidak_Ada">Tidak Ada</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="v_belt_kompresor">
                                                <label  class="label1">V-Belt Kompresor</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_kompresor" id="v_belt_kompresor1" value="Normal" required>
                                                        <label class="form-check-label" for="v_belt_kompresor1">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_kompresor" id="v_belt_kompresor2" value="Upnormal" required>
                                                        <label class="form-check-label" for="v_belt_kompresor2">Upnormal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_kompresor" id="v_belt_kompresor3" value="Rusak" required>
                                                        <label class="form-check-label" for="v_belt_kompresor3">Rusak</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_kompresor" id="v_belt_kompresor4" value="Normal dengan catatan" required>
                                                        <label class="form-check-label" for="v_belt_kompresor4">Normal dengan catatan</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="v_belt_kompresor" id="v_belt_kompresor5" value="Tidak bisa di test karena part lain rusak" required>
                                                        <label class="form-check-label" for="v_belt_kompresor5">Tidak bisa di test karena part lain rusak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="oli_mesin_atas">
                                                <label  class="label1">Oli Mesin Atas</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="oli_mesin_atas" id="oli_mesin_atas1" value="Batas Normal" required>
                                                        <label class="form-check-label" for="oli_mesin_atas1">Batas Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="oli_mesin_atas" id="oli_mesin_atas2" value="Dibawah Batas Normal" required>
                                                        <label class="form-check-label" for="oli_mesin_atas2">Dibawah Batas Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="oli_mesin_atas" id="oli_mesin_atas3" value="Ditambahkan" required>
                                                        <label class="form-check-label" for="oli_mesin_atas3">Ditambahkan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="air_radiator_mesin_atas">
                                                <label  class="label1">Air Radiator Mesin Atas</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="air_radiator_mesin_atas" id="air_radiator_mesin_atas1" value="Batas Normal" required>
                                                        <label class="form-check-label" for="air_radiator_mesin_atas1">Batas Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="air_radiator_mesin_atas" id="air_radiator_mesin_atas2" value="Dibawah Batas Normal" required>
                                                        <label class="form-check-label" for="air_radiator_mesin_atas2">Dibawah Batas Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="air_radiator_mesin_atas" id="air_radiator_mesin_atas3" value="Ditambahkan" required>
                                                        <label class="form-check-label" for="air_radiator_mesin_atas3">Ditambahkan</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="filter_oli_mesin_atas">
                                                <label  class="label1">Filter Oli Mesin Atas</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_oli_mesin_atas" id="filter_oli_mesin_atas1" value="Baik" required>
                                                        <label class="form-check-label" for="filter_oli_mesin_atas1">Baik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_oli_mesin_atas" id="filter_oli_mesin_atas2" value="Kotor" required>
                                                        <label class="form-check-label" for="filter_oli_mesin_atas2">Kotor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_oli_mesin_atas" id="filter_oli_mesin_atas3" value="Perlu Penggantian" required>
                                                        <label class="form-check-label" for="filter_oli_mesin_atas3">Perlu Penggantian</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="filter_bahan_bakar_mesin_atas">
                                                <label  class="label1">Filter Bahan Bakar Mesin Atas</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_bahan_bakar_mesin_atas" id="filter_bahan_bakar_mesin_atas1" value="Baik" required>
                                                        <label class="form-check-label" for="filter_bahan_bakar_mesin_atas1">Baik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_bahan_bakar_mesin_atas" id="filter_bahan_bakar_mesin_atas2" value="Kotor" required>
                                                        <label class="form-check-label" for="filter_bahan_bakar_mesin_atas2">Kotor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_bahan_bakar_mesin_atas" id="filter_bahan_bakar_mesin_atas3" value="Perlu Penggantian" required>
                                                        <label class="form-check-label" for="filter_bahan_bakar_mesin_atas3">Perlu Penggantian</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6" id="filter_udara_mesin_atas">
                                                <label  class="label1">Filter Udara Mesin Atas</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_udara_mesin_atas" id="filter_udara_mesin_atas1" value="Baik" required>
                                                        <label class="form-check-label" for="filter_udara_mesin_atas1">Baik</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_udara_mesin_atas" id="filter_udara_mesin_atas2" value="Kotor" required>
                                                        <label class="form-check-label" for="filter_udara_mesin_atas2">Kotor</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="filter_udara_mesin_atas" id="filter_udara_mesin_atas3" value="Perlu Penggantian" required>
                                                        <label class="form-check-label" for="filter_udara_mesin_atas3">Perlu Penggantian</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                            <!-- Tombol Next -->
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="nextSection('section1', 'section2')">Next</button>
                            </div>
                       </div>
                    
                        <!-- Bagian 2 -->
                        <div class="form-section" id="section2" style="display: none;">
                            <label class="label1 mb-5" style="text-align: center; display: block;">Pengecekan Engine ON</label>
                            <!-- Friction Tyre Kanan -->


                            <div class="row">
                                <div class="col-sm-6" id="starter_engine">
                                    <label  class="label1">Starter Engine</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="starter_engine" id="starter_engine1" value="Normal" required>
                                            <label class="form-check-label" for="starter_engine1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="starter_engine" id="starter_engine2" value="Upnormal" required>
                                            <label class="form-check-label" for="starter_engine2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="starter_engine" id="starter_engine3" value="Rusak" required>
                                            <label class="form-check-label" for="starter_engine3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="starter_engine" id="starter_engine4" value="Normal Dengan Catatan" required>
                                            <label class="form-check-label" for="starter_engine4">Normal Dengan Catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="starter_engine" id="starter_engine5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                            <label class="form-check-label" for="starter_engine5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="kondisi_engine">
                                    <label  class="label1">Kondisi Engine</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_engine" id="kondisi_engine1" value="Normal" required>
                                            <label class="form-check-label" for="kondisi_engine1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_engine" id="kondisi_engine2" value="Upnormal" required>
                                            <label class="form-check-label" for="kondisi_engine2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_engine" id="kondisi_engine3" value="Rusak" required>
                                            <label class="form-check-label" for="kondisi_engine3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_engine" id="kondisi_engine4" value="Normal Dengan Catatan" required>
                                            <label class="form-check-label" for="kondisi_engine4">Normal Dengan Catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_engine" id="kondisi_engine5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                            <label class="form-check-label" for="kondisi_engine5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="kondisi_turbo">
                                    <label  class="label1">Kondisi Turbo</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_turbo" id="kondisi_turbo1" value="Normal" required>
                                            <label class="form-check-label" for="kondisi_turbo1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_turbo" id="turbo2" value="Upnormal" required>
                                            <label class="form-check-label" for="turbo2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_turbo" id="turbo3" value="Rusak" required>
                                            <label class="form-check-label" for="turbo3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_turbo" id="turbo4" value="Normal Dengan Catatan" required>
                                            <label class="form-check-label" for="turbo4">Normal Dengan Catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_turbo" id="turbo5" value="Tidak Ada Turbo" required>
                                            <label class="form-check-label" for="turbo5">Tidak Ada Turbo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_turbo" id="turbo6" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                            <label class="form-check-label" for="turbo6">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                        </div>
                                    </div>
                                </div>
                             </div>

                             <div class="row">
                                <div class="col-sm-6" id="transmisi">
                                    <label  class="label1">Transmisi</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi1" value="Normal" required>
                                            <label class="form-check-label" for="transmisi1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi2" value="Upnormal" required>
                                            <label class="form-check-label" for="transmisi2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi3" value="Rusak" required>
                                            <label class="form-check-label" for="transmisi3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi4" value="Normal Dengan Catatan" required>
                                            <label class="form-check-label" for="transmisi4">Normal Dengan Catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="transmisi" id="transmisi5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                            <label class="form-check-label" for="transmisi5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="cooling_system">
                                    <label  class="label1">Cooling System</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cooling_system" id="cooling_system1" value="Normal" required>
                                            <label class="form-check-label" for="cooling_system1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cooling_system" id="cooling_system2" value="Upnormal" required>
                                            <label class="form-check-label" for="cooling_system2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cooling_system" id="cooling_system3" value="Rusak" required>
                                            <label class="form-check-label" for="cooling_system3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cooling_system" id="cooling_system4" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="cooling_system4">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="rem_kaki">
                                        <label  class="label1">Rem / Brake</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_kaki" id="rem_kaki1" value="Normal" required>
                                                <label class="form-check-label" for="rem_kaki1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_kaki" id="rem_kaki2" value="Upnormal" required>
                                                <label class="form-check-label" for="rem_kaki2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_kaki" id="rem_kaki3" value="Rusak" required>
                                                <label class="form-check-label" for="rem_kaki3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_kaki" id="rem_kaki4" value="Normal Dengan Catatan" required>
                                                <label class="form-check-label" for="rem_kaki4">Normal Dengan Catatan</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_kaki" id="rem_kaki5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                                <label class="form-check-label" for="rem_kaki5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="rem_tangan">
                                        <label  class="label1">Handrem / Handbrake</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_tangan" id="rem_tangan1" value="Normal" required>
                                                <label class="form-check-label" for="rem_tangan1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_tangan" id="rem_tangan2" value="Upnormal" required>
                                                <label class="form-check-label" for="rem_tangan2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_tangan" id="rem_tangan3" value="Rusak" required>
                                                <label class="form-check-label" for="rem_tangan3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_tangan" id="rem_tangan4" value="Normal Dengan Catatan" required>
                                                <label class="form-check-label" for="rem_tangan4">Normal Dengan Catatan</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="rem_tangan" id="rem_tangan5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                                <label class="form-check-label" for="rem_tangan5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="pedal_gas">
                                        <label  class="label1">Gas / Accelator Pedal</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pedal_gas" id="pedal_gas1" value="Normal" required>
                                                <label class="form-check-label" for="pedal_gas1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pedal_gas" id="pedal2" value="Upnormal" required>
                                                <label class="form-check-label" for="pedal2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pedal_gas" id="pedal3" value="Rusak" required>
                                                <label class="form-check-label" for="pedal3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pedal_gas" id="pedal4" value="Normal Dengan Catatan" required>
                                                <label class="form-check-label" for="pedal4">Normal Dengan Catatan</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pedal_gas" id="pedal5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                                <label class="form-check-label" for="pedal5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="power_steering">
                                        <label  class="label1">Kondisi Power Steering</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="power_steering" id="power_steering1" value="Normal" required>
                                                <label class="form-check-label" for="power_steering1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="power_steering" id="power_steering2" value="Upnormal" required>
                                                <label class="form-check-label" for="power_steering2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="power_steering" id="power_steering3" value="Rusak" required>
                                                <label class="form-check-label" for="power_steering3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="power_steering" id="power_steering4" value="Normal Dengan Catatan" required>
                                                <label class="form-check-label" for="power_steering4">Normal Dengan Catatan</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="power_steering" id="power_steering5" value="Tidak Ada Power Steering" required>
                                                <label class="form-check-label" for="power_steering5">Tidak Ada Power Steering</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="power_steering" id="power_steering6" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                                <label class="form-check-label" for="power_steering6">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-sm-6" id="kaki_kaki">
                                        <label  class="label1">Kondisi Kaki-Kaki / Understyle</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kaki_kaki" id="kaki_kaki1" value="Normal" required>
                                                <label class="form-check-label" for="kaki_kaki1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kaki_kaki" id="kaki_kaki2" value="Upnormal" required>
                                                <label class="form-check-label" for="kaki_kaki2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kaki_kaki" id="kaki_kaki3" value="Rusak" required>
                                                <label class="form-check-label" for="kaki_kaki3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kaki_kaki" id="kaki_kaki4" value="Normal Dengan Catatan" required>
                                                <label class="form-check-label" for="kaki_kaki4">Normal Dengan Catatan</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kaki_kaki" id="kaki_kaki5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                                <label class="form-check-label" for="kaki_kaki5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="airdrayer">
                                        <label  class="label1">Air Drayer</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="airdrayer" id="airdrayer1" value="Normal" required>
                                                <label class="form-check-label" for="airdrayer1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="airdrayer" id="airdrayer2" value="Upnormal" required>
                                                <label class="form-check-label" for="airdrayer2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="airdrayer" id="airdrayer3" value="Rusak" required>
                                                <label class="form-check-label" for="airdrayer3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="airdrayer" id="airdrayer4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="airdrayer4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                
                                    <div class="row">
                                    <div class="col-sm-6" id="pneumatic_system">
                                        <label  class="label1">Pneumatic System</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pneumatic_system" id="pneumatic_system1" value="Normal" required>
                                                <label class="form-check-label" for="pneumatic_system1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pneumatic_system" id="pneumatic_system2" value="Upnormal" required>
                                                <label class="form-check-label" for="pneumatic_system2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pneumatic_system" id="pneumatic_system3" value="Rusak" required>
                                                <label class="form-check-label" for="pneumatic_system3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pneumatic_system" id="pneumatic_system4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="pneumatic_system4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                    <div class="row">
                                    <div class="col-sm-6" id="hydraulic_system">
                                        <label  class="label1">Hydraulic System</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hydraulic_system" id="hydraulic_system1" value="Normal" required>
                                                <label class="form-check-label" for="hydraulic_system1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hydraulic_system" id="hydraulic_system2" value="Upnormal" required>
                                                <label class="form-check-label" for="hydraulic_system2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hydraulic_system" id="hydraulic_system3" value="Rusak" required>
                                                <label class="form-check-label" for="hydraulic_system3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="hydraulic_system" id="hydraulic_system4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="hydraulic_system4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="electrical_system">
                                        <label  class="label1">Electrical System</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="electrical_system" id="electrical_system1" value="Normal" required>
                                                <label class="form-check-label" for="electrical_system1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="electrical_system" id="electrical_system2" value="Upnormal" required>
                                                <label class="form-check-label" for="electrical_system2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="electrical_system" id="electrical_system3" value="Rusak" required>
                                                <label class="form-check-label" for="electrical_system3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="electrical_system" id="electrical_system4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="electrical_system4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">  
                                    <div class="col-sm-6" id="kompresor">
                                        <label  class="label1">Kompresor</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kompresor" id="kompresor1" value="Normal" required>
                                                <label class="form-check-label" for="kompresor1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kompresor" id="kompresor2" value="Upnormal" required>
                                                <label class="form-check-label" for="kompresor2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kompresor" id="kompresor3" value="Rusak" required>
                                                <label class="form-check-label" for="kompresor3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kompresor" id="kompresor4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="kompresor4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="starter_engine_mesin_atas">
                                        <label  class="label1">Starter Engine Mesin Atas</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="starter_engine_mesin_atas" id="starter_engine_mesin_atas1" value="Normal" required>
                                                <label class="form-check-label" for="starter_engine_mesin_atas1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="starter_engine_mesin_atas" id="starter_engine_mesin_atas2" value="Upnormal" required>
                                                <label class="form-check-label" for="starter_engine_mesin_atas2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="starter_engine_mesin_atas" id="starter_engine_mesin_atas3" value="Rusak" required>
                                                <label class="form-check-label" for="starter_engine_mesin_atas3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="starter_engine_mesin_atas" id="starter_engine_mesin_atas4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="starter_engine_mesin_atas4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="kondisi_engine_mesin_atas">
                                        <label  class="label1">Kondisi Engine Mesin Atas</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kondisi_engine_mesin_atas" id="kondisi_engine_mesin_atas1" value="Normal" required>
                                                <label class="form-check-label" for="kondisi_engine_mesin_atas1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kondisi_engine_mesin_atas" id="kondisi_engine_mesin_atas2" value="Upnormal" required>
                                                <label class="form-check-label" for="kondisi_engine_mesin_atas2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kondisi_engine_mesin_atas" id="kondisi_engine_mesin_atas3" value="Rusak" required>
                                                <label class="form-check-label" for="kondisi_engine_mesin_atas3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kondisi_engine_mesin_atas" id="kondisi_engine_mesin_atas4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="kondisi_engine_mesin_atas4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="turbo_mesin_atas">
                                        <label  class="label1">Turbo Mesin Atas</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="turbo_mesin_atas" id="turbo_mesin_atas1" value="Normal" required>
                                                <label class="form-check-label" for="turbo_mesin_atas1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="turbo_mesin_atas" id="turbo_mesin_atas2" value="Upnormal" required>
                                                <label class="form-check-label" for="turbo_mesin_atas2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="turbo_mesin_atas" id="turbo_mesin_atas3" value="Rusak" required>
                                                <label class="form-check-label" for="turbo_mesin_atas3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="turbo_mesin_atas" id="turbo_mesin_atas4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="turbo_mesin_atas4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6" id="cooling_system_mesin_atas">
                                        <label  class="label1">Cooling System Mesin Atas</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="cooling_system_mesin_atas" id="cooling_system_mesin_atas1" value="Normal" required>
                                                <label class="form-check-label" for="cooling_system_mesin_atas1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="cooling_system_mesin_atas" id="cooling_system_mesin_atas2" value="Upnormal" required>
                                                <label class="form-check-label" for="cooling_system_mesin_atas2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="cooling_system_mesin_atas" id="cooling_system_mesin_atas3" value="Rusak" required>
                                                <label class="form-check-label" for="cooling_system_mesin_atas3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="cooling_system_mesin_atas" id="cooling_system_mesin_atas4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="cooling_system_mesin_atas4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6" id="gas_accelerator_pedal_mesin_atas">
                                        <label  class="label1">Gas/Accelerator Pedal Mesin Atas</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gas_accelerator_pedal_mesin_atas" id="gas_accelerator_pedal_mesin_atas1" value="Normal" required>
                                                <label class="form-check-label" for="gas_accelerator_pedal_mesin_atas1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gas_accelerator_pedal_mesin_atas" id="gas_accelerator_pedal_mesin_atas2" value="Upnormal" required>
                                                <label class="form-check-label" for="gas_accelerator_pedal_mesin_atas2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gas_accelerator_pedal_mesin_atas" id="gas_accelerator_pedal_mesin_atas3" value="Rusak" required>
                                                <label class="form-check-label" for="gas_accelerator_pedal_mesin_atas3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gas_accelerator_pedal_mesin_atas" id="gas_accelerator_pedal_mesin_atas4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="gas_accelerator_pedal_mesin_atas4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6" id="pompa_hidrolis">
                                        <label  class="label1">Pompa Hidrolis</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pompa_hidrolis" id="pompa_hidrolis1" value="Normal" required>
                                                <label class="form-check-label" for="pompa_hidrolis1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pompa_hidrolis" id="pompa_hidrolis2" value="Upnormal" required>
                                                <label class="form-check-label" for="pompa_hidrolis2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pompa_hidrolis" id="pompa_hidrolis3" value="Rusak" required>
                                                <label class="form-check-label" for="pompa_hidrolis3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pompa_hidrolis" id="pompa_hidrolis4" value="Tidak bisa di test karena part lain rusak" required>
                                                <label class="form-check-label" for="pompa_hidrolis4">Tidak bisa di test karena part lain rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            


                            <div class="row">
                                <div class="col-sm-6" id="oli_mesin_bawah">
                                    <label  class="label1">Oli Mesin Bawah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_mesin_bawah" id="oli_mesin_bawah1" value="Batas Normal" required>
                                            <label class="form-check-label" for="oli_mesin_bawah1">Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_mesin_bawah" id="oli_mesin_bawah2" value="Dibawah Batas Normal" required>
                                            <label class="form-check-label" for="oli_mesin_bawah2">Dibawah Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_mesin_bawah" id="oli_mesin_bawah3" value="Ditambahkan" required>
                                            <label class="form-check-label" for="oli_mesin_bawah3">Ditambahkan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="air_radiator_mesin_bawah">
                                    <label  class="label1">Air Radiator Mesin Bawah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_radiator_mesin_bawah" id="air_radiator_mesin_bawah1" value="Batas Normal" required>
                                            <label class="form-check-label" for="air_radiator_mesin_bawah1">Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_radiator_mesin_bawah" id="air_radiator_mesin_bawah2" value="Dibawah Batas Normal" required>
                                            <label class="form-check-label" for="air_radiator_mesin_bawah2">Dibawah Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_radiator_mesin_bawah" id="air_radiator_mesin_bawah3" value="Ditambahkan" required>
                                            <label class="form-check-label" for="air_radiator_mesin_bawah3">Ditambahkan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           


                            
                            <div class="row">
                                <div class="col-sm-6" id="filter_oli_mesin_bawah">
                                    <label  class="label1">Filter Oli Mesin Bawah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_oli_mesin_bawah" id="filter_oli_mesin_bawah1" value="Baik" required>
                                            <label class="form-check-label" for="filter_oli_mesin_bawah1">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_oli_mesin_bawah" id="filter_oli_mesin_bawah2" value="Kotor" required>
                                            <label class="form-check-label" for="filter_oli_mesin_bawah2">Kotor</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_oli_mesin_bawah" id="filter_oli_mesin_bawah3" value="Perlu Penggantian" required>
                                            <label class="form-check-label" for="filter_oli_mesin_bawah3">Perlu Penggantian</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="filter_bahan_bakar_mesin_bawah">
                                    <label  class="label1">Filter Bahan Bakar Mesin Bawah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bahan_bakar_mesin_bawah" id="filter_bahan_bakar_mesin_bawah1" value="Baik" required>
                                            <label class="form-check-label" for="filter_bahan_bakar_mesin_bawah1">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bahan_bakar_mesin_bawah" id="filter_bahan_bakar_mesin_bawah2" value="Kotor" required>
                                            <label class="form-check-label" for="filter_bahan_bakar_mesin_bawah2">Kotor</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bahan_bakar_mesin_bawah" id="filter_bahan_bakar_mesin_bawah3" value="Perlu Penggantian" required>
                                            <label class="form-check-label" for="filter_bahan_bakar_mesin_bawah3">Perlu Penggantian</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="filter_udara_mesin_bawah">
                                    <label  class="label1">Filter Udara Mesin Bawah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_udara_mesin_bawah" id="filter_udara_mesin_bawah1" value="Baik" required>
                                            <label class="form-check-label" for="filter_udara_mesin_bawah1">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_udara_mesin_bawah" id="filter_udara_mesin_bawah2" value="Kotor" required>
                                            <label class="form-check-label" for="filter_udara_mesin_bawah2">Kotor</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_udara_mesin_bawah" id="filter_udara_mesin_bawah3" value="Perlu Penggantian" required>
                                            <label class="form-check-label" for="filter_udara_mesin_bawah3">Perlu Penggantian</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="previousSection('section2', 'section1')">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="nextSection('section2', 'section3')">Next</button>
                            </div>
                        </div>

                         <!-- Bagian 3 -->
                        <div class="form-section" id="section3" style="display: none;">
                            <label class="label1 mb-5" style="text-align: center; display: block;">Pengecekan Lampu</label>
                            <div class="row">
                                <div class="col-sm-6" id="headlamp_dekat">
                                    <label  class="label1">Headlamp (Lampu Utama)</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_dekat" id="headlamp_dekat1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="headlamp_dekat1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_dekat" id="headlamp_dekat_kiri_rusak" value="Kiri Normal Kanan Rusak" required>
                                            <label class="form-check-label" for="headlamp_dekat_kiri_rusak">Kiri Normal Kanan Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_dekat" id="headlamp_dekat_kanan_rusak" value="Kanan Normal Kiri Rusak" required>
                                            <label class="form-check-label" for="headlamp_dekat_kanan_rusak">Kanan Normal Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_dekat" id="headlamp_dekat_kedua_rusak" value="Kanan Kiri Rusak" required>
                                            <label class="form-check-label" for="headlamp_dekat_kedua_rusak">Kanan Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_dekat" id="headlamp_dekat_tidak" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="headlamp_dekat_tidak">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_dekat" id="headlamp_dekat_tidak_ada" value="Tidak ada" required>
                                            <label class="form-check-label" for="headlamp_dekat_tidak_ada">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="headlamp_jauh">
                                    <label  class="label1">Headlamp Jauh (DIM)</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_jauh" id="headlamp_jauh1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="headlamp_jauh1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_jauh" id="headlamp_jauh2" value="Kiri Normal Kanan Rusak" required>
                                            <label class="form-check-label" for="headlamp_jauh2">Kiri Normal Kanan Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_jauh" id="headlamp_jauh3" value="Kanan Normal Kiri Rusak" required>
                                            <label class="form-check-label" for="headlamp_jauh3">Kanan Normal Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="headlamp_jauh" id="headlamp_jauh4" value="Kanan Kiri Rusak" required>
                                            <label class="form-check-label" for="headlamp_jauh4">Kanan Kiri Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="reversing_lamp">
                                    <label  class="label1">Kondisi Reversing Lamp</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reversing_lamp" id="reversing_lamp1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="reversing_lamp1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reversing_lamp" id="reversing_lamp2" value="Kiri Normal Kanan Rusak" required>
                                            <label class="form-check-label" for="reversing_lamp2">Kiri Normal Kanan Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reversing_lamp" id="reversing_lamp3" value="Kanan Normal Kiri Rusak" required>
                                            <label class="form-check-label" for="reversing_lamp3">Kanan Normal Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reversing_lamp" id="reversing_lamp4" value="Kanan Kiri Rusak" required>
                                            <label class="form-check-label" for="reversing_lamp4">Kanan Kiri Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="folklamp">
                                    <label  class="label1">Folklamp</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="folklamp" id="folklamp1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="folklamp1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="folklamp" id="folklamp2" value="Kanan Normal Kiri Mati" required>
                                            <label class="form-check-label" for="folklamp2">Kanan Normal Kiri Mati</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="folklamp" id="folklamp3" value="Kanan Mati Kiri Normal" required>
                                            <label class="form-check-label" for="folklamp3">Kanan Mati Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="folklamp" id="folklamp4" value="Kanan Kiri Mati" required>
                                            <label class="form-check-label" for="folklamp4">Kanan Kiri Mati</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="folklamp" id="folklamp5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="folklamp5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="folklamp" id="folklamp6" value="Tidak ada" required>
                                            <label class="form-check-label" for="folklamp6">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="retting_depan">
                                    <label  class="label1">Retting Depan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_depan" id="retting_depan1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="retting_depan1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_depan" id="retting_depan2" value="Kanan Normal Kiri Mati" required>
                                            <label class="form-check-label" for="retting_depan2">Kanan Normal Kiri Mati</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_depan" id="retting_depan3" value="Kanan Mati Kiri Normal" required>
                                            <label class="form-check-label" for="retting_depan3">Kanan Mati Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_depan" id="retting_depan4" value="Kanan Kiri Mati" required>
                                            <label class="form-check-label" for="retting_depan4">Kanan Kiri Mati</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_depan" id="retting_depan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="retting_depan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="retting_belakang">
                                    <label  class="label1">Retting Belakang</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_belakang" id="retting_belakang1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="retting_belakang1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_belakang" id="retting_belakang2" value="Kanan Normal Kiri Mati" required>
                                            <label class="form-check-label" for="retting_belakang2">Kanan Normal Kiri Mati</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_belakang" id="retting_belakang3" value="Kanan Mati Kiri Normal" required>
                                            <label class="form-check-label" for="retting_belakang3">Kanan Mati Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_belakang" id="retting_belakang4" value="Kanan Kiri Mati" required>
                                            <label class="form-check-label" for="retting_belakang4">Kanan Kiri Mati</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="retting_belakang" id="retting_belakang5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="retting_belakang5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="stoplamp">
                                    <label  class="label1">Kondisi Stoplamp</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="stoplamp" id="stoplamp1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="stoplamp1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="stoplamp" id="stoplamp_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="stoplamp_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="stoplamp" id="stoplamp_kiri_rusak" value="Kanan Normal Kiri Rusak" required>
                                            <label class="form-check-label" for="stoplamp_kiri_rusak">Kanan Normal Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="stoplamp" id="stoplamp_kanan_rusak" value="Kiri Normal Kanan Rusak" required>
                                            <label class="form-check-label" for="stoplamp_kanan_rusak">Kiri Normal Kanan Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="lampu_atret">
                                    <label  class="label1">Kondisi Lampu Atret</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_atret" id="lampu_atret1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="lampu_atret1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_atret" id="lampu_atret2" value="Rusak" required>
                                            <label class="form-check-label" for="lampu_atret2">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_atret" id="lampu_atret3" value="Kanan Normal Kiri Rusak" required>
                                            <label class="form-check-label" for="lampu_atret3">Kanan Normal Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_atret" id="lampu_atret4" value="Kiri Normal Kanan Rusak" required>
                                            <label class="form-check-label" for="lampu_atret4">Kiri Normal Kanan Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="lampu_sorot">
                                    <label  class="label1">Kondisi Lampu Sorot</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_sorot" id="lampu_sorot1" value="Normal" required>
                                            <label class="form-check-label" for="lampu_sorot1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_sorot" id="lampu_sorot_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="lampu_sorot_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_sorot" id="lampu_sorot_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="lampu_sorot_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_sorot" id="lampu_sorot_tidak_ada" value="Tidak Ada" required>
                                            <label class="form-check-label" for="lampu_sorot_tidak_ada">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="lampu_kompartement">
                                    <label  class="label1">Lampu Kompartement</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_kompartement" id="lampu_kompartement1" value="Normal" required>
                                            <label class="form-check-label" for="lampu_kompartement1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_kompartement" id="lampu_kompartement2" value="Upnormal" required>
                                            <label class="form-check-label" for="lampu_kompartement2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_kompartement" id="lampu_kompartement3" value="Rusak" required>
                                            <label class="form-check-label" for="lampu_kompartement3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_kompartement" id="lampu_kompartement4" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="lampu_kompartement4">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_kompartement" id="lampu_kompartement5" value="Tidak ada" required>
                                            <label class="form-check-label" for="lampu_kompartement5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="lampu_body">
                                    <label  class="label1">Lampu Body</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_body" id="lampu_body1" value="Normal" required>
                                            <label class="form-check-label" for="lampu_body1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_body" id="lampu_body2" value="Upnormal" required>
                                            <label class="form-check-label" for="lampu_body2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_body" id="lampu_body3" value="Rusak" required>
                                            <label class="form-check-label" for="lampu_body3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_body" id="lampu_body4" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="lampu_body4">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lampu_body" id="lampu_body5" value="Tidak ada" required>
                                            <label class="form-check-label" for="lampu_body5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="rotary_lamp">
                                    <label  class="label1">Kondisi Rotary Lamp</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rotary_lamp" id="rotary_lamp1" value="Normal" required>
                                            <label class="form-check-label" for="rotary_lamp1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rotary_lamp" id="rotary_lamp_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="rotary_lamp_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rotary_lamp" id="rotary_lamp_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="rotary_lamp_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rotary_lamp" id="rotary_lamp_tidak_ada" value="Tidak Ada" required>
                                            <label class="form-check-label" for="rotary_lamp_tidak_ada">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="sign_lamp_depan">
                                    <label  class="label1">Kondisi Sign Lamp Depan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_depan" id="sign_lamp_depan1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="sign_lamp_depan1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_depan" id="sign_lamp_depan_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="sign_lamp_depan_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_depan" id="sign_lamp_depan_kiri_rusak" value="Kanan Normal Kiri Rusak" required>
                                            <label class="form-check-label" for="sign_lamp_depan_kiri_rusak">Kanan Normal Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_depan" id="sign_lamp_depan_kanan_rusak" value="Kiri Normal Kanan Rusak" required>
                                            <label class="form-check-label" for="sign_lamp_depan_kanan_rusak">Kiri Normal Kanan Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="sign_lamp_belakang">
                                    <label  class="label1">Kondisi Sign Lamp Belakang</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_belakang" id="sign_lamp_belakang1" value="Kanan Kiri Normal" required>
                                            <label class="form-check-label" for="sign_lamp_belakang1">Kanan Kiri Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_belakang" id="sign_lamp_belakang_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="sign_lamp_belakang_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_belakang" id="sign_lamp_belakang_kiri_rusak" value="Kanan Normal Kiri Rusak" required>
                                            <label class="form-check-label" for="sign_lamp_belakang_kiri_rusak">Kanan Normal Kiri Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="sign_lamp_belakang" id="sign_lamp_belakang_kanan_rusak" value="Kiri Normal Kanan Rusak" required>
                                            <label class="form-check-label" for="sign_lamp_belakang_kanan_rusak">Kiri Normal Kanan Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row" >
                                <div class="col-sm-6" id="vbelt_engine">
                                    <label  class="label1">V-Belt Engine</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vbelt_engine" id="vbelt_engine1" value="Kondisi Baik" required>
                                            <label class="form-check-label" for="vbelt_engine1">Kondisi Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vbelt_engine" id="vbelt_engine2" value="Perlu Penggantian" required>
                                            <label class="form-check-label" for="vbelt_engine2">Perlu Penggantian</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                           
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="previousSection('section3', 'section2')">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="nextSection('section3', 'section4')">Next</button>
                            </div>
                        </div>

                        <!-- Bagian 4 -->
                        <div class="form-section" id="section4" style="display: none;">
                            <label class="label1 mb-5" style="text-align: center; display: block;">Pengecekan Cabin</label>
                            <div class="row">
                                <div class="col-sm-6" id="air_coditioning">
                                    <label  class="label1">Kondisi Air Conditioning</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_coditioning" id="air_coditioning1" value="Normal" required>
                                            <label class="form-check-label" for="air_coditioning1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_coditioning" id="air_coditioning2" value="Upnormal" required>
                                            <label class="form-check-label" for="air_coditioning2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_coditioning" id="air_coditioning3" value="Rusak" required>
                                            <label class="form-check-label" for="air_coditioning3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_coditioning" id="air_coditioning4" value="Tidak Ada" required>
                                            <label class="form-check-label" for="air_coditioning4">Tidak Ada</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="air_coditioning" id="air_coditioning5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                            <label class="form-check-label" for="air_coditioning5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="jok_kendaraan">
                                    <label  class="label1">Kondisi Jok Kendaraan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jok_kendaraan" id="jok_kendaraan1" value="Kondisi Baik" required>
                                            <label class="form-check-label" for="jok_kendaraan1">Kondisi Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jok_kendaraan" id="jok_kendaraan_rusak_sebagian" value="Rusak Sebagian" required>
                                            <label class="form-check-label" for="jok_kendaraan_rusak_sebagian">Rusak Sebagian</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jok_kendaraan" id="jok_kendaraan_rusak_berat" value="Rusak Berat" required>
                                            <label class="form-check-label" for="jok_kendaraan_rusak_berat">Rusak Berat</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="indikator_dashboard">
                                    <label  class="label1">Kondisi Indikator Dashboard</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="indikator_dashboard" id="indikator_dashboard1" value="Indikator Normal Semua" required>
                                            <label class="form-check-label" for="indikator_dashboard1">Indikator Normal Semua</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="indikator_dashboard" id="indikator_dashboard_upnormal" value="Ada Indikator Upnormal" required>
                                            <label class="form-check-label" for="indikator_dashboard_upnormal">Ada Indikator Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="indikator_dashboard" id="indikator_dashboard_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="indikator_dashboard_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="indikator_dashboard" id="indikator_dashboard_tidak_bisa_ditest" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                            <label class="form-check-label" for="indikator_dashboard_tidak_bisa_ditest">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="cabin_lamp">
                                    <label  class="label1">Kondisi Cabin Lamp</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cabin_lamp" id="cabin_lamp1" value="Normal" required>
                                            <label class="form-check-label" for="cabin_lamp1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cabin_lamp" id="cabin_lamp2" value="Upnormal" required>
                                            <label class="form-check-label" for="cabin_lamp2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cabin_lamp" id="cabin_lamp3" value="Rusak" required>
                                            <label class="form-check-label" for="cabin_lamp3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cabin_lamp" id="cabin_lamp4" value="Tidak Ada" required>
                                            <label class="form-check-label" for="cabin_lamp4">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="klakson">
                                    <label  class="label1">Kondisi Klakson</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="klakson" id="klakson1" value="Normal" required>
                                            <label class="form-check-label" for="klakson1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="klakson" id="klakson_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="klakson_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="klakson" id="klakson_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="klakson_rusak">Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_wipper">
                                    <label  class="label1">Kondisi Wiper</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_wipper" id="fungsi_wipper1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_wipper1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_wipper" id="fungsi_wipper_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_wipper_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_wipper" id="fungsi_wipper_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_wipper_rusak">Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="central_lock">
                                    <label  class="label1">Kondisi Central Lock</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="central_lock" id="central_lock1" value="Normal Semua" required>
                                            <label class="form-check-label" for="central_lock1">Normal Semua</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="central_lock" id="central_lock2" value="Sebagian Upnormal" required>
                                            <label class="form-check-label" for="central_lock2">Sebagian Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="central_lock" id="central_lock3" value="Upnormal" required>
                                            <label class="form-check-label" for="central_lock3">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="central_lock" id="central_lock4" value="Rusak" required>
                                            <label class="form-check-label" for="central_lock4">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="central_lock" id="central_lock5" value="Tidak Ada" required>
                                            <label class="form-check-label" for="central_lock5">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="power_window_lock">
                                    <label  class="label1">Kondisi Power Window Lock</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="power_window_lock" id="power_window_lock1" value="Normal" required>
                                            <label class="form-check-label" for="power_window_lock1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="power_window_lock" id="power_window_lock2" value="Sebagian Upnormal" required>
                                            <label class="form-check-label" for="power_window_lock2">Sebagian Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="power_window_lock" id="power_window_lock3" value="Upnormal" required>
                                            <label class="form-check-label" for="power_window_lock3">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="power_window_lock" id="power_window_lock4" value="Rusak" required>
                                            <label class="form-check-label" for="power_window_lock4">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="power_window_lock" id="power_window_lock5" value="Tidak Ada" required>
                                            <label class="form-check-label" for="power_window_lock5">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="microphone">
                                    <label  class="label1">Kondisi Mikrofon</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="microphone" id="microphone1" value="Normal" required>
                                            <label class="form-check-label" for="microphone1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="microphone" id="microphone2" value="Upnormal" required>
                                            <label class="form-check-label" for="microphone2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="microphone" id="microphone3" value="Rusak" required>
                                            <label class="form-check-label" for="microphone3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="microphone" id="microphone4" value="Tidak Ada" required>
                                            <label class="form-check-label" for="microphone4">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                            
                            

                            <div class="row" id="reservoir_wiper">
                                <div class="col-sm-6">
                                    <label  class="label1">Reservoir Wiper</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reservoir_wiper" id="wiper1" value="Batas Normal" required>
                                            <label class="form-check-label" for="wiper1">Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="reservoir_wiper" id="wiper2" value="Dibawah Batas Normal" required>
                                            <label class="form-check-label" for="wiper2">Dibawah Batas Normal</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="previousSection('section4', 'section3')">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="nextSection('section4', 'section5')">Next</button>
                             </div>
                        </div>
                                     
                        <!-- Bagian 5 -->
                        <div class="form-section" id="section5" style="display: none;">
                            <label class="label1 mb-5" style="text-align: center; display: block;">Pengecekan Ban</label>
                            
                            <div class="row">
                                <div class="col-sm-6" id="ban_depan_kanan">
                                    <label  class="label1">Kondisi Ban Depan Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kanan" id="ban_depan_kanan1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_depan_kanan1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kanan" id="ban_depan_kanan_20_50" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_depan_kanan_20_50">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kanan" id="ban_depan_kanan_50_70" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_depan_kanan_50_70">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kanan" id="ban_depan_kanan_70_90" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_depan_kanan_70_90">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kanan" id="ban_depan_kanan_pecah" value="Pecah" required>
                                            <label class="form-check-label" for="ban_depan_kanan_pecah">Pecah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_tengah_kanan">
                                    <label  class="label1">Ban Tengah Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kanan" id="ban_tengah_kanan1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_tengah_kanan1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kanan" id="ban_tengah_kanan2" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_tengah_kanan2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kanan" id="ban_tengah_kanan3" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_tengah_kanan3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kanan" id="ban_tengah_kanan4" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_tengah_kanan4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kanan" id="ban_tengah_kanan5" value="Tidak ada" required>
                                            <label class="form-check-label" for="ban_tengah_kanan5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_belakang_kanan">
                                    <label  class="label1">Kondisi Ban Belakang Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kanan" id="ban_belakang_kanan1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_belakang_kanan1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kanan" id="ban_belakang_kanan2" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_belakang_kanan2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kanan" id="ban_belakang_kanan3" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_belakang_kanan3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kanan" id="ban_belakang_kanan4" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_belakang_kanan4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kanan" id="ban_belakang_kanan5" value="Pecah" required>
                                            <label class="form-check-label" for="ban_belakang_kanan5">Pecah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_depan_kiri">
                                    <label  class="label1">Kondisi Ban Depan Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kiri" id="ban_depan_kiri1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_depan_kiri1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kiri" id="ban_depan_kiri_20_50" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_depan_kiri_20_50">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kiri" id="ban_depan_kiri_50_70" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_depan_kiri_50_70">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kiri" id="ban_depan_kiri_70_90" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_depan_kiri_70_90">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_depan_kiri" id="ban_depan_kiri_pecah" value="Pecah" required>
                                            <label class="form-check-label" for="ban_depan_kiri_pecah">Pecah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_tengah_kiri">
                                    <label  class="label1">Ban Tengah Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kiri" id="ban_tengah_kiri1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_tengah_kiri1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kiri" id="ban_tengah_kiri2" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_tengah_kiri2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kiri" id="ban_tengah_kiri3" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_tengah_kiri3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kiri" id="ban_tengah_kiri4" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_tengah_kiri4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_kiri" id="ban_tengah_kiri5" value="Tidak ada" required>
                                            <label class="form-check-label" for="ban_tengah_kiri5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_belakang_kiri">
                                    <label  class="label1">Kondisi Ban Belakang Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kiri" id="ban_belakang_kiri1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_belakang_kiri1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kiri" id="ban_belakang_kiri2" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_belakang_kiri2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kiri" id="ban_belakang_kiri3" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_belakang_kiri3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kiri" id="ban_belakang_kiri4" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_belakang_kiri4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_belakang_kiri" id="ban_belakang_kiri5" value="Pecah" required>
                                            <label class="form-check-label" for="ban_belakang_kiri5">Pecah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_tengah_belakang">
                                    <label  class="label1">Ban Tengah Belakang</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_belakang" id="ban_tengah_belakang1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_tengah_belakang1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_belakang" id="ban_tengah_belakang2" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_tengah_belakang2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_belakang" id="ban_tengah_belakang3" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_tengah_belakang3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_belakang" id="ban_tengah_belakang4" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_tengah_belakang4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_tengah_belakang" id="ban_tengah_belakang5" value="Tidak ada" required>
                                            <label class="form-check-label" for="ban_tengah_belakang5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_kanan">
                                    <label  class="label1">Kondisi Ban Kanan </label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kanan" id="ban_kanan1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_kanan1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kanan" id="ban_kanan_20_50" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_kanan_20_50">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kanan" id="ban_kanan_50_70" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_kanan_50_70">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kanan" id="ban_kanan_70_90" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_kanan_70_90">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kanan" id="ban_kanan_tidak_ada" value="Tidak Ada" required>
                                            <label class="form-check-label" for="ban_kanan_tidak_ada">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_kiri">
                                    <label  class="label1">Kondisi Ban kiri </label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kiri" id="ban_kiri1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_kiri1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kiri" id="ban_kiri_20_50" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_kiri_20_50">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kiri" id="ban_kiri_50_70" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_kiri_50_70">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kiri" id="ban_kiri_70_90" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_kiri_70_90">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_kiri" id="ban_kiri_tidak_ada" value="Tidak Ada" required>
                                            <label class="form-check-label" for="ban_kiri_tidak_ada">Tidak Ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="ban_cadangan">
                                    <label  class="label1">Kondisi Ban Cadangan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_cadangan" id="ban_cadangan1" value="0%-20%" required>
                                            <label class="form-check-label" for="ban_cadangan1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_cadangan" id="ban_cadangan_20_50" value="20%-50%" required>
                                            <label class="form-check-label" for="ban_cadangan_20_50">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_cadangan" id="ban_cadangan_50_70" value="50%-70%" required>
                                            <label class="form-check-label" for="ban_cadangan_50_70">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_cadangan" id="ban_cadangan_70_90" value="70%-90%" required>
                                            <label class="form-check-label" for="ban_cadangan_70_90">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_cadangan" id="ban_cadangan_pecah" value="Pecah" required>
                                            <label class="form-check-label" for="ban_cadangan_pecah">Pecah</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_cadangan" id="ban_cadangan_tidak_ada" value="Tidak Ada Ban Cadangan" required>
                                            <label class="form-check-label" for="ban_cadangan_tidak_ada">Tidak Ada Ban Cadangan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ban_cadangan" id="ban_cadangan_bocor" value="Bocor" required>
                                            <label class="form-check-label" for="ban_cadangan_bocor">Bocor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="tekanan_angin">
                                    <label  class="label1">Kondisi Tekanan Ban</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tekanan_angin" id="tekanan_angin1" value="Normal" required>
                                            <label class="form-check-label" for="tekanan_angin1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tekanan_angin" id="tekanan_angin_kurang" value="Kurang" required>
                                            <label class="form-check-label" for="tekanan_angin_kurang">Kurang</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tekanan_angin" id="tekanan_angin_ditambah" value="Ditambah" required>
                                            <label class="form-check-label" for="tekanan_angin_ditambah">Ditambah</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        

                            

                        
                            
                        
                            <div class="row">
                            <div class="col-sm-6" id="sistem_pendingin">
                                <label  class="label1">Sistem Pendingin</label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sistem_pendingin" id="sistem_pendingin1" value="Normal" required>
                                        <label class="form-check-label" for="sistem_pendingin1">Normal</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sistem_pendingin" id="pendingin2" value="Upnormal" required>
                                        <label class="form-check-label" for="pendingin2">Upnormal</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sistem_pendingin" id="pendingin3" value="Rusak" required>
                                        <label class="form-check-label" for="pendingin3">Rusak</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sistem_pendingin" id="pendingin4" value="Normal Dengan Catatan" required>
                                        <label class="form-check-label" for="pendingin4">Normal Dengan Catatan</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sistem_pendingin" id="pendingin5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                        <label class="form-check-label" for="pendingin5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                    </div>
                                </div>
                            </div>
                            </div>

                           <div class="row" id="timing_belt">
                                <div class="col-sm-6">
                                    <label  class="label1">Timing Belt</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="timing_belt" id="timing1" value="Normal" required>
                                            <label class="form-check-label" for="timing1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="timing_belt" id="timing2" value="Upnormal" required>
                                            <label class="form-check-label" for="timing2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="timing_belt" id="timing3" value="Rusak" required>
                                            <label class="form-check-label" for="timing3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="timing_belt" id="timing4" value="Perlu Penggantian (KM Lebih Dari 150RB)" required>
                                            <label class="form-check-label" for="timing4">Perlu Penggantian (KM Lebih Dari 150RB)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="timing_belt" id="timing5" value="Normal Dengan Catatan" required>
                                            <label class="form-check-label" for="timing5">Normal Dengan Catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="timing_belt" id="timing6" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                            <label class="form-check-label" for="timing6">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="previousSection('section5', 'section4')">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="nextSection('section5', 'section6')">Next</button>
                            </div>
                        </div>
                    
                        <!-- Bagian 6 -->
                        <div class="form-section" id="section6" style="display: none;">
                            <label class="label1 mb-5" style="text-align: center; display: block;">Pengecekan Peralatan Khusus</label>
                           
                            <div class="row">
                                <div class="col-sm-6" id="pompa_fire_fighting">
                                    <label  class="label1">Pompa Fire Fighting</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_fire_fighting" id="pompa_fire_fighting1" value="Normal" required>
                                            <label class="form-check-label" for="pompa_fire_fighting1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_fire_fighting" id="pompa_fire_fighting2" value="Upnormal" required>
                                            <label class="form-check-label" for="pompa_fire_fighting2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_fire_fighting" id="pompa_fire_fighting3" value="Rusak" required>
                                            <label class="form-check-label" for="pompa_fire_fighting3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_fire_fighting" id="pompa_fire_fighting4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="pompa_fire_fighting4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_fire_fighting" id="pompa_fire_fighting5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="pompa_fire_fighting5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="primming_pump">
                                    <label  class="label1">Primming Pump</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="primming_pump" id="primming_pump1" value="Normal" required>
                                            <label class="form-check-label" for="primming_pump1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="primming_pump" id="primming_pump2" value="Upnormal" required>
                                            <label class="form-check-label" for="primming_pump2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="primming_pump" id="primming_pump3" value="Rusak" required>
                                            <label class="form-check-label" for="primming_pump3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="primming_pump" id="primming_pump4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="primming_pump4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="primming_pump" id="primming_pump5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="primming_pump5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="roof_turret">
                                    <label  class="label1">Roof Turret</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="roof_turret" id="roof_turret1" value="Normal" required>
                                            <label class="form-check-label" for="roof_turret1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="roof_turret" id="roof_turret2" value="Upnormal" required>
                                            <label class="form-check-label" for="roof_turret2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="roof_turret" id="roof_turret3" value="Rusak" required>
                                            <label class="form-check-label" for="roof_turret3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="roof_turret" id="roof_turret4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="roof_turret4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="roof_turret" id="roof_turret5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="roof_turret5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="bumper_turret">
                                    <label  class="label1">Bumper Turret</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bumper_turret" id="bumper_turret1" value="Normal" required>
                                            <label class="form-check-label" for="bumper_turret1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bumper_turret" id="bumper_turret2" value="Upnormal" required>
                                            <label class="form-check-label" for="bumper_turret2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bumper_turret" id="bumper_turret3" value="Rusak" required>
                                            <label class="form-check-label" for="bumper_turret3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bumper_turret" id="bumper_turret4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="bumper_turret4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="bumper_turret" id="bumper_turret5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="bumper_turret5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="undertrack_spray_depan">
                                    <label  class="label1">Undertrack Spray Depan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_depan" id="undertrack_spray_depan1" value="Normal" required>
                                            <label class="form-check-label" for="undertrack_spray_depan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_depan" id="undertrack_spray_depan2" value="Upnormal" required>
                                            <label class="form-check-label" for="undertrack_spray_depan2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_depan" id="undertrack_spray_depan3" value="Rusak" required>
                                            <label class="form-check-label" for="undertrack_spray_depan3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_depan" id="undertrack_spray_depan4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="undertrack_spray_depan4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_depan" id="undertrack_spray_depan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="undertrack_spray_depan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="undertrack_spray_kanan">
                                    <label  class="label1">Undertrack Spray Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kanan" id="undertrack_spray_kanan1" value="Normal" required>
                                            <label class="form-check-label" for="undertrack_spray_kanan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kanan" id="undertrack_spray_kanan2" value="Upnormal" required>
                                            <label class="form-check-label" for="undertrack_spray_kanan2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kanan" id="undertrack_spray_kanan3" value="Rusak" required>
                                            <label class="form-check-label" for="undertrack_spray_kanan3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kanan" id="undertrack_spray_kanan4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="undertrack_spray_kanan4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kanan" id="undertrack_spray_kanan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="undertrack_spray_kanan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="undertrack_spray_kiri">
                                    <label  class="label1">Undertrack Spray Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kiri" id="undertrack_spray_kiri1" value="Normal" required>
                                            <label class="form-check-label" for="undertrack_spray_kiri1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kiri" id="undertrack_spray_kiri2" value="Upnormal" required>
                                            <label class="form-check-label" for="undertrack_spray_kiri2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kiri" id="undertrack_spray_kiri3" value="Rusak" required>
                                            <label class="form-check-label" for="undertrack_spray_kiri3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kiri" id="undertrack_spray_kiri4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="undertrack_spray_kiri4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="undertrack_spray_kiri" id="undertrack_spray_kiri5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="undertrack_spray_kiri5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="foam_proportioner">
                                    <label  class="label1">Foam Proportioner</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="foam_proportioner" id="foam_proportioner1" value="Normal" required>
                                            <label class="form-check-label" for="foam_proportioner1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="foam_proportioner" id="foam_proportioner2" value="Upnormal" required>
                                            <label class="form-check-label" for="foam_proportioner2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="foam_proportioner" id="foam_proportioner3" value="Rusak" required>
                                            <label class="form-check-label" for="foam_proportioner3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="foam_proportioner" id="foam_proportioner4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="foam_proportioner4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="foam_proportioner" id="foam_proportioner5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="foam_proportioner5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="tangki_air">
                                    <label  class="label1">Tangki Air</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_air" id="tangki_air1" value="Normal" required>
                                            <label class="form-check-label" for="tangki_air1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_air" id="tangki_air2" value="Upnormal" required>
                                            <label class="form-check-label" for="tangki_air2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_air" id="tangki_air3" value="Rusak" required>
                                            <label class="form-check-label" for="tangki_air3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_air" id="tangki_air4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="tangki_air4">Normal dengan catatan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="tangki_foam">
                                    <label  class="label1">Tangki Foam</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_foam" id="tangki_foam1" value="Normal" required>
                                            <label class="form-check-label" for="tangki_foam1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_foam" id="tangki_foam2" value="Upnormal" required>
                                            <label class="form-check-label" for="tangki_foam2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_foam" id="tangki_foam3" value="Rusak" required>
                                            <label class="form-check-label" for="tangki_foam3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tangki_foam" id="tangki_foam4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="tangki_foam4">Normal dengan catatan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="pengisian_air_eksternal">
                                    <label  class="label1">Pengisian Air Eksternal</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pengisian_air_eksternal" id="pengisian_air_eksternal1" value="Normal" required>
                                            <label class="form-check-label" for="pengisian_air_eksternal1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pengisian_air_eksternal" id="pengisian_air_eksternal2" value="Upnormal" required>
                                            <label class="form-check-label" for="pengisian_air_eksternal2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pengisian_air_eksternal" id="pengisian_air_eksternal3" value="Rusak" required>
                                            <label class="form-check-label" for="pengisian_air_eksternal3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pengisian_air_eksternal" id="pengisian_air_eksternal4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="pengisian_air_eksternal4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pengisian_air_eksternal" id="pengisian_air_eksternal5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="pengisian_air_eksternal5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pengisian_air_eksternal" id="pengisian_air_eksternal6" value="Tidak ada" required>
                                            <label class="form-check-label" for="pengisian_air_eksternal6">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="charger_baterai_eksternal">
                                    <label  class="label1">Charger Baterai Eksternal</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="charger_baterai_eksternal" id="charger_baterai_eksternal1" value="Normal" required>
                                            <label class="form-check-label" for="charger_baterai_eksternal1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="charger_baterai_eksternal" id="charger_baterai_eksternal2" value="Upnormal" required>
                                            <label class="form-check-label" for="charger_baterai_eksternal2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="charger_baterai_eksternal" id="charger_baterai_eksternal3" value="Rusak" required>
                                            <label class="form-check-label" for="charger_baterai_eksternal3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="charger_baterai_eksternal" id="charger_baterai_eksternal4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="charger_baterai_eksternal4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="charger_baterai_eksternal" id="charger_baterai_eksternal5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="charger_baterai_eksternal5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="charger_baterai_eksternal" id="charger_baterai_eksternal6" value="Tidak ada" required>
                                            <label class="form-check-label" for="charger_baterai_eksternal6">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_hisapan_vacum">
                                    <label  class="label1">Fungsi Hisapan Vacum</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hisapan_vacum" id="fungsi_hisapan_vacum1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_hisapan_vacum1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hisapan_vacum" id="fungsi_hisapan_vacum2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_hisapan_vacum2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hisapan_vacum" id="fungsi_hisapan_vacum3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_hisapan_vacum3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hisapan_vacum" id="fungsi_hisapan_vacum4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_hisapan_vacum4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hisapan_vacum" id="fungsi_hisapan_vacum5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_hisapan_vacum5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_gerakan_vacum">
                                    <label  class="label1">Fungsi Gerakan Vacum</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_vacum" id="fungsi_gerakan_vacum1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_vacum1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_vacum" id="fungsi_gerakan_vacum2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_vacum2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_vacum" id="fungsi_gerakan_vacum3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_vacum3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_vacum" id="fungsi_gerakan_vacum4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_gerakan_vacum4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_vacum" id="fungsi_gerakan_vacum5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_vacum5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_putaran_sapu_kanan">
                                    <label  class="label1">Fungsi Putaran Sapu Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kanan" id="fungsi_putaran_sapu_kanan1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kanan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kanan" id="fungsi_putaran_sapu_kanan2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kanan2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kanan" id="fungsi_putaran_sapu_kanan3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kanan3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kanan" id="fungsi_putaran_sapu_kanan4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kanan4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kanan" id="fungsi_putaran_sapu_kanan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kanan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_putaran_sapu_kiri">
                                    <label  class="label1">Fungsi Putaran Sapu Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kiri" id="fungsi_putaran_sapu_kiri1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kiri1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kiri" id="fungsi_putaran_sapu_kiri2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kiri2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kiri" id="fungsi_putaran_sapu_kiri3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kiri3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kiri" id="fungsi_putaran_sapu_kiri4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kiri4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_kiri" id="fungsi_putaran_sapu_kiri5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_kiri5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_putaran_sapu_tengah">
                                    <label  class="label1">Fungsi Putaran Sapu Tengah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_tengah" id="fungsi_putaran_sapu_tengah1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_tengah1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_tengah" id="fungsi_putaran_sapu_tengah2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_tengah2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_tengah" id="fungsi_putaran_sapu_tengah3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_tengah3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_tengah" id="fungsi_putaran_sapu_tengah4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_tengah4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_sapu_tengah" id="fungsi_putaran_sapu_tengah5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_sapu_tengah5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_gerakan_sapu_kanan">
                                    <label  class="label1">Fungsi Gerakan Sapu Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kanan" id="fungsi_gerakan_sapu_kanan1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kanan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kanan" id="fungsi_gerakan_sapu_kanan2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kanan2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kanan" id="fungsi_gerakan_sapu_kanan3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kanan3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kanan" id="fungsi_gerakan_sapu_kanan4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kanan4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kanan" id="fungsi_gerakan_sapu_kanan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kanan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_gerakan_sapu_kiri">
                                    <label  class="label1">Fungsi Gerakan Sapu Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kiri" id="fungsi_gerakan_sapu_kiri1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kiri1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kiri" id="fungsi_gerakan_sapu_kiri2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kiri2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kiri" id="fungsi_gerakan_sapu_kiri3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kiri3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kiri" id="fungsi_gerakan_sapu_kiri4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kiri4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_kiri" id="fungsi_gerakan_sapu_kiri5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_kiri5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_gerakan_sapu_tengah">
                                    <label  class="label1">Fungsi Gerakan Sapu Tengah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_tengah" id="fungsi_gerakan_sapu_tengah1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_tengah1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_tengah" id="fungsi_gerakan_sapu_tengah2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_tengah2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_tengah" id="fungsi_gerakan_sapu_tengah3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_tengah3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_tengah" id="fungsi_gerakan_sapu_tengah4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_tengah4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_sapu_tengah" id="fungsi_gerakan_sapu_tengah5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_sapu_tengah5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6" id="fungsi_spray_bar_depan">
                                    <label  class="label1">Fungsi Spray Bar Depan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_depan" id="fungsi_spray_bar_depan1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_depan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_depan" id="fungsi_spray_bar_depan2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_depan2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_depan" id="fungsi_spray_bar_depan3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_depan3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_depan" id="fungsi_spray_bar_depan4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_depan4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_depan" id="fungsi_spray_bar_depan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_depan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_spray_bar_kiri">
                                    <label  class="label1">Fungsi Spray Bar Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kiri" id="fungsi_spray_bar_kiri1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kiri1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kiri" id="fungsi_spray_bar_kiri2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kiri2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kiri" id="fungsi_spray_bar_kiri3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kiri3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kiri" id="fungsi_spray_bar_kiri4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kiri4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kiri" id="fungsi_spray_bar_kiri5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kiri5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_spray_bar_kanan">
                                    <label  class="label1">Fungsi Spray Bar Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kanan" id="fungsi_spray_bar_kanan1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kanan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kanan" id="fungsi_spray_bar_kanan2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kanan2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kanan" id="fungsi_spray_bar_kanan3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kanan3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kanan" id="fungsi_spray_bar_kanan4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kanan4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar_kanan" id="fungsi_spray_bar_kanan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_kanan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_jet_spray_gun">
                                    <label  class="label1">Fungsi Jet Spray Gun</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_jet_spray_gun" id="fungsi_jet_spray_gun1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_jet_spray_gun1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_jet_spray_gun" id="fungsi_jet_spray_gun2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_jet_spray_gun2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_jet_spray_gun" id="fungsi_jet_spray_gun3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_jet_spray_gun3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_jet_spray_gun" id="fungsi_jet_spray_gun4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_jet_spray_gun4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_jet_spray_gun" id="fungsi_jet_spray_gun5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_jet_spray_gun5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_hidrolis_hooper">
                                    <label  class="label1">Fungsi Hidrolis Hooper</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_hooper" id="fungsi_hidrolis_hooper1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_hooper1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_hooper" id="fungsi_hidrolis_hooper2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_hooper2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_hooper" id="fungsi_hidrolis_hooper3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_hooper3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_hooper" id="fungsi_hidrolis_hooper4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_hooper4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_hooper" id="fungsi_hidrolis_hooper5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_hooper5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_hidrolis_tutup_hooper">
                                    <label  class="label1">Fungsi Hidrolis Tutup Hooper</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_tutup_hooper" id="fungsi_hidrolis_tutup_hooper1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_tutup_hooper1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_tutup_hooper" id="fungsi_hidrolis_tutup_hooper2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_tutup_hooper2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_tutup_hooper" id="fungsi_hidrolis_tutup_hooper3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_tutup_hooper3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_tutup_hooper" id="fungsi_hidrolis_tutup_hooper4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_tutup_hooper4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_tutup_hooper" id="fungsi_hidrolis_tutup_hooper5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_tutup_hooper5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_monitor_control">
                                    <label  class="label1">Fungsi Monitor Control</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_monitor_control" id="fungsi_monitor_control1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_monitor_control1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_monitor_control" id="fungsi_monitor_control2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_monitor_control2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_monitor_control" id="fungsi_monitor_control3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_monitor_control3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_monitor_control" id="fungsi_monitor_control4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_monitor_control4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_monitor_control" id="fungsi_monitor_control5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_monitor_control5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_pendant">
                                    <label  class="label1">Fungsi Pendant</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pendant" id="fungsi_pendant1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_pendant1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pendant" id="fungsi_pendant2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_pendant2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pendant" id="fungsi_pendant3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_pendant3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pendant" id="fungsi_pendant4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_pendant4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pendant" id="fungsi_pendant5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_pendant5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="pompa_uhp">
                                <div class="col-sm-6">
                                    <label  class="label1">Pompa UHP</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_uhp" id="pompa_uhp1" value="Normal" required>
                                            <label class="form-check-label" for="pompa_uhp1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_uhp" id="pompa_uhp2" value="Upnormal" required>
                                            <label class="form-check-label" for="pompa_uhp2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_uhp" id="pompa_uhp3" value="Rusak" required>
                                            <label class="form-check-label" for="pompa_uhp3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_uhp" id="pompa_uhp_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="pompa_uhp_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pompa_uhp" id="pompa_uhp_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="pompa_uhp_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="pto_kopling_pompa">
                                <div class="col-sm-6">
                                    <label  class="label1">PTO Kopling Pompa</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pto_kopling_pompa" id="pto_kopling_pompa1" value="Normal" required>
                                            <label class="form-check-label" for="pto_kopling_pompa1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pto_kopling_pompa" id="pto_kopling_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="pto_kopling_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pto_kopling_pompa" id="pto_kopling_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="pto_kopling_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pto_kopling_pompa" id="pto_kopling_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="pto_kopling_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pto_kopling_pompa" id="pto_kopling_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="pto_kopling_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="v_belt_pompa_uhp">
                                <div class="col-sm-6">
                                    <label  class="label1">V-Belt Pompa UHP</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="v_belt_pompa_uhp" id="v_belt_pompa_uhp1" value="Normal" required>
                                            <label class="form-check-label" for="v_belt_pompa_uhp1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="v_belt_pompa_uhp" id="v_belt_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="v_belt_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="v_belt_pompa_uhp" id="v_belt_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="v_belt_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="v_belt_pompa_uhp" id="v_belt_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="v_belt_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="v_belt_pompa_uhp" id="v_belt_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="v_belt_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="kampas_kopling_pompa_uhp">
                                <div class="col-sm-6">
                                    <label  class="label1">Kampas Kopling Pompa UHP</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kampas_kopling_pompa_uhp" id="kampas_kopling_pompa_uhp1" value="Normal" required>
                                            <label class="form-check-label" for="kampas_kopling_pompa_uhp1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kampas_kopling_pompa_uhp" id="kampas_kopling_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="kampas_kopling_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kampas_kopling_pompa_uhp" id="kampas_kopling_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="kampas_kopling_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kampas_kopling_pompa_uhp" id="kampas_kopling_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="kampas_kopling_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kampas_kopling_pompa_uhp" id="kampas_kopling_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="kampas_kopling_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="kompresor_pompa_uhp">
                                <div class="col-sm-6">
                                    <label  class="label1">Kompresor Pompa UHP</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kompresor_pompa_uhp" id="kompresor_pompa_uhp1" value="Normal" required>
                                            <label class="form-check-label" for="kompresor_pompa_uhp1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kompresor_pompa_uhp" id="kompresor_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="kompresor_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kompresor_pompa_uhp" id="kompresor_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="kompresor_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kompresor_pompa_uhp" id="kompresor_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="kompresor_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kompresor_pompa_uhp" id="kompresor_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="kompresor_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="vacum_hose_3_inch">
                                <div class="col-sm-6">
                                    <label  class="label1">Vacum Hose 3 Inch</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_3_inch" id="vacum_hose_3_inch1" value="Normal" required>
                                            <label class="form-check-label" for="vacum_hose_3_inch1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_3_inch" id="vacum_hose_3_inch_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="vacum_hose_3_inch_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_3_inch" id="vacum_hose_3_inch_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="vacum_hose_3_inch_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_3_inch" id="vacum_hose_3_inch_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="vacum_hose_3_inch_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_3_inch" id="vacum_hose_3_inch_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="vacum_hose_3_inch_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="vacum_hose_4_inch">
                                <div class="col-sm-6">
                                    <label  class="label1">Vacum Hose 4 Inch</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_4_inch" id="vacum_hose_4_inch1" value="Normal" required>
                                            <label class="form-check-label" for="vacum_hose_4_inch1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_4_inch" id="vacum_hose_4_inch_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="vacum_hose_4_inch_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_4_inch" id="vacum_hose_4_inch_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="vacum_hose_4_inch_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_4_inch" id="vacum_hose_4_inch_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="vacum_hose_4_inch_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_4_inch" id="vacum_hose_4_inch_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="vacum_hose_4_inch_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="vacum_hose_6_inch">
                                <div class="col-sm-6">
                                    <label  class="label1">Vacum Hose 6 Inch</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_6_inch" id="vacum_hose_6_inch1" value="Normal" required>
                                            <label class="form-check-label" for="vacum_hose_6_inch1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_6_inch" id="vacum_hose_6_inch_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="vacum_hose_6_inch_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_6_inch" id="vacum_hose_6_inch_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="vacum_hose_6_inch_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_6_inch" id="vacum_hose_6_inch_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="vacum_hose_6_inch_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="vacum_hose_6_inch" id="vacum_hose_6_inch_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="vacum_hose_6_inch_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="hose_40k">
                                <div class="col-sm-6">
                                    <label  class="label1">Hose 40K</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hose_40k" id="hose_40k1" value="Normal" required>
                                            <label class="form-check-label" for="hose_40k1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hose_40k" id="hose_40k_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="hose_40k_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hose_40k" id="hose_40k_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="hose_40k_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hose_40k" id="hose_40k_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="hose_40k_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="hose_40k" id="hose_40k_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="hose_40k_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="filter_cartridge">
                                <div class="col-sm-6">
                                    <label  class="label1">Filter Cartridge</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_cartridge" id="filter_cartridge1" value="Normal" required>
                                            <label class="form-check-label" for="filter_cartridge1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_cartridge" id="filter_cartridge_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="filter_cartridge_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_cartridge" id="filter_cartridge_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="filter_cartridge_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_cartridge" id="filter_cartridge_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="filter_cartridge_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_cartridge" id="filter_cartridge_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="filter_cartridge_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="filter_bag_10_micron">
                                <div class="col-sm-6">
                                    <label  class="label1">Filter Bag 10 Micron</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bag_10_micron" id="filter_bag_10_micron1" value="Normal" required>
                                            <label class="form-check-label" for="filter_bag_10_micron1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bag_10_micron" id="filter_bag_10_micron_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="filter_bag_10_micron_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bag_10_micron" id="filter_bag_10_micron_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="filter_bag_10_micron_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bag_10_micron" id="filter_bag_10_micron_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="filter_bag_10_micron_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="filter_bag_10_micron" id="filter_bag_10_micron_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="filter_bag_10_micron_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="debris_bag">
                                <div class="col-sm-6">
                                    <label  class="label1">Debris Bag</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="debris_bag" id="debris_bag1" value="Baik" required>
                                            <label class="form-check-label" for="debris_bag1">Baik</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="debris_bag" id="debris_bag_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="debris_bag_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="debris_bag" id="debris_bag_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="debris_bag_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="debris_bag" id="debris_bag_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="debris_bag_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" id="running_test_40k_engine">
                                <div class="col-sm-6">
                                    <label  class="label1">Running Test 40K Engine</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="running_test_40k_engine" id="running_test_40k_engine1" value="Normal" required>
                                            <label class="form-check-label" for="running_test_40k_engine1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="running_test_40k_engine" id="running_test_40k_engine_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="running_test_40k_engine_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="running_test_40k_engine" id="running_test_40k_engine_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="running_test_40k_engine_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="running_test_40k_engine" id="running_test_40k_engine_normal_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="running_test_40k_engine_normal_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="running_test_40k_engine" id="running_test_40k_engine_tidak_dapat_ditest" value="Tidak dapat di test karena part lain rusak" required>
                                            <label class="form-check-label" for="running_test_40k_engine_tidak_dapat_ditest">Tidak dapat di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_gerakan_shourd">
                                    <label class="label1">Fungsi Gerakan Shourd</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_shourd" id="fungsi_gerakan_shourd1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_shourd1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_shourd" id="fungsi_gerakan_shourd_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_gerakan_shourd_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_shourd" id="fungsi_gerakan_shourd_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_shourd_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_shourd" id="fungsi_gerakan_shourd_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_gerakan_shourd_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_gerakan_shourd" id="fungsi_gerakan_shourd_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_gerakan_shourd_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Fungsi Putaran Kumparan -->
                            <div class="row">
                                <div class="col-sm-6" id="fungsi_putaran_kumparan">
                                    <label class="label1">Fungsi Putaran Kumparan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_kumparan" id="fungsi_putaran_kumparan1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_putaran_kumparan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_kumparan" id="fungsi_putaran_kumparan_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_putaran_kumparan_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_kumparan" id="fungsi_putaran_kumparan_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_kumparan_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_kumparan" id="fungsi_putaran_kumparan_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_putaran_kumparan_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_putaran_kumparan" id="fungsi_putaran_kumparan_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_putaran_kumparan_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Nozzle -->
                            <div class="row">
                                <div class="col-sm-6" id="nozzle">
                                    <label class="label1">Nozzle</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nozzle" id="nozzle1" value="Normal" required>
                                            <label class="form-check-label" for="nozzle1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nozzle" id="nozzle_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="nozzle_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nozzle" id="nozzle_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="nozzle_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nozzle" id="nozzle_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="nozzle_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nozzle" id="nozzle_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="nozzle_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Nozzle -->
                             <div class="row">
                                <div class="col-sm-6" id="selang_hidrolis">
                                    <label class="label1">Selang Hidrolis</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="selang_hidrolis" id="selang_hidrolis1" value="Normal" required>
                                            <label class="form-check-label" for="selang_hidrolis1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="selang_hidrolis" id="selang_hidrolis_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="selang_hidrolis_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="selang_hidrolis" id="selang_hidrolis_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="selang_hidrolis_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="selang_hidrolis" id="selang_hidrolis_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="selang_hidrolis_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="selang_hidrolis" id="selang_hidrolis_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="selang_hidrolis_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Nozzle -->
                             <div class="row">
                                <div class="col-sm-6" id="seal_brush_button">
                                    <label class="label1">Seal Brush Button</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_brush_button" id="seal_brush_button1" value="Normal" required>
                                            <label class="form-check-label" for="seal_brush_button1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_brush_button" id="seal_brush_button_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="seal_brush_button_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_brush_button" id="seal_brush_button_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="seal_brush_button_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_brush_button" id="seal_brush_button_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="seal_brush_button_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_brush_button" id="seal_brush_button_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="seal_brush_button_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Nozzle -->
                             <div class="row">
                                <div class="col-sm-6" id="seal_swifel_shaft">
                                    <label class="label1">Seal Swifel Shaft</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_swifel_shaft" id="seal_swifel_shaft1" value="Normal" required>
                                            <label class="form-check-label" for="seal_swifel_shaft1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_swifel_shaft" id="seal_swifel_shaft_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="seal_swifel_shaft_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_swifel_shaft" id="seal_swifel_shaft_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="seal_swifel_shaft_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_swifel_shaft" id="seal_swifel_shaft_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="seal_swifel_shaft_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_swifel_shaft" id="seal_swifel_shaft_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="seal_swifel_shaft_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Nozzle -->
                             <div class="row">
                                <div class="col-sm-6" id="seal_gasket">
                                    <label class="label1">Seal Gasket</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_gasket" id="seal_gasket1" value="Normal" required>
                                            <label class="form-check-label" for="seal_gasket1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_gasket" id="seal_gasket_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="seal_gasket_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_gasket" id="seal_gasket_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="seal_gasket_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_gasket" id="seal_gasket_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="seal_gasket_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_gasket" id="seal_gasket_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="seal_gasket_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!-- Nozzle -->
                             <div class="row">
                                <div class="col-sm-6" id="seal_upper">
                                    <label class="label1">Seal Upper</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_upper" id="seal_upper1" value="Normal" required>
                                            <label class="form-check-label" for="seal_upper1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_upper" id="seal_upper_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="seal_upper_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_upper" id="seal_upper_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="seal_upper_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_upper" id="seal_upper_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="seal_upper_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="seal_upper" id="seal_upper_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="seal_upper_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                             <!-- Nozzle -->
                             <div class="row">
                                <div class="col-sm-6" id="drit_shield">
                                    <label class="label1">Drit Shield</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="drit_shield" id="drit_shield1" value="Normal" required>
                                            <label class="form-check-label" for="drit_shield1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="drit_shield" id="drit_shield_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="drit_shield_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="drit_shield" id="drit_shield_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="drit_shield_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="drit_shield" id="drit_shield_catatan" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="drit_shield_catatan">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="drit_shield" id="drit_shield_test" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="drit_shield_test">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-sm-6" id="handrem_tangki_air">
                                    <label  class="label1">Handrem Tangki Air</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="handrem_tangki_air" id="handrem_tangki_air1" value="Normal" required>
                                            <label class="form-check-label" for="handrem_tangki_air1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="handrem_tangki_air" id="handrem_tangki_air2" value="Upnormal" required>
                                            <label class="form-check-label" for="handrem_tangki_air2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="handrem_tangki_air" id="handrem_tangki_air3" value="Rusak" required>
                                            <label class="form-check-label" for="handrem_tangki_air3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="handrem_tangki_air" id="handrem_tangki_air4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="handrem_tangki_air4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="handrem_tangki_air" id="handrem_tangki_air5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="handrem_tangki_air5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-sm-6" id="friction_tyre_kanan">
                                    <label  class="label1">Friction Tyre Kanan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kanan" id="friction_tyre_kanan1" value="0%-20%" required>
                                            <label class="form-check-label" for="friction_tyre_kanan1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kanan" id="friction_tyre_kanan2" value="20%-50%" required>
                                            <label class="form-check-label" for="friction_tyre_kanan2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kanan" id="friction_tyre_kanan3" value="50%-70%" required>
                                            <label class="form-check-label" for="friction_tyre_kanan3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kanan" id="friction_tyre_kanan4" value="70%-90%" required>
                                            <label class="form-check-label" for="friction_tyre_kanan4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kanan" id="friction_tyre_kanan5" value="Tidak ada" required>
                                            <label class="form-check-label" for="friction_tyre_kanan5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Friction Tyre Kiri -->
                            <div class="row" >
                                <div class="col-sm-6"id="friction_tyre_kiri">
                                    <label  class="label1">Friction Tyre Kiri</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kiri" id="friction_tyre_kiri1" value="0%-20%" required>
                                            <label class="form-check-label" for="friction_tyre_kiri1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kiri" id="friction_tyre_kiri2" value="20%-50%" required>
                                            <label class="form-check-label" for="friction_tyre_kiri2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kiri" id="friction_tyre_kiri3" value="50%-70%" required>
                                            <label class="form-check-label" for="friction_tyre_kiri3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kiri" id="friction_tyre_kiri4" value="70%-90%" required>
                                            <label class="form-check-label" for="friction_tyre_kiri4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="friction_tyre_kiri" id="friction_tyre_kiri5" value="Tidak ada" required>
                                            <label class="form-check-label" for="friction_tyre_kiri5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Distance Tyre Tengah -->
                            <div class="row" >
                                <div class="col-sm-6" id="distance_tyre_tengah">
                                    <label  class="label1">Distance Tyre Tengah</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="distance_tyre_tengah" id="distance_tyre_tengah1" value="0%-20%" required>
                                            <label class="form-check-label" for="distance_tyre_tengah1">0%-20%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="distance_tyre_tengah" id="distance_tyre_tengah2" value="20%-50%" required>
                                            <label class="form-check-label" for="distance_tyre_tengah2">20%-50%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="distance_tyre_tengah" id="distance_tyre_tengah3" value="50%-70%" required>
                                            <label class="form-check-label" for="distance_tyre_tengah3">50%-70%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="distance_tyre_tengah" id="distance_tyre_tengah4" value="70%-90%" required>
                                            <label class="form-check-label" for="distance_tyre_tengah4">70%-90%</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="distance_tyre_tengah" id="distance_tyre_tengah5" value="Tidak ada" required>
                                            <label class="form-check-label" for="distance_tyre_tengah5">Tidak ada</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Loadcell -->
                            <div class="row" >
                                <div class="col-sm-6" id="loadcell">
                                    <label  class="label1">Loadcell</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="loadcell" id="loadcell1" value="Normal" required>
                                            <label class="form-check-label" for="loadcell1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="loadcell" id="loadcell2" value="Upnormal" required>
                                            <label class="form-check-label" for="loadcell2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="loadcell" id="loadcell3" value="Rusak" required>
                                            <label class="form-check-label" for="loadcell3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="loadcell" id="loadcell4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="loadcell4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="loadcell" id="loadcell5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="loadcell5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Connector Kabel -->
                            <div class="row" >
                                <div class="col-sm-6" id="connector_kabel">
                                    <label  class="label1">Connector Kabel</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="connector_kabel" id="connector_kabel1" value="Normal" required>
                                            <label class="form-check-label" for="connector_kabel1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="connector_kabel" id="connector_kabel2" value="Upnormal" required>
                                            <label class="form-check-label" for="connector_kabel2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="connector_kabel" id="connector_kabel3" value="Rusak" required>
                                            <label class="form-check-label" for="connector_kabel3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="connector_kabel" id="connector_kabel4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="connector_kabel4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="connector_kabel" id="connector_kabel5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="connector_kabel5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fungsi Pompa Air -->
                            <div class="row" >
                                <div class="col-sm-6" id="fungsi_pompa_air">
                                    <label  class="label1">Fungsi Pompa Air</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_air" id="fungsi_pompa_air1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_pompa_air1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_air" id="fungsi_pompa_air2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_pompa_air2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_air" id="fungsi_pompa_air3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_pompa_air3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_air" id="fungsi_pompa_air4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_pompa_air4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_air" id="fungsi_pompa_air5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_pompa_air5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kondisi Tangki Air -->
                            <div class="row" >
                                <div class="col-sm-6" id="kondisi_tangki_air">
                                    <label  class="label1">Kondisi Tangki Air</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_tangki_air" id="kondisi_tangki_air1" value="Normal" required>
                                            <label class="form-check-label" for="kondisi_tangki_air1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_tangki_air" id="kondisi_tangki_air2" value="Upnormal" required>
                                            <label class="form-check-label" for="kondisi_tangki_air2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_tangki_air" id="kondisi_tangki_air3" value="Rusak" required>
                                            <label class="form-check-label" for="kondisi_tangki_air3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_tangki_air" id="kondisi_tangki_air4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="kondisi_tangki_air4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kondisi_tangki_air" id="kondisi_tangki_air5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="kondisi_tangki_air5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Laptop -->
                            <div class="row" >
                                <div class="col-sm-6" id="laptop">
                                    <label  class="label1">Laptop</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="laptop" id="laptop1" value="Normal" required>
                                            <label class="form-check-label" for="laptop1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="laptop" id="laptop2" value="Upnormal" required>
                                            <label class="form-check-label" for="laptop2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="laptop" id="laptop3" value="Rusak" required>
                                            <label class="form-check-label" for="laptop3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="laptop" id="laptop4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="laptop4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="laptop" id="laptop5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="laptop5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kalibrasi Jarak -->
                            <div class="row" >
                                <div class="col-sm-6" id="kalibrasi_jarak">
                                    <label  class="label1">Kalibrasi Jarak</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kalibrasi_jarak" id="kalibrasi_jarak1" value="Normal" required>
                                            <label class="form-check-label" for="kalibrasi_jarak1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kalibrasi_jarak" id="kalibrasi_jarak2" value="Upnormal" required>
                                            <label class="form-check-label" for="kalibrasi_jarak2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kalibrasi_jarak" id="kalibrasi_jarak3" value="Rusak" required>
                                            <label class="form-check-label" for="kalibrasi_jarak3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kalibrasi_jarak" id="kalibrasi_jarak4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="kalibrasi_jarak4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kalibrasi_jarak" id="kalibrasi_jarak5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="kalibrasi_jarak5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_hidrolik_moower">
                                    <label  class="label1">Fungsi Hidrolik Moower</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolik_moower" id="fungsi_hidrolik_moower1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_hidrolik_moower1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolik_moower" id="fungsi_hidrolik_moower2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_hidrolik_moower2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolik_moower" id="fungsi_hidrolik_moower3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolik_moower3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolik_moower" id="fungsi_hidrolik_moower4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_hidrolik_moower4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolik_moower" id="fungsi_hidrolik_moower5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolik_moower5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_pisau_moower">
                                    <label  class="label1">Fungsi Pisau Moower</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pisau_moower" id="fungsi_pisau_moower1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_pisau_moower1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pisau_moower" id="fungsi_pisau_moower2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_pisau_moower2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pisau_moower" id="fungsi_pisau_moower3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_pisau_moower3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pisau_moower" id="fungsi_pisau_moower4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_pisau_moower4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pisau_moower" id="fungsi_pisau_moower5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_pisau_moower5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

            

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_pompa_hidrolic">
                                    <label  class="label1">Fungsi Pompa Hidrolic</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_hidrolic" id="fungsi_pompa_hidrolic1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_pompa_hidrolic1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_hidrolic" id="fungsi_pompa_hidrolic2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_pompa_hidrolic2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_hidrolic" id="fungsi_pompa_hidrolic3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_pompa_hidrolic3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_hidrolic" id="fungsi_pompa_hidrolic4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_pompa_hidrolic4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_pompa_hidrolic" id="fungsi_pompa_hidrolic5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_pompa_hidrolic5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6" id="gearbox">
                                    <label  class="label1">Gearbox</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gearbox" id="gearbox1" value="Normal" required>
                                            <label class="form-check-label" for="gearbox1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gearbox" id="gearbox2" value="Upnormal" required>
                                            <label class="form-check-label" for="gearbox2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gearbox" id="gearbox3" value="Rusak" required>
                                            <label class="form-check-label" for="gearbox3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gearbox" id="gearbox4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="gearbox4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gearbox" id="gearbox5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="gearbox5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="oli_kompresor">
                                    <label  class="label1">Oli Kompresor</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_kompresor" id="oli_kompresor1" value="Batas Normal" required>
                                            <label class="form-check-label" for="oli_kompresor1">Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_kompresor" id="oli_kompresor2" value="Dibawah Batas Normal" required>
                                            <label class="form-check-label" for="oli_kompresor2">Dibawah Batas Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="oli_kompresor" id="oli_kompresor3" value="Dilakukan Penambahan" required>
                                            <label class="form-check-label" for="oli_kompresor3">Dilakukan Penambahan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_screw_kompresor">
                                    <label  class="label1">Fungsi Screw Kompresor</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_screw_kompresor" id="fungsi_screw_kompresor1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_screw_kompresor1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_screw_kompresor" id="fungsi_screw_kompresor2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_screw_kompresor2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_screw_kompresor" id="fungsi_screw_kompresor3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_screw_kompresor3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_screw_kompresor" id="fungsi_screw_kompresor4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_screw_kompresor4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_screw_kompresor" id="fungsi_screw_kompresor5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_screw_kompresor5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_cut_off_pressure">
                                    <label  class="label1">Fungsi Cut Off Pressure</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_cut_off_pressure" id="fungsi_cut_off_pressure1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_cut_off_pressure1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_cut_off_pressure" id="fungsi_cut_off_pressure2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_cut_off_pressure2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_cut_off_pressure" id="fungsi_cut_off_pressure3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_cut_off_pressure3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_cut_off_pressure" id="fungsi_cut_off_pressure4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_cut_off_pressure4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_cut_off_pressure" id="fungsi_cut_off_pressure5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_cut_off_pressure5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_drayer">
                                    <label  class="label1">Fungsi Drayer</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_drayer" id="fungsi_drayer1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_drayer1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_drayer" id="fungsi_drayer2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_drayer2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_drayer" id="fungsi_drayer3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_drayer3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_drayer" id="fungsi_drayer4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_drayer4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_drayer" id="fungsi_drayer5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_drayer5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_auto_start">
                                    <label  class="label1">Fungsi Auto Start</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_auto_start" id="fungsi_auto_start1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_auto_start1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_auto_start" id="fungsi_auto_start2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_auto_start2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_auto_start" id="fungsi_auto_start3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_auto_start3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_auto_start" id="fungsi_auto_start4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_auto_start4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_auto_start" id="fungsi_auto_start5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_auto_start5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_lampu_penerangan">
                                    <label  class="label1">Fungsi Lampu Penerangan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_lampu_penerangan" id="fungsi_lampu_penerangan1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_lampu_penerangan1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_lampu_penerangan" id="fungsi_lampu_penerangan2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_lampu_penerangan2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_lampu_penerangan" id="fungsi_lampu_penerangan3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_lampu_penerangan3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_lampu_penerangan" id="fungsi_lampu_penerangan4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_lampu_penerangan4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_lampu_penerangan" id="fungsi_lampu_penerangan5" value="Tidak bisa di test karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_lampu_penerangan5">Tidak bisa di test karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                                     

                                <div class="row">
                                <div class="col-sm-6" id="pisau_potong">
                                    <label  class="label1">Pisau Potong</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pisau_potong" id="pisau_potong1" value="Normal" required>
                                            <label class="form-check-label" for="pisau_potong1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pisau_potong" id="pisau_potong2" value="Upnormal" required>
                                            <label class="form-check-label" for="pisau_potong2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pisau_potong" id="pisau_potong3" value="Rusak" required>
                                            <label class="form-check-label" for="pisau_potong3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pisau_potong" id="pisau_potong4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="pisau_potong4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="pisau_potong" id="pisau_potong5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="pisau_potong5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_hidrolis_sepatu_forklift">
                                    <label  class="label1">Fungsi Hidrolis Sepatu Forklift</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_sepatu_forklift" id="fungsi_hidrolis_sepatu_forklift1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_sepatu_forklift1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_sepatu_forklift" id="fungsi_hidrolis_sepatu_forklift2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_sepatu_forklift2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_sepatu_forklift" id="fungsi_hidrolis_sepatu_forklift3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_sepatu_forklift3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_sepatu_forklift" id="fungsi_hidrolis_sepatu_forklift4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_sepatu_forklift4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_hidrolis_sepatu_forklift" id="fungsi_hidrolis_sepatu_forklift5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_hidrolis_sepatu_forklift5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_vibrator">
                                    <label  class="label1">Fungsi Vibrator</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_vibrator" id="fungsi_vibrator1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_vibrator1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_vibrator" id="fungsi_vibrator2" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_vibrator2">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_vibrator" id="fungsi_vibrator3" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_vibrator3">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_vibrator" id="fungsi_vibrator4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_vibrator4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_vibrator" id="fungsi_vibrator5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_vibrator5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" id="fungsi_spray_bar">
                                    <label  class="label1">Fungsi Spray Bar</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar" id="fungsi_spray_bar1" value="Normal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar1">Normal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar" id="fungsi_spray_bar_upnormal" value="Upnormal" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_upnormal">Upnormal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar" id="fungsi_spray_bar_rusak" value="Rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar_rusak">Rusak</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar" id="fungsi_spray_bar4" value="Normal dengan catatan" required>
                                            <label class="form-check-label" for="fungsi_spray_bar4">Normal dengan catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="fungsi_spray_bar" id="fungsi_spray_bar5" value="Tidak bisa ditest karena part lain rusak" required>
                                            <label class="form-check-label" for="fungsi_spray_bar5">Tidak bisa ditest karena part lain rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                            
                                <div class="row">
                                    <div class="col-sm-6" id="kopling">
                                        <label  class="label1">Kondisi Kopling</label>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kopling" id="kopling1" value="Normal" required>
                                                <label class="form-check-label" for="kopling1">Normal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kopling" id="kopling2" value="Upnormal" required>
                                                <label class="form-check-label" for="kopling2">Upnormal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kopling" id="kopling3" value="Rusak" required>
                                                <label class="form-check-label" for="kopling3">Rusak</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kopling" id="kopling4" value="Normal Dengan Catatan" required>
                                                <label class="form-check-label" for="kopling4">Normal Dengan Catatan</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kopling" id="kopling5" value="Tidak Bisa Ditest Karena Part Lain Rusak" required>
                                                <label class="form-check-label" for="kopling5">Tidak Bisa Ditest Karena Part Lain Rusak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6" id="top_speeds">
                                        <div class="form-group">
                                            <label  class="label1">Top Speed</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="top_speed" id="top_speed" placeholder="Masukkan Top Speed" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">KM/H</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-sm-6" id="stop_distances">
                                        <div class="form-group">
                                            <label  class="label1">Stop Distance</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="stop_distance" id="stop_distance" placeholder="Masukkan Stop Distance" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">M</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-sm-6" id="accelerations">
                                        <div class="form-group">
                                            <label  class="label1">Acceleration</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="acceleration" id="acceleration" placeholder="Masukkan Acceleration" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">M/S²</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-sm-6" id="discharge_ranges">
                                        <div class="form-group">
                                            <label  class="label1">Discharge Range</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="discharge_range" id="discharge_range" placeholder="Masukkan Discharge Range" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">M</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-3">
                                    <div class="col-sm-6" id="discharge_rates">
                                        <div class="form-group">
                                            <label  class="label1">Discharge Rate</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="discharge_rate" id="discharge_rate" placeholder="Masukkan Discharge Rate" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">L/Menit</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" onclick="previousSection('section6', 'section5')">Previous</button>
                                    <button type="button" class="btn btn-primary" onclick="nextSection('section6', 'section7')">Next</button>
                                </div>
                        </div>

                        <!-- Bagian 7 -->
                        <div class="form-section" id="section7" style="display: none;">
                            <label class="label1 mb-5" style="text-align: center; display: block;">Kesimpulan</label>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label  class="label1">Kesimpulan Kendaraan</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kesimpulan_kendaraan" id="kesimpulan_kendaraan_Kendaraan_Siap_Beroperasi" value="Kendaraan Siap Beroperasi" required>
                                            <label class="form-check-label" for="kesimpulan_kendaraan_Kendaraan_Siap_Beroperasi">Kendaraan Siap Beroperasi</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kesimpulan_kendaraan" id="kesimpulan_kendaraan_Siap_Beroperasi_Dengan_Catatan" value="Kendaraan Siap Beroperasi Dengan Catatan" required>
                                            <label class="form-check-label" for="kesimpulan_kendaraan_Siap_Beroperasi_Dengan_Catatan">Kendaraan Siap Beroperasi Dengan Catatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kesimpulan_kendaraan" id="kesimpulan_kendaraan_Dalam_Perbaikan" value="Kendaraan Dalam Perbaikan/Rusak (UNIT STOP)" required>
                                            <label class="form-check-label" for="kesimpulan_kendaraan_Dalam_Perbaikan">Kendaraan Dalam Perbaikan/Rusak (UNIT STOP)</label>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-6">
                                    <label  class="label1">Approval (Tanda Tangan) User</label>
                                    <div class="form-group">
                                        <canvas id="signature-pad" class="signature-pad" width="400" height="200" style="border: 1px solid #000;"></canvas>
                                        <input type="hidden" name="approval" id="approval" >
                                    </div>
                                    <button id="clear-signature" type="button">Clear</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label  class="label1">User Peralatan</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="user_kendaraan" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="label1">Catatan</label>
                                    <div class="form-group">
                                        <textarea class="form-control" name="catatan" rows="3">@if($vehicle->catatan != null){{ $vehicle->catatan }}@else{{ '' }}@endif</textarea>
                                    </div>
                                </div>
                            </div>

                              <div class="row">
                            <div class="col-sm-12"> <label for="foto_kendaraan_input" class="form-label fw-medium">Foto Kendaraan <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="file" class="form-control @error('foto_kendaraan') is-invalid @enderror @if($errors->has('foto_kendaraan.*')) is-invalid @endif"
                                        id="foto_kendaraan_input" accept="image/*" multiple capture="environment">
                                    <small class="text-muted d-block mt-1">
                                        Anda dapat mengambil foto dengan kamera atau memilih dari galeri. Pilih beberapa file sekaligus atau ulangi untuk menambah foto (target kompresi ~30KB per foto).
                                    </small>

                                    @error('foto_kendaraan')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    @foreach ($errors->get('foto_kendaraan.*') as $message)
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @endforeach
                                    <div id="foto_kendaraan_client_error" class="invalid-feedback d-block" style="display: none;"></div>

                                    <div id="photoPreviewContainer" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top:15px;">
                                        </div>
                                    <div id="hiddenPhotoInputs" style="display: none;">
                                        </div>
                                </div>
                            </div>
                        </div>


                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="previousSection('section7', 'section6')">Previous</button>
                                <button type="submit" class="btn btn-success"   >Submit</button>
                            </div>
                        </div>
                    </form>
                   
                    <script>
                        function nextSection(currentSection, nextSection) {
                            const inputs = document.querySelectorAll(`#${currentSection} input[required]`);
                            let allFilled = true;
                            let errorMessages = []; // Array untuk menampung pesan kesalahan
                    
                            // Periksa apakah semua input required sudah terisi (kecuali radio button)
                            inputs.forEach(input => {
                                if (input.type !== 'radio' && !input.value) {
                                    allFilled = false;
                                    input.classList.add('is-invalid');
                    
                                    // Ambil judul dari row untuk error message
                                    const sectionLabel = input.closest('.row').querySelector('label.label1').innerText;
                                    if (!errorMessages.includes(sectionLabel)) {
                                        errorMessages.push(sectionLabel); // Tambah judul ke pesan kesalahan
                                    }
                                } else {
                                    input.classList.remove('is-invalid');
                                }
                            });
                    
                            // Periksa setiap grup radio button apakah ada yang belum dipilih
                            const radioGroups = {};
                            inputs.forEach(input => {
                                if (input.type === 'radio') {
                                    const name = input.name;
                                    if (!radioGroups[name]) {
                                        // Ambil label dari `label.label1` dalam `.row` terdekat dengan radio button ini
                                        const label = input.closest('.row').querySelector('label.label1').innerText;
                                        radioGroups[name] = { checked: false, label: label };
                                    }
                                    if (input.checked) {
                                        radioGroups[name].checked = true;
                                    }
                                }
                            });
                    
                            // Tambahkan pesan kesalahan untuk setiap grup radio yang belum dipilih
                            for (const group in radioGroups) {
                                if (!radioGroups[group].checked) {
                                    allFilled = false;
                                    document.querySelectorAll(`input[name="${group}"]`).forEach(radio => radio.classList.add('is-invalid'));
                                    if (!errorMessages.includes(radioGroups[group].label)) {
                                        errorMessages.push(radioGroups[group].label);
                                    }
                                } else {
                                    document.querySelectorAll(`input[name="${group}"]`).forEach(radio => radio.classList.remove('is-invalid'));
                                }
                            }
                    
                            // Jika semua input terisi, lanjutkan ke section berikutnya
                            if (allFilled) {
                                document.getElementById(currentSection).style.display = 'none';
                                document.getElementById(nextSection).style.display = 'block';
                                window.scrollTo(0, 0); // Gulir ke atas
                            } else {
                                alert("Mohon lengkapi semua field yang diperlukan:\n" + errorMessages.map(msg => `- ${msg}`).join("\n"));
                            }
                        }
                    
                        function previousSection(currentSection, prevSection) {
                            document.getElementById(currentSection).style.display = 'none';
                            document.getElementById(prevSection).style.display = 'block';
                            window.scrollTo(0, 0); // Gulir ke atas
                        }
                    </script>
                                    
<script>
    // Fungsi untuk menghitung penggantian oli kurang/lebih
    function calculateOilChange() {
        // Ambil nilai dari input
        const odoMeterInput = document.getElementById('odometer');
        const oliSelanjutnyaInput = document.getElementById('oli_selanjutnya');

        // Set nilai ke 0 jika kosong
        const odoMeter = parseFloat(odoMeterInput.value) || 0;
        const oliSelanjutnya = parseFloat(oliSelanjutnyaInput.value) || 0;

        const oliKurangInput = document.getElementById('oli_kurang');
        const oliLebihInput = document.getElementById('oli_lebih');

        // Reset input oli kurang/lebih
        oliKurangInput.value = '0';  // Set default ke 0
        oliLebihInput.value = '0';    // Set default ke 0

        // Jika odo meter lebih besar dari oli selanjutnya
        if (odoMeter > oliSelanjutnya) {
            oliKurangInput.value = odoMeter - oliSelanjutnya; // Menghitung oli kurang
        }
        // Jika odo meter lebih kecil dari oli selanjutnya
        else if (odoMeter < oliSelanjutnya) {
            oliLebihInput.value = oliSelanjutnya - odoMeter; // Menghitung oli lebih
        }
    }

    // Event listener untuk perubahan di Odo Meter dan Penggantian Oli Selanjutnya
    document.getElementById('odometer').addEventListener('input', calculateOilChange);
    document.getElementById('oli_selanjutnya').addEventListener('input', calculateOilChange);
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Fungsi debounce untuk menunda eksekusi hingga input berhenti selama beberapa waktu (misalnya 300ms)
    function debounce(func, delay) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    // Event listener untuk input kendaraan
    document.querySelector('input[name="vehicle_name"]').addEventListener('input', debounce(function() {
        const vehicleName = this.value;

        if (vehicleName) {
            // Menjalankan kedua fetch secara paralel
            Promise.all([
                fetch(`/get-oli-selanjutnya/${vehicleName}`).then(response => response.json()),
                fetch(`/vehicle-type/${vehicleName}`).then(response => response.json())
            ])
            .then(([oliData, vehicleData]) => {
                // Set nilai oli_selanjutnya
                if (oliData && oliData.oli_selanjutnya) {
                    document.querySelector('input[name="oli_selanjutnya"]').value = oliData.oli_selanjutnya;
                } else {
                    document.querySelector('input[name="oli_selanjutnya"]').value = '';
                }

                // Set nilai vehicle_type
                if (vehicleData && vehicleData.vehicle_type) {
                    document.querySelector('input[name="vehicle_type"]').value = vehicleData.vehicle_type;

                    // Panggil checkVehicleType setiap kali vehicle_type diperbarui
                    checkVehicleType();  
                } else {
                    document.querySelector('input[name="vehicle_type"]').value = '';
                }                    $('#odometer').hide();  
                    $('input[name="odometer"]').val('0');   
                    $('#odometer').removeAttr('required');  // Hilangkan required
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        } else {
            // Kosongkan input jika vehicle_name kosong
            document.querySelector('input[name="oli_selanjutnya"]').value = '';
            document.querySelector('input[name="vehicle_type"]').value = '';
        }
    }, 300)); // Waktu debounce 300ms

    $(document).ready(function() {
        console.log("jQuery siap!");  // Untuk memastikan jQuery berjalan
        
        // Event listener untuk mendeteksi perubahan pada input dengan name vehicle_type
        $('input[name="vehicle_type"]').on('input change keyup', function() {
            console.log("Input berubah:", $(this).val());  // Memeriksa apakah event listener berjalan
            checkVehicleType();  // Panggil fungsi setiap ada perubahan
        });
        
        // Panggil fungsi saat halaman dimuat untuk mengecek kondisi awal
        checkVehicleType();  
    });
    
    function checkVehicleType() {
        var vehicleType = $('input[name="vehicle_type"]').val();  // Ambil nilai input dari field vehicle_type
        console.log('Vehicle_Type:', vehicleType);  // Debugging untuk melihat apakah nilai terisi dengan benar
        
        if (vehicleType === 'Operasional'){

                    $('#kopling').hide();  
                    $('input[name="kopling"]').val('-');  
                    $('#kopling1').prop('checked', true); 

                    $('#handrem_tangki_air').hide();  
                    $('input[name="handrem_tangki_air"]').val('-');  
                    $('#handrem_tangki_air1').prop('checked', true); 

                    $('#timing_belt').hide();  
                    $('input[name="timing_belt"]').val('-');  
                    $('#timing1').prop('checked', true); 

                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                    $('#vbelt_engine').hide();  
                    $('input[name="vbelt_engine"]').val('-');  
                    $('#vbelt_engine1').prop('checked', true); 

                    $('#sign_lamp_depan').hide();  
                    $('input[name="sign_lamp_depan"]').val('-');  
                    $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                    $('#sign_lamp_belakang').hide();  
                    $('input[name="sign_lamp_belakang"]').val('-');  
                    $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#pisau_potong').hide();
                    $('input[name="pisau_potong"]').val('-');
                    $('#pisau_potong1').prop('checked', true);

                $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

             

                // Hide FUNGSI DRAYER
                $('#fungsi_drayer').hide();
                $('input[name="fungsi_drayer"]').val('-');
                $('#fungsi_drayer1').prop('checked', true);

                // Hide FUNGSI AUTO START
                $('#fungsi_auto_start').hide();
                $('input[name="fungsi_auto_start"]').val('-');
                $('#fungsi_auto_start1').prop('checked', true);

            $('#filter_oli_kompresor').hide();
            $('input[name="filter_oli_kompresor"]').val('-');
            $('#filter_oli_kompresor1').prop('checked', true);

                        // Hide OLI KOMPRESOR
            $('#oli_kompresor').hide();
            $('input[name="oli_kompresor"]').val('-');
            $('#oli_kompresor1').prop('checked', true);

            // Hide BAN KANAN
            $('#ban_kanan').hide();
            $('input[name="ban_kanan"]').val('-');
            $('#ban_kanan1').prop('checked', true);

            // Hide BAN KIRI
            $('#ban_kiri').hide();
            $('input[name="ban_kiri"]').val('-');
            $('#ban_kiri1').prop('checked', true);

            // Hide FUNGSI SCREW KOMPRESOR
            $('#fungsi_screw_kompresor').hide();
            $('input[name="fungsi_screw_kompresor"]').val('-');
            $('#fungsi_screw_kompresor1').prop('checked', true);

            // Hide FUNGSI CUT OFF PRESSURE
            $('#fungsi_cut_off_pressure').hide();
            $('input[name="fungsi_cut_off_pressure"]').val('-');
            $('#fungsi_cut_off_pressure1').prop('checked', true);


                                // Hide Fungsi Hidrolik Moower
                    $('#fungsi_hidrolik_moower').hide();
                    $('input[name="fungsi_hidrolik_moower"]').val('-');
                    $('#fungsi_hidrolik_moower1').prop('checked', true);

                    // Hide Fungsi Pisau Moower
                    $('#fungsi_pisau_moower').hide();
                    $('input[name="fungsi_pisau_moower"]').val('-');
                    $('#fungsi_pisau_moower1').prop('checked', true);

                    // Hide Fungsi Pompa Hidrolic
                    $('#fungsi_pompa_hidrolic').hide();
                    $('input[name="fungsi_pompa_hidrolic"]').val('-');
                    $('#fungsi_pompa_hidrolic1').prop('checked', true);

                    // Hide Gearbox
                    $('#gearbox').hide();
                    $('input[name="gearbox"]').val('-');
                    $('#gearbox1').prop('checked', true);

                            // Fungsi Gerakan Shourd
                $('#fungsi_gerakan_shourd').hide();
                $('input[name="fungsi_gerakan_shourd"]').val('-');
                $('#fungsi_gerakan_shourd1').prop('checked', true);

                // Fungsi Putaran Kumparan
                $('#fungsi_putaran_kumparan').hide();
                $('input[name="fungsi_putaran_kumparan"]').val('-');
                $('#fungsi_putaran_kumparan1').prop('checked', true);

                // Nozzle
                $('#nozzle').hide();
                $('input[name="nozzle"]').val('-');
                $('#nozzle1').prop('checked', true);

                // Selang Hidrolis
                $('#selang_hidrolis').hide();
                $('input[name="selang_hidrolis"]').val('-');
                $('#selang_hidrolis1').prop('checked', true);

                // Seal Brush Button
                $('#seal_brush_button').hide();
                $('input[name="seal_brush_button"]').val('-');
                $('#seal_brush_button1').prop('checked', true);

                // Seal Swifel Shaft
                $('#seal_swifel_shaft').hide();
                $('input[name="seal_swifel_shaft"]').val('-');
                $('#seal_swifel_shaft1').prop('checked', true);

                // Seal Gasket
                $('#seal_gasket').hide();
                $('input[name="seal_gasket"]').val('-');
                $('#seal_gasket1').prop('checked', true);

                // Seal Upper
                $('#seal_upper').hide();
                $('input[name="seal_upper"]').val('-');
                $('#seal_upper1').prop('checked', true);

                // Drit Shield
                $('#drit_shield').hide();
                $('input[name="drit_shield"]').val('-');
                $('#drit_shield1').prop('checked', true);

                        // Hide Friction Tyre Kanan
                        $('#friction_tyre_kanan').hide();
                        $('input[name="friction_tyre_kanan"]').val('-');
                        $('#friction_tyre_kanan1').prop('checked', true);

                        // Hide Friction Tyre Kiri
                        $('#friction_tyre_kiri').hide();
                        $('input[name="friction_tyre_kiri"]').val('-');
                        $('#friction_tyre_kiri1').prop('checked', true);

                        // Hide Distance Tyre Tengah
                        $('#distance_tyre_tengah').hide();
                        $('input[name="distance_tyre_tengah"]').val('-');
                        $('#distance_tyre_tengah1').prop('checked', true);

                        // Hide Loadcell
                        $('#loadcell').hide();
                        $('input[name="loadcell"]').val('-');
                        $('#loadcell1').prop('checked', true);

                        // Hide Connector Kabel
                        $('#connector_kabel').hide();
                        $('input[name="connector_kabel"]').val('-');
                        $('#connector_kabel1').prop('checked', true);

                        // Hide Fungsi Pompa Air
                        $('#fungsi_pompa_air').hide();
                        $('input[name="fungsi_pompa_air"]').val('-');
                        $('#fungsi_pompa_air1').prop('checked', true);

                        // Hide Kondisi Tangki Air
                        $('#kondisi_tangki_air').hide();
                        $('input[name="kondisi_tangki_air"]').val('-');
                        $('#kondisi_tangki_air1').prop('checked', true);

                        // Hide Laptop
                        $('#laptop').hide();
                        $('input[name="laptop"]').val('-');
                        $('#laptop1').prop('checked', true);

                        // Hide Kalibrasi Jarak
                        $('#kalibrasi_jarak').hide();
                        $('input[name="kalibrasi_jarak"]').val('-');
                        $('#kalibrasi_jarak1').prop('checked', true);

                $('#pompa_uhp').hide();  
                $('input[name="pompa_uhp"]').val('-');  
                $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#pto_kopling_pompa').hide();  
                $('input[name="pto_kopling_pompa"]').val('-');  
                $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                $('#v_belt_pompa_uhp').hide();  
                $('input[name="v_belt_pompa_uhp"]').val('-');  
                $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                $('#kampas_kopling_pompa_uhp').hide();  
                $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                $('#kompresor_pompa_uhp').hide();  
                $('input[name="kompresor_pompa_uhp"]').val('-');  
                $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                $('#vacum_hose_3_inch').hide();  
                $('input[name="vacum_hose_3_inch"]').val('-');  
                $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                $('#vacum_hose_4_inch').hide();  
                $('input[name="vacum_hose_4_inch"]').val('-');  
                $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                $('#vacum_hose_6_inch').hide();  
                $('input[name="vacum_hose_6_inch"]').val('-');  
                $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                $('#hose_40k').hide();  
                $('input[name="hose_40k"]').val('-');  
                $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                $('#filter_cartridge').hide();  
                $('input[name="filter_cartridge"]').val('-');  
                $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                $('#filter_bag_10_micron').hide();  
                $('input[name="filter_bag_10_micron"]').val('-');  
                $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                $('#debris_bag').hide();  
                $('input[name="debris_bag"]').val('-');  
                $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                $('#running_test_40k_engine').hide();  
                $('input[name="running_test_40k_engine"]').val('-');  
                $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


          

            $('#oli_hidrolis').hide();  
            $('input[name="oli_hidrolis"]').val('-');  
            $('#oli_hidrolis1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#filter_air_drayer').hide();  
            $('input[name="filter_air_drayer"]').val('-');  
            $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'

            $('#filter_water_sparator').hide();  
            $('input[name="filter_water_sparator"]').val('-');  
            $('#filter_water_sparator1').prop('checked', true);  // Centang radio 'Baik'

            $('#filter_transmisi').hide();  
            $('input[name="filter_transmisi"]').val('-');  
            $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

            $('#filter_hidrolis').hide();  
            $('input[name="filter_hidrolis"]').val('-');  
            $('#filter_hidrolis1').prop('checked', true);  // Centang radio 'Baik'

           

            $('#airdrayer').hide();  
            $('input[name="airdrayer"]').val('-');  
            $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

            $('#pneumatic_system').hide();  
            $('input[name="pneumatic_system"]').val('-');  
            $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#hydraulic_system').hide();  
            $('input[name="hydraulic_system"]').val('-');  
            $('#hydraulic_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#electrical_system').hide();  
            $('input[name="electrical_system"]').val('-');  
            $('#electrical_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#kompresor').hide();  
            $('input[name="kompresor"]').val('-');  
            $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

            $('#lampu_kompartement').hide();  
            $('input[name="lampu_kompartement"]').val('-');  
            $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

            $('#lampu_body').hide();  
            $('input[name="lampu_body"]').val('-');  
            $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

            $('#ban_tengah_kanan').hide();  
            $('input[name="ban_tengah_kanan"]').val('-');  
            $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

            $('#ban_tengah_kiri').hide();  
            $('input[name="ban_tengah_kiri"]').val('-');  
            $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

            $('#pompa_fire_fighting').hide();  
            $('input[name="pompa_fire_fighting"]').val('-');  
            $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

            $('#primming_pump').hide();  
            $('input[name="primming_pump"]').val('-');  
            $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

            $('#roof_turret').hide();  
            $('input[name="roof_turret"]').val('-');  
            $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#bumper_turret').hide();  
            $('input[name="bumper_turret"]').val('-');  
            $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_depan').hide();  
            $('input[name="undertrack_spray_depan"]').val('-');  
            $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kanan').hide();  
            $('input[name="undertrack_spray_kanan"]').val('-');  
            $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kiri').hide();  
            $('input[name="undertrack_spray_kiri"]').val('-');  
            $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

            $('#foam_proportioner').hide();  
            $('input[name="foam_proportioner"]').val('-');  
            $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_air').hide();  
            $('input[name="tangki_air"]').val('-');  
            $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_foam').hide();  
            $('input[name="tangki_foam"]').val('-');  
            $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

            $('#pengisian_air_eksternal').hide();  
            $('input[name="pengisian_air_eksternal"]').val('-');  
            $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#charger_baterai_eksternal').hide();  
            $('input[name="charger_baterai_eksternal"]').val('-');  
            $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#top_speeds').hide();  
            $('input[name="top_speed"]').val('0');  
            $('#top_speed').removeAttr('required');  // Hilangkan required

            $('#stop_distances').hide();  
            $('input[name="stop_distance"]').val('0');
            $('#stop_distance').removeAttr('required');  // Hilangkan required

            $('#accelerations').hide();  
            $('input[name="acceleration"]').val('0'); 
            $('#acceleration').removeAttr('required');  // Hilangkan required

            $('#discharge_ranges').hide();  
            $('input[name="discharge_range"]').val('0');   
            $('#discharge_range').removeAttr('required');  // Hilangkan required

            $('#discharge_rates').hide();  
            $('input[name="discharge_rate"]').val('0'); 
            $('#discharge_rate').removeAttr('required');  // Hilangkan required

                    // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);

                    // Hide FILTER OLI MESIN BAWAH
                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                    // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide POMPA HIDROLIS
                    $('#pompa_hidrolis').hide();
                    $('input[name="pompa_hidrolis"]').val('-');
                    $('#pompa_hidrolis1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);

                        $('#ban_tengah_belakang').hide();
                        $('input[name="ban_tengah_belakang"]').val('-');
                        $('#ban_tengah_belakang1').prop('checked', true);

                        $('#reservoir_wiper').hide();  
                        $('input[name="reservoir_wiper"]').val('-');  
                        $('#wiper1').prop('checked', true); 




       

        } else if(vehicleType === 'Crash Car'){

                    $('#kopling').hide();  
                    $('input[name="kopling"]').val('-');  
                    $('#kopling1').prop('checked', true); 

                    $('#handrem_tangki_air').hide();  
                    $('input[name="handrem_tangki_air"]').val('-');  
                    $('#handrem_tangki_air1').prop('checked', true); 

            $('#sign_lamp_depan').hide();  
            $('input[name="sign_lamp_depan"]').val('-');  
            $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

            
            $('#sign_lamp_belakang').hide();  
            $('input[name="sign_lamp_belakang"]').val('-');  
            $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

            $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

                $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);


                            // Hide FUNGSI DRAYER
                            $('#fungsi_drayer').hide();
                            $('input[name="fungsi_drayer"]').val('-');
                            $('#fungsi_drayer1').prop('checked', true);

                            // Hide FUNGSI AUTO START
                            $('#fungsi_auto_start').hide();
                            $('input[name="fungsi_auto_start"]').val('-');
                            $('#fungsi_auto_start1').prop('checked', true);

                        $('#filter_oli_kompresor').hide();
                        $('input[name="filter_oli_kompresor"]').val('-');
                        $('#filter_oli_kompresor1').prop('checked', true);

                        // Hide OLI KOMPRESOR
                        $('#oli_kompresor').hide();
                        $('input[name="oli_kompresor"]').val('-');
                        $('#oli_kompresor1').prop('checked', true);

                        // Hide BAN KANAN
                        $('#ban_kanan').hide();
                        $('input[name="ban_kanan"]').val('-');
                        $('#ban_kanan1').prop('checked', true);

                        // Hide BAN KIRI
                        $('#ban_kiri').hide();
                        $('input[name="ban_kiri"]').val('-');
                        $('#ban_kiri1').prop('checked', true);

                        // Hide FUNGSI SCREW KOMPRESOR
                        $('#fungsi_screw_kompresor').hide();
                        $('input[name="fungsi_screw_kompresor"]').val('-');
                        $('#fungsi_screw_kompresor1').prop('checked', true);

                        // Hide FUNGSI CUT OFF PRESSURE
                        $('#fungsi_cut_off_pressure').hide();
                        $('input[name="fungsi_cut_off_pressure"]').val('-');
                        $('#fungsi_cut_off_pressure1').prop('checked', true);


                // Hide Fungsi Hidrolik Moower
                    $('#fungsi_hidrolik_moower').hide();
                    $('input[name="fungsi_hidrolik_moower"]').val('-');
                    $('#fungsi_hidrolik_moower1').prop('checked', true);

                    // Hide Fungsi Pisau Moower
                    $('#fungsi_pisau_moower').hide();
                    $('input[name="fungsi_pisau_moower"]').val('-');
                    $('#fungsi_pisau_moower1').prop('checked', true);

                    // Hide Fungsi Pompa Hidrolic
                    $('#fungsi_pompa_hidrolic').hide();
                    $('input[name="fungsi_pompa_hidrolic"]').val('-');
                    $('#fungsi_pompa_hidrolic1').prop('checked', true);

                    // Hide Gearbox
                    $('#gearbox').hide();
                    $('input[name="gearbox"]').val('-');
                    $('#gearbox1').prop('checked', true);


                $('#fungsi_gerakan_shourd').hide();
                $('input[name="fungsi_gerakan_shourd"]').val('-');
                $('#fungsi_gerakan_shourd1').prop('checked', true);

                // Fungsi Putaran Kumparan
                $('#fungsi_putaran_kumparan').hide();
                $('input[name="fungsi_putaran_kumparan"]').val('-');
                $('#fungsi_putaran_kumparan1').prop('checked', true);

                // Nozzle
                $('#nozzle').hide();
                $('input[name="nozzle"]').val('-');
                $('#nozzle1').prop('checked', true);

                // Selang Hidrolis
                $('#selang_hidrolis').hide();
                $('input[name="selang_hidrolis"]').val('-');
                $('#selang_hidrolis1').prop('checked', true);

                // Seal Brush Button
                $('#seal_brush_button').hide();
                $('input[name="seal_brush_button"]').val('-');
                $('#seal_brush_button1').prop('checked', true);

                // Seal Swifel Shaft
                $('#seal_swifel_shaft').hide();
                $('input[name="seal_swifel_shaft"]').val('-');
                $('#seal_swifel_shaft1').prop('checked', true);

                // Seal Gasket
                $('#seal_gasket').hide();
                $('input[name="seal_gasket"]').val('-');
                $('#seal_gasket1').prop('checked', true);

                // Seal Upper
                $('#seal_upper').hide();
                $('input[name="seal_upper"]').val('-');
                $('#seal_upper1').prop('checked', true);

                // Drit Shield
                $('#drit_shield').hide();
                $('input[name="drit_shield"]').val('-');
                $('#drit_shield1').prop('checked', true);


                        $('#friction_tyre_kanan').hide();
                        $('input[name="friction_tyre_kanan"]').val('-');
                        $('#friction_tyre_kanan1').prop('checked', true);

                        // Hide Friction Tyre Kiri
                        $('#friction_tyre_kiri').hide();
                        $('input[name="friction_tyre_kiri"]').val('-');
                        $('#friction_tyre_kiri1').prop('checked', true);

                        // Hide Distance Tyre Tengah
                        $('#distance_tyre_tengah').hide();
                        $('input[name="distance_tyre_tengah"]').val('-');
                        $('#distance_tyre_tengah1').prop('checked', true);

                        // Hide Loadcell
                        $('#loadcell').hide();
                        $('input[name="loadcell"]').val('-');
                        $('#loadcell1').prop('checked', true);

                        // Hide Connector Kabel
                        $('#connector_kabel').hide();
                        $('input[name="connector_kabel"]').val('-');
                        $('#connector_kabel1').prop('checked', true);

                        // Hide Fungsi Pompa Air
                        $('#fungsi_pompa_air').hide();
                        $('input[name="fungsi_pompa_air"]').val('-');
                        $('#fungsi_pompa_air1').prop('checked', true);

                        // Hide Kondisi Tangki Air
                        $('#kondisi_tangki_air').hide();
                        $('input[name="kondisi_tangki_air"]').val('-');
                        $('#kondisi_tangki_air1').prop('checked', true);

                        // Hide Laptop
                        $('#laptop').hide();
                        $('input[name="laptop"]').val('-');
                        $('#laptop1').prop('checked', true);

                        // Hide Kalibrasi Jarak
                        $('#kalibrasi_jarak').hide();
                        $('input[name="kalibrasi_jarak"]').val('-');
                        $('#kalibrasi_jarak1').prop('checked', true);


                            $('#pompa_uhp').hide();  
                            $('input[name="pompa_uhp"]').val('-');  
                            $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                            $('#pto_kopling_pompa').hide();  
                            $('input[name="pto_kopling_pompa"]').val('-');  
                            $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                            $('#v_belt_pompa_uhp').hide();  
                            $('input[name="v_belt_pompa_uhp"]').val('-');  
                            $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                            $('#kampas_kopling_pompa_uhp').hide();  
                            $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                            $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                            $('#kompresor_pompa_uhp').hide();  
                            $('input[name="kompresor_pompa_uhp"]').val('-');  
                            $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                            $('#vacum_hose_3_inch').hide();  
                            $('input[name="vacum_hose_3_inch"]').val('-');  
                            $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                            $('#vacum_hose_4_inch').hide();  
                            $('input[name="vacum_hose_4_inch"]').val('-');  
                            $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                            $('#vacum_hose_6_inch').hide();  
                            $('input[name="vacum_hose_6_inch"]').val('-');  
                            $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                            $('#hose_40k').hide();  
                            $('input[name="hose_40k"]').val('-');  
                            $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                            $('#filter_cartridge').hide();  
                            $('input[name="filter_cartridge"]').val('-');  
                            $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                            $('#filter_bag_10_micron').hide();  
                            $('input[name="filter_bag_10_micron"]').val('-');  
                            $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                            $('#debris_bag').hide();  
                            $('input[name="debris_bag"]').val('-');  
                            $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                            $('#running_test_40k_engine').hide();  
                            $('input[name="running_test_40k_engine"]').val('-');  
                            $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


            $('#apar').hide();  
            $('input[name="apar"]').val('-');  
            $('#apar1').prop('checked', true); 

            $('#reservoir_wiper').hide();  
            $('input[name="reservoir_wiper"]').val('-');  
            $('#wiper1').prop('checked', true); 
            
            $('#vbelt_engine').hide();  
            $('input[name="vbelt_engine"]').val('-');  
            $('#vbelt_engine1').prop('checked', true); 

            $('#timing_belt').hide();  
            $('input[name="timing_belt"]').val('-');  
            $('#timing1').prop('checked', true); 

            $('#dongkrak').hide();  
            $('input[name="dongkrak"]').val('-');  
            $('#dongkrak_Ada').prop('checked', true); 

            $('#kunci_roda').hide();  
            $('input[name="kunci_roda"]').val('-');  
            $('#kunci_roda_Ada').prop('checked', true); 

                // Hide OLI MESIN BAWAH
                $('#oli_mesin_bawah').hide();
                $('input[name="oli_mesin_bawah"]').val('-');
                $('#oli_mesin_bawah1').prop('checked', true);

                // Hide AIR RADIATOR MESIN BAWAH
                $('#air_radiator_mesin_bawah').hide();
                $('input[name="air_radiator_mesin_bawah"]').val('-');
                $('#air_radiator_mesin_bawah1').prop('checked', true);

                // Hide FILTER OLI MESIN BAWAH
                $('#filter_oli_mesin_bawah').hide();
                $('input[name="filter_oli_mesin_bawah"]').val('-');
                $('#filter_oli_mesin_bawah1').prop('checked', true);

                // Hide FILTER BAHAN BAKAR MESIN BAWAH
                $('#filter_bahan_bakar_mesin_bawah').hide();
                $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                // Hide FILTER UDARA MESIN BAWAH
                $('#filter_udara_mesin_bawah').hide();
                $('input[name="filter_udara_mesin_bawah"]').val('-');
                $('#filter_udara_mesin_bawah1').prop('checked', true);

                // Hide OLI MESIN ATAS
                $('#oli_mesin_atas').hide();
                $('input[name="oli_mesin_atas"]').val('-');
                $('#oli_mesin_atas1').prop('checked', true);

                // Hide AIR RADIATOR MESIN ATAS
                $('#air_radiator_mesin_atas').hide();
                $('input[name="air_radiator_mesin_atas"]').val('-');
                $('#air_radiator_mesin_atas1').prop('checked', true);

                // Hide FILTER OLI MESIN ATAS
                $('#filter_oli_mesin_atas').hide();
                $('input[name="filter_oli_mesin_atas"]').val('-');
                $('#filter_oli_mesin_atas1').prop('checked', true);

                // Hide FILTER BAHAN BAKAR MESIN ATAS
                $('#filter_bahan_bakar_mesin_atas').hide();
                $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                // Hide FILTER UDARA MESIN ATAS
                $('#filter_udara_mesin_atas').hide();
                $('input[name="filter_udara_mesin_atas"]').val('-');
                $('#filter_udara_mesin_atas1').prop('checked', true);

                // Hide STARTER ENGINE MESIN ATAS
                $('#starter_engine_mesin_atas').hide();
                $('input[name="starter_engine_mesin_atas"]').val('-');
                $('#starter_engine_mesin_atas1').prop('checked', true);

                // Hide KONDISI ENGINE MESIN ATAS
                $('#kondisi_engine_mesin_atas').hide();
                $('input[name="kondisi_engine_mesin_atas"]').val('-');
                $('#kondisi_engine_mesin_atas1').prop('checked', true);

                // Hide TURBO MESIN ATAS
                $('#turbo_mesin_atas').hide();
                $('input[name="turbo_mesin_atas"]').val('-');
                $('#turbo_mesin_atas1').prop('checked', true);

                // Hide COOLING SYSTEM MESIN ATAS
                $('#cooling_system_mesin_atas').hide();
                $('input[name="cooling_system_mesin_atas"]').val('-');
                $('#cooling_system_mesin_atas1').prop('checked', true);

                // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                $('#gas_accelerator_pedal_mesin_atas').hide();
                $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                // Hide POMPA HIDROLIS
                $('#pompa_hidrolis').hide();
                $('input[name="pompa_hidrolis"]').val('-');
                $('#pompa_hidrolis1').prop('checked', true);

                // Hide FUNGSI HISAPAN VACUM
                $('#fungsi_hisapan_vacum').hide();
                $('input[name="fungsi_hisapan_vacum"]').val('-');
                $('#fungsi_hisapan_vacum1').prop('checked', true);

                // Hide FUNGSI GERAKAN VACUM
                $('#fungsi_gerakan_vacum').hide();
                $('input[name="fungsi_gerakan_vacum"]').val('-');
                $('#fungsi_gerakan_vacum1').prop('checked', true);

                // Hide FUNGSI PUTARAN SAPU KANAN
                $('#fungsi_putaran_sapu_kanan').hide();
                $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                // Hide FUNGSI PUTARAN SAPU KIRI
                $('#fungsi_putaran_sapu_kiri').hide();
                $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                // Hide FUNGSI PUTARAN SAPU TENGAH
                $('#fungsi_putaran_sapu_tengah').hide();
                $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                // Hide FUNGSI GERAKAN SAPU KANAN
                $('#fungsi_gerakan_sapu_kanan').hide();
                $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                // Hide FUNGSI GERAKAN SAPU KIRI
                $('#fungsi_gerakan_sapu_kiri').hide();
                $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                // Hide FUNGSI GERAKAN SAPU TENGAH
                $('#fungsi_gerakan_sapu_tengah').hide();
                $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                // Hide FUNGSI SPRAY BAR DEPAN
                $('#fungsi_spray_bar_depan').hide();
                $('input[name="fungsi_spray_bar_depan"]').val('-');
                $('#fungsi_spray_bar_depan1').prop('checked', true);

                // Hide FUNGSI SPRAY BAR KIRI
                $('#fungsi_spray_bar_kiri').hide();
                $('input[name="fungsi_spray_bar_kiri"]').val('-');
                $('#fungsi_spray_bar_kiri1').prop('checked', true);

                // Hide FUNGSI SPRAY BAR KANAN
                $('#fungsi_spray_bar_kanan').hide();
                $('input[name="fungsi_spray_bar_kanan"]').val('-');
                $('#fungsi_spray_bar_kanan1').prop('checked', true);

                // Hide FUNGSI JET SPRAY GUN
                $('#fungsi_jet_spray_gun').hide();
                $('input[name="fungsi_jet_spray_gun"]').val('-');
                $('#fungsi_jet_spray_gun1').prop('checked', true);

                // Hide FUNGSI HIDROLIS HOOPER
                $('#fungsi_hidrolis_hooper').hide();
                $('input[name="fungsi_hidrolis_hooper"]').val('-');
                $('#fungsi_hidrolis_hooper1').prop('checked', true);

                // Hide FUNGSI HIDROLIS TUTUP HOOPER
                $('#fungsi_hidrolis_tutup_hooper').hide();
                $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                // Hide FUNGSI MONITOR CONTROL
                $('#fungsi_monitor_control').hide();
                $('input[name="fungsi_monitor_control"]').val('-');
                $('#fungsi_monitor_control1').prop('checked', true);

                // Hide FUNGSI PENDANT
                $('#fungsi_pendant').hide();
                $('input[name="fungsi_pendant"]').val('-');
                $('#fungsi_pendant1').prop('checked', true);

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);


        } else if(vehicleType === 'Runway Sweeper'){

                    $('#kopling').hide();  
                    $('input[name="kopling"]').val('-');  
                    $('#kopling1').prop('checked', true); 

                    $('#handrem_tangki_air').hide();  
                    $('input[name="handrem_tangki_air"]').val('-');  
                    $('#handrem_tangki_air1').prop('checked', true);

                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                    $('#sign_lamp_depan').hide();  
                    $('input[name="sign_lamp_depan"]').val('-');  
                    $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                    $('#sign_lamp_belakang').hide();  
                    $('input[name="sign_lamp_belakang"]').val('-');  
                    $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);

                    // Hide FILTER OLI MESIN BAWAH
                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                    // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
            $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
            $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);


                // Hide FUNGSI DRAYER
                $('#fungsi_drayer').hide();
                $('input[name="fungsi_drayer"]').val('-');
                $('#fungsi_drayer1').prop('checked', true);

                // Hide FUNGSI AUTO START
                $('#fungsi_auto_start').hide();
                $('input[name="fungsi_auto_start"]').val('-');
                $('#fungsi_auto_start1').prop('checked', true);

            $('#filter_oli_kompresor').hide();
            $('input[name="filter_oli_kompresor"]').val('-');
            $('#filter_oli_kompresor1').prop('checked', true);
                            // Hide OLI KOMPRESOR
                $('#oli_kompresor').hide();
                $('input[name="oli_kompresor"]').val('-');
                $('#oli_kompresor1').prop('checked', true);

                // Hide BAN KANAN
                $('#ban_kanan').hide();
                $('input[name="ban_kanan"]').val('-');
                $('#ban_kanan1').prop('checked', true);

                // Hide BAN KIRI
                $('#ban_kiri').hide();
                $('input[name="ban_kiri"]').val('-');
                $('#ban_kiri1').prop('checked', true);

                // Hide FUNGSI SCREW KOMPRESOR
                $('#fungsi_screw_kompresor').hide();
                $('input[name="fungsi_screw_kompresor"]').val('-');
                $('#fungsi_screw_kompresor1').prop('checked', true);

                // Hide FUNGSI CUT OFF PRESSURE
                $('#fungsi_cut_off_pressure').hide();
                $('input[name="fungsi_cut_off_pressure"]').val('-');
                $('#fungsi_cut_off_pressure1').prop('checked', true);


                    // Hide Fungsi Hidrolik Moower
                    $('#fungsi_hidrolik_moower').hide();
                    $('input[name="fungsi_hidrolik_moower"]').val('-');
                    $('#fungsi_hidrolik_moower1').prop('checked', true);

                    // Hide Fungsi Pisau Moower
                    $('#fungsi_pisau_moower').hide();
                    $('input[name="fungsi_pisau_moower"]').val('-');
                    $('#fungsi_pisau_moower1').prop('checked', true);

                    // Hide Fungsi Pompa Hidrolic
                    $('#fungsi_pompa_hidrolic').hide();
                    $('input[name="fungsi_pompa_hidrolic"]').val('-');
                    $('#fungsi_pompa_hidrolic1').prop('checked', true);

                    // Hide Gearbox
                    $('#gearbox').hide();
                    $('input[name="gearbox"]').val('-');
                    $('#gearbox1').prop('checked', true);

                // Fungsi Gerakan Shourd
                $('#fungsi_gerakan_shourd').hide();
                $('input[name="fungsi_gerakan_shourd"]').val('-');
                $('#fungsi_gerakan_shourd1').prop('checked', true);

                // Fungsi Putaran Kumparan
                $('#fungsi_putaran_kumparan').hide();
                $('input[name="fungsi_putaran_kumparan"]').val('-');
                $('#fungsi_putaran_kumparan1').prop('checked', true);

                // Nozzle
                $('#nozzle').hide();
                $('input[name="nozzle"]').val('-');
                $('#nozzle1').prop('checked', true);

                // Selang Hidrolis
                $('#selang_hidrolis').hide();
                $('input[name="selang_hidrolis"]').val('-');
                $('#selang_hidrolis1').prop('checked', true);

                // Seal Brush Button
                $('#seal_brush_button').hide();
                $('input[name="seal_brush_button"]').val('-');
                $('#seal_brush_button1').prop('checked', true);

                // Seal Swifel Shaft
                $('#seal_swifel_shaft').hide();
                $('input[name="seal_swifel_shaft"]').val('-');
                $('#seal_swifel_shaft1').prop('checked', true);

                // Seal Gasket
                $('#seal_gasket').hide();
                $('input[name="seal_gasket"]').val('-');
                $('#seal_gasket1').prop('checked', true);

                // Seal Upper
                $('#seal_upper').hide();
                $('input[name="seal_upper"]').val('-');
                $('#seal_upper1').prop('checked', true);

                // Drit Shield
                $('#drit_shield').hide();
                $('input[name="drit_shield"]').val('-');
                $('#drit_shield1').prop('checked', true);


                // Hide Friction Tyre Kanan
                         $('#friction_tyre_kanan').hide();
                        $('input[name="friction_tyre_kanan"]').val('-');
                        $('#friction_tyre_kanan1').prop('checked', true);

                        // Hide Friction Tyre Kiri
                        $('#friction_tyre_kiri').hide();
                        $('input[name="friction_tyre_kiri"]').val('-');
                        $('#friction_tyre_kiri1').prop('checked', true);

                        // Hide Distance Tyre Tengah
                        $('#distance_tyre_tengah').hide();
                        $('input[name="distance_tyre_tengah"]').val('-');
                        $('#distance_tyre_tengah1').prop('checked', true);

                        // Hide Loadcell
                        $('#loadcell').hide();
                        $('input[name="loadcell"]').val('-');
                        $('#loadcell1').prop('checked', true);

                        // Hide Connector Kabel
                        $('#connector_kabel').hide();
                        $('input[name="connector_kabel"]').val('-');
                        $('#connector_kabel1').prop('checked', true);

                        // Hide Fungsi Pompa Air
                        $('#fungsi_pompa_air').hide();
                        $('input[name="fungsi_pompa_air"]').val('-');
                        $('#fungsi_pompa_air1').prop('checked', true);

                        // Hide Kondisi Tangki Air
                        $('#kondisi_tangki_air').hide();
                        $('input[name="kondisi_tangki_air"]').val('-');
                        $('#kondisi_tangki_air1').prop('checked', true);

                        // Hide Laptop
                        $('#laptop').hide();
                        $('input[name="laptop"]').val('-');
                        $('#laptop1').prop('checked', true);

                        // Hide Kalibrasi Jarak
                        $('#kalibrasi_jarak').hide();
                        $('input[name="kalibrasi_jarak"]').val('-');
                        $('#kalibrasi_jarak1').prop('checked', true);
                
            // Menyembunyikan seluruh elemen yang berkaitan dengan sistem pneumatik
                $('#pompa_uhp').hide();  
                $('input[name="pompa_uhp"]').val('-');  
                $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#pto_kopling_pompa').hide();  
                $('input[name="pto_kopling_pompa"]').val('-');  
                $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                $('#v_belt_pompa_uhp').hide();  
                $('input[name="v_belt_pompa_uhp"]').val('-');  
                $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                $('#kampas_kopling_pompa_uhp').hide();  
                $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                $('#kompresor_pompa_uhp').hide();  
                $('input[name="kompresor_pompa_uhp"]').val('-');  
                $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                $('#vacum_hose_3_inch').hide();  
                $('input[name="vacum_hose_3_inch"]').val('-');  
                $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                $('#vacum_hose_4_inch').hide();  
                $('input[name="vacum_hose_4_inch"]').val('-');  
                $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                $('#vacum_hose_6_inch').hide();  
                $('input[name="vacum_hose_6_inch"]').val('-');  
                $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                $('#hose_40k').hide();  
                $('input[name="hose_40k"]').val('-');  
                $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                $('#filter_cartridge').hide();  
                $('input[name="filter_cartridge"]').val('-');  
                $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                $('#filter_bag_10_micron').hide();  
                $('input[name="filter_bag_10_micron"]').val('-');  
                $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                $('#debris_bag').hide();  
                $('input[name="debris_bag"]').val('-');  
                $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                $('#running_test_40k_engine').hide();  
                $('input[name="running_test_40k_engine"]').val('-');  
                $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


       

            $('#reservoir_wiper').hide();  
            $('input[name="reservoir_wiper"]').val('-');  
            $('#wiper1').prop('checked', true); 
            
            $('#vbelt_engine').hide();  
            $('input[name="vbelt_engine"]').val('-');  
            $('#vbelt_engine1').prop('checked', true); 

            $('#timing_belt').hide();  
            $('input[name="timing_belt"]').val('-');  
            $('#timing1').prop('checked', true); 

            $('#dongkrak').hide();  
            $('input[name="dongkrak"]').val('-');  
            $('#dongkrak_Ada').prop('checked', true); 

            $('#kunci_roda').hide();  
            $('input[name="kunci_roda"]').val('-');  
            $('#kunci_roda_Ada').prop('checked', true); 

                    $('#lampu_kompartement').hide();  
                    $('input[name="lampu_kompartement"]').val('-');  
                    $('#lampu_kompartement1').prop('checked', true); 

                    $('#lampu_body').hide();  
                    $('input[name="lampu_body"]').val('-');  
                    $('#lampu_body1').prop('checked', true); 

                    $('#ban_tengah_kanan').hide();  
                    $('input[name="ban_tengah_kanan"]').val('-');  
                    $('#ban_tengah_kanan1').prop('checked', true); 

                    $('#ban_tengah_kiri').hide();  
                    $('input[name="ban_tengah_kiri"]').val('-');  
                    $('#ban_tengah_kiri1').prop('checked', true); 

                    $('#pompa_fire_fighting').hide();  
                    $('input[name="pompa_fire_fighting"]').val('-');  
                    $('#pompa_fire_fighting1').prop('checked', true); 

                    $('#primming_pump').hide();  
                    $('input[name="primming_pump"]').val('-');  
                    $('#primming_pump1').prop('checked', true); 

                    $('#roof_turret').hide();  
                    $('input[name="roof_turret"]').val('-');  
                    $('#roof_turret1').prop('checked', true); 

                    $('#bumper_turret').hide();  
                    $('input[name="bumper_turret"]').val('-');  
                    $('#bumper_turret1').prop('checked', true); 

                    $('#undertrack_spray_depan').hide();  
                    $('input[name="undertrack_spray_depan"]').val('-');  
                    $('#undertrack_spray_depan1').prop('checked', true); 

                    $('#undertrack_spray_kanan').hide();  
                    $('input[name="undertrack_spray_kanan"]').val('-');  
                    $('#undertrack_spray_kanan1').prop('checked', true); 

                    $('#undertrack_spray_kiri').hide();  
                    $('input[name="undertrack_spray_kiri"]').val('-');  
                    $('#undertrack_spray_kiri1').prop('checked', true); 

                    $('#foam_proportioner').hide();  
                    $('input[name="foam_proportioner"]').val('-');  
                    $('#foam_proportioner1').prop('checked', true); 

                    $('#tangki_air').hide();  
                    $('input[name="tangki_air"]').val('-');  
                    $('#tangki_air1').prop('checked', true); 

                    $('#tangki_foam').hide();  
                    $('input[name="tangki_foam"]').val('-');  
                    $('#tangki_foam1').prop('checked', true); 

                    $('#pengisian_air_eksternal').hide();  
                    $('input[name="pengisian_air_eksternal"]').val('-');  
                    $('#pengisian_air_eksternal1').prop('checked', true); 

                    $('#charger_baterai_eksternal').hide();  
                    $('input[name="charger_baterai_eksternal"]').val('-');  
                    $('#charger_baterai_eksternal1').prop('checked', true); 

                          $('#top_speeds').hide();  
                        $('input[name="top_speed"]').val('0');  
                        $('#top_speed').removeAttr('required');  // Hilangkan required

                        $('#stop_distances').hide();  
                        $('input[name="stop_distance"]').val('0');
                        $('#stop_distance').removeAttr('required');  // Hilangkan required

                        $('#accelerations').hide();  
                        $('input[name="acceleration"]').val('0'); 
                        $('#acceleration').removeAttr('required');  // Hilangkan required

                        $('#discharge_ranges').hide();  
                        $('input[name="discharge_range"]').val('0');   
                        $('#discharge_range').removeAttr('required');  // Hilangkan required

                        $('#discharge_rates').hide();  
                        $('input[name="discharge_rate"]').val('0'); 
                        $('#discharge_rate').removeAttr('required');  // Hilangkan required


                            $('#ban_tengah_belakang').hide();
                            $('input[name="ban_tengah_belakang"]').val('-');
                            $('#ban_tengah_belakang1').prop('checked', true);

        } else if(vehicleType === 'Rubber Deposit'){

                            // Hide OLI MESIN BAWAH
                        $('#oli_mesin_bawah').hide();
                        $('input[name="oli_mesin_bawah"]').val('-');
                        $('#oli_mesin_bawah1').prop('checked', true);

                        // Hide AIR RADIATOR MESIN BAWAH
                        $('#air_radiator_mesin_bawah').hide();
                        $('input[name="air_radiator_mesin_bawah"]').val('-');
                        $('#air_radiator_mesin_bawah1').prop('checked', true);

                        // Hide FILTER OLI MESIN BAWAH
                        $('#filter_oli_mesin_bawah').hide();
                        $('input[name="filter_oli_mesin_bawah"]').val('-');
                        $('#filter_oli_mesin_bawah1').prop('checked', true);

                        // Hide FILTER BAHAN BAKAR MESIN BAWAH
                        $('#filter_bahan_bakar_mesin_bawah').hide();
                        $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                        $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                        // Hide FILTER UDARA MESIN BAWAH
                        $('#filter_udara_mesin_bawah').hide();
                        $('input[name="filter_udara_mesin_bawah"]').val('-');
                        $('#filter_udara_mesin_bawah1').prop('checked', true);


                     // Hide OLI MESIN ATAS
                     $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
            $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
            $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

                        $('#pisau_potong').hide();
                $('input[name="pisau_potong"]').val('-');
                $('#pisau_potong1').prop('checked', true);

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

                        $('#v_belt_kompresor').hide();
                $('input[name="v_belt_kompresor"]').val('-');
                $('#v_belt_kompresor1').prop('checked', true);

                // Hide FUNGSI DRAYER
                $('#fungsi_drayer').hide();
                $('input[name="fungsi_drayer"]').val('-');
                $('#fungsi_drayer1').prop('checked', true);

                // Hide FUNGSI AUTO START
                $('#fungsi_auto_start').hide();
                $('input[name="fungsi_auto_start"]').val('-');
                $('#fungsi_auto_start1').prop('checked', true);

            $('#filter_oli_kompresor').hide();
            $('input[name="filter_oli_kompresor"]').val('-');
            $('#filter_oli_kompresor1').prop('checked', true);

                            // Hide OLI KOMPRESOR
                $('#oli_kompresor').hide();
                $('input[name="oli_kompresor"]').val('-');
                $('#oli_kompresor1').prop('checked', true);

                // Hide BAN KANAN
                $('#ban_kanan').hide();
                $('input[name="ban_kanan"]').val('-');
                $('#ban_kanan1').prop('checked', true);

                // Hide BAN KIRI
                $('#ban_kiri').hide();
                $('input[name="ban_kiri"]').val('-');
                $('#ban_kiri1').prop('checked', true);

                // Hide FUNGSI SCREW KOMPRESOR
                $('#fungsi_screw_kompresor').hide();
                $('input[name="fungsi_screw_kompresor"]').val('-');
                $('#fungsi_screw_kompresor1').prop('checked', true);

                // Hide FUNGSI CUT OFF PRESSURE
                $('#fungsi_cut_off_pressure').hide();
                $('input[name="fungsi_cut_off_pressure"]').val('-');
                $('#fungsi_cut_off_pressure1').prop('checked', true);


                // Hide Fungsi Hidrolik Moower
                $('#fungsi_hidrolik_moower').hide();
                $('input[name="fungsi_hidrolik_moower"]').val('-');
                $('#fungsi_hidrolik_moower1').prop('checked', true);

                // Hide Fungsi Pisau Moower
                $('#fungsi_pisau_moower').hide();
                $('input[name="fungsi_pisau_moower"]').val('-');
                $('#fungsi_pisau_moower1').prop('checked', true);

                // Hide Fungsi Pompa Hidrolic
                $('#fungsi_pompa_hidrolic').hide();
                $('input[name="fungsi_pompa_hidrolic"]').val('-');
                $('#fungsi_pompa_hidrolic1').prop('checked', true);

                // Hide Gearbox
                $('#gearbox').hide();
                $('input[name="gearbox"]').val('-');
                $('#gearbox1').prop('checked', true);

                $('#handrem_tangki_air').hide();  
                $('input[name="handrem_tangki_air"]').val('-');  
                $('#handrem_tangki_air1').prop('checked', true); 

                $('#pompa_hidrolis').hide();
                $('input[name="pompa_hidrolis"]').val('-');
                $('#pompa_hidrolis1').prop('checked', true);


            $('#sistem_pendingin').hide();  
            $('input[name="sistem_pendingin"]').val('-');  
            $('#sistem_pendingin1').prop('checked', true); 

            $('#kopling').hide();  
            $('input[name="kopling"]').val('-');  
            $('#kopling1').prop('checked', true); 

            $('#sign_lamp_depan').hide();  
            $('input[name="sign_lamp_depan"]').val('-');  
            $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

            
            $('#sign_lamp_belakang').hide();  
            $('input[name="sign_lamp_belakang"]').val('-');  
            $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                // Fungsi Gerakan Shourd
                $('#fungsi_gerakan_shourd').hide();
                $('input[name="fungsi_gerakan_shourd"]').val('-');
                $('#fungsi_gerakan_shourd1').prop('checked', true);

                // Fungsi Putaran Kumparan
                $('#fungsi_putaran_kumparan').hide();
                $('input[name="fungsi_putaran_kumparan"]').val('-');
                $('#fungsi_putaran_kumparan1').prop('checked', true);

                // Nozzle
                $('#nozzle').hide();
                $('input[name="nozzle"]').val('-');
                $('#nozzle1').prop('checked', true);

                // Selang Hidrolis
                $('#selang_hidrolis').hide();
                $('input[name="selang_hidrolis"]').val('-');
                $('#selang_hidrolis1').prop('checked', true);

                // Seal Brush Button
                $('#seal_brush_button').hide();
                $('input[name="seal_brush_button"]').val('-');
                $('#seal_brush_button1').prop('checked', true);

                // Seal Swifel Shaft
                $('#seal_swifel_shaft').hide();
                $('input[name="seal_swifel_shaft"]').val('-');
                $('#seal_swifel_shaft1').prop('checked', true);

                // Seal Gasket
                $('#seal_gasket').hide();
                $('input[name="seal_gasket"]').val('-');
                $('#seal_gasket1').prop('checked', true);

                // Seal Upper
                $('#seal_upper').hide();
                $('input[name="seal_upper"]').val('-');
                $('#seal_upper1').prop('checked', true);

                // Drit Shield
                $('#drit_shield').hide();
                $('input[name="drit_shield"]').val('-');
                $('#drit_shield1').prop('checked', true);


                        // Hide Friction Tyre Kanan
                        $('#friction_tyre_kanan').hide();
                        $('input[name="friction_tyre_kanan"]').val('-');
                        $('#friction_tyre_kanan1').prop('checked', true);

                        // Hide Friction Tyre Kiri
                        $('#friction_tyre_kiri').hide();
                        $('input[name="friction_tyre_kiri"]').val('-');
                        $('#friction_tyre_kiri1').prop('checked', true);

                        // Hide Distance Tyre Tengah
                        $('#distance_tyre_tengah').hide();
                        $('input[name="distance_tyre_tengah"]').val('-');
                        $('#distance_tyre_tengah1').prop('checked', true);

                        // Hide Loadcell
                        $('#loadcell').hide();
                        $('input[name="loadcell"]').val('-');
                        $('#loadcell1').prop('checked', true);

                        // Hide Connector Kabel
                        $('#connector_kabel').hide();
                        $('input[name="connector_kabel"]').val('-');
                        $('#connector_kabel1').prop('checked', true);

                        // Hide Fungsi Pompa Air
                        $('#fungsi_pompa_air').hide();
                        $('input[name="fungsi_pompa_air"]').val('-');
                        $('#fungsi_pompa_air1').prop('checked', true);

                        // Hide Kondisi Tangki Air
                        $('#kondisi_tangki_air').hide();
                        $('input[name="kondisi_tangki_air"]').val('-');
                        $('#kondisi_tangki_air1').prop('checked', true);

                        // Hide Laptop
                        $('#laptop').hide();
                        $('input[name="laptop"]').val('-');
                        $('#laptop1').prop('checked', true);

                        // Hide Kalibrasi Jarak
                        $('#kalibrasi_jarak').hide();
                        $('input[name="kalibrasi_jarak"]').val('-');
                        $('#kalibrasi_jarak1').prop('checked', true);

            $('#reservoir_wiper').hide();  
            $('input[name="reservoir_wiper"]').val('-');  
            $('#wiper1').prop('checked', true); 
            
            $('#vbelt_engine').hide();  
            $('input[name="vbelt_engine"]').val('-');  
            $('#vbelt_engine1').prop('checked', true); 

            $('#timing_belt').hide();  
            $('input[name="timing_belt"]').val('-');  
            $('#timing1').prop('checked', true); 

            $('#dongkrak').hide();  
            $('input[name="dongkrak"]').val('-');  
            $('#dongkrak_Ada').prop('checked', true); 

            $('#kunci_roda').hide();  
            $('input[name="kunci_roda"]').val('-');  
            $('#kunci_roda_Ada').prop('checked', true); 

                    $('#lampu_kompartement').hide();  
                    $('input[name="lampu_kompartement"]').val('-');  
                    $('#lampu_kompartement1').prop('checked', true); 

                    $('#lampu_body').hide();  
                    $('input[name="lampu_body"]').val('-');  
                    $('#lampu_body1').prop('checked', true); 

                    $('#pompa_fire_fighting').hide();  
                    $('input[name="pompa_fire_fighting"]').val('-');  
                    $('#pompa_fire_fighting1').prop('checked', true); 

                    $('#primming_pump').hide();  
                    $('input[name="primming_pump"]').val('-');  
                    $('#primming_pump1').prop('checked', true); 

                    $('#roof_turret').hide();  
                    $('input[name="roof_turret"]').val('-');  
                    $('#roof_turret1').prop('checked', true); 

                    $('#bumper_turret').hide();  
                    $('input[name="bumper_turret"]').val('-');  
                    $('#bumper_turret1').prop('checked', true); 

                    $('#undertrack_spray_depan').hide();  
                    $('input[name="undertrack_spray_depan"]').val('-');  
                    $('#undertrack_spray_depan1').prop('checked', true); 

                    $('#undertrack_spray_kanan').hide();  
                    $('input[name="undertrack_spray_kanan"]').val('-');  
                    $('#undertrack_spray_kanan1').prop('checked', true); 

                    $('#undertrack_spray_kiri').hide();  
                    $('input[name="undertrack_spray_kiri"]').val('-');  
                    $('#undertrack_spray_kiri1').prop('checked', true); 

                    $('#foam_proportioner').hide();  
                    $('input[name="foam_proportioner"]').val('-');  
                    $('#foam_proportioner1').prop('checked', true); 

                    $('#tangki_air').hide();  
                    $('input[name="tangki_air"]').val('-');  
                    $('#tangki_air1').prop('checked', true); 

                    $('#tangki_foam').hide();  
                    $('input[name="tangki_foam"]').val('-');  
                    $('#tangki_foam1').prop('checked', true); 

                    $('#pengisian_air_eksternal').hide();  
                    $('input[name="pengisian_air_eksternal"]').val('-');  
                    $('#pengisian_air_eksternal1').prop('checked', true); 

                    $('#charger_baterai_eksternal').hide();  
                    $('input[name="charger_baterai_eksternal"]').val('-');  
                    $('#charger_baterai_eksternal1').prop('checked', true); 

                          $('#top_speeds').hide();  
                        $('input[name="top_speed"]').val('0');  
                        $('#top_speed').removeAttr('required');  // Hilangkan required

                        $('#stop_distances').hide();  
                        $('input[name="stop_distance"]').val('0');
                        $('#stop_distance').removeAttr('required');  // Hilangkan required

                        $('#accelerations').hide();  
                        $('input[name="acceleration"]').val('0'); 
                        $('#acceleration').removeAttr('required');  // Hilangkan required

                        $('#discharge_ranges').hide();  
                        $('input[name="discharge_range"]').val('0');   
                        $('#discharge_range').removeAttr('required');  // Hilangkan required

                        $('#discharge_rates').hide();  
                        $('input[name="discharge_rate"]').val('0'); 
                        $('#discharge_rate').removeAttr('required');  // Hilangkan required

                                        // Hide FUNGSI HISAPAN VACUM
                                $('#fungsi_hisapan_vacum').hide();
                                $('input[name="fungsi_hisapan_vacum"]').val('-');
                                $('#fungsi_hisapan_vacum1').prop('checked', true);

                                // Hide FUNGSI GERAKAN VACUM
                                $('#fungsi_gerakan_vacum').hide();
                                $('input[name="fungsi_gerakan_vacum"]').val('-');
                                $('#fungsi_gerakan_vacum1').prop('checked', true);

                                // Hide FUNGSI PUTARAN SAPU KANAN
                                $('#fungsi_putaran_sapu_kanan').hide();
                                $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                                $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                                // Hide FUNGSI PUTARAN SAPU KIRI
                                $('#fungsi_putaran_sapu_kiri').hide();
                                $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                                $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                                // Hide FUNGSI PUTARAN SAPU TENGAH
                                $('#fungsi_putaran_sapu_tengah').hide();
                                $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                                $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                                // Hide FUNGSI GERAKAN SAPU KANAN
                                $('#fungsi_gerakan_sapu_kanan').hide();
                                $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                                $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                                // Hide FUNGSI GERAKAN SAPU KIRI
                                $('#fungsi_gerakan_sapu_kiri').hide();
                                $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                                $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                                // Hide FUNGSI GERAKAN SAPU TENGAH
                                $('#fungsi_gerakan_sapu_tengah').hide();
                                $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                                $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                                // Hide FUNGSI SPRAY BAR DEPAN
                                $('#fungsi_spray_bar_depan').hide();
                                $('input[name="fungsi_spray_bar_depan"]').val('-');
                                $('#fungsi_spray_bar_depan1').prop('checked', true);

                                // Hide FUNGSI SPRAY BAR KIRI
                                $('#fungsi_spray_bar_kiri').hide();
                                $('input[name="fungsi_spray_bar_kiri"]').val('-');
                                $('#fungsi_spray_bar_kiri1').prop('checked', true);

                                // Hide FUNGSI SPRAY BAR KANAN
                                $('#fungsi_spray_bar_kanan').hide();
                                $('input[name="fungsi_spray_bar_kanan"]').val('-');
                                $('#fungsi_spray_bar_kanan1').prop('checked', true);

                                // Hide FUNGSI JET SPRAY GUN
                                $('#fungsi_jet_spray_gun').hide();
                                $('input[name="fungsi_jet_spray_gun"]').val('-');
                                $('#fungsi_jet_spray_gun1').prop('checked', true);

                                // Hide FUNGSI HIDROLIS HOOPER
                                $('#fungsi_hidrolis_hooper').hide();
                                $('input[name="fungsi_hidrolis_hooper"]').val('-');
                                $('#fungsi_hidrolis_hooper1').prop('checked', true);

                                // Hide FUNGSI HIDROLIS TUTUP HOOPER
                                $('#fungsi_hidrolis_tutup_hooper').hide();
                                $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                                $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                                // Hide FUNGSI MONITOR CONTROL
                                $('#fungsi_monitor_control').hide();
                                $('input[name="fungsi_monitor_control"]').val('-');
                                $('#fungsi_monitor_control1').prop('checked', true);

                                // Hide FUNGSI PENDANT
                                $('#fungsi_pendant').hide();
                                $('input[name="fungsi_pendant"]').val('-');
                                $('#fungsi_pendant1').prop('checked', true);

                                    $('#air_radiator_mesin').hide();
                                    $('input[name="air_radiator_mesin"]').val('-');
                                    $('#air_radiator_mesin1').prop('checked', true);

                                    $('#ban_tengah_belakang').hide();
                                    $('input[name="ban_tengah_belakang"]').val('-');
                                    $('#ban_tengah_belakang1').prop('checked', true);
        } else if(vehicleType === 'Tractor Rubber Deposit'){

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);

                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                        $('#klakson').hide();  
                        $('input[name="klakson"]').val('-');  
                        $('#klakson1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#stoplamp').hide();  
                        $('input[name="stoplamp"]').val('-');  
                        $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                        $('#headlamp_dekat').hide();  
                        $('input[name="headlamp_dekat"]').val('-');  
                        $('#headlamp_dekat1').prop('checked', true);  // Centang radio 'Baik'

                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                    $('#filter_water_sparator').hide();  
                    $('input[name="filter_water_sparator"]').val('-');  
                    $('#filter_water_sparator1').prop('checked', true);  // Centang radio 'Baik'

                $('#minyak_power_steering').hide();  
                $('input[name="minyak_power_steering"]').val('-');  
                $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#minyak_rem').hide();  
                $('input[name="minyak_rem"]').val('-');  
                $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

            $('#oli_transmisi').hide();  
                $('input[name="oli_transmisi"]').val('-');  
                $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

            $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

                        $('#v_belt_kompresor').hide();
                $('input[name="v_belt_kompresor"]').val('-');
                $('#v_belt_kompresor1').prop('checked', true);

                // Hide FUNGSI DRAYER
                $('#fungsi_drayer').hide();
                $('input[name="fungsi_drayer"]').val('-');
                $('#fungsi_drayer1').prop('checked', true);

                // Hide FUNGSI AUTO START
                $('#fungsi_auto_start').hide();
                $('input[name="fungsi_auto_start"]').val('-');
                $('#fungsi_auto_start1').prop('checked', true);

            $('#filter_oli_kompresor').hide();
            $('input[name="filter_oli_kompresor"]').val('-');
            $('#filter_oli_kompresor1').prop('checked', true);
                            // Hide OLI KOMPRESOR
                $('#oli_kompresor').hide();
                $('input[name="oli_kompresor"]').val('-');
                $('#oli_kompresor1').prop('checked', true);

                // Hide BAN KANAN
                $('#ban_kanan').hide();
                $('input[name="ban_kanan"]').val('-');
                $('#ban_kanan1').prop('checked', true);

                // Hide BAN KIRI
                $('#ban_kiri').hide();
                $('input[name="ban_kiri"]').val('-');
                $('#ban_kiri1').prop('checked', true);

                // Hide FUNGSI SCREW KOMPRESOR
                $('#fungsi_screw_kompresor').hide();
                $('input[name="fungsi_screw_kompresor"]').val('-');
                $('#fungsi_screw_kompresor1').prop('checked', true);

                // Hide FUNGSI CUT OFF PRESSURE
                $('#fungsi_cut_off_pressure').hide();
                $('input[name="fungsi_cut_off_pressure"]').val('-');
                $('#fungsi_cut_off_pressure1').prop('checked', true);


                            // Hide Fungsi Hidrolik Moower
                            $('#fungsi_hidrolik_moower').hide();
                            $('input[name="fungsi_hidrolik_moower"]').val('-');
                            $('#fungsi_hidrolik_moower1').prop('checked', true);

                            // Hide Fungsi Pisau Moower
                            $('#fungsi_pisau_moower').hide();
                            $('input[name="fungsi_pisau_moower"]').val('-');
                            $('#fungsi_pisau_moower1').prop('checked', true);


                            // Hide Gearbox
                            $('#gearbox').hide();
                            $('input[name="gearbox"]').val('-');
                            $('#gearbox1').prop('checked', true);


                            $('#handrem_tangki_air').hide();  
                            $('input[name="handrem_tangki_air"]').val('-');  
                            $('#handrem_tangki_air1').prop('checked', true); 

                            
                            $('#kaca_film').hide();  
                            $('input[name="kaca_film"]').val('-');  
                            $('#kaca_film1').prop('checked', true); 

                            $('#kopling').hide();  
                            $('input[name="kopling"]').val('-');  
                            $('#kopling1').prop('checked', true); 

                            $('#sign_lamp_depan').hide();  
                            $('input[name="sign_lamp_depan"]').val('-');  
                            $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                            $('#sign_lamp_belakang').hide();  
                            $('input[name="sign_lamp_belakang"]').val('-');  
                            $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                            $('#fungsi_wipper').hide();  
                            $('input[name="fungsi_wipper"]').val('-');  
                            $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

                            $('#pompa_uhp').hide();  
                            $('input[name="pompa_uhp"]').val('-');  
                            $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                            $('#pto_kopling_pompa').hide();  
                            $('input[name="pto_kopling_pompa"]').val('-');  
                            $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                            $('#v_belt_pompa_uhp').hide();  
                            $('input[name="v_belt_pompa_uhp"]').val('-');  
                            $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                            $('#kampas_kopling_pompa_uhp').hide();  
                            $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                            $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                            $('#kompresor_pompa_uhp').hide();  
                            $('input[name="kompresor_pompa_uhp"]').val('-');  
                            $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                            $('#vacum_hose_3_inch').hide();  
                            $('input[name="vacum_hose_3_inch"]').val('-');  
                            $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                            $('#vacum_hose_4_inch').hide();  
                            $('input[name="vacum_hose_4_inch"]').val('-');  
                            $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                            $('#vacum_hose_6_inch').hide();  
                            $('input[name="vacum_hose_6_inch"]').val('-');  
                            $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                            $('#hose_40k').hide();  
                            $('input[name="hose_40k"]').val('-');  
                            $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                            $('#filter_cartridge').hide();  
                            $('input[name="filter_cartridge"]').val('-');  
                            $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                            $('#filter_bag_10_micron').hide();  
                            $('input[name="filter_bag_10_micron"]').val('-');  
                            $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                            $('#debris_bag').hide();  
                            $('input[name="debris_bag"]').val('-');  
                            $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                            $('#running_test_40k_engine').hide();  
                            $('input[name="running_test_40k_engine"]').val('-');  
                            $('#running_test_40k_engine1').prop('checked', true); // Centan

                            // Hide Friction Tyre Kanan
                        $('#friction_tyre_kanan').hide();
                        $('input[name="friction_tyre_kanan"]').val('-');
                        $('#friction_tyre_kanan1').prop('checked', true);

                        // Hide Friction Tyre Kiri
                        $('#friction_tyre_kiri').hide();
                        $('input[name="friction_tyre_kiri"]').val('-');
                        $('#friction_tyre_kiri1').prop('checked', true);

                        // Hide Distance Tyre Tengah
                        $('#distance_tyre_tengah').hide();
                        $('input[name="distance_tyre_tengah"]').val('-');
                        $('#distance_tyre_tengah1').prop('checked', true);

                        // Hide Loadcell
                        $('#loadcell').hide();
                        $('input[name="loadcell"]').val('-');
                        $('#loadcell1').prop('checked', true);

                        // Hide Connector Kabel
                        $('#connector_kabel').hide();
                        $('input[name="connector_kabel"]').val('-');
                        $('#connector_kabel1').prop('checked', true);

                        // Hide Fungsi Pompa Air
                        $('#fungsi_pompa_air').hide();
                        $('input[name="fungsi_pompa_air"]').val('-');
                        $('#fungsi_pompa_air1').prop('checked', true);

                        // Hide Kondisi Tangki Air
                        $('#kondisi_tangki_air').hide();
                        $('input[name="kondisi_tangki_air"]').val('-');
                        $('#kondisi_tangki_air1').prop('checked', true);

                        // Hide Laptop
                        $('#laptop').hide();
                        $('input[name="laptop"]').val('-');
                        $('#laptop1').prop('checked', true);

                        // Hide Kalibrasi Jarak
                        $('#kalibrasi_jarak').hide();
                        $('input[name="kalibrasi_jarak"]').val('-');
                        $('#kalibrasi_jarak1').prop('checked', true);

                            $('#apar').hide();  
                            $('input[name="apar"]').val('-');  
                            $('#apar1').prop('checked', true); 

                            $('#reservoir_wiper').hide();  
                            $('input[name="reservoir_wiper"]').val('-');  
                            $('#wiper1').prop('checked', true); 
                            
                            $('#vbelt_engine').hide();  
                            $('input[name="vbelt_engine"]').val('-');  
                            $('#vbelt_engine1').prop('checked', true); 

                            $('#timing_belt').hide();  
                            $('input[name="timing_belt"]').val('-');  
                            $('#timing1').prop('checked', true); 

                            $('#dongkrak').hide();  
                            $('input[name="dongkrak"]').val('-');  
                            $('#dongkrak_Ada').prop('checked', true); 

                            $('#kunci_roda').hide();  
                            $('input[name="kunci_roda"]').val('-');  
                            $('#kunci_roda_Ada').prop('checked', true); 

                        $('#ban_belakang_kanan').hide();  
                        $('input[name="ban_belakang_kanan"]').val('-');  
                        $('#ban_belakang_kanan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#ban_belakang_kiri').hide();  
                        $('input[name="ban_belakang_kiri"]').val('-');  
                        $('#ban_belakang_kiri1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#microphone').hide();  
                        $('input[name="microphone"]').val('-');  
                        $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#power_window_lock').hide();  
                        $('input[name="power_window_lock"]').val('-');  
                        $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#central_lock').hide();  
                        $('input[name="central_lock"]').val('-');  
                        $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#cabin_lamp').hide();  
                        $('input[name="cabin_lamp"]').val('-');  
                        $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#air_coditioning').hide();  
                        $('input[name="air_coditioning"]').val('-');  
                        $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#lampu_atret').hide();  
                        $('input[name="lampu_atret"]').val('-');  
                        $('#lampu_atret1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#folklamp').hide();  
                        $('input[name="folklamp"]').val('-');  
                        $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#reversing_lamp').hide();  
                        $('input[name="reversing_lamp"]').val('-');  
                        $('#reversing_lamp1').prop('checked', true);  // Centang radio 'Baik'

                        $('#headlamp_jauh').hide();  
                        $('input[name="headlamp_jauh"]').val('-');  
                        $('#headlamp_jauh1').prop('checked', true);  // Centang radio 'Baik'


                        $('#kondisi_karet_wiper').hide();  
                        $('input[name="kondisi_karet_wiper"]').val('-');  
                        $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik'                 

                            $('#oli_gardan').hide();  
                            $('input[name="oli_gardan"]').val('-');  
                            $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

                            $('#filter_air_drayer').hide();  
                            $('input[name="filter_air_drayer"]').val('-');  
                            $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'

                            $('#filter_transmisi').hide();  
                            $('input[name="filter_transmisi"]').val('-');  
                            $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

                          

                            $('#airdrayer').hide();  
                            $('input[name="airdrayer"]').val('-');  
                            $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

                            $('#pneumatic_system').hide();  
                            $('input[name="pneumatic_system"]').val('-');  
                            $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

                            $('#kompresor').hide();  
                            $('input[name="kompresor"]').val('-');  
                            $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

                            $('#retting_depan').hide();  
                            $('input[name="retting_depan"]').val('-');  
                            $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#retting_belakang').hide();  
                            $('input[name="retting_belakang"]').val('-');  
                            $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#lampu_kompartement').hide();  
                            $('input[name="lampu_kompartement"]').val('-');  
                            $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

                            $('#lampu_body').hide();  
                            $('input[name="lampu_body"]').val('-');  
                            $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

                            $('#ban_tengah_kanan').hide();  
                            $('input[name="ban_tengah_kanan"]').val('-');  
                            $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

                            $('#ban_tengah_kiri').hide();  
                            $('input[name="ban_tengah_kiri"]').val('-');  
                            $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

                            $('#pompa_fire_fighting').hide();  
                            $('input[name="pompa_fire_fighting"]').val('-');  
                            $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

                            $('#primming_pump').hide();  
                            $('input[name="primming_pump"]').val('-');  
                            $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

                            $('#roof_turret').hide();  
                            $('input[name="roof_turret"]').val('-');  
                            $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

                            $('#bumper_turret').hide();  
                            $('input[name="bumper_turret"]').val('-');  
                            $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_depan').hide();  
                            $('input[name="undertrack_spray_depan"]').val('-');  
                            $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_kanan').hide();  
                            $('input[name="undertrack_spray_kanan"]').val('-');  
                            $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_kiri').hide();  
                            $('input[name="undertrack_spray_kiri"]').val('-');  
                            $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

                            $('#foam_proportioner').hide();  
                            $('input[name="foam_proportioner"]').val('-');  
                            $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

                            $('#tangki_air').hide();  
                            $('input[name="tangki_air"]').val('-');  
                            $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

                            $('#tangki_foam').hide();  
                            $('input[name="tangki_foam"]').val('-');  
                            $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

                            $('#pengisian_air_eksternal').hide();  
                            $('input[name="pengisian_air_eksternal"]').val('-');  
                            $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                            $('#charger_baterai_eksternal').hide();  
                            $('input[name="charger_baterai_eksternal"]').val('-');  
                            $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                            $('#top_speeds').hide();  
                            $('input[name="top_speed"]').val('0');  
                            $('#top_speed').removeAttr('required');  // Hilangkan required

                            $('#stop_distances').hide();  
                            $('input[name="stop_distance"]').val('0');
                            $('#stop_distance').removeAttr('required');  // Hilangkan required

                            $('#accelerations').hide();  
                            $('input[name="acceleration"]').val('0'); 
                            $('#acceleration').removeAttr('required');  // Hilangkan required

                            $('#discharge_ranges').hide();  
                            $('input[name="discharge_range"]').val('0');   
                            $('#discharge_range').removeAttr('required');  // Hilangkan required

                            $('#discharge_rates').hide();  
                            $('input[name="discharge_rate"]').val('0'); 
                            $('#discharge_rate').removeAttr('required');  // Hilangkan required

                     // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);

                    // Hide FILTER OLI MESIN BAWAH
                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                    // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);


        } else if(vehicleType === 'Mu Meter'){

                    $('#tanggal_aki').closest('.row').hide(); // Sembunyikan row
                    $('input[name="tanggal_aki"]').val(''); // Set nilai input menjadi kosong
                    $('#tanggal_aki').removeAttr('required');  // Hilangkan required

                    $('#odometers').hide();  
                    $('input[name="odometer"]').val('0');   
                    $('#odometer').removeAttr('required');  // Hilangkan required

                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                    $('#v_belt_ampere').hide();  
                    $('input[name="v_belt_ampere"]').val('-');  
                    $('#v_belt_ampere1').prop('checked', true); 

                    $('#v_belt_power_steering').hide();  
                    $('input[name="v_belt_power_steering"]').val('-');  
                    $('#v_belt_power_steering1').prop('checked', true); 

                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

                        $('#v_belt_kompresor').hide();
                $('input[name="v_belt_kompresor"]').val('-');
                $('#v_belt_kompresor1').prop('checked', true);

                // Hide FUNGSI DRAYER
                $('#fungsi_drayer').hide();
                $('input[name="fungsi_drayer"]').val('-');
                $('#fungsi_drayer1').prop('checked', true);

                // Hide FUNGSI AUTO START
                $('#fungsi_auto_start').hide();
                $('input[name="fungsi_auto_start"]').val('-');
                $('#fungsi_auto_start1').prop('checked', true);

            $('#filter_oli_kompresor').hide();
            $('input[name="filter_oli_kompresor"]').val('-');
            $('#filter_oli_kompresor1').prop('checked', true);
                           
                        // Hide Penggantian Oli Selanjutnya
                            $('#oli_selanjutnya').closest('.row').hide();
                            $('input[name="oli_selanjutnya"]').val(0); // Set nilai input menjadi 0

                            // Hide Oli Telat
                            $('#oli_kurang').closest('.row').hide();
                            $('input[name="oli_kurang"]').val(0); // Set nilai input menjadi 0

                            // Hide KM Oli Masih Tersisa
                            $('#oli_lebih').closest('.row').hide();
                            $('input[name="oli_lebih"]').val(0); // Set nilai input menjadi 0

                                                // Hide Voltase Baterai
                        $('#v_aki').hide();
                        $('input[name="v_aki"]').val(0); // Set nilai input menjadi 0

                                                // Hide OLI KOMPRESOR
                        $('#oli_kompresor').hide();
                        $('input[name="oli_kompresor"]').val('-');
                        $('#oli_kompresor1').prop('checked', true);

                        // Hide BAN KANAN
                        $('#ban_kanan').hide();
                        $('input[name="ban_kanan"]').val('-');
                        $('#ban_kanan1').prop('checked', true);

                        // Hide BAN KIRI
                        $('#ban_kiri').hide();
                        $('input[name="ban_kiri"]').val('-');
                        $('#ban_kiri1').prop('checked', true);

                        // Hide FUNGSI SCREW KOMPRESOR
                        $('#fungsi_screw_kompresor').hide();
                        $('input[name="fungsi_screw_kompresor"]').val('-');
                        $('#fungsi_screw_kompresor1').prop('checked', true);

                        // Hide FUNGSI CUT OFF PRESSURE
                        $('#fungsi_cut_off_pressure').hide();
                        $('input[name="fungsi_cut_off_pressure"]').val('-');
                        $('#fungsi_cut_off_pressure1').prop('checked', true);


                                                    // Hide Fungsi Hidrolik Moower
                            $('#fungsi_hidrolik_moower').hide();
                            $('input[name="fungsi_hidrolik_moower"]').val('-');
                            $('#fungsi_hidrolik_moower1').prop('checked', true);

                            // Hide Fungsi Pisau Moower
                            $('#fungsi_pisau_moower').hide();
                            $('input[name="fungsi_pisau_moower"]').val('-');
                            $('#fungsi_pisau_moower1').prop('checked', true);

                            // Hide Fungsi Pompa Hidrolic
                            $('#fungsi_pompa_hidrolic').hide();
                            $('input[name="fungsi_pompa_hidrolic"]').val('-');
                            $('#fungsi_pompa_hidrolic1').prop('checked', true);

                            // Hide Gearbox
                            $('#gearbox').hide();
                            $('input[name="gearbox"]').val('-');
                            $('#gearbox1').prop('checked', true);


                            // Fungsi Gerakan Shourd
                            $('#fungsi_gerakan_shourd').hide();
                            $('input[name="fungsi_gerakan_shourd"]').val('-');
                            $('#fungsi_gerakan_shourd1').prop('checked', true);

                            // Fungsi Putaran Kumparan
                            $('#fungsi_putaran_kumparan').hide();
                            $('input[name="fungsi_putaran_kumparan"]').val('-');
                            $('#fungsi_putaran_kumparan1').prop('checked', true);

                            // Nozzle
                            $('#nozzle').hide();
                            $('input[name="nozzle"]').val('-');
                            $('#nozzle1').prop('checked', true);

                            // Selang Hidrolis
                            $('#selang_hidrolis').hide();
                            $('input[name="selang_hidrolis"]').val('-');
                            $('#selang_hidrolis1').prop('checked', true);

                            // Seal Brush Button
                            $('#seal_brush_button').hide();
                            $('input[name="seal_brush_button"]').val('-');
                            $('#seal_brush_button1').prop('checked', true);

                            // Seal Swifel Shaft
                            $('#seal_swifel_shaft').hide();
                            $('input[name="seal_swifel_shaft"]').val('-');
                            $('#seal_swifel_shaft1').prop('checked', true);

                            // Seal Gasket
                            $('#seal_gasket').hide();
                            $('input[name="seal_gasket"]').val('-');
                            $('#seal_gasket1').prop('checked', true);

                            // Seal Upper
                            $('#seal_upper').hide();
                            $('input[name="seal_upper"]').val('-');
                            $('#seal_upper1').prop('checked', true);

                            // Drit Shield
                            $('#drit_shield').hide();
                            $('input[name="drit_shield"]').val('-');
                            $('#drit_shield1').prop('checked', true);



                        $('#ban_belakang_kanan').hide();  
                        $('input[name="ban_belakang_kanan"]').val('-');  
                        $('#ban_belakang_kanan1').prop('checked', true);  

                        $('#ban_belakang_kiri').hide();  
                        $('input[name="ban_belakang_kiri"]').val('-');  
                        $('#ban_belakang_kiri1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'

                        $('#ban_depan_kiri').hide();  
                        $('input[name="ban_depan_kiri"]').val('-');  
                        $('#ban_depan_kiri1').prop('checked', true);  

                        $('#ban_cadangan').hide();  
                        $('input[name="ban_cadangan"]').val('-');  
                        $('#ban_cadangan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'


                        $('#ban_depan_kanan').hide();  
                        $('input[name="ban_depan_kanan"]').val('-');  
                        $('#ban_depan_kanan1').prop('checked', true);  // Centang radio 'Baik'

                        $('#tekanan_angin').hide();  
                        $('input[name="tekanan_angin"]').val('-');  
                        $('#tekanan_angin1').prop('checked', true);  // Centang radio 'Baik'
                        
                        $('#fungsi_wipper').hide();  
                        $('input[name="fungsi_wipper"]').val('-');  
                        $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

 			            $('#central_lock').hide();  
                        $('input[name="central_lock"]').val('-');  
                        $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                      
                        $('#microphone').hide();  
                        $('input[name="microphone"]').val('-');  
                        $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#power_window_lock').hide();  
                        $('input[name="power_window_lock"]').val('-');  
                        $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'   '

                        $('#jok_kendaraan').hide();  
                        $('input[name="jok_kendaraan"]').val('-');  
                        $('#jok_kendaraan1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#indikator_dashboard').hide();  
                        $('input[name="indikator_dashboard"]').val('-');  
                        $('#indikator_dashboard1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#klakson').hide();  
                        $('input[name="klakson"]').val('-');  
                        $('#klakson1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#cabin_lamp').hide();  
                        $('input[name="cabin_lamp"]').val('-');  
                        $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#air_coditioning').hide();  
                        $('input[name="air_coditioning"]').val('-');  
                        $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal

                        $('#kondisi_karet_wiper').hide();  
                        $('input[name="kondisi_karet_wiper"]').val('-');  
                        $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#headlamp_jauh').hide();  
                        $('input[name="headlamp_jauh"]').val('-');  
                        $('#headlamp_jauh1').prop('checked', true);  // Centang radio 'Baik'

			            $('#headlamp_dekat').hide();  
                        $('input[name="headlamp_dekat"]').val('-');  
                        $('#headlamp_dekat1').prop('checked', true);  // Centang radio 'Baik'

                        $('#reversing_lamp').hide();  
                        $('input[name="reversing_lamp"]').val('-');  
                        $('#reversing_lamp1').prop('checked', true);  // Centang radio 'Baik'


                        $('#sign_lamp_belakang').hide();  
                        $('input[name="sign_lamp_belakang"]').val('-');  
                        $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                        $('#sign_lamp_depan').hide();  
                        $('input[name="sign_lamp_depan"]').val('-');  
                        $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                        $('#stoplamp').hide();  
                        $('input[name="stoplamp"]').val('-');  
                        $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                        $('#lampu_atret').hide();  
                        $('input[name="lampu_atret"]').val('-');  
                        $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'

                     

                        $('#lampu_sorot').hide();  
                        $('input[name="lampu_sorot"]').val('-');  
                        $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'

                    $('#rem_kaki').hide();  
                    $('input[name="rem_kaki"]').val('-');  
                    $('#rem_kaki1').prop('checked', true); 

                    $('#rem_tangan').hide();  
                    $('input[name="rem_tangan"]').val('-');  
                    $('#rem_tangan1').prop('checked', true); 

                    $('#kopling').hide();  
                    $('input[name="kopling"]').val('-');  
                    $('#kopling1').prop('checked', true); 

                    $('#power_steering').hide();  
                    $('input[name="power_steering"]').val('-');  
                    $('#power_steering1').prop('checked', true); 

                    $('#kaki_kaki').hide();  
                    $('input[name="kaki_kaki"]').val('-');  
                    $('#kaki_kaki1').prop('checked', true); 

                    $('#kondisi_turbo').hide();  
                    $('input[name="kondisi_turbo"]').val('-');  
                    $('#kondisi_turbo1').prop('checked', true); 
                    
                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                    $('#transmisi').hide();  
                    $('input[name="transmisi"]').val('-');  
                    $('#transmisi1').prop('checked', true); 

                    $('#pedal_gas').hide();  
                    $('input[name="pedal_gas"]').val('-');  
                    $('#pedal_gas1').prop('checked', true); 


                    $('#kaca_film').hide();  
                    $('input[name="kaca_film"]').val('-');  
                    $('#kaca_film1').prop('checked', true); 

                    $('#starter_engine').hide();  
                    $('input[name="starter_engine"]').val('-');  
                    $('#starter_engine1').prop('checked', true); 

                    $('#kondisi_engine').hide();  
                    $('input[name="kondisi_engine"]').val('-');  
                    $('#kondisi_engine1').prop('checked', true); 

                    $('#air_radiator_reservoir').hide();  
                    $('input[name="air_radiator_reservoir"]').val('-');  
                    $('#air_radiator_reservoir1').prop('checked', true); 

                    $('#filter_bahan_bakar').hide();  
                    $('input[name="filter_bahan_bakar"]').val('-');  
                    $('#filter_bahan_bakar1').prop('checked', true); 

                    $('#filter_udara').hide();  
                    $('input[name="filter_udara"]').val('-');  
                    $('#filter_udara1').prop('checked', true); 

                    $('#filter_oli').hide();  
                    $('input[name="filter_oli"]').val('-');  
                    $('#filter_oli1').prop('checked', true); 

                    $('#apar').hide();  
                    $('input[name="apar"]').val('-');  
                    $('#apar1').prop('checked', true); 

                    $('#reservoir_wiper').hide();  
                    $('input[name="reservoir_wiper"]').val('-');  
                    $('#wiper1').prop('checked', true); 
                    
                    $('#vbelt_engine').hide();  
                    $('input[name="vbelt_engine"]').val('-');  
                    $('#vbelt_engine1').prop('checked', true); 

                    $('#timing_belt').hide();  
                    $('input[name="timing_belt"]').val('-');  
                    $('#timing1').prop('checked', true); 

                    $('#dongkrak').hide();  
                    $('input[name="dongkrak"]').val('-');  
                    $('#dongkrak_Ada').prop('checked', true); 

                    $('#kunci_roda').hide();  
                    $('input[name="kunci_roda"]').val('-');  
                    $('#kunci_roda_Ada').prop('checked', true); 

                $('#cek_air_accu').hide();  
                $('input[name="cek_air_accu"]').val('-');  
                $('#cek_air_accu1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#oli_mesin').hide();  
                $('input[name="oli_mesin"]').val('-');  
                $('#oli_mesin1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#oli_transmisi').hide();  
                $('input[name="oli_transmisi"]').val('-');  
                $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP
                
                $('#minyak_power_steering').hide();  
                $('input[name="minyak_power_steering"]').val('-');  
                $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#minyak_rem').hide();  
                $('input[name="minyak_rem"]').val('-');  
                $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP


                $('#pompa_uhp').hide();  
                $('input[name="pompa_uhp"]').val('-');  
                $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#pto_kopling_pompa').hide();  
                $('input[name="pto_kopling_pompa"]').val('-');  
                $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                $('#v_belt_pompa_uhp').hide();  
                $('input[name="v_belt_pompa_uhp"]').val('-');  
                $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                $('#kampas_kopling_pompa_uhp').hide();  
                $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                $('#kompresor_pompa_uhp').hide();  
                $('input[name="kompresor_pompa_uhp"]').val('-');  
                $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                $('#vacum_hose_3_inch').hide();  
                $('input[name="vacum_hose_3_inch"]').val('-');  
                $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                $('#vacum_hose_4_inch').hide();  
                $('input[name="vacum_hose_4_inch"]').val('-');  
                $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                $('#vacum_hose_6_inch').hide();  
                $('input[name="vacum_hose_6_inch"]').val('-');  
                $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                $('#hose_40k').hide();  
                $('input[name="hose_40k"]').val('-');  
                $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                $('#filter_cartridge').hide();  
                $('input[name="filter_cartridge"]').val('-');  
                $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                $('#filter_bag_10_micron').hide();  
                $('input[name="filter_bag_10_micron"]').val('-');  
                $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                $('#debris_bag').hide();  
                $('input[name="debris_bag"]').val('-');  
                $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                $('#running_test_40k_engine').hide();  
                $('input[name="running_test_40k_engine"]').val('-');  
                $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


            $('#oli_gardan').hide();  
            $('input[name="oli_gardan"]').val('-');  
            $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#oli_hidrolis').hide();  
            $('input[name="oli_hidrolis"]').val('-');  
            $('#oli_hidrolis1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#filter_air_drayer').hide();  
            $('input[name="filter_air_drayer"]').val('-');  
            $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'

            $('#filter_water_sparator').hide();  
            $('input[name="filter_water_sparator"]').val('-');  
            $('#filter_water_sparator1').prop('checked', true);  // Centang radio 'Baik'

            $('#filter_transmisi').hide();  
            $('input[name="filter_transmisi"]').val('-');  
            $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

            $('#filter_hidrolis').hide();  
            $('input[name="filter_hidrolis"]').val('-');  
            $('#filter_hidrolis1').prop('checked', true);  // Centang radio 'Baik'

            $('#cooling_system').hide();  
            $('input[name="cooling_system"]').val('-');  
            $('#cooling_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#airdrayer').hide();  
            $('input[name="airdrayer"]').val('-');  
            $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

            $('#pneumatic_system').hide();  
            $('input[name="pneumatic_system"]').val('-');  
            $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#hydraulic_system').hide();  
            $('input[name="hydraulic_system"]').val('-');  
            $('#hydraulic_system1').prop('checked', true);  // Centang radio 'Normal'


            $('#kompresor').hide();  
            $('input[name="kompresor"]').val('-');  
            $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

            $('#folklamp').hide();  
            $('input[name="folklamp"]').val('-');  
            $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#retting_depan').hide();  
            $('input[name="retting_depan"]').val('-');  
            $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#retting_belakang').hide();  
            $('input[name="retting_belakang"]').val('-');  
            $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#lampu_kompartement').hide();  
            $('input[name="lampu_kompartement"]').val('-');  
            $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

            $('#lampu_body').hide();  
            $('input[name="lampu_body"]').val('-');  
            $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

            $('#ban_tengah_kanan').hide();  
            $('input[name="ban_tengah_kanan"]').val('-');  
            $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

            $('#ban_tengah_kiri').hide();  
            $('input[name="ban_tengah_kiri"]').val('-');  
            $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

            $('#pompa_fire_fighting').hide();  
            $('input[name="pompa_fire_fighting"]').val('-');  
            $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

            $('#primming_pump').hide();  
            $('input[name="primming_pump"]').val('-');  
            $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

            $('#roof_turret').hide();  
            $('input[name="roof_turret"]').val('-');  
            $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#bumper_turret').hide();  
            $('input[name="bumper_turret"]').val('-');  
            $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_depan').hide();  
            $('input[name="undertrack_spray_depan"]').val('-');  
            $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kanan').hide();  
            $('input[name="undertrack_spray_kanan"]').val('-');  
            $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kiri').hide();  
            $('input[name="undertrack_spray_kiri"]').val('-');  
            $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

            $('#foam_proportioner').hide();  
            $('input[name="foam_proportioner"]').val('-');  
            $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_air').hide();  
            $('input[name="tangki_air"]').val('-');  
            $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_foam').hide();  
            $('input[name="tangki_foam"]').val('-');  
            $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

            $('#pengisian_air_eksternal').hide();  
            $('input[name="pengisian_air_eksternal"]').val('-');  
            $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#charger_baterai_eksternal').hide();  
            $('input[name="charger_baterai_eksternal"]').val('-');  
            $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#top_speeds').hide();  
            $('input[name="top_speed"]').val('0');  
            $('#top_speed').removeAttr('required');  // Hilangkan required

            $('#stop_distances').hide();  
            $('input[name="stop_distance"]').val('0');
            $('#stop_distance').removeAttr('required');  // Hilangkan required

            $('#accelerations').hide();  
            $('input[name="acceleration"]').val('0'); 
            $('#acceleration').removeAttr('required');  // Hilangkan required

            $('#discharge_ranges').hide();  
            $('input[name="discharge_range"]').val('0');   
            $('#discharge_range').removeAttr('required');  // Hilangkan required

            $('#discharge_rates').hide();  
            $('input[name="discharge_rate"]').val('0'); 
            $('#discharge_rate').removeAttr('required');  // Hilangkan required

                    // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);

                    // Hide FILTER OLI MESIN BAWAH
                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                    // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide POMPA HIDROLIS
                    $('#pompa_hidrolis').hide();
                    $('input[name="pompa_hidrolis"]').val('-');
                    $('#pompa_hidrolis1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);

                        $('#ban_tengah_belakang').hide();
                        $('input[name="ban_tengah_belakang"]').val('-');
                        $('#ban_tengah_belakang1').prop('checked', true);





       

        } else if(vehicleType === 'Tractor Mower'){

                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);

                        $('#klakson').hide();  
                        $('input[name="klakson"]').val('-');  
                        $('#klakson1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#stoplamp').hide();  
                        $('input[name="stoplamp"]').val('-');  
                        $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                        $('#lampu_atret').hide();  
                        $('input[name="lampu_atret"]').val('-');  
                        $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'


                    $('#retting_depan').hide();  
                    $('input[name="retting_depan"]').val('-');  
                    $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#retting_belakang').hide();  
                    $('input[name="retting_belakang"]').val('-');  
                    $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                       // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                    $('#filter_hidrolis').hide();  
                    $('input[name="filter_hidrolis"]').val('-');  
                    $('#filter_hidrolis1').prop('checked', true);  // Centang radio 'Baik'


                    $('#filter_water_sparator').hide();  
                    $('input[name="filter_water_sparator"]').val('-');  
                    $('#filter_water_sparator1').prop('checked', true);  // Centang radio 'Baik'


                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);
            
                        $('#v_belt_kompresor').hide();
                $('input[name="v_belt_kompresor"]').val('-');
                $('#v_belt_kompresor1').prop('checked', true);

                // Hide FUNGSI DRAYER
                $('#fungsi_drayer').hide();
                $('input[name="fungsi_drayer"]').val('-');
                $('#fungsi_drayer1').prop('checked', true);

                // Hide FUNGSI AUTO START
                $('#fungsi_auto_start').hide();
                $('input[name="fungsi_auto_start"]').val('-');
                $('#fungsi_auto_start1').prop('checked', true);

            $('#filter_oli_kompresor').hide();
            $('input[name="filter_oli_kompresor"]').val('-');
            $('#filter_oli_kompresor1').prop('checked', true);

                        $('#oli_kompresor').hide();
                        $('input[name="oli_kompresor"]').val('-');
                        $('#oli_kompresor1').prop('checked', true);

                        // Hide BAN KANAN
                        $('#ban_kanan').hide();
                        $('input[name="ban_kanan"]').val('-');
                        $('#ban_kanan1').prop('checked', true);

                        // Hide BAN KIRI
                        $('#ban_kiri').hide();
                        $('input[name="ban_kiri"]').val('-');
                        $('#ban_kiri1').prop('checked', true);

                        // Hide FUNGSI SCREW KOMPRESOR
                        $('#fungsi_screw_kompresor').hide();
                        $('input[name="fungsi_screw_kompresor"]').val('-');
                        $('#fungsi_screw_kompresor1').prop('checked', true);

                        // Hide FUNGSI CUT OFF PRESSURE
                        $('#fungsi_cut_off_pressure').hide();
                        $('input[name="fungsi_cut_off_pressure"]').val('-');
                        $('#fungsi_cut_off_pressure1').prop('checked', true);


                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    $('#electrical_system').hide();  
                    $('input[name="electrical_system"]').val('-');  
                    $('#electrical_system1').prop('checked', true);  // Centang radio 'Normal'

                    $('#lampu_sorot').hide();  
                    $('input[name="lampu_sorot"]').val('-');  
                    $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'

                    
                    $('#ban_tengah_belakang').hide();
                    $('input[name="ban_tengah_belakang"]').val('-');
                    $('#ban_tengah_belakang1').prop('checked', true);

                    // Fungsi Gerakan Shourd
                    $('#fungsi_gerakan_shourd').hide();
                    $('input[name="fungsi_gerakan_shourd"]').val('-');
                    $('#fungsi_gerakan_shourd1').prop('checked', true);

                    // Fungsi Putaran Kumparan
                    $('#fungsi_putaran_kumparan').hide();
                    $('input[name="fungsi_putaran_kumparan"]').val('-');
                    $('#fungsi_putaran_kumparan1').prop('checked', true);

                    // Nozzle
                    $('#nozzle').hide();
                    $('input[name="nozzle"]').val('-');
                    $('#nozzle1').prop('checked', true);

                    // Selang Hidrolis
                    $('#selang_hidrolis').hide();
                    $('input[name="selang_hidrolis"]').val('-');
                    $('#selang_hidrolis1').prop('checked', true);

                    // Seal Brush Button
                    $('#seal_brush_button').hide();
                    $('input[name="seal_brush_button"]').val('-');
                    $('#seal_brush_button1').prop('checked', true);

                    // Seal Swifel Shaft
                    $('#seal_swifel_shaft').hide();
                    $('input[name="seal_swifel_shaft"]').val('-');
                    $('#seal_swifel_shaft1').prop('checked', true);

                    // Seal Gasket
                    $('#seal_gasket').hide();
                    $('input[name="seal_gasket"]').val('-');
                    $('#seal_gasket1').prop('checked', true);

                    // Seal Upper
                    $('#seal_upper').hide();
                    $('input[name="seal_upper"]').val('-');
                    $('#seal_upper1').prop('checked', true);

                    // Drit Shield
                    $('#drit_shield').hide();
                    $('input[name="drit_shield"]').val('-');
                    $('#drit_shield1').prop('checked', true);


                            $('#handrem_tangki_air').hide();  
                            $('input[name="handrem_tangki_air"]').val('-');  
                            $('#handrem_tangki_air1').prop('checked', true); 

                            
                            $('#kaca_film').hide();  
                            $('input[name="kaca_film"]').val('-');  
                            $('#kaca_film1').prop('checked', true); 

                            $('#kopling').hide();  
                            $('input[name="kopling"]').val('-');  
                            $('#kopling1').prop('checked', true); 

                            $('#sign_lamp_depan').hide();  
                            $('input[name="sign_lamp_depan"]').val('-');  
                            $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                            $('#sign_lamp_belakang').hide();  
                            $('input[name="sign_lamp_belakang"]').val('-');  
                            $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                            $('#fungsi_wipper').hide();  
                            $('input[name="fungsi_wipper"]').val('-');  
                            $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

                            $('#pompa_uhp').hide();  
                            $('input[name="pompa_uhp"]').val('-');  
                            $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                            $('#pto_kopling_pompa').hide();  
                            $('input[name="pto_kopling_pompa"]').val('-');  
                            $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                            $('#v_belt_pompa_uhp').hide();  
                            $('input[name="v_belt_pompa_uhp"]').val('-');  
                            $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                            $('#kampas_kopling_pompa_uhp').hide();  
                            $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                            $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                            $('#kompresor_pompa_uhp').hide();  
                            $('input[name="kompresor_pompa_uhp"]').val('-');  
                            $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                            $('#vacum_hose_3_inch').hide();  
                            $('input[name="vacum_hose_3_inch"]').val('-');  
                            $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                            $('#vacum_hose_4_inch').hide();  
                            $('input[name="vacum_hose_4_inch"]').val('-');  
                            $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                            $('#vacum_hose_6_inch').hide();  
                            $('input[name="vacum_hose_6_inch"]').val('-');  
                            $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                            $('#hose_40k').hide();  
                            $('input[name="hose_40k"]').val('-');  
                            $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                            $('#filter_cartridge').hide();  
                            $('input[name="filter_cartridge"]').val('-');  
                            $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                            $('#filter_bag_10_micron').hide();  
                            $('input[name="filter_bag_10_micron"]').val('-');  
                            $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                            $('#debris_bag').hide();  
                            $('input[name="debris_bag"]').val('-');  
                            $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                            $('#running_test_40k_engine').hide();  
                            $('input[name="running_test_40k_engine"]').val('-');  
                            $('#running_test_40k_engine1').prop('checked', true); // Centan

                            // Hide Friction Tyre Kanan
                        $('#friction_tyre_kanan').hide();
                        $('input[name="friction_tyre_kanan"]').val('-');
                        $('#friction_tyre_kanan1').prop('checked', true);

                        // Hide Friction Tyre Kiri
                        $('#friction_tyre_kiri').hide();
                        $('input[name="friction_tyre_kiri"]').val('-');
                        $('#friction_tyre_kiri1').prop('checked', true);

                        // Hide Distance Tyre Tengah
                        $('#distance_tyre_tengah').hide();
                        $('input[name="distance_tyre_tengah"]').val('-');
                        $('#distance_tyre_tengah1').prop('checked', true);

                        // Hide Loadcell
                        $('#loadcell').hide();
                        $('input[name="loadcell"]').val('-');
                        $('#loadcell1').prop('checked', true);

                        // Hide Connector Kabel
                        $('#connector_kabel').hide();
                        $('input[name="connector_kabel"]').val('-');
                        $('#connector_kabel1').prop('checked', true);

                        // Hide Fungsi Pompa Air
                        $('#fungsi_pompa_air').hide();
                        $('input[name="fungsi_pompa_air"]').val('-');
                        $('#fungsi_pompa_air1').prop('checked', true);

                        // Hide Kondisi Tangki Air
                        $('#kondisi_tangki_air').hide();
                        $('input[name="kondisi_tangki_air"]').val('-');
                        $('#kondisi_tangki_air1').prop('checked', true);

                        // Hide Laptop
                        $('#laptop').hide();
                        $('input[name="laptop"]').val('-');
                        $('#laptop1').prop('checked', true);

                        // Hide Kalibrasi Jarak
                        $('#kalibrasi_jarak').hide();
                        $('input[name="kalibrasi_jarak"]').val('-');
                        $('#kalibrasi_jarak1').prop('checked', true);

                            $('#apar').hide();  
                            $('input[name="apar"]').val('-');  
                            $('#apar1').prop('checked', true); 

                            $('#reservoir_wiper').hide();  
                            $('input[name="reservoir_wiper"]').val('-');  
                            $('#wiper1').prop('checked', true); 
                            
                            $('#vbelt_engine').hide();  
                            $('input[name="vbelt_engine"]').val('-');  
                            $('#vbelt_engine1').prop('checked', true); 

                            $('#timing_belt').hide();  
                            $('input[name="timing_belt"]').val('-');  
                            $('#timing1').prop('checked', true); 

                            $('#dongkrak').hide();  
                            $('input[name="dongkrak"]').val('-');  
                            $('#dongkrak_Ada').prop('checked', true); 

                            $('#kunci_roda').hide();  
                            $('input[name="kunci_roda"]').val('-');  
                            $('#kunci_roda_Ada').prop('checked', true); 



                        $('#microphone').hide();  
                        $('input[name="microphone"]').val('-');  
                        $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#power_window_lock').hide();  
                        $('input[name="power_window_lock"]').val('-');  
                        $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#central_lock').hide();  
                        $('input[name="central_lock"]').val('-');  
                        $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#cabin_lamp').hide();  
                        $('input[name="cabin_lamp"]').val('-');  
                        $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#air_coditioning').hide();  
                        $('input[name="air_coditioning"]').val('-');  
                        $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#folklamp').hide();  
                        $('input[name="folklamp"]').val('-');  
                        $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#kondisi_karet_wiper').hide();  
                        $('input[name="kondisi_karet_wiper"]').val('-');  
                        $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik'                 



                            $('#filter_air_drayer').hide();  
                            $('input[name="filter_air_drayer"]').val('-');  
                            $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'


                            $('#airdrayer').hide();  
                            $('input[name="airdrayer"]').val('-');  
                            $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

                            $('#pneumatic_system').hide();  
                            $('input[name="pneumatic_system"]').val('-');  
                            $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

                            $('#kompresor').hide();  
                            $('input[name="kompresor"]').val('-');  
                            $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

                            $('#lampu_kompartement').hide();  
                            $('input[name="lampu_kompartement"]').val('-');  
                            $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

                            $('#lampu_body').hide();  
                            $('input[name="lampu_body"]').val('-');  
                            $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

                            $('#ban_tengah_kanan').hide();  
                            $('input[name="ban_tengah_kanan"]').val('-');  
                            $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

                            $('#ban_tengah_kiri').hide();  
                            $('input[name="ban_tengah_kiri"]').val('-');  
                            $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

                            $('#pompa_fire_fighting').hide();  
                            $('input[name="pompa_fire_fighting"]').val('-');  
                            $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

                            $('#primming_pump').hide();  
                            $('input[name="primming_pump"]').val('-');  
                            $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

                            $('#roof_turret').hide();  
                            $('input[name="roof_turret"]').val('-');  
                            $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

                            $('#bumper_turret').hide();  
                            $('input[name="bumper_turret"]').val('-');  
                            $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_depan').hide();  
                            $('input[name="undertrack_spray_depan"]').val('-');  
                            $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_kanan').hide();  
                            $('input[name="undertrack_spray_kanan"]').val('-');  
                            $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_kiri').hide();  
                            $('input[name="undertrack_spray_kiri"]').val('-');  
                            $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

                            $('#foam_proportioner').hide();  
                            $('input[name="foam_proportioner"]').val('-');  
                            $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

                            $('#tangki_air').hide();  
                            $('input[name="tangki_air"]').val('-');  
                            $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

                            $('#tangki_foam').hide();  
                            $('input[name="tangki_foam"]').val('-');  
                            $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

                            $('#pengisian_air_eksternal').hide();  
                            $('input[name="pengisian_air_eksternal"]').val('-');  
                            $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                            $('#charger_baterai_eksternal').hide();  
                            $('input[name="charger_baterai_eksternal"]').val('-');  
                            $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                            $('#top_speeds').hide();  
                            $('input[name="top_speed"]').val('0');  
                            $('#top_speed').removeAttr('required');  // Hilangkan required

                            $('#stop_distances').hide();  
                            $('input[name="stop_distance"]').val('0');
                            $('#stop_distance').removeAttr('required');  // Hilangkan required

                            $('#accelerations').hide();  
                            $('input[name="acceleration"]').val('0'); 
                            $('#acceleration').removeAttr('required');  // Hilangkan required

                            $('#discharge_ranges').hide();  
                            $('input[name="discharge_range"]').val('0');   
                            $('#discharge_range').removeAttr('required');  // Hilangkan required

                            $('#discharge_rates').hide();  
                            $('input[name="discharge_rate"]').val('0'); 
                            $('#discharge_rate').removeAttr('required');  // Hilangkan required

                     // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);


                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);


                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);


        } else if(vehicleType === 'Kompresor Dinamis'){

                    $('#electrical_system').hide();  
                    $('input[name="electrical_system"]').val('-');  
                    $('#electrical_system1').prop('checked', true);  // Centang radio 'Normal'

                    $('#rem_kaki').hide();  
                    $('input[name="rem_kaki"]').val('-');  
                    $('#rem_kaki1').prop('checked', true); 


                    $('#v_belt_power_steering').hide();  
                    $('input[name="v_belt_power_steering"]').val('-');  
                    $('#v_belt_power_steering1').prop('checked', true); 

                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                    $('#filter_oli_kompresor').hide();
                    $('input[name="filter_oli_kompresor"]').val('-');
                    $('#filter_oli_kompresor1').prop('checked', true);

                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

                    $('#v_belt_kompresor').hide();
                    $('input[name="v_belt_kompresor"]').val('-');
                    $('#v_belt_kompresor1').prop('checked', true);

                    // Hide FUNGSI DRAYER
                    $('#fungsi_drayer').hide();
                    $('input[name="fungsi_drayer"]').val('-');
                    $('#fungsi_drayer1').prop('checked', true);

                    // Hide FUNGSI AUTO START
                    $('#fungsi_auto_start').hide();
                    $('input[name="fungsi_auto_start"]').val('-');
                    $('#fungsi_auto_start1').prop('checked', true);
                           
                                $('#handrem_tangki_air').hide();  
                                $('input[name="handrem_tangki_air"]').val('-');  
                                $('#handrem_tangki_air1').prop('checked', true); 

                                $('#rotary_lamp').hide();  
                                $('input[name="rotary_lamp"]').val('-');  
                                $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                                // Hide Friction Tyre Kanan
                                $('#friction_tyre_kanan').hide();
                                $('input[name="friction_tyre_kanan"]').val('-');
                                $('#friction_tyre_kanan1').prop('checked', true);

                                // Hide Friction Tyre Kiri
                                $('#friction_tyre_kiri').hide();
                                $('input[name="friction_tyre_kiri"]').val('-');
                                $('#friction_tyre_kiri1').prop('checked', true);

                                // Hide Distance Tyre Tengah
                                $('#distance_tyre_tengah').hide();
                                $('input[name="distance_tyre_tengah"]').val('-');
                                $('#distance_tyre_tengah1').prop('checked', true);

                                // Hide Loadcell
                                $('#loadcell').hide();
                                $('input[name="loadcell"]').val('-');
                                $('#loadcell1').prop('checked', true);

                                // Hide Connector Kabel
                                $('#connector_kabel').hide();
                                $('input[name="connector_kabel"]').val('-');
                                $('#connector_kabel1').prop('checked', true);

                                // Hide Fungsi Pompa Air
                                $('#fungsi_pompa_air').hide();
                                $('input[name="fungsi_pompa_air"]').val('-');
                                $('#fungsi_pompa_air1').prop('checked', true);

                                // Hide Kondisi Tangki Air
                                $('#kondisi_tangki_air').hide();
                                $('input[name="kondisi_tangki_air"]').val('-');
                                $('#kondisi_tangki_air1').prop('checked', true);

                                // Hide Laptop
                                $('#laptop').hide();
                                $('input[name="laptop"]').val('-');
                                $('#laptop1').prop('checked', true);

                                // Hide Kalibrasi Jarak
                                $('#kalibrasi_jarak').hide();
                                $('input[name="kalibrasi_jarak"]').val('-');
                                $('#kalibrasi_jarak1').prop('checked', true);

                           // Hide Penggantian Oli Selanjutnya
                            $('#oli_selanjutnya').closest('.row').hide();
                            $('input[name="oli_selanjutnya"]').val(0); // Set nilai input menjadi 0

                            // Hide Oli Telat
                            $('#oli_kurang').closest('.row').hide();
                            $('input[name="oli_kurang"]').val(0); // Set nilai input menjadi 0

                            // Hide KM Oli Masih Tersisa
                            $('#oli_lebih').closest('.row').hide();
                            $('input[name="oli_lebih"]').val(0); // Set nilai input menjadi 0


                                                    // Hide Fungsi Hidrolik Moower
                            $('#fungsi_hidrolik_moower').hide();
                            $('input[name="fungsi_hidrolik_moower"]').val('-');
                            $('#fungsi_hidrolik_moower1').prop('checked', true);

                            // Hide Fungsi Pisau Moower
                            $('#fungsi_pisau_moower').hide();
                            $('input[name="fungsi_pisau_moower"]').val('-');
                            $('#fungsi_pisau_moower1').prop('checked', true);

                            // Hide Fungsi Pompa Hidrolic
                            $('#fungsi_pompa_hidrolic').hide();
                            $('input[name="fungsi_pompa_hidrolic"]').val('-');
                            $('#fungsi_pompa_hidrolic1').prop('checked', true);

                            // Hide Gearbox
                            $('#gearbox').hide();
                            $('input[name="gearbox"]').val('-');
                            $('#gearbox1').prop('checked', true);


                            // Fungsi Gerakan Shourd
                            $('#fungsi_gerakan_shourd').hide();
                            $('input[name="fungsi_gerakan_shourd"]').val('-');
                            $('#fungsi_gerakan_shourd1').prop('checked', true);

                            // Fungsi Putaran Kumparan
                            $('#fungsi_putaran_kumparan').hide();
                            $('input[name="fungsi_putaran_kumparan"]').val('-');
                            $('#fungsi_putaran_kumparan1').prop('checked', true);

                            // Nozzle
                            $('#nozzle').hide();
                            $('input[name="nozzle"]').val('-');
                            $('#nozzle1').prop('checked', true);

                            // Selang Hidrolis
                            $('#selang_hidrolis').hide();
                            $('input[name="selang_hidrolis"]').val('-');
                            $('#selang_hidrolis1').prop('checked', true);

                            // Seal Brush Button
                            $('#seal_brush_button').hide();
                            $('input[name="seal_brush_button"]').val('-');
                            $('#seal_brush_button1').prop('checked', true);

                            // Seal Swifel Shaft
                            $('#seal_swifel_shaft').hide();
                            $('input[name="seal_swifel_shaft"]').val('-');
                            $('#seal_swifel_shaft1').prop('checked', true);

                            // Seal Gasket
                            $('#seal_gasket').hide();
                            $('input[name="seal_gasket"]').val('-');
                            $('#seal_gasket1').prop('checked', true);

                            // Seal Upper
                            $('#seal_upper').hide();
                            $('input[name="seal_upper"]').val('-');
                            $('#seal_upper1').prop('checked', true);

                            // Drit Shield
                            $('#drit_shield').hide();
                            $('input[name="drit_shield"]').val('-');
                            $('#drit_shield1').prop('checked', true);



                        $('#ban_belakang_kanan').hide();  
                        $('input[name="ban_belakang_kanan"]').val('-');  
                        $('#ban_belakang_kanan1').prop('checked', true);  

                        $('#ban_belakang_kiri').hide();  
                        $('input[name="ban_belakang_kiri"]').val('-');  
                        $('#ban_belakang_kiri1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'

                        $('#ban_depan_kiri').hide();  
                        $('input[name="ban_depan_kiri"]').val('-');  
                        $('#ban_depan_kiri1').prop('checked', true);  

                        $('#ban_cadangan').hide();  
                        $('input[name="ban_cadangan"]').val('-');  
                        $('#ban_cadangan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'


                        $('#ban_depan_kanan').hide();  
                        $('input[name="ban_depan_kanan"]').val('-');  
                        $('#ban_depan_kanan1').prop('checked', true);  // Centang radio 'Baik'

                        
                        $('#fungsi_wipper').hide();  
                        $('input[name="fungsi_wipper"]').val('-');  
                        $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

 			            $('#central_lock').hide();  
                        $('input[name="central_lock"]').val('-');  
                        $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                      
                        $('#microphone').hide();  
                        $('input[name="microphone"]').val('-');  
                        $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#power_window_lock').hide();  
                        $('input[name="power_window_lock"]').val('-');  
                        $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'   '

                        $('#jok_kendaraan').hide();  
                        $('input[name="jok_kendaraan"]').val('-');  
                        $('#jok_kendaraan1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#klakson').hide();  
                        $('input[name="klakson"]').val('-');  
                        $('#klakson1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#cabin_lamp').hide();  
                        $('input[name="cabin_lamp"]').val('-');  
                        $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#air_coditioning').hide();  
                        $('input[name="air_coditioning"]').val('-');  
                        $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal

                        $('#kondisi_karet_wiper').hide();  
                        $('input[name="kondisi_karet_wiper"]').val('-');  
                        $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik' 

                        $('#headlamp_jauh').hide();  
                        $('input[name="headlamp_jauh"]').val('-');  
                        $('#headlamp_jauh1').prop('checked', true);  // Centang radio 'Baik'

			            $('#headlamp_dekat').hide();  
                        $('input[name="headlamp_dekat"]').val('-');  
                        $('#headlamp_dekat1').prop('checked', true);  // Centang radio 'Baik'

                        $('#reversing_lamp').hide();  
                        $('input[name="reversing_lamp"]').val('-');  
                        $('#reversing_lamp1').prop('checked', true);  // Centang radio 'Baik'


                        $('#sign_lamp_belakang').hide();  
                        $('input[name="sign_lamp_belakang"]').val('-');  
                        $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                        $('#sign_lamp_depan').hide();  
                        $('input[name="sign_lamp_depan"]').val('-');  
                        $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                        $('#stoplamp').hide();  
                        $('input[name="stoplamp"]').val('-');  
                        $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                        $('#lampu_atret').hide();  
                        $('input[name="lampu_atret"]').val('-');  
                        $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'

                        $('#rotary_lamp').hide();  
                        $('input[name="rotary_lamp"]').val('-');  
                        $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                        $('#lampu_sorot').hide();  
                        $('input[name="lampu_sorot"]').val('-');  
                        $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'

                    $('#kopling').hide();  
                    $('input[name="kopling"]').val('-');  
                    $('#kopling1').prop('checked', true); 

                    $('#power_steering').hide();  
                    $('input[name="power_steering"]').val('-');  
                    $('#power_steering1').prop('checked', true); 

                    $('#kaki_kaki').hide();  
                    $('input[name="kaki_kaki"]').val('-');  
                    $('#kaki_kaki1').prop('checked', true); 

                    
                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                    $('#transmisi').hide();  
                    $('input[name="transmisi"]').val('-');  
                    $('#transmisi1').prop('checked', true); 


                    $('#kaca_film').hide();  
                    $('input[name="kaca_film"]').val('-');  
                    $('#kaca_film1').prop('checked', true); 


                    $('#air_radiator_reservoir').hide();  
                    $('input[name="air_radiator_reservoir"]').val('-');  
                    $('#air_radiator_reservoir1').prop('checked', true); 


                    $('#apar').hide();  
                    $('input[name="apar"]').val('-');  
                    $('#apar1').prop('checked', true); 

                    $('#reservoir_wiper').hide();  
                    $('input[name="reservoir_wiper"]').val('-');  
                    $('#wiper1').prop('checked', true); 
                    
                    $('#vbelt_engine').hide();  
                    $('input[name="vbelt_engine"]').val('-');  
                    $('#vbelt_engine1').prop('checked', true); 

                    $('#timing_belt').hide();  
                    $('input[name="timing_belt"]').val('-');  
                    $('#timing1').prop('checked', true); 

                    $('#dongkrak').hide();  
                    $('input[name="dongkrak"]').val('-');  
                    $('#dongkrak_Ada').prop('checked', true); 

                    $('#kunci_roda').hide();  
                    $('input[name="kunci_roda"]').val('-');  
                    $('#kunci_roda_Ada').prop('checked', true); 



                $('#oli_transmisi').hide();  
                $('input[name="oli_transmisi"]').val('-');  
                $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP
                
                $('#minyak_power_steering').hide();  
                $('input[name="minyak_power_steering"]').val('-');  
                $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#minyak_rem').hide();  
                $('input[name="minyak_rem"]').val('-');  
                $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP


                $('#pompa_uhp').hide();  
                $('input[name="pompa_uhp"]').val('-');  
                $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#pto_kopling_pompa').hide();  
                $('input[name="pto_kopling_pompa"]').val('-');  
                $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                $('#v_belt_pompa_uhp').hide();  
                $('input[name="v_belt_pompa_uhp"]').val('-');  
                $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                $('#kampas_kopling_pompa_uhp').hide();  
                $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                $('#kompresor_pompa_uhp').hide();  
                $('input[name="kompresor_pompa_uhp"]').val('-');  
                $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                $('#vacum_hose_3_inch').hide();  
                $('input[name="vacum_hose_3_inch"]').val('-');  
                $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                $('#vacum_hose_4_inch').hide();  
                $('input[name="vacum_hose_4_inch"]').val('-');  
                $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                $('#vacum_hose_6_inch').hide();  
                $('input[name="vacum_hose_6_inch"]').val('-');  
                $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                $('#hose_40k').hide();  
                $('input[name="hose_40k"]').val('-');  
                $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                $('#filter_cartridge').hide();  
                $('input[name="filter_cartridge"]').val('-');  
                $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                $('#filter_bag_10_micron').hide();  
                $('input[name="filter_bag_10_micron"]').val('-');  
                $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                $('#debris_bag').hide();  
                $('input[name="debris_bag"]').val('-');  
                $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                $('#running_test_40k_engine').hide();  
                $('input[name="running_test_40k_engine"]').val('-');  
                $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


            $('#oli_gardan').hide();  
            $('input[name="oli_gardan"]').val('-');  
            $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#oli_hidrolis').hide();  
            $('input[name="oli_hidrolis"]').val('-');  
            $('#oli_hidrolis1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#filter_air_drayer').hide();  
            $('input[name="filter_air_drayer"]').val('-');  
            $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'

            $('#filter_transmisi').hide();  
            $('input[name="filter_transmisi"]').val('-');  
            $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

            $('#airdrayer').hide();  
            $('input[name="airdrayer"]').val('-');  
            $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

            $('#pneumatic_system').hide();  
            $('input[name="pneumatic_system"]').val('-');  
            $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#hydraulic_system').hide();  
            $('input[name="hydraulic_system"]').val('-');  
            $('#hydraulic_system1').prop('checked', true);  // Centang radio 'Normal'


            $('#kompresor').hide();  
            $('input[name="kompresor"]').val('-');  
            $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

            $('#folklamp').hide();  
            $('input[name="folklamp"]').val('-');  
            $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#retting_depan').hide();  
            $('input[name="retting_depan"]').val('-');  
            $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#retting_belakang').hide();  
            $('input[name="retting_belakang"]').val('-');  
            $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#lampu_kompartement').hide();  
            $('input[name="lampu_kompartement"]').val('-');  
            $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

            $('#lampu_body').hide();  
            $('input[name="lampu_body"]').val('-');  
            $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

            $('#ban_tengah_kanan').hide();  
            $('input[name="ban_tengah_kanan"]').val('-');  
            $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

            $('#ban_tengah_kiri').hide();  
            $('input[name="ban_tengah_kiri"]').val('-');  
            $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

            $('#pompa_fire_fighting').hide();  
            $('input[name="pompa_fire_fighting"]').val('-');  
            $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

            $('#primming_pump').hide();  
            $('input[name="primming_pump"]').val('-');  
            $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

            $('#roof_turret').hide();  
            $('input[name="roof_turret"]').val('-');  
            $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#bumper_turret').hide();  
            $('input[name="bumper_turret"]').val('-');  
            $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_depan').hide();  
            $('input[name="undertrack_spray_depan"]').val('-');  
            $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kanan').hide();  
            $('input[name="undertrack_spray_kanan"]').val('-');  
            $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kiri').hide();  
            $('input[name="undertrack_spray_kiri"]').val('-');  
            $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

            $('#foam_proportioner').hide();  
            $('input[name="foam_proportioner"]').val('-');  
            $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_air').hide();  
            $('input[name="tangki_air"]').val('-');  
            $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_foam').hide();  
            $('input[name="tangki_foam"]').val('-');  
            $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

            $('#pengisian_air_eksternal').hide();  
            $('input[name="pengisian_air_eksternal"]').val('-');  
            $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#charger_baterai_eksternal').hide();  
            $('input[name="charger_baterai_eksternal"]').val('-');  
            $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#top_speeds').hide();  
            $('input[name="top_speed"]').val('0');  
            $('#top_speed').removeAttr('required');  // Hilangkan required

            $('#stop_distances').hide();  
            $('input[name="stop_distance"]').val('0');
            $('#stop_distance').removeAttr('required');  // Hilangkan required

            $('#accelerations').hide();  
            $('input[name="acceleration"]').val('0'); 
            $('#acceleration').removeAttr('required');  // Hilangkan required

            $('#discharge_ranges').hide();  
            $('input[name="discharge_range"]').val('0');   
            $('#discharge_range').removeAttr('required');  // Hilangkan required

            $('#discharge_rates').hide();  
            $('input[name="discharge_rate"]').val('0'); 
            $('#discharge_rate').removeAttr('required');  // Hilangkan required

                    // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);

                    // Hide FILTER OLI MESIN BAWAH
                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                    // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide POMPA HIDROLIS
                    $('#pompa_hidrolis').hide();
                    $('input[name="pompa_hidrolis"]').val('-');
                    $('#pompa_hidrolis1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);


                        $('#ban_tengah_belakang').hide();
                        $('input[name="ban_tengah_belakang"]').val('-');
                        $('#ban_tengah_belakang1').prop('checked', true);





       

        } else if (vehicleType === 'Kompresor Statis'){

                    $('#tanggal_aki').closest('.row').hide(); // Sembunyikan row
                    $('input[name="tanggal_aki"]').val(''); // Set nilai input menjadi kosong
                    $('#tanggal_aki').removeAttr('required');  // Hilangkan required

                    $('#odometers').hide();  
                    $('input[name="odometer"]').val('0');   
                    $('#odometer').removeAttr('required');  // Hilangkan required

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);


                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                    $('#v_belt_ampere').hide();  
                    $('input[name="v_belt_ampere"]').val('-');  
                    $('#v_belt_ampere1').prop('checked', true); 

                    $('#v_belt_power_steering').hide();  
                    $('input[name="v_belt_power_steering"]').val('-');  
                    $('#v_belt_power_steering1').prop('checked', true); 


                        $('#filter_oli_kompresor').hide();
                        $('input[name="filter_oli_kompresor"]').val('-');
                        $('#filter_oli_kompresor1').prop('checked', true);

                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

                        $('#v_aki').hide();
                        $('input[name="v_aki"]').val(0); // Set nilai input menjadi 0

                        $('#cek_air_accu').hide();  
                        $('input[name="cek_air_accu"]').val('-');  
                        $('#cek_air_accu1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                        $('#oli_mesin').hide();  
                        $('input[name="oli_mesin"]').val('-');  
                        $('#oli_mesin1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                        $('#filter_bahan_bakar').hide();  
                        $('input[name="filter_bahan_bakar"]').val('-');  
                        $('#filter_bahan_bakar1').prop('checked', true); 

                        $('#kondisi_turbo').hide();  
                        $('input[name="kondisi_turbo"]').val('-');  
                        $('#kondisi_turbo1').prop('checked', true); 

                        $('#cooling_system').hide();  
                        $('input[name="cooling_system"]').val('-');  
                        $('#cooling_system1').prop('checked', true);  // Centang radio 'Normal'

                        $('#rem_kaki').hide();  
                        $('input[name="rem_kaki"]').val('-');  
                        $('#rem_kaki1').prop('checked', true); 

                        $('#rem_tangan').hide();  
                        $('input[name="rem_tangan"]').val('-');  
                        $('#rem_tangan1').prop('checked', true); 

                        
                        $('#pedal_gas').hide();  
                        $('input[name="pedal_gas"]').val('-');  
                        $('#pedal_gas1').prop('checked', true); 

                        $('#ban_kanan').hide();
                        $('input[name="ban_kanan"]').val('-');
                        $('#ban_kanan1').prop('checked', true);

                        // Hide BAN KIRI
                        $('#ban_kiri').hide();
                        $('input[name="ban_kiri"]').val('-');
                        $('#ban_kiri1').prop('checked', true);

                        $('#tekanan_angin').hide();  
                        $('input[name="tekanan_angin"]').val('-');  
                        $('#tekanan_angin1').prop('checked', true);  // Centang radio 'Baik'
                           
                           $('#handrem_tangki_air').hide();  
                           $('input[name="handrem_tangki_air"]').val('-');  
                           $('#handrem_tangki_air1').prop('checked', true); 

                           $('#rotary_lamp').hide();  
                           $('input[name="rotary_lamp"]').val('-');  
                           $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                           // Hide Friction Tyre Kanan
                           $('#friction_tyre_kanan').hide();
                           $('input[name="friction_tyre_kanan"]').val('-');
                           $('#friction_tyre_kanan1').prop('checked', true);

                           // Hide Friction Tyre Kiri
                           $('#friction_tyre_kiri').hide();
                           $('input[name="friction_tyre_kiri"]').val('-');
                           $('#friction_tyre_kiri1').prop('checked', true);

                           // Hide Distance Tyre Tengah
                           $('#distance_tyre_tengah').hide();
                           $('input[name="distance_tyre_tengah"]').val('-');
                           $('#distance_tyre_tengah1').prop('checked', true);

                           // Hide Loadcell
                           $('#loadcell').hide();
                           $('input[name="loadcell"]').val('-');
                           $('#loadcell1').prop('checked', true);

                           // Hide Connector Kabel
                           $('#connector_kabel').hide();
                           $('input[name="connector_kabel"]').val('-');
                           $('#connector_kabel1').prop('checked', true);

                           // Hide Fungsi Pompa Air
                           $('#fungsi_pompa_air').hide();
                           $('input[name="fungsi_pompa_air"]').val('-');
                           $('#fungsi_pompa_air1').prop('checked', true);

                           // Hide Kondisi Tangki Air
                           $('#kondisi_tangki_air').hide();
                           $('input[name="kondisi_tangki_air"]').val('-');
                           $('#kondisi_tangki_air1').prop('checked', true);

                           // Hide Laptop
                           $('#laptop').hide();
                           $('input[name="laptop"]').val('-');
                           $('#laptop1').prop('checked', true);

                           // Hide Kalibrasi Jarak
                           $('#kalibrasi_jarak').hide();
                           $('input[name="kalibrasi_jarak"]').val('-');
                           $('#kalibrasi_jarak1').prop('checked', true);

                      // Hide Penggantian Oli Selanjutnya
                       $('#oli_selanjutnya').closest('.row').hide();
                       $('input[name="oli_selanjutnya"]').val(0); // Set nilai input menjadi 0

                       // Hide Oli Telat
                       $('#oli_kurang').closest('.row').hide();
                       $('input[name="oli_kurang"]').val(0); // Set nilai input menjadi 0

                       // Hide KM Oli Masih Tersisa
                       $('#oli_lebih').closest('.row').hide();
                       $('input[name="oli_lebih"]').val(0); // Set nilai input menjadi 0


                                               // Hide Fungsi Hidrolik Moower
                       $('#fungsi_hidrolik_moower').hide();
                       $('input[name="fungsi_hidrolik_moower"]').val('-');
                       $('#fungsi_hidrolik_moower1').prop('checked', true);

                       // Hide Fungsi Pisau Moower
                       $('#fungsi_pisau_moower').hide();
                       $('input[name="fungsi_pisau_moower"]').val('-');
                       $('#fungsi_pisau_moower1').prop('checked', true);

                       // Hide Fungsi Pompa Hidrolic
                       $('#fungsi_pompa_hidrolic').hide();
                       $('input[name="fungsi_pompa_hidrolic"]').val('-');
                       $('#fungsi_pompa_hidrolic1').prop('checked', true);

                       // Hide Gearbox
                       $('#gearbox').hide();
                       $('input[name="gearbox"]').val('-');
                       $('#gearbox1').prop('checked', true);


                       // Fungsi Gerakan Shourd
                       $('#fungsi_gerakan_shourd').hide();
                       $('input[name="fungsi_gerakan_shourd"]').val('-');
                       $('#fungsi_gerakan_shourd1').prop('checked', true);

                       // Fungsi Putaran Kumparan
                       $('#fungsi_putaran_kumparan').hide();
                       $('input[name="fungsi_putaran_kumparan"]').val('-');
                       $('#fungsi_putaran_kumparan1').prop('checked', true);

                       // Nozzle
                       $('#nozzle').hide();
                       $('input[name="nozzle"]').val('-');
                       $('#nozzle1').prop('checked', true);

                       // Selang Hidrolis
                       $('#selang_hidrolis').hide();
                       $('input[name="selang_hidrolis"]').val('-');
                       $('#selang_hidrolis1').prop('checked', true);

                       // Seal Brush Button
                       $('#seal_brush_button').hide();
                       $('input[name="seal_brush_button"]').val('-');
                       $('#seal_brush_button1').prop('checked', true);

                       // Seal Swifel Shaft
                       $('#seal_swifel_shaft').hide();
                       $('input[name="seal_swifel_shaft"]').val('-');
                       $('#seal_swifel_shaft1').prop('checked', true);

                       // Seal Gasket
                       $('#seal_gasket').hide();
                       $('input[name="seal_gasket"]').val('-');
                       $('#seal_gasket1').prop('checked', true);

                       // Seal Upper
                       $('#seal_upper').hide();
                       $('input[name="seal_upper"]').val('-');
                       $('#seal_upper1').prop('checked', true);

                       // Drit Shield
                       $('#drit_shield').hide();
                       $('input[name="drit_shield"]').val('-');
                       $('#drit_shield1').prop('checked', true);



                   $('#ban_belakang_kanan').hide();  
                   $('input[name="ban_belakang_kanan"]').val('-');  
                   $('#ban_belakang_kanan1').prop('checked', true);  

                   $('#ban_belakang_kiri').hide();  
                   $('input[name="ban_belakang_kiri"]').val('-');  
                   $('#ban_belakang_kiri1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'

                   $('#ban_depan_kiri').hide();  
                   $('input[name="ban_depan_kiri"]').val('-');  
                   $('#ban_depan_kiri1').prop('checked', true);  

                   $('#ban_cadangan').hide();  
                   $('input[name="ban_cadangan"]').val('-');  
                   $('#ban_cadangan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'


                   $('#ban_depan_kanan').hide();  
                   $('input[name="ban_depan_kanan"]').val('-');  
                   $('#ban_depan_kanan1').prop('checked', true);  // Centang radio 'Baik'

                   
                   $('#fungsi_wipper').hide();  
                   $('input[name="fungsi_wipper"]').val('-');  
                   $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

                    $('#central_lock').hide();  
                   $('input[name="central_lock"]').val('-');  
                   $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                 
                   $('#microphone').hide();  
                   $('input[name="microphone"]').val('-');  
                   $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                   $('#power_window_lock').hide();  
                   $('input[name="power_window_lock"]').val('-');  
                   $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'   '

                   $('#jok_kendaraan').hide();  
                   $('input[name="jok_kendaraan"]').val('-');  
                   $('#jok_kendaraan1').prop('checked', true);  // Centang radio 'Baik' 

                   $('#klakson').hide();  
                   $('input[name="klakson"]').val('-');  
                   $('#klakson1').prop('checked', true);  // Centang radio 'Baik' 

                   $('#cabin_lamp').hide();  
                   $('input[name="cabin_lamp"]').val('-');  
                   $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                   $('#air_coditioning').hide();  
                   $('input[name="air_coditioning"]').val('-');  
                   $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal

                   $('#kondisi_karet_wiper').hide();  
                   $('input[name="kondisi_karet_wiper"]').val('-');  
                   $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik' 

                   $('#headlamp_jauh').hide();  
                   $('input[name="headlamp_jauh"]').val('-');  
                   $('#headlamp_jauh1').prop('checked', true);  // Centang radio 'Baik'

                   $('#headlamp_dekat').hide();  
                   $('input[name="headlamp_dekat"]').val('-');  
                   $('#headlamp_dekat1').prop('checked', true);  // Centang radio 'Baik'

                   $('#reversing_lamp').hide();  
                   $('input[name="reversing_lamp"]').val('-');  
                   $('#reversing_lamp1').prop('checked', true);  // Centang radio 'Baik'


                   $('#sign_lamp_belakang').hide();  
                   $('input[name="sign_lamp_belakang"]').val('-');  
                   $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                   $('#sign_lamp_depan').hide();  
                   $('input[name="sign_lamp_depan"]').val('-');  
                   $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                   $('#stoplamp').hide();  
                   $('input[name="stoplamp"]').val('-');  
                   $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                   $('#lampu_atret').hide();  
                   $('input[name="lampu_atret"]').val('-');  
                   $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'

                   $('#rotary_lamp').hide();  
                   $('input[name="rotary_lamp"]').val('-');  
                   $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                   $('#lampu_sorot').hide();  
                   $('input[name="lampu_sorot"]').val('-');  
                   $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'

               $('#kopling').hide();  
               $('input[name="kopling"]').val('-');  
               $('#kopling1').prop('checked', true); 

               $('#power_steering').hide();  
               $('input[name="power_steering"]').val('-');  
               $('#power_steering1').prop('checked', true); 

               $('#kaki_kaki').hide();  
               $('input[name="kaki_kaki"]').val('-');  
               $('#kaki_kaki1').prop('checked', true); 

               
               $('#sistem_pendingin').hide();  
               $('input[name="sistem_pendingin"]').val('-');  
               $('#sistem_pendingin1').prop('checked', true); 

               $('#transmisi').hide();  
               $('input[name="transmisi"]').val('-');  
               $('#transmisi1').prop('checked', true); 


               $('#kaca_film').hide();  
               $('input[name="kaca_film"]').val('-');  
               $('#kaca_film1').prop('checked', true); 


               $('#air_radiator_reservoir').hide();  
               $('input[name="air_radiator_reservoir"]').val('-');  
               $('#air_radiator_reservoir1').prop('checked', true); 


               $('#apar').hide();  
               $('input[name="apar"]').val('-');  
               $('#apar1').prop('checked', true); 

               $('#reservoir_wiper').hide();  
               $('input[name="reservoir_wiper"]').val('-');  
               $('#wiper1').prop('checked', true); 
               
               $('#vbelt_engine').hide();  
               $('input[name="vbelt_engine"]').val('-');  
               $('#vbelt_engine1').prop('checked', true); 

               $('#timing_belt').hide();  
               $('input[name="timing_belt"]').val('-');  
               $('#timing1').prop('checked', true); 

               $('#dongkrak').hide();  
               $('input[name="dongkrak"]').val('-');  
               $('#dongkrak_Ada').prop('checked', true); 

               $('#kunci_roda').hide();  
               $('input[name="kunci_roda"]').val('-');  
               $('#kunci_roda_Ada').prop('checked', true); 



           $('#oli_transmisi').hide();  
           $('input[name="oli_transmisi"]').val('-');  
           $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP
           
           $('#minyak_power_steering').hide();  
           $('input[name="minyak_power_steering"]').val('-');  
           $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

           $('#minyak_rem').hide();  
           $('input[name="minyak_rem"]').val('-');  
           $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP


           $('#pompa_uhp').hide();  
           $('input[name="pompa_uhp"]').val('-');  
           $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

           $('#pto_kopling_pompa').hide();  
           $('input[name="pto_kopling_pompa"]').val('-');  
           $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

           $('#v_belt_pompa_uhp').hide();  
           $('input[name="v_belt_pompa_uhp"]').val('-');  
           $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

           $('#kampas_kopling_pompa_uhp').hide();  
           $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
           $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

           $('#kompresor_pompa_uhp').hide();  
           $('input[name="kompresor_pompa_uhp"]').val('-');  
           $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

           $('#vacum_hose_3_inch').hide();  
           $('input[name="vacum_hose_3_inch"]').val('-');  
           $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

           $('#vacum_hose_4_inch').hide();  
           $('input[name="vacum_hose_4_inch"]').val('-');  
           $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

           $('#vacum_hose_6_inch').hide();  
           $('input[name="vacum_hose_6_inch"]').val('-');  
           $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

           $('#hose_40k').hide();  
           $('input[name="hose_40k"]').val('-');  
           $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

           $('#filter_cartridge').hide();  
           $('input[name="filter_cartridge"]').val('-');  
           $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

           $('#filter_bag_10_micron').hide();  
           $('input[name="filter_bag_10_micron"]').val('-');  
           $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

           $('#debris_bag').hide();  
           $('input[name="debris_bag"]').val('-');  
           $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

           $('#running_test_40k_engine').hide();  
           $('input[name="running_test_40k_engine"]').val('-');  
           $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


            $('#oli_gardan').hide();  
            $('input[name="oli_gardan"]').val('-');  
            $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#oli_hidrolis').hide();  
            $('input[name="oli_hidrolis"]').val('-');  
            $('#oli_hidrolis1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#filter_transmisi').hide();  
            $('input[name="filter_transmisi"]').val('-');  
            $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

            $('#pneumatic_system').hide();  
            $('input[name="pneumatic_system"]').val('-');  
            $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#hydraulic_system').hide();  
            $('input[name="hydraulic_system"]').val('-');  
            $('#hydraulic_system1').prop('checked', true);  // Centang radio 'Normal'


            $('#kompresor').hide();  
            $('input[name="kompresor"]').val('-');  
            $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

            $('#folklamp').hide();  
            $('input[name="folklamp"]').val('-');  
            $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#retting_depan').hide();  
            $('input[name="retting_depan"]').val('-');  
            $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#retting_belakang').hide();  
            $('input[name="retting_belakang"]').val('-');  
            $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

            $('#lampu_kompartement').hide();  
            $('input[name="lampu_kompartement"]').val('-');  
            $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

            $('#lampu_body').hide();  
            $('input[name="lampu_body"]').val('-');  
            $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

            $('#ban_tengah_kanan').hide();  
            $('input[name="ban_tengah_kanan"]').val('-');  
            $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

            $('#ban_tengah_kiri').hide();  
            $('input[name="ban_tengah_kiri"]').val('-');  
            $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

            $('#pompa_fire_fighting').hide();  
            $('input[name="pompa_fire_fighting"]').val('-');  
            $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

            $('#primming_pump').hide();  
            $('input[name="primming_pump"]').val('-');  
            $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

            $('#roof_turret').hide();  
            $('input[name="roof_turret"]').val('-');  
            $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#bumper_turret').hide();  
            $('input[name="bumper_turret"]').val('-');  
            $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_depan').hide();  
            $('input[name="undertrack_spray_depan"]').val('-');  
            $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kanan').hide();  
            $('input[name="undertrack_spray_kanan"]').val('-');  
            $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

            $('#undertrack_spray_kiri').hide();  
            $('input[name="undertrack_spray_kiri"]').val('-');  
            $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

            $('#foam_proportioner').hide();  
            $('input[name="foam_proportioner"]').val('-');  
            $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_air').hide();  
            $('input[name="tangki_air"]').val('-');  
            $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

            $('#tangki_foam').hide();  
            $('input[name="tangki_foam"]').val('-');  
            $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

            $('#pengisian_air_eksternal').hide();  
            $('input[name="pengisian_air_eksternal"]').val('-');  
            $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#charger_baterai_eksternal').hide();  
            $('input[name="charger_baterai_eksternal"]').val('-');  
            $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

            $('#top_speeds').hide();  
            $('input[name="top_speed"]').val('0');  
            $('#top_speed').removeAttr('required');  // Hilangkan required

            $('#stop_distances').hide();  
            $('input[name="stop_distance"]').val('0');
            $('#stop_distance').removeAttr('required');  // Hilangkan required

            $('#accelerations').hide();  
            $('input[name="acceleration"]').val('0'); 
            $('#acceleration').removeAttr('required');  // Hilangkan required

            $('#discharge_ranges').hide();  
            $('input[name="discharge_range"]').val('0');   
            $('#discharge_range').removeAttr('required');  // Hilangkan required

            $('#discharge_rates').hide();  
            $('input[name="discharge_rate"]').val('0'); 
            $('#discharge_rate').removeAttr('required');  // Hilangkan required

                    // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);

                    // Hide FILTER OLI MESIN BAWAH
                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                    // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide POMPA HIDROLIS
                    $('#pompa_hidrolis').hide();
                    $('input[name="pompa_hidrolis"]').val('-');
                    $('#pompa_hidrolis1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);


                        $('#ban_tengah_belakang').hide();
                        $('input[name="ban_tengah_belakang"]').val('-');
                        $('#ban_tengah_belakang1').prop('checked', true);





  

        } else if (vehicleType === 'Genset'){

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);


                        $('#pedal_gas').hide();  
                        $('input[name="pedal_gas"]').val('-');  
                        $('#pedal_gas1').prop('checked', true); 

                        $('#kondisi_turbo').hide();  
                        $('input[name="kondisi_turbo"]').val('-');  
                        $('#kondisi_turbo1').prop('checked', true);         

                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                    $('#v_belt_ampere').hide();  
                    $('input[name="v_belt_ampere"]').val('-');  
                    $('#v_belt_ampere1').prop('checked', true); 

                    $('#v_belt_power_steering').hide();  
                    $('input[name="v_belt_power_steering"]').val('-');  
                    $('#v_belt_power_steering1').prop('checked', true); 


                    $('#filter_water_sparator').hide();  
                    $('input[name="filter_water_sparator"]').val('-');  
                    $('#filter_water_sparator1').prop('checked', true);  // Centang radio 'Baik'

                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

                        $('#oli_kompresor').hide();
                        $('input[name="oli_kompresor"]').val('-');
                        $('#oli_kompresor1').prop('checked', true);


                        $('#filter_oli_kompresor').hide();
                        $('input[name="filter_oli_kompresor"]').val('-');
                        $('#filter_oli_kompresor1').prop('checked', true);


                        // Hide FUNGSI SCREW KOMPRESOR
                        $('#fungsi_screw_kompresor').hide();
                        $('input[name="fungsi_screw_kompresor"]').val('-');
                        $('#fungsi_screw_kompresor1').prop('checked', true);

                        // Hide FUNGSI CUT OFF PRESSURE
                        $('#fungsi_cut_off_pressure').hide();
                        $('input[name="fungsi_cut_off_pressure"]').val('-');
                        $('#fungsi_cut_off_pressure1').prop('checked', true);

                        // Hide FUNGSI DRAYER
                        $('#fungsi_drayer').hide();
                        $('input[name="fungsi_drayer"]').val('-');
                        $('#fungsi_drayer1').prop('checked', true);

                        // Hide FUNGSI AUTO START
                        $('#fungsi_auto_start').hide();
                        $('input[name="fungsi_auto_start"]').val('-');
                        $('#fungsi_auto_start1').prop('checked', true);


                $('#rem_kaki').hide();  
                $('input[name="rem_kaki"]').val('-');  
                $('#rem_kaki1').prop('checked', true); 

                $('#rem_tangan').hide();  
                $('input[name="rem_tangan"]').val('-');  
                $('#rem_tangan1').prop('checked', true); 

                $('#ban_kanan').hide();
                $('input[name="ban_kanan"]').val('-');
                $('#ban_kanan1').prop('checked', true);

                // Hide BAN KIRI
                $('#ban_kiri').hide();
                $('input[name="ban_kiri"]').val('-');
                $('#ban_kiri1').prop('checked', true);

                $('#tekanan_angin').hide();  
                $('input[name="tekanan_angin"]').val('-');  
                $('#tekanan_angin1').prop('checked', true);  // Centang radio 'Baik'
                
                $('#handrem_tangki_air').hide();  
                $('input[name="handrem_tangki_air"]').val('-');  
                $('#handrem_tangki_air1').prop('checked', true); 

                $('#rotary_lamp').hide();  
                $('input[name="rotary_lamp"]').val('-');  
                $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                // Hide Friction Tyre Kanan
                $('#friction_tyre_kanan').hide();
                $('input[name="friction_tyre_kanan"]').val('-');
                $('#friction_tyre_kanan1').prop('checked', true);

                // Hide Friction Tyre Kiri
                $('#friction_tyre_kiri').hide();
                $('input[name="friction_tyre_kiri"]').val('-');
                $('#friction_tyre_kiri1').prop('checked', true);

                // Hide Distance Tyre Tengah
                $('#distance_tyre_tengah').hide();
                $('input[name="distance_tyre_tengah"]').val('-');
                $('#distance_tyre_tengah1').prop('checked', true);

                // Hide Loadcell
                $('#loadcell').hide();
                $('input[name="loadcell"]').val('-');
                $('#loadcell1').prop('checked', true);

                // Hide Connector Kabel
                $('#connector_kabel').hide();
                $('input[name="connector_kabel"]').val('-');
                $('#connector_kabel1').prop('checked', true);

                // Hide Fungsi Pompa Air
                $('#fungsi_pompa_air').hide();
                $('input[name="fungsi_pompa_air"]').val('-');
                $('#fungsi_pompa_air1').prop('checked', true);

                // Hide Kondisi Tangki Air
                $('#kondisi_tangki_air').hide();
                $('input[name="kondisi_tangki_air"]').val('-');
                $('#kondisi_tangki_air1').prop('checked', true);

                // Hide Laptop
                $('#laptop').hide();
                $('input[name="laptop"]').val('-');
                $('#laptop1').prop('checked', true);

                // Hide Kalibrasi Jarak
                $('#kalibrasi_jarak').hide();
                $('input[name="kalibrasi_jarak"]').val('-');
                $('#kalibrasi_jarak1').prop('checked', true);

                // Hide Penggantian Oli Selanjutnya
                $('#oli_selanjutnya').closest('.row').hide();
                $('input[name="oli_selanjutnya"]').val(0); // Set nilai input menjadi 0

                // Hide Oli Telat
                $('#oli_kurang').closest('.row').hide();
                $('input[name="oli_kurang"]').val(0); // Set nilai input menjadi 0

                // Hide KM Oli Masih Tersisa
                $('#oli_lebih').closest('.row').hide();
                $('input[name="oli_lebih"]').val(0); // Set nilai input menjadi 0


                                    // Hide Fungsi Hidrolik Moower
                $('#fungsi_hidrolik_moower').hide();
                $('input[name="fungsi_hidrolik_moower"]').val('-');
                $('#fungsi_hidrolik_moower1').prop('checked', true);

                // Hide Fungsi Pisau Moower
                $('#fungsi_pisau_moower').hide();
                $('input[name="fungsi_pisau_moower"]').val('-');
                $('#fungsi_pisau_moower1').prop('checked', true);

                // Hide Fungsi Pompa Hidrolic
                $('#fungsi_pompa_hidrolic').hide();
                $('input[name="fungsi_pompa_hidrolic"]').val('-');
                $('#fungsi_pompa_hidrolic1').prop('checked', true);

                // Hide Gearbox
                $('#gearbox').hide();
                $('input[name="gearbox"]').val('-');
                $('#gearbox1').prop('checked', true);


                // Fungsi Gerakan Shourd
                $('#fungsi_gerakan_shourd').hide();
                $('input[name="fungsi_gerakan_shourd"]').val('-');
                $('#fungsi_gerakan_shourd1').prop('checked', true);

                // Fungsi Putaran Kumparan
                $('#fungsi_putaran_kumparan').hide();
                $('input[name="fungsi_putaran_kumparan"]').val('-');
                $('#fungsi_putaran_kumparan1').prop('checked', true);

                // Nozzle
                $('#nozzle').hide();
                $('input[name="nozzle"]').val('-');
                $('#nozzle1').prop('checked', true);

                // Selang Hidrolis
                $('#selang_hidrolis').hide();
                $('input[name="selang_hidrolis"]').val('-');
                $('#selang_hidrolis1').prop('checked', true);

                // Seal Brush Button
                $('#seal_brush_button').hide();
                $('input[name="seal_brush_button"]').val('-');
                $('#seal_brush_button1').prop('checked', true);

                // Seal Swifel Shaft
                $('#seal_swifel_shaft').hide();
                $('input[name="seal_swifel_shaft"]').val('-');
                $('#seal_swifel_shaft1').prop('checked', true);

                // Seal Gasket
                $('#seal_gasket').hide();
                $('input[name="seal_gasket"]').val('-');
                $('#seal_gasket1').prop('checked', true);

                // Seal Upper
                $('#seal_upper').hide();
                $('input[name="seal_upper"]').val('-');
                $('#seal_upper1').prop('checked', true);

                // Drit Shield
                $('#drit_shield').hide();
                $('input[name="drit_shield"]').val('-');
                $('#drit_shield1').prop('checked', true);



                $('#ban_belakang_kanan').hide();  
                $('input[name="ban_belakang_kanan"]').val('-');  
                $('#ban_belakang_kanan1').prop('checked', true);  

                $('#ban_belakang_kiri').hide();  
                $('input[name="ban_belakang_kiri"]').val('-');  
                $('#ban_belakang_kiri1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'

                $('#ban_depan_kiri').hide();  
                $('input[name="ban_depan_kiri"]').val('-');  
                $('#ban_depan_kiri1').prop('checked', true);  

                $('#ban_cadangan').hide();  
                $('input[name="ban_cadangan"]').val('-');  
                $('#ban_cadangan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'


                $('#ban_depan_kanan').hide();  
                $('input[name="ban_depan_kanan"]').val('-');  
                $('#ban_depan_kanan1').prop('checked', true);  // Centang radio 'Baik'


                $('#fungsi_wipper').hide();  
                $('input[name="fungsi_wipper"]').val('-');  
                $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

                $('#central_lock').hide();  
                $('input[name="central_lock"]').val('-');  
                $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'


                $('#microphone').hide();  
                $('input[name="microphone"]').val('-');  
                $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                $('#power_window_lock').hide();  
                $('input[name="power_window_lock"]').val('-');  
                $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'   '

                $('#jok_kendaraan').hide();  
                $('input[name="jok_kendaraan"]').val('-');  
                $('#jok_kendaraan1').prop('checked', true);  // Centang radio 'Baik' 

                $('#klakson').hide();  
                $('input[name="klakson"]').val('-');  
                $('#klakson1').prop('checked', true);  // Centang radio 'Baik' 

                $('#cabin_lamp').hide();  
                $('input[name="cabin_lamp"]').val('-');  
                $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                $('#air_coditioning').hide();  
                $('input[name="air_coditioning"]').val('-');  
                $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal

                $('#kondisi_karet_wiper').hide();  
                $('input[name="kondisi_karet_wiper"]').val('-');  
                $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik' 

                $('#headlamp_jauh').hide();  
                $('input[name="headlamp_jauh"]').val('-');  
                $('#headlamp_jauh1').prop('checked', true);  // Centang radio 'Baik'

                $('#headlamp_dekat').hide();  
                $('input[name="headlamp_dekat"]').val('-');  
                $('#headlamp_dekat1').prop('checked', true);  // Centang radio 'Baik'

                $('#reversing_lamp').hide();  
                $('input[name="reversing_lamp"]').val('-');  
                $('#reversing_lamp1').prop('checked', true);  // Centang radio 'Baik'


                $('#sign_lamp_belakang').hide();  
                $('input[name="sign_lamp_belakang"]').val('-');  
                $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                $('#sign_lamp_depan').hide();  
                $('input[name="sign_lamp_depan"]').val('-');  
                $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                $('#stoplamp').hide();  
                $('input[name="stoplamp"]').val('-');  
                $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                $('#lampu_atret').hide();  
                $('input[name="lampu_atret"]').val('-');  
                $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'

                $('#rotary_lamp').hide();  
                $('input[name="rotary_lamp"]').val('-');  
                $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                $('#lampu_sorot').hide();  
                $('input[name="lampu_sorot"]').val('-');  
                $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'

                $('#kopling').hide();  
                $('input[name="kopling"]').val('-');  
                $('#kopling1').prop('checked', true); 

                $('#power_steering').hide();  
                $('input[name="power_steering"]').val('-');  
                $('#power_steering1').prop('checked', true); 

                $('#kaki_kaki').hide();  
                $('input[name="kaki_kaki"]').val('-');  
                $('#kaki_kaki1').prop('checked', true); 


                $('#sistem_pendingin').hide();  
                $('input[name="sistem_pendingin"]').val('-');  
                $('#sistem_pendingin1').prop('checked', true); 

                $('#transmisi').hide();  
                $('input[name="transmisi"]').val('-');  
                $('#transmisi1').prop('checked', true); 


                $('#kaca_film').hide();  
                $('input[name="kaca_film"]').val('-');  
                $('#kaca_film1').prop('checked', true); 


                $('#apar').hide();  
                $('input[name="apar"]').val('-');  
                $('#apar1').prop('checked', true); 

                $('#reservoir_wiper').hide();  
                $('input[name="reservoir_wiper"]').val('-');  
                $('#wiper1').prop('checked', true); 

                $('#vbelt_engine').hide();  
                $('input[name="vbelt_engine"]').val('-');  
                $('#vbelt_engine1').prop('checked', true); 

                $('#timing_belt').hide();  
                $('input[name="timing_belt"]').val('-');  
                $('#timing1').prop('checked', true); 

                $('#dongkrak').hide();  
                $('input[name="dongkrak"]').val('-');  
                $('#dongkrak_Ada').prop('checked', true); 

                $('#kunci_roda').hide();  
                $('input[name="kunci_roda"]').val('-');  
                $('#kunci_roda_Ada').prop('checked', true); 



                $('#oli_transmisi').hide();  
                $('input[name="oli_transmisi"]').val('-');  
                $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#minyak_power_steering').hide();  
                $('input[name="minyak_power_steering"]').val('-');  
                $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#minyak_rem').hide();  
                $('input[name="minyak_rem"]').val('-');  
                $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP


                $('#pompa_uhp').hide();  
                $('input[name="pompa_uhp"]').val('-');  
                $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#pto_kopling_pompa').hide();  
                $('input[name="pto_kopling_pompa"]').val('-');  
                $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                $('#v_belt_pompa_uhp').hide();  
                $('input[name="v_belt_pompa_uhp"]').val('-');  
                $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                $('#kampas_kopling_pompa_uhp').hide();  
                $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                $('#kompresor_pompa_uhp').hide();  
                $('input[name="kompresor_pompa_uhp"]').val('-');  
                $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                $('#vacum_hose_3_inch').hide();  
                $('input[name="vacum_hose_3_inch"]').val('-');  
                $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                $('#vacum_hose_4_inch').hide();  
                $('input[name="vacum_hose_4_inch"]').val('-');  
                $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                $('#vacum_hose_6_inch').hide();  
                $('input[name="vacum_hose_6_inch"]').val('-');  
                $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                $('#hose_40k').hide();  
                $('input[name="hose_40k"]').val('-');  
                $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                $('#filter_cartridge').hide();  
                $('input[name="filter_cartridge"]').val('-');  
                $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                $('#filter_bag_10_micron').hide();  
                $('input[name="filter_bag_10_micron"]').val('-');  
                $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                $('#debris_bag').hide();  
                $('input[name="debris_bag"]').val('-');  
                $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                $('#running_test_40k_engine').hide();  
                $('input[name="running_test_40k_engine"]').val('-');  
                $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


                $('#oli_gardan').hide();  
                $('input[name="oli_gardan"]').val('-');  
                $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

                $('#oli_hidrolis').hide();  
                $('input[name="oli_hidrolis"]').val('-');  
                $('#oli_hidrolis1').prop('checked', true);  // Centang radio 'Tidak Baik'

                $('#filter_transmisi').hide();  
                $('input[name="filter_transmisi"]').val('-');  
                $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

                $('#filter_hidrolis').hide();  
                $('input[name="filter_hidrolis"]').val('-');  
                $('#filter_hidrolis1').prop('checked', true);  // Centang radio 'Baik'

                $('#airdrayer').hide();  
                $('input[name="airdrayer"]').val('-');  
                $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

                $('#pneumatic_system').hide();  
                $('input[name="pneumatic_system"]').val('-');  
                $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

                $('#hydraulic_system').hide();  
                $('input[name="hydraulic_system"]').val('-');  
                $('#hydraulic_system1').prop('checked', true);  // Centang radio 'Normal'


                $('#kompresor').hide();  
                $('input[name="kompresor"]').val('-');  
                $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

                $('#folklamp').hide();  
                $('input[name="folklamp"]').val('-');  
                $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                $('#retting_depan').hide();  
                $('input[name="retting_depan"]').val('-');  
                $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                $('#retting_belakang').hide();  
                $('input[name="retting_belakang"]').val('-');  
                $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                $('#lampu_kompartement').hide();  
                $('input[name="lampu_kompartement"]').val('-');  
                $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

                $('#lampu_body').hide();  
                $('input[name="lampu_body"]').val('-');  
                $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

                $('#ban_tengah_kanan').hide();  
                $('input[name="ban_tengah_kanan"]').val('-');  
                $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

                $('#ban_tengah_kiri').hide();  
                $('input[name="ban_tengah_kiri"]').val('-');  
                $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

                $('#pompa_fire_fighting').hide();  
                $('input[name="pompa_fire_fighting"]').val('-');  
                $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

                $('#primming_pump').hide();  
                $('input[name="primming_pump"]').val('-');  
                $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

                $('#roof_turret').hide();  
                $('input[name="roof_turret"]').val('-');  
                $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

                $('#bumper_turret').hide();  
                $('input[name="bumper_turret"]').val('-');  
                $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

                $('#undertrack_spray_depan').hide();  
                $('input[name="undertrack_spray_depan"]').val('-');  
                $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

                $('#undertrack_spray_kanan').hide();  
                $('input[name="undertrack_spray_kanan"]').val('-');  
                $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

                $('#undertrack_spray_kiri').hide();  
                $('input[name="undertrack_spray_kiri"]').val('-');  
                $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

                $('#foam_proportioner').hide();  
                $('input[name="foam_proportioner"]').val('-');  
                $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

                $('#tangki_air').hide();  
                $('input[name="tangki_air"]').val('-');  
                $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

                $('#tangki_foam').hide();  
                $('input[name="tangki_foam"]').val('-');  
                $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

                $('#pengisian_air_eksternal').hide();  
                $('input[name="pengisian_air_eksternal"]').val('-');  
                $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                $('#charger_baterai_eksternal').hide();  
                $('input[name="charger_baterai_eksternal"]').val('-');  
                $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                $('#top_speeds').hide();  
                $('input[name="top_speed"]').val('0');  
                $('#top_speed').removeAttr('required');  // Hilangkan required

                $('#stop_distances').hide();  
                $('input[name="stop_distance"]').val('0');
                $('#stop_distance').removeAttr('required');  // Hilangkan required

                $('#accelerations').hide();  
                $('input[name="acceleration"]').val('0'); 
                $('#acceleration').removeAttr('required');  // Hilangkan required

                $('#discharge_ranges').hide();  
                $('input[name="discharge_range"]').val('0');   
                $('#discharge_range').removeAttr('required');  // Hilangkan required

                $('#discharge_rates').hide();  
                $('input[name="discharge_rate"]').val('0'); 
                $('#discharge_rate').removeAttr('required');  // Hilangkan required

                // Hide OLI MESIN BAWAH
                $('#oli_mesin_bawah').hide();
                $('input[name="oli_mesin_bawah"]').val('-');
                $('#oli_mesin_bawah1').prop('checked', true);

                // Hide AIR RADIATOR MESIN BAWAH
                $('#air_radiator_mesin_bawah').hide();
                $('input[name="air_radiator_mesin_bawah"]').val('-');
                $('#air_radiator_mesin_bawah1').prop('checked', true);

                // Hide FILTER OLI MESIN BAWAH
                $('#filter_oli_mesin_bawah').hide();
                $('input[name="filter_oli_mesin_bawah"]').val('-');
                $('#filter_oli_mesin_bawah1').prop('checked', true);

                // Hide FILTER BAHAN BAKAR MESIN BAWAH
                $('#filter_bahan_bakar_mesin_bawah').hide();
                $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                // Hide FILTER UDARA MESIN BAWAH
                $('#filter_udara_mesin_bawah').hide();
                $('input[name="filter_udara_mesin_bawah"]').val('-');
                $('#filter_udara_mesin_bawah1').prop('checked', true);

                // Hide OLI MESIN ATAS
                $('#oli_mesin_atas').hide();
                $('input[name="oli_mesin_atas"]').val('-');
                $('#oli_mesin_atas1').prop('checked', true);

                // Hide AIR RADIATOR MESIN ATAS
                $('#air_radiator_mesin_atas').hide();
                $('input[name="air_radiator_mesin_atas"]').val('-');
                $('#air_radiator_mesin_atas1').prop('checked', true);

                // Hide FILTER OLI MESIN ATAS
                $('#filter_oli_mesin_atas').hide();
                $('input[name="filter_oli_mesin_atas"]').val('-');
                $('#filter_oli_mesin_atas1').prop('checked', true);

                // Hide FILTER BAHAN BAKAR MESIN ATAS
                $('#filter_bahan_bakar_mesin_atas').hide();
                $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                // Hide FILTER UDARA MESIN ATAS
                $('#filter_udara_mesin_atas').hide();
                $('input[name="filter_udara_mesin_atas"]').val('-');
                $('#filter_udara_mesin_atas1').prop('checked', true);

                // Hide STARTER ENGINE MESIN ATAS
                $('#starter_engine_mesin_atas').hide();
                $('input[name="starter_engine_mesin_atas"]').val('-');
                $('#starter_engine_mesin_atas1').prop('checked', true);

                // Hide KONDISI ENGINE MESIN ATAS
                $('#kondisi_engine_mesin_atas').hide();
                $('input[name="kondisi_engine_mesin_atas"]').val('-');
                $('#kondisi_engine_mesin_atas1').prop('checked', true);

                // Hide TURBO MESIN ATAS
                $('#turbo_mesin_atas').hide();
                $('input[name="turbo_mesin_atas"]').val('-');
                $('#turbo_mesin_atas1').prop('checked', true);

                // Hide COOLING SYSTEM MESIN ATAS
                $('#cooling_system_mesin_atas').hide();
                $('input[name="cooling_system_mesin_atas"]').val('-');
                $('#cooling_system_mesin_atas1').prop('checked', true);

                // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                $('#gas_accelerator_pedal_mesin_atas').hide();
                $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                // Hide POMPA HIDROLIS
                $('#pompa_hidrolis').hide();
                $('input[name="pompa_hidrolis"]').val('-');
                $('#pompa_hidrolis1').prop('checked', true);

                // Hide FUNGSI HISAPAN VACUM
                $('#fungsi_hisapan_vacum').hide();
                $('input[name="fungsi_hisapan_vacum"]').val('-');
                $('#fungsi_hisapan_vacum1').prop('checked', true);

                // Hide FUNGSI GERAKAN VACUM
                $('#fungsi_gerakan_vacum').hide();
                $('input[name="fungsi_gerakan_vacum"]').val('-');
                $('#fungsi_gerakan_vacum1').prop('checked', true);

                // Hide FUNGSI PUTARAN SAPU KANAN
                $('#fungsi_putaran_sapu_kanan').hide();
                $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                // Hide FUNGSI PUTARAN SAPU KIRI
                $('#fungsi_putaran_sapu_kiri').hide();
                $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                // Hide FUNGSI PUTARAN SAPU TENGAH
                $('#fungsi_putaran_sapu_tengah').hide();
                $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                // Hide FUNGSI GERAKAN SAPU KANAN
                $('#fungsi_gerakan_sapu_kanan').hide();
                $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                // Hide FUNGSI GERAKAN SAPU KIRI
                $('#fungsi_gerakan_sapu_kiri').hide();
                $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                // Hide FUNGSI GERAKAN SAPU TENGAH
                $('#fungsi_gerakan_sapu_tengah').hide();
                $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                // Hide FUNGSI SPRAY BAR DEPAN
                $('#fungsi_spray_bar_depan').hide();
                $('input[name="fungsi_spray_bar_depan"]').val('-');
                $('#fungsi_spray_bar_depan1').prop('checked', true);

                // Hide FUNGSI SPRAY BAR KIRI
                $('#fungsi_spray_bar_kiri').hide();
                $('input[name="fungsi_spray_bar_kiri"]').val('-');
                $('#fungsi_spray_bar_kiri1').prop('checked', true);

                // Hide FUNGSI SPRAY BAR KANAN
                $('#fungsi_spray_bar_kanan').hide();
                $('input[name="fungsi_spray_bar_kanan"]').val('-');
                $('#fungsi_spray_bar_kanan1').prop('checked', true);

                // Hide FUNGSI JET SPRAY GUN
                $('#fungsi_jet_spray_gun').hide();
                $('input[name="fungsi_jet_spray_gun"]').val('-');
                $('#fungsi_jet_spray_gun1').prop('checked', true);

                // Hide FUNGSI HIDROLIS HOOPER
                $('#fungsi_hidrolis_hooper').hide();
                $('input[name="fungsi_hidrolis_hooper"]').val('-');
                $('#fungsi_hidrolis_hooper1').prop('checked', true);

                // Hide FUNGSI HIDROLIS TUTUP HOOPER
                $('#fungsi_hidrolis_tutup_hooper').hide();
                $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                // Hide FUNGSI MONITOR CONTROL
                $('#fungsi_monitor_control').hide();
                $('input[name="fungsi_monitor_control"]').val('-');
                $('#fungsi_monitor_control1').prop('checked', true);

                // Hide FUNGSI PENDANT
                $('#fungsi_pendant').hide();
                $('input[name="fungsi_pendant"]').val('-');
                $('#fungsi_pendant1').prop('checked', true);


                $('#ban_tengah_belakang').hide();
                $('input[name="ban_tengah_belakang"]').val('-');
                $('#ban_tengah_belakang1').prop('checked', true);







        } else if (vehicleType === 'Asphalt Cutter'){

                    $('#tanggal_aki').closest('.row').hide(); // Sembunyikan row
                    $('input[name="tanggal_aki"]').val(''); // Set nilai input menjadi kosong
                    $('#tanggal_aki').removeAttr('required');  // Hilangkan required

                    $('#odometers').hide();  
                    $('input[name="odometer"]').val('0');   
                    $('#odometer').removeAttr('required');  // Hilangkan required

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);


                    $('#starter_engine').hide();  
                    $('input[name="starter_engine"]').val('-');  
                    $('#starter_engine1').prop('checked', true); 


                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                    $('#v_belt_ampere').hide();  
                    $('input[name="v_belt_ampere"]').val('-');  
                    $('#v_belt_ampere1').prop('checked', true); 

                    $('#v_belt_power_steering').hide();  
                    $('input[name="v_belt_power_steering"]').val('-');  
                    $('#v_belt_power_steering1').prop('checked', true); 


            $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_hidrolis_sepatu_forklift').hide();  
                    $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                    $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);  // Centang radio 'Tidak Baik'

            $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

            $('#indikator_dashboard').hide();  
                        $('input[name="indikator_dashboard"]').val('-');  
                        $('#indikator_dashboard1').prop('checked', true);  // Centang radio 'Baik' 

                    $('#electrical_system').hide();  
                    $('input[name="electrical_system"]').val('-');  
                    $('#electrical_system1').prop('checked', true);  // Centang radio 'Normal'

            $('#kondisi_turbo').hide();  
            $('input[name="kondisi_turbo"]').val('-');  
            $('#kondisi_turbo1').prop('checked', true); 

            $('#filter_water_sparator').hide();  
            $('input[name="filter_water_sparator"]').val('-');  
            $('#filter_water_sparator1').prop('checked', true);  // Centang radio 'Baik'

            $('#cek_air_accu').hide();  
            $('input[name="cek_air_accu"]').val('-');  
            $('#cek_air_accu1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

            $('#v_aki').hide();
            $('input[name="v_aki"]').val(0); // Set nilai input menjadi 0

                    $('#oli_kompresor').hide();
                    $('input[name="oli_kompresor"]').val('-');
                    $('#oli_kompresor1').prop('checked', true);


                    $('#filter_oli_kompresor').hide();
                    $('input[name="filter_oli_kompresor"]').val('-');
                    $('#filter_oli_kompresor1').prop('checked', true);

                    $('#v_belt_kompresor').hide();
                    $('input[name="v_belt_kompresor"]').val('-');
                    $('#v_belt_kompresor1').prop('checked', true);


                    // Hide FUNGSI SCREW KOMPRESOR
                    $('#fungsi_screw_kompresor').hide();
                    $('input[name="fungsi_screw_kompresor"]').val('-');
                    $('#fungsi_screw_kompresor1').prop('checked', true);

                    // Hide FUNGSI CUT OFF PRESSURE
                    $('#fungsi_cut_off_pressure').hide();
                    $('input[name="fungsi_cut_off_pressure"]').val('-');
                    $('#fungsi_cut_off_pressure1').prop('checked', true);

                    // Hide FUNGSI DRAYER
                    $('#fungsi_drayer').hide();
                    $('input[name="fungsi_drayer"]').val('-');
                    $('#fungsi_drayer1').prop('checked', true);

                    // Hide FUNGSI AUTO START
                    $('#fungsi_auto_start').hide();
                    $('input[name="fungsi_auto_start"]').val('-');
                    $('#fungsi_auto_start1').prop('checked', true);


                    $('#rem_kaki').hide();  
                    $('input[name="rem_kaki"]').val('-');  
                    $('#rem_kaki1').prop('checked', true); 

                    $('#rem_tangan').hide();  
                    $('input[name="rem_tangan"]').val('-');  
                    $('#rem_tangan1').prop('checked', true); 

                    $('#ban_kanan').hide();
                    $('input[name="ban_kanan"]').val('-');
                    $('#ban_kanan1').prop('checked', true);

                    // Hide BAN KIRI
                    $('#ban_kiri').hide();
                    $('input[name="ban_kiri"]').val('-');
                    $('#ban_kiri1').prop('checked', true);

                    $('#tekanan_angin').hide();  
                    $('input[name="tekanan_angin"]').val('-');  
                    $('#tekanan_angin1').prop('checked', true);  // Centang radio 'Baik'

                    $('#handrem_tangki_air').hide();  
                    $('input[name="handrem_tangki_air"]').val('-');  
                    $('#handrem_tangki_air1').prop('checked', true); 

                    $('#rotary_lamp').hide();  
                    $('input[name="rotary_lamp"]').val('-');  
                    $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                    // Hide Friction Tyre Kanan
                    $('#friction_tyre_kanan').hide();
                    $('input[name="friction_tyre_kanan"]').val('-');
                    $('#friction_tyre_kanan1').prop('checked', true);

                    // Hide Friction Tyre Kiri
                    $('#friction_tyre_kiri').hide();
                    $('input[name="friction_tyre_kiri"]').val('-');
                    $('#friction_tyre_kiri1').prop('checked', true);

                    // Hide Distance Tyre Tengah
                    $('#distance_tyre_tengah').hide();
                    $('input[name="distance_tyre_tengah"]').val('-');
                    $('#distance_tyre_tengah1').prop('checked', true);

                    // Hide Loadcell
                    $('#loadcell').hide();
                    $('input[name="loadcell"]').val('-');
                    $('#loadcell1').prop('checked', true);

                    // Hide Connector Kabel
                    $('#connector_kabel').hide();
                    $('input[name="connector_kabel"]').val('-');
                    $('#connector_kabel1').prop('checked', true);

                    // Hide Fungsi Pompa Air
                    $('#fungsi_pompa_air').hide();
                    $('input[name="fungsi_pompa_air"]').val('-');
                    $('#fungsi_pompa_air1').prop('checked', true);

                    // Hide Kondisi Tangki Air
                    $('#kondisi_tangki_air').hide();
                    $('input[name="kondisi_tangki_air"]').val('-');
                    $('#kondisi_tangki_air1').prop('checked', true);

                    // Hide Laptop
                    $('#laptop').hide();
                    $('input[name="laptop"]').val('-');
                    $('#laptop1').prop('checked', true);

                    // Hide Kalibrasi Jarak
                    $('#kalibrasi_jarak').hide();
                    $('input[name="kalibrasi_jarak"]').val('-');
                    $('#kalibrasi_jarak1').prop('checked', true);

                    // Hide Penggantian Oli Selanjutnya
                    $('#oli_selanjutnya').closest('.row').hide();
                    $('input[name="oli_selanjutnya"]').val(0); // Set nilai input menjadi 0

                    // Hide Oli Telat
                    $('#oli_kurang').closest('.row').hide();
                    $('input[name="oli_kurang"]').val(0); // Set nilai input menjadi 0

                    // Hide KM Oli Masih Tersisa
                    $('#oli_lebih').closest('.row').hide();
                    $('input[name="oli_lebih"]').val(0); // Set nilai input menjadi 0


                                // Hide Fungsi Hidrolik Moower
                    $('#fungsi_hidrolik_moower').hide();
                    $('input[name="fungsi_hidrolik_moower"]').val('-');
                    $('#fungsi_hidrolik_moower1').prop('checked', true);

                    // Hide Fungsi Pisau Moower
                    $('#fungsi_pisau_moower').hide();
                    $('input[name="fungsi_pisau_moower"]').val('-');
                    $('#fungsi_pisau_moower1').prop('checked', true);

                    // Hide Fungsi Pompa Hidrolic
                    $('#fungsi_pompa_hidrolic').hide();
                    $('input[name="fungsi_pompa_hidrolic"]').val('-');
                    $('#fungsi_pompa_hidrolic1').prop('checked', true);

                    // Hide Gearbox
                    $('#gearbox').hide();
                    $('input[name="gearbox"]').val('-');
                    $('#gearbox1').prop('checked', true);


                    // Fungsi Gerakan Shourd
                    $('#fungsi_gerakan_shourd').hide();
                    $('input[name="fungsi_gerakan_shourd"]').val('-');
                    $('#fungsi_gerakan_shourd1').prop('checked', true);

                    // Fungsi Putaran Kumparan
                    $('#fungsi_putaran_kumparan').hide();
                    $('input[name="fungsi_putaran_kumparan"]').val('-');
                    $('#fungsi_putaran_kumparan1').prop('checked', true);

                    // Nozzle
                    $('#nozzle').hide();
                    $('input[name="nozzle"]').val('-');
                    $('#nozzle1').prop('checked', true);

                    // Selang Hidrolis
                    $('#selang_hidrolis').hide();
                    $('input[name="selang_hidrolis"]').val('-');
                    $('#selang_hidrolis1').prop('checked', true);

                    // Seal Brush Button
                    $('#seal_brush_button').hide();
                    $('input[name="seal_brush_button"]').val('-');
                    $('#seal_brush_button1').prop('checked', true);

                    // Seal Swifel Shaft
                    $('#seal_swifel_shaft').hide();
                    $('input[name="seal_swifel_shaft"]').val('-');
                    $('#seal_swifel_shaft1').prop('checked', true);

                    // Seal Gasket
                    $('#seal_gasket').hide();
                    $('input[name="seal_gasket"]').val('-');
                    $('#seal_gasket1').prop('checked', true);

                    // Seal Upper
                    $('#seal_upper').hide();
                    $('input[name="seal_upper"]').val('-');
                    $('#seal_upper1').prop('checked', true);

                    // Drit Shield
                    $('#drit_shield').hide();
                    $('input[name="drit_shield"]').val('-');
                    $('#drit_shield1').prop('checked', true);



                    $('#ban_belakang_kanan').hide();  
                    $('input[name="ban_belakang_kanan"]').val('-');  
                    $('#ban_belakang_kanan1').prop('checked', true);  

                    $('#ban_belakang_kiri').hide();  
                    $('input[name="ban_belakang_kiri"]').val('-');  
                    $('#ban_belakang_kiri1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'

                    $('#ban_depan_kiri').hide();  
                    $('input[name="ban_depan_kiri"]').val('-');  
                    $('#ban_depan_kiri1').prop('checked', true);  

                    $('#ban_cadangan').hide();  
                    $('input[name="ban_cadangan"]').val('-');  
                    $('#ban_cadangan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'


                    $('#ban_depan_kanan').hide();  
                    $('input[name="ban_depan_kanan"]').val('-');  
                    $('#ban_depan_kanan1').prop('checked', true);  // Centang radio 'Baik'


                    $('#fungsi_wipper').hide();  
                    $('input[name="fungsi_wipper"]').val('-');  
                    $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

                    $('#central_lock').hide();  
                    $('input[name="central_lock"]').val('-');  
                    $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'


                    $('#microphone').hide();  
                    $('input[name="microphone"]').val('-');  
                    $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#power_window_lock').hide();  
                    $('input[name="power_window_lock"]').val('-');  
                    $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'   '

                    $('#jok_kendaraan').hide();  
                    $('input[name="jok_kendaraan"]').val('-');  
                    $('#jok_kendaraan1').prop('checked', true);  // Centang radio 'Baik' 

                    $('#klakson').hide();  
                    $('input[name="klakson"]').val('-');  
                    $('#klakson1').prop('checked', true);  // Centang radio 'Baik' 

                    $('#cabin_lamp').hide();  
                    $('input[name="cabin_lamp"]').val('-');  
                    $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#air_coditioning').hide();  
                    $('input[name="air_coditioning"]').val('-');  
                    $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal

                    $('#kondisi_karet_wiper').hide();  
                    $('input[name="kondisi_karet_wiper"]').val('-');  
                    $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik' 

                    $('#headlamp_jauh').hide();  
                    $('input[name="headlamp_jauh"]').val('-');  
                    $('#headlamp_jauh1').prop('checked', true);  // Centang radio 'Baik'

                    $('#headlamp_dekat').hide();  
                    $('input[name="headlamp_dekat"]').val('-');  
                    $('#headlamp_dekat1').prop('checked', true);  // Centang radio 'Baik'

                    $('#reversing_lamp').hide();  
                    $('input[name="reversing_lamp"]').val('-');  
                    $('#reversing_lamp1').prop('checked', true);  // Centang radio 'Baik'


                    $('#sign_lamp_belakang').hide();  
                    $('input[name="sign_lamp_belakang"]').val('-');  
                    $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                    $('#sign_lamp_depan').hide();  
                    $('input[name="sign_lamp_depan"]').val('-');  
                    $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                    $('#stoplamp').hide();  
                    $('input[name="stoplamp"]').val('-');  
                    $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                    $('#lampu_atret').hide();  
                    $('input[name="lampu_atret"]').val('-');  
                    $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'

                    $('#rotary_lamp').hide();  
                    $('input[name="rotary_lamp"]').val('-');  
                    $('#rotary_lamp1').prop('checked', true);  // Centang radio 'Baik'

                    $('#lampu_sorot').hide();  
                    $('input[name="lampu_sorot"]').val('-');  
                    $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'

                    $('#kopling').hide();  
                    $('input[name="kopling"]').val('-');  
                    $('#kopling1').prop('checked', true); 

                    $('#power_steering').hide();  
                    $('input[name="power_steering"]').val('-');  
                    $('#power_steering1').prop('checked', true); 

                    $('#kaki_kaki').hide();  
                    $('input[name="kaki_kaki"]').val('-');  
                    $('#kaki_kaki1').prop('checked', true); 


                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                    $('#transmisi').hide();  
                    $('input[name="transmisi"]').val('-');  
                    $('#transmisi1').prop('checked', true); 


                    $('#kaca_film').hide();  
                    $('input[name="kaca_film"]').val('-');  
                    $('#kaca_film1').prop('checked', true);  


                    $('#apar').hide();  
                    $('input[name="apar"]').val('-');  
                    $('#apar1').prop('checked', true); 

                    $('#reservoir_wiper').hide();  
                    $('input[name="reservoir_wiper"]').val('-');  
                    $('#wiper1').prop('checked', true); 

                    $('#vbelt_engine').hide();  
                    $('input[name="vbelt_engine"]').val('-');  
                    $('#vbelt_engine1').prop('checked', true); 

                    $('#timing_belt').hide();  
                    $('input[name="timing_belt"]').val('-');  
                    $('#timing1').prop('checked', true); 

                    $('#dongkrak').hide();  
                    $('input[name="dongkrak"]').val('-');  
                    $('#dongkrak_Ada').prop('checked', true); 

                    $('#kunci_roda').hide();  
                    $('input[name="kunci_roda"]').val('-');  
                    $('#kunci_roda_Ada').prop('checked', true); 



                    $('#oli_transmisi').hide();  
                    $('input[name="oli_transmisi"]').val('-');  
                    $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                    $('#minyak_power_steering').hide();  
                    $('input[name="minyak_power_steering"]').val('-');  
                    $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                    $('#minyak_rem').hide();  
                    $('input[name="minyak_rem"]').val('-');  
                    $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP


                    $('#pompa_uhp').hide();  
                    $('input[name="pompa_uhp"]').val('-');  
                    $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                    $('#pto_kopling_pompa').hide();  
                    $('input[name="pto_kopling_pompa"]').val('-');  
                    $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                    $('#v_belt_pompa_uhp').hide();  
                    $('input[name="v_belt_pompa_uhp"]').val('-');  
                    $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                    $('#kampas_kopling_pompa_uhp').hide();  
                    $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                    $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                    $('#kompresor_pompa_uhp').hide();  
                    $('input[name="kompresor_pompa_uhp"]').val('-');  
                    $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                    $('#vacum_hose_3_inch').hide();  
                    $('input[name="vacum_hose_3_inch"]').val('-');  
                    $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                    $('#vacum_hose_4_inch').hide();  
                    $('input[name="vacum_hose_4_inch"]').val('-');  
                    $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                    $('#vacum_hose_6_inch').hide();  
                    $('input[name="vacum_hose_6_inch"]').val('-');  
                    $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                    $('#hose_40k').hide();  
                    $('input[name="hose_40k"]').val('-');  
                    $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                    $('#filter_cartridge').hide();  
                    $('input[name="filter_cartridge"]').val('-');  
                    $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                    $('#filter_bag_10_micron').hide();  
                    $('input[name="filter_bag_10_micron"]').val('-');  
                    $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                    $('#debris_bag').hide();  
                    $('input[name="debris_bag"]').val('-');  
                    $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                    $('#running_test_40k_engine').hide();  
                    $('input[name="running_test_40k_engine"]').val('-');  
                    $('#running_test_40k_engine1').prop('checked', true); // Centang radio 'Normal' untuk Running Test 40K Engine


                    $('#oli_gardan').hide();  
                    $('input[name="oli_gardan"]').val('-');  
                    $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#oli_hidrolis').hide();  
                    $('input[name="oli_hidrolis"]').val('-');  
                    $('#oli_hidrolis1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#filter_air_drayer').hide();  
                    $('input[name="filter_air_drayer"]').val('-');  
                    $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'

                    $('#filter_transmisi').hide();  
                    $('input[name="filter_transmisi"]').val('-');  
                    $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

                    $('#filter_hidrolis').hide();  
                    $('input[name="filter_hidrolis"]').val('-');  
                    $('#filter_hidrolis1').prop('checked', true);  // Centang radio 'Baik'

                    $('#airdrayer').hide();  
                    $('input[name="airdrayer"]').val('-');  
                    $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

                    $('#pneumatic_system').hide();  
                    $('input[name="pneumatic_system"]').val('-');  
                    $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

                    $('#hydraulic_system').hide();  
                    $('input[name="hydraulic_system"]').val('-');  
                    $('#hydraulic_system1').prop('checked', true);  // Centang radio 'Normal'


                    $('#kompresor').hide();  
                    $('input[name="kompresor"]').val('-');  
                    $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

                    $('#folklamp').hide();  
                    $('input[name="folklamp"]').val('-');  
                    $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#retting_depan').hide();  
                    $('input[name="retting_depan"]').val('-');  
                    $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#retting_belakang').hide();  
                    $('input[name="retting_belakang"]').val('-');  
                    $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#lampu_kompartement').hide();  
                    $('input[name="lampu_kompartement"]').val('-');  
                    $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

                    $('#lampu_body').hide();  
                    $('input[name="lampu_body"]').val('-');  
                    $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

                    $('#ban_tengah_kanan').hide();  
                    $('input[name="ban_tengah_kanan"]').val('-');  
                    $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

                    $('#ban_tengah_kiri').hide();  
                    $('input[name="ban_tengah_kiri"]').val('-');  
                    $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

                    $('#pompa_fire_fighting').hide();  
                    $('input[name="pompa_fire_fighting"]').val('-');  
                    $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

                    $('#primming_pump').hide();  
                    $('input[name="primming_pump"]').val('-');  
                    $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

                    $('#roof_turret').hide();  
                    $('input[name="roof_turret"]').val('-');  
                    $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

                    $('#bumper_turret').hide();  
                    $('input[name="bumper_turret"]').val('-');  
                    $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

                    $('#undertrack_spray_depan').hide();  
                    $('input[name="undertrack_spray_depan"]').val('-');  
                    $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

                    $('#undertrack_spray_kanan').hide();  
                    $('input[name="undertrack_spray_kanan"]').val('-');  
                    $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

                    $('#undertrack_spray_kiri').hide();  
                    $('input[name="undertrack_spray_kiri"]').val('-');  
                    $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

                    $('#foam_proportioner').hide();  
                    $('input[name="foam_proportioner"]').val('-');  
                    $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

                    $('#tangki_air').hide();  
                    $('input[name="tangki_air"]').val('-');  
                    $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

                    $('#tangki_foam').hide();  
                    $('input[name="tangki_foam"]').val('-');  
                    $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

                    $('#pengisian_air_eksternal').hide();  
                    $('input[name="pengisian_air_eksternal"]').val('-');  
                    $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                    $('#charger_baterai_eksternal').hide();  
                    $('input[name="charger_baterai_eksternal"]').val('-');  
                    $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                    $('#top_speeds').hide();  
                    $('input[name="top_speed"]').val('0');  
                    $('#top_speed').removeAttr('required');  // Hilangkan required

                    $('#stop_distances').hide();  
                    $('input[name="stop_distance"]').val('0');
                    $('#stop_distance').removeAttr('required');  // Hilangkan required

                    $('#accelerations').hide();  
                    $('input[name="acceleration"]').val('0'); 
                    $('#acceleration').removeAttr('required');  // Hilangkan required

                    $('#discharge_ranges').hide();  
                    $('input[name="discharge_range"]').val('0');   
                    $('#discharge_range').removeAttr('required');  // Hilangkan required

                    $('#discharge_rates').hide();  
                    $('input[name="discharge_rate"]').val('0'); 
                    $('#discharge_rate').removeAttr('required');  // Hilangkan required

                    // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);

                    // Hide FILTER OLI MESIN BAWAH
                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);

                    // Hide FILTER UDARA MESIN BAWAH
                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide POMPA HIDROLIS
                    $('#pompa_hidrolis').hide();
                    $('input[name="pompa_hidrolis"]').val('-');
                    $('#pompa_hidrolis1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);


                    $('#ban_tengah_belakang').hide();
                    $('input[name="ban_tengah_belakang"]').val('-');
                    $('#ban_tengah_belakang1').prop('checked', true);







        } else if (vehicleType === 'Forklift'){


                    $('#fungsi_vibrator').hide();  
                    $('input[name="fungsi_vibrator"]').val('-');  
                    $('#fungsi_vibrator1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#fungsi_spray_bar').hide();  
                    $('input[name="fungsi_spray_bar"]').val('-');  
                    $('#fungsi_spray_bar1').prop('checked', true);  // Centang radio 'Tidak Baik'

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);


                    $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                        $('#ban_tengah_belakang').hide();
                        $('input[name="ban_tengah_belakang"]').val('-');
                        $('#ban_tengah_belakang1').prop('checked', true);


                        $('#lampu_sorot').hide();  
                        $('input[name="lampu_sorot"]').val('-');  
                        $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'
                    
                        $('#stoplamp').hide();  
                        $('input[name="stoplamp"]').val('-');  
                        $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'


                    $('#v_belt_power_steering').hide();  
                    $('input[name="v_belt_power_steering"]').val('-');  
                    $('#v_belt_power_steering1').prop('checked', true); 
            
                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                $('#filter_water_sparator').hide();  
                $('input[name="filter_water_sparator"]').val('-');  
                $('#filter_water_sparator1').prop('checked', true);  // Centang radio 'Baik'


                $('#minyak_power_steering').hide();  
                $('input[name="minyak_power_steering"]').val('-');  
                $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#minyak_rem').hide();  
                $('input[name="minyak_rem"]').val('-');  
                $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                        $('#oli_transmisi').hide();  
                        $('input[name="oli_transmisi"]').val('-');  
                        $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP


                $('#oli_gardan').hide();  
                $('input[name="oli_gardan"]').val('-');  
                $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

                $('#filter_udara_mesin_bawah').hide();
                $('input[name="filter_udara_mesin_bawah"]').val('-');
                $('#filter_udara_mesin_bawah1').prop('checked', true);

                $('#filter_transmisi').hide();  
                $('input[name="filter_transmisi"]').val('-');  
                $('#filter_transmisi1').prop('checked', true);  // Centang radio 'Baik'

                $('#reversing_lamp').hide();  
                $('input[name="reversing_lamp"]').val('-');  
                $('#reversing_lamp1').prop('checked', true);  // Centang radio 'Baik'

                $('#retting_depan').hide();  
                $('input[name="retting_depan"]').val('-');  
                $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                $('#retting_belakang').hide();  
                $('input[name="retting_belakang"]').val('-');  
                $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                $('#lampu_atret').hide();  
                $('input[name="lampu_atret"]').val('-');  
                $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'

                // Hide Fungsi Hidrolik Moower
                $('#fungsi_hidrolik_moower').hide();
                $('input[name="fungsi_hidrolik_moower"]').val('-');
                $('#fungsi_hidrolik_moower1').prop('checked', true);

                // Hide Fungsi Pisau Moower
                $('#fungsi_pisau_moower').hide();
                $('input[name="fungsi_pisau_moower"]').val('-');
                $('#fungsi_pisau_moower1').prop('checked', true);

                // Hide Gearbox
                $('#gearbox').hide();
                $('input[name="gearbox"]').val('-');
                $('#gearbox1').prop('checked', true);


            $('#pisau_potong').hide();
            $('input[name="pisau_potong"]').val('-');
            $('#pisau_potong1').prop('checked', true);

                $('#fungsi_lampu_penerangan').hide();
                $('input[name="fungsi_lampu_penerangan"]').val('-');
                $('#fungsi_lampu_penerangan1').prop('checked', true);

                $('#v_belt_kompresor').hide();
                $('input[name="v_belt_kompresor"]').val('-');
                $('#v_belt_kompresor1').prop('checked', true);

                // Hide FUNGSI DRAYER
                $('#fungsi_drayer').hide();
                $('input[name="fungsi_drayer"]').val('-');
                $('#fungsi_drayer1').prop('checked', true);

                // Hide FUNGSI AUTO START
                $('#fungsi_auto_start').hide();
                $('input[name="fungsi_auto_start"]').val('-');
                $('#fungsi_auto_start1').prop('checked', true);

            $('#filter_oli_kompresor').hide();
            $('input[name="filter_oli_kompresor"]').val('-');
            $('#filter_oli_kompresor1').prop('checked', true);

                        $('#oli_kompresor').hide();
                        $('input[name="oli_kompresor"]').val('-');
                        $('#oli_kompresor1').prop('checked', true);

                        // Hide BAN KANAN
                        $('#ban_kanan').hide();
                        $('input[name="ban_kanan"]').val('-');
                        $('#ban_kanan1').prop('checked', true);

                        // Hide BAN KIRI
                        $('#ban_kiri').hide();
                        $('input[name="ban_kiri"]').val('-');
                        $('#ban_kiri1').prop('checked', true);

                        // Hide FUNGSI SCREW KOMPRESOR
                        $('#fungsi_screw_kompresor').hide();
                        $('input[name="fungsi_screw_kompresor"]').val('-');
                        $('#fungsi_screw_kompresor1').prop('checked', true);

                        // Hide FUNGSI CUT OFF PRESSURE
                        $('#fungsi_cut_off_pressure').hide();
                        $('input[name="fungsi_cut_off_pressure"]').val('-');
                        $('#fungsi_cut_off_pressure1').prop('checked', true);


                    $('#filter_oli_mesin_bawah').hide();
                    $('input[name="filter_oli_mesin_bawah"]').val('-');
                    $('#filter_oli_mesin_bawah1').prop('checked', true);

                    // Fungsi Gerakan Shourd
                    $('#fungsi_gerakan_shourd').hide();
                    $('input[name="fungsi_gerakan_shourd"]').val('-');
                    $('#fungsi_gerakan_shourd1').prop('checked', true);

                    // Fungsi Putaran Kumparan
                    $('#fungsi_putaran_kumparan').hide();
                    $('input[name="fungsi_putaran_kumparan"]').val('-');
                    $('#fungsi_putaran_kumparan1').prop('checked', true);

                    // Nozzle
                    $('#nozzle').hide();
                    $('input[name="nozzle"]').val('-');
                    $('#nozzle1').prop('checked', true);

                    // Selang Hidrolis
                    $('#selang_hidrolis').hide();
                    $('input[name="selang_hidrolis"]').val('-');
                    $('#selang_hidrolis1').prop('checked', true);

                    // Seal Brush Button
                    $('#seal_brush_button').hide();
                    $('input[name="seal_brush_button"]').val('-');
                    $('#seal_brush_button1').prop('checked', true);

                    // Seal Swifel Shaft
                    $('#seal_swifel_shaft').hide();
                    $('input[name="seal_swifel_shaft"]').val('-');
                    $('#seal_swifel_shaft1').prop('checked', true);

                    // Seal Gasket
                    $('#seal_gasket').hide();
                    $('input[name="seal_gasket"]').val('-');
                    $('#seal_gasket1').prop('checked', true);

                    // Seal Upper
                    $('#seal_upper').hide();
                    $('input[name="seal_upper"]').val('-');
                    $('#seal_upper1').prop('checked', true);

                    // Drit Shield
                    $('#drit_shield').hide();
                    $('input[name="drit_shield"]').val('-');
                    $('#drit_shield1').prop('checked', true);

                            $('#handrem_tangki_air').hide();  
                            $('input[name="handrem_tangki_air"]').val('-');  
                            $('#handrem_tangki_air1').prop('checked', true); 

                            
                            $('#kaca_film').hide();  
                            $('input[name="kaca_film"]').val('-');  
                            $('#kaca_film1').prop('checked', true); 

                            $('#kopling').hide();  
                            $('input[name="kopling"]').val('-');  
                            $('#kopling1').prop('checked', true); 

                            $('#sign_lamp_depan').hide();  
                            $('input[name="sign_lamp_depan"]').val('-');  
                            $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                            $('#sign_lamp_belakang').hide();  
                            $('input[name="sign_lamp_belakang"]').val('-');  
                            $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                            $('#fungsi_wipper').hide();  
                            $('input[name="fungsi_wipper"]').val('-');  
                            $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

                            $('#pompa_uhp').hide();  
                            $('input[name="pompa_uhp"]').val('-');  
                            $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                            $('#pto_kopling_pompa').hide();  
                            $('input[name="pto_kopling_pompa"]').val('-');  
                            $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                            $('#v_belt_pompa_uhp').hide();  
                            $('input[name="v_belt_pompa_uhp"]').val('-');  
                            $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                            $('#kampas_kopling_pompa_uhp').hide();  
                            $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                            $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                            $('#kompresor_pompa_uhp').hide();  
                            $('input[name="kompresor_pompa_uhp"]').val('-');  
                            $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                            $('#vacum_hose_3_inch').hide();  
                            $('input[name="vacum_hose_3_inch"]').val('-');  
                            $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                            $('#vacum_hose_4_inch').hide();  
                            $('input[name="vacum_hose_4_inch"]').val('-');  
                            $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                            $('#vacum_hose_6_inch').hide();  
                            $('input[name="vacum_hose_6_inch"]').val('-');  
                            $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                            $('#hose_40k').hide();  
                            $('input[name="hose_40k"]').val('-');  
                            $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                            $('#filter_cartridge').hide();  
                            $('input[name="filter_cartridge"]').val('-');  
                            $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                            $('#filter_bag_10_micron').hide();  
                            $('input[name="filter_bag_10_micron"]').val('-');  
                            $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                            $('#debris_bag').hide();  
                            $('input[name="debris_bag"]').val('-');  
                            $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                            $('#running_test_40k_engine').hide();  
                            $('input[name="running_test_40k_engine"]').val('-');  
                            $('#running_test_40k_engine1').prop('checked', true); // Centan

                            // Hide Friction Tyre Kanan
                        $('#friction_tyre_kanan').hide();
                        $('input[name="friction_tyre_kanan"]').val('-');
                        $('#friction_tyre_kanan1').prop('checked', true);

                        // Hide Friction Tyre Kiri
                        $('#friction_tyre_kiri').hide();
                        $('input[name="friction_tyre_kiri"]').val('-');
                        $('#friction_tyre_kiri1').prop('checked', true);

                        // Hide Distance Tyre Tengah
                        $('#distance_tyre_tengah').hide();
                        $('input[name="distance_tyre_tengah"]').val('-');
                        $('#distance_tyre_tengah1').prop('checked', true);

                        // Hide Loadcell
                        $('#loadcell').hide();
                        $('input[name="loadcell"]').val('-');
                        $('#loadcell1').prop('checked', true);

                        // Hide Connector Kabel
                        $('#connector_kabel').hide();
                        $('input[name="connector_kabel"]').val('-');
                        $('#connector_kabel1').prop('checked', true);

                        // Hide Fungsi Pompa Air
                        $('#fungsi_pompa_air').hide();
                        $('input[name="fungsi_pompa_air"]').val('-');
                        $('#fungsi_pompa_air1').prop('checked', true);

                        // Hide Kondisi Tangki Air
                        $('#kondisi_tangki_air').hide();
                        $('input[name="kondisi_tangki_air"]').val('-');
                        $('#kondisi_tangki_air1').prop('checked', true);

                        // Hide Laptop
                        $('#laptop').hide();
                        $('input[name="laptop"]').val('-');
                        $('#laptop1').prop('checked', true);

                        // Hide Kalibrasi Jarak
                        $('#kalibrasi_jarak').hide();
                        $('input[name="kalibrasi_jarak"]').val('-');
                        $('#kalibrasi_jarak1').prop('checked', true);

                            $('#apar').hide();  
                            $('input[name="apar"]').val('-');  
                            $('#apar1').prop('checked', true); 

                            $('#reservoir_wiper').hide();  
                            $('input[name="reservoir_wiper"]').val('-');  
                            $('#wiper1').prop('checked', true); 
                            
                            $('#vbelt_engine').hide();  
                            $('input[name="vbelt_engine"]').val('-');  
                            $('#vbelt_engine1').prop('checked', true); 

                            $('#timing_belt').hide();  
                            $('input[name="timing_belt"]').val('-');  
                            $('#timing1').prop('checked', true); 

                            $('#dongkrak').hide();  
                            $('input[name="dongkrak"]').val('-');  
                            $('#dongkrak_Ada').prop('checked', true); 

                            $('#kunci_roda').hide();  
                            $('input[name="kunci_roda"]').val('-');  
                            $('#kunci_roda_Ada').prop('checked', true); 



                        $('#microphone').hide();  
                        $('input[name="microphone"]').val('-');  
                        $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#power_window_lock').hide();  
                        $('input[name="power_window_lock"]').val('-');  
                        $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#central_lock').hide();  
                        $('input[name="central_lock"]').val('-');  
                        $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#cabin_lamp').hide();  
                        $('input[name="cabin_lamp"]').val('-');  
                        $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#air_coditioning').hide();  
                        $('input[name="air_coditioning"]').val('-');  
                        $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#folklamp').hide();  
                        $('input[name="folklamp"]').val('-');  
                        $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                        $('#kondisi_karet_wiper').hide();  
                        $('input[name="kondisi_karet_wiper"]').val('-');  
                        $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik'                 



                            $('#filter_air_drayer').hide();  
                            $('input[name="filter_air_drayer"]').val('-');  
                            $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'

                            $('#airdrayer').hide();  
                            $('input[name="airdrayer"]').val('-');  
                            $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

                            $('#pneumatic_system').hide();  
                            $('input[name="pneumatic_system"]').val('-');  
                            $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

                            $('#kompresor').hide();  
                            $('input[name="kompresor"]').val('-');  
                            $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

                            $('#lampu_kompartement').hide();  
                            $('input[name="lampu_kompartement"]').val('-');  
                            $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

                            $('#lampu_body').hide();  
                            $('input[name="lampu_body"]').val('-');  
                            $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

                            $('#ban_tengah_kanan').hide();  
                            $('input[name="ban_tengah_kanan"]').val('-');  
                            $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

                            $('#ban_tengah_kiri').hide();  
                            $('input[name="ban_tengah_kiri"]').val('-');  
                            $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

                            $('#pompa_fire_fighting').hide();  
                            $('input[name="pompa_fire_fighting"]').val('-');  
                            $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

                            $('#primming_pump').hide();  
                            $('input[name="primming_pump"]').val('-');  
                            $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

                            $('#roof_turret').hide();  
                            $('input[name="roof_turret"]').val('-');  
                            $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

                            $('#bumper_turret').hide();  
                            $('input[name="bumper_turret"]').val('-');  
                            $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_depan').hide();  
                            $('input[name="undertrack_spray_depan"]').val('-');  
                            $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_kanan').hide();  
                            $('input[name="undertrack_spray_kanan"]').val('-');  
                            $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

                            $('#undertrack_spray_kiri').hide();  
                            $('input[name="undertrack_spray_kiri"]').val('-');  
                            $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

                            $('#foam_proportioner').hide();  
                            $('input[name="foam_proportioner"]').val('-');  
                            $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

                            $('#tangki_air').hide();  
                            $('input[name="tangki_air"]').val('-');  
                            $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

                            $('#tangki_foam').hide();  
                            $('input[name="tangki_foam"]').val('-');  
                            $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

                            $('#pengisian_air_eksternal').hide();  
                            $('input[name="pengisian_air_eksternal"]').val('-');  
                            $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                            $('#charger_baterai_eksternal').hide();  
                            $('input[name="charger_baterai_eksternal"]').val('-');  
                            $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                            $('#top_speeds').hide();  
                            $('input[name="top_speed"]').val('0');  
                            $('#top_speed').removeAttr('required');  // Hilangkan required

                            $('#stop_distances').hide();  
                            $('input[name="stop_distance"]').val('0');
                            $('#stop_distance').removeAttr('required');  // Hilangkan required

                            $('#accelerations').hide();  
                            $('input[name="acceleration"]').val('0'); 
                            $('#acceleration').removeAttr('required');  // Hilangkan required

                            $('#discharge_ranges').hide();  
                            $('input[name="discharge_range"]').val('0');   
                            $('#discharge_range').removeAttr('required');  // Hilangkan required

                            $('#discharge_rates').hide();  
                            $('input[name="discharge_rate"]').val('0'); 
                            $('#discharge_rate').removeAttr('required');  // Hilangkan required

                    // Hide OLI MESIN BAWAH
                    $('#oli_mesin_bawah').hide();
                    $('input[name="oli_mesin_bawah"]').val('-');
                    $('#oli_mesin_bawah1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN BAWAH
                    $('#air_radiator_mesin_bawah').hide();
                    $('input[name="air_radiator_mesin_bawah"]').val('-');
                    $('#air_radiator_mesin_bawah1').prop('checked', true);


                    // Hide FILTER BAHAN BAKAR MESIN BAWAH
                    $('#filter_bahan_bakar_mesin_bawah').hide();
                    $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                    $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);


                    // Hide OLI MESIN ATAS
                    $('#oli_mesin_atas').hide();
                    $('input[name="oli_mesin_atas"]').val('-');
                    $('#oli_mesin_atas1').prop('checked', true);

                    // Hide AIR RADIATOR MESIN ATAS
                    $('#air_radiator_mesin_atas').hide();
                    $('input[name="air_radiator_mesin_atas"]').val('-');
                    $('#air_radiator_mesin_atas1').prop('checked', true);

                    // Hide FILTER OLI MESIN ATAS
                    $('#filter_oli_mesin_atas').hide();
                    $('input[name="filter_oli_mesin_atas"]').val('-');
                    $('#filter_oli_mesin_atas1').prop('checked', true);

                    // Hide FILTER BAHAN BAKAR MESIN ATAS
                    $('#filter_bahan_bakar_mesin_atas').hide();
                    $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                    $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                    // Hide FILTER UDARA MESIN ATAS
                    $('#filter_udara_mesin_atas').hide();
                    $('input[name="filter_udara_mesin_atas"]').val('-');
                    $('#filter_udara_mesin_atas1').prop('checked', true);

                    // Hide STARTER ENGINE MESIN ATAS
                    $('#starter_engine_mesin_atas').hide();
                    $('input[name="starter_engine_mesin_atas"]').val('-');
                    $('#starter_engine_mesin_atas1').prop('checked', true);

                    // Hide KONDISI ENGINE MESIN ATAS
                    $('#kondisi_engine_mesin_atas').hide();
                    $('input[name="kondisi_engine_mesin_atas"]').val('-');
                    $('#kondisi_engine_mesin_atas1').prop('checked', true);

                    // Hide TURBO MESIN ATAS
                    $('#turbo_mesin_atas').hide();
                    $('input[name="turbo_mesin_atas"]').val('-');
                    $('#turbo_mesin_atas1').prop('checked', true);

                    // Hide COOLING SYSTEM MESIN ATAS
                    $('#cooling_system_mesin_atas').hide();
                    $('input[name="cooling_system_mesin_atas"]').val('-');
                    $('#cooling_system_mesin_atas1').prop('checked', true);

                    // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                    $('#gas_accelerator_pedal_mesin_atas').hide();
                    $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                    $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                    // Hide FUNGSI HISAPAN VACUM
                    $('#fungsi_hisapan_vacum').hide();
                    $('input[name="fungsi_hisapan_vacum"]').val('-');
                    $('#fungsi_hisapan_vacum1').prop('checked', true);

                    // Hide FUNGSI GERAKAN VACUM
                    $('#fungsi_gerakan_vacum').hide();
                    $('input[name="fungsi_gerakan_vacum"]').val('-');
                    $('#fungsi_gerakan_vacum1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KANAN
                    $('#fungsi_putaran_sapu_kanan').hide();
                    $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                    $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU KIRI
                    $('#fungsi_putaran_sapu_kiri').hide();
                    $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                    $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI PUTARAN SAPU TENGAH
                    $('#fungsi_putaran_sapu_tengah').hide();
                    $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                    $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KANAN
                    $('#fungsi_gerakan_sapu_kanan').hide();
                    $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                    $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU KIRI
                    $('#fungsi_gerakan_sapu_kiri').hide();
                    $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                    $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                    // Hide FUNGSI GERAKAN SAPU TENGAH
                    $('#fungsi_gerakan_sapu_tengah').hide();
                    $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                    $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR DEPAN
                    $('#fungsi_spray_bar_depan').hide();
                    $('input[name="fungsi_spray_bar_depan"]').val('-');
                    $('#fungsi_spray_bar_depan1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KIRI
                    $('#fungsi_spray_bar_kiri').hide();
                    $('input[name="fungsi_spray_bar_kiri"]').val('-');
                    $('#fungsi_spray_bar_kiri1').prop('checked', true);

                    // Hide FUNGSI SPRAY BAR KANAN
                    $('#fungsi_spray_bar_kanan').hide();
                    $('input[name="fungsi_spray_bar_kanan"]').val('-');
                    $('#fungsi_spray_bar_kanan1').prop('checked', true);

                    // Hide FUNGSI JET SPRAY GUN
                    $('#fungsi_jet_spray_gun').hide();
                    $('input[name="fungsi_jet_spray_gun"]').val('-');
                    $('#fungsi_jet_spray_gun1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS HOOPER
                    $('#fungsi_hidrolis_hooper').hide();
                    $('input[name="fungsi_hidrolis_hooper"]').val('-');
                    $('#fungsi_hidrolis_hooper1').prop('checked', true);

                    // Hide FUNGSI HIDROLIS TUTUP HOOPER
                    $('#fungsi_hidrolis_tutup_hooper').hide();
                    $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                    $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                    // Hide FUNGSI MONITOR CONTROL
                    $('#fungsi_monitor_control').hide();
                    $('input[name="fungsi_monitor_control"]').val('-');
                    $('#fungsi_monitor_control1').prop('checked', true);

                    // Hide FUNGSI PENDANT
                    $('#fungsi_pendant').hide();
                    $('input[name="fungsi_pendant"]').val('-');
                    $('#fungsi_pendant1').prop('checked', true);


        } else if (vehicleType === 'Vibro Roller'){

                        $('#air_radiator_mesin').hide();
                        $('input[name="air_radiator_mesin"]').val('-');
                        $('#air_radiator_mesin1').prop('checked', true);


                        $('#lampu_sorot').hide();  
                        $('input[name="lampu_sorot"]').val('-');  
                        $('#lampu_sorot1').prop('checked', true);  // Centang radio 'Baik'

                        $('#sistem_pendingin').hide();  
                    $('input[name="sistem_pendingin"]').val('-');  
                    $('#sistem_pendingin1').prop('checked', true); 

                        $('#stoplamp').hide();  
                        $('input[name="stoplamp"]').val('-');  
                        $('#stoplamp1').prop('checked', true);  // Centang radio 'Baik'

                    $('#v_belt_power_steering').hide();  
                    $('input[name="v_belt_power_steering"]').val('-');  
                    $('#v_belt_power_steering1').prop('checked', true); 
            
                    $('#v_belt_ac').hide();  
                    $('input[name="v_belt_ac"]').val('-');  
                    $('#v_belt_ac1').prop('checked', true); 

                $('#minyak_rem').hide();  
                $('input[name="minyak_rem"]').val('-');  
                $('#minyak_rem1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                $('#minyak_power_steering').hide();  
                $('input[name="minyak_power_steering"]').val('-');  
                $('#minyak_power_steering1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                    $('#oli_gardan').hide();  
                    $('input[name="oli_gardan"]').val('-');  
                    $('#oli_gardan1').prop('checked', true);  // Centang radio 'Tidak Baik'

                    $('#filter_udara_mesin_bawah').hide();
                    $('input[name="filter_udara_mesin_bawah"]').val('-');
                    $('#filter_udara_mesin_bawah1').prop('checked', true);

                    $('#kaki_kaki').hide();  
                    $('input[name="kaki_kaki"]').val('-');  
                    $('#kaki_kaki1').prop('checked', true);

                    $('#retting_depan').hide();  
                    $('input[name="retting_depan"]').val('-');  
                    $('#retting_depan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#retting_belakang').hide();  
                    $('input[name="retting_belakang"]').val('-');  
                    $('#retting_belakang1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                    $('#lampu_atret').hide();  
                    $('input[name="lampu_atret"]').val('-');  
                    $('#lampu_atret1').prop('checked', true);  // Centang radio 'Baik'

                    $('#ban_belakang_kanan').hide();  
                    $('input[name="ban_belakang_kanan"]').val('-');  
                    $('#ban_belakang_kanan1').prop('checked', true);  

                    $('#ban_belakang_kiri').hide();  
                    $('input[name="ban_belakang_kiri"]').val('-');  
                    $('#ban_belakang_kiri1').prop('checked', true);

                    // Hide Fungsi Hidrolik Moower
                    $('#fungsi_hidrolik_moower').hide();
                    $('input[name="fungsi_hidrolik_moower"]').val('-');
                    $('#fungsi_hidrolik_moower1').prop('checked', true);

                    // Hide Fungsi Pisau Moower
                    $('#fungsi_pisau_moower').hide();
                    $('input[name="fungsi_pisau_moower"]').val('-');
                    $('#fungsi_pisau_moower1').prop('checked', true);

                    // Hide Fungsi Pompa Hidrolic
                    $('#fungsi_pompa_hidrolic').hide();
                    $('input[name="fungsi_pompa_hidrolic"]').val('-');
                    $('#fungsi_pompa_hidrolic1').prop('checked', true);

                    // Hide Gearbox
                    $('#gearbox').hide();
                    $('input[name="gearbox"]').val('-');
                    $('#gearbox1').prop('checked', true);


                    $('#pisau_potong').hide();
                    $('input[name="pisau_potong"]').val('-');
                    $('#pisau_potong1').prop('checked', true);

                    $('#fungsi_lampu_penerangan').hide();
                    $('input[name="fungsi_lampu_penerangan"]').val('-');
                    $('#fungsi_lampu_penerangan1').prop('checked', true);

                    $('#v_belt_kompresor').hide();
                    $('input[name="v_belt_kompresor"]').val('-');
                    $('#v_belt_kompresor1').prop('checked', true);

                    // Hide FUNGSI DRAYER
                    $('#fungsi_drayer').hide();
                    $('input[name="fungsi_drayer"]').val('-');
                    $('#fungsi_drayer1').prop('checked', true);

                    // Hide FUNGSI AUTO START
                    $('#fungsi_auto_start').hide();
                    $('input[name="fungsi_auto_start"]').val('-');
                    $('#fungsi_auto_start1').prop('checked', true);

                    $('#filter_oli_kompresor').hide();
                    $('input[name="filter_oli_kompresor"]').val('-');
                    $('#filter_oli_kompresor1').prop('checked', true);

                            $('#oli_kompresor').hide();
                            $('input[name="oli_kompresor"]').val('-');
                            $('#oli_kompresor1').prop('checked', true);

                            // Hide BAN KANAN
                            $('#ban_kanan').hide();
                            $('input[name="ban_kanan"]').val('-');
                            $('#ban_kanan1').prop('checked', true);

                            // Hide BAN KIRI
                            $('#ban_kiri').hide();
                            $('input[name="ban_kiri"]').val('-');
                            $('#ban_kiri1').prop('checked', true);

                            // Hide FUNGSI SCREW KOMPRESOR
                            $('#fungsi_screw_kompresor').hide();
                            $('input[name="fungsi_screw_kompresor"]').val('-');
                            $('#fungsi_screw_kompresor1').prop('checked', true);

                            // Hide FUNGSI CUT OFF PRESSURE
                            $('#fungsi_cut_off_pressure').hide();
                            $('input[name="fungsi_cut_off_pressure"]').val('-');
                            $('#fungsi_cut_off_pressure1').prop('checked', true);


                        $('#filter_oli_mesin_bawah').hide();
                        $('input[name="filter_oli_mesin_bawah"]').val('-');
                        $('#filter_oli_mesin_bawah1').prop('checked', true);

                        // Fungsi Gerakan Shourd
                        $('#fungsi_gerakan_shourd').hide();
                        $('input[name="fungsi_gerakan_shourd"]').val('-');
                        $('#fungsi_gerakan_shourd1').prop('checked', true);

                        // Fungsi Putaran Kumparan
                        $('#fungsi_putaran_kumparan').hide();
                        $('input[name="fungsi_putaran_kumparan"]').val('-');
                        $('#fungsi_putaran_kumparan1').prop('checked', true);

                        // Nozzle
                        $('#nozzle').hide();
                        $('input[name="nozzle"]').val('-');
                        $('#nozzle1').prop('checked', true);

                        // Selang Hidrolis
                        $('#selang_hidrolis').hide();
                        $('input[name="selang_hidrolis"]').val('-');
                        $('#selang_hidrolis1').prop('checked', true);

                        // Seal Brush Button
                        $('#seal_brush_button').hide();
                        $('input[name="seal_brush_button"]').val('-');
                        $('#seal_brush_button1').prop('checked', true);

                        // Seal Swifel Shaft
                        $('#seal_swifel_shaft').hide();
                        $('input[name="seal_swifel_shaft"]').val('-');
                        $('#seal_swifel_shaft1').prop('checked', true);

                        // Seal Gasket
                        $('#seal_gasket').hide();
                        $('input[name="seal_gasket"]').val('-');
                        $('#seal_gasket1').prop('checked', true);

                        // Seal Upper
                        $('#seal_upper').hide();
                        $('input[name="seal_upper"]').val('-');
                        $('#seal_upper1').prop('checked', true);

                        // Drit Shield
                        $('#drit_shield').hide();
                        $('input[name="drit_shield"]').val('-');
                        $('#drit_shield1').prop('checked', true);

                                $('#handrem_tangki_air').hide();  
                                $('input[name="handrem_tangki_air"]').val('-');  
                                $('#handrem_tangki_air1').prop('checked', true); 

                                
                                $('#kaca_film').hide();  
                                $('input[name="kaca_film"]').val('-');  
                                $('#kaca_film1').prop('checked', true); 

                                $('#kopling').hide();  
                                $('input[name="kopling"]').val('-');  
                                $('#kopling1').prop('checked', true); 

                                $('#sign_lamp_depan').hide();  
                                $('input[name="sign_lamp_depan"]').val('-');  
                                $('#sign_lamp_depan1').prop('checked', true);  // Centang radio 'Baik'

                                $('#sign_lamp_belakang').hide();  
                                $('input[name="sign_lamp_belakang"]').val('-');  
                                $('#sign_lamp_belakang1').prop('checked', true);  // Centang radio 'Baik'

                                $('#fungsi_wipper').hide();  
                                $('input[name="fungsi_wipper"]').val('-');  
                                $('#fungsi_wipper1').prop('checked', true);  // Centang radio 'Baik'

                                $('#pompa_uhp').hide();  
                                $('input[name="pompa_uhp"]').val('-');  
                                $('#pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                                $('#pto_kopling_pompa').hide();  
                                $('input[name="pto_kopling_pompa"]').val('-');  
                                $('#pto_kopling_pompa1').prop('checked', true); // Centang radio 'Normal' untuk PTO Kopling Pompa

                                $('#v_belt_pompa_uhp').hide();  
                                $('input[name="v_belt_pompa_uhp"]').val('-');  
                                $('#v_belt_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk V-Belt Pompa UHP

                                $('#kampas_kopling_pompa_uhp').hide();  
                                $('input[name="kampas_kopling_pompa_uhp"]').val('-');  
                                $('#kampas_kopling_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kampas Kopling Pompa UHP

                                $('#kompresor_pompa_uhp').hide();  
                                $('input[name="kompresor_pompa_uhp"]').val('-');  
                                $('#kompresor_pompa_uhp1').prop('checked', true); // Centang radio 'Normal' untuk Kompresor Pompa UHP

                                $('#vacum_hose_3_inch').hide();  
                                $('input[name="vacum_hose_3_inch"]').val('-');  
                                $('#vacum_hose_3_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 3 Inch

                                $('#vacum_hose_4_inch').hide();  
                                $('input[name="vacum_hose_4_inch"]').val('-');  
                                $('#vacum_hose_4_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 4 Inch

                                $('#vacum_hose_6_inch').hide();  
                                $('input[name="vacum_hose_6_inch"]').val('-');  
                                $('#vacum_hose_6_inch1').prop('checked', true); // Centang radio 'Normal' untuk Vacuum Hose 6 Inch

                                $('#hose_40k').hide();  
                                $('input[name="hose_40k"]').val('-');  
                                $('#hose_40k1').prop('checked', true); // Centang radio 'Normal' untuk Hose 40K

                                $('#filter_cartridge').hide();  
                                $('input[name="filter_cartridge"]').val('-');  
                                $('#filter_cartridge1').prop('checked', true); // Centang radio 'Normal' untuk Filter Cartridge

                                $('#filter_bag_10_micron').hide();  
                                $('input[name="filter_bag_10_micron"]').val('-');  
                                $('#filter_bag_10_micron1').prop('checked', true); // Centang radio 'Normal' untuk Filter Bag 10 Micron

                                $('#debris_bag').hide();  
                                $('input[name="debris_bag"]').val('-');  
                                $('#debris_bag1').prop('checked', true); // Centang radio 'Baik' untuk Debris Bag

                                $('#running_test_40k_engine').hide();  
                                $('input[name="running_test_40k_engine"]').val('-');  
                                $('#running_test_40k_engine1').prop('checked', true); // Centan

                                // Hide Friction Tyre Kanan
                            $('#friction_tyre_kanan').hide();
                            $('input[name="friction_tyre_kanan"]').val('-');
                            $('#friction_tyre_kanan1').prop('checked', true);

                            // Hide Friction Tyre Kiri
                            $('#friction_tyre_kiri').hide();
                            $('input[name="friction_tyre_kiri"]').val('-');
                            $('#friction_tyre_kiri1').prop('checked', true);

                            // Hide Distance Tyre Tengah
                            $('#distance_tyre_tengah').hide();
                            $('input[name="distance_tyre_tengah"]').val('-');
                            $('#distance_tyre_tengah1').prop('checked', true);

                            // Hide Loadcell
                            $('#loadcell').hide();
                            $('input[name="loadcell"]').val('-');
                            $('#loadcell1').prop('checked', true);

                            // Hide Connector Kabel
                            $('#connector_kabel').hide();
                            $('input[name="connector_kabel"]').val('-');
                            $('#connector_kabel1').prop('checked', true);

                            // Hide Fungsi Pompa Air
                            $('#fungsi_pompa_air').hide();
                            $('input[name="fungsi_pompa_air"]').val('-');
                            $('#fungsi_pompa_air1').prop('checked', true);

                            // Hide Kondisi Tangki Air
                            $('#kondisi_tangki_air').hide();
                            $('input[name="kondisi_tangki_air"]').val('-');
                            $('#kondisi_tangki_air1').prop('checked', true);

                            // Hide Laptop
                            $('#laptop').hide();
                            $('input[name="laptop"]').val('-');
                            $('#laptop1').prop('checked', true);

                            // Hide Kalibrasi Jarak
                            $('#kalibrasi_jarak').hide();
                            $('input[name="kalibrasi_jarak"]').val('-');
                            $('#kalibrasi_jarak1').prop('checked', true);

                                $('#apar').hide();  
                                $('input[name="apar"]').val('-');  
                                $('#apar1').prop('checked', true); 

                                $('#reservoir_wiper').hide();  
                                $('input[name="reservoir_wiper"]').val('-');  
                                $('#wiper1').prop('checked', true); 
                                
                                $('#vbelt_engine').hide();  
                                $('input[name="vbelt_engine"]').val('-');  
                                $('#vbelt_engine1').prop('checked', true); 

                                $('#timing_belt').hide();  
                                $('input[name="timing_belt"]').val('-');  
                                $('#timing1').prop('checked', true); 

                                $('#dongkrak').hide();  
                                $('input[name="dongkrak"]').val('-');  
                                $('#dongkrak_Ada').prop('checked', true); 

                                $('#kunci_roda').hide();  
                                $('input[name="kunci_roda"]').val('-');  
                                $('#kunci_roda_Ada').prop('checked', true); 



                            $('#microphone').hide();  
                            $('input[name="microphone"]').val('-');  
                            $('#microphone1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#power_window_lock').hide();  
                            $('input[name="power_window_lock"]').val('-');  
                            $('#power_window_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#central_lock').hide();  
                            $('input[name="central_lock"]').val('-');  
                            $('#central_lock1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#cabin_lamp').hide();  
                            $('input[name="cabin_lamp"]').val('-');  
                            $('#cabin_lamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#air_coditioning').hide();  
                            $('input[name="air_coditioning"]').val('-');  
                            $('#air_coditioning1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#folklamp').hide();  
                            $('input[name="folklamp"]').val('-');  
                            $('#folklamp1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'

                            $('#kondisi_karet_wiper').hide();  
                            $('input[name="kondisi_karet_wiper"]').val('-');  
                            $('#kondisi_karet_wiper1').prop('checked', true);  // Centang radio 'Baik'                 



                                $('#filter_air_drayer').hide();  
                                $('input[name="filter_air_drayer"]').val('-');  
                                $('#filter_air_drayer1').prop('checked', true);  // Centang radio 'Baik'

                                $('#airdrayer').hide();  
                                $('input[name="airdrayer"]').val('-');  
                                $('#airdrayer1').prop('checked', true);  // Centang radio 'Normal'

                                $('#pneumatic_system').hide();  
                                $('input[name="pneumatic_system"]').val('-');  
                                $('#pneumatic_system1').prop('checked', true);  // Centang radio 'Normal'

                                $('#kompresor').hide();  
                                $('input[name="kompresor"]').val('-');  
                                $('#kompresor1').prop('checked', true);  // Centang radio 'Normal'

                                $('#lampu_kompartement').hide();  
                                $('input[name="lampu_kompartement"]').val('-');  
                                $('#lampu_kompartement1').prop('checked', true);  // Centang radio 'Normal'

                                $('#lampu_body').hide();  
                                $('input[name="lampu_body"]').val('-');  
                                $('#lampu_body1').prop('checked', true);  // Centang radio 'Normal'

                                $('#ban_tengah_kanan').hide();  
                                $('input[name="ban_tengah_kanan"]').val('-');  
                                $('#ban_tengah_kanan1').prop('checked', true);  // Centang radio '0%-20%'

                                $('#ban_tengah_kiri').hide();  
                                $('input[name="ban_tengah_kiri"]').val('-');  
                                $('#ban_tengah_kiri1').prop('checked', true);  // Centang radio '0%-20%'

                                $('#pompa_fire_fighting').hide();  
                                $('input[name="pompa_fire_fighting"]').val('-');  
                                $('#pompa_fire_fighting1').prop('checked', true);  // Centang radio 'Normal'

                                $('#primming_pump').hide();  
                                $('input[name="primming_pump"]').val('-');  
                                $('#primming_pump1').prop('checked', true);  // Centang radio 'Normal'

                                $('#roof_turret').hide();  
                                $('input[name="roof_turret"]').val('-');  
                                $('#roof_turret1').prop('checked', true);  // Centang radio 'Normal'

                                $('#bumper_turret').hide();  
                                $('input[name="bumper_turret"]').val('-');  
                                $('#bumper_turret1').prop('checked', true);  // Centang radio 'Normal'

                                $('#undertrack_spray_depan').hide();  
                                $('input[name="undertrack_spray_depan"]').val('-');  
                                $('#undertrack_spray_depan1').prop('checked', true);  // Centang radio 'Normal'

                                $('#undertrack_spray_kanan').hide();  
                                $('input[name="undertrack_spray_kanan"]').val('-');  
                                $('#undertrack_spray_kanan1').prop('checked', true);  // Centang radio 'Normal'

                                $('#undertrack_spray_kiri').hide();  
                                $('input[name="undertrack_spray_kiri"]').val('-');  
                                $('#undertrack_spray_kiri1').prop('checked', true);  // Centang radio 'Normal'

                                $('#foam_proportioner').hide();  
                                $('input[name="foam_proportioner"]').val('-');  
                                $('#foam_proportioner1').prop('checked', true);  // Centang radio 'Normal'

                                $('#tangki_air').hide();  
                                $('input[name="tangki_air"]').val('-');  
                                $('#tangki_air1').prop('checked', true);  // Centang radio 'Normal'

                                $('#tangki_foam').hide();  
                                $('input[name="tangki_foam"]').val('-');  
                                $('#tangki_foam1').prop('checked', true);  // Centang radio 'Normal'

                                $('#pengisian_air_eksternal').hide();  
                                $('input[name="pengisian_air_eksternal"]').val('-');  
                                $('#pengisian_air_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                                $('#charger_baterai_eksternal').hide();  
                                $('input[name="charger_baterai_eksternal"]').val('-');  
                                $('#charger_baterai_eksternal1').prop('checked', true);  // Centang radio 'Normal'

                                $('#top_speeds').hide();  
                                $('input[name="top_speed"]').val('0');  
                                $('#top_speed').removeAttr('required');  // Hilangkan required

                                $('#stop_distances').hide();  
                                $('input[name="stop_distance"]').val('0');
                                $('#stop_distance').removeAttr('required');  // Hilangkan required

                                $('#accelerations').hide();  
                                $('input[name="acceleration"]').val('0'); 
                                $('#acceleration').removeAttr('required');  // Hilangkan required

                                $('#discharge_ranges').hide();  
                                $('input[name="discharge_range"]').val('0');   
                                $('#discharge_range').removeAttr('required');  // Hilangkan required

                                $('#discharge_rates').hide();  
                                $('input[name="discharge_rate"]').val('0'); 
                                $('#discharge_rate').removeAttr('required');  // Hilangkan required

                        // Hide OLI MESIN BAWAH
                        $('#oli_mesin_bawah').hide();
                        $('input[name="oli_mesin_bawah"]').val('-');
                        $('#oli_mesin_bawah1').prop('checked', true);

                        // Hide AIR RADIATOR MESIN BAWAH
                        $('#air_radiator_mesin_bawah').hide();
                        $('input[name="air_radiator_mesin_bawah"]').val('-');
                        $('#air_radiator_mesin_bawah1').prop('checked', true);


                        // Hide FILTER BAHAN BAKAR MESIN BAWAH
                        $('#filter_bahan_bakar_mesin_bawah').hide();
                        $('input[name="filter_bahan_bakar_mesin_bawah"]').val('-');
                        $('#filter_bahan_bakar_mesin_bawah1').prop('checked', true);


                        // Hide OLI MESIN ATAS
                        $('#oli_mesin_atas').hide();
                        $('input[name="oli_mesin_atas"]').val('-');
                        $('#oli_mesin_atas1').prop('checked', true);

                        // Hide AIR RADIATOR MESIN ATAS
                        $('#air_radiator_mesin_atas').hide();
                        $('input[name="air_radiator_mesin_atas"]').val('-');
                        $('#air_radiator_mesin_atas1').prop('checked', true);

                        // Hide FILTER OLI MESIN ATAS
                        $('#filter_oli_mesin_atas').hide();
                        $('input[name="filter_oli_mesin_atas"]').val('-');
                        $('#filter_oli_mesin_atas1').prop('checked', true);

                        // Hide FILTER BAHAN BAKAR MESIN ATAS
                        $('#filter_bahan_bakar_mesin_atas').hide();
                        $('input[name="filter_bahan_bakar_mesin_atas"]').val('-');
                        $('#filter_bahan_bakar_mesin_atas1').prop('checked', true);

                        // Hide FILTER UDARA MESIN ATAS
                        $('#filter_udara_mesin_atas').hide();
                        $('input[name="filter_udara_mesin_atas"]').val('-');
                        $('#filter_udara_mesin_atas1').prop('checked', true);

                        // Hide STARTER ENGINE MESIN ATAS
                        $('#starter_engine_mesin_atas').hide();
                        $('input[name="starter_engine_mesin_atas"]').val('-');
                        $('#starter_engine_mesin_atas1').prop('checked', true);

                        // Hide KONDISI ENGINE MESIN ATAS
                        $('#kondisi_engine_mesin_atas').hide();
                        $('input[name="kondisi_engine_mesin_atas"]').val('-');
                        $('#kondisi_engine_mesin_atas1').prop('checked', true);

                        // Hide TURBO MESIN ATAS
                        $('#turbo_mesin_atas').hide();
                        $('input[name="turbo_mesin_atas"]').val('-');
                        $('#turbo_mesin_atas1').prop('checked', true);

                        // Hide COOLING SYSTEM MESIN ATAS
                        $('#cooling_system_mesin_atas').hide();
                        $('input[name="cooling_system_mesin_atas"]').val('-');
                        $('#cooling_system_mesin_atas1').prop('checked', true);

                        // Hide GAS/ACCELATOR PEDAL MESIN ATAS
                        $('#gas_accelerator_pedal_mesin_atas').hide();
                        $('input[name="gas_accelerator_pedal_mesin_atas"]').val('-');
                        $('#gas_accelerator_pedal_mesin_atas1').prop('checked', true);

                        // Hide FUNGSI HISAPAN VACUM
                        $('#fungsi_hisapan_vacum').hide();
                        $('input[name="fungsi_hisapan_vacum"]').val('-');
                        $('#fungsi_hisapan_vacum1').prop('checked', true);

                        // Hide FUNGSI GERAKAN VACUM
                        $('#fungsi_gerakan_vacum').hide();
                        $('input[name="fungsi_gerakan_vacum"]').val('-');
                        $('#fungsi_gerakan_vacum1').prop('checked', true);

                        // Hide FUNGSI PUTARAN SAPU KANAN
                        $('#fungsi_putaran_sapu_kanan').hide();
                        $('input[name="fungsi_putaran_sapu_kanan"]').val('-');
                        $('#fungsi_putaran_sapu_kanan1').prop('checked', true);

                        // Hide FUNGSI PUTARAN SAPU KIRI
                        $('#fungsi_putaran_sapu_kiri').hide();
                        $('input[name="fungsi_putaran_sapu_kiri"]').val('-');
                        $('#fungsi_putaran_sapu_kiri1').prop('checked', true);

                        // Hide FUNGSI PUTARAN SAPU TENGAH
                        $('#fungsi_putaran_sapu_tengah').hide();
                        $('input[name="fungsi_putaran_sapu_tengah"]').val('-');
                        $('#fungsi_putaran_sapu_tengah1').prop('checked', true);

                        // Hide FUNGSI GERAKAN SAPU KANAN
                        $('#fungsi_gerakan_sapu_kanan').hide();
                        $('input[name="fungsi_gerakan_sapu_kanan"]').val('-');
                        $('#fungsi_gerakan_sapu_kanan1').prop('checked', true);

                        // Hide FUNGSI GERAKAN SAPU KIRI
                        $('#fungsi_gerakan_sapu_kiri').hide();
                        $('input[name="fungsi_gerakan_sapu_kiri"]').val('-');
                        $('#fungsi_gerakan_sapu_kiri1').prop('checked', true);

                        // Hide FUNGSI GERAKAN SAPU TENGAH
                        $('#fungsi_gerakan_sapu_tengah').hide();
                        $('input[name="fungsi_gerakan_sapu_tengah"]').val('-');
                        $('#fungsi_gerakan_sapu_tengah1').prop('checked', true);

                        // Hide FUNGSI SPRAY BAR DEPAN
                        $('#fungsi_spray_bar_depan').hide();
                        $('input[name="fungsi_spray_bar_depan"]').val('-');
                        $('#fungsi_spray_bar_depan1').prop('checked', true);

                        // Hide FUNGSI SPRAY BAR KIRI
                        $('#fungsi_spray_bar_kiri').hide();
                        $('input[name="fungsi_spray_bar_kiri"]').val('-');
                        $('#fungsi_spray_bar_kiri1').prop('checked', true);

                        // Hide FUNGSI SPRAY BAR KANAN
                        $('#fungsi_spray_bar_kanan').hide();
                        $('input[name="fungsi_spray_bar_kanan"]').val('-');
                        $('#fungsi_spray_bar_kanan1').prop('checked', true);

                        // Hide FUNGSI JET SPRAY GUN
                        $('#fungsi_jet_spray_gun').hide();
                        $('input[name="fungsi_jet_spray_gun"]').val('-');
                        $('#fungsi_jet_spray_gun1').prop('checked', true);

                        // Hide FUNGSI HIDROLIS HOOPER
                        $('#fungsi_hidrolis_hooper').hide();
                        $('input[name="fungsi_hidrolis_hooper"]').val('-');
                        $('#fungsi_hidrolis_hooper1').prop('checked', true);

                        // Hide FUNGSI HIDROLIS TUTUP HOOPER
                        $('#fungsi_hidrolis_tutup_hooper').hide();
                        $('input[name="fungsi_hidrolis_tutup_hooper"]').val('-');
                        $('#fungsi_hidrolis_tutup_hooper1').prop('checked', true);

                        // Hide FUNGSI MONITOR CONTROL
                        $('#fungsi_monitor_control').hide();
                        $('input[name="fungsi_monitor_control"]').val('-');
                        $('#fungsi_monitor_control1').prop('checked', true);

                        // Hide FUNGSI PENDANT
                        $('#fungsi_pendant').hide();
                        $('input[name="fungsi_pendant"]').val('-');
                        $('#fungsi_pendant1').prop('checked', true);
                        
                        $('#oli_transmisi').hide();  
                        $('input[name="oli_transmisi"]').val('-');  
                        $('#oli_transmisi1').prop('checked', true); // Centang radio 'Normal' untuk pompa UHP

                        $('#ban_depan_kanan').hide();  
                        $('input[name="ban_depan_kanan"]').val('-');  
                        $('#ban_depan_kanan1').prop('checked', true);  // Centang radio 'Baik'

                        $('#ban_depan_kiri').hide();  
                        $('input[name="ban_depan_kiri"]').val('-');  
                        $('#ban_depan_kiri1').prop('checked', true);  

                        $('#ban_tengah_belakang').hide();
                        $('input[name="ban_tengah_belakang"]').val('-');
                        $('#ban_tengah_belakang1').prop('checked', true);

                        $('#ban_cadangan').hide();  
                        $('input[name="ban_cadangan"]').val('-');  
                        $('#ban_cadangan1').prop('checked', true);  // Centang radio 'Kanan Kiri Normal'Normal'

                        $('#tekanan_angin').hide();  
                        $('input[name="tekanan_angin"]').val('-');  
                        $('#tekanan_angin1').prop('checked', true);  // Centang radio 'Baik'

                        $('#fungsi_hidrolis_sepatu_forklift').hide();  
                        $('input[name="fungsi_hidrolis_sepatu_forklift"]').val('-');  
                        $('#fungsi_hidrolis_sepatu_forklift1').prop('checked', true);

    } 

        
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script>
    const canvas = document.getElementById('signature-pad');
    const ctx = canvas.getContext('2d');
    let drawing = false;

    // Fungsi untuk memulai gambar
    function startDrawing(event) {
        drawing = true;
        draw(event);
    }

    // Fungsi untuk menggambar
    function draw(event) {
        if (!drawing) return;
        
        event.preventDefault();
        const rect = canvas.getBoundingClientRect();
        const offsetX = (event.touches ? event.touches[0].clientX : event.clientX) - rect.left;
        const offsetY = (event.touches ? event.touches[0].clientY : event.clientY) - rect.top;

        ctx.lineTo(offsetX, offsetY);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(offsetX, offsetY);
    }

    // Fungsi untuk menghentikan gambar
    function stopDrawing() {
        drawing = false;
        ctx.beginPath();
    }

    // Event mouse dan touch untuk menggambar pada canvas
    canvas.addEventListener('mousedown', startDrawing);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', stopDrawing);
    canvas.addEventListener('mouseout', stopDrawing);

    // Event touch untuk perangkat mobile
    canvas.addEventListener('touchstart', startDrawing);
    canvas.addEventListener('touchmove', draw);
    canvas.addEventListener('touchend', stopDrawing);
    canvas.addEventListener('touchcancel', stopDrawing);

    // Tombol untuk menghapus tanda tangan
    document.getElementById('clear-signature').addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        document.getElementById('approval').value = ''; // Clear hidden input value
    });

    // Menyimpan tanda tangan sebagai data URL saat form disubmit
    document.getElementById('maintenanceForm').addEventListener('submit', function(event) {
        const signatureData = canvas.toDataURL();
        document.getElementById('approval').value = signatureData;

        // Optional: Check if approval is empty before submitting
        if (!signatureData) {
            event.preventDefault(); // Prevent form submission
            alert('Tanda tangan tidak boleh kosong!');
        }
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('foto_kendaraan_input');
    const photoPreviewContainer = document.getElementById('photoPreviewContainer');
    const hiddenPhotoInputsContainer = document.getElementById('hiddenPhotoInputs');
    const clientErrorDisplay = document.getElementById('foto_kendaraan_client_error');
    let photoIdCounter = 0;

    // --- Parameter untuk kontrol ukuran gambar ---
    const TARGET_SIZE_KB = 30; // Target ukuran file dalam KB
    const TARGET_SIZE_BYTES = TARGET_SIZE_KB * 1024;
    const INITIAL_MAX_WIDTH = 1024; // Lebar maksimum awal sebelum kompresi kualitas agresif
    const INITIAL_MAX_HEIGHT = 1024; // Tinggi maksimum awal
    const MIN_DIMENSION_FOR_RESIZE_LOOP = 300; // Jangan perkecil dimensi jika sudah di bawah ini saat iterasi
    const QUALITY_DECREMENT = 0.05; // Langkah pengurangan kualitas
    const MIN_QUALITY = 0.1; // Kualitas JPEG minimum

    fileInput.addEventListener('change', handleFiles);

    function handleFiles(event) {
        clientErrorDisplay.style.display = 'none';
        clientErrorDisplay.textContent = '';
        const files = Array.from(event.target.files);

        files.forEach(file => {
            if (!file.type.startsWith('image/')) {
                clientErrorDisplay.textContent = `File "${file.name}" bukan format gambar yang didukung.`;
                clientErrorDisplay.style.display = 'block';
                return;
            }
            compressAndDisplayImage(file);
        });

        // Kosongkan nilai input file agar pengguna bisa memilih file yang sama lagi jika dihapus
        event.target.value = null;
    }

    async function compressAndDisplayImage(file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            const img = new Image();
            img.onload = async function() {
                let canvas = document.createElement('canvas');
                let ctx = canvas.getContext('2d');
                let currentWidth = img.width;
                let currentHeight = img.height;

                // 1. Penskalaan Awal (jika gambar sangat besar)
                if (currentWidth > currentHeight) {
                    if (currentWidth > INITIAL_MAX_WIDTH) {
                        currentHeight = Math.round(currentHeight * (INITIAL_MAX_WIDTH / currentWidth));
                        currentWidth = INITIAL_MAX_WIDTH;
                    }
                } else {
                    if (currentHeight > INITIAL_MAX_HEIGHT) {
                        currentWidth = Math.round(currentWidth * (INITIAL_MAX_HEIGHT / currentHeight));
                        currentHeight = INITIAL_MAX_HEIGHT;
                    }
                }

                canvas.width = currentWidth;
                canvas.height = currentHeight;
                ctx.drawImage(img, 0, 0, currentWidth, currentHeight);

                let currentQuality = 0.8; // Mulai dengan kualitas yang cukup baik
                let dataUrl;
                let estimatedSize;

                // console.log(`Memulai kompresi untuk: ${file.name}. Target: ${TARGET_SIZE_KB}KB`);

                // Loop untuk kompresi: turunkan kualitas, jika masih besar & dimensi memungkinkan, perkecil lagi.
                while (true) {
                    dataUrl = canvas.toDataURL('image/jpeg', currentQuality);
                    estimatedSize = estimateDataUrlSize(dataUrl);
                    // console.log(`Dimensi: ${currentWidth}x${currentHeight}, Kualitas: ${currentQuality.toFixed(2)}, Ukuran: ${(estimatedSize / 1024).toFixed(2)}KB`);

                    if (estimatedSize <= TARGET_SIZE_BYTES) {
                        // console.log("Target ukuran tercapai.");
                        break;
                    }

                    if (currentQuality > MIN_QUALITY) {
                        currentQuality -= QUALITY_DECREMENT;
                    } else { // Kualitas sudah minimum
                        if (currentWidth > MIN_DIMENSION_FOR_RESIZE_LOOP && currentHeight > MIN_DIMENSION_FOR_RESIZE_LOOP) {
                            // console.log("Kualitas minimum tercapai, memperkecil dimensi gambar...");
                            currentWidth = Math.round(currentWidth * 0.9); // Perkecil 10%
                            currentHeight = Math.round(currentHeight * 0.9);
                            canvas.width = currentWidth;
                            canvas.height = currentHeight;
                            ctx.drawImage(img, 0, 0, currentWidth, currentHeight); // Gambar ulang dengan dimensi baru
                            currentQuality = 0.7; // Reset kualitas sedikit lebih tinggi setelah resize
                        } else {
                            // console.log("Dimensi sudah terlalu kecil dan kualitas minimum, tidak bisa kompres lebih lanjut.");
                            break; // Tidak bisa kompres lebih jauh
                        }
                    }
                }
                // console.log(`Kompresi selesai. Ukuran akhir: ${(estimatedSize / 1024).toFixed(2)}KB, Kualitas: ${currentQuality.toFixed(2)}`);
                addPhotoToPreview(dataUrl, file.name, estimatedSize);
            };
            img.onerror = function() {
                clientErrorDisplay.textContent = `Gagal memuat file gambar: ${file.name}.`;
                clientErrorDisplay.style.display = 'block';
            }
            img.src = event.target.result;
        };
        reader.onerror = function() {
            clientErrorDisplay.textContent = `Gagal membaca file: ${file.name}.`;
            clientErrorDisplay.style.display = 'block';
        }
        reader.readAsDataURL(file);
    }

    function estimateDataUrlSize(dataUrl) {
        // Perkiraan ukuran: DataURL adalah base64, sekitar 33% lebih besar dari data biner.
        // Header "data:image/jpeg;base64," juga memakan sedikit ruang.
        if (!dataUrl.includes(',')) return 0;
        const base64Data = dataUrl.substring(dataUrl.indexOf(',') + 1);
        const padding = (base64Data.endsWith('==')) ? 2 : (base64Data.endsWith('=')) ? 1 : 0;
        return (base64Data.length * (3 / 4)) - padding;
    }

    function addPhotoToPreview(imageDataUrl, fileName, fileSize) {
        photoIdCounter++;
        const photoId = 'photo_kendaraan_' + photoIdCounter;

        const imgPreview = document.createElement('img');
        imgPreview.src = imageDataUrl;
        imgPreview.style.width = '100px'; // Ukuran pratinjau tetap
        imgPreview.style.height = '100px';
        imgPreview.style.border = '1px solid #ddd';
        imgPreview.style.objectFit = 'cover';
        imgPreview.alt = `Foto ${photoIdCounter} (${(fileSize/1024).toFixed(1)} KB)`;

        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = '✕';
        deleteBtn.setAttribute('aria-label', 'Hapus foto');
        deleteBtn.style.cursor = 'pointer';
        deleteBtn.style.color = 'white';
        deleteBtn.style.backgroundColor = 'rgba(0,0,0,0.6)';
        deleteBtn.style.border = 'none';
        deleteBtn.style.borderRadius = '50%';
        deleteBtn.style.position = 'absolute';
        deleteBtn.style.top = '5px';
        deleteBtn.style.right = '5px';
        deleteBtn.style.padding = '2px 6px';
        deleteBtn.style.fontSize = '12px';
        deleteBtn.style.lineHeight = '1';

        const fileSizeLabel = document.createElement('span');
        fileSizeLabel.textContent = `${(fileSize/1024).toFixed(1)} KB`;
        fileSizeLabel.style.position = 'absolute';
        fileSizeLabel.style.bottom = '5px';
        fileSizeLabel.style.left = '5px';
        fileSizeLabel.style.backgroundColor = 'rgba(0,0,0,0.6)';
        fileSizeLabel.style.color = 'white';
        fileSizeLabel.style.padding = '2px 4px';
        fileSizeLabel.style.fontSize = '10px';
        fileSizeLabel.style.borderRadius = '3px';

        const photoWrapper = document.createElement('div');
        photoWrapper.id = `wrapper_${photoId}`;
        photoWrapper.style.position = 'relative';
        photoWrapper.style.display = 'inline-block';
        photoWrapper.style.margin = '5px'; // Atau gunakan gap dari flex container
        photoWrapper.appendChild(imgPreview);
        photoWrapper.appendChild(deleteBtn);
        photoWrapper.appendChild(fileSizeLabel);

        photoPreviewContainer.appendChild(photoWrapper);

        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'foto_kendaraan[]'; // Nama array agar Laravel/PHP menerimanya sebagai array
        hiddenInput.value = imageDataUrl;
        hiddenInput.id = photoId;
        hiddenPhotoInputsContainer.appendChild(hiddenInput);

        deleteBtn.onclick = function() {
            photoPreviewContainer.removeChild(photoWrapper);
            hiddenPhotoInputsContainer.removeChild(hiddenInput);
        };
    }
});
</script>

@endsection
