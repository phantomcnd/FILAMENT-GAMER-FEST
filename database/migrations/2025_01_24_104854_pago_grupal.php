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
        Schema::create('pagos_grupales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_equipo'); // Nombre del equipo
            $table->foreignId('post_id') // Relación con la tabla posts (juegos)
                ->constrained('posts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('lider_id') // Relación con la tabla users (líder del grupo)
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->text('integrantes'); // Integrantes del equipo
            $table->decimal('monto', 10, 2); // Monto del pago grupal
            $table->string('numero_comprobante')->unique(); // Número único del comprobante
            $table->string('comprobante_pago'); // Ruta del comprobante de pago
            $table->enum('estado', ['pendiente', 'aprobado'])->default('pendiente'); // Estado del pago
            $table->timestamp('fecha_pago')->useCurrent(); // Fecha del pago
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_grupales');
    }
};
