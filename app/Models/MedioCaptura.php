<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedioCaptura extends Model
{
    public $timestamps = false;

    protected $table = 'medios_captura';

    protected $fillable = [
        'nombre',
    ];

    public function desaparicionesForzadas(): HasMany
    {
        return $this->hasMany(DesaparicionForzada::class);
    }
}
