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

            $table->foreignId('tipo_reporte_id')
                ->constrained(table: 'tipos_reportes', indexName: 'idx_reportes_tipo_reporte');
            $table->foreignId('area_id')
                ->nullable()
                ->constrained(table: 'areas', indexName: 'idx_reportes_area');
            $table->foreignId('medio_id')
                ->constrained(table: 'medios', indexName: 'idx_reportes_medio');
            $table->foreignId('direccion_id')
                ->nullable()
                ->constrained(table: 'direcciones', indexName: 'idx_reportes_direccion');

            $table->enum('zona_estado', ['Norte', 'Centro', 'Sur', 'Sin zona']); // TODO check if this is the correct enum
            $table->enum('tipo_desaparicon', ['U', 'M']);
            $table->enum('estatus', ['Localizada con vida', 'Localizada sin vida', 'No localizada']);
            $table->dateTime('fecha_desaparicion')->nullable();
            $table->dateTime('fecha_percato')->nullable();
            $table->string('folio', 20)->nullable();

            $table->timestamps();
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
