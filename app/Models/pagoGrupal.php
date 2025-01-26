<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoGrupal extends Model
{
    use HasFactory;

    protected $table = 'pagos_grupales';

    protected $fillable = [
        'nombre_equipo',
        'post_id',
        'lider_id',
        'integrantes',
        'monto',
        'numero_comprobante',
        'comprobante_pago',
        'estado',
        'fecha_pago',
    ];

    /**
     * Relación con el modelo Post (juegos).
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Relación con el modelo User (líder del grupo).
     */
    public function lider()
    {
        return $this->belongsTo(User::class, 'lider_id');
    }
}
