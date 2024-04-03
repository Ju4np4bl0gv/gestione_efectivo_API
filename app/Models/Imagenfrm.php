<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imagenfrm extends Model
{
    use HasFactory;

    protected $fillable = ['imagen'];

    public function premios():BelongsTo
    {
        return $this->belongsTo(Premio::class);
    }

}
