@extends('layout.mainuser') {{-- Menggunakan layout mobile utama --}}

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body text-center p-4">
                    <div style="font-size: 4rem; color: #28a745;"> <i class="fas fa-check-circle"></i> </div>
                    <h3 class="mt-3">Submit Laporan Berhasil!</h3>
                    <p class="text-muted">Laporan pemeliharaan Anda telah berhasil disimpan.</p>
                    
                    <div class="d-grid gap-2 mt-4">
                        @if(isset($printRouteName) && Route::has($printRouteName))
                            <a href="{{ route($printRouteName, ['id' => $laporanId]) }}" class="btn btn-primary btn-lg" target="_blank">
                                <i class="fas fa-print"></i> Cetak Laporan
                            </a>
                        @else
                            <p class="text-warning">Rute cetak tidak tersedia untuk tipe kendaraan ini.</p>
                        @endif
                        
                        <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary btn-lg mt-2">
                            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Pastikan Font Awesome sudah di-include di layout.mainuser Anda --}}
{{-- Jika belum, Anda bisa tambahkan link CDN seperti ini di bagian <head> layout atau di sini --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> --}}

<style>
    /* Opsi tambahan untuk styling jika diperlukan */
    .card {
        border: none;
        border-radius: 15px;
    }
    .btn-lg {
        padding: 0.75rem 1.25rem;
        font-size: 1.1rem;
    }
</style>
@endsection