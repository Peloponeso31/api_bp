<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documentos_legales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desaparecido_id');
            $table->string('numero_documento')->nullable();
            $table->string('donde_radica')->nullable();
            $table->string('nombre_servidor_publico')->nullable();
            $table->date('fecha_recepcion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos_legales');
    }
};
