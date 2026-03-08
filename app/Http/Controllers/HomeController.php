<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\LaporanPerawatan;
use App\Models\LaporanFormOli;
use App\Models\FormKerusakan;
use App\Models\FormPerbaikan;
use App\Models\FormVerKerusakan;
use App\Models\FormLogbook;
use App\Models\Pekerjaana2b;
use App\Models\VerOli;
use App\Models\VerTodolist;
use App\Models\Keuangan;
use App\Models\Sparepart;
use App\Models\VerChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // For string helpers like slug
use Illuminate\Support\Facades\Storage; // Untuk menghapus file
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File; // Import the File facade for directory operations
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use mikehaertl\wkhtmlto\Pdf as WkHtmlToPdf;
use Pdf ;
use Spatie\Browsershot\Browsershot;


class HomeController extends Controller
{
  public function uploadPdf(Request $request)
{
    // Validasi untuk memastikan data pdf ada
    $request->validate([
        'pdf_data' => 'required|string',
    ]);

    try {
        // Ambil data URI dari request
        $dataUri = $request->input('pdf_data');
        
        // --- PERBAIKAN UTAMA: Cara yang lebih aman untuk mengekstrak data Base64 ---
        $base64Data = $dataUri;
        // Cek apakah ada metadata 'data:....;base64,' dan ambil hanya bagian datanya
        if (strpos($base64Data, ',') !== false) {
            // Mengambil substring setelah karakter koma (,)
            $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
        }
        
        // Decode data base64 menjadi data biner.
        // Penambahan @ untuk menekan warning jika data tidak valid, akan ditangani di bawah.
        $pdfContent = base64_decode($base64Data, true); // `true` untuk mode strict

        // Cek jika hasil decode gagal (data bukan base64 yang valid)
        if ($pdfContent === false) {
            throw new \Exception('Data PDF yang dikirim tidak dalam format Base64 yang valid.');
        }

        // Siapkan path dan nama file
        $path = public_path('cetak_dashboard/');
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true, true);
        }
        $fileName = 'Peforma_Heavy_Equipment_' . Carbon::now()->isoFormat('DDMMYYYY_HHmmss') . '.pdf';
        $fullPath = $path . $fileName;

        // Simpan file ke direktori
        File::put($fullPath, $pdfContent);

        // Kirim respons sukses dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'PDF berhasil disimpan di server!',
            'file' => $fileName
        ]);

    } catch (\Exception $e) {
        // Jika terjadi error, kirim respons error
        return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
    }
}

    public function form_logbook($id) // Tambahkan Request sebagai parameter
    {   
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        $vehicles = Vehicle::all();

        $verkerusakan = FormVerKerusakan::find($id);
        
        // Mendapatkan tanggal hari ini
        $todays = Carbon::today()->toDateString(); // Format: YYYY-MM-DD
    
        // Mengambil data VerTodolist berdasarkan tanggal hari ini
        $todolist = VerTodolist::whereDate('tanggal', $todays)->first();
    
    
        // Mengirimkan variabel $user, $todays, $todolist, dan $vehicle_name ke view
        return view('user.form_logbook', compact('user', 'todays', 'todolist','vehicles','verkerusakan'));
    }

    public function form_logbooknew(Request $request) // Tambahkan Request sebagai parameter
    {   
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        $vehicles = Vehicle::all();

        // Mendapatkan tanggal hari ini
        $todays = Carbon::today()->toDateString(); // Format: YYYY-MM-DD
    
        // Mengambil data VerTodolist berdasarkan tanggal hari ini
        $todolist = VerTodolist::whereDate('tanggal', $todays)->first();
    
    
        // Mengirimkan variabel $user, $todays, $todolist, dan $vehicle_name ke view
        return view('user.form_logbooknew', compact('user', 'todays', 'todolist','vehicles'));
    }

    public function cetak_dashboard()
    {
       // Mengambil data kendaraan berdasarkan kondisi
       $goodVehicles = Vehicle::where('vehicle_condition', 'Serviceable')->get();
       $maintenanceVehicles = Vehicle::where('vehicle_condition', 'Unserviceable')->get();

       $pekerjaana2b = Pekerjaana2b::all ();

       $totalVehicles = Vehicle::count();  // Jumlah total kendaraan
       $countServiceableVehicles = Vehicle::whereIn('vehicle_condition', ['Serviceable', 'Serviceable dengan catatan'])->count();
       $countUnserviceableVehicles = Vehicle::where('vehicle_condition', 'Unserviceable')->count();


       // Menghitung persentase kendaraan serviceable dan unserviceable
       $percentageServiceable = $totalVehicles ? ($countServiceableVehicles / $totalVehicles) * 100 : 0;
       $percentageUnserviceable = $totalVehicles ? ($countUnserviceableVehicles / $totalVehicles) * 100 : 0;

       $countvehicle_pkppk = Vehicle::where('klasifikasi_kendaraan', 'PKPPK')
       ->orderBy('vehicle_condition', 'asc')
       ->count();
   
       // Mengambil data kendaraan berdasarkan tipe
       $vehicle_ppkpk = Vehicle::where('klasifikasi_kendaraan', 'PKPPK')
       ->orderBy('vehicle_condition', 'asc')
       ->get();
       $vehicle_operasional = Vehicle::where('klasifikasi_kendaraan', 'Operasional')
       ->orderBy('vehicle_condition', 'asc')
       ->get();
       $vehicle_alatberat = Vehicle::where('klasifikasi_kendaraan', 'Alat Alat Berat')
       ->orderBy('vehicle_condition', 'asc')
       ->get();
       $vehicle_motordinas = Vehicle::where('klasifikasi_kendaraan', 'Motor Dinas')
       ->orderBy('vehicle_condition', 'asc')
       ->get();
       $vehicle_crashcar = Vehicle::where('klasifikasi_kendaraan', 'Crash Car')
       ->orderBy('vehicle_condition', 'asc') // Mengurutkan berdasarkan vehicle_condition secara menurun
       ->get();
       $vehicle_peralatan = Vehicle::where('klasifikasi_kendaraan', 'Peralatan')
       ->orderBy('vehicle_condition', 'asc')
       ->get();
   
       // Menghitung total kendaraan berdasarkan kondisi
       $goodConditionCount = $goodVehicles->count();
       $maintenanceCount = $maintenanceVehicles->count();
   
       // Menghitung persentase kendaraan dengan kondisi "Serviceable"
       $percent_ppkpk = $vehicle_ppkpk->count() > 0 
       ? round(($vehicle_ppkpk->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_ppkpk->count()) * 100)
       : 0;
   
   $percent_operasional = $vehicle_operasional->count() > 0 
       ? round(($vehicle_operasional->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_operasional->count()) * 100) 
       : 0;
   
   $percent_alatberat = $vehicle_alatberat->count() > 0 
       ? round(($vehicle_alatberat->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_alatberat->count()) * 100) 
       : 0;
   
   $percent_crashcar = $vehicle_crashcar->count() > 0 
       ? round(($vehicle_crashcar->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_crashcar->count()) * 100) 
       : 0;
   
   $percent_motordinas = $vehicle_motordinas->count() > 0 
       ? round(($vehicle_motordinas->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_motordinas->count()) * 100) 
       : 0;
   
   $percent_peralatan = $vehicle_peralatan->count() > 0 
       ? round(($vehicle_peralatan->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_peralatan->count()) * 100) 
       : 0;
   


   
       // Mengambil semua kendaraan yang diurutkan berdasarkan kondisi
       $vehicle = FormVerKerusakan::where('tampil_cetak', '1')->get();

        // Melakukan join antara VerTodolist dan Vehicle berdasarkan kolom tugas dan vehicle_name
        $currentMonth = Carbon::now()->month; // Mendapatkan bulan saat ini
        $currentYear = Carbon::now()->year; // Mendapatkan tahun saat ini
        
        $checklist = VerTodolist::join('vehicles', 'ver_todolist.tugas', '=', 'vehicles.vehicle_name')
            ->select('ver_todolist.*', 'vehicles.no_polisi', 'vehicles.user_peralatan', 'vehicles.vehicle_type')
            ->whereMonth('ver_todolist.tanggal', $currentMonth) // Filter bulan saat ini
            ->whereYear('ver_todolist.tanggal', $currentYear) // Filter tahun saat ini
            ->orderBy('ver_todolist.tanggal', 'asc') // Mengurutkan berdasarkan tanggal secara ascending
            ->get();


       $kategori = Vehicle::whereNotNull('vol_tangki') // Menyaring hanya kendaraan dengan nilai vol_tangki yang tidak null
            ->sum('vol_tangki');

            $kondisi_total = Vehicle::select('klasifikasi_kendaraan', 'vehicle_condition', DB::raw('count(*) as total'))
            ->groupBy('klasifikasi_kendaraan', 'vehicle_condition')
            ->get();

       $total_klasifikasi = Vehicle::select('klasifikasi_kendaraan', DB::raw('count(*) as total'))
            ->groupBy('klasifikasi_kendaraan')
            ->get();



   
       // Mengirim data ke view
       return view('admin.cetak_dashboard', compact(
           'vehicle', 
           'goodVehicles', 
           'maintenanceVehicles', 
           'goodConditionCount', 
           'maintenanceCount', 
           'vehicle_ppkpk',
           'vehicle_alatberat', 
           'vehicle_operasional', 
           'vehicle_crashcar', 
           'vehicle_motordinas', 
           'vehicle_peralatan', 
           'percent_ppkpk', 
           'percent_operasional', 
           'percent_alatberat',
           'percent_crashcar',
           'percent_peralatan',
           'percent_motordinas',
           'checklist',
           'kategori',
           'total_klasifikasi',
           'kondisi_total',
           'countServiceableVehicles',
           'countUnserviceableVehicles',
           'percentageServiceable',
           'percentageUnserviceable',
           'countvehicle_pkppk',
           'pekerjaana2b'
       ));
    }

    public function download()
    {
        // Mengambil data kendaraan berdasarkan kondisi
        $goodVehicles = Vehicle::where('vehicle_condition', 'Serviceable')->get();
        $maintenanceVehicles = Vehicle::where('vehicle_condition', 'Unserviceable')->get();
    
        $totalVehicles = Vehicle::count();  // Jumlah total kendaraan
      // Menghitung jumlah kendaraan serviceable dan unserviceable
        $countServiceableVehicles = Vehicle::where('vehicle_condition', 'Serviceable')->count();
        $countUnserviceableVehicles = Vehicle::where('vehicle_condition', 'Unserviceable')->count();


        // Menghitung persentase kendaraan serviceable dan unserviceable
        $percentageServiceable = $totalVehicles ? ($countServiceableVehicles / $totalVehicles) * 100 : 0;
        $percentageUnserviceable = $totalVehicles ? ($countUnserviceableVehicles / $totalVehicles) * 100 : 0;

    
        // Mengambil data kendaraan berdasarkan tipe
        $vehicle_ppkpk = Vehicle::where('klasifikasi_kendaraan', 'PPKPK')->get();
        $vehicle_operasional = Vehicle::where('klasifikasi_kendaraan', 'Operasional')->get();
        $vehicle_alatberat = Vehicle::where('klasifikasi_kendaraan', 'Alat Alat Berat')->get();
        $vehicle_motordinas = Vehicle::where('klasifikasi_kendaraan', 'Motor Dinas')->get();
        $vehicle_crashcar = Vehicle::where('klasifikasi_kendaraan', 'Crash Car')->get();
        $vehicle_peralatan = Vehicle::where('klasifikasi_kendaraan', 'Peralatan')->get();
    
        // Menghitung total kendaraan berdasarkan kondisi
        $goodConditionCount = $goodVehicles->count();
        $maintenanceCount = $maintenanceVehicles->count();
    
        // Menghitung persentase kendaraan dengan kondisi "Serviceable"
        $percent_ppkpk = $vehicle_ppkpk->count() > 0 
        ? round(($vehicle_ppkpk->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_ppkpk->count()) * 100)
        : 0;
    
        $percent_operasional = $vehicle_operasional->count() > 0 
        ? round(($vehicle_operasional->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_operasional->count()) * 100) 
        : 0;
    
        $percent_alatberat = $vehicle_alatberat->count() > 0 
        ? round(($vehicle_alatberat->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_alatberat->count()) * 100) 
        : 0;
    
        $percent_crashcar = $vehicle_crashcar->count() > 0 
        ? round(($vehicle_crashcar->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_crashcar->count()) * 100) 
        : 0;
    
        $percent_motordinas = $vehicle_motordinas->count() > 0 
        ? round(($vehicle_motordinas->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_motordinas->count()) * 100) 
        : 0;
    
        $percent_peralatan = $vehicle_peralatan->count() > 0 
        ? round(($vehicle_peralatan->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_peralatan->count()) * 100) 
        : 0;
    
        // Mengambil semua kendaraan yang diurutkan berdasarkan kondisi
        $vehicle = Vehicle::where('vehicle_condition', 'Unserviceable')->get();
    
        // Melakukan join antara VerTodolist dan Vehicle berdasarkan kolom tugas dan vehicle_name
        $currentMonth = Carbon::now()->month; // Mendapatkan bulan saat ini
        $currentYear = Carbon::now()->year; // Mendapatkan tahun saat ini
    
        $checklist = VerTodolist::join('vehicles', 'ver_todolist.tugas', '=', 'vehicles.vehicle_name')
            ->select('ver_todolist.*', 'vehicles.no_polisi', 'vehicles.user_peralatan', 'vehicles.vehicle_type')
            ->whereMonth('ver_todolist.tanggal', $currentMonth) // Filter bulan saat ini
            ->whereYear('ver_todolist.tanggal', $currentYear) // Filter tahun saat ini
            ->orderBy('ver_todolist.tanggal', 'asc') // Mengurutkan berdasarkan tanggal secara ascending
            ->get();
    
        $kategori = Vehicle::whereNotNull('vol_tangki') // Menyaring hanya kendaraan dengan nilai vol_tangki yang tidak null
            ->sum('vol_tangki');
    
        $kondisi_total = Vehicle::select('klasifikasi_kendaraan', 'vehicle_condition', DB::raw('count(*) as total'))
            ->groupBy('klasifikasi_kendaraan', 'vehicle_condition')
            ->get();
    
        $total_klasifikasi = Vehicle::select('klasifikasi_kendaraan', DB::raw('count(*) as total'))
            ->groupBy('klasifikasi_kendaraan')
            ->get();
    
        // Mengirim data ke view
        $html = view('admin.cetak_dashboard', compact(
            'vehicle', 
            'goodVehicles', 
            'maintenanceVehicles', 
            'countgoodVehicles', 
            'maintenanceVehicles', 
            'vehicle_ppkpk',
            'vehicle_alatberat', 
            'vehicle_operasional', 
            'vehicle_crashcar', 
            'vehicle_motordinas', 
            'vehicle_peralatan', 
            'percent_ppkpk', 
            'percent_operasional', 
            'percent_alatberat',
            'percent_crashcar',
            'percent_peralatan',
            'percent_motordinas',
            'checklist',
            'kategori',
            'kondisi_total',
            'total_klasifikasi',
            'countServiceableVehicles',
            'countUnserviceableVehicles',
            'percentageServiceable',
            'percentageUnserviceable',
        ))->render();
    
        // Buat PDF menggunakan Browsershot
        $pdfPath = public_path('report_dashboard.pdf');
    
        // Rendering HTML ke PDF
        Browsershot::html($html)
            ->setOption('javascript-delay', 5000)  // Menunggu hingga semua JavaScript dijalankan
            ->setOption('no-sandbox', true)  // Menangani sandboxing jika ada masalah
            ->save($pdfPath);
        
        // Menampilkan PDF di browser
        return response()->file($pdfPath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="report_dashboard.pdf"',
        ]);
    }
    

    

    public function form_oli($id)
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Mendapatkan data kendaraan berdasarkan ID
        $vehicles = VerOli::find($id);

        // Jika kendaraan tidak ditemukan, kembali dengan error
        if (!$vehicles) {
            return redirect()->back()->with('error', 'Data kendaraan tidak ditemukan.');
            // Atau tampilkan halaman error: abort(404, 'Data kendaraan tidak ditemukan.');
        }

        // Mendapatkan tanggal hari ini
        $todays = Carbon::today()->toDateString(); // Format: YYYY-MM-DD

        // Mendapatkan semua record dinas untuk hari ini
        $dinasCollection = VerTodolist::where('tanggal', $todays)->get();

        $allIndividualNames = [];
        foreach ($dinasCollection as $dinasItem) {
            // Periksa jika kolom nama_dinas ada dan tidak kosong
            if (!empty($dinasItem->nama_dinas)) {
                // Pecah string berdasarkan koma, lalu trim spasi di setiap nama
                $namesInRecord = array_map('trim', explode(',', $dinasItem->nama_dinas));
                // Gabungkan array nama dari record ini ke array utama
                $allIndividualNames = array_merge($allIndividualNames, $namesInRecord);
            }
        }

        // 1. Buat nama menjadi unik (case-sensitive)
        // 2. Hapus entri yang mungkin kosong setelah trim (misal jika ada ",,")
        // 3. Gabungkan kembali menjadi satu string dipisahkan koma dan spasi
        $uniqueNames = array_filter(array_unique($allIndividualNames));
        $namaTeknisiDinasString = implode(', ', $uniqueNames);

        // Mengirimkan variabel yang sudah diproses ke view
        // Kita kirim $namaTeknisiDinasString BUKAN $dinasCollection
        return view('user.form_oli', compact(
            'user',
            'todays',
            'vehicles',
            'namaTeknisiDinasString' // Kirim string hasil olahan
        ));
    }

   public function store_form_oli(Request $request)
    {
        // --- Server-side Validation ---
        // It's good practice to validate all incoming data, including readonly fields if they are part of the record
        $validator = Validator::make($request->all(), [
            'name'            => 'required|string|max:255', // Comes from Auth::user()->name
            'nama_dinas'      => 'nullable|string|max:1000', // Comes from $namaTeknisiDinasString
            'vehicle_name'    => 'required|string|max:255',
            'tanggal_oli'     => 'required|date',
            'jenis_oli'       => 'required|string|max:255',
            'kategori_oli'    => 'required|string|max:255',
            'volume_oli'      => 'required|numeric|min:0',
            'odo_meter'       => 'nullable|numeric|min:0', // Conditionally required by JS, so nullable here
            'oli_selanjutnya' => 'nullable|numeric|min:0', // Conditionally required by JS, so nullable here
            'foto_kendaraan'  => 'nullable|array',
            'foto_kendaraan.*'=> 'image|mimes:jpeg,png,jpg|max:2048', // Max 2MB per image
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Data that will be saved to LaporanFormOli
        $laporanFormOliData = [
            'vehicle_name'    => $request->vehicle_name,
            'name'            => $request->name, // This is Auth::user()->name
            'tanggal_oli'     => $request->tanggal_oli,
            'odo_meter'       => $request->odo_meter,
            'jenis_oli'       => $request->jenis_oli,
            'kategori_oli'    => $request->kategori_oli,
            'volume_oli'      => $request->volume_oli,
            'oli_selanjutnya' => $request->oli_selanjutnya,
            // Add 'nama_dinas' to LaporanFormOli if it's relevant there too
            // 'nama_dinas'      => $request->input('nama_dinas'),
        ];

        // --- File Handling for foto_kendaraan ---
        $fotoKendaraanPaths = [];
        if ($request->hasFile('foto_kendaraan')) {
            foreach ($request->file('foto_kendaraan') as $file) {
                if ($file->isValid()) {
                    $targetDirectory = public_path('logbook'); // Or a more specific folder like 'foto_ganti_oli'
                    if (!File::isDirectory($targetDirectory)) {
                        File::makeDirectory($targetDirectory, 0775, true, true);
                    }
                    // It seems you also copy to 'foto_perbaikan'. Ensure this directory exists or is created.
                    $targetPerbaikanDir = public_path('foto_perbaikan');
                     if (!File::isDirectory($targetPerbaikanDir)) {
                        File::makeDirectory($targetPerbaikanDir, 0775, true, true);
                    }

                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $namaFile = time() . '_' . Str::random(5) . '_' . Str::slug($originalName) . '.' . $extension;
                    
                    try {
                        $file->move($targetDirectory, $namaFile); // Move to 'logbook'
                        // Copy to 'foto_perbaikan'
                        if (File::exists(public_path('logbook/' . $namaFile))) {
                             File::copy(public_path('logbook/' . $namaFile), public_path('foto_perbaikan/' . $namaFile));
                        }
                        $fotoKendaraanPaths[] = $namaFile;
                    } catch (\Exception $e) {
                        Log::error("Error moving/copying file: " . $file->getClientOriginalName() . " - " . $e->getMessage());
                        // Cleanup already moved/copied files for this request if one fails
                        foreach($fotoKendaraanPaths as $p) {
                            if(File::exists(public_path('logbook/' . $p))) File::delete(public_path('logbook/' . $p));
                            if(File::exists(public_path('foto_perbaikan/' . $p))) File::delete(public_path('foto_perbaikan/' . $p));
                        }
                        return back()->withInput()->with('error', 'Gagal memproses file foto: ' . $file->getClientOriginalName());
                    }
                }
            }
        }
        $fotoKendaraanString = implode(',', $fotoKendaraanPaths);
        // --- End File Handling ---


        DB::beginTransaction();
        try {
            // Simpan data ke tabel LaporanFormOli
            LaporanFormOli::create($laporanFormOliData);

            // Prepare data for FormLogbook
            // **CORRECTION HERE:** Use the nama_dinas from the request input
            $namaDinasForLogbook = $request->input('nama_dinas'); // This is already the string you need or null

            $laporanlogbook = [
                'vehicle_name'   => $request->vehicle_name,
                'nama_dinas'     => $namaDinasForLogbook, // Use the string from the form
                'name'           => $request->name,      // This is Auth::user()->name
                'tanggal'        => $request->tanggal_oli,
                'kegiatan'       => "Pergantian {$request->kategori_oli} {$request->vehicle_name}",
                'foto_kendaraan' => $fotoKendaraanString ?: null, // Ensure null if empty string
            ];
            FormLogbook::create($laporanlogbook);
        
            // Siapkan data untuk update pada tabel Vehicle
            $dataToUpdate = [
                'oli_keterangan' => 'Oli Cukup',
            ];
        
            // Hanya tambahkan tanggal_oli jika odo_meter dan oli_selanjutnya tidak null
            // This logic seems specific to "Oli Mesin" - ensure it aligns with the JS conditional fields
            if ($request->kategori_oli === 'Oli Mesin' && !is_null($request->odo_meter) && !is_null($request->oli_selanjutnya)) {
                $dataToUpdate['tanggal_oli'] = $request->tanggal_oli;
                $dataToUpdate['odo_meter'] = $request->odo_meter; // Also update odo_meter in Vehicle table
                $dataToUpdate['oli_selanjutnya'] = $request->oli_selanjutnya;
            } else if ($request->kategori_oli !== 'Oli Mesin') {
                 // If not engine oil, you might want to clear these vehicle specific fields or handle differently
                 // For instance, if it's 'Oli Gardan', those odo_meter based fields might not apply.
                 // For now, it only adds them if it's engine oil and values are present.
            }
            // Update tabel Vehicle dengan data yang ada
            Vehicle::where('vehicle_name', $request->vehicle_name)->update($dataToUpdate);
        
            // Update VerOli
            VerOli::where('vehicle_name', $request->vehicle_name)
                  ->where('is_completed', '0') // Consider using boolean false if your column is boolean
                  ->where('kategori_oli', $request->kategori_oli)
                  ->update(['is_completed' => '1']); // Consider using boolean true

            $leaderboard = Auth::user();
            if($leaderboard) { // Ensure user is authenticated
                $leaderboard->increment('leaderboard'); 
            }
        
            DB::commit();
            return redirect()->route('user.todolist')->with('success', 'Form Pergantian Oli berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();
            // Cleanup any files if DB transaction fails
            foreach($fotoKendaraanPaths as $p) {
                if(File::exists(public_path('logbook/' . $p))) File::delete(public_path('logbook/' . $p));
                if(File::exists(public_path('foto_perbaikan/' . $p))) File::delete(public_path('foto_perbaikan/' . $p));
            }
            Log::error("Error saving oil change form: " . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
    

    public function cetak_laporan(Request $request) // Inject Request
    {
        $userName = Auth::user()->name;
        $itemsPerPage = 5;

        // --- BAGIAN RIWAYAT CHECKLIST ---
        $searchDateChecklist = $request->input('search_date_checklist');
        $vehiclesQuery = LaporanPerawatan::where('user', $userName);

        if ($searchDateChecklist) {
            try {
                // Pastikan format tanggal valid sebelum melakukan query
                $parsedDateChecklist = Carbon::parse($searchDateChecklist)->toDateString();
                $vehiclesQuery->whereDate('tanggal', $parsedDateChecklist);
            } catch (\Exception $e) {
                // Tangani jika format tanggal tidak valid, mungkin log error atau abaikan
                // Untuk saat ini, jika tanggal tidak valid, filter tidak akan diterapkan
                \Log::error('Invalid date format for checklist search: ' . $searchDateChecklist . ' Error: ' . $e->getMessage());
            }
        }

        $vehicles = $vehiclesQuery->orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($itemsPerPage, ['*'], 'checklistPage')
            ->withQueryString(); // Ini akan mempertahankan semua parameter query string saat paginasi

        // --- BAGIAN RIWAYAT LOGBOOK ---
        $searchDateLogbook = $request->input('search_date_logbook');
        $logbookDatesQuery = FormLogbook::where('name', $userName)
                                ->selectRaw('DISTINCT DATE(tanggal) as log_date');

        if ($searchDateLogbook) {
            try {
                // Pastikan format tanggal valid
                $parsedDateLogbook = Carbon::parse($searchDateLogbook)->toDateString();
                // Filter distinct dates berdasarkan tanggal pencarian
                $logbookDatesQuery->whereDate('tanggal', $parsedDateLogbook);
            } catch (\Exception $e) {
                // Tangani jika format tanggal tidak valid
                \Log::error('Invalid date format for logbook search: ' . $searchDateLogbook . ' Error: ' . $e->getMessage());
            }
        }
        $logbookDatesQuery->orderBy('log_date', 'desc');

        // Lanjutkan dengan logika paginasi manual untuk logbook
        $currentLogbookPage = Paginator::resolveCurrentPage('logbookPage');
        $totalLogbookDates = (clone $logbookDatesQuery)->count();
        $datesOnThisPage = $logbookDatesQuery->skip(($currentLogbookPage - 1) * $itemsPerPage)
                                            ->take($itemsPerPage)
                                            ->pluck('log_date');

        $logsForThisPage = collect();
        if ($datesOnThisPage->isNotEmpty()) {
            $logsForThisPage = FormLogbook::where('name', $userName)
                ->whereIn(DB::raw('DATE(tanggal)'), $datesOnThisPage) // Ambil log hanya untuk tanggal di halaman ini
                ->orderBy('tanggal', 'desc')
                ->orderBy('created_at', 'asc')
                ->get();
        }

        $groupedLogsOnPage = $logsForThisPage->groupBy(function($log) {
            return Carbon::parse($log->tanggal)->format('Y-m-d');
        });

        $paginatedGroupedLogs = new LengthAwarePaginator(
            $groupedLogsOnPage,
            $totalLogbookDates,
            $itemsPerPage,
            $currentLogbookPage,
            [
                'path'     => Paginator::resolveCurrentPath(),
                'pageName' => 'logbookPage',
            ]
        );
        $paginatedGroupedLogs->withQueryString(); // Pertahankan semua parameter query string

        return view('user.cetak_laporan', compact(
            'vehicles',
            'paginatedGroupedLogs',
            'searchDateChecklist', // Kirim tanggal pencarian ke view
            'searchDateLogbook'  // Kirim tanggal pencarian ke view
        ));
    }
    
    

    public function store_logbook(Request $request )
{
    $fotoKendaraanPaths = [];

    // Periksa apakah ada file foto_kendaraan yang diupload
    if ($request->hasFile('foto_kendaraan')) {
        foreach ($request->file('foto_kendaraan') as $file) {
            // Membuat nama file unik berdasarkan waktu dan nama file asli
            $namaFile = time() . '_' . $file->getClientOriginalName();

            // Pindahkan file ke folder 'logbook'
            $file->move(public_path('logbook'), $namaFile);
            copy(public_path('logbook/' . $namaFile), public_path('foto_perbaikan/' . $namaFile));
            $fotoKendaraanPaths[] = $namaFile;

            // Pindahkan file ke folder 'foto_perbaikan' hanya sekali
           
        }
    }

    // Gabungkan semua path file foto menjadi satu string yang dipisahkan koma
    $fotoKendaraanString = implode(',', $fotoKendaraanPaths);

    // Simpan data logbook ke database
    FormLogbook::create([
        'nama_dinas' => $request->nama_dinas,
        'vehicle_name' => $request->vehicle_name,
        'name' => $request->name,
        'tanggal' => $request->tanggal,
        'kegiatan' => $request->kegiatan,
        'foto_kendaraan' => $fotoKendaraanString,
    ]);
    
    $vehicle = Vehicle::where('vehicle_name', $request->vehicle_name)->first();
        
    if ($vehicle) {
        $vehicle->update([
            'vehicle_condition' => $request->vehicle_condition,
            'bagian' => 'Tidak Ada' // Set kondisi kendaraan ke 'Good Condition'
        ]);
    }
    // Update status kerusakan jika kendaraan ditemukan
    $kerusakan = FormVerKerusakan::where('id', $request->id)
    ->where('vehicle_name', $request->vehicle_name)
    ->where('is_completed', '0')
    ->first();
    
    if ($kerusakan) {
        // Update status kerusakan
        $kerusakan->update([
            'is_completed' => '1',
            'tampiil_cetak' => '0',
        ]);
        

        // Simpan data perbaikan
        FormPerbaikan::create([
            'no_ba' => $kerusakan->no_ba,
            'vehicle_name' => $kerusakan->vehicle_name,
            'vehicle_type' => $kerusakan->vehicle_type,
            'vehicle_condition' => $kerusakan->vehicle_condition,
            'tanggal_kerusakan' => $kerusakan->tanggal_kerusakan,
            'user_kendaraan' => $kerusakan->user_kendaraan,
            'bagian' => $kerusakan->bagian,
            'penyebab' => $kerusakan->penyebab,
            'tindakan' => $kerusakan->tindakan,
            'klasifikasi' => $kerusakan->klasifikasi,
            'detail_perbaikan' => $request->kegiatan,
            'tanggal_perbaikan' => now(),
            'foto_perbaikan' => $fotoKendaraanString, // Gunakan foto yang sudah diupload
        ]);
    }

    FormVerKerusakan::where('vehicle_name', $request->vehicle_name)
    ->update(['vehicle_condition' => $request->vehicle_condition]);

    // Redirect ke halaman form_todolist dengan pesan sukses
    return redirect()->route('admin.form_todolist')->with('success', 'To Do List berhasil disimpan.');
}

public function store_logbooknew(Request $request)
{

    $leaderboard = Auth::user();
    $leaderboard->increment('leaderboard'); 

    
    $fotoKendaraanPaths = [];

    // Periksa apakah ada file foto_kendaraan yang diupload
    if ($request->hasFile('foto_kendaraan')) {
        foreach ($request->file('foto_kendaraan') as $file) {
            // Membuat nama file unik berdasarkan waktu dan nama file asli
            $namaFile = time() . '_' . $file->getClientOriginalName();
    
            // Menyalin file ke folder 'logbook'
            $file->move(public_path('logbook'), $namaFile);
    
            // Menyalin file ke folder 'foto_kerusakan'
            copy(public_path('logbook/' . $namaFile), public_path('foto_kerusakan/' . $namaFile));

            copy(public_path('logbook/' . $namaFile), public_path('foto_perbaikan/' . $namaFile));

    
            // Menambahkan path file ke array
            $fotoKendaraanPaths[] = $namaFile;
        }
    }
    

    // Gabungkan semua path file foto menjadi satu string yang dipisahkan koma
    $fotoKendaraanString = implode(',', $fotoKendaraanPaths);

    // Simpan data logbook ke database
    FormLogbook::create([
        'nama_dinas' => $request->nama_dinas,
        'vehicle_name' => $request->vehicle_name,
        'name' => $request->name,
        'tanggal' => $request->tanggal,
        'kegiatan' => $request->kegiatan,
        'foto_kendaraan' => $fotoKendaraanString,
    ]);

    $vehicle = Vehicle::where('vehicle_name', $request->vehicle_name)->first();
        
    if ($vehicle) {
        $vehicle->update([
            'vehicle_condition' => 'Serviceable',
            'bagian' => 'Tidak Ada' // Set kondisi kendaraan ke 'Good Condition'
        ]);
    }
    

    $kendaraan = Vehicle::where('vehicle_name' , $request->vehicle_name)->first();

        FormKerusakan::create([
        'vehicle_name' => $request->vehicle_name,
        'vehicle_type' => $kendaraan->vehicle_type,
        'vehicle_condition' => 'Serviceable',
        'tanggal_kerusakan' => now(),
        'user_kendaraan' => $kendaraan->user_peralatan,
        'bagian' => $request->bagian,
        'penyebab' => $request->penyebab,
        'klasifikasi' => $request->klasifikasi,
        'foto_kerusakan' => $fotoKendaraanString, // Gunakan foto yang sudah diupload
    ]);


        // Simpan data perbaikan
        FormPerbaikan::create([
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $kendaraan->vehicle_type,
            'vehicle_condition' => 'Serviceable',
            'tanggal_kerusakan' => now(),
            'user_kendaraan' => $kendaraan->user_peralatan,
            'bagian' => $request->bagian,
            'penyebab' => $request->penyebab,
            'klasifikasi' => $request->klasifikasi,
            'detail_perbaikan' => $request->kegiatan,
            'tanggal_perbaikan' => now(),
            'foto_perbaikan' => $fotoKendaraanString, // Gunakan foto yang sudah diupload
        ]);

    // Redirect ke halaman form_todolist dengan pesan sukses
    return redirect()->route('admin.form_todolist')->with('success', 'To Do List berhasil disimpan.');
}

    

    public function spek_kendaraan($barcodes)
{
    // Temukan kendaraan berdasarkan barcode
    $vehicle = Vehicle::where('barcodes', $barcodes)->firstOrFail();

    // Ambil data riwayat oli, perbaikan, dan kerusakan berdasarkan nama kendaraan
    $oli = LaporanFormOli::where('vehicle_name', $vehicle->vehicle_name)->get();
    $perbaikan = FormPerbaikan::where('vehicle_name', $vehicle->vehicle_name)->get();
    $kerusakan = FormKerusakan::where('vehicle_name', $vehicle->vehicle_name)->get();

    // Kirimkan data kendaraan dan riwayat ke view
    return view('spek_kendaraan', compact('vehicle', 'oli', 'perbaikan', 'kerusakan'));
}
    


    public function dashboard(){
      
    
        return view('user.dashboard');
    }

    public function scan_kerusakan(){
      
    
        return view('user.scan_kerusakan');
    }

    public function form_kerusakan_user($barcodes) // Tambahkan Request sebagai parameter
    {   
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        $vehicles = Vehicle::where('barcodes', $barcodes)->firstOrFail();

        // Mendapatkan tanggal hari ini
        $todays = Carbon::today()->toDateString(); // Format: YYYY-MM-DD
    
        // Mengambil data VerTodolist berdasarkan tanggal hari ini
        $todolist = VerTodolist::whereDate('tanggal', $todays)->first();

      
    
    
        // Mengirimkan variabel $user, $todays, $todolist, dan $vehicle_name ke view
        return view('user.form_kerusakan_user', compact('user', 'todays', 'todolist','vehicles'));
    }
   

    public function todolist()
    {
        Carbon::setLocale('id');
    
        $sixMonthsAgo = Carbon::now()->subMonths(6);
    
        // Ambil data todolist beserta barcode dari tabel vehicle
        $todolists = VerTodolist::select(
            'ver_todolist.*',
            DB::raw('(SELECT vehicles.barcodes FROM vehicles WHERE vehicles.vehicle_name = ver_todolist.tugas LIMIT 1) as barcodes')
        )
        ->where('name', Auth::user()->name)
        ->whereDate('tanggal', '<=', Carbon::today()) // Tugas dengan tanggal hari ini
        ->orderBy('tanggal', 'asc')
        ->get();

        
    
        $kerusakan = FormVerKerusakan::orderBy('vehicle_name')->get();
    
        $oli = VerOli::orderBy('is_completed')->paginate(6);
    
        $vehicle = Vehicle::where('oli_keterangan', 'Oli Telat')
            ->orWhere('tanggal_oli', '<=', $sixMonthsAgo)
            ->orderBy('vehicle_name')
            ->get();
    
        return view('user.todolist', compact('todolists', 'kerusakan', 'oli', 'sixMonthsAgo', 'vehicle'));
    }


    public function updateStatus(Request $request, $id)
    {
        // Temukan todo berdasarkan ID
        $todolist = VerTodolist::find($id);
        
        
        // Pastikan task ditemukan
        if ($todolist) {
            // Perbarui status is_completed berdasarkan checkbox
            // Jika checkbox ada, set is_completed ke 1, jika tidak set ke 0
            $todolist->is_completed = $request->has('completed') ? 1 : 0; 
            $todolist->save();
        }
    
        return redirect()->back()->with('success', 'Status tugas berhasil diperbarui!'); // Kembali ke halaman sebelumnya dengan pesan sukses
    }

    public function edit_todolist()
{
    $users = User::where('role', 'user')->get();
    
    $todolist = VerTodolist::all();

    return view('admin.edit_todolist', compact('todolist' , 'users'));
}

public function update_edit_todolist(Request $request, $id) {
    // 1. Validasi Input (Sangat direkomendasikan)
    //    Nama field di validasi HARUS SAMA dengan atribut 'name' di elemen form HTML
    try {
        $validatedData = $request->validate([
            'edit_tanggal' => 'required|date',
            'edit_nama_dinas_selected' => 'required|string', // Sesuaikan tipe jika perlu (misal 'array' jika Anda memprosesnya berbeda)
            'edit_name' => 'required|string|exists:users,name', // Validasi PIC ada di tabel users
            'edit_is_completed' => 'required|boolean', // Status harus 0 atau 1
            // 'task_id' tidak perlu divalidasi karena didapat dari URL ($id)
            // 'edit_tugas' tidak ada di form, jadi tidak perlu divalidasi/update
        ]);
    } catch (ValidationException $e) {
        // Jika validasi gagal, kembalikan ke form dengan error
        return redirect()->back()
                    ->withErrors($e->validator)
                    ->withInput(); // Agar input lama tetap terisi
    }

    try {
        // 2. Cari data atau gagal (findOrFail)
        $todolist = VerTodolist::findOrFail($id);

        // 3. Update data menggunakan NAMA INPUT DARI FORM EDIT
        $todolist->tanggal = $validatedData['edit_tanggal']; // Ambil dari data tervalidasi
        $todolist->nama_dinas = $validatedData['edit_nama_dinas_selected'];
        $todolist->name = $validatedData['edit_name']; // Nama PIC
        $todolist->is_completed = $validatedData['edit_is_completed']; // <-- Update status

        // 4. Hapus update 'tugas' jika tidak bisa diedit di form
        // $todolist->tugas = $request->input('edit_tugas'); // Baris ini mungkin tidak diperlukan jika tugas tidak bisa diedit

        // 5. Simpan perubahan
        $todolist->save();

        // 6. Redirect dengan pesan sukses
        return redirect()->route('admin.form_todolist') // Redirect ke halaman kalender lagi
                         ->with('success', 'Jadwal dinas berhasil diupdate.'); // Ganti pesan jika perlu

    } catch (ModelNotFoundException $e) {
        // Handle jika ID tidak ditemukan
        return redirect()->route('admin.form_todolist')
                         ->with('error', 'Jadwal yang ingin diupdate tidak ditemukan.');
    } catch (\Exception $e) {
        // Handle error lainnya (misal database error)
        Log::error('Error updating todolist ID ' . $id . ': ' . $e->getMessage()); // Log error
        return redirect()->route('admin.form_todolist')
                         ->with('error', 'Terjadi kesalahan sistem saat mengupdate jadwal.');
    }
}



public function delete_todolist($id)
{
    // Cari data berdasarkan ID
    $todolist = VerTodolist::findOrFail($id);
    

    // Hapus data
    $todolist->delete();

    // Redirect atau memberikan feedback kepada user
    return redirect()->back()->with('success', 'Data tugas berhasil dihapus.');
}
    


    // public function handleQRCode(Request $request)
    // {
    //     $qrCode = $request->input('qr_code');
        
    //     // Ekstrak vehicle_name dari URL QR code
    //     // Misalnya QR Code = 'http://127.0.0.1:8000/admin/data-kendaraan/14123'
    //     $urlPath = parse_url($qrCode, PHP_URL_PATH);  // Dapatkan bagian path dari URL
    //     $pathSegments = explode('/', $urlPath);  // Pisahkan path menjadi bagian-bagian
    //     $Barcodes = end($pathSegments);  // Ambil vehicle_name (bagian terakhir dari path)
    
    //     // Cari kendaraan berdasarkan vehicle_name
    //     $vehicle = Vehicle::where('barcodes', $Barcodes)->first();  // Menggunakan where untuk mencari berdasarkan vehicle_name
        
    //     if ($vehicle) {
    //         // Jika kendaraan ditemukan, kirimkan data kendaraan
    //         return response()->json([
    //             'status' => 200,
    //             'message' => 'QR Code processed successfully',
    //             'vehicle' => $vehicle
                
    //         ]);

    //         return redirect()->route('user.pemeliharaan_kendaraan');
    //     } else {
    //         // Jika kendaraan tidak ditemukan
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'Vehicle not found'
    //         ]);
    //     }
    // }

    
    

    public function index(){
        $data = User::get();
        return view('admin.index',compact('data'));
    }
    public function create(){
        return view('admin.create');
    }

    public function store(Request $request)
{
    $tandatangan = null;
    if ($request->hasFile('tanda_tangan')) {
        $file = $request->file('tanda_tangan');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('tanda_tangan'), $namaFile);
        $tandatangan = $namaFile;
    }

    $data = [
        'email' => $request->email,
        'name' => $request->name,
        'password' => bcrypt($request->password), // Mengenkripsi password
        'tanda_tangan' => $tandatangan, // Menyimpan tanda tangan sebagai nama file
        'role' => $request->role,
    ];

    User::create($data);

    return redirect()->route('admin.index')->with('success', 'User berhasil ditambahkan');
}



    public function store_kendaraan(Request $request)
    {

        $fotokendaraan = null;
        if ($request->hasFile('foto_kendaraan')) {
            $file = $request->file('foto_kendaraan');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_kendaraan'), $namaFile);
            $fotokendaraan = $namaFile;
        }
    


        // Simpan kendaraan
        $vehicle = new Vehicle();
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->klasifikasi_kendaraan = $request->klasifikasi_kendaraan;
        $vehicle->vehicle_condition = $request->vehicle_condition;
        $vehicle->tanggal_oli = $request->tanggal_oli;
        $vehicle->tanggal_aki = $request->tanggal_aki;
        $vehicle->vol_tangki = $request->vol_tangki;
        $vehicle->oli_selanjutnya = $request->oli_selanjutnya;
        $vehicle->odo_meter = $request->odo_meter;
        $vehicle->no_polisi = $request->no_polisi;
        $vehicle->tahun = $request->tahun;
        $vehicle->user_peralatan = $request->user_peralatan;
        $vehicle->lokasi = $request->lokasi;
        $vehicle->no_aset = $request->no_aset;
        $vehicle->no_rangka = $request->no_rangka;
        $vehicle->no_mesin = $request->no_mesin;
        $vehicle->engine = $request->engine;
        $vehicle->kap_silinder = $request->kap_silinder;
        $vehicle->transmisi = $request->transmisi;
        $vehicle->bakar_jenis = $request->bakar_jenis;
        $vehicle->bakar_kapasitas = $request->bakar_kapasitas;
        $vehicle->oli_mesin_volume1 = $request->oli_mesin_volume1;
        $vehicle->oli_mesin_jenis1 = $request->oli_mesin_jenis1;
        $vehicle->oli_mesin_volume2 = $request->oli_mesin_volume2;
        $vehicle->oli_mesin_jenis2 = $request->oli_mesin_jenis2;
        $vehicle->oli_transmisi_volume = $request->oli_transmisi_volume;
        $vehicle->oli_transmisi_jenis = $request->oli_transmisi_jenis;
        $vehicle->oli_gardan_volume = $request->oli_gardan_volume;
        $vehicle->oli_gardan_jenis = $request->oli_gardan_jenis;
        $vehicle->oli_hydrolis_volume = $request->oli_hydrolis_volume;
        $vehicle->oli_hydrolis_oli = $request->oli_hydrolis_oli;
        $vehicle->ban_depan = $request->ban_depan;
        $vehicle->ban_belakang = $request->ban_belakang;
        $vehicle->ban_jumlah = $request->ban_jumlah;
        $vehicle->accu1_spesifikasi = $request->accu1_spesifikasi;
        $vehicle->accu2_spesifikasi = $request->accu2_spesifikasi;
        $vehicle->accu1_jumlah = $request->accu1_jumlah;
        $vehicle->accu2_jumlah = $request->accu2_jumlah;
        $vehicle->foto_kendaraan = $fotokendaraan; // Menyimpan tanda tangan sebagai nama file
        $vehicle->bagian = 'Tidak Ada' ;
        
        if ($vehicle->oli_selanjutnya < $vehicle->odo_meter) {
            $vehicle->oli_keterangan = 'Oli Telat';
        } else {
            $vehicle->oli_keterangan = 'Oli Cukup';
        }
    
// Buat nama unik untuk barcode utama
$barcodeName = uniqid($vehicle->id . '_'); 
$vehicle->barcodes = $barcodeName; // Nama tanpa ekstensi
$vehicle->barcode = $barcodeName . '.svg'; // Nama dengan ekstensi .svg

// Path lengkap untuk menyimpan barcode utama ke dalam folder `barcodes`
$barcodePath = public_path('barcodes/' . $vehicle->barcode); 

// Pastikan direktori `barcodes` ada
if (!file_exists(public_path('barcodes'))) {
    mkdir(public_path('barcodes'), 0755, true); 
}

// Generate barcode utama dalam format SVG
QrCode::format('svg')
    ->size(300)
    ->generate($barcodeName, $barcodePath);


// Simpan data kendaraan ke database
$vehicle->save();

// Kembali ke halaman sebelumnya dengan pesan sukses
return redirect()->back()->with('success', 'Kendaraan berhasil ditambahkan dengan barcode utama dan QR Code tambahan.');
    }

    
    public function store_pemeliharaan(Request $request) // Nama method sesuai yang Anda berikan
    {
        $leaderboard = Auth::user();
        $leaderboard->increment('leaderboard');

        $fotoKendaraanPaths = [];

        // --- PENYESUAIAN UNTUK FOTO KENDARAAN DARI DATA URL ---
        if ($request->has('foto_kendaraan') && is_array($request->input('foto_kendaraan'))) {
            $fotoDataUrls = $request->input('foto_kendaraan');

            foreach ($fotoDataUrls as $index => $dataUrl) {
                if (empty($dataUrl)) {
                    continue;
                }

                if (preg_match('/^data:image\/(\w+);base64,/', $dataUrl, $type_aux)) {
                    $rawData = substr($dataUrl, strpos($dataUrl, ',') + 1);
                    $imageType = strtolower($type_aux[1]);

                    if (!in_array($imageType, ['jpeg', 'jpg', 'png', 'gif'])) {
                        Log::error('Invalid image type from Data URL: ' . $imageType . ' for foto_kendaraan index ' . $index);
                        continue;
                    }

                    $decodedData = base64_decode($rawData);

                    if ($decodedData === false) {
                        Log::error('Failed to decode base64 image data for foto_kendaraan index ' . $index);
                        continue;
                    }

                    $namaFile = time() . '_' . Str::random(10) . '.' . $imageType;
                    $pathTujuan = public_path('pemeliharaan'); // Simpan di public/pemeliharaan

                    if (!File::isDirectory($pathTujuan)) {
                        File::makeDirectory($pathTujuan, 0755, true, true);
                    }

                    if (File::put($pathTujuan . '/' . $namaFile, $decodedData)) {
                        // Simpan hanya nama file, karena sudah di dalam public/pemeliharaan
                        // Untuk mengaksesnya nanti via web: asset('pemeliharaan/' . $namaFile)
                        $fotoKendaraanPaths[] = $namaFile;
                    } else {
                        Log::error('Failed to save image file: ' . $namaFile);
                    }
                } else {
                    Log::warning('Invalid Data URL format for foto_kendaraan index ' . $index . '. Data: ' . substr($dataUrl, 0, 50));
                }
            }
        }
        // --- AKHIR PENYESUAIAN FOTO KENDARAAN ---

        $fotoKendaraanString = implode(',', $fotoKendaraanPaths);
        $laporanData = [
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'tanggal' => $request->tanggal,
            'tanggal_aki' => $request->tanggal_aki,
            'user' => $request->user,
            'user_kendaraan' => $request->user_kendaraan,
            'odometer' => $request->odometer,
            'v_aki' => $request->v_aki,
            'oli_selanjutnya' => $request->oli_selanjutnya,
            'oli_kurang' => $request->oli_kurang,
            'oli_lebih' => $request->oli_lebih,
            'vehicle_condition' => $request->vehicle_condition,
            'body_kendaraan' => $request->body_kendaraan,
            'kebersihan_kendaraan' => $request->kebersihan_kendaraan,
            'cek_air_accu' => $request->cek_air_accu,
            'oli_mesin' => $request->oli_mesin,
            'oli_transmisi' => $request->oli_transmisi,
            'oli_gardan' => $request->oli_gardan,
            'minyak_power_steering' => $request->minyak_power_steering,
            'minyak_rem' => $request->minyak_rem,
            'vbelt_engine' => $request->vbelt_engine,
            'filter_udara' => $request->filter_udara,
            'filter_bahan_bakar' => $request->filter_bahan_bakar,
            'filter_oli' => $request->filter_oli,
            'air_radiator_reservoir' => $request->air_radiator_reservoir,
            'reservoir_wiper' => $request->reservoir_wiper,
            'kaca_film' => $request->kaca_film,
            'apar' => $request->apar,
            'v_belt_ampere' => $request->v_belt_ampere,
            'v_belt_ac' => $request->v_belt_ac,
            'v_belt_power_steering' => $request->v_belt_power_steering,
            'starter_engine' => $request->starter_engine,
            'kondisi_engine' => $request->kondisi_engine,
            'kondisi_turbo' => $request->kondisi_turbo,
            'sistem_pendingin' => $request->sistem_pendingin,
            'timing_belt' => $request->timing_belt,
            'transmisi' => $request->transmisi,
            'pedal_gas' => $request->pedal_gas,
            'rem_kaki' => $request->rem_kaki,
            'rem_tangan' => $request->rem_tangan,
            'kopling' => $request->kopling,
            'power_steering' => $request->power_steering,
            'kaki_kaki' => $request->kaki_kaki,
            'kondisi_karet_wiper' => $request->kondisi_karet_wiper,
            'headlamp_dekat' => $request->headlamp_dekat,
            'headlamp_jauh' => $request->headlamp_jauh,
            'reversing_lamp' => $request->reversing_lamp,
            'sign_lamp_depan' => $request->sign_lamp_depan,
            'sign_lamp_belakang' => $request->sign_lamp_belakang,
            'stoplamp' => $request->stoplamp,
            'lampu_atret' => $request->lampu_atret,
            'rotary_lamp' => $request->rotary_lamp,
            'lampu_sorot' => $request->lampu_sorot,
            'air_coditioning' => $request->air_coditioning, // Ejaan: air_conditioning
            'jok_kendaraan' => $request->jok_kendaraan,
            'indikator_dashboard' => $request->indikator_dashboard,
            'cabin_lamp' => $request->cabin_lamp,
            'klakson' => $request->klakson,
            'fungsi_wipper' => $request->fungsi_wipper, // Ejaan: fungsi_wiper
            'central_lock' => $request->central_lock,
            'power_window_lock' => $request->power_window_lock,
            'microphone' => $request->microphone,
            'ban_depan_kanan' => $request->ban_depan_kanan,
            'ban_depan_kiri' => $request->ban_depan_kiri,
            'ban_belakang_kanan' => $request->ban_belakang_kanan,
            'ban_belakang_kiri' => $request->ban_belakang_kiri,
            'ban_cadangan' => $request->ban_cadangan,
            'tekanan_angin' => $request->tekanan_angin,
            'dongkrak' => $request->dongkrak,
            'kunci_roda' => $request->kunci_roda,
            'approval' => $request->approval,
            'kesimpulan_kendaraan' => $request->kesimpulan_kendaraan,
            'catatan' => $request->catatan,
            'foto_kendaraan' => $fotoKendaraanString,
            'tanda_tangan_teknisi' => $request->tanda_tangan_teknisi,
            'oli_hidrolis' => $request->oli_hidrolis,
            'filter_air_drayer' => $request->filter_air_drayer, // Ejaan: filter_air_dryer
            'filter_water_sparator' => $request->filter_water_sparator, // Ejaan: filter_water_separator
            'filter_transmisi' => $request->filter_transmisi,
            'filter_hidrolis' => $request->filter_hidrolis,
            'cooling_system' => $request->cooling_system,
            'airdrayer' => $request->airdrayer, // Ejaan: air_dryer
            'pneumatic_system' => $request->pneumatic_system,
            'hydraulic_system' => $request->hydraulic_system,
            'electrical_system' => $request->electrical_system,
            'kompresor' => $request->kompresor,
            'folklamp' => $request->folklamp, // Ejaan: fog_lamp
            'retting_depan' => $request->retting_depan,
            'retting_belakang' => $request->retting_belakang,
            'lampu_kompartement' => $request->lampu_kompartement, // Ejaan: lampu_kompartemen
            'lampu_body' => $request->lampu_body,
            'ban_tengah_kanan' => $request->ban_tengah_kanan,
            'ban_tengah_kiri' => $request->ban_tengah_kiri,
            'pompa_fire_fighting' => $request->pompa_fire_fighting,
            'primming_pump' => $request->primming_pump, // Ejaan: priming_pump
            'roof_turret' => $request->roof_turret,
            'bumper_turret' => $request->bumper_turret,
            'undertrack_spray_depan' => $request->undertrack_spray_depan,
            'undertrack_spray_kanan' => $request->undertrack_spray_kanan,
            'undertrack_spray_kiri' => $request->undertrack_spray_kiri,
            'foam_proportioner' => $request->foam_proportioner,
            'tangki_air' => $request->tangki_air,
            'tangki_foam' => $request->tangki_foam,
            'pengisian_air_eksternal' => $request->pengisian_air_eksternal,
            'charger_baterai_eksternal' => $request->charger_baterai_eksternal,
            'top_speed' => $request->top_speed,
            'stop_distance' => $request->stop_distance,
            'acceleration' => $request->acceleration,
            'discharge_range' => $request->discharge_range,
            'discharge_rate' => $request->discharge_rate,
            'oli_mesin_atas' => $request->oli_mesin_atas,
            'air_radiator_mesin_atas' => $request->air_radiator_mesin_atas,
            'filter_oli_mesin_atas' => $request->filter_oli_mesin_atas,
            'filter_bahan_bakar_mesin_atas' => $request->filter_bahan_bakar_mesin_atas,
            'filter_udara_mesin_atas' => $request->filter_udara_mesin_atas,
            'starter_engine_mesin_atas' => $request->starter_engine_mesin_atas,
            'kondisi_engine_mesin_atas' => $request->kondisi_engine_mesin_atas,
            'turbo_mesin_atas' => $request->turbo_mesin_atas,
            'cooling_system_mesin_atas' => $request->cooling_system_mesin_atas,
            'gas_accelerator_pedal_mesin_atas' => $request->gas_accelerator_pedal_mesin_atas,
            'pompa_hidrolis' => $request->pompa_hidrolis,
            'fungsi_hisapan_vacum' => $request->fungsi_hisapan_vacum,
            'fungsi_gerakan_vacum' => $request->fungsi_gerakan_vacum,
            'fungsi_putaran_sapu_kanan' => $request->fungsi_putaran_sapu_kanan,
            'fungsi_putaran_sapu_kiri' => $request->fungsi_putaran_sapu_kiri,
            'fungsi_putaran_sapu_tengah' => $request->fungsi_putaran_sapu_tengah,
            'fungsi_gerakan_sapu_kanan' => $request->fungsi_gerakan_sapu_kanan,
            'fungsi_gerakan_sapu_kiri' => $request->fungsi_gerakan_sapu_kiri,
            'fungsi_gerakan_sapu_tengah' => $request->fungsi_gerakan_sapu_tengah,
            'fungsi_spray_bar_depan' => $request->fungsi_spray_bar_depan,
            'fungsi_spray_bar_kiri' => $request->fungsi_spray_bar_kiri,
            'fungsi_spray_bar_kanan' => $request->fungsi_spray_bar_kanan,
            'fungsi_jet_spray_gun' => $request->fungsi_jet_spray_gun,
            'fungsi_hidrolis_hooper' => $request->fungsi_hidrolis_hooper,
            'fungsi_hidrolis_tutup_hooper' => $request->fungsi_hidrolis_tutup_hooper,
            'fungsi_monitor_control' => $request->fungsi_monitor_control,
            'fungsi_pendant' => $request->fungsi_pendant,
            'oli_mesin_bawah' => $request->oli_mesin_bawah,
            'air_radiator_mesin_bawah' => $request->air_radiator_mesin_bawah,
            'filter_oli_mesin_bawah' => $request->filter_oli_mesin_bawah,
            'filter_bahan_bakar_mesin_bawah' => $request->filter_bahan_bakar_mesin_bawah,
            'filter_udara_mesin_bawah' => $request->filter_udara_mesin_bawah,
            'pompa_uhp' => $request->pompa_uhp,
            'pto_kopling_pompa' => $request->pto_kopling_pompa,
            'v_belt_pompa_uhp' => $request->v_belt_pompa_uhp,
            'kampas_kopling_pompa_uhp' => $request->kampas_kopling_pompa_uhp,
            'kompresor_pompa_uhp' => $request->kompresor_pompa_uhp,
            'vacum_hose_3_inch' => $request->vacum_hose_3_inch,
            'vacum_hose_4_inch' => $request->vacum_hose_4_inch,
            'vacum_hose_6_inch' => $request->vacum_hose_6_inch,
            'hose_40k' => $request->hose_40k,
            'filter_cartridge' => $request->filter_cartridge,
            'filter_bag_10_micron' => $request->filter_bag_10_micron,
            'debris_bag' => $request->debris_bag,
            'running_test_40k_engine' => $request->running_test_40k_engine,
            'air_radiator_mesin' => $request->air_radiator_mesin,
            'ban_tengah_belakang' => $request->ban_tengah_belakang,
            'handrem_tangki_air' => $request->handrem_tangki_air,
            'friction_tyre_kanan' => $request->friction_tyre_kanan,
            'friction_tyre_kiri' => $request->friction_tyre_kiri,
            'distance_tyre_tengah' => $request->distance_tyre_tengah,
            'loadcell' => $request->loadcell,
            'connector_kabel' => $request->connector_kabel,
            'fungsi_pompa_air' => $request->fungsi_pompa_air,
            'kondisi_tangki_air' => $request->kondisi_tangki_air,
            'laptop' => $request->laptop,
            'kalibrasi_jarak' => $request->kalibrasi_jarak,
            'fungsi_gerakan_shourd' => $request->fungsi_gerakan_shourd,
            'fungsi_putaran_kumparan' => $request->fungsi_putaran_kumparan,
            'nozzle' => $request->nozzle,
            'selang_hidrolis' => $request->selang_hidrolis,
            'seal_brush_button' => $request->seal_brush_button,
            'seal_swifel_shaft' => $request->seal_swifel_shaft,
            'seal_gasket' => $request->seal_gasket,
            'seal_upper' => $request->seal_upper,
            'drit_shield' => $request->drit_shield, // Ejaan: dirt_shield
            'oli_kompresor' => $request->oli_kompresor,
            'ban_kanan' => $request->ban_kanan,
            'ban_kiri' => $request->ban_kiri,
            'fungsi_screw_kompresor' => $request->fungsi_screw_kompresor,
            'fungsi_cut_off_pressure' => $request->fungsi_cut_off_pressure,
            'filter_oli_kompresor' => $request->filter_oli_kompresor,
            'v_belt_kompresor' => $request->v_belt_kompresor,
            'fungsi_drayer' => $request->fungsi_drayer, // Ejaan: fungsi_dryer
            'fungsi_auto_start' => $request->fungsi_auto_start,
            'fungsi_lampu_penerangan' => $request->fungsi_lampu_penerangan,
            'pisau_potong' => $request->pisau_potong,
            'fungsi_hidrolis_sepatu_forklift' => $request->fungsi_hidrolis_sepatu_forklift,
            'fungsi_vibrator' => $request->fungsi_vibrator,
            'fungsi_spray_bar' => $request->fungsi_spray_bar,
        ];

        $laporan = LaporanPerawatan::create($laporanData);

        // Ambil nama_dinas dari VerTodolist yang terkait dengan tanggal
        // Menggunakan tanggal dari request jika tersedia dan valid, jika tidak, gunakan today()
        $tanggalUntukDinas = $request->filled('tanggal') ? Carbon::parse($request->tanggal)->toDateString() : today()->toDateString();
        $dinas = VerTodolist::whereDate('tanggal', $tanggalUntukDinas)->latest()->first(); // Ambil yang terbaru jika ada beberapa untuk tanggal yang sama

        $laporanlogbook = [
            'vehicle_name' => $request->vehicle_name,
            'nama_dinas' => $dinas ? $dinas->nama_dinas : null,
            'name' => Auth::user()->name,
            'tanggal' => today(), // Tanggal logbook dibuat
            'checklist' =>  $request->vehicle_name, // Lebih deskriptif
        ];

        FormLogbook::create($laporanlogbook);

        $vehicle = Vehicle::where('vehicle_name', $request->vehicle_name)->first();

        if ($vehicle) {
            VerChecklist::create([
                'checklist' => 'Pemeliharaan ' . $vehicle->vehicle_name,
                'name' => Auth::user()->name,
            ]);

            // Update VerTodolist berdasarkan 'tugas' (vehicle_name) dan tanggal hari ini
            // Pastikan 'tugas' di VerTodolist cocok dengan $vehicle->vehicle_name
            // dan 'tanggal' adalah tanggal hari ini (atau tanggal laporan jika relevan)
            VerTodolist::where('tugas', $vehicle->vehicle_name)
                ->whereDate('tanggal', Carbon::today()) // Atau gunakan $tanggalUntukDinas jika todolist terkait dengan tanggal laporan
                ->update([
                    'is_completed' => 1, // integer 1
                ]);

            $vehicle->update([
                'vehicle_condition' => $request->vehicle_condition,
                'oli_selanjutnya' => $request->oli_selanjutnya,
                'odo_meter' => $request->odometer,
                'catatan' => $request->catatan,
            ]);

            if ($vehicle->oli_selanjutnya < $vehicle->odo_meter) {
                $vehicle->oli_keterangan = 'Oli Telat';
            } else {
                $vehicle->oli_keterangan = 'Oli Cukup';
            }
            $vehicle->save();
        }

        // Tentukan nama rute cetak berdasarkan vehicle_type
        $routeMap = [
            'Kompresor Statis' => 'user.cetak_laporan_perawatan_kompresorstatis',
            'Operasional' => 'user.cetak_laporan_perawatan_operasional',
            'Kompresor Dinamis' => 'user.cetak_laporan_perawatan_kompresordinamis',
            'Crash Car' => 'user.cetak_laporan_perawatan_crashcar',
            'Runway Sweeper' => 'user.cetak_laporan_perawatan_runwaysweeper',
            'Forklift' => 'user.cetak_laporan_perawatan_forklift',
            'Rubber Deposit' => 'user.cetak_laporan_perawatan_rubberdeposit',
            'Tractor Rubber Deposit' => 'user.cetak_laporan_perawatan_tractorrubber',
            'Mu Meter' => 'user.cetak_laporan_perawatan_mumeter',
            'Tractor Mower' => 'user.cetak_laporan_perawatan_tractormower',
            'Asphalt Cutter' => 'user.cetak_laporan_perawatan_asphaltcutter',
            'Genset' => 'user.cetak_laporan_perawatan_genset',
            'Vibro Roller' => 'user.cetak_laporan_perawatan_vibroroller',
        ];

        $printRouteName = null; // Default jika tidak ada di map
        if ($laporan && isset($routeMap[$laporan->vehicle_type])) { // Pastikan $laporan ada sebelum mengakses vehicle_type
            $printRouteName = $routeMap[$laporan->vehicle_type];
        }

        // Redirect ke halaman done_submit dengan membawa ID laporan dan nama rute cetak
        // Pastikan Anda memiliki route dengan nama 'user.done_submit'
        if ($laporan) { // Hanya redirect ke done_submit jika laporan berhasil dibuat
             return redirect()->route('user.done_submit', [
                'id' => $laporan->id,
                'print_route_name' => $printRouteName
            ])->with('success', 'Laporan berhasil disimpan!');
        }

        // Fallback jika $laporan tidak berhasil dibuat atau tidak ada rute spesifik
        Log::error('Laporan Perawatan gagal dibuat atau tidak ada mapping route cetak.');
        return redirect()->route('user.dashboard')->with('error', 'Gagal menyimpan laporan atau rute cetak tidak ditemukan.');
    }


       public function store_pemeliharaan_new(Request $request)
    {
        $leaderboard = Auth::user();
        $leaderboard->increment('leaderboard');

        $fotoKendaraanPaths = [];

        if ($request->has('foto_kendaraan') && is_array($request->input('foto_kendaraan'))) {
            $fotoDataUrls = $request->input('foto_kendaraan');

            foreach ($fotoDataUrls as $index => $dataUrl) {
                if (empty($dataUrl)) {
                    continue;
                }
                if (preg_match('/^data:image\/(\w+);base64,/', $dataUrl, $type_aux)) {
                    $rawData = substr($dataUrl, strpos($dataUrl, ',') + 1);
                    $imageType = strtolower($type_aux[1]);

                    if (!in_array($imageType, ['jpeg', 'jpg', 'png', 'gif'])) {
                        Log::error('Invalid image type from Data URL: ' . $imageType);
                        continue;
                    }

                    $decodedData = base64_decode($rawData);

                    if ($decodedData === false) {
                        Log::error('Failed to decode base64 image data for foto_kendaraan index ' . $index);
                        continue;
                    }

                    $namaFile = time() . '_' . Str::random(10) . '.' . $imageType;
                    $pathTujuan = public_path('pemeliharaan');

                    if (!File::isDirectory($pathTujuan)) {
                        File::makeDirectory($pathTujuan, 0755, true, true);
                    }

                    if (File::put($pathTujuan . '/' . $namaFile, $decodedData)) {
                        $fotoKendaraanPaths[] =   $namaFile; // Simpan path relatif dari public
                    } else {
                        Log::error('Failed to save image file: ' . $namaFile);
                    }
                } else {
                    Log::warning('Invalid Data URL format for foto_kendaraan index ' . $index);
                }
            }
        }

        $fotoKendaraanString = implode(',', $fotoKendaraanPaths);
        $laporanData = [
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'tanggal' => $request->tanggal,
            'tanggal_aki' => $request->tanggal_aki,
            'user' => $request->user,
            'user_kendaraan' => $request->user_kendaraan,
            'odometer' => $request->odometer,
            'v_aki' => $request->v_aki,
            'oli_selanjutnya' => $request->oli_selanjutnya,
            'oli_kurang' => $request->oli_kurang,
            'oli_lebih' => $request->oli_lebih,
            'vehicle_condition' => $request->vehicle_condition,
            'body_kendaraan' => $request->body_kendaraan,
            'kebersihan_kendaraan' => $request->kebersihan_kendaraan,
            'cek_air_accu' => $request->cek_air_accu,
            'oli_mesin' => $request->oli_mesin,
            'oli_transmisi' => $request->oli_transmisi,
            'oli_gardan' => $request->oli_gardan,
            'minyak_power_steering' => $request->minyak_power_steering,
            'minyak_rem' => $request->minyak_rem,
            'vbelt_engine' => $request->vbelt_engine,
            'filter_udara' => $request->filter_udara,
            'filter_bahan_bakar' => $request->filter_bahan_bakar,
            'filter_oli' => $request->filter_oli,
            'air_radiator_reservoir' => $request->air_radiator_reservoir,
            'reservoir_wiper' => $request->reservoir_wiper,
            'kaca_film' => $request->kaca_film,
            'apar' => $request->apar,
            'v_belt_ampere' => $request->v_belt_ampere,
            'v_belt_ac' => $request->v_belt_ac,
            'v_belt_power_steering' => $request->v_belt_power_steering,
            'starter_engine' => $request->starter_engine,
            'kondisi_engine' => $request->kondisi_engine,
            'kondisi_turbo' => $request->kondisi_turbo,
            'sistem_pendingin' => $request->sistem_pendingin,
            'timing_belt' => $request->timing_belt,
            'transmisi' => $request->transmisi,
            'pedal_gas' => $request->pedal_gas,
            'rem_kaki' => $request->rem_kaki,
            'rem_tangan' => $request->rem_tangan,
            'kopling' => $request->kopling,
            'power_steering' => $request->power_steering,
            'kaki_kaki' => $request->kaki_kaki,
            'kondisi_karet_wiper' => $request->kondisi_karet_wiper,
            'headlamp_dekat' => $request->headlamp_dekat,
            'headlamp_jauh' => $request->headlamp_jauh,
            'reversing_lamp' => $request->reversing_lamp,
            'sign_lamp_depan' => $request->sign_lamp_depan,
            'sign_lamp_belakang' => $request->sign_lamp_belakang,
            'stoplamp' => $request->stoplamp,
            'lampu_atret' => $request->lampu_atret,
            'rotary_lamp' => $request->rotary_lamp,
            'lampu_sorot' => $request->lampu_sorot,
            'air_coditioning' => $request->air_coditioning, // Typo: air_conditioning
            'jok_kendaraan' => $request->jok_kendaraan,
            'indikator_dashboard' => $request->indikator_dashboard,
            'cabin_lamp' => $request->cabin_lamp,
            'klakson' => $request->klakson,
            'fungsi_wipper' => $request->fungsi_wipper, // Typo: fungsi_wiper
            'central_lock' => $request->central_lock,
            'power_window_lock' => $request->power_window_lock,
            'microphone' => $request->microphone,
            'ban_depan_kanan' => $request->ban_depan_kanan,
            'ban_depan_kiri' => $request->ban_depan_kiri,
            'ban_belakang_kanan' => $request->ban_belakang_kanan,
            'ban_belakang_kiri' => $request->ban_belakang_kiri,
            'ban_cadangan' => $request->ban_cadangan,
            'tekanan_angin' => $request->tekanan_angin,
            'dongkrak' => $request->dongkrak,
            'kunci_roda' => $request->kunci_roda,
            'approval' => $request->approval,
            'kesimpulan_kendaraan' => $request->kesimpulan_kendaraan,
            'catatan' => $request->catatan,
            'foto_kendaraan' => $fotoKendaraanString,
            'tanda_tangan_teknisi' => $request->tanda_tangan_teknisi,
            'oli_hidrolis' => $request->oli_hidrolis,
            'filter_air_drayer' => $request->filter_air_drayer,
            'filter_water_sparator' => $request->filter_water_sparator,
            'filter_transmisi' => $request->filter_transmisi,
            'filter_hidrolis' => $request->filter_hidrolis,
            'cooling_system' => $request->cooling_system,
            'airdrayer' => $request->airdrayer,
            'pneumatic_system' => $request->pneumatic_system,
            'hydraulic_system' => $request->hydraulic_system,
            'electrical_system' => $request->electrical_system,
            'kompresor' => $request->kompresor,
            'folklamp' => $request->folklamp, // Typo: foglamp
            'retting_depan' => $request->retting_depan,
            'retting_belakang' => $request->retting_belakang,
            'lampu_kompartement' => $request->lampu_kompartement,
            'lampu_body' => $request->lampu_body,
            'ban_tengah_kanan' => $request->ban_tengah_kanan,
            'ban_tengah_kiri' => $request->ban_tengah_kiri,
            'pompa_fire_fighting' => $request->pompa_fire_fighting,
            'primming_pump' => $request->primming_pump,
            'roof_turret' => $request->roof_turret,
            'bumper_turret' => $request->bumper_turret,
            'undertrack_spray_depan' => $request->undertrack_spray_depan,
            'undertrack_spray_kanan' => $request->undertrack_spray_kanan,
            'undertrack_spray_kiri' => $request->undertrack_spray_kiri,
            'foam_proportioner' => $request->foam_proportioner,
            'tangki_air' => $request->tangki_air,
            'tangki_foam' => $request->tangki_foam,
            'pengisian_air_eksternal' => $request->pengisian_air_eksternal,
            'charger_baterai_eksternal' => $request->charger_baterai_eksternal,
            'top_speed' => $request->top_speed,
            'stop_distance' => $request->stop_distance,
            'acceleration' => $request->acceleration,
            'discharge_range' => $request->discharge_range,
            'discharge_rate' => $request->discharge_rate,
            'oli_mesin_atas' => $request->oli_mesin_atas,
            'air_radiator_mesin_atas' => $request->air_radiator_mesin_atas,
            'filter_oli_mesin_atas' => $request->filter_oli_mesin_atas,
            'filter_bahan_bakar_mesin_atas' => $request->filter_bahan_bakar_mesin_atas,
            'filter_udara_mesin_atas' => $request->filter_udara_mesin_atas,
            'starter_engine_mesin_atas' => $request->starter_engine_mesin_atas,
            'kondisi_engine_mesin_atas' => $request->kondisi_engine_mesin_atas,
            'turbo_mesin_atas' => $request->turbo_mesin_atas,
            'cooling_system_mesin_atas' => $request->cooling_system_mesin_atas,
            'gas_accelerator_pedal_mesin_atas' => $request->gas_accelerator_pedal_mesin_atas,
            'pompa_hidrolis' => $request->pompa_hidrolis,
            'fungsi_hisapan_vacum' => $request->fungsi_hisapan_vacum,
            'fungsi_gerakan_vacum' => $request->fungsi_gerakan_vacum,
            'fungsi_putaran_sapu_kanan' => $request->fungsi_putaran_sapu_kanan,
            'fungsi_putaran_sapu_kiri' => $request->fungsi_putaran_sapu_kiri,
            'fungsi_putaran_sapu_tengah' => $request->fungsi_putaran_sapu_tengah,
            'fungsi_gerakan_sapu_kanan' => $request->fungsi_gerakan_sapu_kanan,
            'fungsi_gerakan_sapu_kiri' => $request->fungsi_gerakan_sapu_kiri,
            'fungsi_gerakan_sapu_tengah' => $request->fungsi_gerakan_sapu_tengah,
            'fungsi_spray_bar_depan' => $request->fungsi_spray_bar_depan,
            'fungsi_spray_bar_kiri' => $request->fungsi_spray_bar_kiri,
            'fungsi_spray_bar_kanan' => $request->fungsi_spray_bar_kanan,
            'fungsi_jet_spray_gun' => $request->fungsi_jet_spray_gun,
            'fungsi_hidrolis_hooper' => $request->fungsi_hidrolis_hooper,
            'fungsi_hidrolis_tutup_hooper' => $request->fungsi_hidrolis_tutup_hooper,
            'fungsi_monitor_control' => $request->fungsi_monitor_control,
            'fungsi_pendant' => $request->fungsi_pendant,
            'oli_mesin_bawah' => $request->oli_mesin_bawah,
            'air_radiator_mesin_bawah' => $request->air_radiator_mesin_bawah,
            'filter_oli_mesin_bawah' => $request->filter_oli_mesin_bawah,
            'filter_bahan_bakar_mesin_bawah' => $request->filter_bahan_bakar_mesin_bawah,
            'filter_udara_mesin_bawah' => $request->filter_udara_mesin_bawah,
            'pompa_uhp' => $request->pompa_uhp,
            'pto_kopling_pompa' => $request->pto_kopling_pompa,
            'v_belt_pompa_uhp' => $request->v_belt_pompa_uhp,
            'kampas_kopling_pompa_uhp' => $request->kampas_kopling_pompa_uhp,
            'kompresor_pompa_uhp' => $request->kompresor_pompa_uhp,
            'vacum_hose_3_inch' => $request->vacum_hose_3_inch,
            'vacum_hose_4_inch' => $request->vacum_hose_4_inch,
            'vacum_hose_6_inch' => $request->vacum_hose_6_inch,
            'hose_40k' => $request->hose_40k,
            'filter_cartridge' => $request->filter_cartridge,
            'filter_bag_10_micron' => $request->filter_bag_10_micron,
            'debris_bag' => $request->debris_bag,
            'running_test_40k_engine' => $request->running_test_40k_engine,
            'air_radiator_mesin' => $request->air_radiator_mesin,
            'ban_tengah_belakang' => $request->ban_tengah_belakang,
            'handrem_tangki_air' => $request->handrem_tangki_air,
            'friction_tyre_kanan' => $request->friction_tyre_kanan,
            'friction_tyre_kiri' => $request->friction_tyre_kiri,
            'distance_tyre_tengah' => $request->distance_tyre_tengah,
            'loadcell' => $request->loadcell,
            'connector_kabel' => $request->connector_kabel,
            'fungsi_pompa_air' => $request->fungsi_pompa_air,
            'kondisi_tangki_air' => $request->kondisi_tangki_air,
            'laptop' => $request->laptop,
            'kalibrasi_jarak' => $request->kalibrasi_jarak,
            'fungsi_gerakan_shourd' => $request->fungsi_gerakan_shourd,
            'fungsi_putaran_kumparan' => $request->fungsi_putaran_kumparan,
            'nozzle' => $request->nozzle,
            'selang_hidrolis' => $request->selang_hidrolis,
            'seal_brush_button' => $request->seal_brush_button,
            'seal_swifel_shaft' => $request->seal_swifel_shaft,
            'seal_gasket' => $request->seal_gasket,
            'seal_upper' => $request->seal_upper,
            'drit_shield' => $request->drit_shield,
            'oli_kompresor' => $request->oli_kompresor,
            'ban_kanan' => $request->ban_kanan,
            'ban_kiri' => $request->ban_kiri,
            'fungsi_screw_kompresor' => $request->fungsi_screw_kompresor,
            'fungsi_cut_off_pressure' => $request->fungsi_cut_off_pressure,
            'filter_oli_kompresor' => $request->filter_oli_kompresor,
            'v_belt_kompresor' => $request->v_belt_kompresor,
            'fungsi_drayer' => $request->fungsi_drayer,
            'fungsi_auto_start' => $request->fungsi_auto_start,
            'fungsi_lampu_penerangan' => $request->fungsi_lampu_penerangan,
            'pisau_potong' => $request->pisau_potong,
            'fungsi_hidrolis_sepatu_forklift' => $request->fungsi_hidrolis_sepatu_forklift,
            'fungsi_vibrator' => $request->fungsi_vibrator,
            'fungsi_spray_bar' => $request->fungsi_spray_bar,
        ];

        $laporan = LaporanPerawatan::create($laporanData);

        $laporanlogbook = [
            'vehicle_name' => $request->vehicle_name,
            'nama_dinas' => $request->nama_dinas,
            'name' => Auth::user()->name,
            'tanggal' => today(),
            'checklist' => 'Pemeliharaan ' . $request->vehicle_name, // Lebih deskriptif
        ];

        FormLogbook::create($laporanlogbook);

        $vehicle = Vehicle::where('vehicle_name', $request->vehicle_name)->first();

        VerChecklist::create([
            'checklist' => 'Pemeliharaan ' . ($vehicle ? $vehicle->vehicle_name : $request->vehicle_name),
            'name' => Auth::user()->name,
        ]);

        if ($request->has('id') && !empty($request->id)) {
            VerTodolist::where('id', $request->id)
                ->update([
                    'is_completed' => 1,
                ]);
        }

        if ($vehicle) {
            $vehicle->update([
                'vehicle_condition' => $request->vehicle_condition,
                'oli_selanjutnya' => $request->oli_selanjutnya,
                'odo_meter' => $request->odometer,
                'catatan' => $request->catatan,
            ]);

            if ($vehicle->oli_selanjutnya < $vehicle->odo_meter) {
                $vehicle->oli_keterangan = 'Oli Telat';
            } else {
                $vehicle->oli_keterangan = 'Oli Cukup';
            }
            $vehicle->save();
        }

        // Tentukan nama rute cetak berdasarkan vehicle_type
        $routeMap = [
            'Kompresor Statis' => 'user.cetak_laporan_perawatan_kompresorstatis',
            'Operasional' => 'user.cetak_laporan_perawatan_operasional',
            'Kompresor Dinamis' => 'user.cetak_laporan_perawatan_kompresordinamis',
            'Crash Car' => 'user.cetak_laporan_perawatan_crashcar',
            'Runway Sweeper' => 'user.cetak_laporan_perawatan_runwaysweeper',
            'Forklift' => 'user.cetak_laporan_perawatan_forklift',
            'Rubber Deposit' => 'user.cetak_laporan_perawatan_rubberdeposit',
            'Tractor Rubber Deposit' => 'user.cetak_laporan_perawatan_tractorrubber',
            'Mu Meter' => 'user.cetak_laporan_perawatan_mumeter',
            'Tractor Mower' => 'user.cetak_laporan_perawatan_tractormower',
            'Asphalt Cutter' => 'user.cetak_laporan_perawatan_asphaltcutter',
            'Genset' => 'user.cetak_laporan_perawatan_genset',
            'Vibro Roller' => 'user.cetak_laporan_perawatan_vibroroller',
        ];

        $printRouteName = null; // Default jika tidak ada di map
        if (isset($routeMap[$laporan->vehicle_type])) {
            $printRouteName = $routeMap[$laporan->vehicle_type];
        }

        // Redirect ke halaman done_submit dengan membawa ID laporan dan nama rute cetak
        // Pastikan Anda memiliki route dengan nama 'user.done_submit'
        return redirect()->route('user.done_submit', [
            'id' => $laporan->id,
            'print_route_name' => $printRouteName // Akan menjadi query parameter
        ])->with('success', 'Laporan berhasil disimpan!'); // Opsional: pesan sukses
    }
    

    public function done_submit(Request $request, $id)
    {
        $laporanId = $id;
        // Ambil 'print_route_name' dari query parameter yang dikirim oleh redirect
        $printRouteName = $request->query('print_route_name');

        Log::info('Displaying done_submit page. Laporan ID: ' . $laporanId . ', Print Route Name: ' . ($printRouteName ?: 'Tidak ada'));

        // Anda bisa juga mengambil data laporan jika ingin menampilkan info tambahan
        // $laporan = LaporanPerawatan::find($laporanId);
        // if (!$laporan) {
        //     abort(404, 'Laporan tidak ditemukan.');
        // }

        return view('user.done_submit', compact('laporanId', 'printRouteName' /*, 'laporan' */));
    }

    


    public function destroy($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
        
        // Hapus user dari database
        $user->delete();

        // Redirect ke halaman user dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'User berhasil dihapus.');
    }

    public function destroy_pekerjaana2b($id)
    {
        // Cari user berdasarkan ID
        $user = Pekerjaana2b::findOrFail($id);
        
        // Hapus user dari database
        $user->delete();

        // Redirect ke halaman user dengan pesan sukses
        return redirect()->route('admin.data_pekerjaan_a2b')->with('success', 'User berhasil dihapus.');
    }

    public function destroy_kendaraan($id)
    {
        // Temukan kendaraan berdasarkan ID
        $vehicle = Vehicle::findOrFail($id);
        
        // Ambil nama file barcode
        $barcodePath = public_path('barcodes/' . $vehicle->barcode);

        $fotokendaraan = public_path('foto_kendaraan/' . $vehicle->foto_kendaraan);
    
        // Hapus file barcode jika ada
        if (file_exists($barcodePath) || file_exists($fotokendaraan)) {
            unlink($barcodePath);
            unlink($fotokendaraan);
        } 
            
        
    
        // Hapus kendaraan
        $vehicle->delete();
    
        return redirect()->back()->with('success', 'Kendaraan berhasil dihapus.');
    }
    

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Update name dan email
    $user->name = $request->name;
    $user->email = $request->email;

    // Update password jika diisi
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    // Update tanda tangan jika ada file yang diunggah
    if ($request->hasFile('tanda_tangan')) {
        $file = $request->file('tanda_tangan');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('tanda_tangan'), $namaFile);

        // Hapus file tanda tangan lama jika ada
        if ($user->tanda_tangan && file_exists(public_path('tanda_tangan/' . $user->tanda_tangan))) {
            unlink(public_path('tanda_tangan/' . $user->tanda_tangan));
        }

        // Simpan nama file tanda tangan yang baru
        $user->tanda_tangan = $namaFile;
    }

    // Simpan perubahan ke database
    $user->save();

    return redirect()->route('admin.index')->with('success', 'User berhasil diperbarui.');
}


public function update_kerusakan(Request $request, $id)
    {
        // 1. Validation Rules
        $rules = [
            'no_ba'             => 'nullable|string|max:255', // Nullable if it can be empty initially
            'user_kendaraan'    => 'nullable|string|max:255',
            // 'vehicle_name'   => 'required|string|max:255', // Usually not editable here, taken from relation
            // 'vehicle_type'   => 'required|string|max:255', // Usually not editable here
            'tanggal_kerusakan' => 'required|date',
            // 'vehicle_condition' => 'required|string|max:255', // This seems to be updated in the Vehicle model later
            'bagian'            => 'required|string',
            'foto_kerusakan.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // Validate each file in the array
        ];

        // Add validation for vehicle_condition if it's part of this form's direct update
        // $rules['vehicle_condition'] = 'required|string|max:255';

        $validatedData = $request->validate($rules);

        try {
            // 2. Find the record
            $kerusakan = FormKerusakan::findOrFail($id);

            // 3. Handle File Uploads (Append Logic)
            $uploadedPhotosNames = [];
            if ($request->hasFile('foto_kerusakan')) {
                foreach ($request->file('foto_kerusakan') as $file) {
                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    // Generate unique name
                    $filename = 'kerusakan-' . time() . '_' . Str::slug($originalName) . '_' . Str::random(5) . '.' . $extension;

                    // Store using Storage facade (disk 'public' maps to storage/app/public)
                    $path = $file->storeAs('foto_kerusakan', $filename, 'public'); // Store in 'storage/app/public/foto_kerusakan'

                    if ($path) {
                        $uploadedPhotosNames[] = $filename; // Add successfully uploaded filename
                    } else {
                        Log::error("Gagal menyimpan file: " . $file->getClientOriginalName());
                        // Optionally add a specific error message back
                    }
                }
            }

            // 4. Prepare data for update
            $updateData = [
                'no_ba'             => $validatedData['no_ba'] ?? $kerusakan->no_ba, // Keep old if not provided
                'user_kendaraan'    => $validatedData['user_kendaraan'] ?? $kerusakan->user_kendaraan,
                'tanggal_kerusakan' => $validatedData['tanggal_kerusakan'],
                'bagian'            => $validatedData['bagian'],
                // Add vehicle_condition here if it's directly updated in FormKerusakan model
                // 'vehicle_condition' => $validatedData['vehicle_condition'],
            ];

            // 5. Merge existing photos with newly uploaded ones
            $existingPhotos = !empty($kerusakan->foto_kerusakan) ? explode(',', $kerusakan->foto_kerusakan) : [];
            $allPhotos = array_merge($existingPhotos, $uploadedPhotosNames);
            // Remove duplicates just in case and filter empty values
            $allPhotos = array_filter(array_unique($allPhotos));

            if (!empty($allPhotos)) {
                 $updateData['foto_kerusakan'] = implode(',', $allPhotos);
            } elseif (empty($uploadedPhotosNames) && $request->hasFile('foto_kerusakan')) {
                 // If upload was attempted but failed for all files, don't overwrite existing photos
                 // (unless you specifically want to clear photos on failed upload)
                 unset($updateData['foto_kerusakan']); // Don't update the photo field
                 Log::warning("Upload foto kerusakan untuk ID {$id} gagal, foto lama dipertahankan.");
            } else if (empty($uploadedPhotosNames) && !$request->hasFile('foto_kerusakan')) {
                 // No new files uploaded, keep existing value (no change needed unless deleting)
                 // If you add a feature to delete specific photos, handle that logic here.
                 // For now, we just don't include 'foto_kerusakan' in $updateData if no new files.
                  unset($updateData['foto_kerusakan']);
            } else {
                 // No existing photos and no new photos uploaded/saved
                 $updateData['foto_kerusakan'] = null; // Or keep existing null value
            }


            // 6. Update the FormKerusakan record
            $kerusakan->update($updateData);

            // 7. Update related Vehicle condition (if applicable and desired)
            // Make sure vehicle_name is reliable or use vehicle_id relation
            if ($request->filled('vehicle_condition')) { // Only update if condition is sent
                $vehicle = Vehicle::where('vehicle_name', $kerusakan->vehicle_name)->first();
                if ($vehicle) {
                    $vehicle->update([
                        'vehicle_condition' => $request->vehicle_condition, // Use request directly or validated data if added above
                    ]);
                } else {
                     Log::warning("Vehicle not found for update condition: " . $kerusakan->vehicle_name);
                }
            }


            // 8. Redirect with success message
            return redirect()->route('admin.laporan_kerusakan')->with('success', 'Laporan kerusakan berhasil diperbarui.');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Laporan kerusakan tidak ditemukan.');
        } catch (\Exception $e) {
            Log::error("Error updating kerusakan (ID: $id): " . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui laporan: ' . $e->getMessage());
        }
    }

public function update_tampil(Request $request, $id){
    $vehicles = FormVerKerusakan::findOrFail($id);

    $vehicles->tampil_cetak = 1;
    $vehicles->save();
    return redirect()->back()->with('success', 'Nomor PO berhasil diperbarui.');
}

public function update_hilang(Request $request, $id){
    $vehicles = FormVerKerusakan::findOrFail($id);

    $vehicles->tampil_cetak = 0;
    $vehicles->save();
    return redirect()->back()->with('success', 'Nomor PO berhasil diperbarui.');
}




public function update_perbaikan(Request $request, $id)
{
    // 1. Validation Rules
    $rules = [
        'no_ba'             => 'nullable|string|max:255',
        'user_kendaraan'    => 'nullable|string|max:255',
        // 'vehicle_name'   => 'required|string|max:255', // Biasanya tidak diedit di sini
        // 'vehicle_type'   => 'required|string|max:255', // Biasanya tidak diedit di sini
        'tanggal_perbaikan' => 'required|date',
        'detail_perbaikan'  => 'required|string',
        'foto_perbaikan.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048' // Validasi setiap file
    ];

    // Opsional: Tambahkan validasi untuk vehicle_condition jika diupdate dari form ini
    // $rules['vehicle_condition'] = ['required', Rule::in(['Serviceable', 'Unserviceable', 'Serviceable Dengan Catatan'])];

    $validatedData = $request->validate($rules);

    try {
        // 2. Find the record
        $perbaikan = FormPerbaikan::findOrFail($id); // Ganti $vehicle menjadi $perbaikan

        // 3. Handle File Uploads (Append Logic)
        $uploadedPhotosNames = [];
        if ($request->hasFile('foto_perbaikan')) {
            foreach ($request->file('foto_perbaikan') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                // Generate unique name
                $filename = 'perbaikan-' . time() . '_' . Str::slug($originalName) . '_' . Str::random(5) . '.' . $extension;

                // Store using Storage facade (disk 'public')
                $path = $file->storeAs('foto_perbaikan', $filename, 'public'); // Simpan di 'storage/app/public/foto_perbaikan'

                if ($path) {
                    $uploadedPhotosNames[] = $filename; // Tambah nama file yang berhasil diupload
                } else {
                    Log::error("Gagal menyimpan file perbaikan: " . $file->getClientOriginalName());
                }
            }
        }

        // 4. Prepare data for update
        $updateData = [
            'no_ba'             => $validatedData['no_ba'] ?? $perbaikan->no_ba,
            'user_kendaraan'    => $validatedData['user_kendaraan'] ?? $perbaikan->user_kendaraan,
            'tanggal_perbaikan' => $validatedData['tanggal_perbaikan'],
            'detail_perbaikan'  => $validatedData['detail_perbaikan'],
            // 'vehicle_condition' => $validatedData['vehicle_condition'] ?? $perbaikan->vehicle_condition, // Jika ada di model ini
            // Sertakan field lain yang perlu diupdate dari request
        ];

        // 5. Merge existing photos with newly uploaded ones
        $existingPhotos = !empty($perbaikan->foto_perbaikan) ? explode(',', $perbaikan->foto_perbaikan) : [];
        $allPhotos = array_merge($existingPhotos, $uploadedPhotosNames);
        $allPhotos = array_filter(array_unique($allPhotos)); // Bersihkan array

        // Hanya update field foto jika ada foto baru yang berhasil diupload atau jika memang ada foto (lama+baru)
        // Jika tidak ada file baru diupload, field 'foto_perbaikan' tidak akan masuk $updateData,
        // sehingga nilai lama di DB tidak akan dioverwrite.
        if (!empty($uploadedPhotosNames) || ($request->hasFile('foto_perbaikan') && empty($allPhotos))) {
             // Update jika ada foto baru ATAU jika upload dicoba tapi gagal semua (jadi null)
             $updateData['foto_perbaikan'] = !empty($allPhotos) ? implode(',', $allPhotos) : null;
        }
        // Jika tidak ada file baru diupload sama sekali, 'foto_perbaikan' tidak di-set di $updateData

        // 6. Update the FormPerbaikan record
        $perbaikan->update($updateData);

        // 7. Opsional: Update related Vehicle condition if needed and if vehicle_condition is part of the form
        /*
        if ($request->filled('vehicle_condition')) {
            $vehicle = Vehicle::where('vehicle_name', $perbaikan->vehicle_name)->first();
            if ($vehicle) {
                $vehicle->update(['vehicle_condition' => $request->vehicle_condition]);
            } else {
                 Log::warning("Vehicle not found for update condition via perbaikan: " . $perbaikan->vehicle_name);
            }
        }
        */

        // 8. Redirect with success message
        // Ganti 'admin.laporan_perbaikan' dengan nama route index Anda
        return redirect()->route('admin.laporan_perbaikan')->with('success', 'Data perbaikan berhasil diperbarui.');

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return back()->with('error', 'Data perbaikan tidak ditemukan.');
    } catch (\Illuminate\Validation\ValidationException $e) {
         // Redirect back with validation errors
         return back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        Log::error("Error updating perbaikan (ID: $id): " . $e->getMessage());
        return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data perbaikan: ' . $e->getMessage());
    }
}


public function delete_kerusakan($id)
    {
        $vehicle = FormKerusakan::findOrFail($id);

        // Hapus foto perbaikan jika ada
        if ($vehicle->foto_kerusakan) {
            $photos = explode(',', $vehicle->foto_kerusakan);
            foreach ($photos as $photo) {
                $photoPath = public_path('foto_kerusakan/' . $photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
        }

        $vehicle->delete();

        return redirect()->route('admin.laporan_kerusakan')->with('success', 'Data perbaikan berhasil dihapus.');
    }



    public function delete_perbaikan($id)
    {
        $vehicle = FormPerbaikan::findOrFail($id);

        // Hapus foto perbaikan jika ada
        if ($vehicle->foto_perbaikan) {
            $photos = explode(',', $vehicle->foto_perbaikan);
            foreach ($photos as $photo) {
                $photoPath = public_path('foto_perbaikan/' . $photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }
        }

        $vehicle->delete();

        return redirect()->route('admin.laporan_perbaikan')->with('success', 'Data perbaikan berhasil dihapus.');
    }


   
    public function update_kendaraan(Request $request, $id)
    {
        // Temukan kendaraan berdasarkan ID
        $vehicle = Vehicle::findOrFail($id);
        
    
        // Update data kendaraan
        $vehicle->vehicle_name = $request->vehicle_name;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->klasifikasi_kendaraan = $request->klasifikasi_kendaraan;
        $vehicle->vehicle_condition = $request->vehicle_condition;
        $vehicle->vol_tangki = $request->vol_tangki;
        $vehicle->tanggal_oli = $request->tanggal_oli;
        $vehicle->tanggal_aki = $request->tanggal_aki;
        $vehicle->oli_selanjutnya = $request->oli_selanjutnya;
        $vehicle->odo_meter = $request->odo_meter;
        $vehicle->no_polisi = $request->no_polisi;
        $vehicle->tahun = $request->tahun;
        $vehicle->user_peralatan = $request->user_peralatan;
        $vehicle->lokasi = $request->lokasi;
        $vehicle->no_aset = $request->no_aset;
        $vehicle->no_rangka = $request->no_rangka;
        $vehicle->no_mesin = $request->no_mesin;
        $vehicle->engine = $request->engine;
        $vehicle->kap_silinder = $request->kap_silinder;
        $vehicle->transmisi = $request->transmisi;
        $vehicle->bakar_jenis = $request->bakar_jenis;
        $vehicle->bakar_kapasitas = $request->bakar_kapasitas;
        $vehicle->oli_mesin_volume1 = $request->oli_mesin_volume1;
        $vehicle->oli_mesin_jenis1 = $request->oli_mesin_jenis1;
        $vehicle->oli_mesin_volume2 = $request->oli_mesin_volume2;
        $vehicle->oli_mesin_jenis2 = $request->oli_mesin_jenis2;
        $vehicle->oli_transmisi_volume = $request->oli_transmisi_volume;
        $vehicle->oli_transmisi_jenis = $request->oli_transmisi_jenis;
        $vehicle->oli_gardan_volume = $request->oli_gardan_volume;
        $vehicle->oli_gardan_jenis = $request->oli_gardan_jenis;
        $vehicle->oli_hydrolis_volume = $request->oli_hydrolis_volume;
        $vehicle->oli_hydrolis_oli = $request->oli_hydrolis_oli;
        $vehicle->ban_depan = $request->ban_depan;
        $vehicle->ban_belakang = $request->ban_belakang;
        $vehicle->ban_jumlah = $request->ban_jumlah;
        $vehicle->accu1_spesifikasi = $request->accu1_spesifikasi;
        $vehicle->accu2_spesifikasi = $request->accu2_spesifikasi;
        $vehicle->accu1_jumlah = $request->accu1_jumlah;
        $vehicle->accu2_jumlah = $request->accu2_jumlah;

            // Check if a new file has been uploaded
        if ($request->hasFile('foto_kendaraan')) {
        // Delete the old file if it exists
        if ($vehicle->foto_kendaraan && file_exists(public_path('foto_kendaraan/' . $vehicle->foto_kendaraan))) {
            unlink(public_path('foto_kendaraan/' . $vehicle->foto_kendaraan));
        }

        // Store the new file
        $newFileName = time() . '_' . $request->file('foto_kendaraan')->getClientOriginalName();
        $request->file('foto_kendaraan')->move(public_path('foto_kendaraan'), $newFileName);

        // Update the database
        $vehicle->foto_kendaraan = $newFileName;
    }

        if ($vehicle->oli_selanjutnya < $vehicle->odo_meter) {
            $vehicle->oli_keterangan = 'Oli Telat';
        } else {
            $vehicle->oli_keterangan = 'Oli Cukup';
        }
    
        // Simpan perubahan
        $vehicle->save();
    
        return redirect()->back()->with('success', 'Kendaraan berhasil diperbarui.');
    }
    

   public function update_condition(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'vehicle_condition' => 'required|string',
    ]);

    // Cari kendaraan berdasarkan ID
    $vehicle = Vehicle::findOrFail($id);

    // Update kondisi kendaraan
    $vehicle->vehicle_condition = $request->vehicle_condition;
    
    // Simpan perubahan
    $vehicle->save();

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Kondisi kendaraan berhasil diupdate.');
}

    public function data_kendaraan(){
        $vehicles = Vehicle::all(); // Mengambil semua data dari tabel vehicles
        return view('admin.datakendaraan',compact('vehicles'));
    }

    public function laporan_perawatan(Request $request)
{
    // Ambil semua data laporan perawatan
    $vehicles = LaporanPerawatan::all();

    // Ambil semua kendaraan yang sesuai dengan vehicle_name dari laporan perawatan
    $vehicleNames = $vehicles->pluck('vehicle_name');
    $kendaraan = Vehicle::whereIn('vehicle_name', $vehicleNames)->get();

    // Gabungkan data kendaraan dengan laporan perawatan menggunakan vehicle_name
    foreach ($vehicles as $d) {
        // Temukan kendaraan yang sesuai berdasarkan vehicle_name
        $d->kendaraan = $kendaraan->where('vehicle_name', $d->vehicle_name)->first();
    }

    // Kembalikan hasil ke view 'admin.laporan_perawatan'
    return view('admin.laporan_perawatan', compact('vehicles'));
}

public function cetak_todolist()
{
    // Melakukan join antara VerTodolist dan Vehicle berdasarkan kolom tugas dan vehicle_name
    $vehicle = VerTodolist::join('vehicles', 'ver_todolist.tugas', '=', 'vehicles.vehicle_name')
                          ->select('ver_todolist.*', 'vehicles.no_polisi', 'vehicles.user_peralatan', 'vehicles.vehicle_type')
                          ->orderBy('ver_todolist.tanggal', 'asc') // Mengurutkan berdasarkan tanggal secara ascending
                          ->get();

    

    // Kembalikan hasil ke view 'admin.cetak_todolist'
    return view('admin.cetak_todolist', compact('vehicle'));
}





    public function laporan_kesiapan(){
        // Mengambil data kendaraan berdasarkan kondisi
        $goodVehicles = Vehicle::where('vehicle_condition', 'Good Condition')->get();
        $maintenanceVehicles = Vehicle::where('vehicle_condition', 'Maintenance')->get();

        $vehicle = Vehicle::orderBy('vehicle_condition', 'asc')->get();
    
        // Menghitung total kendaraan berdasarkan kondisi
        $goodConditionCount = $goodVehicles->count();
        $maintenanceCount = $maintenanceVehicles->count();
    
        return view('admin.laporan_kesiapan', compact('vehicle','goodVehicles', 'maintenanceVehicles', 'goodConditionCount', 'maintenanceCount'));
    }

    public function laporan_oli(){
        // Menghitung tanggal 6 bulan yang lalu

        Carbon::setLocale('id');

        $sixMonthsAgo = Carbon::now()->subMonths(6);

        $veroli = VerOli::where('is_completed', '0');
        
        // Mengambil data kendaraan berdasarkan kondisi oli
        $goodVehicles = Vehicle::where('oli_keterangan', 'Oli Cukup')
                               ->where('tanggal_oli', '>=', $sixMonthsAgo)
                               ->get();
    
        $maintenanceVehicles = Vehicle::where('oli_keterangan', 'Oli Telat')
                                      ->orWhere('tanggal_oli', '<', $sixMonthsAgo)
                                      ->get();
        
        // Menghitung total kendaraan berdasarkan kondisi
        $goodConditionCount = $goodVehicles->count();
        $maintenanceCount = $maintenanceVehicles->count();
        $olicount = $veroli->count();
    
        return view('admin.laporan_oli', compact('goodVehicles', 'maintenanceVehicles', 'goodConditionCount', 'maintenanceCount','olicount'));
    }

    public function ba_oli() {
        // Mengurutkan berdasarkan nilai is_completed, 0 (belum selesai) akan muncul lebih dulu
        $vehicles = VerOli::orderBy('is_completed', 'asc')->get();
        return view('admin.ba_oli', compact('vehicles'));
    }

    public function update_ba_oli(Request $request, $id)
{
    // Langkah 1: Validasi semua input yang diharapkan dari form
    $validatedData = $request->validate([
        'kategori_oli'    => 'required|string',
        'jenis_oli'       => 'required|string',
        'volume_oli'      => 'required|numeric|min:0',
        'tanggal_oli'     => 'required|date',
        // Odometer hanya wajib diisi jika kategori olinya adalah "oli mesin"
        'odo_meter'       => 'required_if:kategori_oli,oli mesin|nullable|integer|min:0',
        'oli_selanjutnya' => 'required_if:kategori_oli,oli mesin|nullable|integer|min:0',
    ]);

    // Langkah 2: Cari data BA Oli yang akan diupdate
    $vehicle = VerOli::findOrFail($id);

    // Langkah 3: Update data menggunakan data yang sudah divalidasi
    // Metode update() lebih ringkas dan aman untuk mass assignment
    $vehicle->update($validatedData);

    // Langkah 4: Redirect dengan pesan sukses
    return redirect()->route('admin.ba_oli')->with('success', 'Data BA Oli berhasil diperbarui.');
}

public function delete_ba_oli($id)
    {
        $vehicle = VerOli::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('admin.ba_oli')->with('success', 'Data BA Oli berhasil dihapus.');
    }
    

    public function store_ver_oli(Request $request){
        
        VerOli::create([
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'kategori_oli' => $request->kategori_oli,
            'tanggal_oli' => $request->tanggal_oli,
            'odo_meter' => $request->odo_meter,
            'oli_selanjutnya' => $request->oli_selanjutnya,
            'jenis_oli' => $request->jenis_oli,
            'volume_oli' => $request->volume_oli,
            'is_completed' => '0',
        ]);

        return redirect()->route('admin.laporan_oli');
    }

    public function updateStatusPekerjaan(Request $request, $id) {
        $pekerjaan = Pekerjaana2b::findOrFail($id);
        $pekerjaan->update(['status' => $request->status]);
    
        return redirect()->back()->with('success', 'Status pekerjaan berhasil diperbarui!');
    }
    



    public function data_pekerjaan_a2b(){
        $datapekerjaana2b = Pekerjaana2b::all();
        return view ('admin.data_pekerjaan_a2b' ,compact('datapekerjaana2b'));
    }

    public function keuangan()
    {
        $keuangan = Keuangan::orderBy('created_at', 'desc')->get();
        $vehicle = Vehicle::all();
        $user = User::where('role', 'user')->get();

        // Calculate the sum of 'harga' (unit price total)
        $totalHargaSatuan = $keuangan->sum('harga');

        // *** CRITICAL: Calculate total expenditure (volume * price) ***
        $totalPengeluaran = $keuangan->sum(function($item) {
            // Ensure volume and harga are treated as numbers, default to 0 if null/invalid
            $volume = is_numeric($item->volume) ? (float)$item->volume : 0;
            $harga = is_numeric($item->harga) ? (float)$item->harga : 0;
            return $volume * $harga;
        });

        return view('admin.keuangan', compact(
            'keuangan',
            'vehicle',
            'user',
            'totalHargaSatuan',
            'totalPengeluaran' // *** Make sure this is passed ***
        ));
    }


    public function keuangan_user(){
        $keuangan = Keuangan::all();    
        $vehicles = Vehicle::all();
        return view ('user.keuangan' ,compact('keuangan' ,
        'vehicles',));
    }

    public function daftarSparepartUser()
{
    $spareparts = Sparepart::orderBy('nama_barang', 'asc')->get(); // Ambil semua sparepart, urutkan berdasarkan nama

    // Ambil nilai unik untuk filter, pastikan tidak ada nilai null/kosong
    $uniqueKondisi = $spareparts->pluck('kondisi')->filter()->unique()->sort();
    $uniqueLokasi = $spareparts->pluck('lokasi')->filter()->unique()->sort();
    $uniquePnp = $spareparts->pluck('pnp')->filter()->unique()->sort();
    $uniquePeralatan = $spareparts->pluck('peralatan')->filter()->unique()->sort(); // Tambahkan ini

    return view('user.sparepart', compact(
    'spareparts',
    'uniqueKondisi',
    'uniqueLokasi',
    'uniquePnp',
    'uniquePeralatan' // Tambahkan ini ke compact
));
}

    public function store_keuangan(Request $request)
    {
        // --- Server-side Validation ---
        $validator = Validator::make($request->all(), [
            'tanggal'     => 'required|date',
            'item_utama'  => 'required|string|max:255',
            'user'        => 'required|string|max:255',

            // Validation for multiple photo uploads (request still sends an array)
            'foto_nota'   => 'nullable|array', 
            'foto_nota.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Each item in array must be an image (max 2MB before server)

            'detail'      => 'required|array|min:1',
            'detail.*'    => 'required|string',
            'volume'      => 'required|array|min:1',
            'volume.*'    => 'required|numeric|min:0',
            'satuan'      => 'required|array|min:1',
            'satuan.*'    => 'required|string',
            'harga'       => 'required|array|min:1',
            'harga.*'     => 'required|numeric|min:0',
        ], [
            'detail.required'       => 'Minimal ada satu detail pengeluaran yang harus diisi.',
            'detail.*.required'     => 'Deskripsi pengeluaran pada item #:position wajib diisi.',
            'volume.*.required'     => 'Volume pada item #:position wajib diisi.',
            'volume.*.numeric'      => 'Volume pada item #:position harus berupa angka.',
            'satuan.*.required'     => 'Satuan pada item #:position wajib dipilih.',
            'harga.*.required'      => 'Harga pada item #:position wajib diisi.',
            'harga.*.numeric'       => 'Harga pada item #:position harus berupa angka.',
            'item_utama.required'   => 'Kategori pengeluaran utama wajib dipilih.',
            'foto_nota.*.image'     => 'Semua file nota harus berupa gambar.',
            'foto_nota.*.mimes'     => 'Format gambar nota harus jpeg, png, atau jpg.',
            'foto_nota.*.max'       => 'Ukuran setiap gambar nota maksimal 2MB (sebelum kompresi sisi klien).',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $savedFotoNotaNames = []; // Array to store names of successfully saved files

        // --- File Handling for Multiple Photos ---
        if ($request->hasFile('foto_nota')) {
            $files = $request->file('foto_nota');

            foreach ($files as $file) {
                if ($file->isValid()) {
                    $targetDirectory = public_path('foto_nota'); 
                    if (!File::isDirectory($targetDirectory)) {
                        File::makeDirectory($targetDirectory, 0775, true, true);
                    }

                    $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'nota-' . time() . '_' . Str::random(5) . '_' . Str::slug($originalName) . '.' . $extension;

                    try {
                        $file->move($targetDirectory, $filename);
                        $savedFotoNotaNames[] = $filename; 
                    } catch (\Exception $e) {
                        Log::error("Error moving file: " . $file->getClientOriginalName() . " - " . $e->getMessage());
                        foreach ($savedFotoNotaNames as $movedFile) { 
                            if (File::exists(public_path('foto_nota' . $movedFile))) {
                                File::delete(public_path('foto_nota' . $movedFile));
                            }
                        }
                        return back()->withInput()->with('error', 'Gagal memindahkan file nota: ' . $file->getClientOriginalName() . '. Error: ' . $e->getMessage());
                    }
                } else {
                     Log::warning('Invalid file uploaded for foto_nota: ' . $file->getClientOriginalName());
                }
            }
        }
        // --- End File Handling ---

        DB::beginTransaction();
        try {
            $details = $request->input('detail');
            $volumes = $request->input('volume');
            $satuans = $request->input('satuan');
            $hargas = $request->input('harga');

            // MODIFICATION: Convert array of photo names to a comma-separated string
            $fotoNotaString = !empty($savedFotoNotaNames) ? implode(',', $savedFotoNotaNames) : null;

            foreach ($details as $index => $detailItem) {
                Keuangan::create([
                    'tanggal'   => $request->input('tanggal'),
                    'item'      => $request->input('item_utama'),
                    'detail'    => $detailItem,
                    'volume'    => $volumes[$index],
                    'satuan'    => $satuans[$index],
                    'harga'     => $hargas[$index],
                    'foto_nota' => $fotoNotaString, // Save comma-separated string of filenames or null
                    'user'      => $request->input('user'),
                ]);
            }

            DB::commit();

            return redirect()->route('user.keuangan_user') // Or your user-specific route
                             ->with('success', 'Data pengeluaran berhasil ditambahkan.');

        } catch (\Exception $e) {
            DB::rollBack();
            // If DB transaction fails, delete any files that were uploaded in this request
            // $savedFotoNotaNames still holds the array of filenames here
            foreach ($savedFotoNotaNames as $movedFile) { 
                if (File::exists(public_path('foto_nota/' . $movedFile))) {
                    File::delete(public_path('foto_nota/' . $movedFile));
                }
            }
            Log::error("Error saving keuangan: " . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function destroy_keuangan($id) // Menerima ID sebagai parameter
    {
        try {
            $keuangan = Keuangan::findOrFail($id); // findOrFail will error if not found

            // Get the string of filenames BEFORE deleting the record
            $fotoNotaString = $keuangan->foto_nota;

            // Attempt to delete the database record
            $deleted = $keuangan->delete();

            if ($deleted) {
                // If the record was successfully deleted, proceed to delete associated files
                if (!empty($fotoNotaString)) {
                    $filenames = explode(',', $fotoNotaString); // Split the string into an array of filenames

                    foreach ($filenames as $filename) {
                        $filename = trim($filename); // Trim any whitespace
                        if (empty($filename)) {
                            continue; // Skip if the filename part is empty (e.g., due to "nota1.jpg,,nota2.jpg")
                        }

                        $filePath = public_path('foto_nota/' . $filename);

                        if (File::exists($filePath)) {
                            try {
                                File::delete($filePath);
                                Log::info("File nota dihapus: " . $filePath);
                            } catch (\Exception $e) {
                                // Log error if file deletion fails, but continue (record is already deleted)
                                Log::error("Gagal menghapus file nota ($filename): " . $e->getMessage());
                                // Optionally, you could collect these errors and flash a partial success message.
                                // For simplicity here, we just log it.
                            }
                        } else {
                            Log::warning("File nota tidak ditemukan untuk dihapus: " . $filePath);
                        }
                    }
                }

                // Ensure the redirect route name is correct for your application
                return redirect()->route('admin.keuangan') // Or 'admin.keuangan' if that's your route name
                                 ->with('success', 'Data pengeluaran berhasil dihapus.');
            } else {
                // This case might be rare if findOrFail succeeds and delete returns false,
                // but good to have for completeness.
                return back()->with('error', 'Gagal menghapus data pengeluaran dari database.');
            }

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Catch error if ID is not found
            return back()->with('error', 'Data pengeluaran tidak ditemukan.');
        } catch (\Exception $e) {
            // Catch other general errors
            Log::error("Error menghapus data keuangan (ID: $id): " . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus data pengeluaran: ' . $e->getMessage());
        }
    }

    public function update_item(Request $request, $id)
{
    // Cari data pekerjaan berdasarkan ID
    $keuangan = Keuangan::findOrFail($id);
    // Perbarui no_po
    $keuangan->item = $request->item;
    $keuangan->save();
    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.keuangan');
}

public function update_detail(Request $request, $id)
{
    // Cari data pekerjaan berdasarkan ID
    $keuangan = Keuangan::findOrFail($id);
    // Perbarui no_po
    $keuangan->detail = $request->detail;
    $keuangan->save();
    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.keuangan');
}

public function update_satuan_keuangan(Request $request, $id)
{
    // Cari data pekerjaan berdasarkan ID
    $keuangan = Keuangan::findOrFail($id);
    // Perbarui no_po
    $keuangan->satuan = $request->satuan;
    $keuangan->save();
    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.keuangan');
}

public function update_volume(Request $request, $id)
{
    // Cari data pekerjaan berdasarkan ID
    $keuangan = Keuangan::findOrFail($id);
    // Perbarui no_po
    $keuangan->volume = $request->volume;
    $keuangan->save();
    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.keuangan');
}

public function update_harga(Request $request, $id)
{
    // Cari data pekerjaan berdasarkan ID
    $keuangan = Keuangan::findOrFail($id);
    // Perbarui no_po
    $keuangan->harga = $request->harga;
    $keuangan->save();
    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.keuangan');
}

public function update_user_keuangan(Request $request, $id)
{
    // Cari data pekerjaan berdasarkan ID
    $keuangan = Keuangan::findOrFail($id);
    // Perbarui no_po
    $keuangan->user = $request->user;
    $keuangan->save();
    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.keuangan');
}

    public function sparepart(){
        $sparepart = Sparepart::all();
        $vehicles = Vehicle::all();
        $user = User::where('role', 'user')->get();
        return view ('admin.sparepart' ,compact('sparepart' , 
        'vehicles',
    'user'));
    }

    public function store_sparepart(Request $request){
        $sparepart = Sparepart::Create([
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'pnp' => $request->pnp,
            'plat_number' => $request->plat_number,
            'satuan' => $request->satuan,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
            'user' => $request->user,
            'peralatan' => $request->peralatan,
            'volume' => $request->volume,
        ]);

        return redirect()->route('admin.sparepart');
    }

    public function destroy_sparepart($id){
        $sparepart = Sparepart::findOrFail($id);

        $sparepart->delete();
        return redirect()->route('admin.sparepart');
    }

    public function update_sparepart(Request $request, $id){
       
        $sparepart = Sparepart::findOrFail($id);

        $sparepart->update([
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'pnp' => $request->pnp,
            'plat_number' => $request->plat_number,
            'volume' => $request->volume,
        ]);

        return redirect()->route('admin.sparepart');
    }

    public function update_peralatan(Request $request, $id)
{


    // Cari data pekerjaan berdasarkan ID
    $sparepart = Sparepart::findOrFail($id);

    // Perbarui no_po
    $sparepart->peralatan = $request->peralatan;
    $sparepart->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.sparepart');
}

public function update_lokasi(Request $request, $id)
{


    // Cari data pekerjaan berdasarkan ID
    $sparepart = Sparepart::findOrFail($id);

    // Perbarui no_po
    $sparepart->lokasi = $request->lokasi;
    $sparepart->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.sparepart');
}

public function update_satuan(Request $request, $id)
{


    // Cari data pekerjaan berdasarkan ID
    $sparepart = Sparepart::findOrFail($id);

    // Perbarui no_po
    $sparepart->satuan = $request->satuan;
    $sparepart->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.sparepart');
}

public function update_kondisi(Request $request, $id)
{


    // Cari data pekerjaan berdasarkan ID
    $sparepart = Sparepart::findOrFail($id);

    // Perbarui no_po
    $sparepart->kondisi = $request->kondisi;
    $sparepart->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.sparepart');
}

public function update_user(Request $request, $id)
{


    // Cari data pekerjaan berdasarkan ID
    $sparepart = Sparepart::findOrFail($id);

    // Perbarui no_po
    $sparepart->user = $request->user;
    $sparepart->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.sparepart');
}

    

    public function update_pekerjaan_a2b(Request $request, $id)
{

    // Cari data pekerjaan berdasarkan ID
    $pekerjaan = Pekerjaana2b::findOrFail($id);

    // Perbarui data pekerjaan
    $pekerjaan->update([
        'pekerjaan' => $request->pekerjaan,
        'nilai_pekerjaan' => $request->nilai_pekerjaan,
        'vendor' => $request->vendor,
        'glaccount' => $request->glaccount,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.data_pekerjaan_a2b')->with('success', 'Data pekerjaan berhasil diperbarui.');
}

public function update_po(Request $request, $id)
{


    // Cari data pekerjaan berdasarkan ID
    $pekerjaan = Pekerjaana2b::findOrFail($id);

    // Perbarui no_po
    $pekerjaan->no_po = $request->no_po;
    $pekerjaan->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Nomor PO berhasil diperbarui.');
}

public function update_bast(Request $request, $id)
{

    // Cari data pekerjaan berdasarkan ID
    $pekerjaan = Pekerjaana2b::findOrFail($id);

    // Perbarui no_po
    $pekerjaan->no_bast = $request->no_bast;
    $pekerjaan->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Nomor PO berhasil diperbarui.');
}




    public function store_pekerjaan_a2b(Request $request){
        Pekerjaana2b::create([
            'pekerjaan' => $request->pekerjaan,
            'nilai_pekerjaan' => $request->nilai_pekerjaan,
            'vendor' => $request->vendor,
            'glaccount' => $request->glaccount,
            'status' => 'Tidak ada',
        ]);
        return redirect()->route('admin.data_pekerjaan_a2b');
    }

    public function dashboard_admin()
    {
        // Mengambil data kendaraan berdasarkan kondisi
        $goodVehicles = Vehicle::where('vehicle_condition', 'Serviceable')->get();
        $maintenanceVehicles = Vehicle::where('vehicle_condition', 'Unserviceable')->get();

        $totalVehicles = Vehicle::count();  // Jumlah total kendaraan
    
        $pekerjaana2b = Pekerjaana2b::all ();

        $countServiceableVehicles = Vehicle::whereIn('vehicle_condition', ['Serviceable', 'Serviceable dengan catatan'])->count();
       $countUnserviceableVehicles = Vehicle::where('vehicle_condition', 'Unserviceable')->count();


       // Menghitung persentase kendaraan serviceable dan unserviceable
       $percentageServiceable = $totalVehicles ? ($countServiceableVehicles / $totalVehicles) * 100 : 0;
       $percentageUnserviceable = $totalVehicles ? ($countUnserviceableVehicles / $totalVehicles) * 100 : 0;
    
        // Mengambil data kendaraan berdasarkan tipe
        $vehicle_ppkpk = Vehicle::where('klasifikasi_kendaraan', 'PKPPK')
        ->orderBy('vehicle_condition', 'asc')
        ->get();
        $vehicle_operasional = Vehicle::where('klasifikasi_kendaraan', 'Operasional')
        ->orderBy('vehicle_condition', 'asc')
        ->get();
        $vehicle_alatberat = Vehicle::where('klasifikasi_kendaraan', 'Alat Alat Berat')
        ->orderBy('vehicle_condition', 'asc')
        ->get();
        $vehicle_motordinas = Vehicle::where('klasifikasi_kendaraan', 'Motor Dinas')
        ->orderBy('vehicle_condition', 'asc')
        ->get();
        $vehicle_crashcar = Vehicle::where('klasifikasi_kendaraan', 'Crash Car')
        ->orderBy('vehicle_condition', 'asc')
        ->get();
        $vehicle_peralatan = Vehicle::where('klasifikasi_kendaraan', 'Peralatan')
        ->orderBy('vehicle_condition', 'asc')
        ->get();
    
        // Menghitung total kendaraan berdasarkan kondisi
        $goodConditionCount = $goodVehicles->count();
        $maintenanceCount = $maintenanceVehicles->count();
    
        // Menghitung persentase kendaraan dengan kondisi "Serviceable"
        $percent_ppkpk = $vehicle_ppkpk->count() > 0 
        ? round(($vehicle_ppkpk->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_ppkpk->count()) * 100)
        : 0;
    
    $percent_operasional = $vehicle_operasional->count() > 0 
        ? round(($vehicle_operasional->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_operasional->count()) * 100) 
        : 0;
    
    $percent_alatberat = $vehicle_alatberat->count() > 0 
        ? round(($vehicle_alatberat->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_alatberat->count()) * 100) 
        : 0;
    
    $percent_crashcar = $vehicle_crashcar->count() > 0 
        ? round(($vehicle_crashcar->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_crashcar->count()) * 100) 
        : 0;
    
    $percent_motordinas = $vehicle_motordinas->count() > 0 
        ? round(($vehicle_motordinas->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_motordinas->count()) * 100) 
        : 0;
    
    $percent_peralatan = $vehicle_peralatan->count() > 0 
        ? round(($vehicle_peralatan->whereIn('vehicle_condition', ['Serviceable', 'Serviceable Dengan Catatan'])->count() / $vehicle_peralatan->count()) * 100) 
        : 0;
    


    
        // Mengambil semua kendaraan yang diurutkan berdasarkan kondisi
        $vehicle = FormVerKerusakan::where('is_completed', '0')->get();



         // Melakukan join antara VerTodolist dan Vehicle berdasarkan kolom tugas dan vehicle_name
         $currentMonth = Carbon::now()->month; // Mendapatkan bulan saat ini
         $currentYear = Carbon::now()->year; // Mendapatkan tahun saat ini
         
         $checklist = VerTodolist::join('vehicles', 'ver_todolist.tugas', '=', 'vehicles.vehicle_name')
             ->select('ver_todolist.*', 'vehicles.no_polisi', 'vehicles.user_peralatan', 'vehicles.vehicle_type')
             ->whereMonth('ver_todolist.tanggal', $currentMonth) // Filter bulan saat ini
             ->whereYear('ver_todolist.tanggal', $currentYear) // Filter tahun saat ini
             ->orderBy('ver_todolist.tanggal', 'asc') // Mengurutkan berdasarkan tanggal secara ascending
             ->get();


        $kategori = Vehicle::whereNotNull('vol_tangki') // Menyaring hanya kendaraan dengan nilai vol_tangki yang tidak null
             ->sum('vol_tangki');

             $kondisi_total = Vehicle::select('klasifikasi_kendaraan', 'vehicle_condition', DB::raw('count(*) as total'))
             ->groupBy('klasifikasi_kendaraan', 'vehicle_condition')
             ->get();

        $total_klasifikasi = Vehicle::select('klasifikasi_kendaraan', DB::raw('count(*) as total'))
             ->groupBy('klasifikasi_kendaraan')
             ->get();



    
        // Mengirim data ke view
        return view('admin.dashboard_admin', compact(
            'vehicle', 
            'goodVehicles', 
            'maintenanceVehicles', 
            'goodConditionCount', 
            'maintenanceCount', 
            'vehicle_ppkpk',
            'vehicle_alatberat', 
            'vehicle_operasional', 
            'vehicle_crashcar', 
            'vehicle_motordinas', 
            'vehicle_peralatan', 
            'percent_ppkpk', 
            'percent_operasional', 
            'percent_alatberat',
            'percent_crashcar',
            'percent_peralatan',
            'percent_motordinas',
            'checklist',
            'kategori',
            'total_klasifikasi',
            'kondisi_total',
            'countServiceableVehicles',
            'countUnserviceableVehicles',
            'percentageServiceable',
            'percentageUnserviceable',
            'pekerjaana2b',
        ));
    }
    

    public function pemeliharaan_kendaraan($barcodes)
    {
        // Temukan kendaraan berdasarkan barcode
        $vehicle = Vehicle::where('barcodes', $barcodes)->firstOrFail();
        $dinas = VerTodolist::where('tanggal' , today())->first();
        $todo = Vehicle::where('barcodes', $barcodes)->firstOrFail();
    
        // Kirimkan data kendaraan ke view
        return view('user.pemeliharaan_kendaraan', compact('vehicle','dinas'));
    }

    public function pemeliharaan_kendaraan_new($id)
    {

        $todo = VerTodolist::findOrFail($id);
        
        // Temukan kendaraan berdasarkan nama tugas yang diberikan
        $vehicle = Vehicle::where('vehicle_name', $todo->tugas)->firstOrFail();
    
        // Kirimkan data kendaraan ke view
        return view('user.pemeliharaan_kendaraan_new', compact('vehicle','todo'));
    }
    
    

    public function getOliSelanjutnya($name)
    {
        $vehicle = Vehicle::where('vehicle_name', $name)->first();
    
        if ($vehicle) {
            return response()->json(['oli_selanjutnya' => $vehicle->oli_selanjutnya]);
        }
    
        return response()->json(null); // Jika kendaraan tidak ditemukan
    }

    public function getVehicletype($name)
    {
        $vehicle = Vehicle::where('vehicle_name', $name)->first();
    
        if ($vehicle) {
            return response()->json(['vehicle_type' => $vehicle->vehicle_type]);
        }
    
        return response()->json(null); // Jika kendaraan tidak ditemukan
    }

    public function searchVehicles(Request $request)
    {
        $query = $request->input('query');
        $start_date = $request->input('start_date');

        $vehicles = LaporanPerawatan::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('vehicle_name', 'like', "%$query%")
                                 ->orWhere('user', 'like', "%$query%")
                                 ->orWhere('vehicle_type', 'like', "%$query%");
        })
        ->when($start_date, function ($queryBuilder) use ($start_date) {
            return $queryBuilder->whereDate('tanggal', '>=', $start_date);
        })
        ->get();

        return response()->json($vehicles);
    }

    public function searchKendaraan(Request $request)
    {
        $query = $request->input('query');
        $start_date = $request->input('start_date');
    
        $vehicles = FormKerusakan::query()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('vehicle_name', 'like', "%$query%")
                                     ->orwhere('no_ba', 'like', "%$query%")
                                     ->orwhere('vehicle_type', 'like', "%$query%")
                                     ->orWhere('user_kendaraan', 'like', "%$query%");
            })
            ->when($start_date, function ($queryBuilder) use ($start_date) {
                return $queryBuilder->whereDate('tanggal_kerusakan', '>=', $start_date);
            })
            ->get();
    
        return response()->json($vehicles);
    }

    public function searchPerbaikan(Request $request)
    {
        $query = $request->input('query');
        $start_date = $request->input('start_date');
    
        $vehicles = FormPerbaikan::query()
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('vehicle_name', 'like', "%$query%")
                                     ->orwhere('no_ba', 'like', "%$query%")
                                     ->orwhere('vehicle_type', 'like', "%$query%")
                                     ->orWhere('user_kendaraan', 'like', "%$query%");
            })
            ->when($start_date, function ($queryBuilder) use ($start_date) {
                return $queryBuilder->whereDate('tanggal_perbaikan', '>=', $start_date);
            })
            ->get();
    
        return response()->json($vehicles);
    }
    


    public function form_todolist()
    {
        // Set locale Carbon ke Indonesia
        Carbon::setLocale('id');

        // Ambil data pengguna (user) dan kendaraan (vehicles)
        $users = User::where('role', 'user')->orderBy('name')->get();
        $vehicles = Vehicle::orderBy('vehicle_name')->get();

        // Ambil semua data to-do list untuk ditampilkan di kalender
        // Anda bisa membatasi rentang tanggal jika datanya sangat banyak
        $todolist = VerTodolist::all(); // Ambil semua, atau filter sesuai kebutuhan

        // Format data todolist untuk FullCalendar
        $events = [];
        foreach ($todolist as $item) {
            // Tentukan warna berdasarkan status
            $color = $item->is_completed ? '#28a745' : '#ffc107'; // Hijau jika selesai, Kuning jika proses
            // Jika ingin merah untuk belum sama sekali, perlu logika/field tambahan
            // $color = '#dc3545'; // Merah jika belum

            $events[] = [
                'id'    => $item->id, // ID record VerTodolist
                'title' => $item->name . ' - ' . $item->tugas, // Judul event (PIC - Tugas)
                'start' => $item->tanggal, // Tanggal mulai (cukup tanggal)
                'color' => $color,
                'extendedProps' => [
                    'nama_dinas' => $item->nama_dinas,
                    'name'       => $item->name, // Nama PIC
                    'tugas'      => $item->tugas, // Nama tugas spesifik
                    'tanggal'    => $item->tanggal,
                    'is_completed' => $item->is_completed,
                ]
            ];
        }

        return view('admin.form_todolist', compact(
            'users',
            'vehicles',
            'events' // Kirim data event yang sudah diformat
        ));
    }
    

    public function form_kerusakan(){
        $vehicles = Vehicle::all();
        return view('admin.form_kerusakan' , compact('vehicles')) ;
    }

    public function form_perbaikan(){
        $vehicles = FormVerKerusakan::all();
        return view('admin.form_perbaikan' , compact('vehicles')) ;
    }

    public function laporan_kerusakan(){
        $vehicles = FormKerusakan::orderBy('no_ba', 'asc')->get();
        return view('admin.laporan_kerusakan' , compact('vehicles')) ;
    }

   public function laporan_dashboard()
{
    $path = public_path('cetak_dashboard');
    $files = File::glob($path . '/*.pdf');

    $pdfFiles = [];
    if ($files) {
        foreach ($files as $file) {
            // Sekarang kita simpan sebagai array yang lebih detail
            $pdfFiles[] = [
                'path'      => 'cetak_dashboard/' . basename($file),
                'timestamp' => File::lastModified($file) // Ambil timestamp file
            ];
        }
    }
    
    // Urutkan berdasarkan timestamp, dari yang terbaru ke terlama
    usort($pdfFiles, function($a, $b) {
        return $b['timestamp'] <=> $a['timestamp'];
    });

    return view('admin.laporan_dashboard', compact('pdfFiles'));
}

   // Method untuk menampilkan laporan log (sudah ada)
   public function laporan_log()
   {
       // Ambil log, urutkan agar grup konsisten
       $logs = FormLogbook::orderBy('tanggal', 'desc') // Urutkan tanggal terbaru dulu mungkin lebih baik
                          ->orderBy('name', 'asc')      // Lalu urutkan berdasarkan nama PIC
                          ->orderBy('created_at', 'asc') // Lalu berdasarkan waktu pembuatan
                          ->get();

       // Group berdasarkan tanggal dan nama PIC
       $groupedLogs = $logs->groupBy(function($log) {
           // Buat kunci grup yang aman, misal: YYYY-MM-DD_NamaPIC
           // Ganti spasi dan karakter non-alphanumeric di nama untuk ID modal yang valid
           $safeName = preg_replace('/[^A-Za-z0-9\-]/', '-', $log->name);
           return $log->tanggal . '_' . $safeName;
       });

       return view('admin.laporan_log', compact('groupedLogs'));
   }

   // Method untuk mengupdate log activity (dari modal edit)
   public function update_log(Request $request)
   {
       // Validasi dasar bahwa input 'logs' adalah array
       $request->validate([
           'logs' => 'required|array',
           'logs.*.id' => 'required|exists:form_logbook,id', // Pastikan ID log ada
           'logs.*.nama_dinas' => 'nullable|string|max:255',
           'logs.*.vehicle_name' => 'required|string|max:255',
           'logs.*.kegiatan' => 'required|string',
           'logs.*.checklist' => 'nullable|string',
           'logs.*.foto_kendaraan.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi file gambar
       ]);

       DB::beginTransaction(); // Mulai transaksi database

       try {
           foreach ($request->logs as $logId => $logData) {
               $log = FormLogbook::find($logId);
               if (!$log) {
                   // Seharusnya tidak terjadi karena validasi exists, tapi sebagai pengaman
                   continue;
               }

               // Handle File Upload (Append new photos)
               $existingPhotos = !empty($log->foto_kendaraan) ? array_map('trim', explode(',', $log->foto_kendaraan)) : [];
               $newPhotoPaths = [];

               if ($request->hasFile("logs.{$logId}.foto_kendaraan")) {
                   foreach ($request->file("logs.{$logId}.foto_kendaraan") as $file) {
                       // Buat nama file unik
                       $filename = Str::slug($logData['vehicle_name'] ?? 'log') . '-' . time() . '-' . Str::random(5) . '.' . $file->getClientOriginalExtension();
                       // Simpan file ke public/logbook
                       $path = $file->storeAs('logbook', $filename, 'public'); // Pastikan 'public' disk dikonfigurasi ke storage/app/public
                       if ($path) {
                            // Jika path hanya nama file, tambahkan prefix direktori jika perlu saat menyimpan
                            // Jika storeAs sudah mengembalikan path relatif dari public/, gunakan langsung
                           $newPhotoPaths[] = $filename; // Simpan nama file saja
                       }
                   }
               }

               // Gabungkan foto lama dan baru, hilangkan duplikat jika ada
               $allPhotos = array_unique(array_merge($existingPhotos, $newPhotoPaths));
               // Filter array untuk menghapus elemen kosong yang mungkin muncul
               $allPhotos = array_filter($allPhotos);

               // Update data log
               $log->update([
                   'nama_dinas' => $logData['nama_dinas'] ?? $log->nama_dinas, // Gunakan ?? untuk fallback ke nilai lama jika null
                   'vehicle_name' => $logData['vehicle_name'],
                   'kegiatan' => $logData['kegiatan'],
                   'checklist' => $logData['checklist'] ?? null, // Set null jika tidak ada atau kosong
                   'foto_kendaraan' => !empty($allPhotos) ? implode(',', $allPhotos) : null, // Simpan sebagai string comma-separated
               ]);
           }

           DB::commit(); // Konfirmasi transaksi jika semua berhasil
           return redirect()->route('admin.laporan_log')->with('success', 'Log activity berhasil diperbarui.');

       } catch (\Exception $e) {
           DB::rollback(); // Batalkan transaksi jika terjadi error
           Log::error('Error updating log activity: ' . $e->getMessage()); // Log error
           return redirect()->route('admin.laporan_log')->with('error', 'Terjadi kesalahan saat memperbarui log: ' . $e->getMessage());
       }
   }

   // Method untuk menghapus log activity spesifik (dari modal delete)
   public function delete_log(FormLogbook $formLogbook) // Menggunakan Route Model Binding
   {
       DB::beginTransaction();
       try {
           // Hapus foto terkait dari storage sebelum menghapus record DB
           if (!empty($formLogbook->foto_kendaraan)) {
               $photos = array_map('trim', explode(',', $formLogbook->foto_kendaraan));
               foreach ($photos as $photo) {
                   if ($photo) {
                       Storage::disk('public')->delete('logbook/' . $photo); // Pastikan path benar
                   }
               }
           }

           // Hapus record dari database
           $formLogbook->delete();

           DB::commit();
           return redirect()->route('admin.laporan_log')->with('success', 'Log activity (ID: ' . $formLogbook->id . ') berhasil dihapus.');

       } catch (\Exception $e) {
           DB::rollback();
           Log::error('Error deleting log activity: ' . $e->getMessage());
           return redirect()->route('admin.laporan_log')->with('error', 'Gagal menghapus log activity: ' . $e->getMessage());
       }
   }

   // Method untuk mencetak log (berdasarkan ID log pertama dalam grup)
  public function cetak_log($id)
    {
        // 1. Cari log pertama berdasarkan ID yang diberikan
        $firstLog = FormLogbook::findOrFail($id);

        // 2. Dapatkan tanggal dan nama PIC (Teknisi Pelaksana) dari log pertama
        $tanggalPencarian = $firstLog->tanggal;
        $namaPicPencarian = $firstLog->name;

        // 3. Ambil semua log dalam grup yang sama (berdasarkan tanggal dan nama PIC)
        $logsInGroup = FormLogbook::where('tanggal', $tanggalPencarian)
            ->where('name', $namaPicPencarian)
            ->orderBy('created_at', 'asc')
            ->get();

        // 4. Siapkan data umum untuk view (dari log pertama)
        $viewData = [];
        $viewData['tanggal'] = $firstLog->tanggal;
        $viewData['teknisiName'] = $firstLog->name;
        $viewData['dinasName'] = $firstLog->nama_dinas ?? 'N/A';

        // 5. Siapkan data untuk 'CHECK LIST' di header (Gabungan dari semua log di grup)
        $allChecklistStrings = [];
        foreach ($logsInGroup as $log) {
            if (!empty($log->checklist)) { // Pastikan ada string checklist
                $items = explode(',', $log->checklist);
                foreach ($items as $itemString) {
                    $trimmedItem = trim($itemString);
                    if (!empty($trimmedItem)) { // Pastikan item tidak kosong setelah trim
                        $allChecklistStrings[] = $trimmedItem;
                    }
                }
            }
        }
        // Ambil item checklist yang unik dan urutkan (opsional)
        $uniqueChecklistStrings = array_unique($allChecklistStrings);
        sort($uniqueChecklistStrings); // Mengurutkan checklist, bisa dihapus jika tidak perlu

        $headerChecklistItems = [];
        foreach ($uniqueChecklistStrings as $uniqueItem) {
            $headerChecklistItems[] = (object) ['checklist' => $uniqueItem];
        }
        $viewData['checklist'] = collect($headerChecklistItems);

        // 6. Filter logbook yang benar-benar memiliki kegiatan (untuk bagian detail kegiatan)
        $activeLogbooks = $logsInGroup->filter(function ($logbook) {
            if (empty($logbook->kegiatan)) {
                return false;
            }
            $kegiatanArray = array_filter(array_map('trim', explode(',', $logbook->kegiatan)));
            return count($kegiatanArray) > 0;
        })->values(); // ->values() untuk mereset key collection

        $viewData['logbooks'] = $activeLogbooks; // Kirim hanya logbook yang aktif ke view

        // 7. Generate PDF menggunakan DomPDF
        $pdf = PDF::loadView('admin.cetak_log_view', $viewData);

        // 8. Konfigurasi dan kembalikan PDF
        $namaFile = 'cetak_logbook_' . str_replace(' ', '_', $namaPicPencarian) . '_' . Carbon::parse($tanggalPencarian)->format('d-m-Y') . '.pdf';
        
        return $pdf->stream($namaFile);
    }
    
    

    public function laporan_perbaikan(){
        $vehicles = FormPerbaikan::orderBy('no_ba' , 'asc')->get();
        return view('admin.laporan_perbaikan' , compact('vehicles')) ;
    }

    public function store_ver_todolist(Request $request)
    {
        // Ambil semua tugas yang dipilih sebagai array
        $tugasArray = $request->input('tugas'); // Mengambil input dengan nama 'tugas[]'
        
        // Loop untuk menyimpan setiap tugas sebagai entri baru
        foreach ($tugasArray as $tugas) {
            VerTodolist::create([
                'nama_dinas' => $request->nama_dinas_selected, // Tetap sama untuk semua entri
                'name' => $request->name,                      // Tetap sama untuk semua entri
                'tanggal' => $request->tanggal,                // Tetap sama untuk semua entri
                'tugas' => $tugas,                             // Tugas dari array
            ]);
        }
    
        return redirect()->route('admin.form_todolist')->with('success', 'To Do List berhasil disimpan.');
    }
    
    

    public function store_form_kerusakan(Request $request)
    {
        // Menyimpan foto kerusakan jika ada
        $foto_kerusakan = [];

        if ($request->hasFile('foto_kerusakan')) {
            foreach ($request->file('foto_kerusakan') as $file) {
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('foto_kerusakan'), $namaFile);
                $foto_kerusakans[] = $namaFile; // Add each file name to the array
            }
        }

        
        $foto_kerusakan = implode(',', $foto_kerusakans);

    
        // Simpan data ke dalam tabel FormKerusakan
        FormKerusakan::create([
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_condition' => $request->vehicle_condition,
            'user_kendaraan' => $request->user_kendaraan,
            'tanggal_kerusakan' => $request->tanggal_kerusakan,
            'tanggal_prediksi' => $request->tanggal_prediksi,
            'bagian' => $request->bagian,
            'penyebab' => $request->penyebab,
            'klasifikasi' => $request->klasifikasi,
            'foto_kerusakan' => $foto_kerusakan,
        ]);

        FormVerKerusakan::create([
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_condition' => $request->vehicle_condition,
            'user_kendaraan' => $request->user_kendaraan,
            'tanggal_kerusakan' => $request->tanggal_kerusakan,
            'tanggal_prediksi' => $request->tanggal_prediksi,
            'bagian' => $request->bagian,
            'penyebab' => $request->penyebab,
            'tindakan' => $request->tindakan,
            'klasifikasi' => $request->klasifikasi,
            'tampil_cetak' => '1',
            'is_completed' => '0',
        ]);

        $vehicle = Vehicle::where('vehicle_name', $request->vehicle_name)->first();
        
        if ($vehicle) {
            $vehicle->update([
                'tampil_dashboard' => '1',
                'tampil_cetak' => '1',
                'vehicle_condition' => $request->vehicle_condition,
                'tanggal_prediksi' => $request->tanggal_prediksi,
                'tindakan' => $request->tindakan,
                'bagian' => $request->bagian,
            ]);
        }

        FormVerKerusakan::where('vehicle_name', $request->vehicle_name)
            ->update(['vehicle_condition' => $request->vehicle_condition]);

        
    
        // Redirect atau response setelah data berhasil disimpan
        return redirect()->route('admin.form_kerusakan')->with('success', 'Laporan kerusakan berhasil disimpan.');
    }


    public function store_form_perbaikan(Request $request)
    {
        // Validasi data yang diterima
   
    
        // Menyimpan foto perbaikan jika ada
        if ($request->hasFile('foto_perbaikan')) {
            foreach ($request->file('foto_perbaikan') as $file) {
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('foto_perbaikan'), $namaFile);
                $foto_perbaikans[] = $namaFile; // Add each file name to the array
            }
        }

        
        $foto_perbaikan = implode(',', $foto_perbaikans);
    
        // Simpan data ke dalam tabel FormPerbaikan
        FormPerbaikan::create([
            'no_ba' => $request->no_ba,
            'vehicle_name' => $request->vehicle_name,
            'vehicle_type' => $request->vehicle_type,
            'vehicle_condition' => 'Maintenance', // Set kondisi kendaraan ke 'Maintenance'
            'user_kendaraan' => $request->user_kendaraan,
            'tanggal_perbaikan' => $request->tanggal_perbaikan,
            'tanggal_kerusakan' => $request->tanggal_kerusakan,
            'bagian' => $request->bagian,
            'penyebab' => $request->penyebab,
            'tindakan' => $request->tindakan,
            'klasifikasi' => $request->klasifikasi,
            'detail_perbaikan' => $request->detail_perbaikan,
            'foto_perbaikan' => $foto_perbaikan,
        ]);
    
        // Update kondisi kendaraan di tabel Vehicle
        $vehicle = Vehicle::where('vehicle_name', $request->vehicle_name)->first();
        
        if ($vehicle) {
            $vehicle->update([
                'vehicle_condition' => 'Serviceable',
                'bagian' => 'Tidak Ada' // Set kondisi kendaraan ke 'Good Condition'
            ]);
        }
    
        // Cari data kerusakan berdasarkan no_ba
        $formKerusakan = FormVerKerusakan::where('no_ba', $request->no_ba)->first();
        
        // Hapus data kerusakan jika ditemukan
        if ($formKerusakan) {
            $formKerusakan->delete();
        }
    
        // Redirect atau response setelah data berhasil disimpan
        return redirect()->route('admin.form_kerusakan')->with('success', 'Laporan perbaikan berhasil disimpan.');
    }

//----------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------//

    public function cetak_laporan_perawatan_operasional($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai

        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
    
        $pdf = Pdf::loadView('admin.cetak_operasional', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_crashcar($id)
{
    // Ambil data laporan perawatan berdasarkan ID
    $vehicle = LaporanPerawatan::findOrFail($id);

    $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

    $user = User::where('name', $vehicle->user)->first();

    // Render tampilan menjadi PDF, mengirimkan data laporan perawatan dan kendaraan
    $pdf = Pdf::loadView('admin.cetak_crashcar', compact('vehicle', 'kendaraan','user'));

    // Stream PDF ke browser
    return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
}

    public function cetak_laporan_perawatan_runwaysweeper($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai

        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
    
        $pdf = Pdf::loadView('admin.cetak_runwaysweeper', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_rubberdeposit($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
        $pdf = Pdf::loadView('admin.cetak_rubberdeposit', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_tractorrubber($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai

        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
    
        $pdf = Pdf::loadView('admin.cetak_tractorrubber', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_mumeter($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
        $pdf = Pdf::loadView('admin.cetak_mumeter', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_tractormower($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
        $pdf = Pdf::loadView('admin.cetak_tractormower', compact('vehicle','kendaraan','user'));


        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_kompresordinamis($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();    
        $pdf = Pdf::loadView('admin.cetak_kompresordinamis', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_kompresorstatis($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
    
        $pdf = Pdf::loadView('admin.cetak_kompresorstatis', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_genset($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
    
        $pdf = Pdf::loadView('admin.cetak_genset', compact('vehicle','kendaraan','user'));


        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_asphaltcutter($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
    
        $pdf = Pdf::loadView('admin.cetak_asphaltcutter', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_forklift($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
        $pdf = Pdf::loadView('admin.cetak_forklift', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    public function cetak_laporan_perawatan_vibroroller($id)
    {
        // Ambil data laporan perawatan berdasarkan ID
        $vehicle = LaporanPerawatan::findOrFail($id); // Ganti dengan model yang sesuai
        $kendaraan = Vehicle::where('vehicle_name', $vehicle->vehicle_name)->first();

        $user = User::where('name', $vehicle->user)->first();
        $pdf = Pdf::loadView('admin.cetak_vibroroller', compact('vehicle','kendaraan','user'));

        // Stream PDF ke browser
        return $pdf->stream("CHECKLIST_{$vehicle->vehicle_name}_" . Carbon::parse($vehicle->tanggal)->locale('id')->translatedFormat('d F Y') . ".pdf");
    }

    

//----------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------//
//----------------------------------------------------------------------------------------//


public function cetak_kerusakan($id)
{
    // Ambil data berdasarkan ID
    $kerusakan = FormKerusakan::findOrFail($id);

    // Ganti karakter '/' dalam nama file PDF dengan karakter yang aman
    $filename = 'cetak_kerusakan_' . str_replace('/', '_', $kerusakan->no_ba) . '.pdf';

    // Membuat PDF
    $pdf = Pdf::loadView('admin.cetak_kerusakan', compact('kerusakan'));

    // Men-download atau menampilkan PDF
    return $pdf->stream($filename);
}



public function cetak_perbaikan($id)
{
    // Ambil data berdasarkan ID
    $perbaikan = FormPerbaikan::findOrFail($id);

    // Ganti karakter '/' dalam nama file PDF dengan karakter yang aman
    $filename = 'cetak_perbaikan_' . str_replace('/', '_', $perbaikan->no_ba) . '.pdf';

    // Menggunakan view untuk generate PDF
    $pdf = Pdf::loadView('admin.cetak_perbaikan', compact('perbaikan'));

    // Men-download PDF
    return $pdf->stream($filename);
}


public function cetak_oli($id)
{
    // Ambil data berdasarkan ID
    $oli = VerOli::findOrFail($id);

    $vehicle = Vehicle::where('vehicle_name' , $oli->vehicle_name)->first();
    // Ganti karakter '/' dalam nama file PDF dengan karakter yang aman
    $filename = 'cetak_perbaikan_' . str_replace('/', '_', $oli->no_ba) . '.pdf';

    // Menggunakan view untuk generate PDF
    $pdf = Pdf::loadView('admin.cetak_oli', compact('oli','vehicle'));

    // Men-download PDF
    return $pdf->stream($filename);
}


public function cetak_release($id)
{
    // Ambil data berdasarkan ID
    $perbaikan = FormPerbaikan::findOrFail($id);

    // Ganti karakter '/' dalam nama file PDF dengan karakter yang aman
    $filename = 'cetak_perbaikan_' . str_replace('/', '_', $perbaikan->no_ba) . '.pdf';

    // Menggunakan view untuk generate PDF
    $pdf = Pdf::loadView('admin.cetak_release', compact('perbaikan'));

    // Men-download PDF
    return $pdf->stream($filename);
}




public function cetak_logbook($nama, $tanggal)
{
    // Ambil data checklist berdasarkan nama dan tanggal
    $checklist = FormLogbook::where('name', $nama)
        ->whereDate('created_at', $tanggal)
        ->whereNotNull('checklist')
        ->get();

    // Ambil data logbook berdasarkan nama dan tanggal
    $logbooks = FormLogbook::where('name', $nama)
        ->whereDate('tanggal', $tanggal)
        ->whereNotNull('kegiatan', )
        ->get();

    // Ambil nama dinas dari tabel ver_todolist berdasarkan nama dan tanggal
    $todolist = FormLogbook::where('name', $nama)
        ->whereDate('tanggal', $tanggal)
        ->first();

    // Nama default untuk dinas dan teknisi
    $dinasName = 'Nama Dinas'; // Nilai default jika tidak ada entri
    $teknisiName = auth()->user()->name; // Nama teknisi dari user yang login

    // Cek jika ada entri pada tabel ver_todolist
    if ($todolist) {
        $dinasName = $todolist->nama_dinas;
    } else {
        // Cek entri lain dengan tanggal yang sama untuk mendapatkan nama dinas
        $todolistByDate = VerTodolist::whereDate('tanggal', $tanggal)->first();
        if ($todolistByDate) {
            $dinasName = $todolistByDate->nama_dinas;
        }
    }

    // Generate PDF
    $pdf = Pdf::loadView('user.cetak_logbook', compact('logbooks', 'teknisiName', 'dinasName', 'tanggal', 'checklist'));

    // Menampilkan PDF sebagai stream
    return $pdf->stream('cetak_logbook_' . $nama . '_' . $tanggal . '.pdf');
}


    
    
    
    
    

    
}
