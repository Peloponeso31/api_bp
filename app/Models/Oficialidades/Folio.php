<?php

namespace App\Models\Oficialidades;

use App\Helpers\ArrayHelpers;
use App\Helpers\EnumHelper;
use App\Models\Personas\Persona;
use App\Models\Reportes\Reporte;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Folio extends Model
{
    use Searchable;

    protected $table = 'folios';

    protected $fillable = [
        'folio_cebv',
        'folio_fub',
        'persona_id',
        'reporte_id',
        'user_id',
        'autoridad_ingresa_fub',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = true;

    protected function folioCebv(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $value,
            set: fn($value) => $this->setFolio($value)
        );
    }

    protected function setFolio($value): string
    {
        return $value['fecha_registro'] . '/' . $value['tipo_reporte'] . ' ' . $value['serie'] .
            EnumHelper::toString($value['tipo_desaparicion']) . '-' . $value['fecha_desaparicion'] . $value['terminacion'];
    }

    protected function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    protected function reporte(): BelongsTo
    {
        return $this->belongsTo(Reporte::class, 'reporte_id');
    }

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getFolio($reporteId, $personaId): Folio|null
    {
        return Folio::where('reporte_id', $reporteId)
            ->where('persona_id', $personaId)
            ->first();
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'folio_cebv' => $this->folio_cebv,
            'folio_fub' => $this->folio_fub,
            'persona_id' => $this->persona_id,
            'reporte_id' => $this->reporte_id,
            'user_id' => $this->user_id,
        ];
    }

    /**
     * Funciones de ayuda para consultar información de la persona
     * de manera más sencilla
     */
    public function getFechaCreacion(): string
    {
        return $this->created_at->locale('es')->isoFormat(config('constants.date_iso_format'));
    }
}
