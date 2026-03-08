<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerChecklist extends Model
{
    use HasFactory;

    protected $table = 'ver_checklist';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'checklist',
        'name',
    ];
}
