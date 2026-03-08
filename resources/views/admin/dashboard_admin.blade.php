@extends('layout.main')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard_admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="content-header">
      <div class="container-fluid text-center">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0" id="dashboard-title" style="font-size: 60px;">DASHBOARD PEFORMA HEAVY EQUIPMENT</h1>
            <p id="current-date-time" style="font-size: 40px;"></p>
            <h1>
              <h1>
                <a href="{{ route('admin.cetak_dashboard') }}" class="btn btn-primary btn-lg">Cetak PDF</a>
            </h1>            
          </h1>   
          </div>
        </div>
      </div>
    </div>
    
    


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="text-center">DASHBOARD PEFORMA HEAVY EQUIPMENT</h5>

               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                          <strong> {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd D MMMM YYYY, HH:mm:ss') }}</strong>
                        </p>
            
                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" height="180" style="height: 290px;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>Klasifikasi Kendaraan</strong>
                        </p>
            
                        @foreach ($total_klasifikasi as $index => $total)
                            @php
                                $good_condition = $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)
                                                                ->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])
                                                                ->sum('total');
                                $unserviceable = $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)
                                                              ->where('vehicle_condition', 'Unserviceable')
                                                              ->sum('total');
                                $total_condition = $good_condition + $unserviceable;
                                $percentage = $total_condition > 0 ? ($good_condition / $total_condition) * 100 : 0;
                                $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-secondary'];
                                $color = $colors[$index % count($colors)];
                            @endphp
                            <div class="progress-group">
                                {{ $total->klasifikasi_kendaraan }}
                                <span class="float-right"><b>{{ $good_condition }}</b>/{{ $total_condition }}</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar {{ $color }}" style="width: {{ $percentage }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
             
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Kategori Bandara</h3>
                  </div>
                    <div class="card-header">
                    <h3 class="card-title">Total Volume {{ $kategori }} Liter</h3>
                  </div>
                 
                  <!-- /.card-header -->
                  <div class="card-body">
                  
                    @php
                        $kategori_bandara = [
                            ['Kategori Bandara 10', 32300, 50000],
                            ['Kategori Bandara 9', 24300, 32300],
                            ['Kategori Bandara 8', 18200, 24300],
                            ['Kategori Bandara 7', 12100, 18200],
                            ['Kategori Bandara 6', 7900, 12100],
                            ['Kategori Bandara 5', 5400, 7900],
                            ['Kategori Bandara 4', 2400, 5400],
                            ['Kategori Bandara 3', 1200, 2400],
                            ['Kategori Bandara 2', 670, 1200],
                            ['Kategori Bandara 1', 230, 670],
                        ];
                    @endphp
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                      @foreach ($kategori_bandara as $bandara)
                        @php
                            $isSelected = $kategori > $bandara[1] && $kategori <= $bandara[2];
                        @endphp
                        <li class="item {{ $isSelected ? 'bg-success' : '' }}">
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{ $bandara[0] }}</a>
                            <span class="product-description">
                              Kapasitas Tangki: {{ $bandara[1] }} Liter
                            </span>
                          </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Total Kendaraan Serviceable</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart-responsive">
                                    <canvas id="pieChart" height="200"></canvas>
                                </div>
                            </div>
                            <div class="col">
                                <ul class="chart-legend clearfix">
                                    <li><i class="far fa-circle text-danger"></i> PKPPK: <strong>{{ $percent_ppkpk }}%</strong></li>
                                    <li><i class="far fa-circle text-success"></i> Crash Car: <strong>{{ $percent_crashcar }}%</strong></li>
                                    <li><i class="far fa-circle text-warning"></i> Operasional: <strong>{{ $percent_operasional }}%</strong></li>
                                    <li><i class="far fa-circle text-info"></i> Alat Berat: <strong>{{ $percent_alatberat }}%</strong></li>
                                    <li><i class="far fa-circle text-primary"></i> Peralatan: <strong>{{ $percent_peralatan }}%</strong></li>
                                    <li><i class="far fa-circle text-secondary"></i> Motor Dinas: <strong>{{ $percent_motordinas }}%</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                  <!-- /.col -->
                </div>
            <!-- /.row -->
            
          </div>
          <!-- /.col -->

          

          <div class="col">
            <!-- Info Boxes Style 2 -->
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Kesimpulan Kendaraan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   
                  <!-- Output Persentase Serviceable -->
                  <div class="row">
                      <div class="col">
                          <div class="card bg-light">
                              <div class="card-body text-center">
                                  <p class="text-success" style="font-size: 60px"><strong>{{ floor($percentageServiceable) }}%</strong></p>
                                  <h5 class="text">Persentase Kendaraan Serviceable</h5>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
          
          </div>
            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Kerusakan Kendaraan</h3>
            </div>
          <!-- /.card-header -->
                      <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0"  id="example2">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peralatan</th>
                                    <th>Kondisi Kendaraan</th>
                                    <th>Bagian</th>
                                    <th>Tindakan</th>
                                    <th>Tanggal Prediksi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($vehicle as $d)
                                <tr>
                                    <td>{{ $loop->iteration}}</a></td>
                                    <td>{{ $d->vehicle_name }}</td>
                                    <td>
                                        <span class="badge 
                                            {{ $d->vehicle_condition == 'Serviceable' ? 'badge-success' : 
                                                ($d->vehicle_condition == 'Unserviceable' ? 'badge-danger' : 'badge-warning') }}">
                                            {{ $d->vehicle_condition }}
                                        </span>
                                    </td>
                                    <td>{{ $d->bagian }}</td>
                                    <td>{{ $d->tindakan}}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->tanggal_prediksi)->format('j F Y') }}</td>
                                    <td>
                                      @if($d->tampil_cetak == 0)
                                      <form action="{{ route('admin.update_tampil', ['id' => $d->id]) }}" method="POST" style="display: inline;">
                                          @csrf
                                          @method('PUT')
                                          <button type="submit" class="btn btn-success btn-sm">
                                              <i class="fas fa-eye"></i> Tampilkan
                                          </button>
                                      </form>
                                      @elseif ($d->tampil_cetak == 1)
                                      <form action="{{ route('admin.update_hilang', ['id' => $d->id]) }}" method="POST" style="display: inline;">
                                          @csrf
                                          @method('PUT')
                                          <button type="submit" class="btn btn-secondary btn-sm">
                                              <i class="fas fa-eye-slash"></i> Hilangkan
                                          </button>
                                      </form>
                                      @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">Jadwal Checklist Bulan ini</h3>
                  </div>
                <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table m-0" id="example1">
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
                                @foreach ( $checklist as $d )
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
                  </div>
              </div>


                <div class="card">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">Kendaraan PKPPK</h3>
                  </div>
                <!-- /.card-header -->
                    <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table m-0" id="example4">
                              <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama Kendaraan</th>
                                <th>User</th>
                                <th>Status</th>
                              </tr>
                              </thead>
                              <tbody>
                                @foreach ($vehicle_ppkpk as $d)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{ $d->vehicle_name }}</td>
                                  <td>{{ $d->user_peralatan }}</td>
                                  <td class="{{ $d->vehicle_condition == 'Serviceable' ? 'bg-success text-white' : 
                                    ($d->vehicle_condition == 'Unserviceable' ? 'bg-danger text-white' : 
                                    ($d->vehicle_condition == 'Serviceable Dengan Catatan' ? 'bg-warning text-white' : '')) }}">
                            {{ $d->vehicle_condition }}
                        </td>
            
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>


              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Alat Alat Berat</h3>
                </div>
              <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0" id="example5">
                            <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Kendaraan</th>
                              <th>User</th>
                              <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($vehicle_alatberat as $d)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $d->vehicle_name }}</td>
                                <td>{{ $d->user_peralatan }}</td>
                                <td class="{{ $d->vehicle_condition == 'Serviceable' ? 'bg-success text-white' : 
                                  ($d->vehicle_condition == 'Unserviceable' ? 'bg-danger text-white' : 
                                  ($d->vehicle_condition == 'Serviceable Dengan Catatan' ? 'bg-warning text-white' : '')) }}">
                          {{ $d->vehicle_condition }}
                              </td>
          
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Crash Car</h3>
              </div>
            <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table m-0" id="example6">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Kendaraan</th>
                            <th>User</th>
                            <th>Status</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach ($vehicle_crashcar as $d)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{ $d->vehicle_name }}</td>
                              <td>{{ $d->user_peralatan }}</td>
                              <td class="{{ $d->vehicle_condition == 'Serviceable' ? 'bg-success text-white' : 
                                ($d->vehicle_condition == 'Unserviceable' ? 'bg-danger text-white' : 
                                ($d->vehicle_condition == 'Serviceable Dengan Catatan' ? 'bg-warning text-white' : '')) }}">
                        {{ $d->vehicle_condition }}
                            </td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>

          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Kendaraan Operasional</h3>
            </div>
          <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0" id="example7">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kendaraan</th>
                          <th>User</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($vehicle_operasional as $d)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $d->vehicle_name }}</td>
                            <td>{{ $d->user_peralatan }}</td>
                            <td class="{{ $d->vehicle_condition == 'Serviceable' ? 'bg-success text-white' : 
                              ($d->vehicle_condition == 'Unserviceable' ? 'bg-danger text-white' : 
                              ($d->vehicle_condition == 'Serviceable Dengan Catatan' ? 'bg-warning text-white' : '')) }}">
                      {{ $d->vehicle_condition }}
                          </td>
      
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Motor Dinas</h3>
          </div>
        <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                  <table class="table m-0" id="example9">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kendaraan</th>
                        <th>User</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($vehicle_motordinas as $d)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{ $d->vehicle_name }}</td>
                          <td>{{ $d->user_peralatan }}</td>
                          <td class="{{ $d->vehicle_condition == 'Serviceable' ? 'bg-success text-white' : 
                            ($d->vehicle_condition == 'Unserviceable' ? 'bg-danger text-white' : 
                            ($d->vehicle_condition == 'Serviceable Dengan Catatan' ? 'bg-warning text-white' : '')) }}">
                    {{ $d->vehicle_condition }}
                        </td>
    
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">Peralatan</h3>
        </div>
      <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0" id="example8">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Kendaraan</th>
                      <th>User</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($vehicle_peralatan as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $d->vehicle_name }}</td>
                        <td>{{ $d->user_peralatan }}</td>
                        <td class="{{ $d->vehicle_condition == 'Serviceable' ? 'bg-success text-white' : 
                          ($d->vehicle_condition == 'Unserviceable' ? 'bg-danger text-white' : 
                          ($d->vehicle_condition == 'Serviceable Dengan Catatan' ? 'bg-warning text-white' : '')) }}">
                  {{ $d->vehicle_condition }}
                      </td>
  
                      </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
     </div>

     <div class="card">
      <div class="card-header border-transparent">
          <h3 class="card-title">Progres Pekerjaan A2B</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
          <div class="table-responsive">
              <table class="table m-0" id="example2">
                  <thead>
                  <tr>
                      <th>No</th>
                      <th>Pekerjaan</th>
                      <th>Nilai Pekerjaan</th>
                      <th>Vendor</th>
                      <th>GL Account</th>
                      <th>Status</th>
                      <th>No PO</th>
                      <th>No BAST</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($pekerjaana2b as $d)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $d->pekerjaan }}</td>
                      <td>{{ $d->nilai_pekerjaan }}</td>
                      <td>{{ $d->vendor }}</td>
                      <td>{{ $d->glaccount }}</td>
                      <td>{{ $d->status}}</td>
                      <td>{{ $d->no_po}}</td>
                      <td>{{ $d->no_bast}}</td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  


     </div><!--/. container-fluid -->
    </section>
   
      
          
        

  <script>
    function formatTanggalIndonesia(date) {
      const daysOfWeek = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
      const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
  
      const dayOfWeek = daysOfWeek[date.getDay()];
      const day = date.getDate().toString().padStart(2, "0");
      const month = months[date.getMonth()];
      const year = date.getFullYear();
  
      const hours = date.getHours().toString().padStart(2, "0");
      const minutes = date.getMinutes().toString().padStart(2, "0");
      const seconds = date.getSeconds().toString().padStart(2, "0");
  
      return `${dayOfWeek} ${day} ${month} ${year}, ${hours}:${minutes}:${seconds}`;
    }
  
    function updateDateTime() {
      const now = new Date();
      const formattedDateTime = formatTanggalIndonesia(now);
      document.getElementById("current-date-time").textContent = formattedDateTime;
    }
  
    // Update setiap detik
    setInterval(updateDateTime, 1000);
    // Panggil sekali pada awal agar langsung muncul
    updateDateTime();
  </script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Ambil elemen canvas
      var ctx = document.getElementById('pieChart').getContext('2d');

      // Data persentase dari PHP
      var data = {
          labels: [
              'PKPPK',
              'Crash Car',
              'Operasional',
              'Alat Berat',
              'Peralatan',
              'Motor Dinas'
          ],
          datasets: [{
              data: [
                  {{ $percent_ppkpk }},
                  {{ $percent_crashcar }},
                  {{ $percent_operasional }},
                  {{ $percent_alatberat }},
                  {{ $percent_peralatan }},
                  {{ $percent_motordinas }}
              ],
              backgroundColor: [
                  'rgba(220, 53, 69, 0.9)',    // PKPPK (Danger)
                  'rgba(40, 167, 69, 0.9)',   // Crash Car (Success)
                  'rgba(255, 193, 7, 0.9)',   // Operasional (Warning)
                  'rgba(23, 162, 184, 0.9)',  // Alat Berat (Info)
                  'rgba(0, 123, 255, 0.9)',   // Peralatan (Primary)
                  'rgba(108, 117, 125, 0.9)'  // Motor Dinas (Secondary)
              ],
              borderWidth: 1,
          }]
      };

      // Inisialisasi chart
      new Chart(ctx, {
          type: 'pie',
          data: data,
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      display: false // Matikan legenda bawaan Chart.js
                  },
                  tooltip: {
                      callbacks: {
                          label: function (context) {
                              var label = context.label || '';
                              var value = context.raw || 0;
                              return label + ': ' + value + '%';
                          }
                      }
                  }
              }
          }
      });
  });
</script>

<style>
  .chart-legend {
      list-style: none;
      padding: 0;
  }

  .chart-legend li {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
  }

  .chart-legend i {
      margin-right: 1px;
  }

  .chart-legend strong {
      margin-left: auto;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('salesChart').getContext('2d');

        // Data untuk chart dengan sumbu X adalah klasifikasi kendaraan dan sumbu Y adalah tanggal dalam 1 bulan
        var data = {
            labels: [
                @foreach($total_klasifikasi as $total)
                    '{{ $total->klasifikasi_kendaraan }}',
                @endforeach
            ],
            datasets: [
                {
                    label: 'Serviceable',
                    data: [
                        @foreach($total_klasifikasi as $total)
                            {{ $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)
                            ->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->sum('total') }},
                        @endforeach
                    ],
                    borderColor: 'rgba(40, 167, 69, 1)',  // Warna garis untuk kondisi 'Serviceable'
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',  // Warna background
                    borderWidth: 2,
                    fill: true  // Isi area di bawah garis
                },
                {
                    label: 'Unserviceable',
                    data: [
                        @foreach($total_klasifikasi as $total)
                            {{ $kondisi_total->where('klasifikasi_kendaraan', $total->klasifikasi_kendaraan)
                            ->where('vehicle_condition', 'Unserviceable')->sum('total') }},
                        @endforeach
                    ],
                    borderColor: 'rgba(220, 53, 69, 1)',  // Warna garis untuk kondisi 'Unserviceable'
                    backgroundColor: 'rgba(220, 53, 69, 0.2)',  // Warna background
                    borderWidth: 2,
                    fill: true  // Isi area di bawah garis
                }
            ]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Klasifikasi Kendaraan'  // Menampilkan label untuk sumbu X
                    },
                    ticks: {
                        autoSkip: false,
                        maxRotation: 45
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Kendaraan'  // Menampilkan label untuk sumbu Y
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return context.dataset.label + ': ' + context.raw + ' Kendaraan';
                        }
                    }
                }
            }
        };

        new Chart(ctx, {
            type: 'line', // Menggunakan line chart
            data: data,
            options: options
        });
    });
</script>





@endsection
