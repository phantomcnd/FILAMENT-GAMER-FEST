<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Campos que se permiten para asignación en masa
    protected $fillable = [
        'nombre',
        'categoria',
        'precio',
        'imagen',
    ];
}
