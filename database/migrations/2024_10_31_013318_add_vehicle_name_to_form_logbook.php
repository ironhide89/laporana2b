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
        Schema::create('form_logbook', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id sebagai primary key
            $table->string('nama_dinas'); // Nomor Berita Acara
            $table->string('name'); // Nomor Berita Acara
            $table->string('vehicle_name'); // Nomor Berita Acara
            $table->date('tanggal');      // Kondisi kendaraan
            $table->string('kegiatan'); // Nomor Berita Acara
            $table->string('checklist')->nullable(); // Untuk gambar
            $table->string('foto_kendaraan')->nullable(); // Untuk gambar
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('form_logbook', function (Blueprint $table) {
            //
        });
    }
};
