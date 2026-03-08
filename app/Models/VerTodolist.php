<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerTodolist extends Model
{
    use HasFactory;

    protected $table = 'ver_todolist';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'nama_dinas',
        'name',
        'tanggal',
        'tugas',
        'id',
    ];
}
