<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaana2b extends Model
{
    use HasFactory;
    protected $table = 'pekerjaana2b';

    // Kolom-kolom yang boleh diisi
    protected $fillable = [
        'pekerjaan',
        'nilai_pekerjaan',
        'vendor',
        'glaccount',
        'status',
        'no_po',
        'no_bast'
    ];
}
