<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cuadre extends Model
{
    use HasFactory;
    protected $fillable = [
        'asesora_doc', 'punto_cod', 'turno',
        'premio', 'total_b', 'total_m', 'm50', 'm100', 'm200', 'm500', 'm1000',
        'b1000', 'b2000', 'b5000', 'b10000', 'b20000', 'b50000', 'b100000', 'total_bnet', 'total_siis', 'observacion'
    ];


    public function premios(): BelongsToMany
    {
        return $this->belongsToMany(Premio::class);
    }

    public function cuadres():BelongsTo
    {
        return $this->belongsTo(Entrega::class);
    }
}
