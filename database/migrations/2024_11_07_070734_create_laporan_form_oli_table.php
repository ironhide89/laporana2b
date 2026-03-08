<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_form_oli', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_name'); // Nama kendaraan
            $table->string('name'); // Nama teknisi
            $table->date('tanggal_oli'); // Tanggal oli akan diganti
            $table->string('odo_meter')->nullable(); // Untuk gambar
            $table->string('jenis_oli'); // Odo Meter
            $table->string('volume_oli'); // Odo Meter
            $table->string('kategori_oli'); // Odo Meter
            $table->string('oli_selanjutnya')->nullable(); // Untuk gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_form_oli');
    }
};
