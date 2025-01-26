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
        Schema::create('inscripciones_grupales', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('post_id'); // Relación con la tabla posts (juegos)
            $table->string('nombre_equipo'); // Nombre del equipo o grupo
            $table->unsignedBigInteger('lider_id'); // Relación con el líder del grupo
            $table->text('integrantes'); // Campo para escribir los integrantes manualmente
            $table->decimal('monto', 10, 2); // Monto total
            $table->string('numero_comprobante')->unique(); // Número único de comprobante
            $table->string('comprobante_pago'); // Archivo o ruta del comprobante de pago
            $table->enum('estado', ['pendiente', 'aprobado'])->default('pendiente'); // Estado de inscripción
            $table->timestamp('fecha_inscripcion')->useCurrent(); // Fecha de inscripción
            $table->timestamps(); // Campos created_at y updated_at
            $table->softDeletes(); // Eliminación suave

            // Relación con la tabla posts (juegos)
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            // Relación con la tabla users (líder del grupo)
            $table->foreign('lider_id')
                ->references('id')
                ->on('users') // Nombre correcto de la tabla
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones_grupales');
    }
};
