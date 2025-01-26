<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class InscripcionIndividual extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'inscripciones';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', // Relación con la tabla posts
        'monto',
        'numero_comprobante',
        'comprobante_pago',
        'estado',
        'fecha_inscripcion',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'fecha_inscripcion' => 'datetime',
    ];

    /**
     * Relación con el modelo Post (representa los juegos).
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
