@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pekerjaan</li>
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
                      <h3 class="card-title mb-0 font-weight" style="font-size: 1.5rem;">Manage Pekerjaan</h3>
                      <a href="#" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#modalTambah">
                        Tambah Pekerjaan <i class="fas fa-plus ml-2"></i>
                      </a>
                    </div>


                      <div class="card-body">
                        <table class="table table-bordered table-striped" id="example2">
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
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($datapekerjaana2b as $d)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $d->pekerjaan }}</td>
                                          <td>{{ $d->nilai_pekerjaan }}</td>
                                          <td>{{ $d->vendor }}</td>
                                          <td>{{ $d->glaccount }}</td>
                                          <td>
                                              <form action="{{ route('admin.update_status_pekerjaan', $d->id) }}" method="POST">
                                                  @csrf
                                                  @method('PUT')
                                                  <select name="status" class="form-control" onchange="this.form.submit()">
                                                      <option value="Perencanaan" {{ $d->status == 'Perencanaan' ? 'selected' : '' }}>Perencanaan</option>
                                                      <option value="Pengajuan" {{ $d->status == 'Pengajuan' ? 'selected' : '' }}>Pengajuan</option>
                                                      <option value="Kontrol Anggaran" {{ $d->status == 'Konsul Anggaran' ? 'selected' : '' }}>Kontrol Anggaran</option>
                                                      <option value="Persetujuan Pekerjaan" {{ $d->status == 'Persetujuan Pekerjaan (Dept. Head)' ? 'selected' : '' }}>Persetujuan Pekerjaan (Dept. Head)</option>
                                                      <option value="Persetujuan Pekerjaan (Div. Head)" {{ $d->status == 'Persetujuan Pekerjaan (Div. Head)' ? 'selected' : '' }}>Persetujuan Pekerjaan (Div. Head)</option>
                                                      <option value="Persetujuan Pekerjaan (GM)" {{ $d->status == 'Persetujuan Pekerjaan (GM)' ? 'selected' : '' }}>Persetujuan Pekerjaan (GM)</option>
                                                      <option value="Release PR" {{ $d->status == 'Release PR' ? 'selected' : '' }}>Release PR</option>
                                                      <option value="Aanwijzing" {{ $d->status == 'Aanwijzing' ? 'selected' : '' }}>Aanwijzing</option>
                                                      <option value="Negosiasi" {{ $d->status == 'Negosiasi' ? 'selected' : '' }}>Negosiasi</option>
                                                      <option value="Good Receipt" {{ $d->status == 'Good Receipt' ? 'selected' : '' }}>Good Receipt</option>
                                                      <option value="Pelaksanaan" {{ $d->status == 'Pelaksanaan' ? 'selected' : '' }}>Pelaksanaan</option>
                                                      <option value="BAST" {{ $d->status == 'BAST' ? 'selected' : '' }}>BAST</option>
                                                      <option value="Dibatalkan" {{ $d->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                                      <option value="Ditunda" {{ $d->status == 'Ditunda' ? 'selected' : '' }}>Ditunda</option>
                                                      <option value="Eksploitasi" {{ $d->status == 'Eksploitasi' ? 'selected' : '' }}>Eksploitasi</option>
                                                      <option value="Investasi" {{ $d->status == 'Investasi' ? 'selected' : '' }}>Investasi</option>
                                                      <option value="LVA" {{ $d->status == 'LVA' ? 'selected' : '' }}>LVA</option>
                                                  </select>
                                              </form>
                                          </td>
                                          <td>
                                              <form action="{{ route('admin.update_po', $d->id) }}" method="POST">
                                                  @csrf
                                                  @method('POST')
                                                  <input type="text" name="no_po" class="form-control" value="{{ $d->no_po }}" onchange="this.form.submit()">
                                              </form>
                                          </td>
                                          <td>
                                              <form action="{{ route('admin.update_bast', $d->id) }}" method="POST">
                                                  @csrf
                                                  @method('POST')
                                                  <input type="text" name="no_bast" class="form-control" value="{{ $d->no_bast }}" onchange="this.form.submit()">
                                              </form>
                                          </td>
                                          <td>
                                              <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEdit{{ $d->id }}">Edit</a>
                                              <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $d->id }}">Delete</a>
                                          </td>
                                      </tr>
                                      <!-- Modal Edit -->
                                      <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $d->id }}" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="editModalLabel{{ $d->id }}">Edit Data</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <form action="{{ route('admin.update_pekerjaan_a2b', $d->id) }}" method="POST" enctype="multipart/form-data">
                                                      @csrf
                                                      @method('PUT')
                                                      <div class="modal-body">
                                                          <div class="form-group">
                                                              <label for="pekerjaan">Pekerjaan</label>
                                                              <input type="text" name="pekerjaan" class="form-control" value="{{ $d->pekerjaan }}" required>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="vendor">Nilai Pekerjaan</label>
                                                              <input type="text" name="nilai_pekerjaan" class="form-control" value="{{ $d->nilai_pekerjaan }}" required>
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="vendor">Vendor</label>
                                                            <input type="text" name="vendor" class="form-control" value="{{ $d->vendor }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="vendor">GL Account</label>
                                                          <input type="text" name="glaccount" class="form-control" value="{{ $d->glaccount }}" required>
                                                      </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>

                                       <!-- Modal Tambah -->
                                        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <form action="{{ route('admin.store_pekerjaan_a2b') }}" method="POST" enctype="multipart/form-data">
                                                      @csrf
                                                      <div class="modal-body">
                                                          <div class="form-group">
                                                              <label for="pekerjaan">Pekerjaan</label>
                                                              <input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan" required>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="nilai_pekerjaan">Nilai Pekerjaan</label>
                                                              <input type="number" name="nilai_pekerjaan" class="form-control" placeholder="Masukkan Nilai Pekerjaan" required>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="vendor">Vendor</label>
                                                              <input type="text" name="vendor" class="form-control" placeholder="Masukkan Vendor" required>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="glaccount">GL Account</label>
                                                              <input type="text" name="glaccount" class="form-control" placeholder="Masukkan GL Account" required>
                                                          </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                                      </div>
                                                  </form>
                                              </div>
                                          </div>
                                        </div>


                                      <!-- Modal Hapus -->
                                      <div class="modal fade" id="modalHapus{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{ $d->id }}" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content bg-danger">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="hapusModalLabel{{ $d->id }}">Hapus Data</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <p>Apakah Anda yakin ingin menghapus data {{ $d->pekerjaan }}?</p>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                                                      <form action="{{ route('admin.destroy_pekerjaana2b', $d->id) }}" method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="btn btn-outline-light">Hapus</button>
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
@endsection


