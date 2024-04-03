<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guarda extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'documento'];

    public function programaciones():BelongsToMany
    {
        return $this->belongsToMany(Programacion::class);
    }
}
