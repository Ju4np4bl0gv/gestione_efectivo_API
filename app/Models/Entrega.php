<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entrega extends Model
{
    use HasFactory;
    protected $fillable = ['tula', 'candado', 'cantidad_paquetes', 'asesora_entrega','guarda_Recibe'];

public function cuadres():HasMany
{
    return $this->hasMany(Cuadre::class);
}

public function programaciones():BelongsTo
{
    return $this->belongsTo(Programacion::class);
}

}
