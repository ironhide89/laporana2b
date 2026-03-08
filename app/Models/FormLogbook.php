<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLogbook extends Model
{
    use HasFactory;

    protected $table = 'form_logbook';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'nama_dinas',
        'vehicle_name',
        'name',
        'tanggal',
        'kegiatan',
        'foto_kendaraan',
        'checklist',
    ];
}
