<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Programacion extends Model
{
    use HasFactory;

    protected $fillable=['vehiculo_id','ruta_id','fecha_i','fecha_f','estado','observacion'];

    public function rutas(): BelongsTo
    {
        return $this->belongsTo(Ruta::class);
    }

    public function vehiculos(): BelongsTo
    {
        return $this->belongsTo(Vehiculos::class);
    }

    public function guardas():BelongsToMany
    {
        return $this->belongsToMany(Guarda::class);
    }

    public function entregas():HasMany
{
    return $this->hasMany(Entrega::class);
}
}
