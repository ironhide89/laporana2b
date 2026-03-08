@extends('layout.mainuser') {{-- Pastikan ini layout mobile yang sudah dibuat --}}

@section('content')

{{-- Kontainer Utama Halaman --}}
<div class="container-fluid px-3 py-4"> 

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6"> 

            {{-- Judul Halaman --}}
            <div class="text-center mb-4">
                <i class="fas fa-qrcode fa-2x text-primary mb-2"></i>
                <h4 class="fw-bold" style="color: var(--app-dark);">Pindai QR Kendaraan</h4>
                <p class="text-muted" style="font-size: 0.9rem;">Arahkan kamera Anda ke QR Code yang terpasang pada kendaraan.</p>
            </div>

            {{-- Area Pemindai QR --}}
            <div class="card shadow-sm scanner-card">
                <div class="card-body p-3 text-center">
                    {{-- Elemen untuk menampung viewport scanner --}}
                    <div id="reader" class="scanner-viewport mx-auto mb-3">
                        {{-- Viewport kamera akan muncul di sini --}}
                        <div class="scanner-loading p-5 text-muted">
                            <i class="fas fa-spinner fa-spin me-2"></i> Memuat kamera...
                        </div>
                    </div>

                    {{-- Garis Animasi (Opsional, menambah kesan scan) --}}
                    {{-- <div class="scanner-line"></div> --}}

                    {{-- Tombol Bantuan/Info (Opsional) --}}
                    {{-- <button class="btn btn-sm btn-outline-secondary mt-2">
                        <i class="fas fa-question-circle me-1"></i> Bantuan
                    </button> --}}
                </div>
            </div>

             {{-- Placeholder untuk hasil scan jika diperlukan sebelum redirect --}}
            {{-- <div class="text-center mt-3" id="scan-result-display" style="display: none;">
                <p class="mb-1 text-muted">Kode Terdeteksi:</p>
                <p class="fw-bold" id="detected-code"></p>
                <p class="text-muted small">Mengalihkan...</p>
            </div> --}}

        </div>
    </div>
</div>
@endsection

@push('styles') {{-- Menambahkan style khusus untuk halaman ini --}}
<style>
    .scanner-card {
        border-radius: var(--app-border-radius, 0.75rem);
        background-color: var(--app-card-bg, #ffffff);
        overflow: hidden; /* Penting agar viewport tidak keluar card */
    }

    .scanner-viewport {
        max-width: 450px; /* Maksimum lebar viewport */
        width: 100%; /* Lebar penuh di dalam container */
        min-height: 250px; /* Tinggi minimal saat loading */
        border: 1px solid var(--app-lighter-grey, #eaecf4);
        border-radius: 8px;
        position: relative; /* Untuk elemen overlay/animasi jika ada */
        overflow: hidden; /* Pastikan video tidak keluar */
        background-color: #f0f0f0; /* Background saat loading */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Styling video element yang dibuat oleh library */
    #reader video {
        display: block;
        width: 100% !important; /* Paksa lebar video */
        height: auto !important; /* Biarkan tinggi otomatis */
        border-radius: 8px;
    }

    .scanner-loading {
        font-size: 0.9rem;
    }

    /* Opsional: Garis animasi scan */
    /* .scanner-line {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--app-danger), transparent);
        animation: scan 1.5s linear infinite;
        border-radius: 2px;
        box-shadow: 0 0 5px var(--app-danger);
    }

    @keyframes scan {
        0% { transform: translateY(0); }
        100% { transform: translateY(calc(100% - 20px)); }
    } */

    /* Hilangkan dekorasi teks pada tag `a` jika ada */
    a {
        text-decoration: none;
    }
</style>
@endpush

@section('scripts') {{-- Pastikan script ada di section scripts jika layout mendukung --}}
{{-- Hapus jQuery jika tidak dibutuhkan oleh script lain & jika library scanner tidak butuh --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Hentikan pemindaian setelah berhasil
        console.log("QR Code Terdeteksi:", decodedText);
        // Tampilkan pesan sebelum redirect (opsional)
        // const resultDisplay = document.getElementById('scan-result-display');
        // const detectedCodeEl = document.getElementById('detected-code');
        // if (detectedCodeEl) detectedCodeEl.textContent = decodedText;
        // if (resultDisplay) resultDisplay.style.display = 'block';

        // Hentikan scanner sebelum redirect
        html5QrcodeScanner.clear().then(_ => {
            console.log("Scanner dihentikan.");
            // Redirect ke URL berdasarkan barcode yang dipindai
            // Pastikan base URL aplikasi Anda benar jika menggunakan path relatif
            const baseUrl = "{{ url('/') }}"; // Dapatkan base URL dari Laravel
            const redirectUrl = `${baseUrl}/user/pemeliharaan-kendaraan/${decodedText}`; // Gunakan backtick dan base URL
            console.log("Mengarahkan ke:", redirectUrl);
            window.location.href = redirectUrl;
        }).catch(error => {
            console.error('Gagal menghentikan scanner:', error);
            // Tetap coba redirect jika gagal menghentikan scanner
            const baseUrl = "{{ url('/') }}";
            const redirectUrl = `${baseUrl}/user/pemeliharaan-kendaraan/${decodedText}`;
            window.location.href = redirectUrl;
        });
    }

    function onScanFailure(error) {
        // Bisa diabaikan atau log jika perlu debugging
        // console.warn(`Code scan error = ${error}`);
    }

    // Konfigurasi scanner
    const scannerConfig = {
        fps: 10, // Frame per second untuk scan
        qrbox: (viewfinderWidth, viewfinderHeight) => {
            // Membuat qrbox sedikit lebih kecil dari viewport
            let minEdgePercentage = 0.7; // 70% dari sisi terpendek
            let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
            let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
            return {
                width: qrboxSize,
                height: qrboxSize
            };
        },
        rememberLastUsedCamera: true, // Ingat kamera terakhir
        // Minta kamera belakang (environment) jika tersedia
        constraints: {
             facingMode: "environment"
        }
    };

    // Inisiasi scanner
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", // ID elemen div
        scannerConfig,
        /* verbose= */ false); // Set false untuk log yang lebih sedikit

    // Mulai rendering scanner
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

</script>
@endsection