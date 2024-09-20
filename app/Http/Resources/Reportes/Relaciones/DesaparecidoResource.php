<?php

namespace App\Http\Resources\Reportes\Relaciones;

use App\Http\Resources\BasicResource;
use App\Http\Resources\FolioResource;
use App\Http\Resources\Personas\PersonaResource;
use App\Http\Resources\PrendaVestirResource;
use App\Models\Reportes\Relaciones\Desaparecido;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Desaparecido */
class DesaparecidoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            /**
             * Atributos propios de desaparecido
             */
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'identidad_resguardada' => $this->identidad_resguardada,
            'persona' => PersonaResource::make($this->persona),
            'estatus_rpdno' => BasicResource::make($this->estatusRpdno),
            'estatus_cebv' => BasicResource::make($this->estatusCebv),
            'clasificacion_persona' => $this->clasificacion_persona,
            'declaracion_especial_ausencia' => $this->declaracion_especial_ausencia,
            'accion_urgente' => $this->accion_urgente,
            'dictamen' => $this->dictamen,
            'ci_nivel_federal' => $this->ci_nivel_federal,
            'otro_derecho_humano' => $this->otro_derecho_humano,
            'fecha_nacimiento_aproximada' => $this->fecha_nacimiento_aproximada,
            'fecha_nacimiento_cebv' => $this->fecha_nacimiento_cebv,
            'observaciones_fecha_nacimiento' => $this->observaciones_fecha_nacimiento,
            'edad_momento_desaparicion_anos' => $this->edad_momento_desaparicion_anos,
            'edad_momento_desaparicion_meses' => $this->edad_momento_desaparicion_meses,
            'edad_momento_desaparicion_dias' => $this->edad_momento_desaparicion_dias,
            'url_boletin' => $this->url_boletin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            /**
             * Relaciones con desaparecido
             */
            'documentos_legales' => DocumentoLegalResource::collection($this->documentosLegales),
            'folios' => FolioResource::make($this->folio()),
            'prendas_vestir' => PrendaVestirResource::collection($this->prendasVestir),
        ];
    }
}
