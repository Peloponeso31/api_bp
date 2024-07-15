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
        Schema::create('prendas_vestir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desaparecido_id');
            $table->foreignId('pertenencia_id')->nullable()->constrained(table: 'pertenencias');
            $table->foreignId('color_id')->nullable()->constrained(table: 'colores');
            $table->string('marca')->nullable();
            $table->string('descripcion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prendas_vestir');
    }
};
