@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- Bisa ditambahkan judul halaman di sini jika perlu, misal: --}}
                    {{-- <h1 class="m-0">Data Sparepart</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sparepart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title mb-0 font-weight-bold" style="font-size: 1.5rem;">Manage Sparepart</h3>
                            <a href="#" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#modalTambah">
                                Tambah Data <i class="fas fa-plus ml-2"></i>
                            </a>
                        </div>

                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <table class="table table-bordered table-striped" id="example2"> {{-- Pastikan id="example2" sesuai dengan inisiasi DataTables Anda jika menggunakan --}}
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Merk Barang</th>
                                        <th>PnP</th>
                                        <th>Plat Number</th>
                                        <th>Peralatan</th>
                                        <th>Volume</th>
                                        <th>Lokasi</th>
                                        <th>Satuan</th>
                                        <th>Kondisi</th>
                                        <th>User</th>
                                        <th>Tgl Masuk</th>
                                        <th>Tgl Keluar/Update</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sparepart as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->merk_barang }}</td>
                                        <td>{{ $item->pnp }}</td>
                                        <td>{{ $item->plat_number }}</td>
                                        <td>
                                            <form action="{{ route('admin.update_peralatan', $item->id) }}" method="POST" class="form-inline-update">
                                                @csrf
                                                @method('PUT')
                                                <select name="peralatan" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="-" {{ $item->peralatan == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                                    @foreach($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->vehicle_name }}" {{ $item->peralatan == $vehicle->vehicle_name ? 'selected' : '' }}>
                                                        {{ $vehicle->vehicle_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ $item->volume }}</td>
                                        <td>
                                            <form action="{{ route('admin.update_lokasi', $item->id) }}" method="POST" class="form-inline-update">
                                                @csrf
                                                @method('PUT')
                                                <select name="lokasi" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="-" {{ $item->lokasi == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                                    <option value="CONTAINER 1" {{ $item->lokasi == 'CONTAINER 1' ? 'selected' : '' }}>CONTAINER 1</option>
                                                    <option value="CONTAINER 2" {{ $item->lokasi == 'CONTAINER 2' ? 'selected' : '' }}>CONTAINER 2</option>
                                                    <option value="CONTAINER 3" {{ $item->lokasi == 'CONTAINER 3' ? 'selected' : '' }}>CONTAINER 3</option>
                                                    <option value="CONTAINER 4" {{ $item->lokasi == 'CONTAINER 4' ? 'selected' : '' }}>CONTAINER 4</option>
                                                    <option value="RAK 1 LEMARI 1" {{ $item->lokasi == 'RAK 1 LEMARI 1' ? 'selected' : '' }}>RAK 1 LEMARI 1</option>
                                                    <option value="RAK 2 LEMARI 1" {{ $item->lokasi == 'RAK 2 LEMARI 1' ? 'selected' : '' }}>RAK 2 LEMARI 1</option>
                                                    <option value="RAK 3 LEMARI 1" {{ $item->lokasi == 'RAK 3 LEMARI 1' ? 'selected' : '' }}>RAK 3 LEMARI 1</option>
                                                    <option value="RAK 4 LEMARI 1" {{ $item->lokasi == 'RAK 4 LEMARI 1' ? 'selected' : '' }}>RAK 4 LEMARI 1</option>
                                                    <option value="GUDANG BELAKANG" {{ $item->lokasi == 'GUDANG BELAKANG' ? 'selected' : '' }}>GUDANG BELAKANG</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.update_satuan', $item->id) }}" method="POST" class="form-inline-update">
                                                @csrf
                                                @method('PUT')
                                                <select name="satuan" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="-" {{ $item->satuan == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                                    <option value="Un" {{ $item->satuan == 'Un' ? 'selected' : '' }}>Un</option>
                                                    <option value="Set" {{ $item->satuan == 'Set' ? 'selected' : '' }}>Set</option>
                                                    <option value="Meter" {{ $item->satuan == 'Meter' ? 'selected' : '' }}>Meter</option>
                                                    <option value="Centi" {{ $item->satuan == 'Centi' ? 'selected' : '' }}>Centi</option>
                                                    <option value="Gram" {{ $item->satuan == 'Gram' ? 'selected' : '' }}>Gram</option>
                                                    <option value="Kilo" {{ $item->satuan == 'Kilo' ? 'selected' : '' }}>Kilo</option>
                                                    <option value="Galon" {{ $item->satuan == 'Galon' ? 'selected' : '' }}>Galon</option>
                                                    <option value="Pail" {{ $item->satuan == 'Pail' ? 'selected' : '' }}>Pail</option>
                                                    <option value="Botol" {{ $item->satuan == 'Botol' ? 'selected' : '' }}>Botol</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.update_kondisi', $item->id) }}" method="POST" class="form-inline-update">
                                                @csrf
                                                @method('PUT')
                                                <select name="kondisi" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="-" {{ $item->kondisi == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                                    <option value="Baru" {{ $item->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                                                    <option value="Bekas" {{ $item->kondisi == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.update_user', $item->id) }}" method="POST" class="form-inline-update">
                                                @csrf
                                                @method('PUT')
                                                <select name="user" class="form-control form-control-sm" onchange="this.form.submit()">
                                                    <option value="-" {{ $item->user == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                                    @foreach($user as $u)
                                                    <option value="{{ $u->name }}" {{ $item->user == $u->name ? 'selected' : '' }}>
                                                        {{ $u->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                        <td>{{ $item->updated_at->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEdit{{ $item->id }}" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $item->id }}" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Edit Data Sparepart</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.update_sparepart', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_nama_barang_{{ $item->id }}">Nama Barang</label>
                                                                    <input type="text" id="edit_nama_barang_{{ $item->id }}" name="nama_barang" class="form-control" value="{{ old('nama_barang', $item->nama_barang) }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_merk_barang_{{ $item->id }}">Merk Barang</label>
                                                                    <input type="text" id="edit_merk_barang_{{ $item->id }}" name="merk_barang" class="form-control" value="{{ old('merk_barang', $item->merk_barang) }}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_pnp_{{ $item->id }}">PnP</label>
                                                                    <input type="text" id="edit_pnp_{{ $item->id }}" name="pnp" class="form-control" value="{{ old('pnp', $item->pnp) }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_plat_number_{{ $item->id }}">Plat Number</label>
                                                                    <input type="text" id="edit_plat_number_{{ $item->id }}" name="plat_number" class="form-control" value="{{ old('plat_number', $item->plat_number) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_volume_{{ $item->id }}">Volume</label>
                                                                    <input type="number" id="edit_volume_{{ $item->id }}" name="volume" class="form-control" value="{{ old('volume', $item->volume) }}" required min="0">
                                                                </div>
                                                            </div>
                                                            {{-- CATATAN: Field Peralatan, Lokasi, Satuan, Kondisi, dan User diupdate via select di tabel. --}}
                                                            {{-- Jika Anda ingin field-field tersebut juga dapat diubah dari Modal Edit ini, --}}
                                                            {{-- Anda perlu menambahkan inputnya di sini (contoh di bawah) DAN --}}
                                                            {{-- memastikan controller `update_sparepart` juga menghandle update field-field tersebut. --}}

                                                            {{-- Contoh jika ingin menambahkan field Peralatan di modal edit:
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="edit_peralatan_{{ $item->id }}">Peralatan</label>
                                                                    <select id="edit_peralatan_{{ $item->id }}" name="peralatan" class="form-control">
                                                                        <option value="-" {{ old('peralatan', $item->peralatan) == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                                                        @foreach($vehicles as $vehicle)
                                                                            <option value="{{ $vehicle->vehicle_name }}" {{ old('peralatan', $item->peralatan) == $vehicle->vehicle_name ? 'selected' : '' }}>
                                                                                {{ $vehicle->vehicle_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            --}}
                                                        </div>
                                                        {{-- Tambahkan row dan col-md-6 lainnya jika ada field tambahan yang ingin diedit dari modal ini --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content"> {{-- Dihapus bg-danger agar konsisten, bisa dikembalikan jika diinginkan --}}
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="hapusModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus data sparepart:</p>
                                                    <p><strong>Nama Barang: {{ $item->nama_barang }}</strong></p>
                                                    <p>Merk: {{ $item->merk_barang ?? '-' }}</p>
                                                    <p>PnP: {{ $item->pnp ?? '-' }}</p>
                                                    <p class="text-danger">Tindakan ini tidak dapat dibatalkan.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form action="{{ route('admin.destroy_sparepart', $item->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <tr>
                                        <td colspan="14" class="text-center">Belum ada data sparepart.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Tambah Data Sparepart Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store_sparepart') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" value="{{ old('nama_barang') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="merk_barang">Merk Barang</label>
                                    <input type="text" id="merk_barang" name="merk_barang" class="form-control" placeholder="Masukkan Merk Barang" value="{{ old('merk_barang') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pnp">PnP (Part Number / Product)</label>
                                    <input type="text" id="pnp" name="pnp" class="form-control" placeholder="Masukkan PnP" value="{{ old('pnp') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="plat_number">Plat Number (Jika terkait)</label>
                                    <input type="text" id="plat_number" name="plat_number" class="form-control" placeholder="Masukkan Plat Number" value="{{ old('plat_number') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="peralatan">Peralatan</label>
                                    <select id="peralatan" name="peralatan" class="form-control" required>
                                        <option value="" disabled {{ old('peralatan') ? '' : 'selected' }}>-- Pilih Peralatan --</option>
                                        <option value="-" {{ old('peralatan') == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                        @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->vehicle_name }}" {{ old('peralatan') == $vehicle->vehicle_name ? 'selected' : '' }}>{{ $vehicle->vehicle_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="volume">Volume / Jumlah</label>
                                    <input type="number" id="volume" name="volume" class="form-control" placeholder="Masukkan Volume" value="{{ old('volume') }}" required min="0">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi Penyimpanan</label>
                                    <select id="lokasi" name="lokasi" class="form-control" required>
                                        <option value="" disabled {{ old('lokasi') ? '' : 'selected' }}>-- Pilih Lokasi --</option>
                                        <option value="-" {{ old('lokasi') == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                        <option value="CONTAINER 1" {{ old('lokasi') == 'CONTAINER 1' ? 'selected' : '' }}>CONTAINER 1</option>
                                        <option value="CONTAINER 2" {{ old('lokasi') == 'CONTAINER 2' ? 'selected' : '' }}>CONTAINER 2</option>
                                        <option value="CONTAINER 3" {{ old('lokasi') == 'CONTAINER 3' ? 'selected' : '' }}>CONTAINER 3</option>
                                        <option value="CONTAINER 4" {{ old('lokasi') == 'CONTAINER 4' ? 'selected' : '' }}>CONTAINER 4</option>
                                        <option value="RAK 1 LEMARI 1" {{ old('lokasi') == 'RAK 1 LEMARI 1' ? 'selected' : '' }}>RAK 1 LEMARI 1</option>
                                        <option value="RAK 2 LEMARI 1" {{ old('lokasi') == 'RAK 2 LEMARI 1' ? 'selected' : '' }}>RAK 2 LEMARI 1</option>
                                        <option value="RAK 3 LEMARI 1" {{ old('lokasi') == 'RAK 3 LEMARI 1' ? 'selected' : '' }}>RAK 3 LEMARI 1</option>
                                        <option value="RAK 4 LEMARI 1" {{ old('lokasi') == 'RAK 4 LEMARI 1' ? 'selected' : '' }}>RAK 4 LEMARI 1</option>
                                        <option value="GUDANG BELAKANG" {{ old('lokasi') == 'GUDANG BELAKANG' ? 'selected' : '' }}>GUDANG BELAKANG</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <select id="satuan" name="satuan" class="form-control" required>
                                        <option value="" disabled {{ old('satuan') ? '' : 'selected' }}>-- Pilih Satuan --</option>
                                        <option value="-" {{ old('satuan') == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                        <option value="Un" {{ old('satuan') == 'Un' ? 'selected' : '' }}>Un</option>
                                        <option value="Set" {{ old('satuan') == 'Set' ? 'selected' : '' }}>Set</option>
                                        <option value="Meter" {{ old('satuan') == 'Meter' ? 'selected' : '' }}>Meter</option>
                                        <option value="Centi" {{ old('satuan') == 'Centi' ? 'selected' : '' }}>Centi</option>
                                        <option value="Gram" {{ old('satuan') == 'Gram' ? 'selected' : '' }}>Gram</option>
                                        <option value="Kilo" {{ old('satuan') == 'Kilo' ? 'selected' : '' }}>Kilo</option>
                                        <option value="Galon" {{ old('satuan') == 'Galon' ? 'selected' : '' }}>Galon</option>
                                        <option value="Pail" {{ old('satuan') == 'Pail' ? 'selected' : '' }}>Pail</option>
                                        <option value="Botol" {{ old('satuan') == 'Botol' ? 'selected' : '' }}>Botol</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kondisi">Kondisi</label>
                                    <select id="kondisi" name="kondisi" class="form-control" required>
                                        <option value="" disabled {{ old('kondisi') ? '' : 'selected' }}>-- Pilih Kondisi --</option>
                                        <option value="-" {{ old('kondisi') == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                        <option value="Baru" {{ old('kondisi') == 'Baru' ? 'selected' : '' }}>Baru</option>
                                        <option value="Bekas" {{ old('kondisi') == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_input">User</label>
                                    <select id="user_input" name="user" class="form-control" required>
                                        <option value="" disabled {{ old('user') ? '' : 'selected' }}>-- Pilih User --</option>
                                        <option value="-" {{ old('user') == '-' ? 'selected' : '' }}>- Tidak Ada -</option>
                                        @foreach($user as $u)
                                        <option value="{{ $u->name }}" {{ old('user') == $u->name ? 'selected' : '' }}>{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts') {{-- Jika Anda menggunakan @stack('scripts') di layout utama untuk JS spesifik halaman --}}
<script>
$(function () {
    // Contoh inisialisasi DataTables, sesuaikan dengan kebutuhan Anda
    // Jika Anda tidak menggunakan DataTables, Anda bisa menghapus bagian ini.
    // $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({ // Pastikan ID ini sama dengan ID tabel Anda
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    // Script untuk menangani error validasi di modal Tambah dan tetap membuka modal
    // Anda mungkin perlu logic yang lebih canggih jika menggunakan AJAX
    @if($errors->any() && old('form_type') == 'modalTambah')
        $('#modalTambah').modal('show');
    @endif
    // Anda bisa menambahkan logic serupa untuk modal Edit jika diperlukan
});
</script>
@endpush

@endsection