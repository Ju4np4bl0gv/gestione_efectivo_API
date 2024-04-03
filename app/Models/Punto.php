<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Punto extends Model
{
    use HasFactory;

    protected $filalable=['cod_punto','nombre'];

    public function rutas(): BelongsToMany
    {
        return $this->belongsToMany(Ruta::class);
    }
}
