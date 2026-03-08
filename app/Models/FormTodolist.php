<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTodolist extends Model
{

    use HasFactory;

    protected $table = 'form_todolist';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'name',
        'tanggal',
        'tugas',
        'is_completed',


    ];
}
