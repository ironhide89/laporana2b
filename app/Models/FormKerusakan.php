<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKerusakan extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan database
    protected $table = 'form_kerusakan';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'no_ba',
        'vehicle_name',
        'vehicle_type',
        'vehicle_condition',
        'tanggal_kerusakan',
        'tanggal_prediksi',
        'user_kendaraan',
        'tindakan',
        'bagian',
        'penyebab',
        'klasifikasi',
        'foto_kerusakan',
        'tampil_dashboard',
    ];

    // Jika Anda ingin menambahkan mutator atau accessor, bisa dilakukan di sini
}
