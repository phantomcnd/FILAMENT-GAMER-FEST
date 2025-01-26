<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class InscripcionGrupal extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'inscripciones_grupales';

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',         // Relación con la tabla posts
        'nombre_equipo',   // Nombre del equipo
        'lider_id',        // ID del líder del grupo
        'integrantes',     // Lista de integrantes del grupo
        'monto',           // Monto total de la inscripción
        'numero_comprobante', // Número único de comprobante
        'comprobante_pago',   // Ruta del archivo del comprobante
        'estado',          // Estado de la inscripción
        'fecha_inscripcion', // Fecha de inscripción
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
     * Relación con el modelo Post (juego).
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Relación con el líder del grupo (usuario).
     */
    public function lider()
    {
        return $this->belongsTo(User::class, 'lider_id');
    }
}
