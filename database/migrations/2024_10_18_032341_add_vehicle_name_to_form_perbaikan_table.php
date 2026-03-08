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
        Schema::create('form_perbaikan', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id sebagai primary key
            $table->string('no_ba'); // Nomor Berita Acara
            $table->string('vehicle_name'); // Tipe Kendaraan
            $table->string('vehicle_type'); // Tipe Kendaraan
            $table->string('vehicle_condition'); // Tipe Kendaraan
            $table->date('tanggal_kerusakan'); // Tanggal Kerusakan
            $table->string('user_kendaraan'); // User Kendaraan
            $table->string('bagian'); // Bagian yang rusak
            $table->string('penyebab'); // Penyebab kerusakan
            $table->string('tindakan'); // Tindakan yang diambil
            $table->enum('klasifikasi', ['Ringan', 'Sedang', 'Berat', 'Sangat Berat']); // Klasifikasi kerusakan
            $table->string('detail_perbaikan'); // Tindakan yang diambil
            $table->date('tanggal_perbaikan'); // Tanggal Kerusakan
            $table->string('foto_perbaikan')->nullable(); // Foto kerusakan (nullable)
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('form_perbaikan'); // Menghapus tabel jika migrasi dibatalkan
    }
};
