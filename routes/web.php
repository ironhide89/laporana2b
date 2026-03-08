<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat Anda dapat mendaftarkan rute web untuk aplikasi Anda. 
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan 
| diberikan ke grup middleware "web". Buatlah sesuatu yang hebat!
|
*/
//-----------------------------------------------------------------------------------------------------------//
//--------------------------------------- GLOBAL AKSES ------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/log-out',[LoginController::class,'logout'])->name('logout');
Route::get('/get-oli-selanjutnya/{name}', [HomeController::class, 'getOliSelanjutnya']);
Route::get('/vehicle-type/{name}', [HomeController::class, 'getVehicletype']);
Route::get('/search-vehicles', [HomeController::class, 'searchVehicles'])->name('search.vehicles');
Route::get('/search-kendaraan', [HomeController::class, 'searchKendaraan'])->name('search.kendaraan');
Route::get('/search-perbaikan', [HomeController::class, 'searchPerbaikan'])->name('search.perbaikan');

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('/leaderboard', [LoginController::class, 'leaderboard'])->name('leaderboard');
Route::get('/kendaraan', [LoginController::class, 'kendaraan'])->name('kendaraan');
Route::get('/qr-code', [LoginController::class, 'qr_code'])->name('qr_code');


Route::get('/spek-kendaraan/{barcodes}', [HomeController::class, 'spek_kendaraan'])->name('spek_kendaraan');




//-----------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//



//-----------------------------------------------------------------------------------------------------------//
//---------------------------------------------ADMIN AKSES---------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'checkRole:admin'], 'as' => 'admin.'], function(){

    Route::get('/dashboard-admin',[HomeController::class,'dashboard_admin'])->name('dashboard_admin');
    Route::get('/cetak-dashboard',[HomeController::class,'cetak_dashboard'])->name('cetak_dashboard');
    Route::get('/download', [HomeController::class,'download'])->name('download');
    Route::post('/dashboard/upload-pdf', [HomeController::class, 'uploadPdf'])->name('dashboard.uploadPdf');

//--------------------------------------- DATA USER ------------------------------------------------------//
   
    Route::get('/user',[HomeController::class,'index'])->name('index');
    Route::get('/create',[HomeController::class,'create'])->name('create');
    Route::post('/store',[HomeController::class,'store'])->name('store');
    Route::delete('/user/{id}', [HomeController::class, 'destroy'])->name('destroy');
    Route::put('/user/{id}', [HomeController::class, 'update'])->name('update');
   
//--------------------------------------------------------------------------------------------------------//

//--------------------------------------- Keuangan  ------------------------------------------------------//
Route::get('/keuangan',[HomeController::class,'keuangan'])->name('keuangan');
Route::put('/update-item/{id}',[HomeController::class,'update_item'])->name('update_item');
Route::put('/update-detail/{id}',[HomeController::class,'update_detail'])->name('update_detail');
Route::put('/update-satuan-keuangan/{id}',[HomeController::class,'update_satuan_keuangan'])->name('update_satuan_keuangan');
Route::put('/update-volume/{id}',[HomeController::class,'update_volume'])->name('update_volume');
Route::put('/update-harga/{id}',[HomeController::class,'update_harga'])->name('update_harga');
Route::put('/update-user-keuangan/{id}',[HomeController::class,'update_user_keuangan'])->name('update_user_keuangan');
Route::delete('/destroy-keuangan/{id}',[HomeController::class,'destroy_keuangan'])->name('destroy_keuangan');




//--------------------------------------- Sparepart  ------------------------------------------------------//
Route::get('/sparepart',[HomeController::class,'sparepart'])->name('sparepart');
Route::post('/store-sparepart',[HomeController::class,'store_sparepart'])->name('store_sparepart');
Route::put('/update-sparepart/{id}',[HomeController::class,'update_sparepart'])->name('update_sparepart');
Route::delete('/destroy-sparepart/{id}', [HomeController::class, 'destroy_sparepart'])->name('destroy_sparepart');
Route::put('/update-peralatan/{id}',[HomeController::class,'update_peralatan'])->name('update_peralatan');
Route::put('/update-lokasi/{id}',[HomeController::class,'update_lokasi'])->name('update_lokasi');
Route::put('/update-satuan/{id}',[HomeController::class,'update_satuan'])->name('update_satuan');
Route::put('/update-kondisi/{id}',[HomeController::class,'update_kondisi'])->name('update_kondisi');
Route::put('/update-user/{id}',[HomeController::class,'update_user'])->name('update_user');


//--------------------------------------- DATA KENDARAAN ------------------------------------------------------//

    Route::get('/data-kendaraan',[HomeController::class,'data_kendaraan'])->name('datakendaraan');
    Route::post('/store-kendaraan',[HomeController::class,'store_kendaraan'])->name('store_kendaraan');
    Route::delete('/data-kendaraan/{id}', [HomeController::class, 'destroy_kendaraan'])->name('destroy_kendaraan');
    Route::put('/data-kendaraan/{id}', [HomeController::class, 'update_kendaraan'])->name('update_kendaraan');

//------------------------------------------------------------------------------------------------------------//


//-----------------------------------------DATA PEKERJAAN A2B -----------------------------------------------------//

    Route::post('/store-pekerjaan-a2b',[HomeController::class,'store_pekerjaan_a2b'])->name('store_pekerjaan_a2b');
    Route::put('/update-status-pekerjaan/{id}', [HomeController::class, 'updateStatusPekerjaan'])->name('update_status_pekerjaan');
    Route::get('/data-pekerjaan-a2b',[HomeController::class,'data_pekerjaan_a2b'])->name('data_pekerjaan_a2b');
    Route::put('/update-pekerjaan-a2b/{id}', [HomeController::class, 'update_pekerjaan_a2b'])->name('update_pekerjaan_a2b');
    Route::post('/update-po/{id}', [HomeController::class, 'update_po'])->name('update_po');
    Route::post('/update-bast/{id}', [HomeController::class, 'update_bast'])->name('update_bast');
    Route::delete('/destroy-pekerjaana2b/{id}', [HomeController::class, 'destroy_pekerjaana2b'])->name('destroy_pekerjaana2b');

//----------------------------------------------------------------------------------------------------------------//

    
//--------------------------------------- LAPORAN KERUSAKAN ------------------------------------------------------//

    Route::get('/form-kerusakan',[HomeController::class,'form_kerusakan'])->name('form_kerusakan');
    Route::get('/laporan-kerusakan',[HomeController::class,'laporan_kerusakan'])->name('laporan_kerusakan');
    Route::post('/store-form-kerusakan',[HomeController::class,'store_form_kerusakan'])->name('store_form_kerusakan');
    Route::get('/cetak-kerusakan/{id}',[HomeController::class,'cetak_kerusakan'])->name('cetak_kerusakan');
    Route::put('/update-kerusakan/{id}', [HomeController::class, 'update_kerusakan'])->name('update_kerusakan');
    Route::put('/update-tampil/{id}', [HomeController::class, 'update_tampil'])->name('update_tampil');
    Route::put('/update-hilang/{id}', [HomeController::class, 'update_hilang'])->name('update_hilang');
    Route::delete('/delete-kerusakan/{id}', [HomeController::class, 'delete_kerusakan'])->name('delete_kerusakan');

//---------------------------------------------------------------------------------------------------------------//

//--------------------------------------- LAPORAN LOG ------------------------------------------------------//
    
Route::get('/laporan-log', [HomeController::class, 'laporan_log'])->name('laporan_log');
Route::put('/laporan-log/update', [HomeController::class, 'update_log'])->name('update_log'); // Ganti route PUT agar lebih spesifik
Route::delete('/laporan-log/delete/{formLogbook}', [HomeController::class, 'delete_log'])->name('delete_log'); // Parameter {formLogbook}
Route::get('/cetak-log/{id}', [HomeController::class, 'cetak_log'])->name('cetak_log');



//---------------------------------------------------------------------------------------------------------------//


Route::get('/laporan-dashboard', [HomeController::class, 'laporan_dashboard'])->name('laporan_dashboard');


//--------------------------------------- LAPORAN PERBAIKAN ------------------------------------------------------//

    Route::get('/form-perbaikan',[HomeController::class,'form_perbaikan'])->name('form_perbaikan');
    Route::get('/laporan-perbaikan',[HomeController::class,'laporan_perbaikan'])->name('laporan_perbaikan');
    Route::put('/update-perbaikan/{id}', [HomeController::class, 'update_perbaikan'])->name('update_perbaikan');
    Route::delete('/delete-perbaikan/{id}', [HomeController::class, 'delete_perbaikan'])->name('delete_perbaikan');
    Route::post('/store-form-perbaikan',[HomeController::class,'store_form_perbaikan'])->name('store_form_perbaikan');
    Route::get('/cetak-perbaikan/{id}',[HomeController::class,'cetak_perbaikan'])->name('cetak_perbaikan');
    Route::get('/cetak-release/{id}',[HomeController::class,'cetak_release'])->name('cetak_release');

//--------------------------------------------------------------------------------------------------------------//


//--------------------------------------- TODOLIST--------------------------------------------------------------//

    Route::get('/form-todolist',[HomeController::class,'form_todolist'])->name('form_todolist');
    Route::get('/laporan-todolist',[HomeController::class,'laporan_todolist'])->name('laporan_todolist');
    Route::post('/store-ver-todolist',[HomeController::class,'store_ver_todolist'])->name('store_ver_todolist');
    Route::put('/update-edit-todolist/{id}', [HomeController::class, 'update_edit_todolist'])->name('update_edit_todolist');
    Route::delete('/delete-todolist/{id}', [HomeController::class, 'delete_todolist'])->name('delete_todolist');
    Route::get('/cetak-todolist',[HomeController::class,'cetak_todolist'])->name('cetak_todolist');

//-------------------------------------------------------------------------------------------------------------//

//------------------------------------------ LAPORAN PERAWATAN & KESIAPAN -------------------------------------------------------------//
   
    Route::get('/laporan-perawatan',[HomeController::class,'laporan_perawatan'])->name('laporan_perawatan');
    Route::get('/laporan-kesiapan',[HomeController::class,'laporan_kesiapan'])->name('laporan_kesiapan');
    
//-------------------------------------------------------------------------------------------------------------//

//----------------------------------------------- LAPORAN OLI ----------------------------------------------------------//
   
    Route::get('/laporan-oli',[HomeController::class,'laporan_oli'])->name('laporan_oli');
    Route::put('/store-ver-oli',[HomeController::class,'store_ver_oli'])->name('store_ver_oli');

//-----------------------------------------------------------------------------------------------------------------------------------//

//---------------------------------------- LAPORAN BA OLI -------------------------------------------------------------------------//
   
    Route::get('/ba-oli',[HomeController::class,'ba_oli'])->name('ba_oli');
    Route::get('/cetak-oli/{id}',[HomeController::class,'cetak_oli'])->name('cetak_oli');
    Route::put('/update-ba-oli/{id}', [HomeController::class, 'update_ba_oli'])->name('update_ba_oli');
    Route::delete('/delete-ba-oli/{id}', [HomeController::class, 'delete_ba_oli'])->name('delete_ba_oli');

//-----------------------------------------------------------------------------------------------------------------------------------//

    Route::put('/update-condition/{id}', [HomeController::class, 'update_condition'])->name('update_condition');
    
    Route::get('/cetak/laporan-perawatan-operasional{id}',[HomeController::class,'cetak_laporan_perawatan_operasional'])->name('cetak_laporan_perawatan_operasional');
    Route::get('/cetak/laporan-perawatan-crashcar{id}',[HomeController::class,'cetak_laporan_perawatan_crashcar'])->name('cetak_laporan_perawatan_crashcar');
    Route::get('/cetak/laporan-perawatan-runwaysweeper{id}',[HomeController::class,'cetak_laporan_perawatan_runwaysweeper'])->name('cetak_laporan_perawatan_runwaysweeper');
    Route::get('/cetak/laporan-perawatan-rubberdeposit{id}',[HomeController::class,'cetak_laporan_perawatan_rubberdeposit'])->name('cetak_laporan_perawatan_rubberdeposit');
    Route::get('/cetak/laporan-perawatan-tractorrubber{id}',[HomeController::class,'cetak_laporan_perawatan_tractorrubber'])->name('cetak_laporan_perawatan_tractorrubber');
    Route::get('/cetak/laporan-perawatan-mumeter{id}',[HomeController::class,'cetak_laporan_perawatan_mumeter'])->name('cetak_laporan_perawatan_mumeter');
    Route::get('/cetak/laporan-perawatan-tractormower{id}',[HomeController::class,'cetak_laporan_perawatan_tractormower'])->name('cetak_laporan_perawatan_tractormower');
    Route::get('/cetak/laporan-perawatan-kompresordinamis{id}',[HomeController::class,'cetak_laporan_perawatan_kompresordinamis'])->name('cetak_laporan_perawatan_kompresordinamis');
    Route::get('/cetak/laporan-perawatan-kompresorstatis{id}',[HomeController::class,'cetak_laporan_perawatan_kompresorstatis'])->name('cetak_laporan_perawatan_kompresorstatis');
    Route::get('/cetak/laporan-perawatan-genset{id}',[HomeController::class,'cetak_laporan_perawatan_genset'])->name('cetak_laporan_perawatan_genset');
    Route::get('/cetak/laporan-perawatan-asphaltcutter{id}',[HomeController::class,'cetak_laporan_perawatan_asphaltcutter'])->name('cetak_laporan_perawatan_asphaltcutter');
    Route::get('/cetak/laporan-perawatan-forklift{id}',[HomeController::class,'cetak_laporan_perawatan_forklift'])->name('cetak_laporan_perawatan_forklift');
    Route::get('/cetak/laporan-perawatan-vibroroller{id}',[HomeController::class,'cetak_laporan_perawatan_vibroroller'])->name('cetak_laporan_perawatan_vibroroller');

    
});



//-----------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//


//-----------------------------------------------------------------------------------------------------------//
//----------------------------------------  USER AKSES ------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//



Route::group(['prefix' => 'user', 'middleware' => ['auth', 'checkRole'], 'as' => 'user.'], function(){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
    Route::get('/todolist',[HomeController::class,'todolist'])->name('todolist');
    Route::post('/store-pemeliharaan',[HomeController::class,'store_pemeliharaan'])->name('store_pemeliharaan');
    Route::post('/store-pemeliharaan_new',[HomeController::class,'store_pemeliharaan_new'])->name('store_pemeliharaan_new');
    Route::post('/handleQRCode', [HomeController::class, 'handleQRCode'])->name('handleQRCode');
    Route::get('/admin/data-kendaraan/{vehicle_name}', [HomeController::class, 'show'])->name('vehicle.detail');
    Route::get('/scan-kerusakan',[HomeController::class,'scan_kerusakan'])->name('scan_kerusakan');

    Route::get('/done-submit/{id}',[HomeController::class,'done_submit'])->name('done_submit');

    Route::post('/todo/update-status/{id}', [HomeController::class, 'updateStatus'])->name('todo.update.status');

    Route::get('/pemeliharaan-kendaraan/{barcodes}', [HomeController::class, 'pemeliharaan_kendaraan'])->name('pemeliharaan_kendaraan');
    Route::get('/pemeliharaan-kendaraan-new/{id}', [HomeController::class, 'pemeliharaan_kendaraan_new'])->name('pemeliharaan_kendaraan_new');
    Route::get('/form-kerusakan-user/{barcodes}', [HomeController::class, 'form_kerusakan_user'])->name('form_kerusakan_user');

    Route::get('/form-logbook/{id}',[HomeController::class,'form_logbook'])->name('form_logbook');
    Route::post('/store-logbook',[HomeController::class,'store_logbook'])->name('store_logbook');

    Route::get('/form-logbooknew',[HomeController::class,'form_logbooknew'])->name('form_logbooknew');
    Route::post('/store-logbooknew',[HomeController::class,'store_logbooknew'])->name('store_logbooknew');



    Route::get('/form-oli/{id}',[HomeController::class,'form_oli'])->name('form_oli');    
    Route::post('/store-form-oli',[HomeController::class,'store_form_oli'])->name('store_form_oli');


    Route::get('/cetak-laporan',[HomeController::class,'cetak_laporan'])->name('cetak_laporan');

    Route::get('/cetak/cetak-logbook/{nama}/{tanggal}', [HomeController::class, 'cetak_logbook'])->name('cetak_logbook');
    Route::get('/cetak/laporan-perawatan-crashcar{id}',[HomeController::class,'cetak_laporan_perawatan_crashcar'])->name('cetak_laporan_perawatan_crashcar');

    Route::get('/keuangan-user', [HomeController::class, 'keuangan_user'])->name('keuangan_user');
    Route::get('/sparepart-user', [HomeController::class, 'daftarSparepartUser'])->name('daftarSparepartUser');

    Route::post('/store-keuangan', [HomeController::class, 'store_keuangan'])->name('store_keuangan');



//-----------------------------------------------------------------------------------------------------------------------------------//
//-------------------------------------------- FUNGSI CETAK LAPORAN PERAWATAN -------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------------------------------//
    Route::get('/cetak/laporan-perawatan-operasional{id}',[HomeController::class,'cetak_laporan_perawatan_operasional'])->name('cetak_laporan_perawatan_operasional');
    Route::get('/cetak/laporan-perawatan-crashcar{id}',[HomeController::class,'cetak_laporan_perawatan_crashcar'])->name('cetak_laporan_perawatan_crashcar');
    Route::get('/cetak/laporan-perawatan-runwaysweeper{id}',[HomeController::class,'cetak_laporan_perawatan_runwaysweeper'])->name('cetak_laporan_perawatan_runwaysweeper');
    Route::get('/cetak/laporan-perawatan-rubberdeposit{id}',[HomeController::class,'cetak_laporan_perawatan_rubberdeposit'])->name('cetak_laporan_perawatan_rubberdeposit');
    Route::get('/cetak/laporan-perawatan-tractorrubber{id}',[HomeController::class,'cetak_laporan_perawatan_tractorrubber'])->name('cetak_laporan_perawatan_tractorrubber');
    Route::get('/cetak/laporan-perawatan-mumeter{id}',[HomeController::class,'cetak_laporan_perawatan_mumeter'])->name('cetak_laporan_perawatan_mumeter');
    Route::get('/cetak/laporan-perawatan-tractormower{id}',[HomeController::class,'cetak_laporan_perawatan_tractormower'])->name('cetak_laporan_perawatan_tractormower');
    Route::get('/cetak/laporan-perawatan-kompresordinamis{id}',[HomeController::class,'cetak_laporan_perawatan_kompresordinamis'])->name('cetak_laporan_perawatan_kompresordinamis');
    Route::get('/cetak/laporan-perawatan-kompresorstatis{id}',[HomeController::class,'cetak_laporan_perawatan_kompresorstatis'])->name('cetak_laporan_perawatan_kompresorstatis');
    Route::get('/cetak/laporan-perawatan-genset{id}',[HomeController::class,'cetak_laporan_perawatan_genset'])->name('cetak_laporan_perawatan_genset');
    Route::get('/cetak/laporan-perawatan-asphaltcutter{id}',[HomeController::class,'cetak_laporan_perawatan_asphaltcutter'])->name('cetak_laporan_perawatan_asphaltcutter');
    Route::get('/cetak/laporan-perawatan-forklift{id}',[HomeController::class,'cetak_laporan_perawatan_forklift'])->name('cetak_laporan_perawatan_forklift');
    Route::get('/cetak/laporan-perawatan-vibroroller{id}',[HomeController::class,'cetak_laporan_perawatan_vibroroller'])->name('cetak_laporan_perawatan_vibroroller');
});

//-----------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//
//-----------------------------------------------------------------------------------------------------------//






