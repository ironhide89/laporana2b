@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Kesiapan</h1>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- Good Condition Box -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $goodConditionCount }}</h3>
                            <p>Total Good Condition</p>
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
                            <p>Total Maintenance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Main row -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                  
                  <!-- /.card-header -->
                  <div class="card-body" >
                    <table class="table table-bordered table-striped" id="example1">
                      <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kendaraan</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Catatan Kerusakan</th>
                                        <th>Kondisi Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicle as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->vehicle_name }}</td>
                                        <td>{{ $d->vehicle_type }}</td>
                                        <td>{{ $d->bagian }}</td>
                                        <td class="{{ $d->vehicle_condition == 'Good Condition' ? 'bg-success text-white' : ($d->vehicle_condition == 'Maintenance' ? 'bg-danger text-white' : '') }}">
                                            {{ $d->vehicle_condition }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.Good Condition Table -->

                
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
