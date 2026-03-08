@extends('layout.mainuser')

@section('content')

    {{-- Bagian Akses Cepat --}}
    <h5 class="section-title">Akses Cepat</h5>
    <div class="quick-access-row mb-4">
        {{-- Card 1: Mulai Checklist (Contoh) --}}
        <a href="{{ route('user.dashboard') }}" class="quick-access-card">
            <i class="fas fa-tasks"></i>
            <span>Mulai Checklist</span>
        </a>
        {{-- Card 2: Lapor Kerusakan --}}
        <a href="{{ route('user.scan_kerusakan') }}" class="quick-access-card danger">
            <i class="fas fa-car-crash"></i>
            <span>Lapor Kerusakan</span>
        </a>
        {{-- Card 3: Lihat Laporan --}}
        <a href="{{ route('user.cetak_laporan') }}" class="quick-access-card info">
            <i class="fas fa-file-alt"></i>
            <span>Lihat Laporan</span>
        </a>
         {{-- Card 4: Ganti Oli (Contoh jika ada halaman khusus) --}}
        <a href="{{ route('user.keuangan_user') }}" class="quick-access-card warning">
            <i class="fas fa-wallet"></i> {{-- Ikon diganti untuk Keuangan --}}
            <span>Keuangan</span>
        </a>
        {{-- Tambahkan card akses cepat lainnya jika perlu --}}
        <a href="{{ route('user.daftarSparepartUser') }}" class="quick-access-card warning">
             {{-- Asumsi route untuk sparepart berbeda, jika sama biarkan saja atau sesuaikan --}}
            <i class="fas fa-cogs"></i> {{-- Ikon diganti untuk Sparepart --}}
            <span>Sparepart</span>
        </a>
    </div>


    {{-- Daftar Tugas Utama --}}
    <h5 class="section-title">Daftar Tugas Anda</h5>

    <div class="row">
        {{-- Checklist Hari Ini --}}
        <div class="col-12 task-section mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="fas fa-clipboard-check fa-fw text-white"></i> Preventive Maintenance
                </div>
                <div class="card-body">
                    @if ($todolists->isEmpty())
                        <p class="text-center text-muted p-3 mb-0">Tidak ada tugas checklist hari ini.</p>
                    @else
                        @php
                            // Partisi koleksi: $pendingTodolists akan berisi item dengan is_completed = false (atau null)
                            // $completedTodolists akan berisi item dengan is_completed = true
                            [$completedTodolists, $pendingTodolists] = $todolists->partition('is_completed');
                            // Gabungkan kembali dengan yang belum selesai di atas
                            $sortedTodolists = $pendingTodolists->merge($completedTodolists);
                        @endphp
                        <ul class="list-group list-group-flush task-list">
                            @foreach ($sortedTodolists as $index => $todo)
                                <li class="list-group-item {{ $index >= 5 ? 'd-none' : '' }}">
                                    <span class="task-text {{ $todo->is_completed ? 'completed' : '' }}">
                                        {{ $todo->tugas }}
                                    </span>
                                    @if (!$todo->is_completed)
                                        <a href="{{ route('user.pemeliharaan_kendaraan_new', $todo->id) }}" class="btn btn-sm btn-outline-primary btn-action rounded-pill">
                                            <i class="fas fa-play me-1"></i> Kerjakan
                                        </a>
                                    @else
                                        <span class="badge rounded-pill bg-success-subtle text-success-emphasis badge-status">
                                            <i class="fas fa-check-circle me-1"></i> Selesai
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        @if ($sortedTodolists->count() > 5)
                            <button class="btn btn-sm btn-outline-secondary mt-3 w-100 load-more-btn">Muatkan Lebih Banyak</button>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        {{-- Tugas Kerusakan --}}
        <div class="col-12 task-section mb-3">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <i class="fas fa-exclamation-triangle fa-fw text-white"></i> Laporan Kerusakan Aktif
                </div>
                <div class="card-body">
                    @if ($kerusakan->isEmpty())
                        <p class="text-center text-muted p-3 mb-0">Tidak ada laporan kerusakan aktif.</p>
                    @else
                        @php
                            [$completedKerusakan, $pendingKerusakan] = $kerusakan->partition('is_completed');
                            $sortedKerusakan = $pendingKerusakan->merge($completedKerusakan);
                        @endphp
                        <ul class="list-group list-group-flush task-list">
                            @foreach ($sortedKerusakan as $index => $item)
                                <li class="list-group-item {{ $index >= 5 ? 'd-none' : '' }}">
                                    <span class="task-text {{ $item->is_completed ? 'completed' : '' }}">
                                        {{ $item->vehicle_name ?? 'Kendaraan ?' }} <br>
                                        <small>({{ $item->bagian ?? 'Deskripsi ?' }})</small>
                                    </span>
                                    @if (!$item->is_completed)
                                        <a href="{{ route('user.form_logbook', $item->id) }}" class="btn btn-sm btn-outline-danger btn-action rounded-pill">
                                            <i class="fas fa-wrench me-1"></i> Tangani
                                        </a>
                                    @else
                                        <span class="badge rounded-pill bg-success-subtle text-success-emphasis badge-status">
                                            <i class="fas fa-check-circle me-1"></i> Selesai
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        @if ($sortedKerusakan->count() > 5)
                            <button class="btn btn-sm btn-outline-secondary mt-3 w-100 load-more-btn">Muatkan Lebih Banyak</button>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        {{-- Tugas Pergantian Oli --}}
        <div class="col-12 task-section mb-3">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <i class="fas fa-oil-can fa-fw text-white"></i> Preventive Oli
                </div>
                <div class="card-body">
                    @if ($oli->isEmpty())
                        <p class="text-center text-muted p-3 mb-0">Tidak ada jadwal ganti oli dalam waktu dekat.</p>
                    @else
                        @php
                            [$completedOli, $pendingOli] = $oli->partition('is_completed');
                            $sortedOli = $pendingOli->merge($completedOli);
                        @endphp
                        <ul class="list-group list-group-flush task-list">
                            @foreach ($sortedOli as $index => $todo)
                                <li class="list-group-item {{ $index >= 5 ? 'd-none' : '' }}">
                                    <span class="task-text {{ $todo->is_completed ? 'completed' : '' }}">
                                        {{ $todo->vehicle_name ?? 'Kendaraan ?' }} <br>
                                        <small>({{ $todo->kategori_oli ?? 'Oli ?' }})</small>
                                    </span>
                                    @if (!$todo->is_completed)
                                        <a href="{{ route('user.form_oli', $todo->id) }}" class="btn btn-sm btn-outline-warning btn-action rounded-pill text-dark">
                                            <i class="fas fa-fill-drip me-1"></i> Kerjakan
                                        </a>
                                    @else
                                        <span class="badge rounded-pill bg-success-subtle text-success-emphasis badge-status">
                                            <i class="fas fa-check-circle me-1"></i> Selesai
                                        </span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        @if ($sortedOli->count() > 5)
                            <button class="btn btn-sm btn-outline-secondary mt-3 w-100 load-more-btn">Muatkan Lebih Banyak</button>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        {{-- Kendaraan Perlu Perhatian Oli --}}
        {{-- Bagian ini tidak memiliki status 'is_completed', jadi tidak diurutkan dengan cara yang sama --}}
        <div class="col-12 task-section mb-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-history fa-fw text-white"></i> List Oli Expired
                </div>
                <div class="card-body">
                    @if ($vehicle->isEmpty())
                        <p class="text-center text-muted p-3 mb-0">Semua jadwal oli kendaraan terpantau.</p>
                    @else
                        <ul class="list-group list-group-flush task-list">
                            @foreach ($vehicle as $index => $item)
                                <li class="list-group-item {{ $index >= 5 ? 'd-none' : '' }}">
                                    <span class="task-text">
                                        {{ $item->vehicle_name ?? 'Nama Kendaraan Tidak Ada' }}
                                    </span>
                                    <span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis badge-status">Perlu Dicek</span>
                                </li>
                            @endforeach
                        </ul>
                        @if ($vehicle->count() > 5)
                            <button class="btn btn-sm btn-outline-secondary mt-3 w-100 load-more-btn">Muatkan Lebih Banyak</button>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div> {{-- End Row for Task Lists --}}

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const itemsPerLoad = 5; // Jumlah item yang akan ditampilkan setiap kali tombol "Muatkan Lebih Banyak" diklik

    document.querySelectorAll('.task-section').forEach(section => {
        const taskList = section.querySelector('.task-list');
        const loadMoreBtn = section.querySelector('.load-more-btn');
        
        if (!taskList || !loadMoreBtn) {
            if (loadMoreBtn) loadMoreBtn.style.display = 'none';
            return;
        }

        const allItems = Array.from(taskList.querySelectorAll('li'));
        // Hitung item yang terlihat secara default (yang tidak memiliki kelas 'd-none')
        let currentlyShown = allItems.filter(item => !item.classList.contains('d-none')).length;

        // Sembunyikan tombol jika semua item sudah terlihat dari awal atau jumlahnya kurang dari/sama dengan 5
        if (allItems.length <= 5 || currentlyShown >= allItems.length) {
             // Kondisi di atas (allItems.length <=5) juga sudah ditangani di Blade dengan tidak merender tombol
             // jadi ini lebih sebagai fallback atau jika logika di Blade berubah.
            loadMoreBtn.style.display = 'none';
        }
        // Periksa lagi jika tombolnya memang tidak dirender oleh Blade (misal karena item <= 5)
        // maka loadMoreBtn akan null dan sudah di-handle di awal.
        // Jika dirender (karena item > 5), cek apakah awalnya semua item (yang > 5) tersembunyi.
        // Jika tidak (misal $index >= 0), maka currentlyShown akan > 5. Ini seharusnya tidak terjadi dengan logika Blade saat ini.

        loadMoreBtn.addEventListener('click', function () {
            let newlyShownCount = 0;
            // Mulai dari item yang saat ini ditampilkan (index)
            for (let i = 0; i < allItems.length; i++) {
                if (allItems[i].classList.contains('d-none')) { // Hanya proses item yang tersembunyi
                    allItems[i].classList.remove('d-none');
                    newlyShownCount++;
                    if (newlyShownCount >= itemsPerLoad) break; // Berhenti jika sudah memuat sejumlah itemsPerLoad
                }
            }
            // Update currentlyShown dengan menghitung ulang yang tidak 'd-none'
            currentlyShown = allItems.filter(item => !item.classList.contains('d-none')).length;


            if (currentlyShown >= allItems.length) {
                loadMoreBtn.style.display = 'none';
            }
        });
    });
});
</script>
@endsection