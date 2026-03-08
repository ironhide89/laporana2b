@extends('layout.mainuser') {{-- Menggunakan layout mobile utama --}}
<meta name="csrf-token" content="{{ csrf_token() }}"> {{-- Tetap sertakan CSRF token --}}

@section('content')

{{-- Kontainer Utama Halaman --}}
<div class="container-fluid px-3 py-4"> 

    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6"> 

            {{-- Judul Halaman --}}
            <div class="text-center mb-4">
                {{-- Ikon yang relevan dengan kerusakan --}}
                <i class="fas fa-tools fa-2x text-danger mb-2"></i>
                {{-- Atau <i class="fas fa-car-crash fa-2x text-danger mb-2"></i> --}}
                <h4 class="fw-bold" style="color: var(--app-dark);">Lapor Kerusakan Kendaraan</h4>
                <p class="text-muted" style="font-size: 0.9rem;">Pindai QR Code pada kendaraan untuk memulai laporan kerusakan.</p>
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
                </div>
            </div>

            {{-- Opsional: Display hasil scan (jika diperlukan sebelum redirect) --}}
            {{-- <div class="text-center mt-3" id="scan-result-display" style="display: none;"> ... </div> --}}

        </div>
    </div>
</div>
@endsection

@push('styles') {{-- Menambahkan style khusus dari halaman scan sebelumnya --}}
<style>
    .scanner-card {
        border-radius: var(--app-border-radius, 0.75rem);
        background-color: var(--app-card-bg, #ffffff);
        overflow: hidden; /* Penting agar viewport tidak keluar card */
        box-shadow: var(--app-card-shadow, 0 4px 15px rgba(0, 0, 0, 0.06));
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

    /* Hilangkan dekorasi teks pada tag `a` jika ada */
    a {
        text-decoration: none;
    }
</style>
@endpush

@section('scripts') {{-- Pastikan script ada di section scripts --}}
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Hentikan pemindaian setelah berhasil
        console.log("QR Code Kerusakan Terdeteksi:", decodedText);

        // Hentikan scanner sebelum redirect
        html5QrcodeScanner.clear().then(_ => {
            console.log("Scanner dihentikan.");
            // Redirect ke URL form kerusakan
            const baseUrl = "{{ url('/') }}"; // Dapatkan base URL dari Laravel
            // Pastikan route URL ini benar: /user/form-kerusakan-user/{id}
            const redirectUrl = `${baseUrl}/user/form-kerusakan-user/${decodedText}`;
            console.log("Mengarahkan ke:", redirectUrl);
            window.location.href = redirectUrl;
        }).catch(error => {
            console.error('Gagal menghentikan scanner:', error);
            // Tetap coba redirect jika gagal menghentikan scanner
            const baseUrl = "{{ url('/') }}";
            const redirectUrl = `${baseUrl}/user/form-kerusakan-user/${decodedText}`;
            window.location.href = redirectUrl;
        });
    }

    function onScanFailure(error) {
        // Bisa diabaikan atau log jika perlu debugging
        // console.warn(`Code scan error = ${error}`);
    }

    // Konfigurasi scanner (sama seperti sebelumnya)
    const scannerConfig = {
        fps: 10,
        qrbox: (viewfinderWidth, viewfinderHeight) => {
            let minEdgePercentage = 0.7;
            let minEdgeSize = Math.min(viewfinderWidth, viewfinderHeight);
            let qrboxSize = Math.floor(minEdgeSize * minEdgePercentage);
            return {
                width: qrboxSize,
                height: qrboxSize
            };
        },
        rememberLastUsedCamera: true,
        constraints: {
             facingMode: "environment"
        }
    };

    // Inisiasi scanner
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", // ID elemen div
        scannerConfig,
        /* verbose= */ false);

    // Mulai rendering scanner
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

</script>
@endsection