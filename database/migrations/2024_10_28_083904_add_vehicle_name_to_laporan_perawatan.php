<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('laporan_perawatan', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_name');
            $table->string('vehicle_type');
            $table->string('vehicle_condition');
            $table->datetime('tanggal'); 
            $table->string('user');
            $table->string('odometer');
            $table->string('v_aki');
            $table->string('oli_selanjutnya');
            $table->string('oli_kurang');
            $table->string('oli_lebih');
            $table->enum('body_kendaraan', ['Baik', 'Tidak Baik', 'Baik Dengan Catatan','-']);
            $table->enum('kebersihan_kendaraan', ['Kendaraan bersih', 'Kendaraan kotor','-']);
            $table->enum('cek_air_accu', ['Batas Normal', 'Dibawah Batas Normal', 'Dilakukan Penambahan','-']);
            $table->enum('oli_mesin', ['Batas Normal', 'Dibawah Batas Normal', 'Dilakukan Penambahan','-']);
            $table->enum('oli_transmisi', ['Batas Normal', 'Dibawah Batas Normal', 'Dilakukan Penambahan','-']);
            $table->enum('minyak_power_steering', ['Batas Normal', 'Dibawah Batas Normal', 'Dilakukan Penambahan', 'Tidak ada Power Steering','-']);
            $table->enum('minyak_rem', ['Batas Normal', 'Dibawah Batas Normal', 'Dilakukan Penambahan','-']);
            $table->enum('vbelt_engine', ['Kondisi Baik', 'Perlu Penggantian','-']);
            $table->enum('filter_udara', ['Kondisi Baik', 'Kondisi Kotor', 'Perlu Penggantian','-']);
            $table->enum('filter_bahan_bakar', ['Kondisi Baik', 'Kondisi Kotor', 'Perlu Penggantian','-']);
            $table->enum('filter_oli', ['Kondisi Baik', 'Kondisi Kotor', 'Perlu Penggantian','-']);
            $table->enum('air_radiator_reservoir', ['Batas Normal', 'Dibawah Batas Normal','-']);
            $table->enum('reservoir_wiper', ['Batas Normal', 'Dibawah Batas Normal','-']);
            $table->enum('kaca_film', ['Baik', 'Rusak','-']);
            $table->enum('apar', ['Ada', 'Tidak Ada','-']);
            $table->enum('starter_engine', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('kondisi_engine', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('kondisi_turbo', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Ada Turbo', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('sistem_pendingin', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('timing_belt', ['Normal', 'Upnormal', 'Rusak', 'Perlu Penggantian (KM Lebih Dari 150RB)', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('transmisi', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('pedal_gas', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('rem_kaki', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('rem_tangan', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('kopling', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('power_steering', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Ada Power Steering', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('kaki_kaki', ['Normal', 'Upnormal', 'Rusak', 'Normal Dengan Catatan', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('kondisi_karet_wiper', ['Baik', 'Rusak','-']);
            $table->enum('headlamp_dekat', ['Kanan Kiri Normal', 'Kiri Normal Kanan Rusak', 'Kanan Normal Kiri Rusak', 'Kanan Kiri Rusak','Tidak Bisa Ditest Karena Part Lain Rusak','Tidak ada','-']);
            $table->enum('headlamp_jauh', ['Kanan Kiri Normal', 'Kiri Normal Kanan Rusak', 'Kanan Normal Kiri Rusak', 'Kanan Kiri Rusak','-']);
            $table->enum('reversing_lamp', ['Kanan Kiri Normal', 'Kiri Normal Kanan Rusak', 'Kanan Normal Kiri Rusak', 'Kanan Kiri Rusak','-']);
            $table->enum('sign_lamp_depan', ['Kanan Kiri Normal', 'Rusak', 'Kanan Normal Kiri Rusak', 'Kiri Normal Kanan Rusak','-']);
            $table->enum('sign_lamp_belakang', ['Kanan Kiri Normal', 'Rusak', 'Kanan Normal Kiri Rusak', 'Kiri Normal Kanan Rusak','-']);
            $table->enum('stoplamp', ['Kanan Kiri Normal', 'Rusak', 'Kanan Normal Kiri Rusak', 'Kiri Normal Kanan Rusak','-']);
            $table->enum('lampu_atret', ['Kanan Kiri Normal', 'Rusak', 'Kanan Normal Kiri Rusak', 'Kiri Normal Kanan Rusak','-']);
            $table->enum('rotary_lamp', ['Normal', 'Upnormal', 'Rusak', 'Tidak Ada','-']);
            $table->enum('lampu_sorot', ['Normal', 'Upnormal', 'Rusak', 'Tidak Ada','-']);
            $table->enum('air_coditioning', ['Normal', 'Upnormal', 'Rusak', 'Tidak Ada', 'Tidak Bisa Ditest Karena Part Lain Rusak','-']);
            $table->enum('jok_kendaraan', ['Kondisi Baik', 'Rusak Sebagian', 'Rusak Berat','-']);
            $table->enum('indikator_dashboard', ['Indikator Normal Semua', 'Ada Indikator Upnormal', 'Rusak','-']);
            $table->enum('cabin_lamp', ['Normal', 'Upnormal', 'Rusak', 'Tidak Ada','-']);
            $table->enum('klakson', ['Normal', 'Upnormal', 'Rusak','-']);
            $table->enum('fungsi_wipper', ['Normal', 'Upnormal', 'Rusak','-']);
            $table->enum('central_lock', ['Normal Semua', 'Sebagian Upnormal', 'Upnormal', 'Rusak', 'Tidak Ada','-']);
            $table->enum('power_window_lock', ['Normal', 'Sebagian Upnormal', 'Upnormal', 'Rusak', 'Tidak Ada','-']);
            $table->enum('microphone', ['Normal', 'Upnormal', 'Rusak', 'Tidak Ada','-']);
            $table->enum('ban_depan_kanan', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Pecah','-']);
            $table->enum('ban_depan_kiri', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Pecah','-']);
            $table->enum('ban_belakang_kanan', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Pecah','-']);
            $table->enum('ban_belakang_kiri', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Pecah','-']);
            $table->enum('ban_cadangan', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Pecah', 'Tidak Ada Ban Cadangan', 'Bocor','-']);
            $table->enum('tekanan_angin', ['Normal', 'Kurang', 'Ditambah','-']);
            $table->enum('oli_gardan', ['Batas normal', 'Di bawah batas normal', 'Ditambahkan','-']);
            $table->enum('oli_hidrolis', ['Batas normal', 'Di bawah batas normal', 'Ditambahkan','-']);
            $table->enum('filter_air_drayer', ['Baik', 'Kotor', 'Perlu penggantian','-']);
            $table->enum('filter_water_sparator', ['Baik', 'Kotor', 'Perlu penggantian','-']);
            $table->enum('filter_transmisi', ['Baik', 'Kotor', 'Perlu penggantian','-']);
            $table->enum('filter_hidrolis', ['Baik', 'Kotor', 'Perlu penggantian','-']);
            $table->enum('cooling_system', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('airdrayer', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('pneumatic_system', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('hydraulic_system', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('electrical_system', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('kompresor', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('folklamp', ['Kanan Kiri Normal', 'Kanan Normal Kiri Mati', 'Kanan Mati Kiri Normal', 'Kanan Kiri Mati', 'Tidak bisa di test karena part lain rusak', 'Tidak ada','-']);
            $table->enum('retting_depan', ['Kanan Kiri Normal', 'Kanan Normal Kiri Mati', 'Kanan Mati Kiri Normal', 'Kanan Kiri Mati', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('retting_belakang', ['Kanan Kiri Normal', 'Kanan Normal Kiri Mati', 'Kanan Mati Kiri Normal', 'Kanan Kiri Mati', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('lampu_kompartement', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak', 'Tidak ada','-']);
            $table->enum('lampu_body', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak', 'Tidak ada','-']);
            $table->enum('ban_tengah_kanan', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Tidak ada','-']);
            $table->enum('ban_tengah_kiri', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Tidak ada','-']);
            $table->enum('pompa_fire_fighting', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('primming_pump', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('roof_turret', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('bumper_turret', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('undertrack_spray_depan', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('undertrack_spray_kanan', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('undertrack_spray_kiri', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('foam_proportioner', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak','-']);
            $table->enum('tangki_air', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan','-']);
            $table->enum('tangki_foam', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan','-']);
            $table->enum('pengisian_air_eksternal', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', 'Tidak ada','-']);
            $table->enum('charger_baterai_eksternal', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', 'Tidak ada','-']);
            $table->string('top_speed');
            $table->string('stop_distance');
            $table->string('acceleration');
            $table->string('discharge_range');
            $table->string('discharge_rate');
            $table->enum('dongkrak', ['Ada', 'Tidak Ada','-']);
            $table->enum('kunci_roda', ['Ada', 'Tidak Ada','-']);
            $table->text('approval'); // Tanda tangan
            $table->enum('kesimpulan_kendaraan', ['Kendaraan Siap Beroperasi', 'Kendaraan Siap Beroperasi Dengan Catatan', 'Kendaraan Dalam Perbaikan/Rusak (UNIT STOP)','-']);
            $table->text('catatan')->nullable();
            $table->string('foto_kendaraan')->nullable(); // Untuk gambar
            $table->string('tanda_tangan_teknisi')->nullable(); // Tanda tangan teknisi
            $table->enum('oli_mesin_atas', ['-', 'Batas Normal', 'Dibawah Batas Normal', 'Ditambahkan']);
            $table->enum('air_radiator_mesin_atas', ['-', 'Batas Normal', 'Dibawah Batas Normal', 'Ditambahkan']);
            $table->enum('filter_oli_mesin_atas', ['-', 'Baik', 'Kotor', 'Perlu Penggantian']);
            $table->enum('filter_bahan_bakar_mesin_atas', ['-', 'Baik', 'Kotor', 'Perlu Penggantian']);
            $table->enum('filter_udara_mesin_atas', ['-', 'Baik', 'Kotor', 'Perlu Penggantian']);
            $table->enum('starter_engine_mesin_atas', ['-', 'Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('kondisi_engine_mesin_atas', ['-', 'Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('turbo_mesin_atas', ['-', 'Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('cooling_system_mesin_atas', ['-', 'Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('gas_accelerator_pedal_mesin_atas', ['-', 'Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('pompa_hidrolis', ['-', 'Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_hisapan_vacum', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_gerakan_vacum', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_putaran_sapu_kanan', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_putaran_sapu_kiri', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_putaran_sapu_tengah', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_gerakan_sapu_kanan', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_gerakan_sapu_kiri', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_gerakan_sapu_tengah', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_spray_bar_depan', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_spray_bar_kiri', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_spray_bar_kanan', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_jet_spray_gun', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_hidrolis_hooper', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_hidrolis_tutup_hooper', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_monitor_control', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('fungsi_pendant', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak']);
            $table->enum('oli_mesin_bawah', ['-', 'Batas Normal', 'Dibawah Batas Normal', 'Ditambahkan']);
            $table->enum('air_radiator_mesin_bawah', ['-', 'Batas Normal', 'Dibawah Batas Normal', 'Ditambahkan']);
            $table->enum('filter_oli_mesin_bawah', ['-', 'Baik', 'Kotor', 'Perlu Penggantian']);
            $table->enum('filter_bahan_bakar_mesin_bawah', ['-', 'Baik', 'Kotor', 'Perlu Penggantian']);
            $table->enum('filter_udara_mesin_bawah', ['-', 'Baik', 'Kotor', 'Perlu Penggantian']);            
            $table->enum('pompa_uhp', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('pto_kopling_pompa', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('v_belt_pompa_uhp', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('kampas_kopling_pompa_uhp', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('kompresor_pompa_uhp', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('vacum_hose_3_inch', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('vacum_hose_4_inch', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('vacum_hose_6_inch', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('hose_40k', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('filter_cartridge', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('filter_bag_10_micron', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('debris_bag', ['-', 'Baik', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('running_test_40k_engine', ['-', 'Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak dapat di test karena part lain rusak']);
            $table->enum('air_radiator_mesin', ['Batas normal', 'Di bawah batas normal', 'Ditambahkan','-']);
            $table->enum('ban_tengah_belakang', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Pecah','-']);
            $table->enum('handrem_tangki_air', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('friction_tyre_kanan', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Tidak ada', '-']);
            $table->enum('friction_tyre_kiri', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Tidak ada', '-']);
            $table->enum('distance_tyre_tengah', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Tidak ada', '-']);
            $table->enum('loadcell', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('connector_kabel', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_pompa_air', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('kondisi_tangki_air', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('laptop', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('kalibrasi_jarak', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_gerakan_shourd', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_putaran_kumparan', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('nozzle', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('selang_hidrolis', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('seal_brush_button', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('seal_swifel_shaft', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('seal_gasket', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('seal_upper', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('drit_shield', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_hidrolik_moower', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_pisau_moower', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_pompa_hidrolic', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('gearbox', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('oli_kompresor', ['Batas Normal', 'Dibawah Batas Normal', 'Ditambahkan', '-']);
            $table->enum('ban_kanan', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Tidak Ada', '-']);
            $table->enum('ban_kiri', ['0%-20%', '20%-50%', '50%-70%', '70%-90%', 'Tidak Ada', '-']);
            $table->enum('fungsi_screw_kompresor', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_cut_off_pressure', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('filter_oli_kompresor', ['Baik', 'Kotor', 'Perlu penggantian', '-']);
            $table->enum('v_belt_kompresor', ['Normal', 'Upnormal', 'Rusak', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_drayer', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_auto_start', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_lampu_penerangan', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('pisau_potong', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_hidrolis_sepatu_forklift', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_vibrator', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->enum('fungsi_spray_bar', ['Normal', 'Upnormal', 'Rusak', 'Normal dengan catatan', 'Tidak bisa di test karena part lain rusak', '-']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_perawatan');
    }
};
