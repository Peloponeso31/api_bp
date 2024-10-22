<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reportantes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->constrained(table: 'reportes');
            $table->foreignId('persona_id')->nullable()->constrained(table: 'personas');
            $table->foreignId('parentesco_id')->nullable()->constrained(table: 'cat_parentescos');
            $table->foreignId('colectivo_id')->nullable()->constrained(table: 'cat_colectivos');

            $table->boolean('denuncia_anonima')->default(false);
            $table->boolean('informacion_consentimiento')->nullable();
            $table->boolean('informacion_exclusiva_busqueda')->nullable();
            $table->boolean('publicacion_registro_nacional')->nullable();
            $table->boolean('publicacion_boletin')->nullable();
            $table->text('informacion_relevante')->nullable();

            $table->boolean('pertenencia_colectivo')->nullable();
            $table->boolean('participacion_previa_busquedas')->nullable();
            $table->text('descripcion_participacion_busquedas')->nullable();
            $table->boolean('victima_extorsion_fraude')->nullable();
            $table->text('descripcion_extorsion_fraude')->nullable();
            $table->boolean('recibio_amenazas')->nullable();
            $table->text('descripcion_origen_amenazas')->nullable();
            $table->integer('edad_estimada_anhos')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reportantes');
    }
};
