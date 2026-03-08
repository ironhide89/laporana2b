@extends('layout.main')

@php
    use Carbon\Carbon;
@endphp

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Kondisi Oli Kendaraan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Kesiapan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Statistik Kondisi Oli -->
            <div class="row">
                <!-- Good Condition Box -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $goodConditionCount }}</h3>
                            <p>Total Oli Memenuhi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- Maintenance Box -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $maintenanceCount }}</h3>
                            <p>Total Oli Yang Perlu Diganti</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $olicount }}</h3>
                            <p>Oli Proses Pergantian</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Statistik Kondisi Oli -->

            <!-- Data Tables -->
          
                <!-- Good Condition Table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0 font-weight" style="font-size: 1.5rem;">Oli Yang Siap</h3>
                    </div>
                      
                      <!-- /.card-header -->
                      <div class="card-body" >
                        <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Keterangan Oli</th>
                                        <th>Odometer Saat Ini</th>
                                        <th>KM Oli Selanjutnya</th>
                                        <th>Tanggal Oli Terakhir Diganti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($goodVehicles as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->vehicle_name }}</td>
                                            <td>{{ $d->vehicle_type }}</td>
                                            <td>{{ $d->oli_keterangan }}</td>
                                            <td>{{ $d->odo_meter }} KM</td>
                                            <td>{{ $d->oli_selanjutnya }} KM</td>
                                            <td>{{ $d->tanggal_oli ? Carbon::parse($d->tanggal_oli)->translatedFormat('F Y') : '-' }}</td>
                                            <td>
                                                @php
                                                    // Cek apakah vehicle_name ada di tabel ver_oli
                                                    $vehicleNameInVerOli = \App\Models\VerOli::where('vehicle_name', $d->vehicle_name)
                                                    ->where('is_completed', '0')->exists();
                                                @endphp
                                    
                                                @if ($vehicleNameInVerOli)
                                                    <button class="btn btn-success btn-sm" disabled>
                                                        <i class="fas fa-check"></i> Proses Pergantian
                                                    </button>
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-tambah-{{ $d->id }}">
                                                        <i class="fas fa-edit"></i> Tambah
                                                    </a>
                                                @else
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-tambah-{{ $d->id }}">
                                                        <i class="fas fa-edit"></i> Buatkan BA Pergantian Oli
                                                    </a>
                                                @endif
                                            </td>
                                            

                                            <div class="modal fade" id="modal-tambah-{{ $d->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Perbaikan</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.store_ver_oli')}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="detail_perbaikan">Nama Kendaraan</label>
                                                                    <textarea class="form-control" name="vehicle_name">{{ $d->vehicle_name }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="kategori_oli">Kategori Oli</label>
                                                                    <select class="form-control" name="kategori_oli" id="kategori_oli" required>
                                                                        <option value="">-- Pilih Kategori Oli --</option>
                                                                        <option value="oli mesin">Oli Mesin</option>
                                                                        <option value="oli gardan">Oli Gardan</option>
                                                                        <option value="oli hidrolis">Oli Hidrolis</option>
                                                                    </select>
                                                                </div>   

                                                                <div class="form-group">
                                                                    <label for="kategori_oli">Jenis Oli</label>
                                                                    <select class="form-control" name="jenis_oli" id="jenis_oli" required>
                                                                        <option value="">Pilih Jenis Oli Mesin</option>
                                                                        <option value="SAE 15W-40">SAE 15W-40</option>
                                                                        <option value="SAE 20W-50">SAE 20W-50</option>
                                                                        <option value="SAE 10">SAE 10</option>
                                                                        <option value="SAE 90">SAE 90</option>
                                                                        <option value="SAE 10W-40">SAE 10W-40</option>
                                                                        <option value="SAE 5W-40">SAE 5W-40</option>
                                                                        <option value="ATF">ATF</option>
                                                                    </select>
                                                                </div> 
                                                                
                                                                <div class="form-group">
                                                                    <label for="volume_oli">Volume Oli</label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" name="volume_oli" id="volume_oli" placeholder="Masukkan volume oli" min="0" step="0.01">
                                                                        <span class="input-group-text">liter</span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div id="form-odometer" style="display: none;">
                                                                    <div class="form-group">
                                                                        <label for="odo_meter">Odo Meter Saat ini</label>
                                                                        <textarea id="odo_meter" class="form-control" name="odo_meter">{{ isset($d) ? $d->odo_meter : '' }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="oli_selanjutnya">KM Oli Selanjutnya</label>
                                                                        <textarea id="oli_selanjutnya" class="form-control" name="oli_selanjutnya">{{ isset($d) ? $d->oli_selanjutnya : '' }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tanggal_oli">Tanggal Oli Terakhir Di Ganti</label>
                                                                    <input 
                                                                        type="date" 
                                                                        class="form-control" 
                                                                        name="tanggal_oli" 
                                                                        id="tanggal_oli" 
                                                                        value="{{ $d->tanggal_oli ? \Carbon\Carbon::parse($d->tanggal_oli)->format('Y-m-d') : '' }}">
                                                                </div>                                                        
                                                                <button type="submit" class="btn btn-primary">Buatkan BA</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.Good Condition Table -->

                <!-- Maintenance Table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mb-0 font-weight" style="font-size: 1.5rem;">Oli Mesin Yang Harus Diganti</h3>
                       
                    </div>

                    
                    
                      
                      <!-- /.card-header -->
                      <div class="card-body" >
                        <table class="table table-bordered table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Keterangan Oli</th>
                                        <th>Odometer Saat Ini</th>
                                        <th>KM Oli Selanjutnya</th>
                                        <th>Tanggal Oli Terakhir Diganti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maintenanceVehicles as $d)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $d->vehicle_name }}</td>
                                            <td>{{ $d->vehicle_type }}</td>
                                            <td>{{ $d->oli_keterangan }}</td>
                                            <td>{{ $d->odo_meter }} KM</td>
                                            <td>{{ $d->oli_selanjutnya }} KM</td>
                                            <td>{{ $d->tanggal_oli ? Carbon::parse($d->tanggal_oli)->translatedFormat('F Y') : '-' }}</td>
                                            <td>
                                                @php
                                                    // Cek apakah vehicle_name ada di tabel ver_oli
                                                    $vehicleNameInVerOli = \App\Models\VerOli::where('vehicle_name', $d->vehicle_name)
                                                    ->where('is_completed','0')->exists();
                                                @endphp
                                            
                                                @if ($vehicleNameInVerOli)
                                                    <button class="btn btn-success btn-sm" disabled>
                                                        <i class="fas fa-check"></i> Proses Pergantian
                                                    </button>
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $d->id }}">
                                                        <i class="fas fa-edit"></i> Tambah
                                                    </a>
                                                @else
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $d->id }}">
                                                        <i class="fas fa-edit"></i> Masukan BA. Release
                                                    </a>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                  


                                    <div class="modal fade" id="modal-edit-{{ $d->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Buatkan BA. Oli</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.store_ver_oli')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="detail_perbaikan">Nama Kendaraan</label>
                                                            <textarea class="form-control" name="vehicle_name">{{ $d->vehicle_name }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="detail_perbaikan">Tipe Kendaraan</label>
                                                            <textarea class="form-control" name="vehicle_type">{{ $d->vehicle_type }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kategori_oli">Kategori Oli</label>
                                                            <select class="form-control" name="kategori_oli" id="kategori_oli" required>
                                                                <option value="">-- Pilih Kategori Oli --</option>
                                                                <option value="oli mesin">Oli Mesin</option>
                                                                <option value="oli gardan">Oli Gardan</option>
                                                                <option value="oli hidrolis">Oli Hidrolis</option>
                                                            </select>
                                                        </div>      
                                                        <div class="form-group">
                                                            <label for="kategori_oli">Jenis Oli</label>
                                                            <select class="form-control" name="jenis_oli" id="jenis_oli" required>
                                                                <option value="">Pilih Jenis Oli </option>
                                                                <option value="SAE 15W-40">SAE 15W-40</option>
                                                                <option value="SAE 20W-50">SAE 20W-50</option>
                                                                <option value="SAE 10">SAE 10</option>
                                                                <option value="SAE 90">SAE 90</option>
                                                                <option value="SAE 10W-40">SAE 10W-40</option>
                                                                <option value="SAE 5W-40">SAE 5W-40</option>
                                                                <option value="ATF">ATF</option>
                                                            </select>
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="volume_oli">Volume Oli</label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" name="volume_oli" id="volume_oli" placeholder="Masukkan volume oli" min="0" step="0.01">
                                                                <span class="input-group-text">liter</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div id="form-odometer" style="display: none;">
                                                            <div class="form-group">
                                                                <label for="odo_meter">Odo Meter Saat ini</label>
                                                                <textarea id="odo_meter" class="form-control" name="odo_meter">{{ isset($d) ? $d->odo_meter : '' }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="oli_selanjutnya">KM Oli Selanjutnya</label>
                                                                <textarea id="oli_selanjutnya" class="form-control" name="oli_selanjutnya">{{ isset($d) ? $d->oli_selanjutnya : '' }}</textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="tanggal_oli">Tanggal Oli Terakhir Di Ganti</label>
                                                            <input 
                                                                type="date" 
                                                                class="form-control" 
                                                                name="tanggal_oli" 
                                                                id="tanggal_oli" 
                                                                value="{{ $d->tanggal_oli ? \Carbon\Carbon::parse($d->tanggal_oli)->format('Y-m-d') : '' }}">
                                                        </div>                                                        
                                                        <button type="submit" class="btn btn-primary">Buatkan BA</button>
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
                <!-- /.Maintenance Table -->
           
            <!-- /.Data Tables -->
        </div>
    </section>
    <!-- /.content -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const kategoriOli = document.querySelectorAll('#kategori_oli');

        kategoriOli.forEach(selectElement => {
            selectElement.addEventListener('change', function () {
                const formOdometer = this.closest('.modal-body').querySelector('#form-odometer');
                const odoMeterInput = formOdometer.querySelector('#odo_meter');
                const oliSelanjutnyaInput = formOdometer.querySelector('#oli_selanjutnya');
                
                if (this.value === 'oli mesin') {
                    formOdometer.style.display = 'block';
                } else {
                    formOdometer.style.display = 'none';
                    odoMeterInput.value = null; // Set nilai Odo Meter ke null
                    oliSelanjutnyaInput.value = null; // Set nilai KM Oli Selanjutnya ke null
                }
            });
        });
    });
</script>

@endsection
