<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game',
        'amount',
        'status',
        'receipt_path',
        'transaction_number',
    ];

    /**
     * Relación con el usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
