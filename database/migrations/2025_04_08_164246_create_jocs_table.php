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
        Schema::create('jocs', function (Blueprint $table) {
            $table->id();
            $table->string('titol'); // Título del juego
            $table->date('datallancament')->nullable(); // Fecha de lanzamiento, puede ser nula inicialmente
            $table->text('descripcio')->nullable(); // Descripción del juego, puede ser nula
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jocs');
    }
};