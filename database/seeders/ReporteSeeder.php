<?php

namespace Database\Seeders;

use App\Models\Reportes\Reporte;
use Illuminate\Database\Seeder;

class ReporteSeeder extends Seeder
{
    public function run(): void
    {
        Reporte::factory()
            ->hasDesaparecidos(3)
            ->hasReportantes(2)
            ->count(2)
            ->create();

        Reporte::factory()
            ->hasDesaparecidos()
            ->hasReportantes(3)
            ->count(2)
            ->create();
    }
}
