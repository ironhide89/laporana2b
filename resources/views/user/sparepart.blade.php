@extends('layout.mainuser')

@section('content')
<div class="container-fluid px-0 py-3" style="background-color: #f4f6f8;"> {{-- Latar belakang sedikit abu-abu --}}

    <div class="px-3 pb-2"> {{-- Padding untuk elemen di luar scrollable content --}}
        <div class="text-center mb-3 pt-2">
            <i class="fas fa-tools fa-3x text-primary mb-2"></i>
            <h4 class="fw-bold" style="color: var(--app-dark);">Cari Sparepart</h4>
            <p class="text-muted small">Temukan ketersediaan sparepart dengan mudah.</p>
        </div>

        {{-- Search Bar and Filter Toggle --}}
        <div class="d-flex gap-2 mb-3">
            <div class="flex-grow-1">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                    <input type="text" class="form-control form-control-sm border-start-0" id="searchNamaMerk" placeholder="Ketik nama atau merk barang...">
                </div>
            </div>
            <button class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                <i class="fas fa-filter"></i>
                <span class="d-none d-sm-inline">Filter</span>
            </button>
            <button class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-1" id="resetAllBtn" type="button">
                <i class="fas fa-undo"></i>
                <span class="d-none d-sm-inline">Reset</span>
            </button>
        </div>

        {{-- Collapsible Filter Section --}}
        <div class="collapse" id="filterCollapse">
            <div class="card card-body p-3 mb-3 shadow-sm">
                <h6 class="fw-semibold mb-3 small text-primary">Opsi Filter Lanjutan</h6>
                <div class="row gx-2 gy-2">
                    <div class="col-12 col-sm-4">
                        <label for="filterKondisi" class="form-label visually-hidden">Kondisi</label>
                        <select id="filterKondisi" class="form-select form-select-sm">
                            <option value="">Semua Kondisi</option>
                            @isset($uniqueKondisi)
                                @foreach($uniqueKondisi as $kondisi)
                                    <option value="{{ $kondisi }}">{{ $kondisi }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label for="filterLokasi" class="form-label visually-hidden">Lokasi</label>
                        <select id="filterLokasi" class="form-select form-select-sm">
                            <option value="">Semua Lokasi</option>
                            @isset($uniqueLokasi)
                                @foreach($uniqueLokasi as $lokasi)
                                    <option value="{{ $lokasi }}">{{ $lokasi }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-12 col-sm-4">
                        <label for="filterPeralatan" class="form-label visually-hidden">Peralatan</label>
                        <select id="filterPeralatan" class="form-select form-select-sm">
                            <option value="">Semua Peralatan</option>
                            @isset($uniquePeralatan)
                                @foreach($uniquePeralatan as $peralatan)
                                    <option value="{{ $peralatan }}">{{ $peralatan }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <small id="resultsCount" class="text-muted fw-medium d-block mb-2 px-1"></small>
    </div>


    {{-- Sparepart List using Cards --}}
    <div class="px-3"> {{-- Padding untuk daftar kartu --}}
        <div id="sparepartListContainer">
            @if(isset($spareparts) && $spareparts->isNotEmpty())
                @foreach($spareparts as $item)
                <div class="card sparepart-card mb-3 shadow-sm border-0" style="cursor: pointer;"> {{-- Added cursor pointer --}}
                    <div class="card-body p-3">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h6 class="card-title fw-bold text-primary mb-0 sparepart-nama">{{ $item->nama_barang ?: 'Nama Tidak Ada' }}</h6>
                                <small class="text-muted sparepart-merk">{{ $item->merk_barang ?: '-' }}</small>
                            </div>
                            <span class="badge rounded-pill sparepart-kondisi {{
                                strtolower($item->kondisi) == 'baru' ? 'bg-success-subtle text-success-emphasis' :
                                (strtolower($item->kondisi) == 'bekas' || strtolower($item->kondisi) == 'bekas baik' ? 'bg-warning-subtle text-warning-emphasis' :
                                (strtolower($item->kondisi) == 'rusak' ? 'bg-danger-subtle text-danger-emphasis' : 'bg-secondary-subtle text-secondary-emphasis'))
                            }} px-2 py-1" style="font-size: 0.7rem;">
                                {{ $item->kondisi ?: 'N/A' }}
                            </span>
                        </div>

                        <div class="row gx-2 gy-1 small mb-2">
                            <div class="col-6 d-flex align-items-center">
                                <i class="fas fa-box-open fa-fw text-muted me-2"></i>
                                <span class="sparepart-volume">{{ $item->volume ?: '0' }}</span>&nbsp;<span class="sparepart-satuan">{{ $item->satuan ?: '-' }}</span>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <i class="fas fa-map-marker-alt fa-fw text-muted me-2"></i>
                                <span class="sparepart-lokasi">{{ $item->lokasi ?: '-' }}</span>
                            </div>
                             <div class="col-12 d-flex align-items-center sparepart-peralatan-wrapper {{ $item->peralatan ? '' : 'd-none' }}">
                                <i class="fas fa-cogs fa-fw text-muted me-2"></i>
                                <span class="sparepart-peralatan">{{ $item->peralatan ?: '-' }}</span>
                            </div>
                        </div>

                        <div class="border-top pt-2 mt-2">
                            <p class="mb-0 text-muted" style="font-size: 0.75rem;">
                                <span class="sparepart-pnp-plat-wrapper {{ ($item->pnp || $item->plat_number) ? '' : 'd-none' }}">
                                    <i class="fas fa-car fa-fw me-1"></i>
                                    PNP: <strong class="sparepart-pnp">{{ $item->pnp ?: 'N/A' }}</strong>
                                    @if($item->pnp && $item->plat_number)/@endif
                                    <strong class="sparepart-plat">{{ $item->plat_number ?: '' }}</strong>
                                </span>
                            </p>
                            <p class="mb-0 text-muted sparepart-user-wrapper {{ $item->user ? '' : 'd-none' }}" style="font-size: 0.75rem;">
                                <i class="fas fa-user fa-fw me-1"></i>
                                PIC: <strong class="sparepart-user">{{ $item->user ?: '-' }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div id="initialEmptyMessage" class="text-center text-muted p-5"> {{-- Added ID here --}}
                    <i class="fas fa-box-open fa-3x mb-3 d-block"></i>
                    <h5 class="fw-medium">Belum Ada Sparepart</h5>
                    <p class="small">Saat ini tidak ada data sparepart yang tersedia.</p>
                </div>
            @endif
            <div id="noResultsMessage" class="text-center text-muted p-5" style="display: none;">
                <i class="fas fa-search fa-3x mb-3 d-block"></i>
                <h5 class="fw-medium">Tidak Ditemukan</h5>
                <p class="small">Sparepart yang Anda cari tidak cocok dengan kriteria.</p>
            </div>
        </div>
        <div class="text-center mt-3 mb-3 px-3">
            <button class="btn btn-primary btn-sm w-100" id="loadMoreBtn" style="display: none;">Muat Lebih Banyak</button>
        </div>
    </div>
</div>

<div class="modal fade" id="sparepartDetailModal" tabindex="-1" aria-labelledby="sparepartDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sparepartDetailModalLabel">Detail Sparepart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="sparepartModalBody">
        {{-- Content will be injected by JavaScript --}}
        <p class="text-center py-4">Memuat detail...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
    body, .container-fluid {
        font-family: 'Inter', sans-serif;
    }
    .form-label.visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }
    .form-control-sm, .form-select-sm {
        font-size: 0.875rem;
        border-radius: 0.5rem !important;
        background-color: #fff;
        border: 1px solid #e0e0e0;
    }
    .form-control-sm:focus, .form-select-sm:focus {
        border-color: var(--app-primary, #0d6efd);
        box-shadow: 0 0 0 0.2rem rgba(var(--app-primary-rgb, 13, 110, 253), 0.2);
    }
    .input-group-text {
        border-radius: 0.5rem 0 0 0.5rem !important;
    }
    .form-control.border-start-0 {
        border-radius: 0 0.5rem 0.5rem 0 !important;
    }
    #filterCollapse .card-body {
        background-color: #f8f9fa;
    }
    .sparepart-card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .sparepart-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.08) !important;
    }
    .badge.rounded-pill {
        font-weight: 500;
    }
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
        background: #ced4da;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #adb5bd;
    }
    .sparepart-peralatan-wrapper.d-none,
    .sparepart-pnp-plat-wrapper.d-none,
    .sparepart-user-wrapper.d-none {
        display: none !important;
    }
    #sparepartDetailModal .modal-body .row .col-6,
    #sparepartDetailModal .modal-body .row .col-12 {
        margin-bottom: 0.5rem; /* Jarak antar item di modal */
    }

    /* CSS untuk mengatur transparansi backdrop modal */
    .modal-backdrop.show {
        opacity: 0.25 !important; /* Default Bootstrap adalah 0.5. Ubah nilai ini (0.0 - 1.0) */
    }
</style>
{{-- Jika menggunakan Google Fonts (Inter) --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchNamaMerk');
    const kondisiSelect = document.getElementById('filterKondisi');
    const lokasiSelect = document.getElementById('filterLokasi');
    const peralatanSelect = document.getElementById('filterPeralatan');
    const resetBtn = document.getElementById('resetAllBtn');
    const listContainer = document.getElementById('sparepartListContainer');
    const noResultsMessage = document.getElementById('noResultsMessage');
    const resultsCountElement = document.getElementById('resultsCount');
    const initialEmptyMessage = document.getElementById('initialEmptyMessage');
    const loadMoreBtn = document.getElementById('loadMoreBtn');

    const sparepartModalElement = document.getElementById('sparepartDetailModal');
    const modalBody = document.getElementById('sparepartModalBody');
    const modalTitle = document.getElementById('sparepartDetailModalLabel');
    let sparepartModal = null; // Initialize to null

    // --- Robust Modal Initialization ---
    if (sparepartModalElement) {
        if (typeof bootstrap !== 'undefined' && typeof bootstrap.Modal === 'function') {
            try {
                sparepartModal = new bootstrap.Modal(sparepartModalElement, {
                    backdrop: false // Default is true, allows closing on backdrop click
                });
            } catch (e) {
                console.error("Error creating Bootstrap modal instance:", e);
                // sparepartModal remains null
            }
        } else {
            console.error("Bootstrap Modal component (bootstrap.Modal) not found. Ensure Bootstrap 5 JavaScript is loaded correctly *before* this script. Modal functionality will be impaired.");
        }
    } else {
        console.error("Modal HTML element with ID 'sparepartDetailModal' not found in the DOM. Modal functionality cannot be initialized.");
    }
    // --- End Modal Initialization ---

    let allSparepartCards = [];
    if (listContainer) {
        allSparepartCards = Array.from(listContainer.querySelectorAll('.sparepart-card'));
    } else {
        console.error("Element with ID 'sparepartListContainer' not found. Card interactions will not work.");
    }
    
    let currentFilteredCards = [];
    const itemsPerPage = 5;
    let currentPage = 1;

    function getKondisiBadgeClass(kondisiText) {
        if (!kondisiText) return 'bg-secondary-subtle text-secondary-emphasis';
        const kondisiLower = kondisiText.toLowerCase().trim();
        if (kondisiLower === 'baru') return 'bg-success-subtle text-success-emphasis';
        if (kondisiLower === 'bekas' || kondisiLower === 'bekas baik') return 'bg-warning-subtle text-warning-emphasis';
        if (kondisiLower === 'rusak') return 'bg-danger-subtle text-danger-emphasis';
        return 'bg-secondary-subtle text-secondary-emphasis';
    }

    function populateModal(card) {
        if (!sparepartModal) {
            console.error("Cannot show modal: Bootstrap Modal instance is not available. Check initialization errors in the console.");
            alert("Fitur detail tidak tersedia saat ini. Silakan coba lagi nanti atau hubungi administrator."); // User-friendly message
            return;
        }
        if (!modalBody || !modalTitle) {
            console.error("Cannot populate modal: Modal body or title element not found in the DOM.");
            return;
        }

        try {
            const nama = card.querySelector('.sparepart-nama')?.textContent || 'N/A';
            const merk = card.querySelector('.sparepart-merk')?.textContent || 'N/A';
            const kondisi = card.querySelector('.sparepart-kondisi')?.textContent.trim() || 'N/A';
            const volume = card.querySelector('.sparepart-volume')?.textContent || 'N/A';
            const satuan = card.querySelector('.sparepart-satuan')?.textContent || 'N/A';
            const lokasi = card.querySelector('.sparepart-lokasi')?.textContent || 'N/A';
            const peralatan = card.querySelector('.sparepart-peralatan')?.textContent || 'N/A';
            const pnp = card.querySelector('.sparepart-pnp')?.textContent || 'N/A';
            const plat = card.querySelector('.sparepart-plat')?.textContent || '';
            const user = card.querySelector('.sparepart-user')?.textContent || 'N/A';

            modalTitle.textContent = 'Detail: ' + nama;
            
            let html = `<div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold text-primary mb-0">${nama} <small class="text-muted">(${merk})</small></h5>
                            <span class="badge rounded-pill ${getKondisiBadgeClass(kondisi)}">${kondisi}</span>
                        </div>`;
            html += `<hr class="my-3">`;
            html += `<div class="row gx-3 gy-2 small">`;
            html += `    <div class="col-12 col-md-6"><i class="fas fa-box-open fa-fw text-muted me-2"></i><strong>Stok:</strong> ${volume} ${satuan}</div>`;
            html += `    <div class="col-12 col-md-6"><i class="fas fa-map-marker-alt fa-fw text-muted me-2"></i><strong>Lokasi:</strong> ${lokasi}</div>`;
            
            const peralatanWrapper = card.querySelector('.sparepart-peralatan-wrapper');
            if (peralatan && peralatan !== '-' && peralatanWrapper && !peralatanWrapper.classList.contains('d-none')) {
                html += `<div class="col-12"><i class="fas fa-cogs fa-fw text-muted me-2"></i><strong>Peralatan:</strong> ${peralatan}</div>`;
            }
            html += `</div>`;

            const pnpPlatWrapper = card.querySelector('.sparepart-pnp-plat-wrapper');
            const userWrapper = card.querySelector('.sparepart-user-wrapper');
            let hasExtraInfoSection = false;
            let extraInfoHtml = '';

            if (pnpPlatWrapper && !pnpPlatWrapper.classList.contains('d-none') && ((pnp && pnp !== 'N/A') || plat)) {
                if (!hasExtraInfoSection) {
                    extraInfoHtml += `<div class="border-top pt-2 mt-2">`;
                    hasExtraInfoSection = true;
                }
                extraInfoHtml += `  <p class="mb-1 text-muted" style="font-size: 0.8rem;"><i class="fas fa-car fa-fw me-2"></i><strong>PNP:</strong> ${pnp}${pnp && pnp !== 'N/A' && plat ? ' / ' : ''}${plat}</p>`;
            }

            if (userWrapper && !userWrapper.classList.contains('d-none') && user && user !== '-') {
                 if (!hasExtraInfoSection) {
                    extraInfoHtml += `<div class="border-top pt-2 mt-2">`; // If only user info, add border top
                    hasExtraInfoSection = true;
                } else {
                     extraInfoHtml += `<div class="pt-1">`; // If PNP info already added border, just add padding
                }
                extraInfoHtml += `    <p class="mb-0 text-muted" style="font-size: 0.8rem;"><i class="fas fa-user fa-fw me-2"></i><strong>PIC:</strong> ${user}</p>`;
                 if (hasExtraInfoSection && !extraInfoHtml.endsWith('</div>')) extraInfoHtml += `</div>`; // Close the div for user if it was opened
            }
            
            if (hasExtraInfoSection) {
                 if (!extraInfoHtml.endsWith('</div>')) extraInfoHtml += `</div>`; // Close the main border-top div
                 html += extraInfoHtml;
            }

            modalBody.innerHTML = html;
            sparepartModal.show();

        } catch (e) {
            console.error("Error populating or showing modal:", e);
            if(modalBody) modalBody.innerHTML = "<p class='text-center text-danger py-4'>Terjadi kesalahan saat memuat detail sparepart. Silakan coba lagi.</p>";
            // Attempt to show modal even with error content, if the modal instance is valid
            if (sparepartModal) {
                try {
                    sparepartModal.show();
                } catch (showError) {
                    console.error("Additionally, failed to show modal after an error:", showError);
                }
            }
        }
    }

    function displayItems() {
        if (!listContainer) return; // Guard clause

        allSparepartCards.forEach(card => card.style.display = 'none');
        const itemsToShow = currentFilteredCards.slice(0, currentPage * itemsPerPage);
        itemsToShow.forEach(card => card.style.display = '');

        if (resultsCountElement) {
            resultsCountElement.textContent = `Menampilkan ${itemsToShow.length} dari ${currentFilteredCards.length} sparepart yang cocok (Total ${allSparepartCards.length} item).`;
        }

        if (loadMoreBtn) {
            loadMoreBtn.style.display = itemsToShow.length < currentFilteredCards.length ? 'block' : 'none';
        }

        if (noResultsMessage) {
            noResultsMessage.style.display = currentFilteredCards.length === 0 && (searchInput.value || kondisiSelect.value || lokasiSelect.value || peralatanSelect.value) && allSparepartCards.length > 0 ? 'block' : 'none';
        }
        
        if (initialEmptyMessage) {
            initialEmptyMessage.style.display = allSparepartCards.length === 0 ? 'block' : 'none';
            if (allSparepartCards.length === 0 && noResultsMessage) {
                noResultsMessage.style.display = 'none';
            }
        }
    }

    function applyAndFilter() {
        const searchText = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const kondisiValue = kondisiSelect ? kondisiSelect.value.toLowerCase() : '';
        const lokasiValue = lokasiSelect ? lokasiSelect.value.toLowerCase() : '';
        const peralatanValue = peralatanSelect ? peralatanSelect.value.toLowerCase() : '';

        currentFilteredCards = allSparepartCards.filter(card => {
            const nama = card.querySelector('.sparepart-nama')?.textContent.toLowerCase() || '';
            const merk = card.querySelector('.sparepart-merk')?.textContent.toLowerCase() || '';
            const kondisiCard = card.querySelector('.sparepart-kondisi')?.textContent.toLowerCase() || '';
            const lokasiCard = card.querySelector('.sparepart-lokasi')?.textContent.toLowerCase() || '';
            const peralatanCardText = card.querySelector('.sparepart-peralatan')?.textContent.toLowerCase() || '';
            const isPeralatanVisible = !card.querySelector('.sparepart-peralatan-wrapper')?.classList.contains('d-none');

            const searchMatch = searchText === '' || nama.includes(searchText) || merk.includes(searchText);
            const kondisiMatch = kondisiValue === '' || (kondisiCard && kondisiCard.includes(kondisiValue));
            const lokasiMatch = lokasiValue === '' || (lokasiCard && lokasiCard.includes(lokasiValue));
            
            let peralatanMatch = peralatanValue === '';
            if (peralatanValue !== '') {
                peralatanMatch = isPeralatanVisible && peralatanCardText.includes(peralatanValue);
            }
            return searchMatch && kondisiMatch && lokasiMatch && peralatanMatch;
        });

        currentPage = 1;
        displayItems();
    }

    allSparepartCards.forEach(card => {
        card.addEventListener('click', function() {
            populateModal(this);
        });
    });

    if (searchInput) searchInput.addEventListener('input', applyAndFilter);
    if (kondisiSelect) kondisiSelect.addEventListener('change', applyAndFilter);
    if (lokasiSelect) lokasiSelect.addEventListener('change', applyAndFilter);
    if (peralatanSelect) peralatanSelect.addEventListener('change', applyAndFilter);

    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            if (kondisiSelect) kondisiSelect.value = '';
            if (lokasiSelect) lokasiSelect.value = '';
            if (peralatanSelect) peralatanSelect.value = '';
            
            // Close filter collapse if open
            const filterCollapseElement = document.getElementById('filterCollapse');
            if (filterCollapseElement && filterCollapseElement.classList.contains('show')) {
                const bsCollapse = bootstrap.Collapse.getInstance(filterCollapseElement) || new bootstrap.Collapse(filterCollapseElement, {toggle: false});
                bsCollapse.hide();
            }
            applyAndFilter();
        });
    }

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            currentPage++;
            displayItems();
        });
    }

    // Initial filter and display
    if (allSparepartCards.length > 0) {
        applyAndFilter(); // Apply filters to set initial currentFilteredCards
    } else {
         if (resultsCountElement) resultsCountElement.textContent = 'Tidak ada sparepart untuk ditampilkan.';
         if (initialEmptyMessage) initialEmptyMessage.style.display = 'block';
         if (noResultsMessage) noResultsMessage.style.display = 'none';
         if (loadMoreBtn) loadMoreBtn.style.display = 'none';
    }
});
</script>
@endsection