<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;
    protected $table = 'sparepart';

    // Kolom-kolom yang boleh diisi
    protected $fillable = [
        'nama_barang',
        'merk_barang',
        'pnp',
        'plat_number',
        'peralatan',
        'volume',
        'lokasi',
        'kondisi',
        'satuan',
        'user'
    ];
}
