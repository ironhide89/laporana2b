@extends('layout.mainuser')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Kerusakan Fasilitas</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store_logbooknew') }}" method="POST" id="perbaikanForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Dinas</label>
                                    <input type="text" class="form-control" name="nama_dinas" id="namaDinas" 
                                           placeholder="Nama Dinas" required readonly 
                                           value="{{ $todolist->nama_dinas ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- Nama Teknisi -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Teknisi</label>
                                    <input type="text" class="form-control" name="name" id="names" 
                                           placeholder="Nama PIC" required readonly 
                                           value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                        </div>

                        <!-- Nama Kendaraan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nama Kendaraan</label>
                                    <select class="form-control" name="vehicle_name" id="vehicle_name" required>
                                        <option value="">Pilih Kendaraan</option>
                                        @foreach($vehicles as $vehicle)
                                            <option value="{{ $vehicle->vehicle_name }}">{{ $vehicle->vehicle_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" id="tanggals" 
                                           required readonly value="{{ $todays }}">
                                </div>
                            </div>
                        </div>

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

                        <!-- Kegiatan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Detail Perbaikan</label>
                                    <textarea class="form-control" name="kegiatan" id="kegiatan" placeholder="Detail Perbaikan" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Foto Kegiatan -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Foto Kegiatan</label>
                                    <input type="file" class="form-control" name="foto_kendaraan[]" accept="image/*" multiple>
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


<script>
    window.addEventListener("load", function() {
        const namaDinasInput = document.getElementById('namaDinas');
        
        // Jika tidak ada data, set nilai default
        if (namaDinasInput.value === '') {
            namaDinasInput.value = 'Tidak ada data';
        }
    });
</script>
<!-- Script untuk mengisi jenis kendaraan dan nama user -->
@endsection
