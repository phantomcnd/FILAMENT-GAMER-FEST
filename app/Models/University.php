<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Si tu tabla tiene relaciones con otros modelos,
     * puedes definirlas aquí (opcional, si aplica).
     */
}

