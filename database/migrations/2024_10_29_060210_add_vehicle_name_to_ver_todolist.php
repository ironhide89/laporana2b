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
        Schema::create('ver_todolist', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id sebagai primary key
            $table->string('nama_dinas'); // Nomor Berita Acara
            $table->string('name'); // Nomor Berita Acara
            $table->date('tanggal');      // Kondisi kendaraan
            $table->string('tugas'); // Nomor Berita Acara
            $table->boolean('is_completed')->default(false); // Menambahkan kolom is_completed
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ver_todolist'); // Menghapus tabel jika migrasi dibatalkan
    }
};
