<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoIndividual extends Model
{
    use HasFactory;

    protected $table = 'pagos_individuales';

    protected $fillable = [
        'user_id',
        'post_id',
        'monto',
        'numero_comprobante',
        'comprobante_pago',
        'estado',
        'fecha_pago',
    ];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Post.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
