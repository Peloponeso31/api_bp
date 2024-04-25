<?php

namespace App\Models;

use App\Models\Personas\Persona;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Telefono extends Model
{
    use HasFactory;

    protected $table = 'telefonos';
    public $timestamps = false;

    protected $fillable = [
        'persona_id',
        'numero',
        'observaciones',
        'compania_id',
    ];

    public function personas(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function compania(): BelongsTo
    {
        return $this->belongsTo(CompaniaTelefonica::class);
    }
}
