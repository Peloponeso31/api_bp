<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Nacionalidad extends Model
{
    use HasFactory, Searchable;

    protected $table = 'nacionalidades';

    protected $fillable = [
        'nombre'
    ];

    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }

    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
        ];
    }
}
