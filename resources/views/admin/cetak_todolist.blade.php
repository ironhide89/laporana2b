@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan Checklist</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Checklist </li>
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
                              <h3 class="card-title">DataTable with default features</h3>
                            </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peralatan</th>
                                        <th>Tipe Kendaraan</th>
                                        <th>Nomor Polisi</th>
                                        <th>User Peralatan</th>
                                        <th>Tanggal Pengecekan</th>
                                        <th>PIC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $vehicle as $d )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->tugas }}</td>
                                        <td>{{ $d->vehicle_type }}</td>
                                        <td>{{ $d->no_polisi}}</td>
                                        <td>{{ $d->user_peralatan}}</td>
                                        <td>{{ \Carbon\Carbon::parse($d->tanggal)->format('j F Y') }}</td>
                                        <td>{{ $d->name }}</td>
                                    </tr>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen input
        const tableSearch = document.getElementById('table_search');
        const startDate = document.getElementById('start_date');

        // Fungsi untuk mengambil data berdasarkan input
        function fetchVehicles() {
            const query = tableSearch.value.trim(); // Nilai input pencarian
            const start_date = startDate.value;      // Nilai input tanggal

            // Buat parameter query URL
            const params = new URLSearchParams();
            if (query) params.append('query', query);
            if (start_date) params.append('start_date', start_date);

            fetch(`/search-vehicles?${params.toString()}`)
                .then(response => response.json())
                .then(data => {
                    let rows = '';

                    // Cek apakah ada data yang diterima
                    if (data.length > 0) {
                        // Filter data berdasarkan pencarian dan tanggal yang dipilih
                        const filteredData = data.filter(vehicle => {
                            const vehicleDate = new Date(vehicle.tanggal).toISOString().split('T')[0]; // Mengambil tanggal dalam format YYYY-MM-DD
                            const matchesQuery = vehicle.user.toLowerCase().includes(query.toLowerCase()) || // Pencarian pada user
                                                 vehicle.vehicle_name.toLowerCase().includes(query.toLowerCase()) || // Pencarian pada nama kendaraan
                                                 vehicle.vehicle_type.toLowerCase().includes(query.toLowerCase()) || // Pencarian pada tipe kendaraan
                                                 vehicle.vehicle_condition.toLowerCase().includes(query.toLowerCase()); // Pencarian pada kondisi kendaraan
                            
                            // Cocokkan dengan tanggal yang dipilih jika ada
                            if (start_date) {
                                return matchesQuery && vehicleDate === start_date;
                            } 
                            return matchesQuery; // Hanya pencarian jika tidak ada tanggal
                        });

                        // Cek apakah ada data setelah pemfilteran
                        if (filteredData.length > 0) {
                            filteredData.forEach((vehicle, index) => {
                                rows += `
                                    <tr>
                                        <td>${index + 1}</td>
                                        <td>${vehicle.user}</td>
                                        <td>${vehicle.vehicle_name}</td>
                                        <td>${vehicle.vehicle_type}</td>
                                        <td>${vehicle.vehicle_condition}</td>
                                        <td>${vehicle.tanggal}</td>
                                        <td>${vehicle.oli_kurang}</td>
                                        <td>${vehicle.oli_lebih}</td>
                                        <td>${vehicle.catatan}</td>
                                        <td>
                                            ${vehicle.vehicle_type === 'Operasional' ? `
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-operasional-${vehicle.id}">
                                                    <i class="fas fa-print"></i> Cetak operasional
                                                </button>
                                            ` : ''}
                                            ${vehicle.vehicle_type === 'Crash Car' ? `
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cetak-crashcar-${vehicle.id}">
                                                    <i class="fas fa-print"></i> Cetak crashcar
                                                </button>
                                            ` : ''}
                                        </td>
                                    </tr>
                                `;
                            });
                        } else {
                            // Tidak ada data yang cocok dengan pencarian
                            rows = `<tr><td colspan="10" class="text-center">Data tidak ditemukan</td></tr>`;
                        }
                    } else {
                        rows = `<tr><td colspan="10" class="text-center">Data tidak ditemukan</td></tr>`;
                    }

                    document.querySelector('tbody').innerHTML = rows;
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Event listener saat user mengetik di input pencarian atau memilih tanggal
        tableSearch.addEventListener('keyup', fetchVehicles);
        startDate.addEventListener('change', fetchVehicles);
    });
</script>

@endsection
