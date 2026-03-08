<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormPerbaikan extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan database
    protected $table = 'form_perbaikan';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'no_ba',
        'vehicle_name',
        'vehicle_type',
        'vehicle_condition',
        'tanggal_kerusakan',
        'user_kendaraan',
        'bagian',
        'penyebab',
        'klasifikasi',
        'detail_perbaikan',
        'tanggal_perbaikan',
        'foto_perbaikan',


    ];

    // Jika Anda ingin menambahkan mutator atau accessor, bisa dilakukan di sini
}
