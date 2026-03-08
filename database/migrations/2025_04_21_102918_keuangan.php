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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('item')->nullable(); // Nama kendaraan
            $table->string('detail')->nullable(); // Nama kendaraan
            $table->string('satuan')->nullable(); // Nama kendaraan
            $table->string('volume')->nullable(); // Nama kendaraan
            $table->string('harga')->nullable(); // Nama kendaraan
            $table->string('foto_nota')->nullable(); // Nama kendaraan
            $table->string('user')->nullable(); // Nama kendaraan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
