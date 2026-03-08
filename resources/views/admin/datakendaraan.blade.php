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
              <li class="breadcrumb-item active">Data Fasilitas</li>
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
            <!-- Tombol Tambah Data -->
           

            <!-- Pesan Sukses -->
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif


            

            <!-- Tabel Data Kendaraan -->
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0 font-weight" style="font-size: 1.5rem;">Manage Fasilitas</h3>
                <a href="#" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#addVehicleModal">
                  Tambah Fasilitas <i class="fas fa-plus ml-2"></i>
                </a>
              </div>

                <!-- /.card-header -->
                <div class="card-body" >
                  <table class="table table-bordered table-striped" id="example1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kendaraan</th>
                        <th>Tipe Kendaraan</th>
                        <th>Kondisi Kendaraan</th>
                        <th>Barcode Checklist</th>
                        <th>Foto Kendaraan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($vehicles as $vehicle)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $vehicle->vehicle_name }}</td>
                        <td>{{ $vehicle->vehicle_type }}</td>
                        <td>{{ $vehicle->vehicle_condition }}</td>
                        <td>
                          @if($vehicle->barcode)
                            <img src="{{ asset('barcodes/' . $vehicle->barcode) }}" alt="Barcode" width="100">
                          @else
                            No Barcode
                          @endif
                        </td>
                        <td>
                          @if($vehicle->foto_kendaraan)
                            <img src="{{ asset('foto_kendaraan/' . $vehicle->foto_kendaraan) }}" alt="foto_kendaraan" width="100">
                          @else
                           Tidak Ada Foto
                          @endif
                        </td>
                        <td>
                          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editVehicleModal{{ $vehicle->id }}">Lihat Spesifikasi</a>
                          <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteVehicleModal{{ $vehicle->id }}">Delete</a>
                          <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#printBarcodeModal{{ $vehicle->id }}">Barcode</a>
                        </td>
                      </tr>
                      


                         <!-- Modal Cetak Barcode -->
                         <div class="modal fade" id="printBarcodeModal{{ $vehicle->id }}" tabindex="-1" role="dialog" aria-labelledby="printBarcodeModalLabel{{ $vehicle->id }}" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="printBarcodeModalLabel{{ $vehicle->id }}">Cetak Barcode</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                @if($vehicle->barcode)
                                <div id="printArea{{ $vehicle->id }}" 
                                  style="text-align: center; padding: 20px; background-color: white; border: 1px solid #ccc; margin: 0 auto; width: fit-content;" 
                                  data-vehicle-name="{{ $vehicle->vehicle_name }}">
                               <h5 style="margin-bottom: 20px;">{{ $vehicle->vehicle_name }}</h5>
                               <img src="{{ asset('barcodes/' . $vehicle->barcode) }}" alt="Barcode untuk {{ $vehicle->vehicle_name }}" style="width: 100%; max-width: 400px; height: auto;">
                             </div>
                             
                                @else
                                <p>Barcode tidak tersedia.</p>
                                @endif
                              </div>
                              <div class="modal-footer">
                                @if($vehicle->barcode)
                                <button class="btn btn-primary" onclick="saveAsPNG({{ $vehicle->id }})">Cetak Barcode</button>
                                @endif
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                      
              

                      <!-- Modal Edit Kendaraan -->
                      <div class="modal fade" id="editVehicleModal{{ $vehicle->id }}" tabindex="-1" role="dialog" aria-labelledby="editVehicleModalLabel{{ $vehicle->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editVehicleModalLabel{{ $vehicle->id }}">Edit Kendaraan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.update_kendaraan', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                  <label for="vehicle_name">Nama Kendaraan</label>
                                  <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" value="{{ $vehicle->vehicle_name }}" required>
                                </div>
                                
                                <div class="form-group">
                                  <label for="vehicle_type">Tipe Kendaraan</label>
                                  <select class="form-control" id="vehicle_type" name="vehicle_type" required>
                                      <option value="">Pilih Tipe Kendaraan</option>
                                      <option value="Crash Car" {{ $vehicle->vehicle_type == 'Crash Car' ? 'selected' : '' }}>Crash Car</option>
                                      <option value="Forklift" {{ $vehicle->vehicle_type == 'Forklift' ? 'selected' : '' }}>Forklift</option>
                                      <option value="Kompresor Dinamis" {{ $vehicle->vehicle_type == 'Kompresor Dinamis' ? 'selected' : '' }}>Kompresor Dinamis</option>
                                      <option value="Kompresor Statis" {{ $vehicle->vehicle_type == 'Kompresor Statis' ? 'selected' : '' }}>Kompresor Statis</option>
                                      <option value="Runway Sweeper" {{ $vehicle->vehicle_type == 'Runway Sweeper' ? 'selected' : '' }}>Runway Sweeper</option>
                                      <option value="Rubber Deposit" {{ $vehicle->vehicle_type == 'Rubber Deposit' ? 'selected' : '' }}>Rubber Deposit</option>
                                      <option value="Tractor Rubber Deposit" {{ $vehicle->vehicle_type == 'Tractor Rubber Deposit' ? 'selected' : '' }}>Tractor Rubber Deposit</option>
                                      <option value="Mu Meter" {{ $vehicle->vehicle_type == 'Mu Meter' ? 'selected' : '' }}>Mu Meter</option>
                                      <option value="Tractor Mower" {{ $vehicle->vehicle_type == 'Tractor Mower' ? 'selected' : '' }}>Tractor Mower</option>
                                      <option value="Asphalt Cutter" {{ $vehicle->vehicle_type == 'Asphalt Cutter' ? 'selected' : '' }}>Asphalt Cutter</option>
                                      <option value="Genset" {{ $vehicle->vehicle_type == 'Genset' ? 'selected' : '' }}>Genset</option>
                                      <option value="Vibro Roller" {{ $vehicle->vehicle_type == 'Vibro Roller' ? 'selected' : '' }}>Vibro Roller</option>
                                      <option value="Operasional" {{ $vehicle->vehicle_type == 'Operasional' ? 'selected' : '' }}>Operasional</option>
                                      <option value="Aircraft Lifting Bags (Salvage)" {{ $vehicle->vehicle_type == 'Aircraft Lifting Bags (Salvage)' ? 'selected' : '' }}>Aircraft Lifting Bags (Salvage)</option>
                                      <option value="Jack Hammer" {{ $vehicle->vehicle_type == 'Jack Hammer' ? 'selected' : '' }}>Jack Hammer</option>
                                      <option value="Portable Pump" {{ $vehicle->vehicle_type == 'Portable Pump' ? 'selected' : '' }}>Portable Pump</option>
                                      <option value="Sepeda Motor Dinas" {{ $vehicle->vehicle_type == 'Sepeda Motor Dinas' ? 'selected' : '' }}>Sepeda Motor Dinas</option>
                                      <option value="Self Balancing Scooter" {{ $vehicle->vehicle_type == 'Self Balancing Scooter' ? 'selected' : '' }}>Self Balancing Scooter</option>
                                      <option value="Dan Lain Lain" {{ $vehicle->vehicle_type == 'Dan Lain Lain' ? 'selected' : '' }}>Dan Lain Lain</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                <label for="vehicle_type">Klasifikasi Kendaraan</label>
                                <select class="form-control" id="klasifikasi_kendaraan_edit" name="klasifikasi_kendaraan" required>
                                    <option value="">Pilih Tipe Kendaraan</option>
                                    <option value="PKPPK" {{ $vehicle->klasifikasi_kendaraan == 'PKPPK' ? 'selected' : '' }}>PPKPK</option>
                                    <option value="Alat Alat Berat" {{ $vehicle->klasifikasi_kendaraan == 'Alat Alat Berat' ? 'selected' : '' }}>Alat Alat Berat</option>
                                    <option value="Operasional" {{ $vehicle->klasifikasi_kendaraan == 'Operasional' ? 'selected' : '' }}>Operasional</option>
                                    <option value="Motor Dinas" {{ $vehicle->klasifikasi_kendaraan == 'Motor Dinas' ? 'selected' : '' }}>Motor Dinas</option>
                                    <option value="Peralatan" {{ $vehicle->klasifikasi_kendaraan == 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
                                    <option value="Crash Car" {{ $vehicle->klasifikasi_kendaraan == 'Crash Car' ? 'selected' : '' }}>Crash Car</option>
                                    <option value="Tidak Ada" {{ $vehicle->klasifikasi_kendaraan == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                              </div>
                              
                              
                              <div class="form-group" id="volume_tangki_edit" >
                                  <label for="vol_tangki">Volume Tangki</label>
                                  <div class="input-group">
                                      <input type="number" class="form-control" id="vol_tangki_edit" name="vol_tangki" placeholder="Masukan Jumlah Volume Tangki" value="{{ $vehicle->vol_tangki }}">
                                      <div class="input-group-append">
                                          <span class="input-group-text">Liter</span>
                                      </div>
                                  </div>
                              </div>


                              <div class="form-group">
                                <label for="foto_kendaraan">Foto Kendaraan</label>
                                @if($vehicle->foto_kendaraan)
                                    <div>
                                        <img src="{{ asset('foto_kendaraan/' . $vehicle->foto_kendaraan) }}" alt="Foto Kendaraan" width="150">
                                    </div>
                                @endif
                                <input type="file" class="form-control_edit" name="foto_kendaraan" accept="image/*">
                              </div>

                              <div class="form-group">
                                <label for="vehicle_condition">Kondisi Kendaraan</label>
                                <select class="form-control" id="vehicle_condition_edit" name="vehicle_condition" required>
                                    <option value="">Pilih Kondisi Kendaraan</option>
                                    <option value="Serviceable" {{ $vehicle->vehicle_condition == 'Serviceable' ? 'selected' : '' }}>Serviceable</option>
                                    <option value="Unserviceable" {{ $vehicle->vehicle_condition == 'Unserviceable' ? 'selected' : '' }}>Unserviceable</option>
                                    <option value="Serviceable Dengan Catatan" {{ $vehicle->vehicle_condition == 'Serviceable Dengan Catatan' ? 'selected' : '' }}>Serviceable Dengan Catatan</option>
                                </select>
                            </div>
                                <div class="form-group">
                                  <label for="tanggal_oli">Tanggal Pergantian Oli Terakhir</label>
                                  <input type="date" class="form-control" id="tanggal_oli_edit" name="tanggal_oli" value="{{ $vehicle->tanggal_oli }}"required>
                                </div>
                                <div class="form-group">
                                  <label for="tanggal_aki">Tanggal Pengadaan Accu</label>
                                  <input type="date" class="form-control" id="tanggal_aki_edit" name="tanggal_aki" value="{{ $vehicle->tanggal_aki }}"required>
                                </div>
                                <div class="form-group">
                                  <label for="oli_selanjutnya">Oddo Meter / Running Hour Penggantian Oli Selanjutnya</label>
                                  <div class="input-group">
                                      <input type="number" class="form-control" id="oli_selanjutnya_edit" name="oli_selanjutnya" placeholder="Masukkan KM penggantian oli selanjutnya" value="{{ $vehicle->oli_selanjutnya }}" required>
                                      <div class="input-group-append">
                                          <span class="input-group-text">KM</span>
                                      </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="odo_meter">Oddo Meter / Running Hour Sekarang</label>
                                  <div class="input-group">
                                      <input type="number" class="form-control" id="odo_meter_edit" name="odo_meter" placeholder="Masukan Odo Meter" value="{{ $vehicle->odo_meter }}" required>
                                      <div class="input-group-append">
                                          <span class="input-group-text">KM</span>
                                      </div>
                                  </div>
                                </div>       
                                <div class="form-group">
                                  <label for="no_polisi_terpakai">No. Polisi</label>
                                  <input type="text" class="form-control" id="no_polisi_edit" name="no_polisi" value="{{ $vehicle->no_polisi }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="tahun">Tahun</label>
                                  <input type="text" class="form-control" id="tahun_edit" name="tahun" value="{{ $vehicle->tahun }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="user_peralatan">User Peralatan</label>
                                  <select class="form-control" id="user_peralatan_edit" name="user_peralatan" required>
                                      <option value="">Pilih User Peralatan</option>
                                      <option value="AIRPORT RESCUE & FIRE FIGHTING" {{ $vehicle->user_peralatan == 'AIRPORT RESCUE & FIRE FIGHTING' ? 'selected' : '' }}>AIRPORT RESCUE & FIRE FIGHTING</option>
                                      <option value="AIRPORT AIRSIDE FACILITIES" {{ $vehicle->user_peralatan == 'AIRPORT AIRSIDE FACILITIES' ? 'selected' : '' }}>AIRPORT AIRSIDE FACILITIES</option>
                                      <option value="AIRPORT LANDSIDE FACILITIES" {{ $vehicle->user_peralatan == 'AIRPORT LANDSIDE FACILITIES' ? 'selected' : '' }}>AIRPORT LANDSIDE FACILITIES</option>
                                      <option value="AIRPORT EQUIPMENT" {{ $vehicle->user_peralatan == 'AIRPORT EQUIPMENT' ? 'selected' : '' }}>AIRPORT EQUIPMENT</option>
                                      <option value="AIRPORT OPERATION AIRSIDE" {{ $vehicle->user_peralatan == 'AIRPORT OPERATION AIRSIDE' ? 'selected' : '' }}>AIRPORT OPERATION AIRSIDE</option>
                                      <option value="AIRPORT OPERATION LANDSIDE" {{ $vehicle->user_peralatan == 'AIRPORT OPERATION LANDSIDE' ? 'selected' : '' }}>AIRPORT OPERATION LANDSIDE</option>
                                      <option value="AIRPORT TECHNOLOGY" {{ $vehicle->user_peralatan == 'AIRPORT TECHNOLOGY' ? 'selected' : '' }}>AIRPORT TECHNOLOGY</option>
                                      <option value="AIRPORT SECURITY PROTECTION" {{ $vehicle->user_peralatan == 'AIRPORT SECURITY PROTECTION' ? 'selected' : '' }}>AIRPORT SECURITY PROTECTION</option>
                                      <option value="FINANCE" {{ $vehicle->user_peralatan == 'FINANCE' ? 'selected' : '' }}>FINANCE</option>
                                      <option value="GENERAL SERVICES" {{ $vehicle->user_peralatan == 'GENERAL SERVICES' ? 'selected' : '' }}>GENERAL SERVICES</option>
                                      <option value="STAKEHOLDER RELATIONS" {{ $vehicle->user_peralatan == 'STAKEHOLDER RELATIONS' ? 'selected' : '' }}>STAKEHOLDER RELATIONS</option>
                                      <option value="AIRPORT SAFETY" {{ $vehicle->user_peralatan == 'AIRPORT SAFETY' ? 'selected' : '' }}>AIRPORT SAFETY</option>
                                      <option value="AIRPORT SERVICE IMPROVEMENT" {{ $vehicle->user_peralatan == 'AIRPORT SERVICE IMPROVEMENT' ? 'selected' : '' }}>AIRPORT SERVICE IMPROVEMENT</option>
                                      <option value="AIRPORT SECURITY" {{ $vehicle->user_peralatan == 'AIRPORT SECURITY' ? 'selected' : '' }}>AIRPORT SECURITY</option>
                                      <option value="ACCOUNTING" {{ $vehicle->user_peralatan == 'ACCOUNTING' ? 'selected' : '' }}>ACCOUNTING</option>
                                      <option value="Tidak Ada" {{ $vehicle->user_peralatan == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <select class="form-control" id="lokasi_edit" name="lokasi" required>
                                    <option value="">Pilih Lokasi</option>
                                    <option value="FIRE STATION T1" {{ $vehicle->lokasi == 'FIRE STATION T1' ? 'selected' : '' }}>FIRE STATION T1</option>
                                    <option value="FIRE STATION T2" {{ $vehicle->lokasi == 'FIRE STATION T2' ? 'selected' : '' }}>FIRE STATION T2</option>
                                    <option value="GEDUNG UTILITAS" {{ $vehicle->lokasi == 'GEDUNG UTILITAS' ? 'selected' : '' }}>GEDUNG UTILITAS</option>
                                    <option value="POOL KENDARAAN" {{ $vehicle->lokasi == 'POOL KENDARAAN' ? 'selected' : '' }}>POOL KENDARAAN</option>
                                    <option value="AOB" {{ $vehicle->lokasi == 'AOB' ? 'selected' : '' }}>AOB</option>
                                    <option value="BAS MEKANIKAL" {{ $vehicle->lokasi == 'BAS MEKANIKAL' ? 'selected' : '' }}>BAS MEKANIKAL</option>
                                    <option value="MPH" {{ $vehicle->lokasi == 'MPH' ? 'selected' : '' }}>MPH</option>
                                    <option value="AMC T1" {{ $vehicle->lokasi == 'AMC T1' ? 'selected' : '' }}>AMC T1</option>
                                    <option value="AMC T2" {{ $vehicle->lokasi == 'AMC T2' ? 'selected' : '' }}>AMC T2</option>
                                    <option value="TERMINAL 1" {{ $vehicle->lokasi == 'TERMINAL 1' ? 'selected' : '' }}>TERMINAL 1</option>
                                    <option value="MARKAS SECURITY" {{ $vehicle->lokasi == 'MARKAS SECURITY' ? 'selected' : '' }}>MARKAS SECURITY</option>
                                    <option value="POOL GS" {{ $vehicle->lokasi == 'POOL GS' ? 'selected' : '' }}>POOL GS</option>
                                    <option value="Tidak Ada" {{ $vehicle->lokasi == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                </select>
                            </div>
                            
                                <div class="form-group">
                                  <label for="no_aset">No. Aset</label>
                                  <input type="text" class="form-control" id="no_aset_edit" name="no_aset" value="{{ $vehicle->no_aset }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="no_rangka">No. Rangka</label>
                                  <input type="text" class="form-control" id="no_rangka_edit" name="no_rangka" value="{{ $vehicle->no_rangka }}" required>
                                </div>
                                <div class="form-group">
                                  <label for="no_mesin">No. Mesin</label>
                                  <input type="text" class="form-control" id="no_mesin_edit" name="no_mesin" value="{{ $vehicle->no_mesin }}" required>
                                </div>
                                <div class="form-group" id="engine_group_edit">
                                  <label for="engine">Engine</label>
                                  <input type="text" class="form-control" id="engine_edit" name="engine" value="{{ $vehicle->engine }}" required>
                                </div>
                                
                                <div class="form-group" id="kapasitas_silinder_group_edit">
                                  <label for="kap_silinder">Kapasitas Silinder</label>
                                  <div class="input-group">
                                      <input type="text" class="form-control" id="kap_silinder_edit" name="kap_silinder" value="{{ $vehicle->kap_silinder }}" required>
                                      <div class="input-group-append">
                                          <span class="input-group-text">CC</span>
                                      </div>
                                  </div>
                              </div>
          

                                <div class="form-group" id="transmisi_group_edit">
                                  <label for="transmisi">Transmisi</label>
                                  <select class="form-control" id="transmisi_edit_edit" name="transmisi" required>
                                      <option value="">Pilih Transmisi</option>
                                      <option value="Automatic" {{ $vehicle->transmisi == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                      <option value="Manual" {{ $vehicle->transmisi == 'Manual' ? 'selected' : '' }}>Manual</option>
                                      <option value="Tidak Ada" {{ $vehicle->transmisi == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>
                                  </select>
                              </div>
                              
                              <div class="form-group" id="bakar_jenis_group_edit">
                                <label for="bakar_jenis">Jenis Bahan Bakar</label>
                                <select class="form-control" id="bakar_jenis_edit" name="bakar_jenis" required>
                                    <option value="">Pilih Jenis Bahan Bakar</option>
                                    <option value="Solar" {{ $vehicle->bakar_jenis == 'Solar' ? 'selected' : '' }}>Solar</option>
                                    <option value="Bensin" {{ $vehicle->bakar_jenis == 'Bensin' ? 'selected' : '' }}>Bensin</option>
                                    <option value="Pneumatic" {{ $vehicle->bakar_jenis == 'Pneumatic' ? 'selected' : '' }}>Pneumatic</option>
                                    <option value="Listrik" {{ $vehicle->bakar_jenis == 'Listrik' ? 'selected' : '' }}>Listrik</option>
                                    <option value="Tidak Ada" {{ $vehicle->bakar_jenis == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada</option>

                                </select>
                            </div>   

                            <div class="form-group" id="bakar_kapasitas_group_edit">
                              <label for="bakar_kapasitas">Kapasitas Tangki BBM</label>
                              <div class="input-group">
                                  <input type="text" class="form-control" id="bakar_kapasitas_edit" name="bakar_kapasitas" value="{{ $vehicle->bakar_kapasitas }}" required>
                                  <div class="input-group-append">
                                      <span class="input-group-text">Liter</span>
                                  </div>
                              </div>
                                </div>

                                <div class="form-group" id="oli_mesin_volume1_group_edit">
                                  <label for="oli_mesin_volume1">Volume Oli Mesin 1</label>
                                  <div class="input-group">
                                      <input type="text" class="form-control" id="oli_mesin_volume1_edit" name="oli_mesin_volume1" value="{{ $vehicle->oli_mesin_volume1 }}" required>
                                      <div class="input-group-append">
                                          <span class="input-group-text">Liter</span>
                                      </div>
                                  </div>
                              </div>
                              
                                
                                <div class="form-group" id="oli_mesin_jenis1_group_edit">
                                  <label for="oli_mesin_jenis1">Jenis Oli Mesin 1</label>
                                  <select class="form-control" id="oli_mesin_jenis1_edit" name="oli_mesin_jenis1" required>
                                      <option value="">Pilih Jenis Oli Mesin 1</option>
                                      <option value="SAE 15W-40" {{ $vehicle->oli_mesin_jenis1 == 'SAE 15W-40' ? 'selected' : '' }}>SAE 15W-40</option>
                                      <option value="SAE 20W-50" {{ $vehicle->oli_mesin_jenis1 == 'SAE 20W-50' ? 'selected' : '' }}>SAE 20W-50</option>
                                      <option value="SAE 10" {{ $vehicle->oli_mesin_jenis1 == 'SAE 10' ? 'selected' : '' }}>SAE 10</option>
                                      <option value="SAE 90" {{ $vehicle->oli_mesin_jenis1 == 'SAE 90' ? 'selected' : '' }}>SAE 90</option>
                                      <option value="SAE 10W-40" {{ $vehicle->oli_mesin_jenis1 == 'SAE 10W-40' ? 'selected' : '' }}>SAE 10W-40</option>
                                      <option value="SAE 5W-40" {{ $vehicle->oli_mesin_jenis1 == 'SAE 5W-40' ? 'selected' : '' }}>SAE 5W-40</option>
                                      <option value="ATF" {{ $vehicle->oli_mesin_jenis1 == 'ATF' ? 'selected' : '' }}>ATF</option>
                                      <option value="Tidak Ada" {{$vehicle->oli_mesin_jenis1 == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                  </select>
                              </div>
                              
                              <div class="form-group" id="oli_mesin_volume2_group_edit">
                                <label for="oli_mesin_volume2">Volume Oli Mesin 2</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="oli_mesin_volume2_edit" name="oli_mesin_volume2" value="{{ $vehicle->oli_mesin_volume2 }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Liter</span>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="form-group" id="oli_mesin_jenis2_group_edit">
                                  <label for="oli_mesin_jenis2">Jenis Oli Mesin 2</label>
                                  <select class="form-control" id="oli_mesin_jenis2_edit" name="oli_mesin_jenis2" required>
                                      <option value="">Pilih Jenis Oli Mesin 2</option>
                                      <option value="SAE 15W-40" {{ $vehicle->oli_mesin_jenis2 == 'SAE 15W-40' ? 'selected' : '' }}>SAE 15W-40</option>
                                      <option value="SAE 20W-50" {{ $vehicle->oli_mesin_jenis2 == 'SAE 20W-50' ? 'selected' : '' }}>SAE 20W-50</option>
                                      <option value="SAE 10" {{ $vehicle->oli_mesin_jenis2 == 'SAE 10' ? 'selected' : '' }}>SAE 10</option>
                                      <option value="SAE 90" {{ $vehicle->oli_mesin_jenis2 == 'SAE 90' ? 'selected' : '' }}>SAE 90</option>
                                      <option value="SAE 10W-40" {{ $vehicle->oli_mesin_jenis2 == 'SAE 10W-40' ? 'selected' : '' }}>SAE 10W-40</option>
                                      <option value="SAE 5W-40" {{ $vehicle->oli_mesin_jenis2 == 'SAE 5W-40' ? 'selected' : '' }}>SAE 5W-40</option>
                                      <option value="ATF" {{ $vehicle->oli_mesin_jenis2 == 'ATF' ? 'selected' : '' }}>ATF</option>
                                      <option value="Tidak Ada" {{$vehicle->oli_mesin_jenis2 == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                  </select>
                              </div>                              
                              <div class="form-group" id="oli_transmisi_volume_group_edit">
                                <label for="oli_transmisi_volume">Volume Oli Transmisi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="oli_transmisi_volume_edit" name="oli_transmisi_volume" value="{{ $vehicle->oli_transmisi_volume }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Liter</span>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="form-group">
                                  <label for="oli_transmisi_jenis">Jenis Oli Transmisi</label>
                                  <select class="form-control" id="oli_transmisi_jenis_edit" name="oli_transmisi_jenis" required>
                                      <option value="">Pilih Jenis Oli Transmisi</option>
                                      <option value="SAE 15W-40" {{ $vehicle->oli_transmisi_jenis == 'SAE 15W-40' ? 'selected' : '' }}>SAE 15W-40</option>
                                      <option value="SAE 20W-50" {{ $vehicle->oli_transmisi_jenis == 'SAE 20W-50' ? 'selected' : '' }}>SAE 20W-50</option>
                                      <option value="SAE 10" {{ $vehicle->oli_transmisi_jenis == 'SAE 10' ? 'selected' : '' }}>SAE 10</option>
                                      <option value="SAE 90" {{ $vehicle->oli_transmisi_jenis == 'SAE 90' ? 'selected' : '' }}>SAE 90</option>
                                      <option value="SAE 10W-40" {{ $vehicle->oli_transmisi_jenis == 'SAE 10W-40' ? 'selected' : '' }}>SAE 10W-40</option>
                                      <option value="SAE 5W-40" {{ $vehicle->oli_transmisi_jenis == 'SAE 5W-40' ? 'selected' : '' }}>SAE 5W-40</option>
                                      <option value="ATF" {{ $vehicle->oli_transmisi_jenis == 'ATF' ? 'selected' : '' }}>ATF</option>
                                      <option value="Tidak Ada" {{$vehicle->oli_transmisi_jenis == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                  </select>
                              </div>                              
                              <div class="form-group" id="oli_gardan_volume_group_edit">
                                <label for="oli_gardan_volume">Volume Oli Gardan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="oli_gardan_volume_edit" name="oli_gardan_volume" value="{{ $vehicle->oli_gardan_volume }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Liter</span>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="form-group" id="jenis_oli_gardan_group_edit">
                                  <label for="oli_gardan_jenis">Jenis Oli Gardan</label>
                                  <select class="form-control" id="oli_gardan_jenis_edit" name="oli_gardan_jenis" required>
                                      <option value="">Pilih Jenis Oli Gardan</option>
                                      <option value="SAE 15W-40" {{ $vehicle->oli_gardan_jenis == 'SAE 15W-40' ? 'selected' : '' }}>SAE 15W-40</option>
                                      <option value="SAE 20W-50" {{ $vehicle->oli_gardan_jenis == 'SAE 20W-50' ? 'selected' : '' }}>SAE 20W-50</option>
                                      <option value="SAE 10" {{ $vehicle->oli_gardan_jenis == 'SAE 10' ? 'selected' : '' }}>SAE 10</option>
                                      <option value="SAE 90" {{ $vehicle->oli_gardan_jenis == 'SAE 90' ? 'selected' : '' }}>SAE 90</option>
                                      <option value="SAE 10W-40" {{ $vehicle->oli_gardan_jenis == 'SAE 10W-40' ? 'selected' : '' }}>SAE 10W-40</option>
                                      <option value="SAE 5W-40" {{ $vehicle->oli_gardan_jenis == 'SAE 5W-40' ? 'selected' : '' }}>SAE 5W-40</option>
                                      <option value="ATF" {{ $vehicle->oli_gardan_jenis == 'ATF' ? 'selected' : '' }}>ATF</option>
                                      <option value="Tidak Ada" {{$vehicle->oli_gardan_jenis == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                  </select>
                              </div>                              
                              <div class="form-group" id="oli_hydrolis_volume_group_edit">
                                <label for="oli_hydrolis_volume">Volume Oli Hidrolis</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="oli_hydrolis_volume_edit" name="oli_hydrolis_volume" value="{{ $vehicle->oli_hydrolis_volume }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Liter</span>
                                    </div>
                                </div>
                            </div>
                            
                                <div class="form-group" id="oli_hydrolis_oli_group_edit">
                                  <label for="oli_hydrolis_oli">Jenis Oli Hidrolis</label>
                                  <select class="form-control" id="oli_hydrolis_oli_edit" name="oli_hydrolis_oli" required>
                                      <option value="">Pilih Jenis Oli Hidrolis</option>
                                      <option value="SAE 15W-40" {{ $vehicle->oli_hydrolis_oli == 'SAE 15W-40' ? 'selected' : '' }}>SAE 15W-40</option>
                                      <option value="SAE 20W-50" {{ $vehicle->oli_hydrolis_oli == 'SAE 20W-50' ? 'selected' : '' }}>SAE 20W-50</option>
                                      <option value="SAE 10" {{ $vehicle->oli_hydrolis_oli == 'SAE 10' ? 'selected' : '' }}>SAE 10</option>
                                      <option value="SAE 90" {{ $vehicle->oli_hydrolis_oli == 'SAE 90' ? 'selected' : '' }}>SAE 90</option>
                                      <option value="SAE 10W-40" {{ $vehicle->oli_hydrolis_oli == 'SAE 10W-40' ? 'selected' : '' }}>SAE 10W-40</option>
                                      <option value="SAE 5W-40" {{ $vehicle->oli_hydrolis_oli == 'SAE 5W-40' ? 'selected' : '' }}>SAE 5W-40</option>
                                      <option value="ATF" {{ $vehicle->oli_hydrolis_oli == 'ATF' ? 'selected' : '' }}>ATF</option>
                                      <option value="Tidak Ada" {{$vehicle->oli_hydrolis_oli == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                  </select>
                              </div>                              
                              <div class="form-group" id="ban_depan_group_edit">
                                <label for="ban_depan">Ban Depan</label>
                                <select class="form-control" id="ban_depan_edit" name="ban_depan" required>
                                    <option value="">Pilih Ban Depan</option>
                                    <option value="16.R20 XZL" {{ $vehicle->ban_depan == '16.R20 XZL' ? 'selected' : '' }}>16.R20 XZL</option>
                                    <option value="24.R21 XZL" {{ $vehicle->ban_depan == '24.R21 XZL' ? 'selected' : '' }}>24.R21 XZL</option>
                                    <option value="395/85 R20 XZL" {{ $vehicle->ban_depan == '395/85 R20 XZL' ? 'selected' : '' }}>395/85 R20 XZL</option>
                                    <option value="195/65 R15" {{ $vehicle->ban_depan == '195/65 R15' ? 'selected' : '' }}>195/65 R15</option>
                                    <option value="235/70 R15" {{ $vehicle->ban_depan == '235/70 R15' ? 'selected' : '' }}>235/70 R15</option>
                                    <option value="205/70 R14" {{ $vehicle->ban_depan == '205/70 R14' ? 'selected' : '' }}>205/70 R14</option>
                                    <option value="7.00-16 - 14 PR" {{ $vehicle->ban_depan == '7.00-16 - 14 PR' ? 'selected' : '' }}>7.00-16 - 14 PR</option>
                                    <option value="265/70 R 15" {{ $vehicle->ban_depan == '265/70 R 15' ? 'selected' : '' }}>265/70 R 15</option>
                                    <option value="250-15 16 PR" {{ $vehicle->ban_depan == '250-15 16 PR' ? 'selected' : '' }}>250-15 16 PR</option>
                                    <option value="5.50-13LT" {{ $vehicle->ban_depan == '5.50-13LT' ? 'selected' : '' }}>5.50-13LT</option>
                                    <option value="10.00-20,16PLY" {{ $vehicle->ban_depan == '10.00-20,16PLY' ? 'selected' : '' }}>10.00-20,16PLY</option>
                                    <option value="11.00-20,16PLY" {{ $vehicle->ban_depan == '11.00-20,16PLY' ? 'selected' : '' }}>11.00-20,16PLY</option>
                                    <option value="20X10.00,10NHS 4 PLY" {{ $vehicle->ban_depan == '20X10.00,10NHS 4 PLY' ? 'selected' : '' }}>20X10.00,10NHS 4 PLY</option>
                                    <option value="4.00 - 8NHS/6PLY (LUAR)" {{ $vehicle->ban_depan == '4.00 - 8NHS/6PLY (LUAR)' ? 'selected' : '' }}>4.00 - 8NHS/6PLY (LUAR)</option>
                                    <option value="PEJAL" {{ $vehicle->ban_depan == 'PEJAL' ? 'selected' : '' }}>PEJAL</option>
                                    <option value="7.50 - 16.6 PLY" {{ $vehicle->ban_depan == '7.50 - 16.6 PLY' ? 'selected' : '' }}>7.50 - 16.6 PLY</option>
                                    <option value="12.4 - R 24 PLY" {{ $vehicle->ban_depan == '12.4 - R 24 PLY' ? 'selected' : '' }}>12.4 - R 24 PLY</option>
                                    <option value="165/70 R 13" {{ $vehicle->ban_depan == '165/70 R 13' ? 'selected' : '' }}>165/70 R 13</option>
                                    <option value="155/R13 LT 8PR 90/880" {{ $vehicle->ban_depan == '155/R13 LT 8PR 90/880' ? 'selected' : '' }}>155/R13 LT 8PR 90/880</option>
                                    <option value="4.10/3.50-4" {{ $vehicle->ban_depan == '4.10/3.50-4' ? 'selected' : '' }}>4.10/3.50-4</option>
                                    <option value="205/65 R 15" {{ $vehicle->ban_depan == '205/65 R 15' ? 'selected' : '' }}>205/65 R 15</option>
                                    <option value="265/70 R 17" {{ $vehicle->ban_depan == '265/70 R 17' ? 'selected' : '' }}>265/70 R 17</option>
                                    <option value="175/70 R 13" {{ $vehicle->ban_depan == '175/70 R 13' ? 'selected' : '' }}>175/70 R 13</option>
                                    <option value="265/65 R 17" {{ $vehicle->ban_depan == '265/65 R 17' ? 'selected' : '' }}>265/65 R 17</option>
                                    <option value="225/75 R 16" {{ $vehicle->ban_depan == '225/75 R 16' ? 'selected' : '' }}>225/75 R 16</option>
                                    <option value="185/70/R14" {{ $vehicle->ban_depan == '185/70/R14' ? 'selected' : '' }}>185/70/R14</option>
                                    <option value="700-16 14 PR" {{ $vehicle->ban_depan == '700-16 14 PR' ? 'selected' : '' }}>700-16 14 PR</option>
                                    <option value="250/R17" {{ $vehicle->ban_depan == '250/R17' ? 'selected' : '' }}>250/R17</option>
                                    <option value="70/80 R14" {{ $vehicle->ban_depan == '70/80 R14' ? 'selected' : '' }}>70/80 R14</option>
                                    <option value="250/R17 DPN" {{ $vehicle->ban_depan == '250/R17 DPN' ? 'selected' : '' }}>250/R17 DPN</option>
                                    <option value="Tidak Ada" {{$vehicle->ban_depan == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                </select>
                            </div>                      
                            <div class="form-group" id="ban_belakang_group_edit">
                              <label for="ban_belakang">Ban Belakang</label>
                              <select class="form-control" id="ban_belakang_edit" name="ban_belakang" required>
                                  <option value="">Pilih Ban Belakang</option>
                                  <option value="16.R20 XZL" {{ $vehicle->ban_belakang == '16.R20 XZL' ? 'selected' : '' }}>16.R20 XZL</option>
                                  <option value="24.R21 XZL" {{ $vehicle->ban_belakang == '24.R21 XZL' ? 'selected' : '' }}>24.R21 XZL</option>
                                  <option value="395/85 R20 XZL" {{ $vehicle->ban_belakang == '395/85 R20 XZL' ? 'selected' : '' }}>395/85 R20 XZL</option>
                                  <option value="195/65 R15" {{ $vehicle->ban_belakang == '195/65 R15' ? 'selected' : '' }}>195/65 R15</option>
                                  <option value="235/70 R15" {{ $vehicle->ban_belakang == '235/70 R15' ? 'selected' : '' }}>235/70 R15</option>
                                  <option value="205/70 R14" {{ $vehicle->ban_belakang == '205/70 R14' ? 'selected' : '' }}>205/70 R14</option>
                                  <option value="7.00-16 - 14 PR" {{ $vehicle->ban_belakang == '7.00-16 - 14 PR' ? 'selected' : '' }}>7.00-16 - 14 PR</option>
                                  <option value="265/70 R 15" {{ $vehicle->ban_belakang == '265/70 R 15' ? 'selected' : '' }}>265/70 R 15</option>
                                  <option value="250-15 16 PR" {{ $vehicle->ban_belakang == '250-15 16 PR' ? 'selected' : '' }}>250-15 16 PR</option>
                                  <option value="5.50-13LT" {{ $vehicle->ban_belakang == '5.50-13LT' ? 'selected' : '' }}>5.50-13LT</option>
                                  <option value="10.00-20,16PLY" {{ $vehicle->ban_belakang == '10.00-20,16PLY' ? 'selected' : '' }}>10.00-20,16PLY</option>
                                  <option value="11.00-20,16PLY" {{ $vehicle->ban_belakang == '11.00-20,16PLY' ? 'selected' : '' }}>11.00-20,16PLY</option>
                                  <option value="20X10.00,10NHS 4 PLY" {{ $vehicle->ban_belakang == '20X10.00,10NHS 4 PLY' ? 'selected' : '' }}>20X10.00,10NHS 4 PLY</option>
                                  <option value="4.00 - 8NHS/6PLY (LUAR)" {{ $vehicle->ban_belakang == '4.00 - 8NHS/6PLY (LUAR)' ? 'selected' : '' }}>4.00 - 8NHS/6PLY (LUAR)</option>
                                  <option value="PEJAL" {{ $vehicle->ban_belakang == 'PEJAL' ? 'selected' : '' }}>PEJAL</option>
                                  <option value="7.50 - 16.6 PLY" {{ $vehicle->ban_belakang == '7.50 - 16.6 PLY' ? 'selected' : '' }}>7.50 - 16.6 PLY</option>
                                  <option value="12.4 - R 24 PLY" {{ $vehicle->ban_belakang == '12.4 - R 24 PLY' ? 'selected' : '' }}>12.4 - R 24 PLY</option>
                                  <option value="165/70 R 13" {{ $vehicle->ban_belakang == '165/70 R 13' ? 'selected' : '' }}>165/70 R 13</option>
                                  <option value="155/R13 LT 8PR 90/880" {{ $vehicle->ban_belakang == '155/R13 LT 8PR 90/880' ? 'selected' : '' }}>155/R13 LT 8PR 90/880</option>
                                  <option value="4.10/3.50-4" {{ $vehicle->ban_belakang == '4.10/3.50-4' ? 'selected' : '' }}>4.10/3.50-4</option>
                                  <option value="205/65 R 15" {{ $vehicle->ban_belakang == '205/65 R 15' ? 'selected' : '' }}>205/65 R 15</option>
                                  <option value="265/70 R 17" {{ $vehicle->ban_belakang == '265/70 R 17' ? 'selected' : '' }}>265/70 R 17</option>
                                  <option value="175/70 R 13" {{ $vehicle->ban_belakang == '175/70 R 13' ? 'selected' : '' }}>175/70 R 13</option>
                                  <option value="265/65 R 17" {{ $vehicle->ban_belakang == '265/65 R 17' ? 'selected' : '' }}>265/65 R 17</option>
                                  <option value="225/75 R 16" {{ $vehicle->ban_belakang == '225/75 R 16' ? 'selected' : '' }}>225/75 R 16</option>
                                  <option value="185/70/R14" {{ $vehicle->ban_belakang == '185/70/R14' ? 'selected' : '' }}>185/70/R14</option>
                                  <option value="700-16 14 PR" {{ $vehicle->ban_belakang == '700-16 14 PR' ? 'selected' : '' }}>700-16 14 PR</option>
                                  <option value="250/R17" {{ $vehicle->ban_belakang == '250/R17' ? 'selected' : '' }}>250/R17</option>
                                  <option value="70/80 R14" {{ $vehicle->ban_belakang == '70/80 R14' ? 'selected' : '' }}>70/80 R14</option>
                                  <option value="250/R17 DPN" {{ $vehicle->ban_belakang == '250/R17 DPN' ? 'selected' : '' }}>250/R17 DPN</option>
                                  <option value="Tidak Ada" {{$vehicle->ban_belakang == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                              </select>
                          </div>
                                                 
                                <div class="form-group" id="ban_jumlah_group_edit">
                                  <label for="ban_jumlah">Jumlah Ban</label>
                                  <input type="text" class="form-control" id="ban_jumlah_edit" name="ban_jumlah" value="{{ $vehicle->ban_jumlah }}" required>
                                </div>
                                <div class="form-group" id="accu1_spesifikasi_group_edit">
                                  <label for="accu1_spesifikasi">Spesifikasi Accu 1</label>
                                  <select class="form-control" id="accu1_spesifikasi_edit" name="accu1_spesifikasi" required>
                                      <option value="">Pilih Spesifikasi Accu 1</option>
                                      <option value="12V/90AH MF" {{ $vehicle->accu1_spesifikasi == '12V/90AH MF' ? 'selected' : '' }}>12V/90AH MF</option>
                                      <option value="12V/120AH MF" {{ $vehicle->accu1_spesifikasi == '12V/120AH MF' ? 'selected' : '' }}>12V/120AH MF</option>
                                      <option value="900CCA / 12V/90AH MF" {{ $vehicle->accu1_spesifikasi == '900CCA / 12V/90AH MF' ? 'selected' : '' }}>900CCA / 12V/90AH MF</option>
                                      <option value="12V/180AH MF" {{ $vehicle->accu1_spesifikasi == '12V/180AH MF' ? 'selected' : '' }}>12V/180AH MF</option>
                                      <option value="12V/150AH" {{ $vehicle->accu1_spesifikasi == '12V/150AH' ? 'selected' : '' }}>12V/150AH</option>
                                      <option value="12V/65AH" {{ $vehicle->accu1_spesifikasi == '12V/65AH' ? 'selected' : '' }}>12V/65AH</option>
                                      <option value="12V/100AH" {{ $vehicle->accu1_spesifikasi == '12V/100AH' ? 'selected' : '' }}>12V/100AH</option>
                                      <option value="12V/80AH" {{ $vehicle->accu1_spesifikasi == '12V/80AH' ? 'selected' : '' }}>12V/80AH</option>
                                      <option value="12V/95AH MF" {{ $vehicle->accu1_spesifikasi == '12V/95AH MF' ? 'selected' : '' }}>12V/95AH MF</option>
                                      <option value="12V/70AH" {{ $vehicle->accu1_spesifikasi == '12V/70AH' ? 'selected' : '' }}>12V/70AH</option>
                                      <option value="12V/45AH" {{ $vehicle->accu1_spesifikasi == '12V/45AH' ? 'selected' : '' }}>12V/45AH</option>
                                      <option value="12V/45AH MF" {{ $vehicle->accu1_spesifikasi == '12V/45AH MF' ? 'selected' : '' }}>12V/45AH MF</option>
                                      <option value="12/5AH MF" {{ $vehicle->accu1_spesifikasi == '12/5AH MF' ? 'selected' : '' }}>12/5AH MF</option>
                                      <option value="Tidak Ada" {{$vehicle->accu1_spesifikasi == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                  </select>
                              </div>                              
                              <div class="form-group" id="accu2_spesifikasi_group">
                                <label for="accu2_spesifikasi">Spesifikasi Accu 2</label>
                                <select class="form-control" id="accu2_spesifikasi_edit" name="accu2_spesifikasi" required>
                                    <option value="">Pilih Spesifikasi Accu 2</option>
                                    <option value="12V/90AH MF" {{ $vehicle->accu2_spesifikasi == '12V/90AH MF' ? 'selected' : '' }}>12V/90AH MF</option>
                                    <option value="12V/120AH MF" {{ $vehicle->accu2_spesifikasi == '12V/120AH MF' ? 'selected' : '' }}>12V/120AH MF</option>
                                    <option value="900CCA / 12V/90AH MF" {{ $vehicle->accu2_spesifikasi == '900CCA / 12V/90AH MF' ? 'selected' : '' }}>900CCA / 12V/90AH MF</option>
                                    <option value="12V/180AH MF" {{ $vehicle->accu2_spesifikasi == '12V/180AH MF' ? 'selected' : '' }}>12V/180AH MF</option>
                                    <option value="12V/150AH" {{ $vehicle->accu2_spesifikasi == '12V/150AH' ? 'selected' : '' }}>12V/150AH</option>
                                    <option value="12V/65AH" {{ $vehicle->accu2_spesifikasi == '12V/65AH' ? 'selected' : '' }}>12V/65AH</option>
                                    <option value="12V/100AH" {{ $vehicle->accu2_spesifikasi == '12V/100AH' ? 'selected' : '' }}>12V/100AH</option>
                                    <option value="12V/80AH" {{ $vehicle->accu2_spesifikasi == '12V/80AH' ? 'selected' : '' }}>12V/80AH</option>
                                    <option value="12V/95AH MF" {{ $vehicle->accu2_spesifikasi == '12V/95AH MF' ? 'selected' : '' }}>12V/95AH MF</option>
                                    <option value="12V/70AH" {{ $vehicle->accu2_spesifikasi == '12V/70AH' ? 'selected' : '' }}>12V/70AH</option>
                                    <option value="12V/45AH" {{ $vehicle->accu2_spesifikasi == '12V/45AH' ? 'selected' : '' }}>12V/45AH</option>
                                    <option value="12V/45AH MF" {{ $vehicle->accu2_spesifikasi == '12V/45AH MF' ? 'selected' : '' }}>12V/45AH MF</option>
                                    <option value="12/5AH MF" {{ $vehicle->accu2_spesifikasi == '12/5AH MF' ? 'selected' : '' }}>12/5AH MF</option>
                                    <option value="Tidak Ada" {{$vehicle->accu2_spesifikasi == 'Tidak Ada' ? 'selected' : ''}}>Tidak Ada</option>
                                </select>
                            </div>                            
                                <div class="form-group" id="accu1_jumlah_group_edit">
                                  <label for="accu1_jumlah">Jumlah Accu 1</label>
                                  <input type="text" class="form-control" id="accu1_jumlah_edit" name="accu1_jumlah" value="{{ $vehicle->accu1_jumlah }}" required>
                                </div>
                                <div class="form-group" id="accu2_jumlah_group_edit">
                                  <label for="accu2_jumlah">Jumlah Accu 2</label>
                                  <input type="text" class="form-control" id="accu2_jumlah_edit" name="accu2_jumlah" value="{{ $vehicle->accu2_jumlah }}" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      

                      <!-- Modal Hapus Kendaraan -->
                      <div class="modal fade" id="deleteVehicleModal{{ $vehicle->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteVehicleModalLabel{{ $vehicle->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteVehicleModalLabel{{ $vehicle->id }}">Hapus Kendaraan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p>Apakah Anda yakin ingin menghapus kendaraan <strong>{{ $vehicle->vehicle_name }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <form action="{{ route('admin.destroy_kendaraan', $vehicle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

                  <!-- Modal Tambah Data -->
                  <div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="addVehicleModalLabel">Tambah Fasilitas</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('admin.store_kendaraan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="vehicle_name">Nama Kendaraan</label>
                              <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" required>
                            </div>

                            <div class="form-group">
                              <label for="vehicle_type">Tipe Kendaraan</label>
                              <select class="form-control" id="vehicle_type1" name="vehicle_type" required>
                                  <option value="">Pilih Tipe Kendaraan</option>
                                  <option value="Crash Car">Crash Car</option>
                                  <option value="Forklift">Forklift</option>
                                  <option value="Kompresor Dinamis">Kompresor Dinamis</option>
                                  <option value="Kompresor Statis">Kompresor Statis</option>
                                  <option value="Runway Sweeper">Runway Sweeper</option>
                                  <option value="Rubber Deposit">Rubber Deposit</option>
                                  <option value="Tractor Rubber Deposit">Tractor Rubber Deposit</option>
                                  <option value="Mu Meter">Mu Meter</option>
                                  <option value="Tractor Mower">Tractor Mower</option>
                                  <option value="Asphalt Cutter">Asphalt Cutter</option>
                                  <option value="Genset">Genset</option>
                                  <option value="Vibro Roller">Vibro Roller</option>
                                  <option value="Operasional">Operasional</option>
                                  <option value="Aircraft Lifting Bags (Salvage)">Aircraft Lifting Bags (Salvage)</option>
                                  <option value="Jack Hammer">Jack Hammer</option>
                                  <option value="Portable pump">Portable pump</option>
                                  <option value="Sepeda Motor Dinas">Sepeda Motor Dinas</option>
                                  <option value="Self Balancing Scooter">Self Balancing Scooter</option>
                                  <option value="Dan Lain Lain">Dan Lain Lain</option>
                              </select>
                          </div>

                          <div class="form-group">
                            <label for="vehicle_type">Klasifikasi Kendaraan</label>
                            <select class="form-control" id="klasifikasi_kendaraan1" name="klasifikasi_kendaraan" required>
                                <option value="">Pilih Tipe Kendaraan</option>
                                <option value="PKPPK">PKPPK</option>
                                <option value="Alat Alat Berat">Alat Alat Berat</option>
                                <option value="Operasional">Operasional</option>
                                <option value="Motor Dinas">Motor Dinas</option>
                                <option value="Peralatan">Peralatan</option>
                                <option value="Crash Car">Crash Car</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                          </div>
                          
                          <div class="form-group" id="volume_tangki_group" style="display: none;">
                              <label for="vol_tangki">Volume Tangki</label>
                              <div class="input-group">
                                  <input type="number" class="form-control" id="vol_tangki1" name="vol_tangki" placeholder="Masukan Jumlah Volume Tangki">
                                  <div class="input-group-append">
                                      <span class="input-group-text">Liter</span>
                                  </div>
                              </div>
                          </div>
                        
                          
                          <div class="form-group">
                            <label for="foto_kendaraan">Foto Kendaraan</label>
                            <input type="file" class="form-control" name="foto_kendaraan" accept="image/*" required>
                          </div>

                          <div class="form-group">
                            <label for="vehicle_condition">Kondisi Kendaraan</label>
                            <select class="form-control" id="vehicle_condition" name="vehicle_condition" required>
                                <option value="">Pilih Kondisi Kendaraan</option>
                                <option value="Unserviceable">Unserviceable</option>
                                <option value="Serviceable">Serviceable</option>
                                <option value="Serviceable Dengan Catatan">Serviceable Dengan Catatan</option>
                            </select>
                          </div>
                        <div class="form-group">
                          <label for="tanggal_oli">Tanggal Pergantian Oli Terakhir</label>
                          <input type="date" class="form-control" id="tanggal_oli" name="tanggal_oli" required>
                        </div>
                        <div class="form-group">
                          <label for="tanggal_aki">Tanggal Pengadaan Accu</label>
                          <input type="date" class="form-control" id="tanggal_aki" name="tanggal_aki" required>
                        </div>
                        <div class="form-group">
                          <label for="oli_selanjutnya">Oddo Meter / Running Hour Pergantian Oli Selanjutnya</label>
                          <div class="input-group">
                              <input type="number" class="form-control" id="oli_selanjutnya" name="oli_selanjutnya" placeholder="Masukkan KM penggantian oli selanjutnya" required>
                              <div class="input-group-append">
                                  <span class="input-group-text">KM</span>
                              </div>
                          </div>
                        </div>    
                        <div class="form-group">
                          <label for="odo_meter">Oddo Meter / Running Hour Sekarang</label>
                          <div class="input-group">
                              <input type="number" class="form-control" id="odo_meter" name="odo_meter" placeholder="Masukan Odo Meter" >
                              <div class="input-group-append">
                                  <span class="input-group-text">KM</span>
                              </div>
                          </div>
                        </div>    
                            <div class="form-group">
                              <label for="no_polisi_terpakai">No. Polisi </label>
                              <input type="text" class="form-control" id="no_polisi" name="no_polisi" >
                            </div>
                            <div class="form-group">
                              <label for="tahun">Tahun</label>
                              <input type="text" class="form-control" id="tahun" name="tahun" >
                            </div>
                            <div class="form-group">
                              <label for="user_peralatan">User Peralatan</label>
                              <select class="form-control" id="user_peralatan" name="user_peralatan" >
                                  <option value="">Pilih User Peralatan</option>
                                  <option value="AIRPORT RESCUE & FIRE FIGHTING">AIRPORT RESCUE & FIRE FIGHTING</option>
                                  <option value="AIRPORT AIRSIDE FACILITIES">AIRPORT AIRSIDE FACILITIES</option>
                                  <option value="AIRPORT LANDSIDE FACILITIES">AIRPORT LANDSIDE FACILITIES</option>
                                  <option value="AIRPORT EQUIPMENT">AIRPORT EQUIPMENT</option>
                                  <option value="AIRPORT OPERATION AIRSIDE">AIRPORT OPERATION AIRSIDE</option>
                                  <option value="AIRPORT OPERATION LANDSIDE">AIRPORT OPERATION LANDSIDE</option>
                                  <option value="AIRPORT TECHNOLOGY">AIRPORT TECHNOLOGY</option>
                                  <option value="AIRPORT SECURITY PROTECTION">AIRPORT SECURITY PROTECTION</option>
                                  <option value="FINANCE">FINANCE</option>
                                  <option value="GENERAL SERVICES">GENERAL SERVICES</option>
                                  <option value="STAKEHOLDER RELATIONS">STAKEHOLDER RELATIONS</option>
                                  <option value="AIRPORT SAFETY">AIRPORT SAFETY</option>
                                  <option value="AIRPORT SERVICE IMPROVEMENT">AIRPORT SERVICE IMPROVEMENT</option>
                                  <option value="AIRPORT SECURITY">AIRPORT SECURITY</option>
                                  <option value="ACCOUNTING">ACCOUNTING</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>
                          <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <select class="form-control" id="lokasi" name="lokasi" >
                                <option value="">Pilih Lokasi</option>
                                <option value="FIRE STATION T1">FIRE STATION T1</option>
                                <option value="FIRE STATION T2">FIRE STATION T2</option>
                                <option value="GEDUNG UTILITAS">GEDUNG UTILITAS</option>
                                <option value="POOL KENDARAAN">POOL KENDARAAN</option>
                                <option value="AOB">AOB</option>
                                <option value="BAS MEKANIKAL">BAS MEKANIKAL</option>
                                <option value="MPH">MPH</option>
                                <option value="AMC T1">AMC T1</option>
                                <option value="AMC T2">AMC T2</option>
                                <option value="TERMINAL 1">TERMINAL 1</option>
                                <option value="MARKAS SECURITY">MARKAS SECURITY</option>
                                <option value="POOL GS">POOL GS</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                            <div class="form-group">
                              <label for="no_aset">No. Aset</label>
                              <input type="text" class="form-control" id="no_aset" name="no_aset" >
                            </div>
                            <div class="form-group">
                              <label for="no_rangka">No. Rangka</label>
                              <input type="text" class="form-control" id="no_rangka" name="no_rangka" >
                            </div>
                            <div class="form-group">
                              <label for="no_mesin">No. Mesin</label>
                              <input type="text" class="form-control" id="no_mesin" name="no_mesin" >
                            </div>
                            <div class="form-group" id="engine_group">
                              <label for="engine">Engine</label>
                              <input type="text" class="form-control" id="engine" name="engine" >
                            </div>
                            <div class="form-group" id="kap_silinder_group">
                              <label for="kap_silinder">Kapasitas Silinder</label>
                              <div class="input-group">
                                  <input type="text" class="form-control" id="kap_silinder" name="kap_silinder" >
                                  <div class="input-group-append">
                                      <span class="input-group-text">CC</span>
                                  </div>
                              </div>
                          </div>
                          
                            <div class="form-group" id="transmisi_group">
                              <label for="transmisi">Transmisi</label>
                              <select class="form-control" id="transmisi" name="transmisi" >
                                  <option value="">Pilih Tipe Transmisi</option>
                                  <option value="Automatic">Automatic</option>
                                  <option value="Manual">Manual</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>
                          <div class="form-group" id="bakar_jenis_group">
                            <label for="bakar_jenis">Jenis Bahan Bakar</label>
                            <select class="form-control" id="bakar_jenis" name="bakar_jenis" >
                                <option value="">Pilih Jenis Bahan Bakar</option>
                                <option value="Solar">Solar</option>
                                <option value="Bensin">Bensin</option>
                                <option value="Pneumatic">Pneumatic</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>      
                        <div class="form-group" id="bakar_kapasitas_group">
                          <label for="bakar_kapasitas">Kapasitas Tangki BBM</label>
                          <div class="input-group">
                              <input type="text" class="form-control" id="bakar_kapasitas" name="bakar_kapasitas" >
                              <div class="input-group-append">
                                  <span class="input-group-text">Liter</span>
                              </div>
                          </div>
                      </div>
                        
                        <div class="form-group" id="oli_mesin_volume1_group">
                          <label for="oli_mesin_volume1">Volume Oli Mesin 1</label>
                          <div class="input-group">
                              <input type="text" class="form-control" id="oli_mesin_volume1" name="oli_mesin_volume1" >
                              <div class="input-group-append">
                                  <span class="input-group-text">Liter</span>
                              </div>
                          </div>
                      </div>
                    
                            <div class="form-group" id="oli_mesin_jenis1_group">
                              <label for="oli_mesin_jenis1">Jenis Oli Mesin 1</label>
                              <select class="form-control" id="oli_mesin_jenis1" name="oli_mesin_jenis1" >
                                  <option value="">Pilih Jenis Oli Mesin</option>
                                  <option value="SAE 15W-40">SAE 15W-40</option>
                                  <option value="SAE 20W-50">SAE 20W-50</option>
                                  <option value="SAE 10">SAE 10</option>
                                  <option value="SAE 90">SAE 90</option>
                                  <option value="SAE 10W-40">SAE 10W-40</option>
                                  <option value="SAE 5W-40">SAE 5W-40</option>
                                  <option value="ATF">ATF</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>
                          <div class="form-group" id="oli_mesin_volume2_group" >
                            <label for="oli_mesin_volume2">Volume Oli Mesin 2</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="oli_mesin_volume2" name="oli_mesin_volume2" >
                                <div class="input-group-append">
                                    <span class="input-group-text">Liter</span>
                                </div>
                            </div>
                        </div>
                        
                            <div class="form-group" id="oli_mesin_jenis2_group" >
                              <label for="oli_mesin_jenis2">Jenis Oli Mesin 2</label>
                              <select class="form-control" id="oli_mesin_jenis2" name="oli_mesin_jenis2" >
                                  <option value="">Pilih Jenis Oli Mesin</option>
                                  <option value="SAE 15W-40">SAE 15W-40</option>
                                  <option value="SAE 20W-50">SAE 20W-50</option>
                                  <option value="SAE 10">SAE 10</option>
                                  <option value="SAE 90">SAE 90</option>
                                  <option value="SAE 10W-40">SAE 10W-40</option>
                                  <option value="SAE 5W-40">SAE 5W-40</option>
                                  <option value="ATF">ATF</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>        
                          <div class="form-group" id="oli_transmisi_volume_group">
                            <label for="oli_transmisi_volume">Volume Oli Transmisi</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="oli_transmisi_volume" name="oli_transmisi_volume" >
                                <div class="input-group-append">
                                    <span class="input-group-text">Liter</span>
                                </div>
                            </div>
                        </div>
                        
                            <div class="form-group" id="oli_transmisi_jenis_group">
                              <label for="oli_transmisi_jenis">Jenis Oli Transmisi</label>
                              <select class="form-control" id="oli_transmisi_jenis" name="oli_transmisi_jenis" >
                                  <option value="">Pilih Jenis Oli Transmisi</option>
                                  <option value="SAE 15W-40">SAE 15W-40</option>
                                  <option value="SAE 20W-50">SAE 20W-50</option>
                                  <option value="SAE 10">SAE 10</option>
                                  <option value="SAE 90">SAE 90</option>
                                  <option value="SAE 10W-40">SAE 10W-40</option>
                                  <option value="SAE 5W-40">SAE 5W-40</option>
                                  <option value="ATF">ATF</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>
                          <div class="form-group" id="oli_gardan_volume_group">
                            <label for="oli_gardan_volume">Volume Oli Gardan</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="oli_gardan_volume" name="oli_gardan_volume" >
                                <div class="input-group-append">
                                    <span class="input-group-text">Liter</span>
                                </div>
                            </div>
                        </div>
                        
                            <div class="form-group" id="oli_gardan_jenis_group">
                              <label for="oli_gardan_jenis">Jenis Oli Gardan</label>
                              <select class="form-control" id="oli_gardan_jenis" name="oli_gardan_jenis" >
                                  <option value="">Pilih Jenis Oli Gardan</option>
                                  <option value="SAE 15W-40">SAE 15W-40</option>
                                  <option value="SAE 20W-50">SAE 20W-50</option>
                                  <option value="SAE 10">SAE 10</option>
                                  <option value="SAE 90">SAE 90</option>
                                  <option value="SAE 10W-40">SAE 10W-40</option>
                                  <option value="SAE 5W-40">SAE 5W-40</option>
                                  <option value="ATF">ATF</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>        
                          <div class="form-group" id="oli_hydrolis_volume_group">
                            <label for="oli_hydrolis_volume">Volume Oli Hidrolis</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="oli_hydrolis_volume" name="oli_hydrolis_volume" >
                                <div class="input-group-append">
                                    <span class="input-group-text">Liter</span>
                                </div>
                            </div>
                        </div>
                        
                            <div class="form-group" id="oli_hydrolis_oli_group">
                              <label for="oli_hydrolis_oli">Jenis Oli Hidrolis</label>
                              <select class="form-control" id="oli_hydrolis_oli" name="oli_hydrolis_oli" >
                                  <option value="">Pilih Jenis Oli Hidrolis</option>
                                  <option value="SAE 15W-40">SAE 15W-40</option>
                                  <option value="SAE 20W-50">SAE 20W-50</option>
                                  <option value="SAE 10">SAE 10</option>
                                  <option value="SAE 90">SAE 90</option>
                                  <option value="SAE 10W-40">SAE 10W-40</option>
                                  <option value="SAE 5W-40">SAE 5W-40</option>
                                  <option value="ATF">ATF</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>        
                          <div class="form-group" id="ban_depan_group">
                            <label for="ban_depan">Ban Depan</label>
                            <select class="form-control" id="ban_depan" name="ban_depan" >
                                <option value="">Pilih Ban Depan</option>
                                <option value="16.R20 XZL">16.R20 XZL</option>
                                <option value="24.R21 XZL">24.R21 XZL</option>
                                <option value="395/85 R20 XZL">395/85 R20 XZL</option>
                                <option value="195/65 R15">195/65 R15</option>
                                <option value="235/70 R15">235/70 R15</option>
                                <option value="205/70 R14">205/70 R14</option>
                                <option value="7.00-16 - 14 PR">7.00-16 - 14 PR</option>
                                <option value="265/70 R 15">265/70 R 15</option>
                                <option value="250-15 16 PR">250-15 16 PR</option>
                                <option value="5.50-13LT">5.50-13LT</option>
                                <option value="10.00-20,16PLY">10.00-20,16PLY</option>
                                <option value="11.00-20,16PLY">11.00-20,16PLY</option>
                                <option value="20X10.00,10NHS 4 PLY">20X10.00,10NHS 4 PLY</option>
                                <option value="4.00 - 8NHS/6PLY (LUAR)">4.00 - 8NHS/6PLY (LUAR)</option>
                                <option value="PEJAL">PEJAL</option>
                                <option value="7.50 - 16.6 PLY">7.50 - 16.6 PLY</option>
                                <option value="12.4 - R 24 PLY">12.4 - R 24 PLY</option>
                                <option value="165/70 R 13">165/70 R 13</option>
                                <option value="155/R13 LT 8PR 90/880">155/R13 LT 8PR 90/880</option>
                                <option value="4.10/3.50-4">4.10/3.50-4</option>
                                <option value="205/65 R 15">205/65 R 15</option>
                                <option value="265/70 R 17">265/70 R 17</option>
                                <option value="175/70 R 13">175/70 R 13</option>
                                <option value="265/65 R 17">265/65 R 17</option>
                                <option value="225/75 R 16">225/75 R 16</option>
                                <option value="185/70/R14">185/70/R14</option>
                                <option value="700-16 14 PR">700-16 14 PR</option>
                                <option value="250/R17">250/R17</option>
                                <option value="70/80 R14">70/80 R14</option>
                                <option value="250/R17 DPN">250/R17 DPN</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>      
                        <div class="form-group" id="ban_belakang_group">
                          <label for="ban_belakang">Ban Belakang</label>
                          <select class="form-control" id="ban_belakang" name="ban_belakang" >
                              <option value="">Pilih Ban Belakang</option>
                              <option value="16.R20 XZL">16.R20 XZL</option>
                              <option value="24.R21 XZL">24.R21 XZL</option>
                              <option value="395/85 R20 XZL">395/85 R20 XZL</option>
                              <option value="195/65 R15">195/65 R15</option>
                              <option value="235/70 R15">235/70 R15</option>
                              <option value="205/70 R14">205/70 R14</option>
                              <option value="7.00-16 - 14 PR">7.00-16 - 14 PR</option>
                              <option value="265/70 R 15">265/70 R 15</option>
                              <option value="250-15 16 PR">250-15 16 PR</option>
                              <option value="5.50-13LT">5.50-13LT</option>
                              <option value="10.00-20,16PLY">10.00-20,16PLY</option>
                              <option value="11.00-20,16PLY">11.00-20,16PLY</option>
                              <option value="20X10.00,10NHS 4 PLY">20X10.00,10NHS 4 PLY</option>
                              <option value="4.00 - 8NHS/6PLY (LUAR)">4.00 - 8NHS/6PLY (LUAR)</option>
                              <option value="PEJAL">PEJAL</option>
                              <option value="7.50 - 16.6 PLY">7.50 - 16.6 PLY</option>
                              <option value="12.4 - R 24 PLY">12.4 - R 24 PLY</option>
                              <option value="165/70 R 13">165/70 R 13</option>
                              <option value="155/R13 LT 8PR 90/880">155/R13 LT 8PR 90/880</option>
                              <option value="4.10/3.50-4">4.10/3.50-4</option>
                              <option value="205/65 R 15">205/65 R 15</option>
                              <option value="265/70 R 17">265/70 R 17</option>
                              <option value="175/70 R 13">175/70 R 13</option>
                              <option value="265/65 R 17">265/65 R 17</option>
                              <option value="225/75 R 16">225/75 R 16</option>
                              <option value="185/70/R14">185/70/R14</option>
                              <option value="700-16 14 PR">700-16 14 PR</option>
                              <option value="250/R17">250/R17</option>
                              <option value="70/80 R14">70/80 R14</option>
                              <option value="250/R17 DPN">250/R17 DPN</option>
                              <option value="Tidak Ada">Tidak Ada</option>
                          </select>
                      </div>    
                            <div class="form-group" id="ban_jumlah_group">
                              <label for="ban_jumlah">Jumlah Ban</label>
                              <input type="text" class="form-control" id="ban_jumlah" name="ban_jumlah" >
                            </div>
                            <div class="form-group" id="accu1_spesifikasi_group">
                              <label for="accu1_spesifikasi">Spesifikasi Accu 1</label>
                              <select class="form-control" id="accu1_spesifikasi" name="accu1_spesifikasi" >
                                  <option value="">Pilih Spesifikasi Accu 1</option>
                                  <option value="12V/90AH MF">12V/90AH MF</option>
                                  <option value="12V/120AH MF">12V/120AH MF</option>
                                  <option value="900CCA / 12V/90AH MF">900CCA / 12V/90AH MF</option>
                                  <option value="12V/180AH MF">12V/180AH MF</option>
                                  <option value="12V/150AH">12V/150AH</option>
                                  <option value="12V/65AH">12V/65AH</option>
                                  <option value="12V/100AH">12V/100AH</option>
                                  <option value="12V/80AH">12V/80AH</option>
                                  <option value="12V/95AH MF">12V/95AH MF</option>
                                  <option value="12V/70AH">12V/70AH</option>
                                  <option value="12V/45AH">12V/45AH</option>
                                  <option value="12V/45AH MF">12V/45AH MF</option>
                                  <option value="12/5AH MF">12/5AH MF</option>
                                  <option value="Tidak Ada">Tidak Ada</option>
                              </select>
                          </div>        
                          <div class="form-group" id="accu2_spesifikasi_group">
                            <label for="accu2_spesifikasi">Spesifikasi Accu 2</label>
                            <select class="form-control" id="accu2_spesifikasi" name="accu2_spesifikasi" >
                                <option value="">Pilih Spesifikasi Accu 2</option>
                                <option value="12V/90AH MF">12V/90AH MF</option>
                                <option value="12V/120AH MF">12V/120AH MF</option>
                                <option value="900CCA / 12V/90AH MF">900CCA / 12V/90AH MF</option>
                                <option value="12V/180AH MF">12V/180AH MF</option>
                                <option value="12V/150AH">12V/150AH</option>
                                <option value="12V/65AH">12V/65AH</option>
                                <option value="12V/100AH">12V/100AH</option>
                                <option value="12V/80AH">12V/80AH</option>
                                <option value="12V/95AH MF">12V/95AH MF</option>
                                <option value="12V/70AH">12V/70AH</option>
                                <option value="12V/45AH">12V/45AH</option>
                                <option value="12V/45AH MF">12V/45AH MF</option>
                                <option value="12/5AH MF">12/5AH MF</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>      
                            <div class="form-group" id="accu1_jumlah_group">
                              <label for="accu1_jumlah">Jumlah Accu 1</label>
                              <input type="text" class="form-control" id="accu1_jumlah" name="accu1_jumlah" >
                            </div>
                            <div class="form-group" id="accu2_jumlah_group">
                              <label for="accu2_jumlah">Jumlah Accu 2</label>
                              <input type="text" class="form-control" id="accu2_jumlah" name="accu2_jumlah" >
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>

        </div>
      </div>
    </section>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Dapatkan semua elemen dropdown untuk tipe kendaraan
    const vehicleTypeSelects = document.querySelectorAll('.form-control#klasifikasi_kendaraan_edit');

    // Fungsi untuk mengatur tampilan Volume Tangki berdasarkan tipe kendaraan
    function toggleVolumeTangki(selectElement) {
        const row = selectElement.closest('.form-group').parentNode; // Dapatkan baris terkait
        const volumeTangkiGroup = row.querySelector('#volume_tangki_edit');
        const volTangkiInput = row.querySelector('#vol_tangki');

        if (selectElement.value === 'Crash Car') {
            volumeTangkiGroup.style.display = 'block'; // Tampilkan Volume Tangki
            volTangkiInput.required = true; // Tambahkan atribut required
        } else {
            volumeTangkiGroup.style.display = 'none'; // Sembunyikan Volume Tangki
            volTangkiInput.value = ''; // Reset nilai Volume Tangki jika tipe kendaraan bukan Crash Car
            volTangkiInput.required = false; // Hapus atribut required
        }
    }

    // Tambahkan event listener untuk setiap dropdown
    vehicleTypeSelects.forEach((selectElement) => {
        selectElement.addEventListener('change', function () {
            toggleVolumeTangki(selectElement);
        });

        // Periksa tampilan Volume Tangki saat halaman pertama kali dimuat
        toggleVolumeTangki(selectElement);
    });
  });
</script>

{{-- Script Untuk Modal Tambah --}}
<script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const vehicleTypeSelect = document.getElementById('klasifikasi_kendaraan1');
                        const volumeTangkiGroup = document.getElementById('volume_tangki_group');
                        const volTangkiInput = document.getElementById('vol_tangki1');
                
                        // Function to show or hide Volume Tangki
                        function toggleVolumeTangki() {
                            if (vehicleTypeSelect.value === 'Crash Car') {
                                volumeTangkiGroup.style.display = 'block'; // Tampilkan form Volume Tangki
                            } else {
                                volumeTangkiGroup.style.display = 'none'; // Sembunyikan form Volume Tangki
                                volTangkiInput.value = null; // Reset nilai Volume Tangki
                            }
                        }
                
                        // Event listener untuk perubahan pada dropdown
                        vehicleTypeSelect.addEventListener('change', toggleVolumeTangki);
                
                        // Initial check pada halaman load
                        toggleVolumeTangki();
                    });
</script>


<script>
  document.addEventListener('DOMContentLoaded', function () {
      const vehicleTypeSelect = document.getElementById('vehicle_type1');

      const groups = {
          "Crash Car": {
              hide: ['oli_mesin_volume2_group', 'oli_mesin_jenis2_group'],
              reset: ['oli_mesin_volume2', 'oli_mesin_jenis2']
          },
          "Forklift": {
              hide: ['oli_mesin_volume2_group', 'oli_mesin_jenis2_group'],
              reset: ['oli_mesin_volume2', 'oli_mesin_jenis2']
          },
          "Kompresor Statis": {
              hide: [
                  'oli_mesin_volume2_group', 'oli_mesin_jenis2_group', 'engine_group',
                  'kapasitas_silinder_group', 'transmisi_group', 'bakar_jenis_group',
                  'bakar_kapasitas_group', 'oli_mesin_volume1_group', 'oli_mesin_jenis1_group',
                  'oli_transmisi_volume_group', 'oli_transmisi_jenis_group',
                  'oli_gardan_volume_group', 'oli_gardan_jenis_group', 'ban_depan_group',
                  'ban_belakang_group', 'ban_jumlah_group', 'accu1_spesifikasi_group',
                  'accu1_jumlah_group'
              ],
              reset: [
                  'oli_mesin_volume2', 'oli_mesin_jenis2', 'engine', 'kapasitas_silinder',
                  'transmisi', 'bakar_jenis', 'bakar_kapasitas', 'oli_mesin_volume1',
                  'oli_mesin_jenis1', 'oli_transmisi_volume', 'oli_transmisi_jenis',
                  'oli_gardan_volume', 'oli_gardan_jenis', 'ban_depan', 'ban_belakang',
                  'ban_jumlah', 'accu1_spesifikasi', 'accu1_jumlah'
              ]
          },
          "Default": {
              hide: [],
              reset: []
          }
      };

      function toggleFields() {
          const vehicleType = vehicleTypeSelect.value;

    

          // Terapkan konfigurasi berdasarkan tipe kendaraan
          if (groups[vehicleType]) {
              const config = groups[vehicleType];

              // Sembunyikan elemen yang harus disembunyikan
              if (config.hide) {
                  config.hide.forEach(id => {
                      const element = document.getElementById(id);
                      if (element) element.style.display = 'none';
                  });
              }

              // Reset input yang perlu diatur ulang
              if (config.reset) {
                  config.reset.forEach(id => {
                      const input = document.getElementById(id);
                      if (input) input.value = '';
                  });
              }
          }
      }

      // Event listener
      vehicleTypeSelect.addEventListener('change', toggleFields);

      // Inisialisasi
      toggleFields();
  });
</script>







<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

{{-- Script Untuk Modal Edit --}}





<script>
 function saveAsPNG(vehicleId) {
  var element = document.getElementById('printArea' + vehicleId);

  if (element) {
    var vehicleName = element.dataset.vehicleName || 'barcode_vehicle';
    vehicleName = vehicleName.replace(/[^a-zA-Z0-9-_]/g, '_'); // Ganti karakter yang tidak valid dalam nama file

    html2canvas(element, { scale: 5 }).then(function (canvas) {
      // Konversi canvas menjadi file PNG
      var link = document.createElement('a');
      link.href = canvas.toDataURL('image/png');
      link.download = vehicleName + '.png'; // Gunakan nama kendaraan sebagai nama file
      link.click();
    });
  }
}

</script>



                
                   
@endsection





