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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Clave primaria: ID del rol
            $table->string('nombre')->unique(); // Nombre del rol (único)
            $table->text('descripcion')->nullable(); // Descripción del rol (opcional)
            $table->boolean('activo')->default(true); // Estado del rol: activo o inactivo
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
