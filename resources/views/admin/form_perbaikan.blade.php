@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Laporan Perbaikan Kendaraan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.store_form_perbaikan') }}" method="POST" id="perbaikanForm" enctype="multipart/form-data">
                        @csrf

                        <!-- Nomor Berita Acara -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>No BA</label>
                                    <select class="form-control" name="no_ba" id="vehicleSelect" required>
                                        <option value="">Pilih No Berita Acara</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->no_ba }}" 
                                                    data-vehicle="{{ $vehicle->vehicle_name }}"  
                                                    data-name="{{ $vehicle->user_kendaraan }}" 
                                                    data-type="{{ $vehicle->vehicle_type }}"
                                                    data-tanggal="{{ $vehicle->tanggal_kerusakan }}"
                                                    data-bagian="{{ $vehicle->bagian }}"
                                                    data-penyebab="{{ $vehicle->penyebab }}"
                                                    data-tindakan="{{ $vehicle->tindakan }}"
                                                    data-klasifikasi="{{ $vehicle->klasifikasi }}">{{ $vehicle->no_ba }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Kendaraan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Kendaraan</label>
                                    <input type="text" class="form-control" name="vehicle_name" id="vehicleName" placeholder="Nama Kendaraan" required readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Jenis Kendaraan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Kendaraan</label>
                                    <input type="text" class="form-control" name="vehicle_type" id="vehicleType" placeholder="Jenis Kendaraan" required readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Nama User Kendaraan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control" name="user_kendaraan" id="userKendaraan" placeholder="Nama User" required readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Kerusakan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Kerusakan</label>
                                    <input type="date" class="form-control" name="tanggal_kerusakan" id="tanggalKerusakan" required readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian yang Rusak -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Bagian yang Rusak</label>
                                    <textarea class="form-control" name="bagian" id="bagian" placeholder="Masukkan Bagian Yang Rusak" rows="5" cols="50" required readonly></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Penyebab Kerusakan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Penyebab Kerusakan</label>
                                    <textarea class="form-control" name="penyebab" id="penyebab" placeholder="Masukkan Penyebab Kerusakan" rows="5" cols="50" required readonly></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Tindakan yang Diambil -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tindakan yang Diambil</label>
                                    <textarea class="form-control" name="tindakan" id="tindakan" placeholder="Masukkan Tindakan Yang Rusak" rows="5" cols="50" required readonly></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Klasifikasi Kerusakan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Klasifikasi Kerusakan</label>
                                    <select class="form-control" name="klasifikasi" id="klasifikasi" required readonly>
                                        <option value="Ringan">Ringan</option>
                                        <option value="Sedang">Sedang</option>
                                        <option value="Berat">Berat</option>
                                        <option value="Sangat Berat">Sangat Berat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Detail Perbaikan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Detail Perbaikan</label>
                                    <textarea class="form-control" name="detail_perbaikan" placeholder="Masukkan Detail Perbaikan yang Diambil" rows="5" cols="50" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Perbaikan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Perbaikan</label>
                                    <input type="date" class="form-control" name="tanggal_perbaikan" required>
                                </div>
                            </div>
                        </div>

                        <!-- Foto Perbaikan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Foto Perbaikan</label>
                                    <input type="file" class="form-control" name="foto_perbaikan[]" accept="image/*" required multiple>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk mengisi jenis kendaraan dan nama user -->
<script>
    document.getElementById('vehicleSelect').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var vehicleType = selectedOption.getAttribute('data-type');
        var vehicleName = selectedOption.getAttribute('data-vehicle');
        var userKendaraan = selectedOption.getAttribute('data-name');
        var tanggalKerusakan = selectedOption.getAttribute('data-tanggal');
        var bagian = selectedOption.getAttribute('data-bagian');
        var penyebab = selectedOption.getAttribute('data-penyebab');
        var tindakan = selectedOption.getAttribute('data-tindakan');
        var klasifikasi = selectedOption.getAttribute('data-klasifikasi');

        document.getElementById('vehicleType').value = vehicleType;
        document.getElementById('vehicleName').value = vehicleName;
        document.getElementById('userKendaraan').value = userKendaraan;
        document.getElementById('tanggalKerusakan').value = tanggalKerusakan;
        document.getElementById('bagian').value = bagian;
        document.getElementById('penyebab').value = penyebab;
        document.getElementById('tindakan').value = tindakan;
        document.getElementById('klasifikasi').value = klasifikasi;
    });
</script>

@endsection
