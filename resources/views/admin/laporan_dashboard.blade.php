@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Arsip PDF Laporan Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Arsip Laporan</li>
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
                            <h3 class="card-title">Daftar File PDF yang Tersimpan</h3>
                        </div>
                        <div class="card-body">
                            
                            <div class="row mb-3 align-items-end">
                                <div class="col-md-4">
                                    <label for="filter-date">Cari Berdasarkan Tanggal:</label>
                                    <input type="date" id="filter-date" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>&nbsp;</label>
                                    <button id="reset-filter" class="btn btn-secondary btn-block">Reset</button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="pdf-table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">No</th>
                                            <th>Nama File Laporan</th>
                                            <th>Tanggal Dibuat</th>
                                            <th style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pdfFiles as $file)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <i class="far fa-file-pdf text-danger mr-2"></i>
                                                {{ basename($file['path']) }}
                                            </td>
                                            <td data-order="{{ $file['timestamp'] }}">
                                                {{ \Carbon\Carbon::createFromTimestamp($file['timestamp'])->format('d M Y, H:i') }}
                                            </td>
                                            <td>
                                                <a href="{{ asset($file['path']) }}" class="btn btn-primary btn-sm" target="_blank" title="Lihat/Unduh">
                                                    <i class="fas fa-download"></i> Download
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted p-4">
                                                Belum ada file PDF yang diarsipkan.
                                            </td>
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
@endsection

@push('styles')
{{-- DataTables CSS --}}
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@push('scripts')
{{-- 
    MEMUAT SEMUA DEPENDENSI KHUSUS UNTUK HALAMAN INI.
    Urutan ini penting untuk menghindari konflik.
--}}

{{-- 1. jQuery (Wajib ada paling pertama) --}}
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>

{{-- 2. jQuery UI (Untuk memperbaiki error '.sortable') --}}
<script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

{{-- 3. Bootstrap (Penting untuk styling & komponen DataTables) --}}
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- 4. DataTables & Plugins --}}
<script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

{{-- 5. Skrip custom kita untuk filter --}}
<script>
    // Pastikan jQueryUI sudah dimuat sebelum kode ini berjalan
    $.widget.bridge('uibutton', $.ui.button)

    $(function () {
        const table = $('#pdf-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [[ 2, "desc" ]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
            }
        });

        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                let filterDate = $('#filter-date').val();
                
                if (filterDate === "" || filterDate === null) {
                    return true;
                }
                
                let rowNode = table.row(dataIndex).node();
                let fileTimestamp = $(rowNode).find('td:eq(2)').data('order');
                
                if (!fileTimestamp) {
                    return false;
                }

                let fileDate = new Date(fileTimestamp * 1000).toISOString().slice(0, 10);
                
                return fileDate === filterDate;
            }
        );

        $('#filter-date').on('change', function () {
            table.draw();
        });

        $('#reset-filter').on('click', function() {
            $('#filter-date').val('');
            table.draw();
        });
    });
</script>
@endpush