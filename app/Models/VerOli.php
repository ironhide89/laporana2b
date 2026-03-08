<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerOli extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit jika berbeda dari penamaan default
    protected $table = 'ver_oli';

    // Tentukan kolom-kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'vehicle_name',
        'no_ba',
        'tanggal_oli',
        'odo_meter',
        'jenis_oli',
        'volume_oli',
        'kategori_oli',
        'oli_selanjutnya',
        'is_completed'
    ];
}
