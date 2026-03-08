@extends('layout.mainuser') {{-- Menggunakan layout utama --}}

@section('content')
{{-- Container for page content --}}
<div class="container-fluid px-3 py-4">

    {{-- Page Title --}}
    <div class="text-center mb-4">
        <i class="fas fa-oil-can fa-2x text-primary mb-2"></i> {{-- Ikon untuk Oli --}}
        <h4 class="fw-bold" style="color: var(--app-dark, #5a5c69);">Form Pergantian Oli</h4>
        <p class="text-muted" style="font-size: 0.9rem;">Lengkapi detail pergantian oli kendaraan.</p>
    </div>

    {{-- Form Container Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-3 p-md-4">

            {{-- Display Validation Errors (Standard Laravel) --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Mohon periksa isian form Anda:
                    <ul class="mb-0 mt-2 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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

            {{-- Form --}}
            <form action="{{ route('user.store_form_oli') }}" method="POST" id="oilChangeForm" class="needs-validation" enctype="multipart/form-data" novalidate>
                @csrf

                {{-- Make sure to pass $vehicles->id if your controller needs it --}}
                {{-- <input type="hidden" name="vehicle_id" value="{{ $vehicles->id ?? '' }}"> --}}

                <div class="row">
                    {{-- Nama Teknisi (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="name" class="form-label fw-medium">Nama Teknisi</label>
                        <input type="text" class="form-control readonly-input @error('name') is-invalid @enderror" name="name" id="name"
                               value="{{ old('name', Auth::user()->name) }}" readonly required>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div>
                        @enderror
                    </div>

                    {{-- Nama Teknisi Dinas (Menggunakan String Hasil Olahan) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="nama_dinas" class="form-label fw-medium">Nama Teknisi Dinas</label>
                        @if(!empty($namaTeknisiDinasString))
                            <input type="text" class="form-control readonly-input @error('nama_dinas') is-invalid @enderror" name="nama_dinas" id="nama_dinas"
                                   value="{{ old('nama_dinas', $namaTeknisiDinasString) }}" readonly required>
                            @error('nama_dinas')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @else
                                <div class="valid-feedback">Ok!</div>
                            @enderror
                        @else
                            <div id="nama-dinas-warning" class="alert alert-warning p-2 mt-1" role="alert" style="font-size: 0.9rem;">
                                <i class="fas fa-exclamation-triangle me-1"></i> Tidak ada Teknisi Dinas terjadwal/ditemukan hari ini. Hubungi admin jika keliru.
                            </div>
                            {{-- Add a hidden input with a distinct value if you need to check this server-side easily, though JS handles submit prevention --}}
                            {{-- <input type="hidden" name="nama_dinas_warning_active" value="true"> --}}
                        @endif
                    </div>

                    {{-- Nama Kendaraan (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="vehicle_name" class="form-label fw-medium">Nama Kendaraan</label>
                        <input type="text" class="form-control readonly-input @error('vehicle_name') is-invalid @enderror" name="vehicle_name" id="vehicle_name"
                               value="{{ old('vehicle_name', ($vehicles->vehicle_name ?? 'N/A')) }}" readonly required>
                        @error('vehicle_name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Tanggal Pergantian (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="tanggal_oli" class="form-label fw-medium">Tanggal Pergantian</label>
                        <input type="date" class="form-control readonly-input @error('tanggal_oli') is-invalid @enderror" name="tanggal_oli" id="tanggal_oli"
                               value="{{ old('tanggal_oli', ($todays ?? date('Y-m-d'))) }}" readonly required>
                        @error('tanggal_oli')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div>
                        @enderror
                    </div>

                    {{-- Jenis Oli (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="jenis_oli" class="form-label fw-medium">Jenis Oli</label>
                        <input type="text" class="form-control readonly-input @error('jenis_oli') is-invalid @enderror" name="jenis_oli" id="jenis_oli"
                               value="{{ old('jenis_oli', ($vehicles->jenis_oli ?? 'N/A')) }}" readonly required>
                        @error('jenis_oli')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- Volume Oli (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="volume_oli" class="form-label fw-medium">Volume Oli (Liter)</label>
                        <div class="input-group">
                            <input type="number" class="form-control readonly-input @error('volume_oli') is-invalid @enderror" name="volume_oli" id="volume_oli"
                                   placeholder="Volume dalam Liter" step="0.1" min="0"
                                   value="{{ old('volume_oli', ($vehicles->volume_oli ?? '')) }}" readonly required>
                            <span class="input-group-text">Liter</span>
                        </div>
                        @error('volume_oli')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div>
                        @enderror
                    </div>

                    {{-- Kategori Oli (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="kategori_oli" class="form-label fw-medium">Kategori Oli</label>
                        <input type="text" class="form-control readonly-input @error('kategori_oli') is-invalid @enderror" name="kategori_oli" id="kategori_oli"
                               value="{{ old('kategori_oli', ($vehicles->kategori_oli ?? 'N/A')) }}" readonly required>
                        @error('kategori_oli')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div>
                        @enderror
                    </div>
                </div>

                {{-- Container for Engine Oil Specific Fields (Odo & Next Change) --}}
                <div class="row" id="engine_oil_fields" style="display: none;">
                    {{-- Odo Meter (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="odo_meter" class="form-label fw-medium">Odo Meter Saat Ini (KM)</label>
                        <div class="input-group">
                            <input type="number" class="form-control readonly-input @error('odo_meter') is-invalid @enderror" name="odo_meter" id="odo_meter" placeholder="Odo Meter Kendaraan" min="0"
                                   value="{{ old('odo_meter', ($vehicles->odo_meter ?? '')) }}" readonly> {{-- required diatur oleh JS --}}
                            <span class="input-group-text">KM</span>
                        </div>
                        @error('odo_meter')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div> {{-- For JS validation --}}
                        @enderror
                        <div id="odo_meter_js_feedback" class="invalid-feedback">Odo meter wajib diisi untuk oli mesin.</div> {{-- For JS specific message --}}
                    </div>

                    {{-- Oli Selanjutnya (Read-only, Calculated) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="oli_selanjutnya" class="form-label fw-medium">Ganti Oli Berikutnya (KM)</label>
                        <div class="input-group">
                            <input type="number" class="form-control readonly-input @error('oli_selanjutnya') is-invalid @enderror" name="oli_selanjutnya" id="oli_selanjutnya" placeholder="Otomatis terisi" readonly> {{-- required diatur oleh JS --}}
                            <span class="input-group-text">KM</span>
                        </div>
                        @error('oli_selanjutnya')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @else
                            <div class="valid-feedback">Ok!</div> {{-- For JS validation --}}
                        @enderror
                        <div id="oli_selanjutnya_js_feedback" class="invalid-feedback">KM oli selanjutnya wajib ada untuk oli mesin.</div> {{-- For JS specific message --}}
                    </div>
                </div>
                {{-- End Container for Engine Oil Fields --}}


                {{-- Foto Kegiatan --}}
                <div class="mb-3">
                    <label for="foto_kendaraan" class="form-label fw-medium">Unggah Foto Kegiatan <span class="text-danger">*</span></label>
                    <input type="file" class="form-control @error('foto_kendaraan') is-invalid @enderror @if($errors->has('foto_kendaraan.*')) is-invalid @endif" 
                           name="foto_kendaraan[]" id="foto_kendaraan" accept="image/*" multiple capture="environment" required>
                    <small class="text-muted d-block mt-1">
                        Anda dapat mengambil foto dengan kamera atau memilih dari galeri. Ulangi untuk menambah lebih dari satu foto (maks. 2MB per foto sebelum kompresi).
                    </small>
                    @error('foto_kendaraan')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @foreach ($errors->get('foto_kendaraan.*') as $message)
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @endforeach
                    <div id="foto_kendaraan_invalid_feedback" class="invalid-feedback" style="display: none;">
                        Mohon unggah minimal satu foto kegiatan.
                    </div>
                    <div id="foto_kendaraan_list_container" class="mt-2" style="font-size: 0.85rem;"></div>
                </div>

                {{-- Tombol Submit --}}
                <div class="mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-primary rounded-pill w-100 fw-semibold submit-button">
                        <i class="fas fa-save me-2"></i> Simpan Pergantian Oli
                    </button>
                </div>
            </form>

        </div> {{-- Akhir card-body --}}
    </div> {{-- Akhir card --}}

</div> {{-- Akhir container-fluid --}}
@endsection

@push('styles')
<style>
    .readonly-input { background-color: #e9ecef !important; border: 1px solid #ced4da; opacity: 0.9; cursor: not-allowed; }
    .form-label { font-weight: 500; font-size: 0.9rem; color: #5a5c69; margin-bottom: 0.4rem; }
    .form-control, .form-select, .input-group-text { font-size: 0.95rem; border-radius: 0.75rem !important; border: 1px solid #ced4da; padding-top: 0.6rem; padding-bottom: 0.6rem; }
    .input-group .form-control:not(:last-child) { border-top-right-radius: 0 !important; border-bottom-right-radius: 0 !important; }
    .input-group .input-group-text:not(:first-child) { border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important; }
    .form-control:focus, .form-select:focus { border-color: #86b7fe; box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25); }
    .form-control[type="file"] { line-height: 1.5; }
    .btn-primary { background-color: #4e73df; border-color: #4e73df; padding-top: 0.7rem; padding-bottom: 0.7rem; font-size: 1rem; color: #fff; }
    .btn-primary:hover:not(:disabled) { background-color: #2e59d9; border-color: #2653d4; }
    .btn-primary:disabled { opacity: 0.65; }

    .was-validated .form-control.is-invalid, .form-control.is-invalid,
    .was-validated .form-select.is-invalid, .form-select.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + .75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    .readonly-input.is-invalid, .was-validated .readonly-input:invalid { background-image: none !important; padding-right: 0.75rem !important; }

    .was-validated .form-control.is-valid, .form-control.is-valid,
    .was-validated .form-select.is-valid, .form-select.is-valid {
        border-color: #198754;
        padding-right: calc(1.5em + .75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23198754' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    .readonly-input.is-valid, .was-validated .readonly-input:valid { background-image: none !important; padding-right: 0.75rem !important; }

    .invalid-feedback { display: none; width: 100%; margin-top: .25rem; font-size: .8rem; color: #dc3545; }
    .invalid-feedback.d-block { display: block !important; } 
    .was-validated .is-invalid ~ .invalid-feedback, 
    .form-control.is-invalid ~ .invalid-feedback { display: block; } 

    .was-validated .is-valid ~ .valid-feedback,
    .form-control.is-valid ~ .valid-feedback { display: block; font-size: .8rem; color: #198754; }

    #foto_kendaraan_list_container .list-group-item { padding: 0.4rem 0.8rem; font-size: 0.85rem; }
    #foto_kendaraan_list_container .list-group-item button.btn-remove-file { padding: 0.1rem 0.4rem; font-size: 0.8rem; }
</style>
@endpush

@push('scripts')
    {{-- Bootstrap 5 JS bundle (usually loaded in main layout, ensure it is) --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const kategoriOliInput = document.getElementById("kategori_oli");
        const odometerInput = document.getElementById('odo_meter');
        const oliSelanjutnyaInput = document.getElementById('oli_selanjutnya');
        const engineOilFieldsContainer = document.getElementById('engine_oil_fields');
        const odoMeterJsFeedback = document.getElementById('odo_meter_js_feedback');
        const oliSelanjutnyaJsFeedback = document.getElementById('oli_selanjutnya_js_feedback');

        // Check if all essential elements for oil logic are present
        const oilLogicElementsPresent = kategoriOliInput && odometerInput && oliSelanjutnyaInput && engineOilFieldsContainer && odoMeterJsFeedback && oliSelanjutnyaJsFeedback;
        if (!oilLogicElementsPresent) {
            console.warn("Oil Change Form Script: Some elements for oil-specific logic were not found. Conditional fields might not work as expected.");
        }

        function calculateNextOilChange() {
            if (!odometerInput || !oliSelanjutnyaInput) return; // Guard clause
            const currentOdo = parseInt(odometerInput.value) || 0;
            if (currentOdo > 0) {
                oliSelanjutnyaInput.value = currentOdo + 5000; // Example: 5000 KM interval
            } else {
                oliSelanjutnyaInput.value = "";
            }
        }

        function toggleEngineOilFieldsVisibility() {
            if (!oilLogicElementsPresent) return; // Don't run if elements are missing

            const isEngineOil = kategoriOliInput.value.trim().toLowerCase() === "oli mesin";
            const isCurrentlyVisible = engineOilFieldsContainer.style.display !== 'none';

            if (isEngineOil) {
                engineOilFieldsContainer.style.display = ""; // Show (default for row)
                // If was not visible before or odo is empty, and now becomes visible, don't auto-calc yet.
                // Auto-calc only if odo_meter has a value (e.g. from old input)
                if (odometerInput.value) {
                    calculateNextOilChange();
                }
            } else {
                engineOilFieldsContainer.style.display = "none";
                odometerInput.value = "";
                oliSelanjutnyaInput.value = "";
                odometerInput.classList.remove('is-invalid', 'is-valid');
                oliSelanjutnyaInput.classList.remove('is-invalid', 'is-valid');
                odoMeterJsFeedback.style.display = 'none';
                oliSelanjutnyaJsFeedback.style.display = 'none';
            }
        }

        if (kategoriOliInput) {
            toggleEngineOilFieldsVisibility(); // Initial check on page load
        }
        // Odo meter input listener is already set up to call calculateNextOilChange
        // No listener for kategori_oli as it's readonly.

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

        const fotoKendaraanInput = document.getElementById('foto_kendaraan');
        const kendaraanListContainer = document.getElementById('foto_kendaraan_list_container');
        const kendaraanInvalidFeedbackEl = document.getElementById('foto_kendaraan_invalid_feedback');
        let accumulatedKendaraanFiles = [];

        if (fotoKendaraanInput && kendaraanListContainer && kendaraanInvalidFeedbackEl) {
            fotoKendaraanInput.addEventListener('change', async function(event) {
                const newFiles = Array.from(event.target.files);
                event.target.value = null;

                fotoKendaraanInput.disabled = true;
                const labelForFoto = document.querySelector('label[for="foto_kendaraan"]');
                let originalLabelHtml = "";
                if (labelForFoto) {
                    originalLabelHtml = labelForFoto.innerHTML;
                    if (!labelForFoto.querySelector('.spinner-border')) {
                        labelForFoto.innerHTML += ' <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>';
                    }
                }

                let someFilesFailed = false;
                let specificFileErrorMsg = "";

                for (const selectedFile of newFiles) {
                    if (selectedFile.type.startsWith('image/')) {
                        try {
                            const compressedFile = await compressImage(selectedFile, { maxWidth: 600, maxHeight: 600, quality: 0.5 });
                            if (!accumulatedKendaraanFiles.some(f => f.name === compressedFile.name && f.size === compressedFile.size)) {
                                accumulatedKendaraanFiles.push(compressedFile);
                            }
                        } catch (error) {
                            someFilesFailed = true;
                            specificFileErrorMsg = `Gagal memproses ${selectedFile.name}.`;
                            console.error('Gagal mengompres foto kendaraan:', selectedFile.name, error);
                        }
                    } else {
                        someFilesFailed = true;
                        specificFileErrorMsg = `File "${selectedFile.name}" bukan gambar. Hanya gambar yang diizinkan.`;
                        console.warn('File non-gambar dipilih untuk foto kendaraan:', selectedFile.name);
                    }
                }

                renderSelectedKendaraanFiles();
                fotoKendaraanInput.disabled = false;
                if (labelForFoto) labelForFoto.innerHTML = originalLabelHtml;

                if (someFilesFailed) {
                    kendaraanInvalidFeedbackEl.textContent = specificFileErrorMsg || 'Beberapa file gagal diproses.';
                    kendaraanInvalidFeedbackEl.style.display = 'block';
                    kendaraanInvalidFeedbackEl.classList.add('d-block');
                    fotoKendaraanInput.classList.add('is-invalid');
                } else if (accumulatedKendaraanFiles.length > 0) {
                    kendaraanInvalidFeedbackEl.style.display = 'none';
                    kendaraanInvalidFeedbackEl.classList.remove('d-block');
                    fotoKendaraanInput.classList.remove('is-invalid');
                    fotoKendaraanInput.classList.add('is-valid');
                } else if (fotoKendaraanInput.required) {
                    kendaraanInvalidFeedbackEl.textContent = 'Mohon unggah minimal satu foto kegiatan.';
                    kendaraanInvalidFeedbackEl.style.display = 'block';
                    kendaraanInvalidFeedbackEl.classList.add('d-block');
                    fotoKendaraanInput.classList.add('is-invalid');
                } else {
                    kendaraanInvalidFeedbackEl.style.display = 'none';
                    kendaraanInvalidFeedbackEl.classList.remove('d-block');
                    fotoKendaraanInput.classList.remove('is-invalid', 'is-valid');
                }
            });
        }

        function renderSelectedKendaraanFiles() {
            if (!kendaraanListContainer) return;
            kendaraanListContainer.innerHTML = '';
            if (accumulatedKendaraanFiles.length > 0) {
                const listGroup = document.createElement('ul');
                listGroup.className = 'list-group mt-2';
                accumulatedKendaraanFiles.forEach((file, index) => {
                    const listItem = document.createElement('li');
                    listItem.className = 'list-group-item list-group-item-sm d-flex justify-content-between align-items-center';
                    const fileNameSpan = document.createElement('span');
                    // CORRECTED LINE:
                    fileNameSpan.textContent = file.name + ' (' + (file.size / 1024).toFixed(2) + ' KB)';
                    listItem.appendChild(fileNameSpan);
                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.className = 'btn btn-danger btn-sm btn-remove-file';
                    removeButton.innerHTML = '&times;';
                    removeButton.title = 'Hapus file';
                    removeButton.onclick = function() {
                        accumulatedKendaraanFiles.splice(index, 1);
                        renderSelectedKendaraanFiles();
                        if (fotoKendaraanInput.required && accumulatedKendaraanFiles.length === 0) {
                            kendaraanInvalidFeedbackEl.textContent = 'Mohon unggah minimal satu foto kegiatan.';
                            kendaraanInvalidFeedbackEl.style.display = 'block';
                            kendaraanInvalidFeedbackEl.classList.add('d-block');
                            fotoKendaraanInput.classList.remove('is-valid');
                            fotoKendaraanInput.classList.add('is-invalid');
                        } else if (accumulatedKendaraanFiles.length > 0) {
                            kendaraanInvalidFeedbackEl.style.display = 'none';
                            kendaraanInvalidFeedbackEl.classList.remove('d-block');
                            fotoKendaraanInput.classList.remove('is-invalid');
                            fotoKendaraanInput.classList.add('is-valid');
                        } else {
                            kendaraanInvalidFeedbackEl.style.display = 'none';
                            kendaraanInvalidFeedbackEl.classList.remove('d-block');
                            fotoKendaraanInput.classList.remove('is-invalid', 'is-valid');
                        }
                    };
                    listItem.appendChild(removeButton);
                    listGroup.appendChild(listItem);
                });
                kendaraanListContainer.appendChild(listGroup);
            }
            
            // Final check after rendering, mainly for the initial empty state if required
            if (fotoKendaraanInput && fotoKendaraanInput.required && accumulatedKendaraanFiles.length === 0) {
                if(kendaraanInvalidFeedbackEl && getComputedStyle(kendaraanInvalidFeedbackEl).display === 'none') { // Show feedback if not already shown by other logic
                    kendaraanInvalidFeedbackEl.textContent = 'Mohon unggah minimal satu foto kegiatan.';
                    kendaraanInvalidFeedbackEl.style.display = 'block';
                    kendaraanInvalidFeedbackEl.classList.add('d-block');
                }
                fotoKendaraanInput.classList.remove('is-valid');
                fotoKendaraanInput.classList.add('is-invalid');
            } else if (accumulatedKendaraanFiles.length > 0) {
                if(kendaraanInvalidFeedbackEl) {
                    kendaraanInvalidFeedbackEl.style.display = 'none';
                    kendaraanInvalidFeedbackEl.classList.remove('d-block');
                }
                fotoKendaraanInput.classList.remove('is-invalid');
                fotoKendaraanInput.classList.add('is-valid');
            } else { // Optional or not required and empty
                if(kendaraanInvalidFeedbackEl) {
                    kendaraanInvalidFeedbackEl.style.display = 'none';
                    kendaraanInvalidFeedbackEl.classList.remove('d-block');
                }
                 fotoKendaraanInput.classList.remove('is-invalid', 'is-valid');
            }
        }

        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        const submitButton = form.querySelector('button[type="submit"].submit-button');

                        const namaDinasWarning = document.getElementById('nama-dinas-warning');
                        if (namaDinasWarning && getComputedStyle(namaDinasWarning).display !== 'none' && namaDinasWarning.offsetParent !== null) {
                            event.preventDefault();
                            event.stopPropagation();
                            alert('Submit dibatalkan: Tidak ada Teknisi Dinas terjadwal/ditemukan. Hubungi admin.');
                            namaDinasWarning.style.border = '2px solid red';
                            setTimeout(() => { if(namaDinasWarning) namaDinasWarning.style.border = ''; }, 3000);
                            form.classList.add('was-validated');
                            return;
                        }

                        if (kategoriOliInput && odometerInput && oliSelanjutnyaInput && engineOilFieldsContainer && odoMeterJsFeedback && oliSelanjutnyaJsFeedback) {
                            const isEngineOil = kategoriOliInput.value.trim().toLowerCase() === "oli mesin";
                            const isVisible = engineOilFieldsContainer.style.display !== 'none';
                            odometerInput.required = isEngineOil && isVisible;
                            oliSelanjutnyaInput.required = isEngineOil && isVisible;

                            if (odometerInput.required && !odometerInput.value) {
                                odometerInput.classList.add('is-invalid');
                                odoMeterJsFeedback.textContent = 'Odo meter wajib diisi untuk oli mesin.'; // Ensure message is correct
                                odoMeterJsFeedback.style.display = 'block'; odoMeterJsFeedback.classList.add('d-block');
                            } else {
                                odometerInput.classList.remove('is-invalid');
                                odoMeterJsFeedback.style.display = 'none'; odoMeterJsFeedback.classList.remove('d-block');
                            }
                            if (oliSelanjutnyaInput.required && !oliSelanjutnyaInput.value) {
                                oliSelanjutnyaInput.classList.add('is-invalid');
                                oliSelanjutnyaJsFeedback.textContent = 'KM oli selanjutnya wajib ada untuk oli mesin.'; // Ensure message
                                oliSelanjutnyaJsFeedback.style.display = 'block'; oliSelanjutnyaJsFeedback.classList.add('d-block');
                            } else {
                                oliSelanjutnyaInput.classList.remove('is-invalid');
                                oliSelanjutnyaJsFeedback.style.display = 'none'; oliSelanjutnyaJsFeedback.classList.remove('d-block');
                            }
                        }
                        
                        let isFotoKendaraanValid = true;
                        if (fotoKendaraanInput && fotoKendaraanInput.required && accumulatedKendaraanFiles.length === 0) {
                            isFotoKendaraanValid = false;
                            fotoKendaraanInput.classList.add('is-invalid');
                            if(kendaraanInvalidFeedbackEl) {
                                kendaraanInvalidFeedbackEl.textContent = 'Mohon unggah minimal satu foto kegiatan.';
                                kendaraanInvalidFeedbackEl.style.display = 'block';
                                kendaraanInvalidFeedbackEl.classList.add('d-block');
                            }
                        } else if (fotoKendaraanInput && accumulatedKendaraanFiles.length > 0) {
                            const dataTransfer = new DataTransfer();
                            accumulatedKendaraanFiles.forEach(file => dataTransfer.items.add(file));
                            fotoKendaraanInput.files = dataTransfer.files;
                            fotoKendaraanInput.classList.remove('is-invalid');
                            fotoKendaraanInput.classList.add('is-valid');
                            if(kendaraanInvalidFeedbackEl) {
                                kendaraanInvalidFeedbackEl.style.display = 'none';
                                kendaraanInvalidFeedbackEl.classList.remove('d-block');
                            }
                        } else if (fotoKendaraanInput) { // Optional and empty
                             fotoKendaraanInput.classList.remove('is-invalid', 'is-valid');
                             if(kendaraanInvalidFeedbackEl) {
                                kendaraanInvalidFeedbackEl.style.display = 'none';
                                kendaraanInvalidFeedbackEl.classList.remove('d-block');
                            }
                        }

                        if (!form.checkValidity() || !isFotoKendaraanValid) { // isFotoKendaraanValid is now critical
                            event.preventDefault();
                            event.stopPropagation();
                            const firstInvalidField = form.querySelector('.is-invalid:not([style*="display: none"])') || form.querySelector(':invalid:not([style*="display: none"])');
                            if (firstInvalidField) {
                                firstInvalidField.focus({ preventScroll: false });
                            }
                        } else {
                            if(submitButton) {
                                submitButton.disabled = true;
                                submitButton.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...`;
                            }
                        }
                        form.classList.add('was-validated');
                    }, false)
                })
        })()
    });
    </script>
@endpush