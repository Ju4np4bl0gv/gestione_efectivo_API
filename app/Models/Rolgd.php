<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rolgd extends Model
{
    use HasFactory;
    protected $filalable = ['nombre_rol', 'creado_por'];
    public function guarda_programcions(): HasMany
    {
        return $this->hasMany(guarda_programacion::class);
    }
}
