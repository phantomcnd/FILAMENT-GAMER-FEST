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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // Relación con la tabla posts
            $table->decimal('monto', 10, 2); // Campo para el monto
            $table->string('numero_comprobante')->unique(); // Campo único para el número de comprobante
            $table->string('comprobante_pago'); // Archivo de comprobante de pago
            $table->enum('estado', ['pendiente', 'aprobado'])->default('pendiente'); // Estado de inscripción
            $table->timestamp('fecha_inscripcion')->useCurrent(); // Fecha de inscripción
            $table->timestamps(); // Campos created_at y updated_at
            $table->softDeletes(); // Campo deleted_at para eliminaciones suaves

            // Relación con la tabla posts
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
