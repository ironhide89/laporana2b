@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Checklist Harian</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title mb-0 font-weight" style="font-size: 1.5rem;">Laporan Checklist Harian</h3>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="laporanTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>Nama Peralatan</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Nomor Polisi</th>
                                        <th>User Peralatan</th>
                                        <th>Tanggal Pengecekan</th>
                                        <th>PIC</th>
                                        <th>V Aki</th>
                                        <th>Odometer</th>
                                        <th>Oli Selanjutnya</th>
                                        <th>Oli Kurang</th>
                                        <th>Oli Lebih</th>
                                        <th>Body Kendaraan</th>
                                        <th>Kebersihan Kendaraan</th>
                                        <th>Cek Air Accu</th>
                                        <th>Oli Mesin</th>
                                        <th>Oli Transmisi</th>
                                        <th>Minyak Power Steering</th>
                                        <th>Minyak Rem</th>
                                        <th>V-Belt Engine</th>
                                        <th>Filter Udara</th>
                                        <th>Filter Bahan Bakar</th>
                                        <th>Filter Oli</th>
                                        <th>Air Radiator Reservoir</th>
                                        <th>Reservoir Wiper</th>
                                        <th>Kaca Film</th>
                                        <th>APAR</th>
                                        <th>Starter Engine</th>
                                        <th>Kondisi Engine</th>
                                        <th>Kondisi Turbo</th>
                                        <th>Sistem Pendingin</th>
                                        <th>Timing Belt</th>
                                        <th>Transmisi</th>
                                        <th>Pedal Gas</th>
                                        <th>Rem Kaki</th>
                                        <th>Rem Tangan</th>
                                        <th>Kopling</th>
                                        <th>Power Steering</th>
                                        <th>Kaki-Kaki</th>
                                        <th>Kondisi Karet Wiper</th>
                                        <th>Headlamp Dekat</th>
                                        <th>Headlamp Jauh</th>
                                        <th>Reversing Lamp</th>
                                        <th>Sign Lamp Depan</th>
                                        <th>Sign Lamp Belakang</th>
                                        <th>Stoplamp</th>
                                        <th>Lampu Atret</th>
                                        <th>Rotary Lamp</th>
                                        <th>Lampu Sorot</th>
                                        <th>Air Conditioning</th>
                                        <th>Jok Kendaraan</th>
                                        <th>Indikator Dashboard</th>
                                        <th>Cabin Lamp</th>
                                        <th>Klakson</th>
                                        <th>Fungsi Wiper</th>
                                        <th>Central Lock</th>
                                        <th>Power Window Lock</th>
                                        <th>Microphone</th>
                                        <th>Ban Depan Kanan</th>
                                        <th>Ban Depan Kiri</th>
                                        <th>Ban Belakang Kanan</th>
                                        <th>Ban Belakang Kiri</th>
                                        <th>Ban Cadangan</th>
                                        <th>Tekanan Angin</th>
                                        <th>Dongkrak</th>
                                        <th>Kunci Roda</th>
                                        <th>Kesimpulan Kendaraan</th>
                                        <th>Catatan</th>
                                        <th>Foto Kendaraan</th>
                                        <th>Tanda Tangan Teknisi</th>
                                        <th>Oli Gardan</th>
                                        <th>Oli Hidrolis</th>
                                        <th>Filter Air Dryer</th>
                                        <th>Filter Water Separator</th>
                                        <th>Filter Transmisi</th>
                                        <th>Filter Hidrolis</th>
                                        <th>Cooling System</th>
                                        <th>Air Dryer</th>
                                        <th>Pneumatic System</th>
                                        <th>Hydraulic System</th>
                                        <th>Electrical System</th>
                                        <th>Kompresor</th>
                                        <th>Fog Lamp</th>
                                        <th>Reting Depan</th>
                                        <th>Reting Belakang</th>
                                        <th>Lampu Kompartement</th>
                                        <th>Lampu Body</th>
                                        <th>Ban Tengah Kanan</th>
                                        <th>Ban Tengah Kiri</th>
                                        <th>Pompa Fire Fighting</th>
                                        <th>Priming Pump</th>
                                        <th>Roof Turret</th>
                                        <th>Bumper Turret</th>
                                        <th>Undertrack Spray Depan</th>
                                        <th>Undertrack Spray Kanan</th>
                                        <th>Undertrack Spray Kiri</th>
                                        <th>Foam Proportioner</th>
                                        <th>Tangki Air</th>
                                        <th>Tangki Foam</th>
                                        <th>Pengisian Air Eksternal</th>
                                        <th>Charger Baterai Eksternal</th>
                                        <th>Top Speed</th>
                                        <th>Stop Distance</th>
                                        <th>Acceleration</th>
                                        <th>Discharge Range</th>
                                        <th>Discharge Rate</th>
                                        <th>Oli Mesin Atas</th>
                                        <th>Air Radiator Mesin Atas</th>
                                        <th>Filter Oli Mesin Atas</th>
                                        <th>Filter Bahan Bakar Mesin Atas</th>
                                        <th>Filter Udara Mesin Atas</th>
                                        <th>Starter Engine Mesin Atas</th>
                                        <th>Kondisi Engine Mesin Atas</th>
                                        <th>Turbo Mesin Atas</th>
                                        <th>Cooling System Mesin Atas</th>
                                        <th>Gas Accelerator Pedal Mesin Atas</th>
                                        <th>Pompa Hidrolis</th>
                                        <th>Fungsi Hisapan Vacuum</th>
                                        <th>Fungsi Gerakan Vacuum</th>
                                        <th>Fungsi Putaran Sapu Kanan</th>
                                        <th>Fungsi Putaran Sapu Kiri</th>
                                        <th>Fungsi Putaran Sapu Tengah</th>
                                        <th>Fungsi Gerakan Sapu Kanan</th>
                                        <th>Fungsi Gerakan Sapu Kiri</th>
                                        <th>Fungsi Gerakan Sapu Tengah</th>
                                        <th>Fungsi Spray Bar Depan</th>
                                        <th>Fungsi Spray Bar Kiri</th>
                                        <th>Fungsi Spray Bar Kanan</th>
                                        <th>Fungsi Jet Spray Gun</th>
                                        <th>Fungsi Hidrolis Hooper</th>
                                        <th>Fungsi Hidrolis Tutup Hooper</th>
                                        <th>Fungsi Monitor Control</th>
                                        <th>Fungsi Pendant</th>
                                        <th>Oli Mesin Bawah</th>
                                        <th>Air Radiator Mesin Bawah</th>
                                        <th>Filter Oli Mesin Bawah</th>
                                        <th>Filter Bahan Bakar Mesin Bawah</th>
                                        <th>Filter Udara Mesin Bawah</th>
                                        <th>Pompa UHP</th>
                                        <th>PTO Kopling Pompa</th>
                                        <th>V-Belt Pompa UHP</th>
                                        <th>Kampas Kopling Pompa UHP</th>
                                        <th>Kompresor Pompa UHP</th>
                                        <th>Vacuum Hose 3 Inch</th>
                                        <th>Vacuum Hose 4 Inch</th>
                                        <th>Vacuum Hose 6 Inch</th>
                                        <th>Hose 40K</th>
                                        <th>Filter Cartridge</th>
                                        <th>Filter Bag 10 Micron</th>
                                        <th>Debris Bag</th>
                                        <th>Running Test 40K Engine</th>
                                        <th>Air Radiator Mesin</th>
                                        <th>Ban Tengah Belakang</th>
                                        <th>Handrem Tangki Air</th>
                                        <th>Friction Tyre Kanan</th>
                                        <th>Friction Tyre Kiri</th>
                                        <th>Distance Tyre Tengah</th>
                                        <th>Loadcell</th>
                                        <th>Connector Kabel</th>
                                        <th>Fungsi Pompa Air</th>
                                        <th>Kondisi Tangki Air</th>
                                        <th>Laptop</th>
                                        <th>Kalibrasi Jarak</th>
                                        <th>Fungsi Gerakan Shourd</th>
                                        <th>Fungsi Putaran Kumparan</th>
                                        <th>Nozzle</th>
                                        <th>Selang Hidrolis</th>
                                        <th>Seal Brush Button</th>
                                        <th>Seal Swifel Shaft</th>
                                        <th>Seal Gasket</th>
                                        <th>Seal Upper</th>
                                        <th>Dirts Shield</th>
                                        <th>Fungsi Hidrolik Moower</th>
                                        <th>Fungsi Pisau Moower</th>
                                        <th>Fungsi Pompa Hidrolik</th>
                                        <th>Gearbox</th>
                                        <th>Oli Kompresor</th>
                                        <th>Ban Kanan</th>
                                        <th>Ban Kiri</th>
                                        <th>Fungsi Screw Kompresor</th>
                                        <th>Fungsi Cut Off Pressure</th>
                                        <th>Filter Oli Kompresor</th>
                                        <th>V-Belt Kompresor</th>
                                        <th>Fungsi Dryer</th>
                                        <th>Fungsi Auto Start</th>
                                        <th>Fungsi Lampu Penerangan</th>
                                        <th>Pisau Potong</th>
                                        <th>Fungsi Hidrolis Sepatu Forklift</th>
                                        <th>Fungsi Vibrator</th>
                                        <th>Fungsi Spray Bar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicles as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($d->vehicle_type == 'Operasional')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-operasional-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Crash Car')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-crashcar-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Runway Sweeper')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-runwaysweeper-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Rubber Deposit')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-rubberdeposit-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Tractor Rubber Deposit')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-tractorrubber-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Mu Meter')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-mumeter-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Tractor Mower')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-tractormower-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Kompresor Dinamis')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-kompresordinamis-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak 
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Kompresor Statis')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-kompresorstatis-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak 
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Genset')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-genset-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak 
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Asphalt Cutter')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-asphaltcutter-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak 
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Forklift')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-forklift-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak 
                                                </button>
                                            @endif
                                            @if ($d->vehicle_type === 'Vibro Roller')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-vibroroller-{{ $d->id }}">
                                                    <i class="fas fa-print"></i> Cetak 
                                                </button>
                                            @endif
                                            </td>
                                        <td>{{ $d->vehicle_name }}</td>
                                        <td>{{ $d->vehicle_type }}</td>
                                        <td>{{ $d->kendaraan ? $d->kendaraan->no_polisi : '-' }}</td>
                                        <td>{{ $d->kendaraan ? $d->kendaraan->user_peralatan : '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($d->tanggal)->locale('id')->translatedFormat('j F Y') }}</td>
                                        <td>{{ $d->user }}</td>
                                        <td>{{$d->odometer}}</td>
                                        <td>{{$d->v_aki}}</td>
                                        <td>{{$d->oli_selanjutnya}}</td>
                                        <td>{{$d->oli_kurang}}</td>
                                        <td>{{$d->oli_lebih}}</td>
                                        <td>{{$d->body_kendaraan}}</td>
                                        <td>{{$d->kebersihan_kendaraan}}</td>
                                        <td>{{$d->cek_air_accu}}</td>
                                        <td>{{$d->oli_mesin}}</td>
                                        <td>{{$d->oli_transmisi}}</td>
                                        <td>{{$d->minyak_power_steering}}</td>
                                        <td>{{$d->minyak_rem}}</td>
                                        <td>{{$d->vbelt_engine}}</td>
                                        <td>{{$d->filter_udara}}</td>
                                        <td>{{$d->filter_bahan_bakar}}</td>
                                        <td>{{$d->filter_oli}}</td>
                                        <td>{{$d->air_radiator_reservoir}}</td>
                                        <td>{{$d->reservoir_wiper}}</td>
                                        <td>{{$d->kaca_film}}</td>
                                        <td>{{$d->apar}}</td>
                                        <td>{{$d->starter_engine}}</td>
                                        <td>{{$d->kondisi_engine}}</td>
                                        <td>{{$d->kondisi_turbo}}</td>
                                        <td>{{$d->sistem_pendingin}}</td>
                                        <td>{{$d->timing_belt}}</td>
                                        <td>{{$d->transmisi}}</td>
                                        <td>{{$d->pedal_gas}}</td>
                                        <td>{{$d->rem_kaki}}</td>
                                        <td>{{$d->rem_tangan}}</td>
                                        <td>{{$d->kopling}}</td>
                                        <td>{{$d->power_steering}}</td>
                                        <td>{{$d->kaki_kaki}}</td>
                                        <td>{{$d->kondisi_karet_wiper}}</td>
                                        <td>{{$d->headlamp_dekat}}</td>
                                        <td>{{$d->headlamp_jauh}}</td>
                                        <td>{{$d->reversing_lamp}}</td>
                                        <td>{{$d->sign_lamp_depan}}</td>
                                        <td>{{$d->sign_lamp_belakang}}</td>
                                        <td>{{$d->stoplamp}}</td>
                                        <td>{{$d->lampu_atret}}</td>
                                        <td>{{$d->rotary_lamp}}</td>
                                        <td>{{$d->lampu_sorot}}</td>
                                        <td>{{$d->air_coditioning}}</td>
                                        <td>{{$d->jok_kendaraan}}</td>
                                        <td>{{$d->indikator_dashboard}}</td>
                                        <td>{{$d->cabin_lamp}}</td>
                                        <td>{{$d->klakson}}</td>
                                        <td>{{$d->fungsi_wipper}}</td>
                                        <td>{{$d->central_lock}}</td>
                                        <td>{{$d->power_window_lock}}</td>
                                        <td>{{$d->microphone}}</td>
                                        <td>{{$d->ban_depan_kanan}}</td>
                                        <td>{{$d->ban_depan_kiri}}</td>
                                        <td>{{$d->ban_belakang_kanan}}</td>
                                        <td>{{$d->ban_belakang_kiri}}</td>
                                        <td>{{$d->ban_cadangan}}</td>
                                        <td>{{$d->tekanan_angin}}</td>
                                        <td>{{$d->dongkrak}}</td>
                                        <td>{{$d->kunci_roda}}</td>
                                        <td>{{$d->kesimpulan_kendaraan}}</td>
                                        <td>{{$d->catatan}}</td>
                                        <td>@if($d->foto_kendaraan)
                                                    <div class="d-flex flex-wrap align-items-center" style="gap: 5px;"> 
                                                        @foreach(explode(',', $d->foto_kendaraan) as $foto)
                                                            @php $fotoTrimmed = trim($foto); @endphp 
                                                            @if(!empty($fotoTrimmed))
                                                            <div class="text-center">
                                                                {{-- Lightbox Link --}}
                                                                <a href="{{ asset('pemeliharaan/' . $fotoTrimmed) }}"
                                                                   data-toggle="lightbox"
                                                                   data-gallery="gallery-pemeliharaan-{{ $d->id }}"
                                                                   data-title="pemeliharaan {{ $d->vehicle_name }} - {{ \Carbon\Carbon::parse($d->tanggal_pemeliharaan)->locale('id')->isoFormat('DD MMM YYYY') }}">
                                                                    <img src="{{ asset('pemeliharaan/' . $fotoTrimmed) }}"
                                                                         alt="Foto pemeliharaan"
                                                                         class="img-thumbnail"
                                                                         style="width: 50px; height: 50px; object-fit: cover;"> 
                                                                </a>
                                                                {{-- Download Button --}}
                                                                <a href="{{ asset('pemeliharaan/' . $fotoTrimmed) }}"
                                                                   download="{{ $fotoTrimmed }}"
                                                                   class="btn btn-xs btn-outline-secondary mt-1 d-block" 
                                                                   title="Unduh Gambar {{ $fotoTrimmed }}">
                                                                    <i class="fas fa-download"></i>
                                                                </a>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-muted small">Tidak Ada Foto</span>
                                                @endif
                                                </td>
                                        <td>{{$d->tanda_tangan_teknisi}}</td>
                                        <td>{{$d->oli_gardan}}</td>
                                        <td>{{$d->oli_hidrolis}}</td>
                                        <td>{{$d->filter_air_drayer}}</td>
                                        <td>{{$d->filter_water_sparator}}</td>
                                        <td>{{$d->filter_transmisi}}</td>
                                        <td>{{$d->filter_hidrolis}}</td>
                                        <td>{{$d->cooling_system}}</td>
                                        <td>{{$d->airdrayer}}</td>
                                        <td>{{$d->pneumatic_system}}</td>
                                        <td>{{$d->hydraulic_system}}</td>
                                        <td>{{$d->electrical_system}}</td>
                                        <td>{{$d->kompresor}}</td>
                                        <td>{{$d->folklamp}}</td>
                                        <td>{{$d->retting_depan}}</td>
                                        <td>{{$d->retting_belakang}}</td>
                                        <td>{{$d->lampu_kompartement}}</td>
                                        <td>{{$d->lampu_body}}</td>
                                        <td>{{$d->ban_tengah_kanan}}</td>
                                        <td>{{$d->ban_tengah_kiri}}</td>
                                        <td>{{$d->pompa_fire_fighting}}</td>
                                        <td>{{$d->primming_pump}}</td>
                                        <td>{{$d->roof_turret}}</td>
                                        <td>{{$d->bumper_turret}}</td>
                                        <td>{{$d->undertrack_spray_depan}}</td>
                                        <td>{{$d->undertrack_spray_kanan}}</td>
                                        <td>{{$d->undertrack_spray_kiri}}</td>
                                        <td>{{$d->foam_proportioner}}</td>
                                        <td>{{$d->tangki_air}}</td>
                                        <td>{{$d->tangki_foam}}</td>
                                        <td>{{$d->pengisian_air_eksternal}}</td>
                                        <td>{{$d->charger_baterai_eksternal}}</td>
                                        <td>{{$d->top_speed}}</td>
                                        <td>{{$d->stop_distance}}</td>
                                        <td>{{$d->acceleration}}</td>
                                        <td>{{$d->discharge_range}}</td>
                                        <td>{{$d->discharge_rate}}</td>
                                        <td>{{$d->oli_mesin_atas}}</td>
                                        <td>{{$d->air_radiator_mesin_atas}}</td>
                                        <td>{{$d->filter_oli_mesin_atas}}</td>
                                        <td>{{$d->filter_bahan_bakar_mesin_atas}}</td>
                                        <td>{{$d->filter_udara_mesin_atas}}</td>
                                        <td>{{$d->starter_engine_mesin_atas}}</td>
                                        <td>{{$d->kondisi_engine_mesin_atas}}</td>
                                        <td>{{$d->turbo_mesin_atas}}</td>
                                        <td>{{$d->cooling_system_mesin_atas}}</td>
                                        <td>{{$d->gas_accelerator_pedal_mesin_atas}}</td>
                                        <td>{{$d->pompa_hidrolis}}</td>
                                        <td>{{$d->fungsi_hisapan_vacum}}</td>
                                        <td>{{$d->fungsi_gerakan_vacum}}</td>
                                        <td>{{$d->fungsi_putaran_sapu_kanan}}</td>
                                        <td>{{$d->fungsi_putaran_sapu_kiri}}</td>
                                        <td>{{$d->fungsi_putaran_sapu_tengah}}</td>
                                        <td>{{$d->fungsi_gerakan_sapu_kanan}}</td>
                                        <td>{{$d->fungsi_gerakan_sapu_kiri}}</td>
                                        <td>{{$d->fungsi_gerakan_sapu_tengah}}</td>
                                        <td>{{$d->fungsi_spray_bar_depan}}</td>
                                        <td>{{$d->fungsi_spray_bar_kiri}}</td>
                                        <td>{{$d->fungsi_spray_bar_kanan}}</td>
                                        <td>{{$d->fungsi_jet_spray_gun}}</td>
                                        <td>{{$d->fungsi_hidrolis_hooper}}</td>
                                        <td>{{$d->fungsi_hidrolis_tutup_hooper}}</td>
                                        <td>{{$d->fungsi_monitor_control}}</td>
                                        <td>{{$d->fungsi_pendant}}</td>
                                        <td>{{$d->oli_mesin_bawah}}</td>
                                        <td>{{$d->air_radiator_mesin_bawah}}</td>
                                        <td>{{$d->filter_oli_mesin_bawah}}</td>
                                        <td>{{$d->filter_bahan_bakar_mesin_bawah}}</td>
                                        <td>{{$d->filter_udara_mesin_bawah}}</td>
                                        <td>{{$d->pompa_uhp}}</td>
                                        <td>{{$d->pto_kopling_pompa}}</td>
                                        <td>{{$d->v_belt_pompa_uhp}}</td>
                                        <td>{{$d->kampas_kopling_pompa_uhp}}</td>
                                        <td>{{$d->kompresor_pompa_uhp}}</td>
                                        <td>{{$d->vacum_hose_3_inch}}</td>
                                        <td>{{$d->vacum_hose_4_inch}}</td>
                                        <td>{{$d->vacum_hose_6_inch}}</td>
                                        <td>{{$d->hose_40k}}</td>
                                        <td>{{$d->filter_cartridge}}</td>
                                        <td>{{$d->filter_bag_10_micron}}</td>
                                        <td>{{$d->debris_bag}}</td>
                                        <td>{{$d->running_test_40k_engine}}</td>
                                        <td>{{$d->air_radiator_mesin}}</td>
                                        <td>{{$d->ban_tengah_belakang}}</td>
                                        <td>{{$d->handrem_tangki_air}}</td>
                                        <td>{{$d->friction_tyre_kanan}}</td>
                                        <td>{{$d->friction_tyre_kiri}}</td>
                                        <td>{{$d->distance_tyre_tengah}}</td>
                                        <td>{{$d->loadcell}}</td>
                                        <td>{{$d->connector_kabel}}</td>
                                        <td>{{$d->fungsi_pompa_air}}</td>
                                        <td>{{$d->kondisi_tangki_air}}</td>
                                        <td>{{$d->laptop}}</td>
                                        <td>{{$d->kalibrasi_jarak}}</td>
                                        <td>{{$d->fungsi_gerakan_shourd}}</td>
                                        <td>{{$d->fungsi_putaran_kumparan}}</td>
                                        <td>{{$d->nozzle}}</td>
                                        <td>{{$d->selang_hidrolis}}</td>
                                        <td>{{$d->seal_brush_button}}</td>
                                        <td>{{$d->seal_swifel_shaft}}</td>
                                        <td>{{$d->seal_gasket}}</td>
                                        <td>{{$d->seal_upper}}</td>
                                        <td>{{$d->drit_shield}}</td>
                                        <td>{{$d->fungsi_hidrolik_moower}}</td>
                                        <td>{{$d->fungsi_pisau_moower}}</td>
                                        <td>{{$d->fungsi_pompa_hidrolic}}</td>
                                        <td>{{$d->gearbox}}</td>
                                        <td>{{$d->oli_kompresor}}</td>
                                        <td>{{$d->ban_kanan}}</td>
                                        <td>{{$d->ban_kiri}}</td>
                                        <td>{{$d->fungsi_screw_kompresor}}</td>
                                        <td>{{$d->fungsi_cut_off_pressure}}</td>
                                        <td>{{$d->filter_oli_kompresor}}</td>
                                        <td>{{$d->v_belt_kompresor}}</td>
                                        <td>{{$d->fungsi_drayer}}</td>
                                        <td>{{$d->fungsi_auto_start}}</td>
                                        <td>{{$d->fungsi_lampu_penerangan}}</td>
                                        <td>{{$d->pisau_potong}}</td>
                                        <td>{{$d->fungsi_hidrolis_sepatu_forklift}}</td>
                                        <td>{{$d->fungsi_vibrator}}</td>
                                        <td>{{$d->fungsi_spray_bar}}</td>
                                    </tr>
                                    
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------- Modal Cetak -------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                    <div class="modal fade" id="modal-cetak-operasional-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_operasional', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-vibroroller-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_vibroroller', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-crashcar-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_crashcar', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-runwaysweeper-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_runwaysweeper', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-rubberdeposit-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_rubberdeposit', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-tractorrubber-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_tractorrubber', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-mumeter-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_mumeter', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-tractormower-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_tractormower', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-kompresordinamis-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_kompresordinamis', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-kompresorstatis-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_kompresorstatis', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-genset-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_genset', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-asphaltcutter-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_asphaltcutter', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-forklift-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_forklift', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cetak-vibroroller-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel">Cetak Laporan Perawatan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin ingin mencetak laporan perawatan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <a href="{{ route('admin.cetak_laporan_perawatan_vibroroller', ['id' => $d->id]) }}" class="btn btn-primary" target="blank" >Cetak</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------- Modal Cetak -------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                    @endforeach
                                </tbody>
                            </table>
                           
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#laporanTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'colvis', // Button to control column visibility
                    text: 'Atur Kolom',
                    collectionLayout: 'fixed two-column',
                    init: function (api, node, config) {
                        // Add a search input to the colvis dropdown
                        var $searchInput = $('<input type="text" placeholder="Cari Kolom..." class="form-control form-control-sm colvis-search">'); // Use Bootstrap classes
    
                        // IMPORTANT: Stop event propagation from the search input
                        $searchInput.on('click keyup', function (e) {
                            e.stopPropagation(); // Prevent click from closing the dropdown
    
                            var searchValue = this.value.toLowerCase();
                            $('.dt-button-collection .buttons-columnVisibility').each(function () {
                                var buttonText = $(this).text().toLowerCase();
                                if (buttonText.indexOf(searchValue) > -1) {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            });
                        });
    
    
                        $(node).on('click', function () {
                          //find the collection overlay
                            var collection = $('.dt-button-collection');
                            //check its there
                            if(collection.length){
                                //check if the search input already there
                                if(collection.find('.colvis-search').length === 0){
                                    //prepend it
                                    collection.prepend($searchInput);
                                    // Focus the input after adding it.
                                    $searchInput.focus();
                                }
    
                                // Style column buttons
                                $('.dt-button-collection .buttons-columnVisibility').addClass('btn btn-secondary');
                                    api.columns().every(function (colIdx) {
                                        if (this.visible()) {
                                            var visButton = $('.dt-button-collection .buttons-columnVisibility[data-cv-idx="' + colIdx + '"]');
                                            visButton.removeClass('btn-secondary');
                                            visButton.addClass('btn-primary');
                                        }
                                    });
    
                            }
                        });
    
    
                        // Listen for column visibility changes
                        api.on('column-visibility.dt', function (e, settings, column, state) {
                            // Find the button corresponding to the changed column
                            var button = $('.dt-button-collection .buttons-columnVisibility[data-cv-idx="' + column + '"]');
    
                            if (state) {
                                button.addClass('btn-primary');
                                button.removeClass('btn-secondary');
                            } else {
                                button.removeClass('btn-primary');
                                button.addClass('btn-secondary');
                            }
                        });
                    }
                },
                {
                    extend: 'excelHtml5', // Button to export to Excel
                    text: 'Cetak Excel',
                    title: 'Laporan Peralatan',
                    exportOptions: {
                        columns: Array.from(Array(190).keys()).filter(col => col !== 1) // Export columns 2 to 190 excluding column 1
                    }
                }
            ],
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 7], visible: true }, // Default visible columns
                { targets: '_all', visible: false } // Hide other columns by default
            ],
            processing: true, // Add loading indicator
            deferRender: true, // Only render visible data
            pageLength: 10, // Limit the number of rows per page
            responsive: true, // This enables responsive functionality
            language: {
                loadingRecords: "Harap tunggu - memuat data..." // Change loading text
            }
        });
    });
    </script>
    
    <style>
        /* Make sure the dropdown buttons have Bootstrap styling */
        .dt-button-collection .buttons-columnVisibility {
            /*display: block;  Removed for better layout */
            width: 100%;
            padding: 0.25rem 0.75rem; /* Adjust padding as needed */
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit; 
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }
    
       /* Optional: Add some hover effect */
       .dt-button-collection .buttons-columnVisibility:hover {
         background-color: #f8f9fa;
       }
    
        /* Style for the search input (optional, but recommended) */
        .colvis-search {
            margin-bottom: 0.5rem; /* Add some spacing below the search input */
        }
    </style>





@endsection
