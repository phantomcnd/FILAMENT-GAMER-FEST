<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla asociada al modelo.
     */
    protected $table = 'roles'; // Nombre de la tabla en la base de datos

    /**
     * Campos que pueden ser asignados masivamente.
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
    ];

    /**
     * Tipos de datos que se deben castear automáticamente.
     */
    protected $casts = [
        'activo' => 'boolean',
    ];
}
