<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Premio extends Model
{
    use HasFactory;

    protected $fillable = ['valor', 'archivo','formulario', 'serie'];

    public function cuadres():BelongsTo
    {
        return $this->belongsTo(Cuadre::class);
    }


    public function imagenfrms():BelongsTo
    {
        return $this->belongsTo(Imagenfrm::class);
    }
}
