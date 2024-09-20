<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cat_metodos_captura', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cat_metodos_captura');
    }
};
