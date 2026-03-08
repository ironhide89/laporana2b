@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Laporan Kerusakan Kendaraan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.store_form_kerusakan') }}" method="POST" id="kerusakanForm" enctype="multipart/form-data">
                        @csrf


                        <!-- Nama Kendaraan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Kendaraan</label>
                                    <select class="form-control" name="vehicle_name" id="vehicleSelect" required>
                                        <option value="">Pilih Kendaraan</option>
                                        @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->vehicle_name }}" data-user="{{ $vehicle->user_peralatan }}"  data-type="{{ $vehicle->vehicle_type }}">{{ $vehicle->vehicle_name }}</option>
                                        @endforeach
                                    </select>
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
                                    <label>Nama User Kendaraan  </label>
                                    <input type="text" class="form-control" name="user_kendaraan" id="userPeralatan" placeholder="Nama User" required readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Kerusakan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Kerusakan</label>
                                    <input type="date" class="form-control" name="tanggal_kerusakan" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Prediksi Perbaikan</label>
                                    <input type="date" class="form-control" name="tanggal_prediksi" required>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian yang Rusak -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Bagian yang Rusak</label>
                                    <textarea class="form-control" name="bagian" id="bagian" placeholder="Masukkan Bagian Yang Rusak" rows="5" cols="50" required ></textarea>
                                </div>
                            </div>
                        </div>

                    

                       <!-- Penyebab Kerusakan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Penyebab Kerusakan</label>
                                    <textarea class="form-control" name="penyebab" id="penyebab" placeholder="Masukkan Penyebab Kerusakan" rows="5" cols="50" required ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tindakan Perbaikan</label>
                                    <textarea class="form-control" name="tindakan" id="tindakan" placeholder="Masukkan Tindakan Perbaikan" rows="5" cols="50" required ></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- Tindakan -->

                        <!-- Klasifikasi Kerusakan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Klasifikasi Kerusakan</label>
                                    <select class="form-control" name="klasifikasi" required>
                                        <option value="Ringan">Ringan</option>
                                        <option value="Sedang">Sedang</option>
                                        <option value="Berat">Berat</option>
                                        <option value="Sangat Berat">Sangat Berat</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kondisi Kendaraan</label>
                                    <select class="form-control" name="vehicle_condition" required>
                                        <option value="Serviceable">Serviceable</option>
                                        <option value="Unserviceable">Unserviceable</option>
                                        <option value="Serviceable Dengan Catatan">Serviceable Dengan Catatan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Foto Kerusakan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Foto Kerusakan</label>
                                    <input type="file" class="form-control" name="foto_kerusakan[]" accept="image/*" required multiple>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal Prediksi Perbaikan</label>
                                    <input type="date" class="form-control" name="tanggal_kerusakan" required>
                                </div>
                            </div>
                        </div> --}}

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
        var userPeralatan = selectedOption.getAttribute('data-user');


        // Cek apakah nama pengguna tersedia
       

        document.getElementById('vehicleType').value = vehicleType; // Mengisi field jenis kendaraan
        document.getElementById('userPeralatan').value = userPeralatan; // Mengisi field jenis kendaraan
    });
</script>

@endsection
