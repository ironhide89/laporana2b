@extends('layout.mainuser') {{-- Menggunakan layout mobile utama --}}

@section('content')

{{-- Container for page content --}}
<div class="container-fluid px-3 py-4">

    {{-- Page Title --}}
    <div class="text-center mb-4">
        {{-- Ikon bisa disesuaikan, misal palu atau tanda seru --}}
        <i class="fas fa-hammer fa-2x text-warning mb-2"></i>
        <h4 class="fw-bold" style="color: var(--app-dark);">Form Tindakan Kerusakan</h4>
        {{-- Pastikan variabel $verkerusakan dikirim dari controller --}}
        <p class="text-muted" style="font-size: 0.9rem;">{{ $verkerusakan->vehicle_name ?? 'Kendaraan Tidak Ditemukan' }}</p>
    </div>

    {{-- Form Container Card --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-3 p-md-4">

            {{-- Tambahkan class needs-validation dan atribut novalidate --}}
            <form action="{{ route('user.store_logbook') }}" method="POST" id="perbaikanForm" class="needs-validation" enctype="multipart/form-data" novalidate>
                @csrf
                {{-- Hidden input untuk ID kerusakan --}}
                <input type="hidden" name="id" id="id" value="{{ $verkerusakan->id ?? '' }}">

                {{-- Informasi Read-only di bagian atas --}}
                <div class="row mb-3">
                    {{-- Nama Dinas --}}
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-medium">Nama Dinas</label>
                        @if (!empty($todolist->nama_dinas))
                            {{-- Jika nama dinas ADA, tampilkan input read-only --}}
                            <input type="text" class="form-control readonly-input"
                                   name="nama_dinas" {{-- Nama diperlukan agar data terkirim --}}
                                   id="namaDinas"
                                   value="{{ $todolist->nama_dinas }}"
                                   readonly required>
                            {{-- Feedback tidak wajib untuk readonly, tapi bisa ditambahkan --}}
                            {{-- <div class="valid-feedback">Ok!</div> --}}
                        @else
                            {{-- Jika nama dinas KOSONG, tampilkan peringatan --}}
                            <div class="alert alert-warning d-flex align-items-center p-2" data-schedule-missing="true" role="alert" style="font-size: 0.85rem;">
                                <i class="fas fa-exclamation-triangle fa-lg me-2"></i>
                                <div>
                                    Jadwal dinas belum tersedia. <br>
                                    Form tidak dapat disubmit. Hubungi admin.
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Nama Teknisi --}}
                    <div class="col-12 col-md-6">
                        <label for="names" class="form-label fw-medium">Nama Teknisi</label>
                        <input type="text" class="form-control readonly-input" name="name" id="names"
                               value="{{ Auth::user()->name }}" readonly required>
                         {{-- <div class="valid-feedback">Ok!</div> --}}
                    </div>
                </div>

                <div class="row mb-4">
                    {{-- Nama Kendaraan (Read-only) --}}
                    <div class="col-12 col-md-6 mb-3 mb-md-0">
                        <label class="form-label fw-medium">Nama Kendaraan</label>
                        <input type="text" class="form-control readonly-input" name="vehicle_name" id="vehicle_name" value="{{ $verkerusakan->vehicle_name ?? 'N/A' }}" readonly>
                         {{-- <div class="valid-feedback">Ok!</div> --}}
                    </div>
                    {{-- Tanggal (Read-only) --}}
                    <div class="col-12 col-md-6">
                        <label for="tanggals" class="form-label fw-medium">Tanggal Laporan</label>
                        <input type="date" class="form-control readonly-input" name="tanggal" id="tanggals"
                               value="{{ $todays ?? now()->format('Y-m-d') }}" required readonly>
                         {{-- <div class="valid-feedback">Ok!</div> --}}
                    </div>
                </div>

                {{-- Input Fields Utama --}}
                {{-- Kegiatan / Detail Perbaikan --}}
                <div class="mb-3">
                    <label for="kegiatan" class="form-label fw-medium">Kegiatan / Detail Perbaikan <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="kegiatan" id="kegiatan" placeholder="Jelaskan kegiatan perbaikan yang dilakukan..." rows="5" required></textarea>
                    <div class="invalid-feedback">
                        Mohon jelaskan kegiatan perbaikan yang dilakukan.
                    </div>
                </div>

                <div class="row">
                    {{-- Kondisi Kendaraan Setelah Perbaikan --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="kondisi_kendaraan" class="form-label fw-medium">Kondisi Kendaraan Setelah Diperbaiki <span class="text-danger">*</span></label>
                        {{-- Tambahkan 'required' dan opsi default --}}
                        <select class="form-select" name="vehicle_condition" id="kondisi_kendaraan" required>
                            {{-- Opsi default agar 'required' bekerja --}}
                            <option value="" selected disabled>-- Pilih Kondisi --</option>
                            {{-- Opsi lain, set 'selected' berdasarkan data awal --}}
                            <option value="Serviceable" {{ old('vehicle_condition', $verkerusakan->vehicle_condition ?? '') == 'Serviceable' ? 'selected' : '' }}>Serviceable</option>
                            <option value="Unserviceable" {{ old('vehicle_condition', $verkerusakan->vehicle_condition ?? '') == 'Unserviceable' ? 'selected' : '' }}>Unserviceable</option>
                            <option value="Serviceable dengan catatan" {{ old('vehicle_condition', $verkerusakan->vehicle_condition ?? '') == 'Serviceable dengan catatan' ? 'selected' : '' }}>Serviceable dengan catatan</option>
                        </select>
                        <div class="invalid-feedback">
                            Mohon pilih kondisi kendaraan setelah perbaikan.
                        </div>
                    </div>

                    {{-- Foto Kegiatan (MODIFIED SECTION) --}}
                    <div class="col-12 col-md-6 mb-3">
                        <label for="foto_kegiatan" class="form-label fw-medium">Unggah Foto Kegiatan <span class="text-danger">*</span></label>
                        {{-- MODIFIKASI: Tambahkan atribut 'capture' dan sesuaikan teks petunjuk, hapus 'required' --}}
                        <input type="file" class="form-control" name="foto_kendaraan[]" id="foto_kegiatan" accept="image/*" multiple capture="environment">
                        <small class="text-muted d-block mt-1">
                            Anda dapat mengambil foto dengan kamera atau memilih dari galeri. Ulangi untuk menambah lebih dari satu foto.
                        </small>
                        {{-- Feedback untuk validasi file --}}
                        <div id="foto_kegiatan_invalid_feedback" class="invalid-feedback" style="display: none;">
                            Mohon unggah minimal satu foto kegiatan.
                        </div>
                        {{-- Container untuk menampilkan daftar file yang dipilih --}}
                        <div id="foto_kegiatan_list_container" class="mt-2" style="font-size: 0.85rem;"></div>
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div class="mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-primary rounded-pill w-100 fw-semibold submit-button">
                        <i class="fas fa-save me-2"></i> Simpan Tindakan
                    </button>
                </div>
            </form>

        </div> {{-- Akhir card-body --}}
    </div> {{-- Akhir card --}}

</div> {{-- Akhir container-fluid --}}
@endsection

@push('styles')
{{-- Menambahkan style khusus untuk halaman ini --}}
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
        font-size: 0.9rem;
        color: var(--app-dark, #5a5c69);
        margin-bottom: 0.4rem;
    }

    /* Styling form control umum */
    .form-control,
    .form-select {
        font-size: 0.95rem;
        border-radius: var(--app-border-radius, 0.75rem) !important;
        border: 1px solid var(--app-lighter-grey, #eaecf4);
    }
    .form-control:focus,
    .form-select:focus {
        border-color: var(--app-primary, #4e73df);
        box-shadow: 0 0 0 0.2rem rgba(var(--app-primary-rgb, 78, 115, 223), 0.25);
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
    .btn-primary { /* Sesuaikan jika warna utama Anda berbeda */
        background-color: var(--app-primary, #4e73df);
        border-color: var(--app-primary, #4e73df);
        padding-top: 0.7rem;
        padding-bottom: 0.7rem;
        font-size: 1rem;
    }
    .btn-primary:hover:not(:disabled) {
        background-color: #2e59d9; /* Warna hover primary lebih gelap */
        border-color: #2653d4;
    }
    .btn-primary:disabled {
        opacity: 0.65;
    }

    /* Styling untuk pesan validasi Bootstrap */
    .was-validated .form-control:invalid, .form-control.is-invalid {
        border-color: var(--app-danger, #e74a3b);
        /* Ikon background SVG untuk input umum (textarea dikecualikan) */
        /* padding-right: calc(1.5em + .75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23e74a3b'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e74a3b' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem); */
    }
     /* Hapus padding & background untuk textarea agar tidak tumpang tindih dengan teks */
    .was-validated textarea.form-control:invalid, textarea.form-control.is-invalid {
        padding-right: 0.75rem; /* Default padding */
        background-image: none;
    }

    .was-validated .form-control:valid, .form-control.is-valid {
        border-color: var(--app-success, #1cc88a);
        /* Ikon background SVG untuk input umum (textarea dikecualikan) */
        /* padding-right: calc(1.5em + .75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%231cc88a' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem); */
    }
    /* Hapus padding & background untuk textarea agar tidak tumpang tindih dengan teks */
    .was-validated textarea.form-control:valid, textarea.form-control.is-valid {
        padding-right: 0.75rem; /* Default padding */
        background-image: none;
    }


    /* Untuk file input, ikon background mungkin tidak diinginkan atau perlu penyesuaian khusus */
    .was-validated input[type="file"].is-invalid, input[type="file"].is-invalid {
        border-color: var(--app-danger, #e74a3b);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23e74a3b'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e74a3b' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    .was-validated input[type="file"].is-valid, input[type="file"].is-valid {
        border-color: var(--app-success, #1cc88a);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%231cc88a' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }

    .was-validated .form-select:invalid, .form-select.is-invalid {
        border-color: var(--app-danger, #e74a3b);
         /* Ikon background untuk select jika diperlukan bisa ditambahkan di sini */
    }
    .was-validated .form-select:valid, .form-select.is-valid {
        border-color: var(--app-success, #1cc88a);
        /* Ikon background untuk select jika diperlukan bisa ditambahkan di sini */
    }

    .invalid-feedback {
        display: none; /* Sembunyikan default */
        width: 100%;
        margin-top: .25rem;
        font-size: .8rem; /* Ukuran font pesan error */
        color: var(--app-danger, #e74a3b);
    }
    /* Tampilkan feedback jika ada .is-invalid atau field :invalid dalam form .was-validated */
    .was-validated .form-control:invalid ~ .invalid-feedback,
    .was-validated .form-select:invalid ~ .invalid-feedback,
    .form-control.is-invalid ~ .invalid-feedback, /* Menangani .is-invalid secara manual */
    .form-select.is-invalid ~ .invalid-feedback { /* Menangani .is-invalid secara manual */
        display: block;
    }
    /* Khusus untuk feedback file input kustom kita */
    #foto_kegiatan_invalid_feedback.d-block {
        display: block !important;
    }

    /* Styling untuk daftar file yang dipilih */
    #foto_kegiatan_list_container .list-group-item {
        padding: 0.4rem 0.8rem;
        font-size: 0.85rem;
    }
    #foto_kegiatan_list_container .list-group-item button.btn-remove-file {
        padding: 0.1rem 0.4rem;
        font-size: 0.8rem;
    }

</style>
@endpush
@section('scripts')


<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Bagian 1: Menonaktifkan Submit jika Jadwal Dinas Kosong ---
    const scheduleWarning = document.querySelector('#perbaikanForm [data-schedule-missing="true"]');
    const submitButtons = document.querySelectorAll('#perbaikanForm button[type="submit"], #perbaikanForm input[type="submit"]');
    let isSubmitDisabledBySchedule = false;

    if (scheduleWarning) {
        isSubmitDisabledBySchedule = true;
        submitButtons.forEach(button => {
            button.disabled = true;
            button.classList.add('disabled'); // Style visual disabled
            button.setAttribute('title', 'Tidak dapat mengirim laporan karena jadwal dinas belum tersedia.');
        });
    }

    // --- Bagian 2: Penanganan Unggah Foto Akumulatif dengan Kompresi ---
    const fileInput = document.getElementById('foto_kegiatan');
    const fileListContainer = document.getElementById('foto_kegiatan_list_container');
    const fileInputInvalidFeedback = document.getElementById('foto_kegiatan_invalid_feedback');
    let accumulatedFiles = [];

    /**
     * Compresses an image file.
     * @param {File} file The image file to compress.
     * @param {object} options Compression options.
     * @param {number} options.maxWidth Max width for the output image.
     * @param {number} options.maxHeight Max height for the output image.
     * @param {number} options.quality JPEG quality (0.0 to 1.0).
     * @returns {Promise<File>} A promise that resolves with the compressed file.
     */
    async function compressImage(file, options = {}) {
        const { maxWidth = 600, maxHeight = 600, quality = 0.5 } = options; // Adjusted for ~30KB target

        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (event) => {
                const img = new Image();
                img.src = event.target.result;
                img.onload = () => {
                    const canvas = document.createElement('canvas');
                    let width = img.width;
                    let height = img.height;

                    // Calculate new dimensions while maintaining aspect ratio
                    if (width > height) {
                        if (width > maxWidth) {
                            height = Math.round(height * (maxWidth / width));
                            width = maxWidth;
                        }
                    } else {
                        if (height > maxHeight) {
                            width = Math.round(width * (maxHeight / height));
                            height = maxHeight;
                        }
                    }
                    canvas.width = width;
                    canvas.height = height;

                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0, width, height);

                    canvas.toBlob((blob) => {
                        if (blob) {
                            const compressedFile = new File([blob], file.name, {
                                type: 'image/jpeg', // Output as JPEG for compression
                                lastModified: Date.now(),
                            });
                            console.log(`Original: ${(file.size / 1024).toFixed(2)}KB, Compressed: ${(compressedFile.size / 1024).toFixed(2)}KB`);
                            resolve(compressedFile);
                        } else {
                            reject(new Error('Canvas to Blob conversion failed'));
                        }
                    }, 'image/jpeg', quality);
                };
                img.onerror = (error) => {
                    console.error("Image load error:", error);
                    reject(error); // Or resolve(file) to use original if loading fails
                };
            };
            reader.onerror = (error) => {
                console.error("FileReader error:", error);
                reject(error); // Or resolve(file)
            };
        });
    }

    if (fileInput) {
        fileInput.addEventListener('change', async function(event) { // Make the event listener async
            const newFilesFromInput = Array.from(event.target.files);
            event.target.value = null; // Reset input value

            // Optional: Show a simple loading indicator
            fileInput.disabled = true;
            const originalLabel = document.querySelector('label[for="foto_kegiatan"]').innerHTML;
            document.querySelector('label[for="foto_kegiatan"]').innerHTML += ' (memproses...)';


            for (const selectedFile of newFilesFromInput) {
                let fileToAdd = selectedFile;
                if (selectedFile.type.startsWith('image/')) {
                    try {
                        // Adjust maxWidth, maxHeight, and quality to aim for ~30KB
                        // These values might need tuning based on typical image inputs
                        fileToAdd = await compressImage(selectedFile, {
                            maxWidth: 600,  // Max width
                            maxHeight: 600, // Max height
                            quality: 0.5    // JPEG quality (0.0 to 1.0); lower is smaller/lower quality
                                            // 0.5 is quite aggressive. Start here and adjust.
                        });
                    } catch (error) {
                        console.error('Error compressing image:', selectedFile.name, error);
                        // Optionally, add the original file if compression fails, or notify user
                        // fileToAdd = selectedFile; // Fallback to original
                    }
                }

                // Hindari duplikat berdasarkan nama dan ukuran (setelah kompresi)
                if (!accumulatedFiles.some(f => f.name === fileToAdd.name && f.size === fileToAdd.size)) {
                    accumulatedFiles.push(fileToAdd);
                }
            }
            
            renderSelectedFiles();

            // Optional: Hide loading indicator
            fileInput.disabled = false;
            document.querySelector('label[for="foto_kegiatan"]').innerHTML = originalLabel;

            if (accumulatedFiles.length > 0) {
                fileInput.classList.remove('is-invalid');
                fileInputInvalidFeedback.style.display = 'none';
            }
        });
    }

    function renderSelectedFiles() {
        fileListContainer.innerHTML = '';
        if (accumulatedFiles.length > 0) {
            const listGroup = document.createElement('ul');
            listGroup.className = 'list-group mt-2';
            accumulatedFiles.forEach((file, index) => {
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item list-group-item-sm d-flex justify-content-between align-items-center';
                
                const fileName = document.createElement('span');
                fileName.textContent = file.name + ' (' + (file.size / 1024).toFixed(2) + ' KB)';
                listItem.appendChild(fileName);

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-danger btn-sm btn-remove-file';
                removeButton.innerHTML = '&times;';
                removeButton.title = 'Hapus file';
                removeButton.onclick = function() {
                    accumulatedFiles.splice(index, 1);
                    renderSelectedFiles();

                    const labelForFileInput = document.querySelector('label[for="foto_kegiatan"]');
                    const isFotoRequired = labelForFileInput && labelForFileInput.querySelector('.text-danger');
                    if (isFotoRequired && accumulatedFiles.length === 0) {
                        fileInput.classList.add('is-invalid');
                        fileInputInvalidFeedback.style.display = 'block';
                    }
                };
                listItem.appendChild(removeButton);
                listGroup.appendChild(listItem);
            });
            fileListContainer.appendChild(listGroup);
        }
        
        const labelForFileInput = document.querySelector('label[for="foto_kegiatan"]');
        const isFotoRequired = labelForFileInput && labelForFileInput.querySelector('.text-danger');
        if (isFotoRequired && accumulatedFiles.length === 0) {
            fileInput.classList.add('is-invalid');
            fileInputInvalidFeedback.style.display = 'block';
        } else if (accumulatedFiles.length > 0) {
            fileInput.classList.remove('is-invalid');
            fileInputInvalidFeedback.style.display = 'none';
        }
    }

    // --- Bagian 3: Validasi Bootstrap 5 & Submit Form (Diadaptasi) ---
    const form = document.getElementById('perbaikanForm');

    if (form) {
        form.addEventListener('submit', function(event) {
            let isFotoValid = true;
            const labelForFileInput = document.querySelector('label[for="foto_kegiatan"]');
            const isFotoRequired = labelForFileInput && labelForFileInput.querySelector('.text-danger');

            if (isFotoRequired && accumulatedFiles.length === 0) {
                isFotoValid = false;
                fileInput.classList.add('is-invalid');
                fileInputInvalidFeedback.style.display = 'block';
            } else {
                fileInput.classList.remove('is-invalid');
                fileInputInvalidFeedback.style.display = 'none';
                if (accumulatedFiles.length > 0) fileInput.classList.add('is-valid');
            }

            if (!form.checkValidity() || isSubmitDisabledBySchedule || !isFotoValid) {
                event.preventDefault();
                event.stopPropagation();

                if (isSubmitDisabledBySchedule) {
                    alert('Tidak dapat mengirim laporan karena jadwal dinas belum tersedia. Hubungi admin.');
                } else if (!isFotoValid) {
                    fileInput.focus();
                } else {
                    const firstInvalidField = form.querySelector(':invalid:not(#foto_kegiatan)');
                    if (firstInvalidField) {
                        firstInvalidField.focus();
                    } else if (form.querySelector(':invalid')) {
                        form.querySelector(':invalid').focus();
                    }
                    alert('Perhatian! Mohon lengkapi semua bagian yang ditandai bintang (*) sebelum mengirim.');
                }
            } else {
                if (accumulatedFiles.length > 0) {
                    const dataTransfer = new DataTransfer();
                    accumulatedFiles.forEach(file => dataTransfer.items.add(file));
                    fileInput.files = dataTransfer.files;
                }

                submitButtons.forEach(button => {
                    button.disabled = true;
                    button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim...`;
                });
            }
            form.classList.add('was-validated');
        }, false);
    }
});
</script>
@endsection