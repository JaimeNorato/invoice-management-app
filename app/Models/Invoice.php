<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'date_time',
        'issuer_id',
        'receiver_id',
        'subtotal',
        'iva',
        'total',
    ];
    /**
     * Relación con el emisor de la factura
    */
    public function issuer(): BelongsTo
    {
        return $this->belongsTo(Issuer::class, 'issuer_id');
    }
    /**
     * Relación con el receptor de la factura
    */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(Receiver::class, 'receiver_id');
    }
}
