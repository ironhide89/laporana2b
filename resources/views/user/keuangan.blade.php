@extends('layout.mainuser') {{-- Menggunakan layout mobile utama --}}

@section('content')

{{-- Container for page content --}}
<div class="container-fluid px-3 py-4">

    {{-- Page Title --}}
    <div class="text-center mb-4">
        <i class="fas fa-dollar-sign fa-2x text-success mb-2"></i> {{-- Ikon untuk keuangan --}}
        <h4 class="fw-bold" style="color: var(--app-dark);">Tambah Pengeluaran Baru</h4>
        <p class="text-muted" style="font-size: 0.9rem;">Masukkan detail pengeluaran Anda.</p>
    </div>

    {{-- Form Container Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-3 p-md-4">

            {{-- General Success/Error Flash Messages --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Validation Errors Summary (Optional, but helpful) --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6 class="fw-bold alert-heading">Oops! Ada beberapa kesalahan:</h6>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('user.store_keuangan') }}" method="POST" id="keuanganForm" class="needs-validation" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="row">
                    {{-- Tanggal --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="tanggal" class="form-label fw-medium">Tanggal <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal"
                               value="{{ old('tanggal', now()->format('Y-m-d')) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="invalid-feedback">Mohon masukkan tanggal pengeluaran.</div>
                        @enderror
                    </div>

                    {{-- Pengisi (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="user" class="form-label fw-medium">Pengisi</label>
                        <input type="text" class="form-control readonly-input @error('user') is-invalid @enderror" name="user" id="user"
                               value="{{ old('user', Auth::user()->name) }}" readonly required>
                        @error('user')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div> {{-- This is for client-side Bootstrap 'valid' state --}}
                        @enderror
                    </div>
                </div>

                {{-- Item Pengeluaran Utama --}}
                <div class="mb-3">
                    <label for="item_utama" class="form-label fw-medium">Kategori Pengeluaran Utama <span class="text-danger">*</span></label>
                    <select class="form-select @error('item_utama') is-invalid @enderror" name="item_utama" id="item_utama" required>
                        <option value="" @if(empty(old('item_utama'))) selected @endif disabled>-- Pilih Kategori Utama --</option>
                        <option value="-" @if(old('item_utama') === '-') selected @endif>Tidak Ada Kaitan Khusus</option>
                        <option value="Makan/Minum" @if(old('item_utama') === 'Makan/Minum') selected @endif>Makan/Minum</option>
                        <option value="Pulsa/Paketan" @if(old('item_utama') === 'Pulsa/Paketan') selected @endif>Pulsa/Paketan</option>
                        <option value="Makanan Hewan" @if(old('item_utama') === 'Makanan Hewan') selected @endif>Makanan Hewan</option>
                        <option value="Alat Tulis Kantor" @if(old('item_utama') === 'Alat Tulis Kantor') selected @endif>Alat Tulis Kantor</option>
                        @isset($vehicles)
                            <optgroup label="Kendaraan (Servis/BBM/Parkir dll)">
                                @foreach($vehicles as $v)
                                    <option value="{{ $v->vehicle_name }}" @if(old('item_utama') === $v->vehicle_name) selected @endif>{{ $v->vehicle_name }}</option>
                                @endforeach
                            </optgroup>
                        @endisset
                        <option value="Lain Lain" @if(old('item_utama') === 'Lain Lain') selected @endif>Lain Lain</option>
                    </select>
                    @error('item_utama')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @else
                        <div class="invalid-feedback">Mohon pilih kategori pengeluaran utama atau kendaraan terkait.</div>
                    @enderror
                </div>

                {{-- Container untuk item-item pengeluaran dinamis --}}
                @php
                    // Prepare old data for dynamic items
                    // Default to one empty item structure if no old data or validation errors for the first item.
                    // This ensures the first item block always renders.
                    $oldDetails = old('detail', ['']);
                    $oldVolumes = old('volume', ['']);
                    $oldSatuans = old('satuan', ['']);
                    $oldHargas  = old('harga', ['']);

                    // Determine the number of items to render based on the longest old array,
                    // or at least 1 if all are empty (for the initial default item).
                    $itemCount = max(1, count($oldDetails), count($oldVolumes), count($oldSatuans), count($oldHargas));

                    // Normalize arrays to have the same length for safe iteration
                    for ($i = 0; $i < $itemCount; $i++) {
                        $details[$i] = $oldDetails[$i] ?? '';
                        $volumes[$i] = $oldVolumes[$i] ?? '';
                        $satuans[$i] = $oldSatuans[$i] ?? '';
                        $hargas[$i]  = $oldHargas[$i] ?? '';
                    }
                @endphp

                <div id="expenseItemsContainer" class="mb-2">
                    @for ($i = 0; $i < $itemCount; $i++)
                    <div class="expense-item-row border rounded p-3 mb-3 position-relative">
                        @if ($i > 0) {{-- Remove button only for items beyond the first one (dynamically added or from old input) --}}
                        <button type="button" class="btn btn-danger btn-sm remove-item-btn" title="Hapus item ini">
                            <i class="fas fa-times"></i>
                        </button>
                        @endif
                        <h6 class="fw-semibold mb-3" style="color: var(--app-primary);">Detail Item #{{ $i + 1 }}</h6>
                        <div class="mb-3">
                            <label for="detail_{{ $i }}" class="form-label fw-medium">Deskripsi Pengeluaran <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('detail.'.$i) is-invalid @enderror" name="detail[]" id="detail_{{ $i }}" placeholder="Contoh: Beli oli mesin..." rows="2" required>{{ $details[$i] }}</textarea>
                            @error('detail.'.$i)
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Mohon masukkan detail pengeluaran.</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-3 mb-3">
                                <label for="volume_{{ $i }}" class="form-label fw-medium">Volume <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('volume.'.$i) is-invalid @enderror" name="volume[]" id="volume_{{ $i }}" value="{{ $volumes[$i] }}" placeholder="Cth: 1" step="any" min="0" required>
                                @error('volume.'.$i)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Wajib.</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md-3 mb-3">
                                <label for="satuan_{{ $i }}" class="form-label fw-medium">Satuan <span class="text-danger">*</span></label>
                                <select class="form-select @error('satuan.'.$i) is-invalid @enderror" name="satuan[]" id="satuan_{{ $i }}" required>
                                    <option value="" @if(empty($satuans[$i])) selected @endif disabled>Pilih</option>
                                    <option value="-" @if($satuans[$i] === '-') selected @endif >(-)</option>
                                    <option value="UN" @if($satuans[$i] === 'UN') selected @endif >UN</option>
                                    <option value="LS" @if($satuans[$i] === 'LS') selected @endif >LS</option>
                                    <option value="SET" @if($satuans[$i] === 'SET') selected @endif >SET</option>
                                    <option value="KG" @if($satuans[$i] === 'KG') selected @endif >KG</option>
                                    <option value="L" @if($satuans[$i] === 'L') selected @endif >L</option>
                                    <option value="M" @if($satuans[$i] === 'M') selected @endif >M</option>
                                    <option value="CM" @if($satuans[$i] === 'CM') selected @endif >CM</option>
                                    <option value="MM" @if($satuans[$i] === 'MM') selected @endif >MM</option>
                                </select>
                                @error('satuan.'.$i)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Pilih satuan.</div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="harga_{{ $i }}" class="form-label fw-medium">Harga Satuan (Rp) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('harga.'.$i) is-invalid @enderror" name="harga[]" id="harga_{{ $i }}" value="{{ $hargas[$i] }}" placeholder="Cth: 50000" step="any" min="0" required>
                                @error('harga.'.$i)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Masukkan harga.</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="mb-3 text-center">
                    <button type="button" id="addExpenseItemBtn" class="btn btn-outline-primary rounded-pill">
                        <i class="fas fa-plus me-1"></i> Tambah Detail Pengeluaran Lain
                    </button>
                </div>

                {{-- Foto Nota --}}
                <div class="mb-3">
                    <label for="foto_nota" class="form-label fw-medium">Unggah Foto Nota (Opsional)</label>
                    <input type="file" class="form-control @error('foto_nota') is-invalid @enderror @if($errors->has('foto_nota.*')) is-invalid @endif" name="foto_nota[]" id="foto_nota" accept="image/*" capture="environment" multiple>
                    <small class="text-muted d-block mt-1">
                        Anda dapat mengambil foto dengan kamera atau memilih dari galeri. Ulangi untuk menambah lebih dari satu foto nota (maks. 2MB per foto sebelum kompresi).
                    </small>
                    @error('foto_nota') {{-- Error for the array field itself (e.g. not an array if dev makes a mistake) --}}
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @foreach ($errors->get('foto_nota.*') as $message) {{-- Loop through errors for individual files --}}
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @endforeach
                    <div id="foto_nota_invalid_feedback" class="invalid-feedback" style="display: none;">
                        Mohon periksa file nota Anda. {{-- For client-side JS specific errors --}}
                    </div>
                    <div id="foto_nota_list_container" class="mt-2" style="font-size: 0.85rem;"></div>
                </div>

                {{-- Tombol Submit --}}
                <div class="mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-success rounded-pill w-100 fw-semibold submit-button">
                        <i class="fas fa-save me-2"></i> Simpan Semua Pengeluaran
                    </button>
                </div>
            </form>

        </div> {{-- Akhir card-body --}}
    </div> {{-- Akhir card --}}

</div> {{-- Akhir container-fluid --}}
@endsection

@push('styles')
{{-- CSS styles remain the same as previously provided --}}
<style>
    /* Styling untuk input read-only */
    .readonly-input {
        background-color: var(--app-light, #f8f9fc) !important;
        border: 1px solid var(--app-lighter-grey, #eaecf4);
        opacity: 0.9;
        cursor: not-allowed;
    }

    /* Styling label form standar */
    .form-label {
        font-weight: 500;
        font-size: 0.85rem; /* Sedikit lebih kecil untuk form yang padat */
        color: var(--app-dark, #5a5c69);
        margin-bottom: 0.3rem;
    }

    /* Styling form control umum */
    .form-control,
    .form-select {
        font-size: 0.9rem; /* Sedikit lebih kecil */
        border-radius: var(--app-border-radius-sm, 0.5rem) !important; /* Rounded lebih kecil */
        border: 1px solid var(--app-lighter-grey, #eaecf4);
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
    .form-control:focus,
    .form-select:focus {
        border-color: var(--app-primary, #4e73df);
        box-shadow: 0 0 0 0.2rem rgba(var(--app-primary-rgb, 78, 115, 223), 0.25);
    }
    textarea.form-control {
        min-height: calc(1.5em + 1rem + 2px); /* Default height for 2 rows */
    }

    /* Styling file input */
    .form-control[type="file"] {
        padding: 0.5rem 0.75rem;
        line-height: 1.5;
    }
    .form-control[type="file"]::file-selector-button {
        padding: 0.5rem 0.75rem;
        margin: -0.5rem -0.75rem;
        margin-inline-end: 0.75rem;
        color: var(--app-primary);
        background-color: var(--app-primary-subtle, #e9eefe);
        border: none;
        border-inline-end-width: 1px;
        border-inline-end-style: solid;
        border-color: inherit;
        border-radius: 0;
        transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    .form-control[type="file"]:hover::file-selector-button {
        background-color: #d8e0fd;
    }

    /* Styling Tombol Submit */
    .btn-success {
        background-color: var(--app-success, #1cc88a);
        border-color: var(--app-success, #1cc88a);
        padding-top: 0.7rem;
        padding-bottom: 0.7rem;
        font-size: 1rem;
    }
    .btn-success:hover:not(:disabled) {
        background-color: #17a673;
        border-color: #17a673;
    }
    .btn-success:disabled {
        opacity: 0.65;
    }
    .btn-outline-primary {
        color: var(--app-primary);
        border-color: var(--app-primary);
    }
    .btn-outline-primary:hover {
        color: #fff;
        background-color: var(--app-primary);
        border-color: var(--app-primary);
    }
    .btn-danger.btn-sm { /* Tombol hapus item */
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }

    /* Styling untuk pesan validasi Bootstrap */
    .was-validated .form-control.is-invalid, .form-control.is-invalid, /* Ensure .is-invalid also shows icon */
    .was-validated .form-select.is-invalid, .form-select.is-invalid,
    .was-validated textarea.is-invalid, textarea.is-invalid {
        border-color: var(--app-danger, #e74a3b);
        padding-right: calc(1.5em + .75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23e74a3b'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e74a3b' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    .readonly-input,
    .readonly-input:focus {
        background-image: none !important;
        padding-right: 0.75rem !important;
        border-color: var(--app-lighter-grey, #eaecf4) !important;
    }
     /* Style for file input validation states */
    .was-validated input[type="file"].is-invalid, input[type="file"].is-invalid {
        border-color: var(--app-danger, #e74a3b) !important;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23e74a3b'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e74a3b' stroke='none'/%3e%3c/svg%3e") !important;
        padding-right: calc(1.5em + .75rem) !important;
        background-repeat: no-repeat !important;
        background-position: right calc(.375em + .1875rem) center !important;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem) !important;
    }
    .was-validated input[type="file"].is-valid, input[type="file"].is-valid {
        border-color: var(--app-success, #1cc88a) !important;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%231cc88a' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") !important;
        padding-right: calc(1.5em + .75rem) !important;
        background-repeat: no-repeat !important;
        background-position: right calc(.375em + .1875rem) center !important;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem) !important;
    }


    .was-validated .form-control.is-valid, .form-control.is-valid, /* Ensure .is-valid also shows icon */
    .was-validated .form-select.is-valid, .form-select.is-valid,
    .was-validated textarea.is-valid, textarea.is-valid {
        border-color: var(--app-success, #1cc88a);
        padding-right: calc(1.5em + .75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%231cc88a' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    .was-validated textarea.form-control.is-valid, .was-validated textarea.form-control.is-invalid{
        background-position: top calc(.375em + .1875rem) right calc(.375em + .1875rem);
    }

    .invalid-feedback { display: none; width: 100%; margin-top: .25rem; font-size: .8rem; color: var(--app-danger, #e74a3b); }
    .was-validated .is-invalid ~ .invalid-feedback, /* General rule for was-validated */
    .form-control.is-invalid ~ .invalid-feedback, /* For manually added is-invalid */
    .form-select.is-invalid ~ .invalid-feedback { display: block; }

    .invalid-feedback.d-block { display: block !important; } /* Force display for server errors */

    #foto_nota_invalid_feedback.d-block { display: block !important; }
    .was-validated .is-valid ~ .valid-feedback { display: block; font-size: .8rem; color: var(--app-success); }

    #foto_nota_list_container .list-group-item { padding: 0.4rem 0.8rem; font-size: 0.85rem; }
    #foto_nota_list_container .list-group-item button.btn-remove-file { padding: 0.1rem 0.4rem; font-size: 0.8rem; }
    .expense-item-row .remove-item-btn { position: absolute; top: 0.75rem; right: 0.75rem; line-height: 1; }
    @media (max-width: 767.98px) {
        .expense-item-row .remove-item-btn { position: relative; top: auto; right: auto; display: block; width: 100%; margin-top: 0.5rem; }
    }
</style>
@endpush

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const expenseItemsContainer = document.getElementById('expenseItemsContainer');
    const addExpenseItemBtn = document.getElementById('addExpenseItemBtn');
    
    // Initialize itemIndex based on how many items are rendered from old() input
    // The @php block above calculates $itemCount. If no old data, $itemCount is 1 (for the first item).
    // So, the next item to be added by JS will be $itemCount.
    let itemIndex = {{ $itemCount }};


    if (addExpenseItemBtn && expenseItemsContainer) {
        addExpenseItemBtn.addEventListener('click', function () {
            const newItemRow = document.createElement('div');
            newItemRow.classList.add('expense-item-row', 'border', 'rounded', 'p-3', 'mb-3', 'position-relative');
            // Note: The itemIndex for JS-added items starts correctly after old items.
            // The display # will be itemIndex + 1 because $i was 0-indexed.
            // If $itemCount was 1 (only the first item from PHP), JS adds item with index 1, displayed as #2.
            // If $itemCount was 2 (from old data, indices 0, 1), JS adds item with index 2, displayed as #3.
            newItemRow.innerHTML = `
                <button type="button" class="btn btn-danger btn-sm remove-item-btn" title="Hapus item ini"><i class="fas fa-times"></i></button>
                <h6 class="fw-semibold mb-3" style="color: var(--app-primary);">Detail Item #${itemIndex + 1}</h6>
                <div class="mb-3">
                    <label for="detail_${itemIndex}" class="form-label fw-medium">Deskripsi Pengeluaran <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="detail[]" id="detail_${itemIndex}" placeholder="Contoh: Servis rutin, Beli ATK, dll" rows="2" required></textarea>
                    <div class="invalid-feedback">Mohon masukkan detail pengeluaran.</div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-3 mb-3"><label for="volume_${itemIndex}" class="form-label fw-medium">Volume <span class="text-danger">*</span></label><input type="number" class="form-control" name="volume[]" id="volume_${itemIndex}" placeholder="Cth: 1" step="any" min="0" required><div class="invalid-feedback">Wajib.</div></div>
                    <div class="col-6 col-md-3 mb-3"><label for="satuan_${itemIndex}" class="form-label fw-medium">Satuan <span class="text-danger">*</span></label><select class="form-select" name="satuan[]" id="satuan_${itemIndex}" required><option value="" selected disabled>Pilih</option><option value="-">(-)</option><option value="UN">UN</option><option value="LS">LS</option><option value="SET">SET</option><option value="KG">KG</option><option value="L">L</option><option value="M">M</option><option value="CM">CM</option><option value="MM">MM</option></select><div class="invalid-feedback">Pilih satuan.</div></div>
                    <div class="col-12 col-md-6 mb-3"><label for="harga_${itemIndex}" class="form-label fw-medium">Harga Satuan (Rp) <span class="text-danger">*</span></label><input type="number" class="form-control" name="harga[]" id="harga_${itemIndex}" placeholder="Cth: 25000" step="any" min="0" required><div class="invalid-feedback">Masukkan harga.</div></div>
                </div>
            `;
            expenseItemsContainer.appendChild(newItemRow);
            itemIndex++;
        });
    }
    if (expenseItemsContainer) {
        expenseItemsContainer.addEventListener('click', function (event) {
            if (event.target.closest('.remove-item-btn')) {
                 const itemRow = event.target.closest('.expense-item-row');
                 itemRow.remove();
                 // No need to decrement itemIndex or re-number here,
                 // as new items will always use the incrementing itemIndex.
                 // Server-side will just process the arrays as submitted.
            }
        });
    }

    async function compressImage(file, options = {}) {
        const { maxWidth = 600, maxHeight = 600, quality = 0.5 } = options;
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (event) => {
                const img = new Image();
                img.src = event.target.result;
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    let width = img.width; let height = img.height;
                    if (width > height) { if (width > maxWidth) { height = Math.round(height * (maxWidth / width)); width = maxWidth; } }
                    else { if (height > maxHeight) { width = Math.round(width * (maxHeight / height)); height = maxHeight; } }
                    canvas.width = width; canvas.height = height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);
                    canvas.toBlob((blob) => {
                        if (blob) {
                            const compressedFile = new File([blob], file.name, { type: 'image/jpeg', lastModified: Date.now() });
                            console.log(`Compressed ${file.name}: Original ${(file.size / 1024).toFixed(2)}KB -> New ${(compressedFile.size / 1024).toFixed(2)}KB`);
                            resolve(compressedFile);
                        } else { reject(new Error('Canvas to Blob failed')); }
                    }, 'image/jpeg', quality);
                };
                img.onerror = (e) => { console.error("Image load error:", e); reject(e); };
            };
            reader.onerror = (e) => { console.error("FileReader error:", e); reject(e); };
        });
    }

    const fotoNotaInput = document.getElementById('foto_nota');
    const notaListContainer = document.getElementById('foto_nota_list_container');
    const notaInvalidFeedbackEl = document.getElementById('foto_nota_invalid_feedback'); // Changed variable name
    let accumulatedNotaFiles = [];

    if (fotoNotaInput) {
        fotoNotaInput.addEventListener('change', async function(event) {
            const newFiles = Array.from(event.target.files);
            event.target.value = null;

            fotoNotaInput.disabled = true;
            const labelForNota = document.querySelector('label[for="foto_nota"]');
            let originalLabelHtml = "";
            if (labelForNota) {
                originalLabelHtml = labelForNota.innerHTML;
                if (!labelForNota.querySelector('.spinner-border')) {
                    labelForNota.innerHTML += ' <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>';
                }
            }

            let someFilesFailed = false;
            let specificFileErrorMsg = "";

            for (const selectedFile of newFiles) {
                if (selectedFile.type.startsWith('image/')) {
                    try {
                        const compressedFile = await compressImage(selectedFile, { maxWidth: 600, maxHeight: 600, quality: 0.5 });
                        if (!accumulatedNotaFiles.some(f => f.name === compressedFile.name && f.size === compressedFile.size)) {
                            accumulatedNotaFiles.push(compressedFile);
                        }
                    } catch (error) {
                        someFilesFailed = true;
                        specificFileErrorMsg = `Gagal memproses ${selectedFile.name}.`;
                        console.error('Gagal mengompres foto nota:', selectedFile.name, error);
                    }
                } else {
                    someFilesFailed = true;
                    specificFileErrorMsg = `File "${selectedFile.name}" bukan gambar.`;
                    console.warn('File non-gambar dipilih untuk nota:', selectedFile.name);
                }
            }
            
            renderSelectedNotaFiles();
            fotoNotaInput.disabled = false;
            if (labelForNota) labelForNota.innerHTML = originalLabelHtml;

            if (someFilesFailed && notaInvalidFeedbackEl) {
                notaInvalidFeedbackEl.textContent = specificFileErrorMsg || 'Mohon periksa file nota Anda.';
                notaInvalidFeedbackEl.style.display = 'block';
                notaInvalidFeedbackEl.classList.add('d-block'); // Ensure it's displayed
                fotoNotaInput.classList.add('is-invalid');
            } else if (accumulatedNotaFiles.length > 0 && notaInvalidFeedbackEl) {
                notaInvalidFeedbackEl.style.display = 'none';
                notaInvalidFeedbackEl.classList.remove('d-block');
                fotoNotaInput.classList.remove('is-invalid');
                // fotoNotaInput.classList.add('is-valid'); // Optional
            } else if (accumulatedNotaFiles.length === 0 && notaInvalidFeedbackEl) {
                notaInvalidFeedbackEl.style.display = 'none';
                notaInvalidFeedbackEl.classList.remove('d-block');
                fotoNotaInput.classList.remove('is-invalid', 'is-valid');
            }
        });
    }

    function renderSelectedNotaFiles() {
        if (!notaListContainer) return;
        notaListContainer.innerHTML = '';
        if (accumulatedNotaFiles.length > 0) {
            const listGroup = document.createElement('ul');
            listGroup.className = 'list-group mt-2';
            accumulatedNotaFiles.forEach((file, index) => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item list-group-item-sm d-flex justify-content-between align-items-center';
                const fileNameSpan = document.createElement('span');
                fileNameSpan.textContent = `${file.name} (${(file.size / 1024).toFixed(2)} KB)`;
                listItem.appendChild(fileNameSpan);
                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-danger btn-sm btn-remove-file';
                removeButton.innerHTML = '&times;';
                removeButton.title = 'Hapus file';
                removeButton.onclick = function() {
                    accumulatedNotaFiles.splice(index, 1);
                    renderSelectedNotaFiles(); // Re-render the list
                    if (accumulatedNotaFiles.length === 0 && notaInvalidFeedbackEl) { // If all files removed
                        notaInvalidFeedbackEl.style.display = 'none';
                        notaInvalidFeedbackEl.classList.remove('d-block');
                        fotoNotaInput.classList.remove('is-invalid', 'is-valid');
                    }
                };
                listItem.appendChild(removeButton);
                listGroup.appendChild(listItem);
            });
            notaListContainer.appendChild(listGroup);
        }
    }

    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    const submitButtons = form.querySelectorAll('button[type="submit"], input[type="submit"]');
                    
                    if (fotoNotaInput && accumulatedNotaFiles.length > 0) {
                        const dataTransfer = new DataTransfer();
                        accumulatedNotaFiles.forEach(file => dataTransfer.items.add(file));
                        fotoNotaInput.files = dataTransfer.files;
                    } else if (fotoNotaInput) {
                        fotoNotaInput.value = null; 
                    }
                    
                    // Clear is-invalid for foto_nota if no files are there and no JS error message is showing
                    // This prevents Bootstrap's default invalid state if field is simply empty and optional
                    if (fotoNotaInput && accumulatedNotaFiles.length === 0) {
                        if (!(notaInvalidFeedbackEl && notaInvalidFeedbackEl.style.display === 'block' && notaInvalidFeedbackEl.classList.contains('d-block'))) {
                             fotoNotaInput.classList.remove('is-invalid');
                        }
                    }

                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        // Find first invalid field among dynamic items or general fields
                        const firstInvalidDynamic = form.querySelector('.expense-item-row :invalid');
                        const firstInvalidGeneral = form.querySelector(':invalid:not(.expense-item-row input):not(.expense-item-row select):not(.expense-item-row textarea)');
                        
                        let fieldToFocus = null;
                        if (firstInvalidGeneral) { // Prioritize general fields above dynamic ones
                            fieldToFocus = firstInvalidGeneral;
                        } else if (firstInvalidDynamic) {
                            fieldToFocus = firstInvalidDynamic;
                        } else {
                             fieldToFocus = form.querySelector(':invalid'); // Fallback
                        }

                        if (fieldToFocus) {
                            fieldToFocus.focus({ preventScroll: true });
                            fieldToFocus.scrollIntoView({behavior: 'smooth', block: 'center'});
                        }
                        alert('Perhatian! Mohon lengkapi semua bagian yang wajib diisi (*) sebelum menyimpan.');
                    } else {
                        submitButtons.forEach(button => {
                            button.disabled = true;
                            button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...`;
                        });
                    }
                    form.classList.add('was-validated');
                }, false)
            })
    })();
});
</script>
@endsection