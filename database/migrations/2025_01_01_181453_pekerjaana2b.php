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
        Schema::create('pekerjaana2b', function (Blueprint $table) {
            $table->id();
            $table->string('pekerjaan'); // Nama kendaraan
            $table->string('nilai_pekerjaan'); // Nama kendaraan
            $table->string('vendor'); // Nama kendaraan
            $table->string('glaccount'); // Nama kendaraan
            $table->string('status'); // Nama kendaraan
            $table->string('no_po')->nullable(); // Nama kendaraan
            $table->string('no_bast')->nullable(); // Nama kendaraan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaana2b'); // Menghapus tabel jika migrasi dibatalkan
    }
};
