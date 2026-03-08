@extends('layout.main')

@php
    use Carbon\Carbon;
@endphp

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-size: 1.5rem;">Laporan Kerusakan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard_admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Kerusakan</li>
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
                            <h3 class="card-title font-weight-bold">Data Laporan Kerusakan Kendaraan</h3>
                        </div>

                        <div class="card-body">
                            {{-- Session Messages --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif

                            <div class="row mb-3 align-items-end border-bottom pb-3">
                                <div class="col-md-4">
                                    <label for="filter-date">Cari Berdasarkan Tanggal Kerusakan:</label>
                                    <input type="date" id="filter-date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <button id="reset-filter" class="btn btn-secondary btn-block">Reset Filter</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="kerusakan-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No BA</th>
                                            <th>User Kendaraan</th>
                                            <th>Nama Kendaraan</th>
                                            <th>Tipe Kendaraan</th>
                                            <th>Tanggal Kerusakan</th>
                                            <th>Bagian Kerusakan</th>
                                            <th>Foto</th>
                                            <th>Cetak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vehicles as $d)
                                        <tr>
                                            <td>{{-- Auto-numbered by JS --}}</td>
                                            <td>
                                                @if(is_null($d->no_ba))
                                                <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-ba-{{ $d->id }}">
                                                    <i class="fas fa-plus-circle"></i> Input No BA
                                                </a>
                                                @else
                                                    {{ $d->no_ba }}
                                                @endif
                                            </td>
                                            <td>{{ $d->user_kendaraan ?? '-' }}</td>
                                            <td>{{ $d->vehicle_name ?? '-' }}</td>
                                            <td>{{ $d->vehicle_type ?? '-' }}</td>
                                            <td data-order="{{ Carbon::parse($d->tanggal_kerusakan)->timestamp }}">
                                                {{ Carbon::parse($d->tanggal_kerusakan)->locale('id')->isoFormat('DD MMM YYYY') }}
                                            </td>
                                            <td>
                                                @if($d->bagian)
                                                <ul class="list-unstyled mb-0" style="max-width: 300px; white-space: normal;">
                                                    @foreach(explode("\n", $d->bagian) as $bagian_item)
                                                        @if(trim($bagian_item))
                                                        <li><small><i class="fas fa-exclamation-circle text-danger me-1"></i> {{ trim($bagian_item) }}</small></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>
                                                @if($d->foto_kerusakan)
                                                <div class="d-flex flex-wrap align-items-center" style="gap: 5px;">
                                                    @foreach(explode(',', $d->foto_kerusakan) as $foto)
                                                        @php $fotoTrimmed = trim($foto); @endphp
                                                        @if(!empty($fotoTrimmed))
                                                        <div class="text-center">
                                                            <a href="{{ asset('foto_kerusakan/' . $fotoTrimmed) }}" data-toggle="lightbox" data-gallery="gallery-kerusakan-{{ $d->id }}">
                                                                <img src="{{ asset('foto_kerusakan/' . $fotoTrimmed) }}" alt="Foto Kerusakan" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                            </a>
                                                            <a href="{{ asset('foto_kerusakan/' . $fotoTrimmed) }}" download="{{ $fotoTrimmed }}" class="btn btn-xs btn-outline-secondary mt-1 d-block" title="Unduh Gambar {{ $fotoTrimmed }}">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                @else
                                                    <span class="text-muted small">Tidak Ada Foto</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.cetak_kerusakan', ['id' => $d->id]) }}" target="_blank" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-print me-1"></i> Cetak BA
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit-{{ $d->id }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-danger-{{ $d->id }}">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($vehicles->isEmpty())
                                <div class="text-center text-muted p-4">Belum ada data laporan kerusakan.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Modals --}}
@foreach ($vehicles as $d)
    {{-- Edit Modal --}}
    <div class="modal fade" id="modal-edit-{{ $d->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Laporan Kerusakan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update_kerusakan', $d->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3"><label>No BA</label><input type="text" class="form-control" name="no_ba" value="{{ old('no_ba', $d->no_ba) }}"></div>
                                <div class="form-group mb-3"><label>User Kendaraan</label><input type="text" class="form-control" name="user_kendaraan" value="{{ old('user_kendaraan', $d->user_kendaraan) }}"></div>
                                <div class="form-group mb-3"><label>Nama Kendaraan</label><input type="text" class="form-control" value="{{ $d->vehicle_name }}" readonly></div>
                                <div class="form-group mb-3"><label>Tipe Kendaraan</label><input type="text" class="form-control" value="{{ $d->vehicle_type }}" readonly></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3"><label>Tanggal Kerusakan</label><input type="date" class="form-control" name="tanggal_kerusakan" value="{{ old('tanggal_kerusakan', $d->tanggal_kerusakan) }}" required></div>
                                <div class="form-group mb-3"><label>Bagian Kerusakan</label><textarea class="form-control" name="bagian" rows="5" required>{{ old('bagian', $d->bagian) }}</textarea></div>
                                <div class="form-group mb-3"><label>Upload Foto Baru (Opsional)</label><input type="file" class="form-control" name="foto_kerusakan[]" multiple><small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small></div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- BA Modal --}}
    <div class="modal fade" id="modal-ba-{{ $d->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Nomor BA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update_kerusakan', $d->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group"><label>No BA</label><input type="text" class="form-control" name="no_ba" placeholder="Masukkan Nomor BA" required></div>
                        <input type="hidden" name="user_kendaraan" value="{{ $d->user_kendaraan }}">
                        <input type="hidden" name="tanggal_kerusakan" value="{{ $d->tanggal_kerusakan }}">
                        <input type="hidden" name="bagian" value="{{ $d->bagian }}">
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan No BA</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="modal-danger-{{ $d->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus laporan kerusakan ini?</p>
                    <p><strong>Kendaraan:</strong> {{ $d->vehicle_name }}<br><strong>Tanggal:</strong> {{ Carbon::parse($d->tanggal_kerusakan)->locale('id')->isoFormat('DD MMMM YYYY') }}</p>
                    <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="{{ route('admin.delete_kerusakan', $d->id )}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
    .img-thumbnail { border: 1px solid #dee2e6; cursor: pointer; }
    .btn-group .btn { margin-right: 5px; }
    .btn-group .btn:last-child { margin-right: 0; }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
$(function () {
    const table = $('#kerusakan-table').DataTable({
        "paging": true, "lengthChange": true, "searching": true,
        "ordering": true, "info": true, "autoWidth": false, "responsive": true,
        "order": [[ 5, "desc" ]], // Order by Tanggal Kerusakan descending
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json" },
        "columnDefs": [ { "searchable": false, "orderable": false, "targets": 0 } ]
    });

    table.on('order.dt search.dt', function () {
        let i = 1;
        table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            let filterDate = $('#filter-date').val();
            if (!filterDate) { return true; }
            let rowDateText = data[5]; // Target column 6 (index 5) for Tanggal Kerusakan
            let dateParts = rowDateText.split(" ");
            let day = dateParts[0].padStart(2, '0');
            let monthMap = { "Jan": "01", "Feb": "02", "Mar": "03", "Apr": "04", "Mei": "05", "Jun": "06", "Jul": "07", "Agu": "08", "Sep": "09", "Okt": "10", "Nov": "11", "Des": "12" };
            let month = monthMap[dateParts[1]];
            let year = dateParts[2];
            let formattedRowDate = `${year}-${month}-${day}`;
            return formattedRowDate === filterDate;
        }
    );

    $('#filter-date').on('change', function () { table.draw(); });
    $('#reset-filter').on('click', function() { $('#filter-date').val(''); table.draw(); });
});
</script>
@endpush