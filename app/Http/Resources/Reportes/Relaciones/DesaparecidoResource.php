<?php

namespace App\Http\Resources\Reportes\Relaciones;

use App\Http\Resources\BasicResource;
use App\Http\Resources\OcupacionResource;
use App\Http\Resources\Personas\PersonaResource;
use App\Http\Resources\PrendaVestirResource;
use App\Models\Oficialidades\Folio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Reportes\Relaciones\Desaparecido */
class DesaparecidoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $folio = Folio::where('persona_id', $this->persona_id)
            ->where('reporte_id', $this->reporte_id)
            ->value('folio_cebv');

        return [
            'id' => $this->id,
            'reporte_id' => $this->reporte_id,
            'persona' => PersonaResource::make($this->persona),
            'estatus_rpdno' => BasicResource::make($this->estatusRpdno),
            'estatus_cebv' => BasicResource::make($this->estatusCebv),
            'documentos_legales' => DocumentoLegalResource::collection($this->documentosLegales),
            'ocupacion_principal' => OcupacionResource::make($this->ocupacionPrincipal),
            'ocupacion_secundaria' => OcupacionResource::make($this->ocupacionSecundaria),
            'prendas_de_vestir' => PrendaVestirResource::collection($this->prendasDeVestir),
            'clasificacion_persona' => $this->clasificacion_persona,
            'habla_espanhol' => $this->habla_espanhol,
            'sabe_leer' => $this->sabe_leer,
            'sabe_escribir' => $this->sabe_escribir,
            'url_boletin' => $this->url_boletin,
            'declaracion_especial_ausencia' => $this->declaracion_especial_ausencia,
            'accion_urgente' => $this->accion_urgente,
            'dictamen' => $this->dictamen,
            'ci_nivel_federal' => $this->ci_nivel_federal,
            'otro_derecho_humano' => $this->otro_derecho_humano,
            'folio_cebv' => $folio,
            'edad_estimada' => $this->edad_estimada,
            'identidad_resguardada' => $this->identidad_resguardada,
            'alias' => $this->alias,
            'descripcion_ocupacion_principal' => $this->descripcion_ocupacion_principal,
            'descripcion_ocupacion_secundaria' => $this->descripcion_ocupacion_secundaria,
            'otras_especificaciones_ocupacion' => $this->otras_especificaciones_ocupacion,
            'nombre_pareja_conyugue' => $this->nombre_pareja_conyugue,

            'fecha_nacimiento_aproximada' => $this->fecha_nacimiento_aproximada,
            'fecha_nacimiento_cebv' => $this->fecha_nacimiento_cebv,
            'observaciones_fecha_nacimiento' => $this->observaciones_fecha_nacimiento,
            'edad_momento_desaparicion_anos' => $this->edad_momento_desaparicion_anos,
            'edad_momento_desaparicion_meses' => $this->edad_momento_desaparicion_meses,
            'edad_momento_desaparicion_dias' => $this->edad_momento_desaparicion_dias,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
