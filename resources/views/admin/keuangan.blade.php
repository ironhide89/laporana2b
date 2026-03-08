@extends('layout.main') {{-- Make sure this layout includes necessary CSS/JS for AdminLTE/Bootstrap --}}
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- Optional Title Here --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Keuangan</li>
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
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center flex-wrap"> 
                    <h3 class="card-title mb-2 mb-md-0 font-weight-bold" style="font-size: 1.5rem;">Manage Keuangan</h3>

                     {{-- Display Total Harga Keseluruhan --}}
                    <div class="text-md-right">
                        <span class="badge bg-success p-2" style="font-size: 1rem;"> {{-- Anda bisa ganti bg-success atau biarkan bg-info --}}
                        Total Harga Keseluruhan: Rp {{ number_format($totalPengeluaran ?? 0, 0, ',', '.') }}
                        </span>
                    </div>
                     {{-- <a href="{{ route('user.create_keuangan') }}" class="btn btn-primary mt-2 mt-md-0 ms-md-auto">Tambah Pengeluaran</a> --}}
                </div>
              </div>

              <div class="card-body">
                {{-- Display Success/Error Messages --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                 @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive"> 
                    <table class="table table-bordered table-striped" id="example2"> 
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Tanggal</th>
                              <th>Item Pengeluaran</th>
                              <th>Detail Pengeluaran</th>
                              <th>Satuan</th>
                              <th>Volume</th>
                              <th>Harga Satuan</th>
                              <th>Total Harga</th> 
                              <th>Foto Nota</th>
                              <th>Pengisi</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @forelse ($keuangan as $d)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  {{-- Format tanggal jika perlu --}}
                                  <td>{{ \Carbon\Carbon::parse($d->tanggal ?? $d->created_at)->locale('id')->isoFormat('DD MMM YY') }}</td> 
                                  <td>
                                      {{-- Inline form for item --}}
                                      <form action="{{ route('admin.update_item', $d->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('PUT')
                                          <select name="item" class="form-control form-control-sm" onchange="this.form.submit()" title="Ubah Item">
                                              <option value="-" {{ $d->item == '-' ? 'selected' : '' }}>Tidak Ada</option>
                                              <option value="Makan/Minum" {{ $d->item == 'Makan/Minum' ? 'selected' : '' }}>Makan/Minum</option>
                                              <option value="Pulsa/Paketan" {{ $d->item == 'Pulsa/Paketan' ? 'selected' : '' }}>Pulsa/Paketan</option>
                                              <option value="Makanan Hewan" {{ $d->item == 'Makanan Hewan' ? 'selected' : '' }}>Makanan Hewan</option>
                                              <option value="Alat Tulis Kantor" {{ $d->item == 'Alat Tulis Kantor' ? 'selected' : '' }}>Alat Tulis Kantor</option>
                                              {{-- Loop for vehicles - ensure $vehicle is passed to this view --}}
                                              @isset($vehicle)
                                                @foreach($vehicle as $vehicles)
                                                    <option value="{{ $vehicles->vehicle_name }}" {{ $d->item == $vehicles->vehicle_name ? 'selected' : '' }}>
                                                        {{ $vehicles->vehicle_name }}
                                                    </option>
                                                @endforeach
                                              @endisset
                                              <option value="Lain Lain" {{ $d->item == 'Lain Lain' ? 'selected' : '' }}>Lain Lain</option>
                                          </select>
                                      </form>
                                  </td>
                                  <td>
                                      {{-- Inline form for detail --}}
                                      <form action="{{ route('admin.update_detail', $d->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('PUT')
                                          <input type="text" name="detail" class="form-control form-control-sm" value="{{ $d->detail }}" onchange="this.form.submit()" title="Ubah Detail">
                                      </form>
                                  </td>
                                  <td>
                                     {{-- Inline form for satuan --}}
                                      <form action="{{ route('admin.update_satuan_keuangan', $d->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('PUT')
                                          <select name="satuan" class="form-control form-control-sm" onchange="this.form.submit()" title="Ubah Satuan">
                                              <option value="-" {{ $d->satuan == '-' ? 'selected' : '' }}>-</option>
                                              <option value="UN" {{ $d->satuan == 'UN' ? 'selected' : '' }}>UN</option>
                                              <option value="LS" {{ $d->satuan == 'LS' ? 'selected' : '' }}>LS</option>
                                              <option value="SET" {{ $d->satuan == 'SET' ? 'selected' : '' }}>SET</option>
                                              <option value="KG" {{ $d->satuan == 'KG' ? 'selected' : '' }}>KG</option>
                                              <option value="L" {{ $d->satuan == 'L' ? 'selected' : '' }}>L</option>
                                              <option value="M" {{ $d->satuan == 'M' ? 'selected' : '' }}>M</option>
                                              <option value="CM" {{ $d->satuan == 'CM' ? 'selected' : '' }}>CM</option>
                                              <option value="MM" {{ $d->satuan == 'MM' ? 'selected' : '' }}>MM</option>
                                          </select>
                                      </form>
                                  </td>
                                   <td>
                                      {{-- Inline form for volume --}}
                                      <form action="{{ route('admin.update_volume', $d->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('PUT')
                                          <input type="number" step="any" name="volume" class="form-control form-control-sm" value="{{ $d->volume }}" onchange="this.form.submit()" title="Ubah Volume">
                                      </form>
                                  </td>
                                  <td>
                                      {{-- Inline form for harga --}}
                                      <form action="{{ route('admin.update_harga', $d->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('PUT')
                                          <input type="number" step="any" name="harga" class="form-control form-control-sm" value="{{ $d->harga }}" onchange="this.form.submit()" title="Ubah Harga">
                                      </form>
                                  </td>
                                  {{-- Calculate and Display Total Price per Item --}}
                                  <td class="text-right font-weight-bold">
                                      Rp {{ number_format(($d->volume ?? 0) * ($d->harga ?? 0), 0, ',', '.') }}
                                  </td>
                                  <td>
    {{-- Display Multiple Images and Download Buttons --}}
    @if($d->foto_nota)
        <div class="d-flex flex-column align-items-center">
            @foreach(explode(',', $d->foto_nota) as $filename)
                @php
                    // Trim any whitespace around filenames
                    $filename = trim($filename);
                @endphp
                @if($filename) {{-- Ensure filename is not empty after trim --}}
                    <div class="mb-2 text-center">
                        <a href="{{ asset('foto_nota/' . $filename) }}" data-toggle="lightbox" data-title="{{ $d->item }} - {{ $d->detail }} (Nota)">
                            <img src="{{ asset('foto_nota/' . $filename) }}" alt="Nota {{ $d->item }}" class="img-thumbnail" style="max-width: 60px; max-height: 60px; object-fit: cover;">
                        </a>
                        <a href="{{ asset('foto_nota/' . $filename) }}" download="{{ $filename }}" class="btn btn-xs btn-outline-secondary mt-1" title="Unduh Gambar">
                            <i class="fas fa-download"></i>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <span class="text-muted small"> - </span>
    @endif
</td>
                                  <td>
                                      {{-- Inline form for user --}}
                                      <form action="{{ route('admin.update_user_keuangan', $d->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('PUT')
                                          <select name="user" class="form-control form-control-sm" onchange="this.form.submit()" title="Ubah Pengisi">
                                              <option value="-" {{ $d->user == '-' ? 'selected' : '' }}>Tidak Ada</option>
                                              @isset($user)
                                                  @foreach($user as $users)
                                                      <option value="{{ $users->name }}" {{ $d->user == $users->name ? 'selected' : '' }}>
                                                          {{ $users->name }}
                                                      </option>
                                                  @endforeach
                                              @endisset
                                          </select>
                                      </form>
                                  </td>
                                  <td>
                                      {{-- Delete Button triggering modal --}}
                                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $d->id }}" title="Hapus Data">
                                          <i class="fas fa-trash-alt"></i>
                                      </button>
                                  </td>
                              </tr>

                              {{-- Modal Hapus (Keep using Bootstrap 4 data attributes if layout.main uses BS4 JS) --}}
                              <div class="modal fade" id="modalHapus{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{ $d->id }}" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header bg-danger text-white">
                                              <h5 class="modal-title" id="hapusModalLabel{{ $d->id }}">Konfirmasi Hapus</h5>
                                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              <p>Apakah Anda yakin ingin menghapus item pengeluaran:</p>
                                              <p><strong>{{ $d->item }} - {{ $d->detail }}</strong>?</p>
                                              <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                              {{-- Form for DELETE request --}}
                                              <form action="{{ route('admin.destroy_keuangan', $d->id) }}" method="POST" class="d-inline">
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
                                  <td colspan="11" class="text-center text-muted py-4">Belum ada data pengeluaran.</td> 
                              </tr>
                          @endforelse
                      </tbody>
                       {{-- Optional: Footer Row for Grand Total --}}
                     
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
@endsection

@push('scripts')
{{-- Add Ekko Lightbox JS if needed --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSVlUHGcqOAXMKOVRaUSj0LsmhCDUUkBWsFsrKAbIQHKS2WJvZjAbBCKPqiGMyAWGZZ3cY4NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- DataTables JS (ensure jQuery is loaded before this) --}}
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    // Initialize Ekko Lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({ alwaysShowClose: true }); // Option to always show close button
    });

    // Initialize DataTables
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
             "order": [[ 1, "desc" ]], // Default order by date descending
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
            },
            // Optional: Add footer callback to sum total expenditure if needed dynamically
            // "footerCallback": function ( row, data, start, end, display ) { ... }
        });
    });
</script>
@endpush

@push('styles')
{{-- Add Ekko Lightbox CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfGKu+Jw57uxSyEKQLA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- DataTables CSS --}}
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
    .table td form { margin-bottom: 0; }
    .table td .form-control-sm { padding: 0.2rem 0.4rem; font-size: 0.8rem; }
    .img-thumbnail { padding: 0.15rem; background-color: #fff; border: 1px solid #dee2e6; border-radius: .25rem; max-width: 100%; height: auto; }
    .btn-sm i.fas { margin-right: 0 !important; }
    /* Ensure table fits */
    .table-responsive { overflow-x: auto; }
    /* Align total price right */
    .table td.text-right, .table th.text-right, .table tfoot th.text-right { text-align: right !important; }
</style>
@endpush

