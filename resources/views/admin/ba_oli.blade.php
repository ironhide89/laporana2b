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
                    <h1 class="m-0">Laporan Berita Acara Oli</h1> 
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard_admin') }}">Home</a></li> 
                        <li class="breadcrumb-item active">Laporan BA Oli</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card "> 
                        <div class="card-header">
                            <h3 class="card-title"></i>Data Laporan BA Oli</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            {{-- Menampilkan Pesan Sukses/Error --}}
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
                                    <label for="filter-date">Cari Berdasarkan Tanggal BA Dibuat:</label>
                                    <input type="date" id="filter-date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <button id="reset-filter" class="btn btn-secondary btn-block">Reset Filter</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="ba-oli-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 10px;">No</th>
                                            <th class="text-center">Status</th> 
                                            <th>Nama Kendaraan</th>
                                            <th>Kategori Oli</th>
                                            <th>Tanggal BA Dibuat</th> 
                                            <th>Jenis Oli</th>
                                            <th class="text-right">Volume (L)</th> 
                                            <th class="text-center">Cetak</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($vehicles as $d)
                                        <tr>
                                            <td>{{-- Dikosongkan untuk penomoran otomatis --}}</td>
                                            <td class="text-center">
                                                @if ($d->is_completed == '0')
                                                    <span class="badge badge-warning">Belum Selesai</span> 
                                                @else
                                                    <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>
                                            <td>{{ $d->vehicle_name ?? '-' }}</td>
                                            <td>{{ $d->kategori_oli ?? '-' }}</td>
                                            <td data-order="{{ Carbon::parse($d->tanggal_oli ?: $d->created_at)->timestamp }}">
                                                {{ $d->tanggal_oli ? Carbon::parse($d->tanggal_oli)->translatedFormat('d M Y') : ($d->created_at ? Carbon::parse($d->created_at)->translatedFormat('d M Y') : '-') }}
                                            </td>
                                            <td>{{ $d->jenis_oli ?? '-' }}</td>
                                            <td class="text-right">{{ $d->volume_oli ?? '-' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.cetak_oli', ['id' => $d->id]) }}" target="_blank" class="btn btn-primary btn-xs" title="Cetak BA Oli"> 
                                                    <i class="fas fa-print"></i> Cetak
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit-{{ $d->id }}" title="Edit Data BA Oli">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger-{{ $d->id }}" title="Hapus Data BA Oli">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted py-3">Tidak ada data Laporan BA Oli.</td> 
                                        </tr>
                                        @endforelse
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

{{-- Modals --}}
@foreach ($vehicles as $d)
    {{-- Edit Modal --}}
    <div class="modal fade" id="modal-edit-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{ $d->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel{{ $d->id }}">Edit BA Oli: {{ $d->vehicle_name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- ROUTE UPDATED --}}
                    <form action="{{ route('admin.update_ba_oli', $d->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="vehicle_id" value="{{ $d->vehicle_id }}"> 

                        <div class="form-group mb-3"><label>Nama Kendaraan</label><input type="text" class="form-control form-control-sm bg-light" value="{{ $d->vehicle_name }}" readonly></div>
                        <div class="form-group mb-3"><label>Tipe Kendaraan</label><input type="text" class="form-control form-control-sm bg-light" value="{{ $d->vehicle_type }}" readonly></div>
                        <hr>

                        <div class="form-group mb-3">
                            <label for="edit_kategori_oli_{{ $d->id }}">Kategori Oli <span class="text-danger">*</span></label>
                            <select class="custom-select custom-select-sm" name="kategori_oli" id="edit_kategori_oli_{{ $d->id }}" required>
                                <option value="" disabled {{ empty(old('kategori_oli', $d->kategori_oli)) ? 'selected' : '' }}>-- Pilih Kategori --</option>
                                <option value="oli mesin" {{ old('kategori_oli', $d->kategori_oli) == 'oli mesin' ? 'selected' : '' }}>Oli Mesin</option>
                                <option value="oli gardan" {{ old('kategori_oli', $d->kategori_oli) == 'oli gardan' ? 'selected' : '' }}>Oli Gardan</option>
                                <option value="oli hidrolis" {{ old('kategori_oli', $d->kategori_oli) == 'oli hidrolis' ? 'selected' : '' }}>Oli Hidrolis</option>
                                <option value="oli transmisi" {{ old('kategori_oli', $d->kategori_oli) == 'oli transmisi' ? 'selected' : '' }}>Oli Transmisi</option>
                            </select>
                            <div class="invalid-feedback">Mohon pilih kategori oli.</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_jenis_oli_{{ $d->id }}">Jenis Oli <span class="text-danger">*</span></label>
                            <select class="custom-select custom-select-sm" name="jenis_oli" id="edit_jenis_oli_{{ $d->id }}" required>
                                <option value="" disabled {{ empty(old('jenis_oli', $d->jenis_oli)) ? 'selected' : '' }}>-- Pilih Jenis --</option>
                                <option value="SAE 15W-40" {{ old('jenis_oli', $d->jenis_oli) == 'SAE 15W-40' ? 'selected' : '' }}>SAE 15W-40</option>
                                <option value="SAE 20W-50" {{ old('jenis_oli', $d->jenis_oli) == 'SAE 20W-50' ? 'selected' : '' }}>SAE 20W-50</option>
                                <option value="SAE 10" {{ old('jenis_oli', $d->jenis_oli) == 'SAE 10' ? 'selected' : '' }}>SAE 10</option>
                                <option value="SAE 90" {{ old('jenis_oli', $d->jenis_oli) == 'SAE 90' ? 'selected' : '' }}>SAE 90</option>
                                <option value="SAE 10W-40" {{ old('jenis_oli', $d->jenis_oli) == 'SAE 10W-40' ? 'selected' : '' }}>SAE 10W-40</option>
                                <option value="SAE 5W-40" {{ old('jenis_oli', $d->jenis_oli) == 'SAE 5W-40' ? 'selected' : '' }}>SAE 5W-40</option>
                                <option value="ATF" {{ old('jenis_oli', $d->jenis_oli) == 'ATF' ? 'selected' : '' }}>ATF</option>
                            </select>
                            <div class="invalid-feedback">Mohon pilih jenis oli.</div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_volume_oli_{{ $d->id }}">Volume Oli <span class="text-danger">*</span></label>
                            <div class="input-group input-group-sm">
                                <input type="number" class="form-control form-control-sm" name="volume_oli" id="edit_volume_oli_{{ $d->id }}" value="{{ old('volume_oli', $d->volume_oli) }}" placeholder="Contoh: 4.5" min="0" step="0.01" required>
                                <div class="input-group-append"><span class="input-group-text">liter</span></div>
                                <div class="invalid-feedback">Mohon masukkan volume oli.</div>
                            </div>
                        </div>
                        <div class="form-odometer-section border-top pt-3 mt-3" id="edit-form-odometer-{{ $d->id }}" style="display: {{ old('kategori_oli', $d->kategori_oli) == 'oli mesin' ? 'block' : 'none' }};">
                            <p class="text-info small mb-2"><i class="fas fa-info-circle"></i> Isi hanya jika kategori adalah Oli Mesin:</p>
                            <div class="form-group mb-3">
                                <label for="edit_odo_meter_{{ $d->id }}">Odo Meter Saat Ganti <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="number" id="edit_odo_meter_{{ $d->id }}" class="form-control form-control-sm" name="odo_meter" value="{{ old('odo_meter', $d->odo_meter) }}" placeholder="KM saat ini" min="0" {{ old('kategori_oli', $d->kategori_oli) == 'oli mesin' ? 'required' : '' }}>
                                    <div class="input-group-append"> <span class="input-group-text">KM</span> </div>
                                    <div class="invalid-feedback">Odometer wajib diisi untuk oli mesin.</div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="edit_oli_selanjutnya_{{ $d->id }}">KM Ganti Oli Berikutnya <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="number" id="edit_oli_selanjutnya_{{ $d->id }}" class="form-control form-control-sm" name="oli_selanjutnya" value="{{ old('oli_selanjutnya', $d->oli_selanjutnya) }}" placeholder="KM target ganti" min="0" {{ old('kategori_oli', $d->kategori_oli) == 'oli mesin' ? 'required' : '' }}>
                                    <div class="input-group-append"> <span class="input-group-text">KM</span> </div>
                                    <div class="invalid-feedback">KM oli selanjutnya wajib diisi untuk oli mesin.</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="edit_tanggal_oli_{{ $d->id }}">Tanggal Pergantian Oli <span class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-sm" name="tanggal_oli" id="edit_tanggal_oli_{{ $d->id }}" value="{{ old('tanggal_oli', $d->tanggal_oli ? Carbon::parse($d->tanggal_oli)->format('Y-m-d') : '') }}" required>
                            <div class="invalid-feedback">Mohon masukkan tanggal pergantian.</div>
                        </div>
                        <div class="modal-footer justify-content-between px-0 pb-0">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="modal-danger-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel{{ $d->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                 <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalDeleteLabel{{ $d->id }}">Konfirmasi Hapus BA Oli</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus BA Oli untuk:</p>
                    <p><strong>{{ $d->vehicle_name }}</strong> ({{ $d->kategori_oli }}) tanggal <strong>{{ Carbon::parse($d->tanggal_oli ?: $d->created_at)->translatedFormat('d M Y') }}</strong>?</p>
                    <p class="text-muted small">Tindakan ini tidak dapat dibatalkan.</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    {{-- ROUTE UPDATED --}}
                    <form action="{{ route('admin.delete_ba_oli', $d->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Ya, Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

@push('styles')
{{-- DataTables CSS --}}
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
{{-- Custom Styles for this page --}}
<style>
    .table td, .table th { vertical-align: middle; font-size: 0.9rem; }
    .table .btn-xs { padding: 0.15rem 0.4rem; font-size: 0.75rem; }
    .modal-body .form-group label { font-weight: 500; margin-bottom: 0.3rem; }
    .form-odometer-section { border-top: 1px solid #eee; margin-top: 1rem; padding-top: 1rem; }
    .table td .btn { margin-right: 4px; }
    .table td .btn:last-child { margin-right: 0; }
</style>
@endpush

@push('scripts')
{{-- DataTables JS --}}
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const table = $('#ba-oli-table').DataTable({
        "paging": true, "lengthChange": true, "searching": true,
        "ordering": true, "info": true, "autoWidth": false, "responsive": true,
        "order": [[ 4, "desc" ]],
        "language": { "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json" },
        "columnDefs": [ { "searchable": false, "orderable": false, "targets": 0 } ]
    });

    table.on('order.dt search.dt', function () {
        let i = 1;
        table.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            let filterDate = $('#filter-date').val();
            if (!filterDate) { return true; }
            let rowDateText = data[4];
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

    document.querySelectorAll('select[name="kategori_oli"]').forEach(select => {
        const modal = select.closest('.modal');
        const odometerSection = modal.querySelector('.form-odometer-section');
        const odoInput = odometerSection.querySelector('input[name="odo_meter"]');
        const nextOliInput = odometerSection.querySelector('input[name="oli_selanjutnya"]');
        
        const toggleOdometer = () => {
            const isEngineOil = select.value === 'oli mesin';
            // Using jQuery for smooth slide animation
            $(odometerSection).stop().slideToggle(200, function() {
                if (odoInput) odoInput.required = isEngineOil;
                if (nextOliInput) nextOliInput.required = isEngineOil;
            });
        };
        select.addEventListener('change', toggleOdometer);
    });

    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
});
</script>
@endpush