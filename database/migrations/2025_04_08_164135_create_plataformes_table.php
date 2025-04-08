<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plataformes', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' como clave primaria autoincremental
            $table->string('nom')->unique(); // Columna 'nom' para el nombre de la plataforma, debe ser único
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at' para el seguimiento de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plataformes');
    }
};