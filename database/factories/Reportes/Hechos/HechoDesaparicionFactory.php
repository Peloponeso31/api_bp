<?php

namespace Database\Factories\Reportes\Hechos;

use App\Models\Oficialidades\Area;
use App\Models\Personas\Persona;
use App\Models\Reportes\Hechos\HechoDesaparicion;
use App\Models\Reportes\Hipotesis\Hipotesis;
use App\Models\Ubicaciones\Direccion;
use Illuminate\Database\Eloquent\Factories\Factory;

class HechoDesaparicionFactory extends Factory
{
    protected $model = HechoDesaparicion::class;

    public function definition(): array
    {
        $zonaEstado = ['Centro', 'Norte', 'Sur'];
        $amenaza = fake()->boolean(40);

        return [
            'persona_id' => Persona::factory(),
            'direccion_id' => Direccion::inRandomOrder()->first()->id,
            'zona_estado' => fake()->boolean(50) ? fake()->randomElement($zonaEstado) : null,
            'area_id' => Area::inRandomOrder()->first()->id,
            'dependencia' => fake()->word(),
            'fecha_desaparicion' => fake()->dateTimeThisYear(),
            'fecha_percato' => fake()->dateTimeThisYear(),
            'cambio_comportamiento' => fake()->boolean(),
            'fue_amenazado' => $amenaza,
            'descripcion_amenaza' => $amenaza ? fake()->text() : null,
            'contador_desapariciones' => fake()->boolean(50) ? fake()->numberBetween(1, 5) : 0,
            'situacion_previa' => fake()->text(),
            'informacion_relevante' => fake()->boolean(60) ? fake()->text() : null,
            'hechos_desaparicion' => fake()->text(),
            'sintesis_desaparicion' => fake()->text(),
            'hipotesis_id' => Hipotesis::inRandomOrder()->first()->id,
        ];
    }
}
