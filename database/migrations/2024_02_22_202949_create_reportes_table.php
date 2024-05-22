<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipo_reporte_id')->constrained(table: 'tipos_reportes', indexName: 'idx_reportes_tipo_reporte');
            $table->foreignId('area_atiende_id')->nullable()->constrained(table: 'areas', indexName: 'idx_reportes_area');
            $table->foreignId('medio_conocimiento_id')->nullable()->constrained(table: 'medios', indexName: 'idx_reportes_medio');
            $table->string('estado_id', 2)->nullable(); // Llave foránea
            $table->foreignId('zona_estado_id')->nullable()->constrained(table: 'zonas_estados', indexName: 'idx_reportes_zona_estado');
            $table->foreignId('hipotesis_oficial_id')->nullable()->constrained(table: 'tipos_hipotesis', indexName: 'idx_reportes_hipotesis_oficial');

            $table->boolean('esta_terminado')->default(false);
            $table->enum('tipo_desaparicion', ['U', 'M'])->default('U')->nullable();
            $table->date('fecha_localizacion')->nullable();
            $table->text('sintesis_localizacion')->nullable();

            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_actualizacion')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('estado_id')
                ->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
