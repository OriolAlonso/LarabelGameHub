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
        Schema::create('usuaris_jocs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuari_id')->constrained('users')->onDelete('cascade'); // Clave foránea a la tabla 'users'
            $table->foreignId('joc_id')->constrained('jocs')->onDelete('cascade'); // Clave foránea a la tabla 'jocs'
            $table->timestamps();
            $table->unique(['usuari_id', 'joc_id']); // Evita duplicados de la misma relación usuario-juego
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuaris_jocs');
    }
};