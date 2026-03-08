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
        Schema::create('ver_oli', function (Blueprint $table) {
            $table->id();
            $table->string('no_ba'); // Nama kendaraan
            $table->string('vehicle_name'); // Nama kendaraan
            $table->date('tanggal_oli'); // Tanggal oli akan diganti
            $table->string('odo_meter')->nullable(); // Odo Meter
            $table->string('oli_selanjutnya')->nullable(); // KM Oli selanjutnya
            $table->string('jenis_oli'); // Odo Meter
            $table->string('kategori_oli'); // Odo Meter
            $table->string('volume_oli'); // Odo Meter
            $table->boolean('is_completed')->default(false); // Menambahkan kolom is_completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ver_oli'); // Menghapus tabel jika migrasi dibatalkan
    }
};

