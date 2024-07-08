<?php

namespace App\Http\Resources\Reportes\Hechos;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Hechos\HechoDesaparicion */
class HechoDesaparicionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'fecha_desaparicion' => $this->fecha_desaparicion,
            'fecha_desaparicion_cebv' => $this->fecha_desaparicion_cebv,
            'fecha_percato' => $this->fecha_percato,
            'fecha_percato_cebv' => $this->fecha_percato_cebv,
            'aclaraciones_fecha_hechos' => $this->aclaraciones_fecha_hechos,
            'cambio_comportamiento' => $this->cambio_comportamiento,
            'descripcion_cambio_comportamiento' => $this->descripcion_cambio_comportamiento,
            'fue_amenazado' => $this->fue_amenazado,
            'descripcion_amenaza' => $this->descripcion_amenaza,
            'contador_desapariciones' => $this->contador_desapariciones,
            'situacion_previa' => $this->situacion_previa,
            'informacion_relevante' => $this->informacion_relevante,
            'hechos_desaparicion' => $this->hechos_desaparicion,
            'sintesis_desaparicion' => $this->sintesis_desaparicion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
