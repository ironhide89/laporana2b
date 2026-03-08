<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';

    // Kolom-kolom yang boleh diisi
    protected $fillable = [
        'item',
        'detail',
        'satuan',
        'volume',
        'harga',
        'foto_nota',
        'user'
    ];
}
