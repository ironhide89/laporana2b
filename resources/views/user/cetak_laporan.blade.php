@extends('layout.mainuser') {{-- Pastikan ini layout mobile yang sudah dibuat --}}

@section('content')

{{-- Container for page content --}}
<div class="container-fluid px-3 py-4">

    {{-- ============================================= --}}
    {{-- == BAGIAN RIWAYAT CHECKLIST == --}}
    {{-- ============================================= --}}
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h4 class="fw-bold mb-0" style="color: var(--app-dark);">
            <i class="fas fa-history me-2 text-primary"></i> Riwayat Checklist
        </h4>
    </div>

    {{-- Form Pencarian Checklist --}}
    <form method="GET" action="{{ route('user.cetak_laporan') }}" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-md-3 col-sm-6">
                <label for="search_date_checklist" class="visually-hidden">Tanggal Checklist</label>
                <input type="date" name="search_date_checklist" id="search_date_checklist" class="form-control form-control-sm" value="{{ $searchDateChecklist ?? '' }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search me-1"></i>Cari</button>
            </div>
            <div class="col-auto">
                <a href="{{ route('user.cetak_laporan', ['search_date_logbook' => request('search_date_logbook')]) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-undo me-1"></i>Reset</a>
            </div>
        </div>
        {{-- Hidden input untuk mempertahankan filter logbook saat mencari checklist --}}
        @if(request('search_date_logbook'))
            <input type="hidden" name="search_date_logbook" value="{{ request('search_date_logbook') }}">
        @endif
    </form>

    {{-- Desktop Table View (Hidden on sm screens) --}}
    <div class="d-none d-md-block">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 report-table" id="riwayat-checklist-table">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kendaraan</th>
                                <th>Teknisi</th>
                                <th>Kondisi</th>
                                <th>Oli Telat (KM)</th>
                                <th>Oli Sisa (KM)</th>
                                <th class="d-none d-lg-table-cell">Catatan</th>
                                <th>Aksi Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vehicles as $index => $d)
                                <tr class="checklist-item">
                                    <td>{{ $vehicles->firstItem() + $index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->tanggal)->locale('id')->translatedFormat('d/m/y') }}</td>
                                    <td>{{ $d->vehicle_name ?? 'N/A' }}</td>
                                    <td>{{ $d->user ?? 'N/A' }}</td>
                                    <td>{{ $d->vehicle_condition ?? '-' }}</td>
                                    <td class="{{ ($d->oli_kurang ?? 0) > 0 ? 'text-danger fw-semibold' : '' }}">{{ number_format($d->oli_kurang ?? 0, 0, ',', '.') }}</td>
                                    <td>{{ isset($d->oli_lebih) ? number_format($d->oli_lebih, 0, ',', '.') : '-' }}</td>
                                    <td class="d-none d-lg-table-cell" title="{{ $d->catatan }}">{{ Str::limit($d->catatan, 35) }}</td>
                                    <td>
                                        @if ($d->vehicle_type == 'Operasional')
                                            <a href="{{ route('user.cetak_laporan_perawatan_operasional', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Operasional"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Crash Car')
                                            <a href="{{ route('user.cetak_laporan_perawatan_crashcar', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Crash Car"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Runway Sweeper')
                                            <a href="{{ route('user.cetak_laporan_perawatan_runwaysweeper', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Runway Sweeper"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Rubber Deposit')
                                            <a href="{{ route('user.cetak_laporan_perawatan_rubberdeposit', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Rubber Deposit"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Tractor Rubber Deposit')
                                            <a href="{{ route('user.cetak_laporan_perawatan_tractorrubber', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Tractor Rubber Deposit"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Mu Meter')
                                            <a href="{{ route('user.cetak_laporan_perawatan_mumeter', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Mu Meter"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Tractor Mower')
                                            <a href="{{ route('user.cetak_laporan_perawatan_tractormower', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Tractor Mower"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Kompresor Dinamis')
                                            <a href="{{ route('user.cetak_laporan_perawatan_kompresordinamis', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Kompresor Dinamis"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Kompresor Statis')
                                            <a href="{{ route('user.cetak_laporan_perawatan_kompresorstatis', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Kompresor Statis"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Genset')
                                            <a href="{{ route('user.cetak_laporan_perawatan_genset', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Genset"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Asphalt Cutter')
                                            <a href="{{ route('user.cetak_laporan_perawatan_asphaltcutter', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Asphalt Cutter"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Forklift')
                                            <a href="{{ route('user.cetak_laporan_perawatan_forklift', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Forklift"><i class="fas fa-print"></i></a>
                                        @elseif ($d->vehicle_type === 'Vibro Roller')
                                            <a href="{{ route('user.cetak_laporan_perawatan_vibroroller', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Vibro Roller"><i class="fas fa-print"></i></a>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center text-muted py-5">
                                        <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                                        @if($searchDateChecklist)
                                            Tidak ada data riwayat checklist untuk tanggal {{ \Carbon\Carbon::parse($searchDateChecklist)->locale('id')->translatedFormat('d M Y') }}.
                                        @else
                                            Belum ada data riwayat checklist.
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
             @if ($vehicles->hasPages())
                <div class="card-footer bg-light py-3">
                    {{ $vehicles->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

    {{-- Mobile Card View (Visible on sm screens) --}}
    <div id="riwayat-checklist-cards-container" class="d-md-none mb-4">
        @forelse ($vehicles as $d)
            <div class="card shadow-sm border-0 mb-3 checklist-item-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="card-title mb-0 fw-bold">{{ $d->vehicle_name ?? 'N/A' }}</h6>
                        <span class="badge bg-light text-dark ms-2">{{ \Carbon\Carbon::parse($d->tanggal)->locale('id')->translatedFormat('d/m/y') }}</span>
                    </div>
                    <p class="card-text mb-1"><small class="text-muted">Teknisi:</small> {{ $d->user ?? 'N/A' }}</p>
                    <p class="card-text mb-1"><small class="text-muted">Kondisi:</small> {{ $d->vehicle_condition ?? '-' }}</p>
                    <p class="card-text mb-1"><small class="text-muted">Oli Telat (KM):</small> <span class="{{ ($d->oli_kurang ?? 0) > 0 ? 'text-danger fw-semibold' : '' }}">{{ number_format($d->oli_kurang ?? 0, 0, ',', '.') }}</span></p>
                    <p class="card-text mb-1"><small class="text-muted">Oli Sisa (KM):</small> {{ isset($d->oli_lebih) ? number_format($d->oli_lebih, 0, ',', '.') : '-' }}</p>
                    @if($d->catatan)
                    <p class="card-text mb-2"><small class="text-muted">Catatan:</small> {{ Str::limit($d->catatan, 100) }}</p>
                    @endif
                    <div class="text-end">
                        @if ($d->vehicle_type == 'Operasional')
                            <a href="{{ route('user.cetak_laporan_perawatan_operasional', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Operasional"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Crash Car')
                            <a href="{{ route('user.cetak_laporan_perawatan_crashcar', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Crash Car"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Runway Sweeper')
                            <a href="{{ route('user.cetak_laporan_perawatan_runwaysweeper', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Runway Sweeper"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Rubber Deposit')
                            <a href="{{ route('user.cetak_laporan_perawatan_rubberdeposit', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Rubber Deposit"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Tractor Rubber Deposit')
                            <a href="{{ route('user.cetak_laporan_perawatan_tractorrubber', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Tractor Rubber Deposit"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Mu Meter')
                            <a href="{{ route('user.cetak_laporan_perawatan_mumeter', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Mu Meter"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Tractor Mower')
                            <a href="{{ route('user.cetak_laporan_perawatan_tractormower', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Tractor Mower"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Kompresor Dinamis')
                            <a href="{{ route('user.cetak_laporan_perawatan_kompresordinamis', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Kompresor Dinamis"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Kompresor Statis')
                            <a href="{{ route('user.cetak_laporan_perawatan_kompresorstatis', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Kompresor Statis"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Genset')
                            <a href="{{ route('user.cetak_laporan_perawatan_genset', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Genset"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Asphalt Cutter')
                            <a href="{{ route('user.cetak_laporan_perawatan_asphaltcutter', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Asphalt Cutter"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Forklift')
                            <a href="{{ route('user.cetak_laporan_perawatan_forklift', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Forklift"><i class="fas fa-print me-1"></i> Cetak</a>
                        @elseif ($d->vehicle_type === 'Vibro Roller')
                            <a href="{{ route('user.cetak_laporan_perawatan_vibroroller', ['id' => $d->id]) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-2 py-1 action-print" title="Cetak Laporan Vibro Roller"><i class="fas fa-print me-1"></i> Cetak</a>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                <i class="fas fa-box-open fa-2x mb-2 d-block"></i>
                @if($searchDateChecklist)
                    Tidak ada data riwayat checklist untuk tanggal {{ \Carbon\Carbon::parse($searchDateChecklist)->locale('id')->translatedFormat('d M Y') }}.
                @else
                    Belum ada data riwayat checklist.
                @endif
            </div>
        @endforelse
        @if ($vehicles->hasPages())
            <div class="mt-3">
                {{ $vehicles->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

    {{-- ============================================================= --}}
    {{-- == BAGIAN RIWAYAT LOGBOOK (Group per Tanggal) == --}}
    {{-- ============================================================= --}}

    <div class="d-flex align-items-center justify-content-between mb-2 mt-5">
        <h4 class="fw-bold mb-0" style="color: var(--app-dark);">
            <i class="fas fa-book me-2 text-success"></i> Riwayat Logbook
        </h4>
        <a href="{{ route('user.cetak_logbook', ['nama' => Auth::user()->name, 'tanggal' => now()->format('Y-m-d')]) }}"
           class="btn btn-sm btn-success rounded-pill" target="_blank">
            <i class="fas fa-print me-1"></i> Cetak Logbook Hari Ini
        </a>
    </div>

    {{-- Form Pencarian Logbook --}}
    <form method="GET" action="{{ route('user.cetak_laporan') }}" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-md-3 col-sm-6">
                <label for="search_date_logbook" class="visually-hidden">Tanggal Logbook</label>
                <input type="date" name="search_date_logbook" id="search_date_logbook" class="form-control form-control-sm" value="{{ $searchDateLogbook ?? '' }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search me-1"></i>Cari</button>
            </div>
            <div class="col-auto">
                <a href="{{ route('user.cetak_laporan', ['search_date_checklist' => request('search_date_checklist')]) }}" class="btn btn-sm btn-outline-secondary"><i class="fas fa-undo me-1"></i>Reset</a>
            </div>
        </div>
        {{-- Hidden input untuk mempertahankan filter checklist saat mencari logbook --}}
        @if(request('search_date_checklist'))
            <input type="hidden" name="search_date_checklist" value="{{ request('search_date_checklist') }}">
        @endif
    </form>

    {{-- Desktop Table View (Hidden on sm screens) --}}
    <div class="d-none d-md-block">
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0 report-table" id="riwayat-logbook-table">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kendaraan Terlibat</th>
                                <th>Kegiatan (Gabungan)</th>
                                <th>Checklist (Gabungan)</th>
                                <th class="d-none d-lg-table-cell">Foto Kegiatan (Gabungan)</th>
                                <th>Cetak Harian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($paginatedGroupedLogs as $key_tanggal => $currentLogsInGroup)
                                @php
                                    $kendaraanList = $currentLogsInGroup->pluck('vehicle_name')->filter()->unique()->implode(', ');
                                    $kegiatanGabung = $currentLogsInGroup->pluck('kegiatan')->filter()->implode(";\n");
                                    $checklistGabung = $currentLogsInGroup->pluck('checklist')->filter()->implode(";\n");
                                    $fotoGabung = [];
                                    foreach ($currentLogsInGroup as $log_entry) {
                                        if (!empty($log_entry->foto_kendaraan)) {
                                            $fotoArray = array_map('trim', explode(',', $log_entry->foto_kendaraan));
                                            $fotoGabung = array_merge($fotoGabung, array_filter($fotoArray));
                                        }
                                    }
                                    $fotoGabung = array_unique($fotoGabung);
                                @endphp
                                <tr class="logbook-item">
                                    <td>{{ $paginatedGroupedLogs->firstItem() + $loop->index }}</td>
                                    <td>{{ \Carbon\Carbon::parse($key_tanggal)->locale('id')->translatedFormat('d M Y') }}</td>
                                    <td style="white-space: normal; word-break: break-word;">{{ $kendaraanList ?: '-' }}</td>
                                    <td style="white-space: pre-wrap; word-break: break-word;">{!! nl2br(e($kegiatanGabung ?: '-')) !!}</td>
                                    <td style="white-space: pre-wrap; word-break: break-word;">{!! nl2br(e($checklistGabung ?: '-')) !!}</td>
                                    <td class="d-none d-lg-table-cell">
                                        @if(count($fotoGabung) > 0)
                                            <div style="display: flex; flex-wrap: wrap; gap: 5px; max-width: 250px;">
                                                @foreach ($fotoGabung as $foto_idx => $foto)
                                                    @if($foto)
                                                        <a href="{{ asset('logbook/' . $foto) }}" data-toggle="lightbox" data-gallery="log-gallery-table-{{ $loop->parent->index }}-{{ $foto_idx }}" data-title="Foto Tgl {{ \Carbon\Carbon::parse($key_tanggal)->locale('id')->translatedFormat('d M Y') }}">
                                                            <img src="{{ asset('logbook/' . $foto) }}" alt="foto tgl {{ $key_tanggal }}" width="40" height="40" style="object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted small">No Foto</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('user.cetak_logbook', ['nama' => Auth::user()->name, 'tanggal' => $key_tanggal]) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-outline-success rounded-pill px-2 py-1 action-print"
                                           title="Cetak Semua Logbook Tgl {{ \Carbon\Carbon::parse($key_tanggal)->locale('id')->translatedFormat('d M Y') }}">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        <i class="fas fa-book-open fa-2x mb-2 d-block"></i>
                                         @if($searchDateLogbook)
                                            Tidak ada data riwayat logbook untuk tanggal {{ \Carbon\Carbon::parse($searchDateLogbook)->locale('id')->translatedFormat('d M Y') }}.
                                        @else
                                            Belum ada data riwayat logbook.
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($paginatedGroupedLogs->hasPages())
                <div class="card-footer bg-light py-3">
                    {{ $paginatedGroupedLogs->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

    {{-- Mobile Card View (Visible on sm screens) --}}
    <div id="riwayat-logbook-cards-container" class="d-md-none mb-4">
         @forelse ($paginatedGroupedLogs as $key_tanggal => $currentLogsInGroup)
            @php
                $kendaraanList = $currentLogsInGroup->pluck('vehicle_name')->filter()->unique()->implode(', ');
                $kegiatanGabung = $currentLogsInGroup->pluck('kegiatan')->filter()->implode(";\n");
                $checklistGabung = $currentLogsInGroup->pluck('checklist')->filter()->implode(";\n");
                $fotoGabung = [];
                foreach ($currentLogsInGroup as $log_entry) {
                    if (!empty($log_entry->foto_kendaraan)) {
                        $fotoArray = array_map('trim', explode(',', $log_entry->foto_kendaraan));
                        $fotoGabung = array_merge($fotoGabung, array_filter($fotoArray));
                    }
                }
                $fotoGabung = array_unique($fotoGabung);
            @endphp
            <div class="card shadow-sm border-0 mb-3 logbook-item-card">
                <div class="card-header bg-light py-2 px-3">
                    <h6 class="mb-0 fw-bold">Logbook: {{ \Carbon\Carbon::parse($key_tanggal)->locale('id')->translatedFormat('d M Y') }}</h6>
                </div>
                <div class="card-body">
                    @if($kendaraanList)
                    <p class="card-text mb-1"><small class="text-muted">Kendaraan Terlibat:</small><br>{{ $kendaraanList }}</p>
                    @endif
                    @if($kegiatanGabung)
                    <p class="card-text mb-1"><small class="text-muted">Kegiatan:</small><br>{!! nl2br(e($kegiatanGabung)) !!}</p>
                    @endif
                     @if($checklistGabung)
                    <p class="card-text mb-2"><small class="text-muted">Checklist:</small><br>{!! nl2br(e($checklistGabung)) !!}</p>
                    @endif

                    @if(count($fotoGabung) > 0)
                        <p class="card-text mb-1"><small class="text-muted">Foto Kegiatan:</small></p>
                        <div style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 10px;">
                            @foreach ($fotoGabung as $foto_idx => $foto)
                                @if($foto)
                                    <a href="{{ asset('logbook/' . $foto) }}" data-toggle="lightbox" data-gallery="log-gallery-card-{{ $loop->parent->index }}-{{ $foto_idx }}" data-title="Foto Tgl {{ \Carbon\Carbon::parse($key_tanggal)->locale('id')->translatedFormat('d M Y') }}">
                                        <img src="{{ asset('logbook/' . $foto) }}" alt="foto tgl {{ $key_tanggal }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #eee;">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    <div class="text-end">
                        <a href="{{ route('user.cetak_logbook', ['nama' => Auth::user()->name, 'tanggal' => $key_tanggal]) }}"
                           target="_blank"
                           class="btn btn-sm btn-outline-success rounded-pill px-2 py-1 action-print"
                           title="Cetak Semua Logbook Tgl {{ \Carbon\Carbon::parse($key_tanggal)->locale('id')->translatedFormat('d M Y') }}">
                            <i class="fas fa-print me-1"></i> Cetak Harian
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5">
                <i class="fas fa-book-open fa-2x mb-2 d-block"></i>
                @if($searchDateLogbook)
                    Tidak ada data riwayat logbook untuk tanggal {{ \Carbon\Carbon::parse($searchDateLogbook)->locale('id')->translatedFormat('d M Y') }}.
                @else
                    Belum ada data riwayat logbook.
                @endif
            </div>
        @endforelse
        @if ($paginatedGroupedLogs->hasPages())
            <div class="mt-3">
                {{ $paginatedGroupedLogs->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>

</div> {{-- End container-fluid --}}

@endsection

@push('styles')
{{-- Include Lightbox CSS jika belum --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaYZh7GwatihrPENdThAUysInternetverythingCIsXxUIXxHIXxI/OlhMBPGkVNElT" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    /* Style dari sebelumnya */
    .report-table th,
    .report-table td {
        font-size: 0.8rem;
        vertical-align: middle;
        padding: 0.6rem 0.5rem;
    }
    .report-table td[style*="white-space: pre-wrap"] { white-space: pre-wrap !important; }
    .report-table th {
        font-weight: 600;
        background-color: var(--app-light, #f8f9fc);
        color: var(--app-dark, #5a5c69);
        white-space: nowrap; /* Header umumnya nowrap */
    }
    .card > .card-body > .table-responsive {
        border-radius: var(--app-border-radius, 0.75rem);
        border: 1px solid var(--app-lighter-grey, #eaecf4);
        overflow: hidden; /* Prevents table borders from extending beyond rounded corners */
    }
    .card > .card-body > .table-responsive > table { margin-bottom: 0 !important; } /* Bootstrap override */

    .action-print { font-size: 0.8rem; line-height: 1; padding: 0.3rem 0.6rem !important; }
    .action-print i { vertical-align: middle; }
    .text-danger.fw-semibold { color: var(--app-danger, #E74A3B) !important; }

    /* CSS untuk wrap kolom yang perlu di tabel desktop */
    .report-table td {
        word-break: break-word;
        white-space: normal; /* Default ke normal untuk wrap */
    }
    /* Kolom yang sebaiknya nowrap di tabel desktop */
    .report-table th:nth-child(1), .report-table td:nth-child(1), /* No */
    .report-table th:nth-child(2), .report-table td:nth-child(2), /* Tanggal */
    #riwayat-checklist-table th:nth-child(9), #riwayat-checklist-table td:nth-child(9), /* Aksi Cetak Checklist */
    #riwayat-logbook-table th:nth-child(7), #riwayat-logbook-table td:nth-child(7)  /* Cetak Harian Logbook */
    {
        white-space: nowrap;
    }
    /* Pastikan foto tidak wrap aneh di tabel desktop */
    .report-table td > div[style*="display: flex"] { min-width: 100px; }

    /* Mobile Card Styling */
    .d-md-none .card-title {
        font-size: 0.95rem;
    }
    .d-md-none .card-text {
        font-size: 0.8rem;
        line-height: 1.5;
    }
    .d-md-none .card-text small.text-muted {
        font-weight: 600;
        display: inline-block;
        margin-bottom: 0.1rem;
        margin-right: 0.25rem;
    }
    .d-md-none .card-body {
        padding: 0.8rem;
    }
    .d-md-none .card-header {
        font-size: 0.9rem;
        padding: 0.6rem 0.8rem;
    }
    .d-md-none .card-text br {
        margin-bottom: 0.3rem;
    }

    /* Pagination Styling */
    .pagination {
        justify-content: center;
        margin-top: 1rem;
    }
    .pagination .page-item .page-link {
        font-size: 0.85rem;
        padding: 0.4rem 0.75rem;
    }
    .card-footer.bg-light .pagination,
    .card-footer.bg-white .pagination {
        margin-bottom: 0;
    }
     .card-footer {
        background-color: var(--app-card-footer-bg, #f8f9fa); /* Menggunakan variabel CSS jika ada */
    }

    /* Search Form Styling */
    form .row.g-2 {
        margin-bottom: 1rem;
    }
    form .form-control-sm {
        /* height: calc(1.5em + .5rem + 2px); */ /* Biarkan default Bootstrap SM atau sesuaikan jika perlu */
        padding: .25rem .5rem;
        font-size: .8rem;
    }
    form .btn-sm {
        /* padding: .25rem .5rem; */ /* Biarkan default Bootstrap SM atau sesuaikan jika perlu */
        font-size: .8rem;
        /* Menambahkan sedikit padding agar ikon dan teks tidak terlalu rapat */
        /* padding-left: 0.6rem;
        padding-right: 0.6rem; */
    }
    form .btn-sm i.fas {
        font-size: 0.7rem; /* Kecilkan ikon sedikit jika perlu */
    }
    .visually-hidden {
        position: absolute !important;
        width: 1px !important;
        height: 1px !important;
        padding: 0 !important;
        margin: -1px !important;
        overflow: hidden !important;
        clip: rect(0,0,0,0) !important;
        white-space: nowrap !important;
        border: 0 !important;
    }
</style>
@endpush

@push('scripts')
{{-- Include Lightbox JS jika belum --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaB7GcvFqoCiPlIQsfjAX/lS+d+f5NlvhrQFfkbKaGLSYzbJrMLRDhrMbtBeuxGDUGQ4ekrGIl/gjFgyg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
    // Inisialisasi Lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true,
        });
    });

    console.log("Halaman riwayat dimuat dengan pagination dan filter tanggal Laravel.");
});
</script>
@endpush