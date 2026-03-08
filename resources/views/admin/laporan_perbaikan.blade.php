@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-size: 1.5rem;">Laporan Perbaikan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard_admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Perbaikan</li>
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
                            <h3 class="card-title font-weight-bold">Data Laporan Perbaikan Kendaraan</h3>
                        </div>

                        <div class="card-body">
                            {{-- Menampilkan Pesan Sukses/Error --}}
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

                            <div class="row mb-3 align-items-end border-bottom pb-3">
                                <div class="col-md-4">
                                    <label for="filter-date">Cari Berdasarkan Tanggal Perbaikan:</label>
                                    <input type="date" id="filter-date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <button id="reset-filter" class="btn btn-secondary btn-block">Reset Filter</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="perbaikan-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No BA</th>
                                            <th>User Kendaraan</th>
                                            <th>Nama Kendaraan</th>
                                            <th>Tipe Kendaraan</th>
                                            <th>Tanggal Perbaikan</th>
                                            <th>Catatan Perbaikan</th>
                                            <th>Foto</th>
                                            <th>Cetak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vehicles as $d)
                                        <tr>
                                            <td>{{-- Dikosongkan untuk penomoran otomatis --}}</td>
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
                                            <td data-order="{{ \Carbon\Carbon::parse($d->tanggal_perbaikan)->timestamp }}">
                                                {{ \Carbon\Carbon::parse($d->tanggal_perbaikan)->locale('id')->isoFormat('DD MMM YYYY') }}
                                            </td>
                                            <td>
                                                @if($d->detail_perbaikan)
                                                <ul class="list-unstyled mb-0" style="max-width: 300px; white-space: normal;">
                                                    @foreach(explode("\n", $d->detail_perbaikan) as $perbaikan_item)
                                                        @if(trim($perbaikan_item))
                                                        <li><small><i class="fas fa-check-circle text-success me-1"></i> {{ trim($perbaikan_item) }}</small></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>
                                                @if($d->foto_perbaikan)
                                                <div class="d-flex flex-wrap align-items-center" style="gap: 5px;">
                                                    @foreach(explode(',', $d->foto_perbaikan) as $foto)
                                                        @php $fotoTrimmed = trim($foto); @endphp
                                                        @if(!empty($fotoTrimmed))
                                                        <div class="text-center">
                                                            <a href="{{ asset('foto_perbaikan/' . $fotoTrimmed) }}" data-toggle="lightbox" data-gallery="gallery-perbaikan-{{ $d->id }}">
                                                                <img src="{{ asset('foto_perbaikan/' . $fotoTrimmed) }}" alt="Foto Perbaikan" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                            </a>
                                                            <a href="{{ asset('foto_perbaikan/' . $fotoTrimmed) }}" download="{{ $fotoTrimmed }}" class="btn btn-xs btn-outline-secondary mt-1 d-block" title="Unduh Gambar {{ $fotoTrimmed }}">
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
                                                <div class="btn-group-vertical btn-group-sm w-100">
                                                    <a href="{{ route('admin.cetak_perbaikan', ['id' => $d->id]) }}" target="_blank" class="btn btn-primary mb-1">
                                                        <i class="fas fa-print me-1"></i> Perbaikan
                                                    </a>
                                                    <a href="{{ route('admin.cetak_release', ['id' => $d->id]) }}" target="_blank" class="btn btn-info">
                                                        <i class="fas fa-file-signature me-1"></i> Release
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group-vertical btn-group-sm w-100">
                                                    <button type="button" class="btn btn-warning mb-1" data-toggle="modal" data-target="#modal-edit-{{ $d->id }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{ $d->id }}">
                                                        <i class="fas fa-trash-alt"></i> Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal-edit-{{ $d->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Laporan Perbaikan</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.update_perbaikan', $d->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf @method('PUT')
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3"><label>No BA</label><input type="text" class="form-control" name="no_ba" value="{{ old('no_ba', $d->no_ba) }}"></div>
                                                                    <div class="form-group mb-3"><label>User Kendaraan</label><input type="text" class="form-control" name="user_kendaraan" value="{{ old('user_kendaraan', $d->user_kendaraan) }}"></div>
                                                                    <div class="form-group mb-3"><label>Nama Kendaraan</label><input type="text" class="form-control" value="{{ $d->vehicle_name }}" readonly></div>
                                                                    <div class="form-group mb-3"><label>Tipe Kendaraan</label><input type="text" class="form-control" value="{{ $d->vehicle_type }}" readonly></div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group mb-3"><label>Tanggal Perbaikan</label><input type="date" class="form-control" name="tanggal_perbaikan" value="{{ old('tanggal_perbaikan', $d->tanggal_perbaikan) }}"></div>
                                                                    <div class="form-group mb-3"><label>Catatan Perbaikan</label><textarea class="form-control" name="detail_perbaikan" rows="5">{{ old('detail_perbaikan', $d->detail_perbaikan) }}</textarea></div>
                                                                    <div class="form-group mb-3"><label>Upload Foto Baru (Opsional)</label><input type="file" class="form-control" name="foto_perbaikan[]" multiple><small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small></div>
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

                                        <div class="modal fade" id="modal-ba-{{ $d->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header"><h4 class="modal-title">Input Nomor BA</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.update_perbaikan', $d->id) }}" method="POST">
                                                            @csrf @method('PUT')
                                                            <div class="form-group"><label for="input_no_ba_{{ $d->id }}">No BA</label><input type="text" class="form-control" id="input_no_ba_{{ $d->id }}" name="no_ba" placeholder="Masukkan Nomor BA" required></div>
                                                            <input type="hidden" name="user_kendaraan" value="{{ $d->user_kendaraan }}">
                                                            <input type="hidden" name="tanggal_perbaikan" value="{{ $d->tanggal_perbaikan }}">
                                                            <input type="hidden" name="detail_perbaikan" value="{{ $d->detail_perbaikan }}">
                                                            <div class="modal-footer justify-content-between"><button type="button" class="btn btn-default" data-dismiss="modal">Batal</button><button type="submit" class="btn btn-primary">Simpan No BA</button></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modal-danger-{{ $d->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white"><h5 class="modal-title">Konfirmasi Hapus</h5><button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                                                    <div class="modal-body">
                                                        <p>Apakah Anda yakin ingin menghapus data perbaikan ini?</p>
                                                        <p><strong>Kendaraan:</strong> {{ $d->vehicle_name }}<br><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($d->tanggal_perbaikan)->locale('id')->isoFormat('DD MMMM YYYY') }}</p>
                                                        <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('admin.delete_perbaikan', $d->id )}}" method="POST" class="d-inline">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
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
        </div>
    </section>
</div>
@endsection

@push('styles')
{{-- Aset CSS Spesifik untuk Halaman Ini --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<style>
    .img-thumbnail { padding: 0.15rem; background-color: #fff; border: 1px solid #dee2e6; border-radius: .25rem; }
    .btn-group-vertical .btn { margin-bottom: 5px; }
    .btn-group-vertical .btn:last-child { margin-bottom: 0; }
</style>
@endpush

@push('scripts')
{{-- Aset JavaScript Spesifik untuk Halaman Ini --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
$(function () {
    const table = $('#perbaikan-table').DataTable({
        "paging": true, "lengthChange": true, "searching": true, "ordering": true,
        "info": true, "autoWidth": false, "responsive": true,
        "order": [[ 5, "desc" ]], 
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json" },
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ]
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

    // --- PERBAIKAN LOGIKA FILTER ---
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            let filterDate = $('#filter-date').val();
            
            // Jika filter tidak diisi, tampilkan semua data
            if (!filterDate) {
                return true;
            }

            // Mengambil data TANGGAL PERBAIKAN langsung dari kolom ke-6 (indeks 5)
            // 'data[5]' berisi teks tanggal seperti "08 Sep 2025"
            let rowDateText = data[5];

            // Mengonversi teks tanggal menjadi objek Date yang valid
            // Ini penting agar formatnya bisa kita standarkan
            let dateParts = rowDateText.split(" ");
            let day = dateParts[0];
            let monthMap = { "Jan": "01", "Feb": "02", "Mar": "03", "Apr": "04", "Mei": "05", "Jun": "06", "Jul": "07", "Agu": "08", "Sep": "09", "Okt": "10", "Nov": "11", "Des": "12" };
            let month = monthMap[dateParts[1]];
            let year = dateParts[2];
            
            // Format tanggal baris menjadi YYYY-MM-DD
            let formattedRowDate = `${year}-${month}-${day}`;

            // Bandingkan dengan tanggal filter
            return formattedRowDate === filterDate;
        }
    );
    // --- AKHIR PERBAIKAN ---

    $('#filter-date').on('change', function () { table.draw(); });
    $('#reset-filter').on('click', function() { $('#filter-date').val(''); table.draw(); });
});
</script>
@endpush