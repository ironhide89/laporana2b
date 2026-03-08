<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormVerKerusakan extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan database
    protected $table = 'ver_form_kerusakan';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'no_ba',
        'vehicle_name',
        'vehicle_type',
        'vehicle_condition',
        'tanggal_kerusakan',
        'tanggal_prediksi',
        'user_kendaraan',
        'bagian',
        'penyebab',
        'tindakan',
        'klasifikasi',
        'is_completed',
        'tampil_cetak',
    ];

    // Jika Anda ingin menambahkan mutator atau accessor, bisa dilakukan di sini
}
