<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hechos_desapariciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');

            $table->dateTime('fecha_desaparicion')->nullable();
            $table->string('fecha_desaparicion_cebv')->nullable();
            $table->string('hora_desaparicion')->nullable();
            $table->dateTime('fecha_percato')->nullable();
            $table->string('fecha_percato_cebv')->nullable();
            $table->string('hora_percato')->nullable();
            $table->text('aclaraciones_fecha_hechos')->nullable();
            $table->boolean('cambio_comportamiento')->nullable();
            $table->text('descripcion_cambio_comportamiento')->nullable();
            $table->boolean('fue_amenazado')->nullable();
            $table->text('descripcion_amenaza')->nullable();
            $table->integer('contador_desapariciones')->nullable();
            $table->text('situacion_previa')->nullable();
            $table->text('informacion_relevante')->nullable();
            $table->text('hechos_desaparicion')->nullable();
            $table->text('sintesis_desaparicion')->nullable();
            $table->boolean('desaparecio_acompanado')->nullable();
            $table->integer('personas_mismo_evento')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desapariciones');
    }
};
