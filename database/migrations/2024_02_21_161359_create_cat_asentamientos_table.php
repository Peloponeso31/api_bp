<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cat_asentamientos', function (Blueprint $table) {
            $table->string('id', 9)->primary();
            $table->string('municipio_id', 5);
            $table->string('nombre');
            $table->double('latitud', 10, 6);
            $table->double('longitud', 11, 6);
            $table->integer('altitud');
            $table->enum('ambito', ['U', 'R']);
            $table->foreign('municipio_id')
                ->references('id')->on('cat_municipios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_asentamientos');
    }
};
