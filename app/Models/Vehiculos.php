<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehiculos extends Model
{
    use HasFactory;

    protected $fillable=['placa','marca', 'creado_por'];

    public function programaciones(): HasMany
    {
        return $this->hasMany(Programacion::class);
    }
}
