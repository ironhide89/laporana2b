<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->unique(); // Kolom barcode harus unik
            $table->string('barcodes'); // Kolom barcode harus unik
            $table->string('vehicle_name');      // Nama kendaraan
            $table->date('tanggal_prediksi')->nullable();      // Kondisi kendaraan
            $table->string('tindakan')->nullable();
            $table->string('vehicle_type');      // Tipe kendaraan
            $table->string('klasifikasi_kendaraan');      // Tipe kendaraan
            $table->string('vehicle_condition');      // Kondisi kendaraan
            $table->date('tanggal_oli');      // Kondisi kendaraan
            $table->string('vol_tangki')->nullable(); // 
            $table->string('oli_selanjutnya'); // 
            $table->string('odo_meter'); // 
            $table->string('no_polisi');      // Kondisi kendaraan
            $table->string('tahun');      // Kondisi kendaraan
            $table->string('user_peralatan');      // Kondisi kendaraan
            $table->string('lokasi');      // Kondisi kendaraan
            $table->string('no_aset');      // Kondisi kendaraan
            $table->string('no_rangka');      // Kondisi kendaraan
            $table->string('no_mesin');      // Kondisi kendaraan
            $table->string('engine');      // Kondisi kendaraan
            $table->string('kap_silinder');      // Kondisi kendaraan
            $table->string('transmisi');      // Kondisi kendaraan
            $table->string('bakar_jenis');      // Kondisi kendaraan
            $table->string('bakar_kapasitas');      // Kondisi kendaraan
            $table->string('oli_mesin_volume1');      // Kondisi kendaraan
            $table->string('oli_mesin_jenis1');      // Kondisi kendaraan
            $table->string('oli_mesin_volume2');      // Kondisi kendaraan
            $table->string('oli_mesin_jenis2');      // Kondisi kendaraan
            $table->string('oli_transmisi_volume');      // Kondisi kendaraan
            $table->string('oli_transmisi_jenis');      // Kondisi kendaraan
            $table->string('oli_gardan_volume');      // Kondisi kendaraan
            $table->string('oli_gardan_jenis');      // Kondisi kendaraan
            $table->string('oli_hydrolis_volume');      // Kondisi kendaraan
            $table->string('oli_hydrolis_oli');      // Kondisi kendaraan
            $table->string('ban_depan');      // Kondisi kendaraan
            $table->string('ban_belakang');      // Kondisi kendaraan
            $table->string('ban_jumlah');      // Kondisi kendaraan
            $table->string('accu1_spesifikasi');      // Kondisi kendaraan
            $table->string('accu2_spesifikasi');      // Kondisi kendaraan
            $table->string('accu1_jumlah');      // Kondisi kendaraan
            $table->string('accu2_jumlah');      // Kondisi kendaraan
            $table->string('bagian');      // Kondisi kendaraan
            $table->string('foto_kendaraan')->nullable(); // Foto kerusakan (nullable)
            $table->timestamps();                // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
