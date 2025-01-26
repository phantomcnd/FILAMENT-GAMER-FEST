<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // ID del juego
            $table->string('nombre', 255); // Nombre del juego
            $table->string('categoria', 100); // Categoría del juego
            $table->decimal('precio', 10, 2); // Precio del juego (2 decimales para precisión)
            $table->string('imagen')->nullable(); // Ruta de la imagen del juego
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
