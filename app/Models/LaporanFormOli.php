<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanFormOli extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit jika berbeda dari penamaan default
    protected $table = 'laporan_form_oli';

    // Tentukan kolom-kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'vehicle_name',
        'name',
        'tanggal_oli',
        'odo_meter',
        'jenis_oli',
        'volume_oli',
        'oli_selanjutnya',
        'kategori_oli',
    ];
}
