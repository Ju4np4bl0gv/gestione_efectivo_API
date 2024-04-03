<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruta extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre_ruta', 'creado_por'];

    public function puntos(): BelongsToMany
    {
        return $this->belongsToMany(Punto::class);
    }

    public function programaciones(): HasMany
    {
        return $this->hasMany(Programacion::class);
    }
}
