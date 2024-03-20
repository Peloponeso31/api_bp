<?php

namespace App\Models\Reportes\Relaciones;

use App\Models\Personas\Parentesco;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reportante extends Model
{
    protected $table = 'reportantes';

    protected $fillable = [
        'denuncia_anonima',
        'informacion_consentimiento',
        'informacion_exclusiva_busqueda',
        'publicacion_registro_nacional',
        'publicacion_boletin',
        'pertenencia_colectivo',
        'nombre_colectivo',
        'informacion_relevante',
    ];

    protected $casts = [
        'denuncia_anonima' => 'boolean',
        'informacion_consentimiento' => 'boolean',
        'informacion_exclusiva_busqueda' => 'boolean',
        'publicacion_registro_nacional' => 'boolean',
        'publicacion_boletin' => 'boolean',
        'pertenencia_colectivo' => 'boolean',
    ];

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class);
    }

    protected function parentesco(): BelongsTo
    {
        return $this->belongsTo(Parentesco::class);
    }
}
