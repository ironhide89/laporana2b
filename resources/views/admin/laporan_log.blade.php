@extends('layout.main')

@php
    use Carbon\Carbon;
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="font-size: 1.5rem;">Laporan Log Activity</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard_admin') }}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Log Activity</li>
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
                            <h3 class="card-title font-weight-bold">Data Laporan Log Activity per PIC</h3>
                        </div>

                        <div class="card-body">
                            {{-- Session Messages --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif

                            <div class="row mb-3 align-items-end border-bottom pb-3">
                                <div class="col-md-4">
                                    <label for="filter-date">Cari Berdasarkan Tanggal Kegiatan:</label>
                                    <input type="date" id="filter-date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <button id="reset-filter" class="btn btn-secondary btn-block">Reset Filter</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="log-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 10px;">No</th>
                                            <th>PIC & Teknisi</th>
                                            <th>Detail Laporan</th>
                                            <th style="width: 120px;" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($groupedLogs as $key => $logs)
                                            @php
                                            $firstLog = $logs->first();
                                            $namaDinasGroup = $logs->pluck('nama_dinas')->filter()->unique()->implode(', ');
                                            $namaPic = $firstLog->name;
                                            $tanggalKegiatan = $firstLog->tanggal;
                                            $checklistGabung = $logs->pluck('checklist')->filter()->implode("\n");
                                            
                                            $hasRealActivity = $logs->contains(function ($log) {
                                                return !empty($log->kegiatan) || !empty($log->foto_kendaraan);
                                            });
                                            @endphp
                                            <tr class="log-group-header">
                                                <td>{{ $loop->iteration }}</td>
                                                <td colspan="3">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <div class="font-weight-bold">PIC: {{ $namaPic }}</div>
                                                            <small class="text-muted">Teknisi On Duty: {{ $namaDinasGroup ?: 'N/A' }}</small>
                                                        </div>
                                                        <div data-order="{{ Carbon::parse($tanggalKegiatan)->timestamp }}">
                                                            <strong>Tanggal:</strong> {{ Carbon::parse($tanggalKegiatan)->locale('id')->translatedFormat('j F Y') }}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="log-group-body">
                                                <td></td>
                                                <td colspan="2">
                                                    {{-- Section for General Activities --}}
                                                    <div class="log-section">
                                                        <strong>Kegiatan Harian & Dokumentasi</strong>
                                                        @if ($hasRealActivity)
                                                            @foreach($logs as $log)
                                                                @php
                                                                    $fotoIndividual = !empty($log->foto_kendaraan) ? array_filter(array_map('trim', explode(',', $log->foto_kendaraan))) : [];
                                                                @endphp
                                                                @if(!empty($log->kegiatan) || count($fotoIndividual) > 0)
                                                                    <div class="log-item @if(!$loop->last) mb-3 @endif">
                                                                        <strong class="text-primary">{{ $log->vehicle_name }}</strong>
                                                                        <div class="pl-3">
                                                                            <div class="text-muted pl-2">{!! nl2br(e($log->kegiatan)) !!}</div>
                                                                            @if(count($fotoIndividual) > 0)
                                                                            <div class="pl-2 mt-2" style="display: flex; flex-wrap: wrap; gap: 5px;">
                                                                                @foreach ($fotoIndividual as $foto)
                                                                                    <a href="{{ asset('logbook/' . $foto) }}" data-toggle="lightbox" data-gallery="gallery-{{$key}}-{{$log->id}}">
                                                                                        <img src="{{ asset('logbook/' . $foto) }}" alt="foto_kegiatan" width="50" height="50" style="object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                                                                                    </a>
                                                                                @endforeach
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <div class="log-item">
                                                                <div class="pl-3 text-muted font-italic">Stand By Operasional</div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    {{-- Section for Maintenance Checklist --}}
                                                    @if(!empty($checklistGabung))
                                                    <div class="log-section mt-3">
                                                        <strong>Pemeliharaan Rutin (Checklist)</strong>
                                                        <div class="text-muted pl-3">{!! nl2br(e($checklistGabung)) !!}</div>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('admin.cetak_log', ['id' => $firstLog->id]) }}" class="btn btn-primary btn-sm mb-1 d-block" target="_blank" title="Cetak Laporan">
                                                        <i class="fas fa-print"></i> Cetak
                                                    </a>
                                                    <a href="#" class="btn btn-info btn-sm mb-1 d-block" data-toggle="modal" data-target="#modal-edit-{{ $key }}" title="Edit Log">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm d-block" data-toggle="modal" data-target="#modal-danger-{{ $key }}" title="Hapus Log">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">Tidak ada data log activity.</td>
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
@foreach ($groupedLogs as $key => $logs)
    {{-- All Modal code from previous version goes here, no changes needed --}}
@endforeach
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
<style>
    .log-group-header td { background-color: #f8f9fa; border-bottom: none !important; padding: 0.75rem; }
    .log-group-body td { border-top: none !important; padding-top: 0.5rem; padding-bottom: 0.75rem; }
    .log-item:not(:last-child) { border-bottom: 1px dashed #e0e0e0; padding-bottom: 0.75rem; }
    .log-section:not(:last-child) { border-bottom: 1px solid #dee2e6; padding-bottom: 1rem; margin-bottom: 1rem;}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<script>
$(function () {
    // Custom filter logic
    function performFilter() {
        let filterDate = $('#filter-date').val();
        
        $('#log-table tbody tr.log-group-header').each(function() {
            let headerRow = $(this);
            // THIS LINE IS THE FIX
            let bodyRow = headerRow.next('tr.log-group-body');
            
            if (!filterDate) {
                headerRow.show();
                bodyRow.show();
                return;
            }

            let timestamp = headerRow.find('[data-order]').data('order');
            if (timestamp) {
                let rowDate = new Date(timestamp * 1000).toISOString().slice(0, 10);
                if (rowDate === filterDate) {
                    headerRow.show();
                    bodyRow.show();
                } else {
                    headerRow.hide();
                    bodyRow.hide();
                }
            }
        });
    }

    $('#filter-date').on('change', performFilter);
    $('#reset-filter').on('click', function() {
        $('#filter-date').val('');
        performFilter();
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
});
</script>
@endpush