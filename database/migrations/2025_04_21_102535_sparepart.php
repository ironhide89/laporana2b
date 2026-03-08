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
        Schema::create('sparepart', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->nullable(); // Nama kendaraan
            $table->string('merk_barang')->nullable(); // Nama kendaraan
            $table->string('pnp')->nullable(); // Nama kendaraan
            $table->string('plat_number')->nullable(); // Nama kendaraan
            $table->string('peralatan')->nullable(); // Nama kendaraan
            $table->string('volume')->nullable(); // Nama kendaraan
            $table->string('lokasi')->nullable(); // Nama kendaraan
            $table->string('kondisi')->nullable(); // Nama kendaraan
            $table->string('user')->nullable(); // Nama kendaraan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sparepart'); // Menghapus tabel jika migrasi dibatalkan
    }
};
