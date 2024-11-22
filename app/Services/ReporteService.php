<?php

namespace App\Services;

use App\Http\Resources\FolioResource;
use App\Http\Resources\UserAdminResource;
use App\Models\Oficialidades\Folio;
use App\Models\Reportes\Relaciones\Desaparecido;
use App\Models\Reportes\Reporte;
use App\Models\Serie;
use Illuminate\Http\JsonResponse;

class ReporteService
{
    /**
     * @param mixed $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getFolios(mixed $id): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $reporte = Reporte::findOrFail($id);
        $folios = Folio::where('reporte_id', $reporte->id)->get();

        return FolioResource::collection($folios);
    }

    /**
     * @param mixed $id
     * @param mixed $userId
     * @return JsonResponse
     */
    public function setFolio(mixed $id, mixed $userId): JsonResponse
    {
        $reporte = Reporte::findOrFail($id);

        /**
         * TODO: Completar la validación de los campos mínimos requeridos para asignar un folio.
         */
        //if (!$reporte->esta_terminado)
        //   return response()->json("El reporte $reporte->id es un borrador, no se puede asignar un folio", 400);

        $desaparecidos = Desaparecido::where('reporte_id', $reporte->id)->get();

        // Registro de los folios asignados
        $foliosAsignados = [];

        // Registro de los folios repetidos
        $foliosRepetidos = [];

        if ($desaparecidos->isEmpty())
            return response()->json("Sin personas para asignar folio en el reporte $reporte->id", 404);

        foreach ($desaparecidos as $desaparecido) {
            if (Folio::where('persona_id', $desaparecido->persona_id)->where('reporte_id', $reporte->id)->exists()) {
                $foliosRepetidos[] = "$desaparecido->persona_id";
            } else {
                if ($this->createFolio($userId, $reporte, $desaparecido))
                    $foliosAsignados[] = "$desaparecido->persona_id";
            }
        }

        if (empty($foliosAsignados) && empty($foliosRepetidos))
            return response()->json(["error" => "No se asignaron folios"], 401);

        return response()->json(["success" => "Folios asignados correctamente"]);
    }

    public function createFolio($userId, Reporte $reporte, Desaparecido $desaparecido): bool
    {

        if (!isset($reporte->hechosDesaparicion->fecha_desaparicion) || is_null($reporte->hechosDesaparicion->fecha_desaparicion)) {
            $fechaDesaparicion = 'AA';
        } else {
            $fechaDesaparicion = $reporte->hechosDesaparicion->fecha_desaparicion->format('y');
        }

        if (!isset($reporte->tipoReporte) || is_null($reporte->tipoReporte)) return false;

        // Si es solicitud de busqueda familiar, colaboracion, o de difusion, entonces agarrar la terminacion
        // de donde proviene, si no, agarrarlo de la zona del estado de Veracruz: ['ZN', 'ZC', 'ZS'].
        $terminacion = in_array($reporte->tipoReporte->abreviatura, ['SC', 'SD', 'SBF'])
            ? $reporte->estado->abreviatura_cebv
            : $reporte->zonaEstado->abreviatura;

        /**
         * Una vez que el reporte tiene los campos mínimos requeridos, se procede a crear el folio
         * con el número de serie correspondiente.
         *
         * Esto se hace para evitar que se genere un folio sin un reporte asociado.
         */
        $numero = Serie::create(['tipo_reporte_id' => $reporte->tipo_reporte_id]);
        $numeroString = strval($numero->numero);
        $serie = str_pad($numeroString, 4, '0', STR_PAD_LEFT);

        Folio::create([
            'user_id' => $userId,
            'reporte_id' => $reporte->id,
            'persona_id' => $desaparecido->persona_id,
            'folio_cebv' => [
                'fecha_registro' => $reporte->created_at->format('y'),
                'tipo_reporte' => $reporte->tipoReporte->abreviatura,
                'serie' => $serie,
                'tipo_desaparicion' => $reporte->tipo_desaparicion,
                'fecha_desaparicion' => $fechaDesaparicion,
                'terminacion' => $terminacion,
            ]
        ]);

        return true;
    }
}
